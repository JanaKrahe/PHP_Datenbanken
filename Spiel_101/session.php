<?php
/**
 *
 */
class sessionClass
{

  function SessionStart($benutzername)
  {
    session_start();

    $_Session['email'] = $_POST['email'];
    echo $_Session['email'];

    if (!empty($_Session['email'])) {
      $_Session['eingeloggt'] = true;
      $_Session['spieler1'] = $benutzername;
      $_Session['spieler2'] = 'Gast';
      # code...
    } else {
      echo "<b>ungültige Eingabe</b>";
      $_SESSION['eingeloggt'] = false;
    }
    
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
