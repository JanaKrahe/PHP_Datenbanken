<?php
/**
 * Diese Klasse definiert die Instanzen Spieler
 * Ein Spieler ist ausführende Kraft in dem Spiel,
 * teständerung
 */
class Spieler
{
  private $name = '';
  private $summeGesamt = 0;
  private $zuege = 0;
  /**
  * Konstruktor: Namenszuweisung
  */
  function __construct($pName)
  {
    $name = $pName;
    $test = false;
    $i = 1;
    while ($test == false){
      if(isset($_SESSION["Spieler$i"])) {
        $i++;
      }
      else{
        $_SESSION["Spieler"."$i"] = $pName;
        $test = true;
      }
    }
  }

  /**
  * Prüfung, ob der Würfeln-Button gedrückt wurde
  *
  */
  public function wuerfelnAuswertung()
  {
    if (isset($_POST["wurf"]) && $_POST["wurf"] == "Würfeln") {
      $this->wuerfeln();
      var_dump($_SESSION['summeSpielzug']);
    }

  }

  /**
  * Speichert Wuerfelergebnis in summeSpielzug
  */
  function wuerfeln()
  {
    //Zufallszahl generieren
    $wuerfelergebnis = random_int(1, 6);
    var_dump($wuerfelergebnis);
    //Überprüfen ob summeSpielzug vorhanden
    if(!empty($_SESSION['summeSpielzug'])) {
      var_dump($_SESSION['summeSpielzug']);
      //Hilfsvariable zur Berechnung der neuen Summe
      $ze = $_SESSION['summeSpielzug'];
      $ze += $wuerfelergebnis;
      $_SESSION['summeSpielzug'] = $ze;
      #$_SESSION['summeSpielzug'] += $wuerfelergebnis;
      var_dump($_SESSION['summeSpielzug']);
    }
    else {
      //summeSpielzug erstellen und = Zufallszahl setzen
      $_SESSION['summeSpielzug'] = 0;
      $_SESSION['summeSpielzug'] = $wuerfelergebnis;
      echo 'Ich war hier' . "<br>";
    }
  }

  /**
  * Speichert summeSpielzug in summeGesamt und "beendet" den Spielzug
  */
  function sichern()
  {
    // Wert in DB speichern!
    $summeGesamt = $summeGesamt + $_SESSION['summeSpielzug'];
    //Züge in DB erhöhen
    $zuege = $zuege + 1;
  }

  /**
  * Setzt summeSpielzug auf 0 und "beendet" Spielzug
  */
  function verlieren()
  {
    $_SESSION['summeSpielzug'] = 0;
    $zuege = $zuege + 1;
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
    return $zuege;
  }

  /**
  * Setzt eine Anzahl Wuerfe
  * @param Zuganzahl
  */
  function setWuerfe($pZuege)
  {
    $this->zuege = $pZuege;
  }

  /**
  *
  * @return Name des Spielers
  */
  function getName()
  {

    return $this->name;
  }

  /**
  *
  * @return Summe der in diesem Spielzug erzielten Punkte
  */
  function getZugSumme()
  {
    if(isset($_SESSION['summeSpielzug'])) {
      return $_SESSION['summeSpielzug'];
    }
    else {
      echo 'Es wurde noch nicht gewürfelt in diesem Zug!';
    }
  }

  /**
  * Prüfung, ob der Logout-Button gedrückt wurde
  *
  */
  public function logoutAuswertung()
  {
    if (isset($_POST["logout"]) && $_POST["logout"] == "logout") {
      $this->logout();
    }

  }

  /**
  * Zerstört die aktuelle Session und
  * leitet den Nutzer auf die Login-Seite weiter
  */
  private function logout()
  {
    session_unset();
    session_destroy();
    header("Location: login.php");
  }
}

 ?>
