<?php

$k = 0;
do {
  $k++;
  $a = mt_rand(1, 13);
  $b = mt_rand(1, 13);
  $c = mt_rand(1, 13);
  $abc = $a + $b + $c;

  if ($abc === 21) {
    break;
  }
} while (TRUE);

echo $k . "回, " . $a . ", " . $b . ", " . $c . ",";
