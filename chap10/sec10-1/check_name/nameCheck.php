<?php
session_start();
require_once('../../lib/util.php');

cken_check($_POST);
?>
<?php
$errors = [];
$name = "";
if (isset($_POST['name'])) {
  //trim deletes the spaces before or/and after of the data.
  //mb_convert_kana transforms the 全角spaces (If some) into 半角spaces.
  $name = trim(mb_convert_kana($_POST['name'], "s"));
  $len = mb_strlen($name);
  if ($len > 30 || $len === 0) {
    $errors[] = "名前が不正です。";
  }
} else {
  $errors[] = "名前が未入力。";
}
?>

<?php require_once('../../common/header.php'); ?>

<?php if (count($errors) > 0) : ?>

  <?
  $_SESSION['errors'] = $errors;

  //Redirect function.
  header('Location: nameCheckForm.php');
  exit(); ?>



<?php else : ?>
  <span>こんにちは、<?php echo h($name); ?>さん</span><br>
<?php endif; ?>
<a href="nameCheckForm.php">戻る</a>