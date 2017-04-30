<?php
  include 'spiel.php';
  if (isset($_POST["newGame"]) && $_POST["newGame"] == "neues Spiel") {

    $_SESSION['Sieger'] = "";
    $_SESSION['summeS1'] = 0;
    $_SESSION['summeS2'] = 0;
    $_SESSION['amZug'] = true;
    header("Location: OberflaecheSpiel.php");
  }

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
    <?php session_start(); ?>
    <nav class="navbar navbar-inverse navbar-upper">
      <div class="navbar-header">
        <a class="navbar-brand headline">Spiel 101</a>
        <ul class="nav navbar-nav navbar-left">
          <li><a>Gewonnen</a></li>
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
            <div id="siegesDiv">
              <legend> Gewonnen hat: </legend>
              <h4 style=" text-align: center; color: green">
                <span class="glyphicon glyphicon-menu-left"></span>
                <span class="glyphicon glyphicon-menu-left"></span>
                <span class="glyphicon glyphicon-menu-left"></span>
                <?php echo $_SESSION['Sieger']; ?>
                <span class="glyphicon glyphicon-menu-right"></span>
                <span class="glyphicon glyphicon-menu-right"></span>
                <span class="glyphicon glyphicon-menu-right"></span></h4><br> <br>
            </div>
            <div id="neuesSpiel">
              <fieldset class="schmal">
                <form method="post">
                  <input class="btn btn-default" type="submit" name="newGame" value="neues Spiel"></input>
                </form>
              </fieldset>
            </div>
            <br>
            <!-- Anzeige Ranking -->
            <div class="ranking">
              <form method="post">
                <input class="btn btn-default" type="submit" name="rangliste" value="Ranking"></input>
              </form>
              <br>
              <?php
              include('datenbank.php');
              $datenbank = new DatenbankAufrufe;
              var_dump($datenbank->existSpielstand(7));
              var_dump($datenbank->ranking());
              echo 'test';
              ?>
            </div>
          </div>
        </div>
      </div>
    </body>
  </html>
