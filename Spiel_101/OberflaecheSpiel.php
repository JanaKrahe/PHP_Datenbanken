<?php
  //Script wird nicht ausgeführt
  session_start();
  if (empty($_SESSION['eingeloggt'])) {
  header("Location: Login.php");
  }

  if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time
    session_destroy();   // destroy session data in storage
  }
  $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp


  include 'Spiel.php';
  include 'Ranking.php';
  $name = $_SESSION['spieler1'];
  $spiel = new Spiel($name);
  $ran = new Ranking();
  $spiel->logoutAuswertung();
?>

<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Das neueste kompilierte und minimierte CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- Optionales Theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

    <!-- Das neueste kompilierte und minimierte JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <!-- Website Font style  -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/meinecss.css">
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

    <script src="regler.js"> </script>
    <title>Spiel101</title>
  </head>
  <body>
    <!-- http://localhost/PHP_Datenbanken/Spiel_101/OberflaecheSpiel.php -->
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <label class="navbar-brand">Spiel 101</label>
          <a class="navbar-brand" ><small>Spielen</small></a>
        </div>
        <!--<div class="nav navbar-nav navbar-collapse">
          <a class="navbar-brand" ><small>Spielen</small></a>
        </div>-->
        <ul class="nav navbar-nav navbar-right">
          <li><a><span class="glyphicon glyphicon-user"></span> Signed in as Mark Otto</a></li>

          <li><a href="?logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
          <span class="glyphicons glyphicons-dice-6"></span>
        </ul>
      </div>
    </nav>
    <div class="container">
  			<div class="row main">
  				<div class="panel-heading">
  	        <div class="panel-title text-center">
  	       		<hr />
  	       	</div>
  	      </div>
  				<div class="main-l main-center">
            <!-- Button und Anzeige ZugAnzahl sowie summeSpielzug -->
            <fieldset class="form-group">
              <form class="form-horizontal" method="post">
                <input class="btn btn-default" type="submit" name="wurf" value="Würfeln"></input>
                <?php $spiel->wuerfelnAuswertung(); ?>
                <input class="btn btn-default" type="submit" name="bunkern" value="Bunkern!"></input>
                <?php $spiel->sichernAuswertung(); ?>
                <input class="btn btn-default" type="submit" name="speichern" value="Speichern!"></input>
                <?php $spiel->speichernAuswertung(); ?>
                <input class="btn btn-default" type="submit" name="reset" value="neues Spiel"></input>
                <?php $spiel->resetAuswertung(); ?>
              </form>
            </fieldset>
            <hr />

            <div class="erzieltePktDiv">
              <legend> Punkte in diesem Spielzug: </legend>
              <p class="erzieltePktP"> <?php echo $_SESSION['summeSpielzug'] ?></p> <br>
              <label> Runde: </label>
              <p class="Zug"> <?php echo $_SESSION['runde'] ?> </p>
            </div>
            <hr />

            <div id="infoDiv">
              <p class="infoBox" name="infoBox" value="#InfoBox">
                <?php $spiel->anDerReihe(); ?>
              </p>
            </div>

            <!-- Anzeige Spielerscores gesamt -->
            <div>
              <label><?php echo $_SESSION['spieler1'] ?>:</label>
              <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: <?php echo $_SESSION['summeS1'] ?>%" aria-valuenow="<?php echo $_SESSION['summeS1'] ?>" aria-valuemin="0" aria-valuemax="101"><?php echo $_SESSION['summeS1'] ?></div>
              </div>

              <label><?php echo $_SESSION['spieler2'] ?>:</label>
              <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: <?php echo $_SESSION['summeS2'] ?>%" aria-valuenow="<?php echo $_SESSION['summeS2'] ?>" aria-valuemin="0" aria-valuemax="101"><?php echo $_SESSION['summeS2'] ?></div>
              </div>
            </div>
            <div class="anleitung">
              <button class="btn btn-default" type="button" onclick="anleitung()" name="btnAnleitung">Anleitung</button>
            </div>
          </div>
          <div>
            <hr />
            <p style="text-align: center"> &copy; Jana Krahe &amp; Lars Korthing </p>
          </div>
        </div>
      </div>
      <!--
      <div class="logoutDiv">
        <form method="post">
          <input class="btn btn-default" type="submit" name="logout" value="logout"></input>
        </form>
      </div>
    -->
  </body>
</html>
