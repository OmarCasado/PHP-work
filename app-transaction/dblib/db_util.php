<?php

function connect()
{
  $user = 'inventoryuser';
  $password = 'inventoryuser';
  $dbname = 'inventory';
  $host = 'localhost:3306';
  $dsn = "mysql:host={$host}; dbname={$dbname}; charset=utf8";
  $pdo = null;
  // Can also be written as:
  // $dsn = "mysql:host=localhost:3306; dbname=testdb; charset=utf8";

  try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (Exception $e) {
    echo '接続エラ－。';
    echo $e->getMessage();
    $pdo = null;
  }
  return $pdo;
}

function find_goods_brand_stock()
{
  $pdo = connect();

  $result = null;
  try {
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
  } catch (Exception $e) {
    $result = null;
  }
  return $result;
}
