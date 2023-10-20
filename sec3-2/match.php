<?php

$kuji = mt_rand(1, 6);

$kekka = match ($kuji) {

  1 =>  "大吉",
  2 =>  "中吉",
  3 =>  "小吉",
  4 =>  "末吉",
  5 =>  "凶",
  6 =>  "大凶",
};
echo $kekka;
