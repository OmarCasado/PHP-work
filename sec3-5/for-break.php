<?php

$list = [20, -32, 50, -5, 40];

$count = count($list); //5
$sum = 0;

for ($i = 0; $i < $count; $i++) { //0...4
  $value = $list[$i];
  if ($value < 0) {
    // $sum = "{$value}はマイナズ";
    continue;
  } else {
    $sum += $value;
  }
}

echo "合計:", $sum;
