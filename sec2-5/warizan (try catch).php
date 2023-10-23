<?php

$a = 13;
$b = 0;

try {
  $c = $a / $b;
  // $c = intdiv($a, $b);
  echo $c;
} catch (DivisionByZeroError $e) {
  echo "It is not possible to divide by Zero";
}
