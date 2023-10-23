<?php
session_start();

require_once('../../common/header.php');
?>

このペ－ジから購入するとク－ポン割引が適用されます。<br>

<?php
$_SESSION['coupon'] = 'ABC123';
?>

<a href="goal_page.php">次のページへ</a>

<?php
require_once('../../common/footer.php');
