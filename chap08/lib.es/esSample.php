<?php require_once('../common/header.php') ?>
<pre>
<?php
require_once('lib/util.php');
$myCode = "<h2>テスト</h2>";
$myArray = [
  "a" => "<p>赤</p>",
  "b" => "<script>alert('hello')</script>",
];
echo '$myCodeの値:', es($myCode);
echo PHP_EOL . PHP_EOL;
echo '$myCodeの値:';
print_r(es($myArray))
?>
</pre>
<?php require_once('../common/footer.php') ?>