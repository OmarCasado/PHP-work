<?php

<<<<<<< HEAD



=======
function getZipFromPost(&$errors)
{
  $zip = "";
  if (isset($_POST['zip'])) {
    $zip = trim($_POST['zip']);
    $pattern = "/^[0-9]{3}-[0-9]{4}$/";
    if (!preg_match($pattern, $zip)) {
      $errors[] = "郵便番号を正しく入力してください。";
    } else {
      $errors[] = "郵便番号を正しく入力してください。";
    }
  }
  return $zip;
}
>>>>>>> 1317f212e1d92644d8cb49d84cb34c92f1f917c3

?>

<?php require_once('../../common/header.php'); ?>
<?php
require_once('../../lib/util.php');
cken_check($_POST);
?>

<?php
$errors = [];
<<<<<<< HEAD

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

=======
$zip = getZipFromPost($errors);
>>>>>>> 1317f212e1d92644d8cb49d84cb34c92f1f917c3
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