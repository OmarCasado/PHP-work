<?php

function oneUp($var)
{
  $var += 1;
  return $var;
}

$num = 5;
$num = oneUp($num);
echo $num;
