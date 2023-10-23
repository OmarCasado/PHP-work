<?php



//$i starts from 0
//$i is counted from 0 to 3
//$j starts from 0 and is counted until 5 while $i is 0


for ($i = 0; $i <= 3; $i++) {
  for ($j = 0; $j <= 5; $j++) {
    echo "{$i}-{$j}" . "|";
  }
  echo "<br>", PHP_EOL;
}
