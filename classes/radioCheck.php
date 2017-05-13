<?php
/**
 *
 */
class RadiobuttonAuswerten
{
  /**
  * Methode zum Prüfen der Radio-Button Auswachl.
  */
  public function auswertung()
  {
    if($_POST['gender'] == "registrieren") {
      header("Location: index.php?site=registrieren");
      exit;
    }
    else if($_POST['gender'] == "anmelden") {
      header("Location: index.php?site=anmelden");
      exit;
    }
    else if($_POST['gender'] == "loeschen") {
      header("Location: index.php?site=loeschen");
      exit;
    }
    else if($_POST['gender'] == "kennwortAendern") {
      header("Location: index.php?site=kennwortAendern");
      exit;
    }
  }
}



 ?>
