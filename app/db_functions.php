<?php

function connect()
{
  $user = 'testuser';
  $password = 'testuser';
  $dbname = 'testdb';
  $host = 'localhost:3306';
  $dsn = "mysql:host={$host};dbname={$dbname};charset=utf8";
  $pdo = null;
  try {
    $sql = "SELECT * FROM member"; //①
    $stm = $pdo->prepare($sql); //②PDOの『prepare』メソッドで上記のSQL文($sql)をセットしている。
    $stm->execute(); //③『execute』は実行メソッド
    $result = $stm->fetchAll(PDO::FETCH_ASSOC); //④『FETCH_ASSOC』は連想配列(ASSOC)でフェッチするプロパティ
  } catch (Exception $e) {
    echo '<span class="error">エラーがありました。</span><br>';
    echo $e->getMessage();
    $result = null;
  }
  return $pdo;
}

function find_all()
$result = null;
$pdo = connect();
{
  try {
    $sql = "SELECT * FROM member"; //①
    $stm = $pdo->prepare($sql); //②PDOの『prepare』メソッドで上記のSQL文($sql)をセットしている。
    $stm->execute(); //③『execute』は実行メソッド
    $result = $stm->fetchAll(PDO::FETCH_ASSOC); //④『FETCH_ASSOC』は連想配列(ASSOC)でフェッチするプロパティ
  } catch (Exception $e) {
    echo '<span class="error">エラーがありました。</span><br>';
    echo $e->getMessage();
    $result = null;
  }
  return $result;
}