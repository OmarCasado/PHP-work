<?php
require_once('lib/lib_cken.php');

$gotoURL = "insertForm.php";

if (!cken($_POST)) {
  header("Location: {$gotoURL}");
  exit();
}

$errors = [];

if (count($errors) > 0) {
  print_error($errors);
  echo "<hr>";
  echo "<a href=", $gotoURL, ">戻る<?a>";
}

if (!isset($_POST['name']) || $_POST['name'] === "") {
  $errors[] = "名前が空です。";
}
if (!isset($_POST['age']) || !ctype_digit($_POST['age'])) {
  $errors[] = "年齢が入力されておりません。";
}
if (!isset($_POST['sex']) || in_array($_POST['sex'], ['男', '女'])) {
  $errors[] = "性別が未選択です。";
}

$user = 'testuser';
$password = 'testuser';
$dbname = 'testdb';
$host = 'localhost:3306';
$dsn = "mysql:host={$host};dbname={$dbname};charset=utf8";

require_once('common/header.php');
?>

<?php

$name = $_POST['name'];
$age = $_POST['age'];
$sex = $_POST['sex'];

try {
  $pdo = new PDO($dsn, $user, $password);
  $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "INSERT INTO member (name, age, sex) " .
    " VALUES (:name, :age, :sex)";

  $sql1 = <<< EOS
    INSERT INTO member (name, age, sex)
    VALUES (:name, :age, :sex)
  EOS;

  $stm = $pdo->prepare($sql);
  $stm->bindValue(':name', $name, PDO::PARAM_STR);
  $stm->bindValue(':age', $age, PDO::PARAM_INT);
  $stm->bindValue(':sex', $sex, PDO::PARAM_STR);
  $result = $stm->execute();;
} catch (Exception $e) {
  echo '<span class="error">エラーがありました。</span><br>';
  echo $e->getMessage();
  exit();
}
if ($result) {
  echo "<p>登録成功</p>";
  echo '<a href="index.php">一覧</a>';
} else {
  echo "<p>登録失敗</p>";
  echo "<a href=", $gotoURL, ">一覧</a>";
}

require_once('common/footer.php');
