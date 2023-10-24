<?php

function find_all()
{
  $user = 'testuser';
  $password = 'testuser';
  $dbname = 'testdb';
  $host = 'localhost:3306';
  $dsn = "mysql:host={$host}; dbname={$dbname}; charset=utf8";
  // Can also be written as:
  // $dsn = "mysql:host=localhost:3306; dbname=testdb; charset=utf8";
  try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "デ－タベ－ス{$dbname}に接触しました。";
    $sql = "SELECT * FROM member";
    $stm = $pdo->prepare($sql);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
  } catch (Exception $e) {
    echo '<span class="error">エラ－がありました。</span><br>';
    echo $e->getMessage();
    $result = null;
  }
  return $result;
}
