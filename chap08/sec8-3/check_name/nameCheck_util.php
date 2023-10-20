<?php
function getNameFromPost(&$isError): string
{
  $name = "";
  if (isset($_POST['name'])) {
    $name = trim($_POST['name']); //『trim関数』文字列の前後にある空白を排除する関数
    if ($name === "") {
      $isError = true;
    }
  } else {
    $isError = true;
  }
  return $name;
}
