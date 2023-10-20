<?php

function gotoUrl($url)
{ ?>
  <form action=<?= $url; ?> method="post">
    <ul>
      <li><input type="submit" value="戻る"></li>
    </ul>
  </form>
<?php
}

function print_error($errors)
{
  echo '<ol class="errors">';
  foreach ($errors as $value) {
    echo "<li>{$value}</li>";
  }
  echo '</ol>';
}


//function es(array|string $data, string $charset = 'UTF-8'): mixed
//{
//  if (is_array($data)) {
//    return array_map(__METHOD__, $data);
//  } else {
//    return htmlspecialchars($data, ENT_QUOTES, $charset);
//  }
//}

function h(string $data)
{
  return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}

function cken_check(array|string $data): void
{
  if (!cken($_POST)) {
    $err = "Encoding Error! The expected encoding is UTF-8";
    exit($err);
  }
}

function cken(array|string $data): bool
{
  if (phpversion() >= "7.2.0") {
    return mb_check_encoding($data);
  } else {
    if (is_array($data)) {
      return cken_old($data);
    } else {
      return mb_check_encoding($data);
    }
  }
}

// php7.2.0より前のバージョン用
// $dataがUTF-8ならばtrue
// $dataがUTF-8でないなら、false
function cken_old(array $data): bool
{
  $result = true;
  foreach ($data as $key => $value) {
    if (is_array($value)) {
      $value = implode("", $value); //『""』隙間なしでという意味
    }
    if (!mb_check_encoding($value)) { //指定なしの場合は『UTF-8』かどうか確認
      $result = false;
      break;
    }
  }
  return $result;
}
