<?php
/**
 *
 */
class RadiobuttonAuswerten
{

  public function auswertung()
  {
    if($_POST['gender'] == "registrieren") {
      $_POST['site'] = "registrieren";
      //header("Location: index.php");
      exit;
    }
    else if($_POST['gender'] == "anmelden") {
      $_POST['site'] = "anmelden";
      //header("Location: login.php");
      exit;
    }
    else if($_POST['gender'] == "loeschen") {
      $_POST['site'] = "loeschen";
      //header("Location: loeschen.php");
      exit;
    }
    else if($_POST['gender'] == "kennwortAendern") {
      $_POST['site'] = "kennwortAendern";
      //header("location: kennwortAendern.php");
      exit;
    }
  }
}



 ?>
