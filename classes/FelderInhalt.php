<?php

/**
 *
 */
class Pruefen
{

  public $error = false;
  public $hashpasswort;

  /**
  * Methode zum Prüfen der Benutzername-Eingabe
  */
  public function pruefungBenutzername()
  {
    $name = $nameErr = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !$_POST['site']) {
      if (empty($_POST["benutzername"])) {
        $nameErr = "Bitte Name angeben";
        $this->error = true;
        echo $nameErr;
      } else {
        $name = $this->test_input($_POST["benutzername"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
          $nameErr = "Es dürfen nur Buchstaben und Spaces verwendet werden";
          $this->error = true;
          echo $nameErr;
        }
      }
    }
  }

  /**
  * Methode zum Prüfen der Email-Eingabe
  */
  public function pruefungEmail(){

    $emailErr = "";
    $email = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST" && !$_POST['site']) {

      if (empty($_POST["email"])) {
        $emailErr = "Bitte E-mail angeben";
        $this->error = true;
        echo $emailErr;
      } else {
        $email = $this->test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Ungültiges Email-Format";
          $this->error = true;
          echo $emailErr;
        }
      }
      }
    }

    /**
    * Methode zum Prüfen der Passwort-Eingabe
    */
    public function pruefungPasswort(){
      // define variables and set to empty values
      $passwortErr = "";
      $passwort = "";

      if ($_SERVER["REQUEST_METHOD"] == "POST" && !$_POST['site']) {
        if (empty($_POST["passwort"])) {
          $passwortErr = "Bitte Passwort angeben";
          $this->error = true;
          echo $passwortErr;
        } else {
          $passwort = $this->test_input($_POST["passwort"]);
        }
      }
    }

    /**
    * Methode zum Prüfen der zweiten Passwort-Eingabe
    */
    public function pruefungPasswort2(){
      // define variables and set to empty values
      $passwort2Err = "";
      $passwort2 = "";

      if ($_SERVER["REQUEST_METHOD"] == "POST" && !$_POST['site']) {
        if (empty($_POST["passwort2"])) {
          $passwort2Err = "Bitte Passwort angeben";
          $this->error = true;
          echo $passwort2Err;
        } else {
          $passwort2 = $this->test_input($_POST["passwort2"]);
        }
      }
    }

    /**
    * Methode zum Prüfen der dritten Passwort-Eingabe
    */
    public function pruefungPasswort3(){
      // define variables and set to empty values
      $passwort3Err = "";
      $passwort3 = "";

      if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["kennwortAendern"]) && $_POST["kennwortAendern"] == "Kennwort Ändern") {
        if (empty($_POST["passwort3"])) {
          $passwort3Err = "Bitte Passwort angeben";
          $this->error = true;
          echo $passwort3Err;
        } else {
          $passwort3 = $this->test_input($_POST["passwort3"]);
        }
      }
    }

    /**
    * Methode zum Vergleichen der Passwort-Eingabe
    */
    public function passwortStimmenUeberein(){
      if ($_SERVER["REQUEST_METHOD"] == "POST" && !$_POST['site']) {
        if ($this->error == false) {
          if ($_POST["passwort"] != $_POST["passwort2"]){
            $stimmenErr = "Passwörter müssen übereinstimmen";
            echo $stimmenErr;
          } else {
            #Passwort wird hier verschlüsselt, indem die Methode der Klasse PasswortSpeichern aufgerufen wird.
            $hallo = new PasswortSpeichern;
            $_POST['passwort'] = $hallo->passwortVerschluesseln($_POST['passwort']);

            $datenbank = new DatenbankAufrufe;
            $result = $datenbank->existBenutzer();
            if ($result == false) {
              $datenbank->benutzerAnlegen();

              header("Location: index.php?success=registrieren");
              } else {
              echo "Der Benutzer existiert bereits";
            }
          }
        }
      }
    }

    /**
    * Methode zum Vergleichen der Login-Eingaben mit der Datenbank
    */
    public function login(){
      if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["Anmelden"]) && $_POST["Anmelden"] == "Anmelden") {
        if ($this->error == false) {
          $datenbank = new DatenbankAufrufe;
          #Prüfung ob der Benutzer bereits existiert
          $result = $datenbank->existBenutzer();
          if ($result == true) {
            $dbPasswort = $datenbank->passwortAuslesen();
            $verschl = new PasswortSpeichern;
            $result2 = $verschl->passwortAbgleich($_POST['passwort'], $dbPasswort);
            if ($result2 == true) {
              #SESSION
              $session = new sessionClass;
              $name = $datenbank->benutzernameAuslesen();
              $session->SessionStart($name, $datenbank);

              header("Location: index.php?site=main");
            }
            else {
              echo "Das Passwort ist nicht korrekt";
            }
          } else {
            //$_POST['site'] = 'registrieren';
            //header("Location: index.php");
            //wird nie erreicht/ausgegeben
            echo "Bitte zuerst Registrieren";
          }
        }
      }
    }

    /**
    * Methode zum Vergleichen der loeschen-Eingaben mit der Datenbank
    */
    public function loeschen(){
      if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["loeschen"]) && $_POST["loeschen"] == "Löschen") {
        if ($this->error == false) {
          $datenbank = new DatenbankAufrufe;
          #Prüfung ob der Benutzer bereits existiert
          $result = $datenbank->existBenutzer();
          if ($result == true) {
            $dbPasswort = $datenbank->passwortAuslesen();
            $verschl = new PasswortSpeichern;
            $result2 = $verschl->passwortAbgleich($_POST['passwort'], $dbPasswort);
            if ($result2 == true) {
              $datenbank->benutzerLoeschen();
              header("Location: index.php?success=loeschen");
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

      /**
      * Methode zum Vergleich der kennwortAendern-Eingaben mit der Datenbank
      */
      public function kennwortAendern(){
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["kennwortAendern"]) && $_POST["kennwortAendern"] == "Kennwort Ändern") {
          if ($this->error == false) {
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
              $verschl = new PasswortSpeichern;
              $result2 = $verschl->passwortAbgleich($_POST['passwort'], $dbPasswort);
              if ($result2 == true) {
                $_POST['passwort2'] = $hashPasswort = $verschl->passwortVerschluesseln($_POST['passwort2']);
                $datenbank->kennwortAendern($hashPasswort);
                header("Location: index.php?success=kennwortAendern");
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

    /**
    * Methode zum Aufbereiten eines Eingabestrings
    */
    public function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

  } //end class
?>
