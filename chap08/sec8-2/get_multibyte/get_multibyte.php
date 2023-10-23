<?php require_once('../../common/header.php'); ?>
<?php
$data = "東京";
$data = rawurlencode($data); //この部分はURLに情報を載せる際に必要不可欠！
$url = "checkData.php";
echo "<a href={$url}?data={$data}>送信する</a>";
?>
<?php require_once('../../common/footer.php');
