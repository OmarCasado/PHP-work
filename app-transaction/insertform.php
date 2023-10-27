<?php
require_once('lib/util.php');
$gobackURL = 'insertform.php';

$user = 'inventoryuser';
$password = 'inventoryuser';
$dbname = 'inventory';
$host = 'localhost:3306';
$dsn = "mysql:host={$host}; dbname={$dbname}; charset=utf8";
// Can also be written as:
// $dsn = "mysql:host=localhost:3306; dbname=testdb; charset=utf8";
try {
  $pdo = new PDO($dsn, $user, $password);
  $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "SELECT id, name FROM brand";
  $stm = $pdo->prepare($sql);
  $stm->execute();
  $brand = $stm->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
  echo '<span class="error">エラ－がありました。</span><br>';
  echo $e->getMessage();
  exit();
}
?>
<?php require_once('common/header.php'); ?>

<form action="insert_goods.php" method="post">
  <li>
    <label for="">商品ID:
      <input type="text" name="id" placeholder="商品ID">
    </label>
  </li>

  <li>
    <label for="">商品名:
      <input type="text" name="name" placeholder="商品名">
    </label>
  </li>

  <li>
    <label for="">サイズ:
      <input type="text" name="size" placeholder="未入力OK">
    </label>
  </li>

  <li>
    <select name="brand" id="">
      <?php
      foreach ($brand as $row) {
        echo '<option value="', $row['id'], '">', $row['name'], '</option>';
      }
      ?>
    </select>
  </li>

  <li>
    <label for="">個数:
      <input type="number" name="quantity" placeholder="半角数字">
    </label>
  </li>

  <input type="submit" value="追加する">
</form>

<?php require_once('common/footer.php'); ?>