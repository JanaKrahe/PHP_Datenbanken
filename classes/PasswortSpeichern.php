<?php
/**
 *
 */
class PasswortSpeichern
{

  /**
  * Methode zum Verschlüsseln des übergebenen Passworts
  */
  public function passwortVerschluesseln($passwort){
    // $test = $_POST['passwort'];
    $zusatzSicherung = "PHP_Projekt619";
    $passwort = password_hash($passwort.$zusatzSicherung, PASSWORD_DEFAULT);
    return $passwort;
  }

  /**
  * Methode zum Abgleich zweier Passworts
  */
  public function passwortAbgleich($pasw, $dbPasswort){
    $zusatzSicherung = "PHP_Projekt619";
    $passwort = $pasw.$zusatzSicherung;
    if(password_verify($passwort, $dbPasswort)){
      return true;
    }else {
      return false;
    }
  }
}
?>
