<?php
if (array_key_exists('wurf',$_POST)){
  wurf();
}

function wurf() {
  $wuerfelergebnis = 0;
  $summe = 0;
  $wuerfe = 0;

  $wuerfelergebnis = random_int(1, 6);
  $summe = $summe + $wuerfelergebnis;
  $wuerfe = $wuerfe + 1;
  echo 'Sie haben eine ' . $wuerfelergebnis . ' gewürfelt';
}
 ?>
