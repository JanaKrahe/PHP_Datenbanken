<?php
    session_start();
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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/meinecss.css">
    <!-- Website Font style  -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

    <script src="regler.js"> </script>
    <title>Spiel101</title>
  </head>
  <body>
    <!-- http://localhost/PHP_Datenbanken/Spiel_101/OberflaecheSpiel.php -->

    <div class="container">
  			<div class="row main">
  				<div class="panel-heading">
  	               <div class="panel-title text-center">
  	               		<h1 class="title">Spiel 101 <br>
                      <small>Spielen</small> </h1>
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
                <hr />
                <div class="erzieltePktDiv">
                  <legend> Punkte in diesem Spielzug: </legend>
                  <p class="erzieltePktP"> <?php echo $_SESSION['summeSpielzug'] ?></p> <br>
                  <label> Runde: </label>
                  <p class="Zug"> <?php echo $_SESSION['runde'] ?> </p>
                </div>
              </form>
            </fieldset>

            <div id="infoDiv">
              <p class="infoBox" name="infoBox" value="#InfoBox">
                <?php $spiel->anDerReihe(); ?>
              </p>
            </div>

            <!-- Anzeige Spielerscores gesamt -->
            <div class="Spielerscores">
              <fieldset class="schmal">
                <label><?php echo $_SESSION['spieler1'] ?>:
                  <progress id="fortschritt1" value="<?php echo $_SESSION['summeS1'] ?>" max="101"></progress>
                  <output type="text" id="ausgSummeS1">
                    <?php echo $_SESSION['summeS1'] ?>
                  </output>
                </label>
              </fieldset>
            </div>
            <div class="Spielerscores">
              <fieldset class="schmal">
                <label><?php echo $_SESSION['spieler2'] ?>:
                  <progress id="fortschritt2" value="<?php echo $_SESSION['summeS2'] ?>" max="101"></progress>
                  <output type="text" id="ausgSummeS2">
                    <?php echo $_SESSION['summeS2'] ?>
                  </output>
                </label>
              </fieldset>
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
      <div class="logoutDiv">
        <form method="post">
          <input class="btn btn-default" type="submit" name="logout" value="logout"></input>
        </form>
      </div>
  </body>
</html>
