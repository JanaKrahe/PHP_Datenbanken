<?php
  /**
   *
   */
  class PasswortSpeichern
  {
    function passwortVerschluesseln(){
      $test = $_POST['passwort'];
      $zusatzSicherung = "PHP_Projekt";
      $_POST['passwort'] = password_hash($test.$zusatzSicherung, PASSWORD_DEFAULT);
    }
  }
 ?>
