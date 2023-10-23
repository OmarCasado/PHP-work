<?php
session_start();
require_once('../../lib/util.php');

require_once('../../common/header.php');

if (isset($_SESSION['coupon'])) {
  $coupon = $_SESSION['coupon'];
  $couponList = ['ABC123', 'XYZ999'];
  if (in_array($coupon, $couponList)) {
    echo h($coupon), "は正しいク－ポンコ－ドです。";
  } else {
    echo h($coupon), "は、誤ったク－ポンコ－ドです。";
  }
} else {
  echo "セッションエラ－です。";
}

require_once('../../common/footer.php');
