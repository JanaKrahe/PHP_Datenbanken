<?php
/**
 *
 */
class DatenbankAufrufe
{
  function datenbankVerbinden(){
    $pdo = new PDO('mysql:host=localhost;dbname=benutzer101','root','');
    if (!$pdo) {
        die("Connection failed: " . mysqli_connect_error());
    }
  }

  function benutzerAnlegen()
  {
  $pdo = new PDO('mysql:host=localhost;dbname=benutzer101','root','');
    $neuer_user = array();
    $neuer_user['email'] = $_POST['email'];
    $neuer_user['passwort'] = $_POST['passwort'];
    $neuer_user['benutzername'] = $_POST['benutzername'];
    $sqlStatement = "INSERT INTO user101 (email, passwort, name) VALUES (:email,:passwort,:benutzername)";
    $stmt = $pdo->prepare($sqlStatement);
    $stmt->execute($neuer_user);
    header("Location: login.php");
    echo "Der Benutzer wurde angelegt.";
  }

  function existBenutzer(){
    $pdo = new PDO('mysql:host=localhost;dbname=benutzer101','root','');
    $sqlStatement = "SELECT * FROM user101 WHERE email = '".$_POST['email']."' AND name = '".$_POST['benutzername']."'";
    $stmt = $pdo->prepare($sqlStatement);
    $stmt->execute();
    $test = $stmt->rowCount();
    if ($test == 0) {
      $this->benutzerAnlegen();
    }else {
      echo "Der Benutzer existiert bereits.";
    }
  }

function benutzerAnmelden(){
  include ('PasswortSpeichern.php');
  $pasw = new PasswortSpeichern;
  $pasw->passwortVerschluesseln();
  $pdo = new PDO('mysql:host=localhost;dbname=benutzer101','root','');
  $sqlStatement = "SELECT * FROM user101 WHERE email = '".$_POST['email']."' AND passwort = '".$_POST['passwort']."'";
  $stmt = $pdo->prepare($sqlStatement);
  $stmt->execute();
  $test = $stmt->rowCount();
  echo "TEST ".$test  ;
  echo $_POST['passwort'];
  if ($test != 0) {
    // header("Location: kennwortAendern.php");
    echo "Durchgelaufen";
  }else {
    echo "Die Benutzerdaten stimmen nicht überein.";
  }
}

function passwortAuslesen(){
  $pdo = new PDO('mysql:host=localhost;dbname=benutzer101','root','');
  $sqlStatement = "SELECT passwort FROM user101 WHERE email = '".$_POST['email']."'";
  $stmt = $pdo->prepare($sqlStatement);
  $stmt->execute();
  $ergebnis = $stmt->fetch();
  echo $ergebnis;
}

}

 ?>
