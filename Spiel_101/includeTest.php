<?php
if (array_key_exists('wurf',$_POST)){
  wurf();
  $wuerfelergebnis = random_int(1, 6);
  $spieler1->wuerfeln($wuerfelergebnis);
  echo 'Spieler1 hat ' . $spieler1->getZugSumme() . ' Punkte gewürfelt';
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
