<?php
/**
 *
 */
class sessionClass
{

  function SessionStart()
  {
    session_start();

    include ('datenbank.php');
    $db = new DatenbankAufrufe;
    $benutzername = $db->benutzernameAuslesen();

    $_Session['email'] = $_POST['email'];

    if (!isset($_Session['email'])) {
      $_SESSION['eingeloggt'] = true;
      $_Session['benutzername'] = $benutzername;
      echo "<h1>Hallo ". $_SESSION['benutzername'] . "</h1>";
      # code...
    } else {
      echo "<b>ungültige Eingabe</b>";
      $_SESSION['eingeloggt'] = false;
    }
    exit;
  }

function CookiesErzeugen(){
  setcookie("nameDesCookies", (Wie folgend zu sehen den Inhalt des Cookies)$_SESSION['gdusername'], (Wie folgend zu sehen die Lebenszeit des Cookies)time()+60*60*24*100, "/");
}


function clearsessionscookies()
{
    unset($_SESSION['gdusername']);
    session_unset();
    session_destroy();
    setcookie ("gdusername", "",time()-60*60*24*100, "/");


}
 ?>
