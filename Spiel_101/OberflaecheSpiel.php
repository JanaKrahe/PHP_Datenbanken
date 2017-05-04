<?php
  //Script wird nicht ausgeführt
  session_start();
  if (empty($_SESSION['eingeloggt'])) {
  header("Location: Login.php");
  }

  include 'Spiel.php';
  include 'Ranking.php';
  $spiel = new Spiel();
  $ran = new Ranking();

  //Automatischer Logout nach 10 Minuten
  if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 600)) {
    $spiel->speicherSpiel();
    session_unset();
    session_destroy();
    header("Location: Login.php?automatic");
  }
  $_SESSION['LAST_ACTIVITY'] = time(); // Update des Aktivitätszeitstempel



  $spiel->logoutAuswertung();
  $spiel->speichernAuswertung();
  $spiel->resetAuswertung();
  $spiel->wuerfelnAuswertung();
  $spiel->sichernAuswertung();
?>

<!DOCTYPE html>
<html lang="de">
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

    <title>Spiel101</title>
  </head>
  <body>
    <!-- http://localhost/PHP_Datenbanken/Spiel_101/OberflaecheSpiel.php -->
    <nav class="navbar navbar-inverse navbar-upper">
      <div class="navbar-header">
        <button aria-controls=bs-navbar aria-expanded=true class="collapsed navbar-toggle" data-target="#bs-navbar" data-toggle=collapse type=button>
          <span class=sr-only>Toggle navigation</span>
          <span class=icon-bar></span>
          <span class=icon-bar></span>
          <span class=icon-bar></span>
        </button>
        <a class="navbar-brand headline">Spiel 101</a>
      </div>
      <div class="container-fluid navbar-collapse collapse" id="bs-navbar" aria-expanded="true">
        <ul class="nav navbar-nav navbar-left">
          <li><a href="Anleitung.php"><span class="glyphicon glyphicon-list-alt"></span> Anleitung</a></li>
          <li><a href="?speichern"><span class="glyphicon glyphicon-floppy-save"></span> Speichern</a></li>
          <li><a href="?reset" onclick="return confirm('Sind Sie sich sicher, dass Sie ein neues Spiel beginnen wollen? Der alte Spielstand wird dann gelöscht.')">
            <span class="glyphicon glyphicon-plus"></span> Neues Spiel</a>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a><span class="glyphicon glyphicon-user"></span> Signed in as <?php echo $_SESSION['spieler1']; ?></a></li>
          <li><a href="?logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        </ul>
      </div>
    </nav>
    <div class="container">
  			<div class="row main">
  				<div class="panel-heading">
  	        <div class="panel-title text-center">
              <?php echo (isset($_SESSION['spielGeladen']) && $_SESSION['spielGeladen'] == true);
              if (isset($_SESSION['spielGeladen']) && $_SESSION['spielGeladen'] == true) {   ?>
                <p style="text-align: center"> Ihr alter Spielstand wurde geladen. </p>
              <?php  $_SESSION['spielGeladen'] = false; }  ?>
  	       	</div>
  	      </div>
  				<div class="main-l main-center">
            <!-- Button und Anzeige ZugAnzahl sowie summeSpielzug -->
            <fieldset class="form-group">
              <form class="form-horizontal" method="post" action="OberflaecheSpiel.php">
                <input class="btn btn-default" type="submit" name="wurf" value="Würfeln"></input>

                <input class="btn btn-default" type="submit" name="bunkern" value="Bunkern"></input>
              </form>
            </fieldset>
            <?php
            if (isset($_SESSION['wuerfelErgebnis'])) {
              switch ($_SESSION['wuerfelErgebnis']) {
                case 1:
                ?>
                <img src="PNG/wuerfel1.png" alt="1">
                <?php
                break;
                case 2:
                ?>
                <img src="PNG/wuerfel2.png" alt="2">
                <?php
                break;
                case 3:
                ?>
                <img src="PNG/wuerfel3.png" alt="3">
                <?php
                break;
                case 4:
                ?>
                <img src="PNG/wuerfel4.png" alt="4">
                <?php
                break;
                case 5:
                ?>
                <img src="PNG/wuerfel5.png" alt="5">
                <?php
                break;
                case 6:
                ?>
                <img src="PNG/wuerfel6.png" alt="6">
                <?php
                break;
              }
            }
            $_SESSION['wuerfelErgebnis'] = 0;
            ?>

            <hr />

            <div id="infoDiv">
              <p class="infoBox" name="infoBox" value="#InfoBox">
                <?php $spiel->anDerReihe(); ?>
              </p>
            </div>

            <hr />

            <div class="erzieltePktDiv">
              <legend> Punkte in diesem Spielzug: </legend>
              <p class="erzieltePktP"> <?php echo $_SESSION['summeSpielzug'] ?></p> <br>
              <label> Runde: </label>
              <p class="Zug"> <?php echo $_SESSION['runde'] ?> </p>
            </div>
            <hr />

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
          </div>
          <div>
            <hr />
            <p style="text-align: center"> &copy; Jana Krahe &amp; Lars Korthing </p>
          </div>
        </div>
      </div>
  </body>
</html>
