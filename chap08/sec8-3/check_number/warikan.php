<?php require_once('../../common/header.php'); ?>

<?php
require_once('../../lib/util.php');
<<<<<<< HEAD
=======
require_once('warikan_util.php');
>>>>>>> 1317f212e1d92644d8cb49d84cb34c92f1f917c3
cken_check($_POST);
?>

<?php
$errors = [];
<<<<<<< HEAD

$goukei = 0;
if (isset($_POST['goukei'])) {
  $goukei = $_POST['goukei'];
  //ctype_digit checks for a numeric character
  if (ctype_digit($goukei)) {
    $goukei = (int) $goukei;
  } else {
    $errors[] = "合計金額を整数でｎ入力してください。";
  }
} else {
  $errors[] = "合計金額が未設定。";
}

$ninzun = 0;
if (isset($_POST['ninzu'])) {
  $ninzu = $_POST['ninzu'];
  if (ctype_digit($ninzu)) {
    $ninzu = (int) $ninzu;
    if ($ninzu === 0) {
      $errors[] = "0人では割れません。";
    }
  }
} else {
  $errors[] = "人数が未設定。";
}

=======
$goukei = getGoukeiFromPost($errors);
$ninzu = getNinzuFromPost($errors);
>>>>>>> 1317f212e1d92644d8cb49d84cb34c92f1f917c3
?>

<?php
if (count($errors) > 0) {
  print_error($errors);
?>
  <form method="post" action="warikanForm.php">
    <ul>
      <li><input type="submit" value="戻る"></li>
    </ul>
  </form>
<?php
} else {
  $amari = $goukei % $ninzu;
  $price = ($goukei - $amari) / $ninzu;
  $goukei_fmt = number_format($goukei);
  $price_fmt = number_format($price);
  echo h($goukei_fmt), "円を";
  echo h($ninzu), "人で割り勘します。<br>";
  echo "1人あたり", h($price_fmt);
  echo "円を支払えば、不足分は", h($amari), "円です。";
}
