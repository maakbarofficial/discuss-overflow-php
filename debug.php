<?php
function debug($data, $die = false)
{
  $bt = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 1);
  $file = $bt[0]['file'] ?? 'unknown file';
  $line = $bt[0]['line'] ?? '?';

  echo '<pre style="background:#ffa500; color:#000; padding:10px; border-radius:5px;">';
  echo "<strong>Debugger called at</strong> $file at line $line\n\n";
  print_r($data);
  echo '</pre>';

  if ($die) {
    die();
  }
}
