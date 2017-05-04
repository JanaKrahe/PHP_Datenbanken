<?php
/**
 * Diese Klasse definiert die Instanzen Spieler
 * Ein Spieler ist ausführende Kraft in dem Spiel,
 * teständerung
 */
class Spiel
{
  /**
  * Konstruktor: 
  */
  function __construct()
  {
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
    $_SESSION['wuerfelErgebnis'] = $wuerfelergebnis;

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
    if (isset($_POST["bunkern"]) && $_POST["bunkern"] == "Bunkern") {
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
  * Prüft, welcher Spieler am Zug ist
  *
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
      $this->speicherSpiel();
    }

  }

  /**
  * Setzt alle Session-Variablen auf Null zurück
  *
  */
  public function reset()
  {
    $_SESSION['summeSpielzug'] = 0;
    $_SESSION['runde'] = 1;
    $_SESSION['summeS1'] = 0;
    $_SESSION['summeS2'] = 0;
    $_SESSION['amZug'] = true;
    $_SESSION['sieger'] = NULL;
  }

  /**
  * Prüfung, ob ein Spieler gewonnen hat
  *
  */
  public function siegerAuswertung()
  {
    include('datenbank.php');
    $datenbank = new DatenbankAufrufe;

    if ($_SESSION['summeS1'] >= 101) {
      $_SESSION['sieger'] = $_SESSION['spieler1'];
      $datenbank->beenden();
      header("Location: Sieg.php");
    }
    elseif ($_SESSION['summeS2'] >= 101) {
      $_SESSION['sieger'] = $_SESSION['spieler2'];
      $datenbank->beenden();
      header("Location: Sieg.php");
    }
  }

  /**
  * Prüfung, ob der Speichern-Button gedrückt wurde
  *
  */
  public function speichernAuswertung()
  {
    if (isset($_GET["speichern"])) {
      $this->speicherSpiel();
    }
  }

  /**
  * Speichert das Spiel in der Datenbank
  *
  */
  public function speicherSpiel()
  {
    include('datenbank.php');
    $datenbank = new DatenbankAufrufe;
    $datenbank->speichern();
  }
}
?>
