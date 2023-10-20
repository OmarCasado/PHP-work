<?php
$colors = [];
$colors[] = "赤";
$colors[] = "青";
$colors[] = "黄";
$colors[] = "白";

array_push($colors, "緑");

//The value of the array &colors is copied and inserted within the variable $a
//so, we now have two different arrays ($a and $colors).
$a = $colors;
$a[1] = "灰";

print_r($colors);
print_r($a);
