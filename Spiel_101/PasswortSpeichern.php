<?php
  /**
   *
   */
  class PasswortSpeichern
  {
    function passwortVerschluesseln(){
      // $test = $_POST['passwort'];
      $test = 'test';
      $zusatzSicherung = "PHP_Projekt";
      $_POST['passwort'] = password_hash($test.$zusatzSicherung, PASSWORD_DEFAULT);
      echo "passwort verschlüsselt";
      echo $_POST['passwort'];
    }

    function passwortAbgleich($dbPasswort){
      $test = $_POST['passwort'];
      $zusatzSicherung = "PHP_Projekt";
      $passwort = $test.$zusatzSicherung
      if(password_verify($passwort, $dbPasswort, $password_hashed)){
        return true;
    }else {
      return false;
    }
  }
 ?>
