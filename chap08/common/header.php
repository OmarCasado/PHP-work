<?php
if (!isset($h1)) { //『!』入れることで『もし$h1に価が設定されていなかったら』になる
  $h1 = "PHP";
}
$cssdir = "http://{$_SERVER['SERVER_NAME']}/chap08/css";
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="<?= $cssdir ?>/../../css/style.css>">
</head>

<body>
  <header>
    <h1><?php echo $h1; ?></h1>
  </header>
  <div>