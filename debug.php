<?php
function debug($data, $die = false)
{
  echo '<pre style="background:#ffa500; color:#000; padding:10px; border-radius:5px;">';
  print_r($data);
  echo '</pre>';

  if ($die) {
    die();
  }
}
