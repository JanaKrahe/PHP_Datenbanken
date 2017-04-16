<?php
/**
 * Diese Klasse definiert die Instanzen Spieler
 * Ein Spieler ist ausführende Kraft in dem Spiel,
 * teständerung
 */
class Spieler
{
  private $name = '';
  private $summeSpielzug = 1;
  private $summeGesamt = 0;
  private $wuerfe = 0;
  /**
  * Konstruktor: Namenszuweisung
  */
  function __construct($pName)
  {
    $name = $pName;

  }

  /**
  * Speichert Wuerfelergebnis in summeSpielzug
  */
  function wuerfeln($wuerfelergebnis)
  {
    //global $summeSpielzug;
    var_dump($wuerfelergebnis);
    var_dump($this->summeSpielzug);
    //$this->summeSpielzug = $this->summeSpielzug + $wuerfelergebnis;
    $this->summeSpielzug += $wuerfelergebnis;
    var_dump($wuerfelergebnis);
    var_dump($this->summeSpielzug);

  }

  /**
  * Speichert summeSpielzug in summeGesamt und "beendet" den Spielzug
  */
  function sichern()
  {
    $summeGesamt = $summeGesamt + $summeSpielzug;
    $wuerfe = $wuerfe + 1;
  }

  /**
  * Setzt summeSpielzug auf 0 und "beendet" Spielzug
  */
  function verlieren()
  {
    $summeSpielzug = 0;
    $wuerfe = $wuerfe + 1;
  }

  //Getter und Setter

  /**
  * Gibt gespeicherte Punkte des Spielers aus
  * @return
  */
  function getGesamtPunkte()
  {
    return $summeGesamt;
  }

  /**
  * Gibt Anzahl an Wuerfe aus die der Spieler bereits hatte
  * @return
  */
  function getWuerfe()
  {
    return $wuerfe;
  }

  /**
  * Setzt eine Anzahl Wuerfe
  * @param
  */
  function setWuerfe($pWuerfe)
  {
    $wuerfe = $pWuerfe;
  }

  /**
  *
  * @return Name des Spielers
  */
  function getName()
  {
    return $name;
  }

  function getZugSumme()
  {

    return $this->summeSpielzug;
  }
}

 ?>
