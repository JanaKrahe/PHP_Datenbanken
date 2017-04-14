<?php
/**
 *
 */
class RadiobuttonAuswerten
{

  public function auswertung()
  {
    if($_POST['gender'] == "registrieren") {
    header("Location: registrierung.php");
    exit;
    }
    else if($_POST['gender'] == "anmelden") {
    header("Location: login.php");
    exit;
    }
    else if($_POST['gender'] == "loeschen") {
    header("Location: loeschen.php");
    exit;
    }
    else if($_POST['gender'] == "kennwortAendern") {
    header("Location: kennwortAendern.php");
    exit;
    }
  }
}



 ?>
