<?php
require_once('util.php');

$utf8_string = "こんにちは";
$sjis_string = mb_convert_encoding($utf8_string, 'SJIS-win');
//$encoding = mb_internal_encoding();//現在のPHPの文字エンコーディングを取得する←昔の名残で今は全てUTF-8で統一されているから要らない

if (cken($sjis_string)) {
  echo '現在の値はUTF-8です。';
} else {
  echo '現在の値はUTF-8ではありません。';
}
