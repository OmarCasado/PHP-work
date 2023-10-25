<?php
require_once('../../lib/util.php');
$gotoURL = "search.php";

if (!cken($_POST)) {
  header("Location: {$gotoURL}");
  exit();
}

if (empty($_POST)) {
  header("Location: {$gotoURL}");
  exit();
} else if (!isset($_POST['name']) || $_POST['name'] === "") {
  header("Location: {$gotoURL}");
  exit();
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

try {
  $pdo = new PDO($dsn, $user, $password);
  $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "デ－タベ－ス{$dbname}に接触しました。";
  $sql = "SELECT * FROM member " .
    " WHERE name LIKE :name";
  $sql2 = <<< EOS
    SELECT * FROM member
    WHERE name LIKE :name
EOS;

  $stm = $pdo->prepare($sql);
  $stm->bindValue(':name', "%{$name}%", PDO::PARAM_STR);
  $stm->execute();
  $result = $stm->fetchAll(PDO::FETCH_ASSOC);
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
