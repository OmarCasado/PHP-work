<?php
$teamA = ["田中", "鈴木", "上野"];
$teamB = ["Juan", "Esteban", "Maria"];

function teamList($teamname, $namelist)
{
  echo "{$teamname}", PHP_EOL;
  echo "<ol>", PHP_EOL;
  for ($i = 0; $i < count($namelist); $i++) {
    echo "<li>", $namelist[$i], "</li>", PHP_EOL;
  }
  echo "</ol>";
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <?php
  teamList("Team A", $teamA);
  teamList("Team B", $teamB);
  ?>

</body>

</html>