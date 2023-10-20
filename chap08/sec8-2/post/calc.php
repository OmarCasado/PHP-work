<?php require_once('../../common/header.php') ?>

<?php
$tanka = (int)$_POST['tanka']; //型変換したほうが良い
$kosu = (int)$_POST['kosu']; //$_POSTで受け取った場合はstring型でデータを取ってしまうから
var_dump($tanka);
var_dump($kosu);
$price = $tanka * $kosu;
$tanka = number_format($tanka);
$price = number_format($price);
echo "単価{$tanka}円 × {$kosu}個は {$price}円です。";
?>

<?php require_once('../../common/footer.php') ?>