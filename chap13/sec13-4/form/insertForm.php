<?php require_once('../../common/header.php'); ?>

<form action="insert_member.php" method="post">
  <ul>
    <li>
      <label for="">年齢:
        <input type="number" name="age" placeholder="半角数字">
      </label>
    </li>
    <li>
      <label for="">
        <input type="radio" name="sex" value="男">男性
        <input type="radio" name="sex" value="女">女性
      </label>
    </li>
    <li><input type="submit" value="追加"></li>
  </ul>
</form>

<?php require_once('../../common/footer.php');
