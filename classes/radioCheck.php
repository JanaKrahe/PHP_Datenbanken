<?php
/**
 *
 */
class RadiobuttonAuswerten
{

  public function auswertung()
  {
    if($_POST['gender'] == "registrieren") {
      $_SESSION['location'] = 'registrieren';
      header("Location: index.php");
      exit;
    }
    else if($_POST['gender'] == "anmelden") {
      $_SESSION['location'] = 'anmelden';
      header("Location: index.php");
      exit;
    }
    else if($_POST['gender'] == "loeschen") {
      $_SESSION['location'] = 'loeschen';
      header("Location: index.php");
      exit;
    }
    else if($_POST['gender'] == "kennwortAendern") {
      $_SESSION['location'] = 'kennwortAendern';
      header("Location: index.php");
      exit;
    }
  }
}



 ?>
