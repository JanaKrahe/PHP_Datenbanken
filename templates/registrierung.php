<?php

include '../classes/PasswortSpeichern.php';
include '../classes/session.php';
include ('../classes/FelderInhalt.php');
include('../classes/radioCheck.php');
$feld = new Pruefen;
$feld->error = false;

$radioAuswertung = new RadiobuttonAuswerten;
$radioAuswertung->auswertung();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Das neueste kompilierte und minimierte CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Optionales Theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- Das neueste kompilierte und minimierte JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- Website Font style  -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/meinecss.css">
  <!-- Google Fonts -->
  <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

  <title>Registrierung</title>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-inverse navbar-upper sticky">
    <div class="navbar-header">
      <a class="navbar-brand headline">Spiel 101</a>
      <ul class="nav navbar-nav navbar-left">
        <li><a>Registrieren</a></li>
      </ul>
    </div>
  </nav>

  <div class="container">
			<div class="row main">
				<div class="panel-heading">
          <div class="panel-title text-center centerwidth">
	        </div>
	      </div>
				<div class="main-l main-center">
					<form class="form-horizontal" method="post" action="?">

						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Benutzername:</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="benutzername" id="name"  placeholder="Max Mustermann" autofocus/>
								</div>
                <?php $feld->pruefungBenutzername(); ?>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">E-Mail:</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="email" id="email"  placeholder="max.mustermann@mail.de"/>
                </div>
                <?php $feld->pruefungEmail(); ?>
							</div>
						</div>

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Dein Passwort:</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="passwort" id="password"  placeholder="Passwort"/>
                </div>
                <?php $feld->pruefungPasswort(); ?>
							</div>
						</div>

						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Passwort wiederholen:</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="passwort2" id="confirm"  placeholder="Passwort"/>
                </div>
                <?php $feld->pruefungPasswort2();
                $feld->passwortStimmenUeberein(); ?>
							</div>
						</div>
						<div class="form-group ">
              <input type="submit" value="Registrieren" name="Registrieren" class="btn btn-primary btn-lg btn-block login-button">
            </div>
					</form>

          <hr />

          <fieldset class="form-group">
            <form class="form-horizontal" method="post">
              <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="gender" value="registrieren" checked>
                  Registrieren
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="gender" value="anmelden" >
                  Anmelden
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="gender" value="loeschen" >
                  Account löschen
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="gender" value="kennwortAendern" >
                  Kennwort ändern
                </label>
              </div>
              <input type="submit" value="Auswahl" class="btn btn-default">
            </form>
          </fieldset>
				</div>
        
        <!-- Footer -->
        <div>
          <hr />
          <p style="text-align: center"> &copy; Jana Krahe &amp; Lars Korthing </p>
        </div>
			</div>
		</div>
</body>
</html>
