<?php
include '../classes/datenbank.php';
include '../classes/PasswortSpeichern.php';
include '../classes/session.php';
include ('../classes/FelderInhalt.php');
$feld = new Pruefen;
$feld->error = false;

ini_set('display_errors', 0);
include('../classes/radioCheck.php');
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
  <link rel="stylesheet" href="../public/css/meinecss.css">
  <!-- Google Fonts -->
  <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

  <title>Kennwort ändern</title>
</head>
<body>
  <nav class="navbar navbar-inverse navbar-upper">
    <div class="navbar-header">
      <a class="navbar-brand headline">Spiel 101</a>
      <ul class="nav navbar-nav navbar-left">
        <li><a>Kennwort ändern</a></li>
      </ul>
    </div>
  </nav>

  <div class="container">
			<div class="row main">
				<div class="panel-heading">
	               <div class="panel-title text-center">
	               	</div>
	            </div>
				<div class="main-l main-center">
					<form class="form-horizontal" method="post">

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
							<label for="password" class="cols-sm-2 control-label">Altes Passwort:</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="passwort" id="password"  placeholder="Entern your old Password"/>
                </div>
                <?php $feld->pruefungPasswort(); ?>
							</div>
						</div>

            <div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Neues Passwort:</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="passwort2" id="confirm2"  placeholder="Entern your new Password"/>
                </div>
                <?php $feld->pruefungPasswort2();
                ?>
							</div>
						</div>

				      <div class="form-group">
  						<label for="confirm" class="cols-sm-2 control-label">Neues Passwort wiederholen:</label>
  						<div class="cols-sm-10">
  							<div class="input-group">
  								<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
  								<input type="password" class="form-control" name="passwort3" id="confirm3"  placeholder="Confirm your new Password"/>
                </div>
                <?php $feld->pruefungPasswort3(); ?>
  						</div>
  					</div>
            <?php $feld->kennwortAendern(); ?>
  					<div class="form-group ">
              <input type="submit" value="Kennwort Ändern" name="kennwortAendern" class="btn btn-primary btn-lg btn-block login-button"  onclick="return confirm('Sind Sie sich sicher, dass Sie Ihr Passwort ändern wollen?')">
            </div>
					</form>

          <hr />

          <fieldset class="form-group">
            <form class="form-horizontal" method="post">
              <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="site" value="registrieren" >
                  Registrieren
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="site" value="anmelden" >
                  Anmelden
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="site" value="loeschen" >
                  Account löschen
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="site" value="kennwortAendern" checked>
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