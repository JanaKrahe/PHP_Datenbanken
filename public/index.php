<?php
session_start();
var_dump($_REQUEST);
//var_dump($_POST);
//var_dump($_SESSION);
if (!empty($_REQUEST['site'])) {
  switch ($_REQUEST['site']) {
  case 'login':
    include '../templates/login.php';break;
  case 'main' :
    include '../templates/OberflaecheSpiel.php';break;
  case 'registrieren':
    include '../templates/registrierung.php';break;
  case 'anmelden':
    include '../templates/login.php';break;
  case 'loeschen':
    include '../templates/loeschen.php';break;
  case 'kennwortAendern':
    include '../templates/kennwortAendern.php';break;
  case 'automatic':
    include '../templates/login.php';break;
  case 'anleitung':
    include '../templates/Anleitung.php';break;
  case 'sieg':
    include '../templates/sieg.php';break;
  case 'logout':
    include '../templates/login.php';break;
  }
}
elseif (!empty($_REQUEST['Registrieren'])) {
  include '../templates/registrierung.php';
}
elseif (!empty($_REQUEST['Anmelden'])) {
  include '../templates/login.php';
}
elseif (!empty($_REQUEST['loeschen'])) {
  include '../templates/loeschen.php';
}
elseif (!empty($_REQUEST['kennwortAendern'])) {
  include '../templates/kennwortAendern.php';
}
else {
  if (!empty($_SESSION['eingeloggt'])) {
    switch ($_SESSION['eingeloggt']) {
      case 'true':
        include '../templates/OberflaecheSpiel.php';break;
      case 'false':
        include '../templates/login.php';break;
      case 'NULL':
        include '../templates/login.php';break;
    }
  }
  else {
    include '../templates/login.php';
  }
}
 ?>
