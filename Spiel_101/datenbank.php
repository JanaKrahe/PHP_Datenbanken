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
  }
}

 ?>
