<?php
session_start();

if (isset($_SESSION['location']) && $_SESSION['location'] == 'sieg') {
  include '../templates/sieg.php';
}
elseif (isset($_SESSION['location']) && $_SESSION['location'] == 'new') {
  include '../templates/OberflaecheSpiel.php';
}
elseif (isset($_SESSION['location']) && $_SESSION['location'] == 'registrieren') {
  include '../templates/registrierung.php';
}
elseif (isset($_SESSION['location']) && $_SESSION['location'] == 'loeschen') {
  include '../templates/loeschen.php';
}
elseif (isset($_SESSION['location']) && $_SESSION['location'] == 'kennwortAendern') {
  include '../templates/kennwortAendern.php';
}
elseif (isset($_SESSION['location']) && $_SESSION['location'] == 'anmelden') {
  include '../templates/login.php';
}
elseif (isset($_SESSION['location']) && $_SESSION['location'] == 'anmelden') {
  include '../templates/login.php';
}
elseif (!empty($_SESSION['eingeloggt'])) {
  include '../templates/OberflaecheSpiel.php';
}
else if (empty($_SESSION['eingeloggt'])){
  include '../templates/login.php';
}

 ?>
