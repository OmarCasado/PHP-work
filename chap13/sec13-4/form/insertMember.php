<?php
require_once('../../lib/util.php');
require_once('all.php');
$gotoURL = "insertForm.php";

if (!cken($_POST)) {
  header("Location: {$gotoURL}");
  exit();
}

$errors = [];

if (!isset($_POST['name']) || $_POST['name'] === "") {
  $errors[] = "名前がからです。";
}

if (!isset($_POST['age']) || !ctype_digit($_POST['age'])) {
  $errors[] = "数値を入れてください。";
}

if (!isset($_POST['sex']) || in_array($_POST['sex'], ['男', '女'])) {
  $errors[] = "性別が不正です。";
}

if (count($errors) > 0) {
  print_error($errors);
  echo "<hr>";
  echo '<a href=">', $gotoURL, '">戻る</a>';
}

$user = 'testuser';
$password = 'testuser';
$dbname = 'testdb';
$host = 'localhost:3306';
$dsn = "mysql:host={$host}; dbname={$dbname}; charset=utf8";
// Can also be written as:
// $dsn = "mysql:host=localhost:3306; dbname=testdb; charset=utf8";

require_once('../../common/header.php');

$name = $_POST['name'];
$age = $_POST['age'];
$sex = $_POST['sex'];
$result = false;

try {
  $pdo = new PDO($dsn, $user, $password);
  $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "デ－タベ－ス{$dbname}に接触しました。";
  $sql = "INSERT INTO member (name, age, sex) " .
    " VALUES (:name, :age, :sex)";
  $sql2 = <<< EOS
    SELECT * FROM member
    VALUES (:name, :age, :sex)
EOS;

  $stm = $pdo->prepare($sql);
  $stm->bindValue(':name', $name, PDO::PARAM_STR);
  $stm->bindValue(':age', $age, PDO::PARAM_INT);
  $stm->bindValue(':sex', $sex, PDO::PARAM_STR);
  $result = $stm->execute();

  // pre_dump($result);
  echo "<table>";
  echo "<thead><tr>";
  echo "<th>ID</th>";
  echo "<th>名前</th>";
  echo "<th>年齢</th>";
  echo "<th>性別</thead>";
  echo "<tbody>";
  foreach ($result as $row) {
    echo "<tr>";
    echo "<td>", h($row['id']), "</td>";
    echo "<td>", h($row['name']), "</td>";
    echo "<td>", h($row['age']), "</td>";
    echo "<td>", h($row['sex']), "</td>";
    echo "</tr>";
  }
  echo "</tbody>";
  echo "</table>";
} catch (Exception $e) {
  echo '<span class="error">エラ－がありました。</span><br>';
  echo $e->getMessage();
  exit();
}

if ($result) {
  echo "<p>登録成功</p>";
  echo '<a href="all.php">一覧</a>';
} else {
  echo "<p>登録失敗</p>";
  echo '<a href="', $gotoURL, '">もどる</a>';
}

require_once('../../common/footer.php');
