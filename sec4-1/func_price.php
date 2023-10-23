<?php

function price($tanka, $kosu, $envio)
{
  $souryo = $envio;
  $ryokin = $tanka * $kosu;

  if ($ryokin < 5000) {
    $ryokin += $souryo;
  }
  return $ryokin;
}

$kakaku = price(1000, 3, 250);

echo $kakaku;
