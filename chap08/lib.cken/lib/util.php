<?php
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
