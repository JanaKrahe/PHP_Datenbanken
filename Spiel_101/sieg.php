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
    <div id="siegesDiv">
      <p> <?php echo 'Gewonnen hat: '.$_SESSION['Sieger']; ?>
    </div>
    <div id="neuesSpiel">
      <fieldset class="schmal">
        <form method="post">
          <input class="btn btn-default" type="submit" name="newGame" value="neues Spiel"></input>
        </form>
      </fieldset>
    </div>
    <!-- Anzeige Ranking -->
    <div class="ranking">
      <form method="post">
        <input class="btn btn-default" type="submit" name="rangliste" value="Ranking"></input>
      </form>
      <table class="rankingListe" id="ranking">
        <thead>
          <tr>
            <th>Spieler</th>
            <th>Züge</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $zaehler = true;
          foreach ($ran->rankingAusgeben() as $v1 ) {
            if ($zaehler) {
              ?>
              <tr>
                <td> <?php echo $v1; ?> </td>
                <?php
                $zaehler = false;
              }
              else {
                ?>
                <td> <?php echo $v1; ?> </td>
              </tr>
              <?php
              $zaehler = true;
            }
          }
          ?>
        </tbody>
      </table>
    </div>

  </body>
  </html>
