<?php require_once('common/header.php') ?>

<article>
  <h2>新規登録</h2>
  <form method="post" action="insert_member.php">
    <ul>
      <li><label>名前:<input type="text" name="name" placeholder="名前"></label></li>
      <li><label>年齢:<input type="number" name="age" placeholder="半角数字"></label></li>
      <li><label><input type="radio" name="sex" value="男" placeholder="男">男性</label></li>
      <li><label><input type="radio" name="sex" value="女" placeholder="女">女性</label></li>
      <li><input type="submit" value="追加"></li>
    </ul>
  </form>
</article>
<?php require_once('common/aside.php') ?>
<?php require_once('common/footer.php') ?>