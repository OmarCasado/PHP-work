<?php
require_once('../../lib/util.php');
<<<<<<< HEAD
=======
require_once('nameCheck_util.php');
>>>>>>> 1317f212e1d92644d8cb49d84cb34c92f1f917c3

cken_check($_POST);
?>
<?php
$isError = false;
<<<<<<< HEAD
$name = "";
if (isset($_POST['name'])) {
  //trim deletes the spaces before or/and after of the data.
  //mb_convert_kana transforms the 全角spaces (If some) into 半角spaces.
  $name = trim(mb_convert_kana($_POST['name'], "s"));
  $len = mb_strlen($name);
  if ($len > 30 || $len === 0) {
    $isError = true;
  }
} else {
  $isError = true;
}
=======
$name = getNameFromPost($isError);
>>>>>>> 1317f212e1d92644d8cb49d84cb34c92f1f917c3
?>

<?php require_once('../../common/header.php'); ?>

<?php if ($isError) : ?>
  <span class="error">名前を入力して下さい</span>
  <form method="post" action="nameCheckForm.php">
    <input type="submit" value="戻る">
  </form>
<?php else : ?>
  <span>こんにちは、<?php echo h($name); ?>さん</span><br>
<?php endif; ?>
<a href="nameCheckForm.php">戻る</a>