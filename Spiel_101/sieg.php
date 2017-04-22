<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/meinecss.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="regler.js"> </script>
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

    <?php
      if (isset($_POST["newGame"]) && $_POST["newGame"] == "neues Spiel") {

        $_SESSION['Sieger'] = "";
        $_SESSION['summeS1'] = 0;
        $_SESSION['summeS2'] = 0;
        $_SESSION['amZug'] = true;
        header("Location: OberflaecheSpiel.php");
      }
    ?>
  </body>
  </html>
