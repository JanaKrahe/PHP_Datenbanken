<?php
/**
 *
 */
class DatenbankAufrufe
{
  function datenbankVerbinden(){
    $pdo = new PDO('mysql:host=localhost;dbname=spiel101','root','');
    if (!$pdo) {
        die("Connection failed: " . mysqli_connect_error());
    }
  }

  function benutzerAnlegen()
  {
  $pdo = new PDO('mysql:host=localhost;dbname=spiel101','root','');
    $neuer_user = array();
    $neuer_user['email'] = $_POST['email'];
    $neuer_user['passwort'] = $_POST['passwort'];
    $neuer_user['benutzername'] = $_POST['benutzername'];
    $sqlStatement = "INSERT INTO user101 (email, passwort, name) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sqlStatement);
    $stmt->execute(array($_POST['email'], $_POST['passwort'], $_POST['benutzername']));
    header("Location: login.php");
    echo "Der Benutzer wurde angelegt.";
  }

  function existBenutzer(){
    $pdo = new PDO('mysql:host=localhost;dbname=spiel101','root','');
    $sqlStatement = "SELECT COUNT(*) FROM user101 WHERE email = ?";
    $stmt = $pdo->prepare($sqlStatement);
    $stmt->execute(array($_POST['email']));
    $test = $stmt->fetchColumn();
    if ($test == 0) {
      return false;
    }else {
      return true;
    }
  }

function passwortAuslesen(){
  $pdo = new PDO('mysql:host=localhost;dbname=spiel101','root','');
  $sqlStatement = "SELECT passwort FROM user101 WHERE email = ?";
  $stmt = $pdo->prepare($sqlStatement);
  $stmt->execute(array($_POST['email']));
  $ergebnis = $stmt->fetchColumn();
  return $ergebnis;
}

function benutzerLoeschen(){
  $pdo = new PDO('mysql:host=localhost;dbname=spiel101','root','');
  $sqlStatement = "DELETE FROM user101 WHERE email = ?";
  $stmt = $pdo->prepare($sqlStatement);
  $stmt->execute(array($_POST['email']));
  echo "Der Benutzer wurde gelöscht.";
}

  function kennwortAendern($hashPasswort){
    $pdo = new PDO('mysql:host=localhost;dbname=spiel101','root','');
    $sqlStatement = "UPDATE user101 SET passwort = ? WHERE email = ?";
    $stmt = $pdo->prepare($sqlStatement);
    $stmt->execute(array($hashPasswort, $_POST['email']));
    echo "Das Passwort wurde geändert.";
  }

  function benutzernameAuslesen(){
    $pdo = new PDO('mysql:host=localhost;dbname=spiel101','root','');
    $sqlStatement = "SELECT name FROM user101 WHERE email = ?";
    $stmt = $pdo->prepare($sqlStatement);
    $stmt->execute(array($_POST['email']));
    $ergebnis = $stmt->fetchColumn();
    return $ergebnis;
  }

  public function beenden()
  {
    $pdo = new PDO('mysql:host=localhost;dbname=spiel101','root','');
    $sqlStatement = "INSERT INTO spielstand (spieler, zugAnzahl, punkteS1, punkteS2, amZug, beendet, sieger) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sqlStatement);
    $stmt->execute(array($_SESSION['spieler1'], $_SESSION['runde'], $_SESSION['summeS1'], $_SESSION['summeS2'], $_SESSION['amZug'], false, $_SESSION['sieger']));
  }

  public function speichern()
  {
    $pdo = new PDO('mysql:host=localhost;dbname=spiel101','root','');
    $sqlStatement = "INSERT INTO spielstand (spieler, zugAnzahl, punkteS1, punkteS2, amZug, beendet, sieger) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sqlStatement);
    $stmt->execute(array($_SESSION['spieler1'], $_SESSION['runde'], $_SESSION['summeS1'], $_SESSION['summeS2'], $_SESSION['amZug'], false));
  }

  function ranking(){
    $pdo = new PDO('mysql:host=localhost;dbname=spiel101','root','');
    $sqlStatement = "SELECT (sieger, zugAnzahl) FROM spielstand WHERE beendet = true ORDER BY zugAnzahl";
    $stmt = $pdo->prepare($sqlStatement);
    $stmt->execute();
    //Hier müssten mehrere Werte ausgegeben werden
    $ergebnis = $stmt->fetchColumn();
    return $ergebnis;
  }
}

 ?>
