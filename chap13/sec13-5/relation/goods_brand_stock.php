<?php
require_once('../../lib/util.php');
$user = 'inventoryuser';
$password = 'inventoryuser';
$dbname = 'inventory';
$host = 'localhost:3306';
$dsn = "mysql:host={$host}; dbname={$dbname}; charset=utf8";
// Can also be written as:
// $dsn = "mysql:host=localhost:3306; dbname=testdb; charset=utf8";

require_once('../../common/header.php');

try {
  $pdo = new PDO($dsn, $user, $password);
  $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = <<< EOS
SELECT
g.id as goods_id,
g.name as goods_name,
g.size as size,
b.name as brand_name,
s.quantity as quantity
FROM goods g
 INNER JOIN brand b
ON g.brand = b.id
  JOIN stock s
  ON g.id = s.goods_id
ORDER BY goods_name
EOS;

  $stm = $pdo->prepare($sql);
  $stm->execute();
  $result = $stm->fetchAll(PDO::FETCH_ASSOC);
  // pre_dump($result);
  echo "<table>";
  echo "<thead><tr>";
  echo "<th>ID</th>";
  echo "<th>商品</th>";
  echo "<th>サイズ</th>";
  echo "<th>ブランド</th>";
  echo "<th>在庫</th>";
  echo "<tbody>";
  foreach ($result as $row) {
    echo "<tr>";
    echo "<td>", h($row['goods_id']), "</td>";
    echo "<td>", h($row['goods_name']), "</td>";
    echo "<td>", h($row['size']), "</td>";
    echo "<td>", h($row['brand_name']), "</td>";
    echo "<td>", h($row['quantity']), "</td>";
    echo "</tr>";
  }
  echo "</tbody>";
  echo "</table>";
} catch (Exception $e) {
  echo '<span class="error">エラ－がありました。</span><br>';
  echo $e->getMessage();
  exit();
}
