<?php

/**
 *
 */
class Pruefen
{
  // define variables and set to empty values
  public $error = false;
  public $hashpasswort;

  function pruefungBenutzername()
  {
    $name = $nameErr = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !$_POST['gender']) {
      if (empty($_POST["benutzername"])) {
        $nameErr = "Name is required";
        $this->error = true;
        echo $nameErr;
      } else {
        $name = $this->test_input($_POST["benutzername"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
          $nameErr = "Only letters and white space allowed";
          $this->error = true;
          echo $nameErr;
        }
      }
    }
  }

  function pruefungEmail(){
    // define variables and set to empty values
    $emailErr = "";
    $email = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST" && !$_POST['gender']) {

      if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $this->error = true;
        echo $emailErr;
      } else {
        $email = $this->test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format";
          $this->error = true;
          echo $emailErr;
        }
      }
      }
    }

    function pruefungPasswort(){
      // define variables and set to empty values
      $passwortErr = "";
      $passwort = "";

      if ($_SERVER["REQUEST_METHOD"] == "POST" && !$_POST['gender']) {
        var_dump('3'. $_SERVER["REQUEST_METHOD"]);
        if (empty($_POST["passwort"])) {
          $passwortErr = "Passwort is requiered";
          $this->error = true;
          echo $passwortErr;
        } else {
          $passwort = $this->test_input($_POST["passwort"]);
        }
      }
    }

    function pruefungPasswort2(){
      // define variables and set to empty values
      $passwort2Err = "";
      $passwort2 = "";

      if ($_SERVER["REQUEST_METHOD"] == "POST" && !$_POST['gender']) {
        if (empty($_POST["passwort2"])) {
          $passwort2Err = "Passwort is requiered";
          $this->error = true;
          echo $passwort2Err;
        } else {
          $passwort2 = $this->test_input($_POST["passwort2"]);
        }
      }
    }

    function pruefungPasswort3(){
      // define variables and set to empty values
      $passwort3Err = "";
      $passwort3 = "";

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["passwort3"])) {
          $passwort3Err = "Passwort is requiered";
          $this->error = true;
          echo $passwort3Err;
        } else {
          $passwort3 = $this->test_input($_POST["passwort3"]);
        }
      }
    }

    function passwortStimmenUeberein(){
      var_dump($_POST);
      if ($_SERVER["REQUEST_METHOD"] == "POST" && !$_POST['gender']) {
        var_dump('1'. $_SERVER["REQUEST_METHOD"]);
        if ($this->error == false) {
          if ($_POST["passwort"] != $_POST["passwort2"]){
            $stimmenErr = "Die Passwörter müssen übereinstimmen";
            echo $stimmenErr;
          } else {
              #Passwort wird hier verschlüsselt, indem die Methode der Klasse PasswortSpeichern aufgerufen wird.
              include('PasswortSpeichern.php');
              $hallo = new PasswortSpeichern;
              $_POST['passwort'] = $hallo->passwortVerschluesseln($_POST['passwort']);

              include('datenbank.php');
              $datenbank = new DatenbankAufrufe;
              $result = $datenbank->existBenutzer();
              if ($result == false) {
                $datenbank->benutzerAnlegen();
              } else {
                echo "Der Benutzer existiert bereits.";
              }
            }
          }
        }
      }

    function login(){

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        var_dump('2'. $_SERVER["REQUEST_METHOD"]);
        if ($this->error == false) {
          include('datenbank.php');
          $datenbank = new DatenbankAufrufe;
          #Prüfung ob der Benutzer bereits existiert
          $result = $datenbank->existBenutzer();
          if ($result == true) {
            $dbPasswort = $datenbank->passwortAuslesen();
            include('PasswortSpeichern.php');
            $verschl = new PasswortSpeichern;
            $result2 = $verschl->passwortAbgleich($_POST['passwort'], $dbPasswort);
            if ($result2 == true) {
              #SESSION
              include ('session.php');
              $session = new sessionClass;
              $name = $datenbank->benutzernameAuslesen();
              echo "TEST: ".$name;
              $session->SessionStart($name);
              header("Location: OberflaecheSpiel.php");
            }
            else {
              echo "Das Passwort ist nicht korrekt";
            }
          } else {
            Header("Location: registrierung.php");
            echo "Bitte zuerst Registrieren";
          }
        }
      }
    }

    function loeschen(){
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($this->error == false) {
          include('datenbank.php');
          $datenbank = new DatenbankAufrufe;
          #Prüfung ob der Benutzer bereits existiert
          $result = $datenbank->existBenutzer();
          if ($result == true) {
            $dbPasswort = $datenbank->passwortAuslesen();
            include('PasswortSpeichern.php');
            $verschl = new PasswortSpeichern;
            $result2 = $verschl->passwortAbgleich($_POST['passwort'], $dbPasswort);
            if ($result2 == true) {
              $datenbank->benutzerLoeschen();
            }
            else {
              echo "Das Passwort ist nicht korrekt";
            }
          }
          else {
            echo "Der Benutzer existiert nicht.";
          }
          }
        }
      }


      function kennwortAendern(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          if ($this->error == false) {
            include('datenbank.php');
            $datenbank = new DatenbankAufrufe;
            #Prüfung ob der Benutzer bereits existiert
            $result = $datenbank->existBenutzer();
            if ($result == true) {
              #Prüfen ob Passwort2 und Passwort3 übereinstimmen
              if ($_POST["passwort2"] != $_POST["passwort3"]){
                $stimmenErr = "Die Passwörter müssen übereinstimmen";
                echo $stimmenErr;
              } else {
              $dbPasswort = $datenbank->passwortAuslesen();
              include('PasswortSpeichern.php');
              $verschl = new PasswortSpeichern;
              $result2 = $verschl->passwortAbgleich($_POST['passwort'], $dbPasswort);
              if ($result2 == true) {
                $_POST['passwort2'] = $hashPasswort = $verschl->passwortVerschluesseln($_POST['passwort2']);
                $datenbank->kennwortAendern($hashPasswort);
                #hier
              }
              else {
                echo "Das Passwort ist nicht korrekt";
              }
            }
            }
          else {
            echo "Der Benutzer existiert nicht.";
          }
        }
      }
    }

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

  } //end class
?>
