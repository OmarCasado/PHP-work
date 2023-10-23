<?php
$data = ["田中", "中田", "鈴木"];
$glue = "さん、 ";
$nameList = implode($glue, $data);
$nameList .= "さん";

print_r($nameList);
