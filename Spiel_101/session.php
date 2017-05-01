<?php
/**
 *
 */
class sessionClass
{

  function SessionStart($benutzername, $db) {
    session_start();
    $_SESSION['email'] = $_POST['email'];

    if (!empty($_SESSION['email'])) {
      $_SESSION['eingeloggt'] = true;
      $_SESSION['spieler1'] = $benutzername;
      $_SESSION['spieler2'] = $benutzername .'\'s Gast';
      $_SESSION['summeSpielzug'] = 0;
      $sId = $db->spielerIdAuslesen();
      $exist = $db->existSpielstandOpen($sId);
      if (empty($exist)) {
        $_SESSION['runde'] = 1;
        $_SESSION['summeS1'] = 0;
        $_SESSION['summeS2'] = 0;
        $_SESSION['amZug'] = true;
      } else {
        $_SESSION['runde'] = $db->rundenAuslesen($exist);
        $_SESSION['summeS1'] = $db->punkteS1Auslesen($exist);
        $_SESSION['summeS2'] = $db->punkteS2Auslesen($exist);
        $_SESSION['amZug'] = $db->amZugAuslesen($exist);
        $_SESSION['spielGeladen'] = true;
      }
    } else {
      echo "<b>ungültige Eingabe</b>";
      $_SESSION['eingeloggt'] = false;
    }
  }

}
 ?>
