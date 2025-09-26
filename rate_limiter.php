<?php
include("./db/db.php");

function rateLimiter($maxRequests, $windowSeconds){
    global $conn;

    // Get client IP
    $ip = $_SERVER['REMOTE_ADDR'];

    // Current timestamp
    $now = time();
    $windowStart = $now - $windowSeconds;

    // Check existing record
    $stmt = $conn->prepare("SELECT request_count, window_start FROM rate_limit WHERE ip_address = ?");
    $stmt->bind_param('s', $ip);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        $requestCount = $row['request_count'];
        $lastWindow = strtotime($row['window_start']);

        // If the window has expired, reset the counter
        if ($lastWindow < $windowStart) {
            $stmt = $conn->prepare("UPDATE rate_limit SET request_count = 1, window_start = NOW() WHERE ip_address = ?");
            $stmt->bind_param('s', $ip);
            $stmt->execute();
        } else {
            // Increment request count
            $requestCount++;
            if ($requestCount > $maxRequests) {
                http_response_code(429); // Too Many Requests
                die('Error: Too many requests. Please try again later.');
            }
            $stmt = $conn->prepare("UPDATE rate_limit SET request_count = ? WHERE ip_address = ?");
            $stmt->bind_param('is', $requestCount, $ip);
            $stmt->execute();
        }
    } else {
        // New IP, insert record
        $stmt = $conn->prepare("INSERT INTO rate_limit (ip_address, request_count, window_start) VALUES (?, 1, NOW())");
        $stmt->bind_param('s', $ip);
        $stmt->execute();
    }

    $stmt->close();
    $conn->close();
}