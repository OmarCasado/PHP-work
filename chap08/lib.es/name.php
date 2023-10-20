<?php require_once('lib/util.php'); ?>

<?php
$name = $_POST['name'];
?>
<?php require_once('../common/header.php'); ?>

<p>名前: <?php echo es($name); ?></p>

<p><a href="nameForm.php">戻る</a></p>
<?php require_once('../common/footer.php'); ?>