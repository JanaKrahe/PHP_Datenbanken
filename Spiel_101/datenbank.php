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
  }

  function existBenutzer(){
    $pdo = new PDO('mysql:host=localhost;dbname=spiel101','root','');
    $sqlStatement = "SELECT * FROM user101 WHERE email = ?";
    $stmt = $pdo->prepare($sqlStatement);
    $stmt->execute(array($_POST['email']));
    $test = $stmt->rowCount();
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

  function spielerIdAuslesen(){
    $pdo = new PDO('mysql:host=localhost;dbname=spiel101','root','');
    $sqlStatement = "SELECT id FROM user101 WHERE email = ?";
    $stmt = $pdo->prepare($sqlStatement);
    $stmt->execute(array($_SESSION['email']));
    $ergebnis = $stmt->fetchColumn();
    return $ergebnis;
  }

    function rundenAuslesen($id){
      $pdo = new PDO('mysql:host=localhost;dbname=spiel101','root','');
      $sqlStatement = "SELECT zugAnzahl FROM spielstand WHERE id = ?";
      $stmt = $pdo->prepare($sqlStatement);
      $stmt->execute(array($id));
      $ergebnis = $stmt->fetchColumn();
      return $ergebnis;
    }

      function punkteS1Auslesen($id){
        $pdo = new PDO('mysql:host=localhost;dbname=spiel101','root','');
        $sqlStatement = "SELECT punkteS1 FROM spielstand WHERE id = ?";
        $stmt = $pdo->prepare($sqlStatement);
        $stmt->execute(array($id));
        $ergebnis = $stmt->fetchColumn();
        return $ergebnis;
      }

      function punkteS2Auslesen($id){
        $pdo = new PDO('mysql:host=localhost;dbname=spiel101','root','');
        $sqlStatement = "SELECT punkteS2 FROM spielstand WHERE id = ?";
        $stmt = $pdo->prepare($sqlStatement);
        $stmt->execute(array($id));
        $ergebnis = $stmt->fetchColumn();
        return $ergebnis;
      }

      function amZugAuslesen($id){
        $pdo = new PDO('mysql:host=localhost;dbname=spiel101','root','');
        $sqlStatement = "SELECT amZug FROM spielstand WHERE id = ?";
        $stmt = $pdo->prepare($sqlStatement);
        $stmt->execute(array($id));
        $ergebnis = $stmt->fetchColumn();
        if ($ergebnis == 0) {
          return false;
        } else {
          return true;
        }
      }

      function existSpielstandOpen($spielerId){
        $pdo = new PDO('mysql:host=localhost;dbname=spiel101','root','');
        $sqlStatement = "SELECT id FROM spielstand WHERE spielerId = ? AND sieger IS NULL";
        $stmt = $pdo->prepare($sqlStatement);
        $stmt->execute(array($spielerId));
        $ergebnis = $stmt->fetchColumn();
        if (empty($ergebnis)) {
          return NULL;
        }else {
          return $ergebnis;
        }
      }


  function existSpielstandClose($spielerId){
    $pdo = new PDO('mysql:host=localhost;dbname=spiel101','root','');
    $sqlStatement = "SELECT id FROM spielstand WHERE spielerId = ? AND sieger IS NOT NULL";
    $stmt = $pdo->prepare($sqlStatement);
    $stmt->execute(array($spielerId));
    $ergebnis1 = $stmt->rowCount();
    if ($ergebnis1 == 0) {
      return NULL;
    }else {
      $ergebnis2 = $stmt->fetchAll();
      return $ergebnis2;
    }
  }


  public function beenden()
  {
    $pdo = new PDO('mysql:host=localhost;dbname=spiel101','root','');
    $spielerId = $this->spielerIdAuslesen();
    $existSpielstand = $this->existSpielstandOpen($spielerId);
    if ($existSpielstand == NULL) {
      $sqlStatement = "INSERT INTO spielstand (spielerId, zugAnzahl, punkteS1, punkteS2, amZug, sieger) VALUES (?, ?, ?, ?, ?, ?)";
      $stmt = $pdo->prepare($sqlStatement);
      $stmt->execute(array($spielerId, $_SESSION['runde'], $_SESSION['summeS1'], $_SESSION['summeS2'], $_SESSION['amZug'], $_SESSION['Sieger']));
    } else {
      $sqlStatement = "UPDATE spielstand SET spielerId = ?, zugAnzahl = ?, punkteS1 = ?, punkteS2 = ?, amZug = ?, sieger = ? WHERE id = ?";
      $stmt = $pdo->prepare($sqlStatement);
      $stmt->execute(array($spielerId, $_SESSION['runde'], $_SESSION['summeS1'], $_SESSION['summeS2'], $_SESSION['amZug'], $_SESSION['Sieger'], $existSpielstand));
    }
  }

  public function speichern()
  {
      $pdo = new PDO('mysql:host=localhost;dbname=spiel101','root','');
      $spielerId = $this->spielerIdAuslesen();
      $existSpielstand = $this->existSpielstandOpen($spielerId);
      if ($existSpielstand == NULL) {
        $sqlStatement = "INSERT INTO spielstand (spielerId, zugAnzahl, punkteS1, punkteS2, amZug) VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sqlStatement);
        $stmt->execute(array($spielerId, $_SESSION['runde'], $_SESSION['summeS1'], $_SESSION['summeS2'], $_SESSION['amZug']));
      } else {
        $sqlStatement = "UPDATE spielstand SET spielerId = ?, zugAnzahl = ?, punkteS1 = ?, punkteS2 = ?, amZug = ? WHERE id = ?";
        $stmt = $pdo->prepare($sqlStatement);
        $stmt->execute(array($spielerId, $_SESSION['runde'], $_SESSION['summeS1'], $_SESSION['summeS2'], $_SESSION['amZug'], $existSpielstand));
      }
    }

  function ranking(){
    $pdo = new PDO('mysql:host=localhost;dbname=spiel101','root','');
    $sqlStatement = "SELECT sieger, zugAnzahl FROM spielstand WHERE sieger IS NOT NULL ORDER BY zugAnzahl";
    $stmt = $pdo->prepare($sqlStatement);
    $stmt->execute();
    $ergebnis = $stmt->fetchAll();
    return $ergebnis;
  }

}
 ?>
