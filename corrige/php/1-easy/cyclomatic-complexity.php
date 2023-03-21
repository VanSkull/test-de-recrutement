<?php

function convertSize($bytes, $precision = 2) {

  $units = ['B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB', 'HB'];
  $index = 0;

  while($bytes >= 1024 && $index < (count($units) - 1)){
    $bytes /= 1024;
    $index++;
  }

  return round($bytes, $precision) . " " . $units[$index];
}