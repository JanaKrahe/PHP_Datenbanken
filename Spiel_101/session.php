<?php
/**
 *
 */
class sessionClass
{

  function SessionStart($benutzername) {
    session_start();
    $_SESSION['email'] = $_POST['email'];

    if (!empty($_SESSION['email'])) {
      $_SESSION['eingeloggt'] = true;
      $_SESSION['spieler1'] = $benutzername;
      $_SESSION['spieler2'] = 'Gast';
      $_SESSION['summeSpielzug'] = 0;
      include ("datenbank.php")
      $db = new DatenbankAufrufe;
      $exist = $db->existSpielstand();
      if (empty($exist)) {
        $_SESSION['runde'] = 1;
        $_SESSION['summeS1'] = 0;
        $_SESSION['summeS2'] = 0;
        $_SESSION['amZug'] = true;
      } else {
        $_SESSION['runde'] = $db->rundenAuslesen();
        $_SESSION['summeS1'] = $db->punkteS1Auslesen();
        $_SESSION['summeS2'] = $db->punkteS2Auslesen();
        $_SESSION['amZug'] = $db->amZugAuslesen();
      }
    } else {
      echo "<b>ungültige Eingabe</b>";
      $_SESSION['eingeloggt'] = false;
    }
  }

}
 ?>
