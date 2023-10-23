<?php





?>

<?php require_once('../../common/header.php'); ?>
<?php
require_once('../../lib/util.php');
cken_check($_POST);
?>

<?php
$errors = [];

$zip = '';
if (isset($_POST['zip'])) {
  $zip = trim(mb_convert_kana($_POST['zip'], "s"));
  $pattern = "/^[0-9]{3}-[0-9]{4}$/";
  if (preg_match($pattern, $zip)) {;
  } else {
    $errors[] = "郵便番号を正しく入力してください。";
  }
} else {
  $errors[] = "郵便番号を正しく入力してください。";
}

?>

<?php
if (count($errors) > 0) {
  print_error($errors);
} else {
  echo "郵便番号は", h($zip), "です。";
}
gotoUrl("zipCheckForm.php");
?>

<?php require_once('../../common/footer.php'); ?>