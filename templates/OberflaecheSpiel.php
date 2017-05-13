<?php
  //session_start();

  //Prüfung ob User eingeloggt ist
  if (empty($_SESSION['eingeloggt'])) {
  $_POST['site'] = 'login';
  //header("Location: index.php");
  }

  include '../classes/datenbank.php';
  include '../classes/Spiel.php';

  $spiel = new Spiel();

  //Automatischer Logout nach 10 Minuten
  if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 600)) {
    $spiel->speicherSpiel();
    session_unset();
    session_destroy();
    //$_POST['site'] = 'automatic';
    header("Location: index.php?site=automatic");
  }
  $_SESSION['LAST_ACTIVITY'] = time(); // Update des Aktivitätszeitstempel




  $spiel->resetAuswertung();
  $spiel->wuerfelnAuswertung();
  $spiel->sichernAuswertung();
  $spiel->siegerAuswertung();
  $spiel->speichernAuswertung();
  $spiel->logoutAuswertung();
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
    <!-- Navigationsleiste -->
    <nav class="navbar navbar-inverse navbar-upper sticky">
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
          <li><a href="?site=anleitung"><span class="glyphicon glyphicon-list-alt"></span> Anleitung</a></li>
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
  	        <div class="panel-title text-center centerwidth">
              <?php if (isset($_SESSION['spielGeladen']) && $_SESSION['spielGeladen'] == true) {   ?>
                <div class="alert alert-info" role="alert">
                  Ihr alter Spielstand wurde geladen!
                </div>
              <?php  $_SESSION['spielGeladen'] = false; }  ?>
              <?php if (isset($_GET["speichern"])) {   ?>
                <div class="alert alert-info" role="alert">
                  Ihr Spielstand wurde gespeichert!
                </div>
              <?php }  ?>
              <?php if (isset($_REQUEST['safe']) && $_REQUEST['safe'] == 'npossible') {   ?>
                <div class="alert alert-info" role="alert">
                  Vor dem Bunkern muss gewürfelt werden!
                </div>
              <?php }  ?>
  	       	</div>
  	      </div>
  				<div class="main-l main-center">
            <div class="alert alert-info" role="alert" id="infoBox"> <?php $spiel->anDerReihe(); ?> </div>

            <!-- Button und Anzeige ZugAnzahl sowie summeSpielzug -->
            <fieldset class="form-group">
              <form class="form-horizontal" method="post" action="?">
                <div class="btn-group btn-group-justified" role="group" aria-label="Right Align">
                    <div class="btn-group" role="group">
                      <input class="btn btn-default" type="submit" name="wurf" value="Würfeln"></input>
                    </div>
                    <div class="btn-group" role="group">
                      <input class="btn btn-default" type="submit" name="bunkern" value="Bunkern"></input>
                    </div>
                </div>
              </form>
            </fieldset>

            <div style="text-align: center;">
              <?php
              if (isset($_SESSION['wuerfelErgebnis'])) {
                switch ($_SESSION['wuerfelErgebnis']) {
                  case 0:
                  ?>
                  <img src="PNG/wuerfel0.png" alt="0">
                  <?php
                  break;
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
            </div>

            <div class="erzieltePktDiv">
              <legend> Spielrunde: </legend>
              <label> Punkte in diesem Spielzug: </label>
              <p class="erzieltePktP"> <?php echo $_SESSION['summeSpielzug'] ?></p>
              <label> Runde: </label>
              <p class="Zug"> <?php echo $_SESSION['runde'] ?> </p>
            </div>


            <!-- Anzeige Spielerscores gesamt -->
            <div>
              <legend> Spielerpunkte: </legend>
              <label><?php echo $_SESSION['spieler1'] ?>:</label>
              <div class="progress">
                <div class="progress-bar " role="progressbar" style="width: <?php echo $_SESSION['summeS1'] ?>%" aria-valuenow="<?php echo $_SESSION['summeS1'] ?>" aria-valuemin="0" aria-valuemax="101"><?php echo $_SESSION['summeS1'] ?></div>
              </div>

              <div class="has-warning">
                <label class=""  data-toggle="modal" data-target="#myModal"><?php echo $_SESSION['spieler2'] ?>:</label>
              </div>
              <div class="progress">
                <div class="progress-bar " role="progressbar" style="width: <?php echo $_SESSION['summeS2'] ?>%" aria-valuenow="<?php echo $_SESSION['summeS2'] ?>" aria-valuemin="0" aria-valuemax="101"><?php echo $_SESSION['summeS2'] ?></div>
              </div>
            </div>
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
