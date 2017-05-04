<?php
//Wenn Session existiert dann Weiterleitung auf Spiel
session_start();
if (!empty($_SESSION['eingeloggt'])) {
  header("Location: OberflaecheSpiel.php");
}
include ('FelderInhalt.php');
$feld = new Pruefen;
$feld->error = false;

ini_set('display_errors', 0);
include('radioCheck.php');
$test = new RadiobuttonAuswerten;
$test->auswertung();


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

  <title>Login</title>
</head>
<body>
  <nav class="navbar navbar-inverse navbar-upper">
    <div class="navbar-header">
      <a class="navbar-brand headline">Spiel 101</a>
      <ul class="nav navbar-nav navbar-left">
        <li><a>Anmelden</a></li>
      </ul>
    </div>
  </nav>

  <div class="container">
			<div class="row main">
				<div class="panel-heading">
	         <div class="panel-title text-center">
             <?php if (isset($_GET['automatic'])) {
               echo 'Sie wurden automatisch Abgemeldet';
             }
             ?>
           </div>
	       </div>
				<div class="main-l main-center">
					<form class="form-horizontal" method="post" action="#">

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">E-Mail:</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email" autofocus/>
                </div>
                <?php $feld->pruefungEmail(); ?>
							</div>
						</div>

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Dein Passwort:</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="passwort" id="password"  placeholder="Enter your Password"/>
                </div>
                <?php $feld->pruefungPasswort(); ?>
							</div>
						</div>
            <?php $feld->login(); ?>

						<div class="form-group ">
              <input type="submit" value="Anmelden" name="Anmelden" class="btn btn-primary btn-lg btn-block login-button">
						</div>
					</form>

          <hr />

          <fieldset class="form-group">
            <form class="form-horizontal" method="post" action="#">
              <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="gender" value="registrieren" >
                  Registrieren
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="gender" value="anmelden" checked>
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
        <div>
          <hr />
          <p style="text-align: center"> &copy; Jana Krahe &amp; Lars Korthing </p>
        </div>
			</div>
		</div>
</body>
</html>
