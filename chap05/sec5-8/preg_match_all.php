<?php
$pattern = "/201[2-5](AX|FX)/i";
$subject = "2011AX, 2012Fx, 2012AF, 2013FX, 2015ax, 2016";
$result = preg_match_all($pattern, $subject, $matches);
if ($result === false) {
  echo "エラ－", preg_last_error();
} else if ($result == 0) {
  echo "マッチした形式はありません。";
} else {
  echo implode(", ", $matches[0]);
}

echo "<pre>";
var_dump($matches);
echo "</pre>";
