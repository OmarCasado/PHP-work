<?php
$meat = "チキン南蛮";
$fish = "鯖の竜田揚げ";
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <div class="main-contents">
    本日のランチ、肉料理は、
    <h1>
      <?php echo $meat; ?>
    </h1>
    魚料理は、
    <h1>
      <?php echo $fish; ?>
    </h1>
  </div>



</body>

</html>