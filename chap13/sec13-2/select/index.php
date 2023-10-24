<?php
require_once('../../lib/util.php');
require_once('dbfunctions.php');

require_once('../../common/header.php');
?>

<?php
$result = find_all();
if (!$result) {
  exit();
}
?>



<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../../css/style.css">
  <link rel="stylesheet" href="../../css/tablestyle.css">
</head>

<body>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>名前</th>
        <th>年齢</th>
        <th>性別</th>
      </tr>
    </thead>
    <tbody>

      <?php foreach ($result as $row) : ?>

        <tr>
          <td><?= h($row['id']) ?> </td>
          <td><?= h($row['name']) ?> </td>
          <td><?= h($row['age']) ?> </td>
          <td><?= h($row['sex']) ?> </td>
        </tr>

      <?php endforeach; ?>

    </tbody>
  </table>

</body>

</html>