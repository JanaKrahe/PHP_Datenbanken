<?php
/**
 * Diese Klasse definiert die Instanzen Spieler
 * Ein Spieler ist ausführende Kraft in dem Spiel,
 * teständerung
 */
class Spiel
{
  private $name = '';
  private $summeGesamt = 0;
  /**
  * Konstruktor: Namenszuweisung
  */
  function __construct($pName)
  {
    $name = $pName;
  }

  /**
  * Prüfung, ob der Würfeln-Button gedrückt wurde
  *
  */
  public function wuerfelnAuswertung()
  {
    if (isset($_POST["wurf"]) && $_POST["wurf"] == "Würfeln") {
      $this->wuerfeln();
    }

  }

  /**
  * Speichert Wuerfelergebnis in summeSpielzug
  */
  function wuerfeln()
  {
    //Zufallszahl generieren
    $wuerfelergebnis = random_int(1, 6);

    if($wuerfelergebnis == 1) {
      $this->verlieren();
    }
    else {
      //Berechnung der neuen Summe
      $_SESSION['summeSpielzug'] += $wuerfelergebnis;
    }
  }

  /**
  * Prüfung, ob der Logout-Button gedrückt wurde
  *
  */
  public function sichernAuswertung()
  {
    if (isset($_POST["bunkern"]) && $_POST["bunkern"] == "Bunkern!") {
      $this->sichern();
    }

  }

  /**
  * Speichert summeSpielzug in summeGesamt und "beendet" den Spielzug
  */
  function sichern()
  {
    // Prüfung welcher Spieler dran ist
    if ($_SESSION['amZug'] == true)
    {
      $_SESSION['summeS1'] += $_SESSION['summeSpielzug'];
      $_SESSION['amZug'] = false;
    }
    else {
      $_SESSION['summeS2'] += $_SESSION['summeSpielzug'];
      $_SESSION['runde'] += 1;
      $_SESSION['amZug'] = true;
    }
    $_SESSION['summeSpielzug'] = 0;
    $this->siegerAuswertung();
  }

  /**
  * Setzt summeSpielzug auf 0 und "beendet" Spielzug
  */
  function verlieren()
  {
    // Prüfung welcher Spieler dran ist
    if ($_SESSION['amZug'] == true)
    {
      $_SESSION['amZug'] = false;
    }
    else {
      $_SESSION['runde'] += 1;
      $_SESSION['amZug'] = true;
    }
    $_SESSION['summeSpielzug'] = 0;
  }

  //Getter und Setter

  /**
  * Gibt gespeicherte Punkte des Spielers1 aus
  * @return
  */
  function getGesamtPunkteS1()
  {
    return $_SESSION['summeS1'];
  }

  /**
  * Gibt gespeicherte Punkte des Spielers2 aus
  * @return
  */
  function getGesamtPunkteS2()
  {
    return $_SESSION['summeS2'];
  }

  /**
  * Gibt Anzahl an Wuerfe aus die der Spieler bereits hatte
  * @return
  */
  function getWuerfe()
  {
    //eventuell andersrum^^
    if ($_SESSION['amZug'] == true)
    {
      return $_SESSION['runde'];
    }
    else {
      return $_SESSION['runde'] + 1;
    }

  }

  /**
  * Setzt eine Anzahl Wuerfe
  * @param runde
  */
  function setWuerfe($pZuege)
  {
    $_SESSION['runde'] = $pZuege;
  }

  /**
  *
  * @return Name des Spielers
  */
  function getName()
  {

    return $_SESSION['spieler1'];
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
    if (isset($_GET["logout"])) {
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

  /**
  * Zerstört die aktuelle Session und
  * leitet den Nutzer auf die Login-Seite weiter
  */
  public function anDerReihe()  {
    if ($_SESSION['amZug'] == true) {
      echo $_SESSION['spieler1'] . ' ist am Zug!';
    }
    else {
      echo $_SESSION['spieler2'] . ' ist am Zug!';
    }
  }

  /**
  * Prüfung, ob der Reset-Button gedrückt wurde
  *
  */
  public function resetAuswertung()
  {
    if (isset($_GET["reset"])) {
      $this->reset();
      include('datenbank.php');
      $datenbank = new DatenbankAufrufe;
      $datenbank->speichern();
    }

  }

  /**
  * Setzt alle Werte auf Anfang zurück
  */
  private function reset()
  {
    $_SESSION['summeSpielzug'] = 0;
    $_SESSION['runde'] = 1;
    $_SESSION['summeS1'] = 0;
    $_SESSION['summeS2'] = 0;
    $_SESSION['amZug'] = true;
  }

  public function siegerAuswertung()
  {
    include('datenbank.php');
    $datenbank = new DatenbankAufrufe;

    if ($_SESSION['summeS1'] >= 101) {
      $_SESSION['Sieger'] = $_SESSION['spieler1'];
      $datenbank->beenden();
      header("Location: Sieg.php");
    }
    elseif ($_SESSION['summeS2'] >= 101) {
      $_SESSION['Sieger'] = $_SESSION['spieler2'];
      $datenbank->beenden();
      header("Location: Sieg.php");
    }
  }

  public function speichernAuswertung()
  {
    if (isset($_GET["speichern"])) {
      $this->speicherSpiel();
    }
  }
  public function speicherSpiel()
  {
    include('datenbank.php');
    $datenbank = new DatenbankAufrufe;
    $datenbank->speichern();
  }
}

 ?>
