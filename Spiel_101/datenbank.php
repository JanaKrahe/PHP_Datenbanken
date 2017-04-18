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
    $sqlStatement = "SELECT * FROM user101 WHERE email = '".$_POST['email']."'";
    $stmt = $pdo->prepare($sqlStatement);
    $stmt->execute();
    $test = $stmt->rowCount();
    if ($test == 0) {
      return false;
    }else {
      return true;
    }
  }

function passwortAuslesen(){
  $pdo = new PDO('mysql:host=localhost;dbname=benutzer101','root','');
  $sqlStatement = "SELECT passwort FROM user101 WHERE email = '".$_POST['email']."'";
  $stmt = $pdo->prepare($sqlStatement);
  $stmt->execute();
  $ergebnis = $stmt->fetchColumn();
  return $ergebnis;
}

function benutzerLoeschen(){
  $pdo = new PDO('mysql:host=localhost;dbname=benutzer101','root','');
  $sqlStatement = "DELETE FROM user101 WHERE email = '".$_POST['email']."'";
  $stmt = $pdo->prepare($sqlStatement);
  $stmt->execute();
  echo "Der Benutzer wurde gelöscht.";
}

  function kennwortAendern($hashPasswort){
    $pdo = new PDO('mysql:host=localhost;dbname=benutzer101','root','');
    $sqlStatement = "UPDATE user101 SET passwort = '".$hashPasswort."' WHERE email = '".$_POST['email']."'";
    $stmt = $pdo->prepare($sqlStatement);
    $stmt->execute();
    echo "Das Passwort wurde geändert.";
  }



// function test(){
//   include ('PasswortSpeichern.php');
//   $pasw = new PasswortSpeichern;
//   $ergebnis = $pasw->passwortAbgleich($ergebnis);
//   if ($ergebnis == true) {
//     #session_start mit attributwert username
//     #Header login
//     echo "geschafft";
//   }
//   else {
//     "ungleiche eingaben";
//   }
// }

}

 ?>
