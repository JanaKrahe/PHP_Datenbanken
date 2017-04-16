<?php

/**
 *
 */
class Pruefen
{
  // define variables and set to empty values
  public $error = false;

  function pruefungBenutzername()
  {
    $name = $nameErr = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["benutzername"])) {
        $nameErr = "Name is required";
        $error = true;
        echo $nameErr;
      } else {
        $name = test_input($_POST["benutzername"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
          $nameErr = "Only letters and white space allowed";
          $error = true;
          echo $nameErr;
        }
      }
    }
  }

  function pruefungEmail(){
    // define variables and set to empty values
    $emailErr = "";
    $email = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $error = true;
        echo $emailErr;
      } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format";
          $error = true;
          echo $emailErr;
        }
      }
      }
    }

    function pruefungPasswort(){
      // define variables and set to empty values
      $passwortErr = "";
      $passwort = "";

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["passwort"])) {
          $passwortErr = "Passwort is requiered";
          $error = true;
          echo $passwortErr;
        } else {
          $passwort = test_input($_POST["passwort"]);
        }
      }
    }

    function pruefungPasswort2(){
      // define variables and set to empty values
      $passwort2Err = "";
      $passwort2 = "";

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["passwort2"])) {
          $passwort2Err = "Passwort2 is requiered";
          $error = true;
          echo $passwort2Err;
        } else {
          $passwort2 = test_input($_POST["passwort2"]);
        }
      }
    }

    function passwortStimmenUeberein(){
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($GLOBALS['$error'] = true) {
          if ($_POST["passwort"] != $_POST["passwort2"]){
            $stimmenErr = "Die Passwörter müssen übereinstimmen";
            $error = true;
            echo $stimmenErr;
          }
        }
      }
    }
  } //end class

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }


?>
