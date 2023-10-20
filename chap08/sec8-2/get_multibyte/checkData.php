<?php require_once('../../common/header.php') ?>
<?php
$data = $_GET['data'];
$data = rawurldecode($data); //この部分はURLに情報を載せる際に必要不可欠！
$data = htmlspecialchars($data, ENT_QUOTES, "UTF-8");
echo "「{$data}」を受け取りました"
?>
<p><a href="get_multibyte.php">戻る</a></p>
<?php require_once('../../common/footer.php');
