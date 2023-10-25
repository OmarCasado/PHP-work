<?php
require_once('../../common/header.php');
?>

<form action="search.php" method="post">
  <ul>
    <li>
      <label for="">名前を検索します(部分一致) <br>
        <input type="text" name="name" placeholder="名前">
      </label>
    <li><input type="submit" name="" id="検索"></li>
    </li>
  </ul>
</form>
<?php require_once('../../common/footer.php');
