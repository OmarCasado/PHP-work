<?php

$kuji = mt_rand(1, 6);

switch ($kuji) {
  case 1:
    echo "大吉";
    break;
  case 2:
    echo "中吉";
    break;
  case 3:
    echo "小吉";
    break;
  case 4:
    echo "末吉";
    break;
  case 5:
    echo "凶";
    break;
  case 6:
    echo "大凶";
    break;
}
