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
  $spiel->speichernAuswertung();
  $spiel->resetAuswertung();
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
    <nav class="navbar navbar-inverse navbar-upper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-5">
            <a class="navbar-brand" href="Anleitung.html"><span class="glyphicon glyphicon-cog"> Anleitung</a>
            <a class="navbar-brand" href="?speichern"><span class="glyphicon glyphicon-floppy-save"></span> Speichern</a>
            <a class="navbar-brand" href="?reset"><span class="glyphicon glyphicon-plus"></span> Neues Spiel</a>
          </div>
          <div class="col-md-4">
            <a class="navbar-brand zeile">Spiel 101</a>
          </div>
          <div class="col-md-3">
            <ul class="nav navbar-nav navbar-right">
              <li><a><span class="glyphicon glyphicon-user"></span> Signed in as <?php echo $_SESSION['spieler1']; ?></a></li>
              <li><a href="?logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <div class="container">
  			<div class="row main">
  				<div class="panel-heading">
  	        <div class="panel-title text-center">
              <?php if (!empty($_SESSION['spielGeladen']) && $_SESSION['spielGeladen'] == true) {   ?>
                <p style="text-align: center"> Ihr alter Spielstand wurde geladen. </p>
              <?php  $_SESSION['spielGeladen']==false; }  ?>
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
