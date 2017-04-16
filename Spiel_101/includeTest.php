<?php
if (array_key_exists('wurf',$_POST)){
  wurf();

  $spieler1->wuerfeln($wuerfelergebnis);
  echo '<br>Spieler1 hat ' . $spieler1->getZugSumme() . ' Punkte!';
}

function wurf() {
  global $wuerfelergebnis;

  $wuerfelergebnis = random_int(1, 6);
  echo 'Sie haben eine ' . $wuerfelergebnis . ' gewürfelt';


}
 ?>
