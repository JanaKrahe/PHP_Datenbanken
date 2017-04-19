<?php
/**
 *
 */
class sessionClass
{

  function SessionStart($benutzername)
  {
    session_start();

    $_SESSION['email'] = $_POST['email'];


    if (!empty($_SESSION['email'])) {
      $_SESSION['eingeloggt'] = true;
      $_SESSION['spieler1'] = $benutzername;
      $_SESSION['spieler2'] = 'Gast';
      $_SESSION['summeSpielzug'] = 0;
      $_SESSION['runde'] = 1;
      $_SESSION['summeS1'] = 0;
      $_SESSION['summeS2'] = 0;
      $_SESSION['amZug'] = true;
    } else {
      echo "<b>ungültige Eingabe</b>";
      $_SESSION['eingeloggt'] = false;
    }
    var_dump($_SESSION);
  }

function CookiesErzeugen(){
#  setcookie("nameDesCookies", (Wie folgend zu sehen den Inhalt des Cookies)$_SESSION['gdusername'], (Wie folgend zu sehen die Lebenszeit des Cookies)time()+60*60*24*100, "/");
}


function clearsessionscookies()
{
    unset($_SESSION['gdusername']);
    session_unset();
    session_destroy();
    setcookie ("gdusername", "",time()-60*60*24*100, "/");


}

}
 ?>
