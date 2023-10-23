<?php
$msg = "bla bla bla bla.";
echo mb_strlen($msg), "<br>", PHP_EOL;
echo mb_substr($msg, 4), "<br>", PHP_EOL;
echo mb_substr($msg, 4, 10), "<br>", PHP_EOL;
echo mb_substr($msg, -6), "<br>", PHP_EOL;

$msg2 = "blabla blabla blabla.";
$msg2 = mb_substr($msg2, 0, -1);
echo $msg2;
