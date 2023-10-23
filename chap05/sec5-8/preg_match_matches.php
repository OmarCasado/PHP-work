<?php

$pattern = "/^佐.+子/mu";
//"佐和子", "佐藤静子"
$subject = <<< "names"
佐藤優紀
佐藤裕子
塩田智子
杉山
names;
$result = preg_match($pattern, $subject, $matches);
if ($result === false) {
  echo "エラ－:", preg_last_error();
}
if ($result == 0) {
  echo "マッチした値はありません";
} else {
  echo $matches[0] . "が見つかりました";
}

echo "<pre>";
var_dump($matches);
echo "</pre>";
