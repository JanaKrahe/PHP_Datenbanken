<?php
/**
 * Diese Klasse definiert die Instanzen Spiel
 * Ein Spiel ist ausführende Kraft,
 * Im Spiel wird der Spielstand manipuliert
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

    //Wenn 1 dann Spielzug Summe der erwürfelten Augen verlieren und Gegner ist an der Reihe
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
  * Beendet die aktuelle Session und
  * leitet den Nutzer auf die Login-Seite weiter
  */
  private function logout()
  {
    $_SESSION['Ich'] = 'war hier';
    session_unset();
    session_destroy();
    //$_POST['site'] = 'anmelden';
    header("Location: index.php?site=logout");
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
  */
  public function resetAuswertung()
  {
    if (isset($_GET["reset"])) {
      $this->reset();
      $this->speicherSpiel();
    }

  }

  /**
  * Setzt Session-Variablen zurück und
  */
  public function resetNachSieg()
  {
    if (isset($_GET["reset"])) {
      $this->reset();
      $this->speicherSpiel();
      //$_POST['site'] = 'main';
      header("Location: index.php");
    }
  }
  /**
  * Setzt alle Session-Variablen auf Null zurück
  *
  */
  private function reset()
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
    $datenbank = new DatenbankAufrufe;

    if ($_SESSION['summeS1'] >= 101) {
      $_SESSION['sieger'] = $_SESSION['spieler1'];
      $datenbank->beenden();
      //$_POST['site'] = 'sieg';
      header("Location: index.php?site=sieg");
      //var_dump($_POST);
    }
    elseif ($_SESSION['summeS2'] >= 101) {
      $_SESSION['sieger'] = $_SESSION['spieler2'];
      $datenbank->beenden();
      //$_POST['site'] = 'sieg';
      header("Location: index.php?site=sieg");
    }
    unset($datenbank);
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
    $datenbank2 = new DatenbankAufrufe;
    $datenbank2->speichern();
    unset($datenbank2);
    //header("Location: index.php");
  }
}
?>
