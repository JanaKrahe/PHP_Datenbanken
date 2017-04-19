<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/meinecss.css">
    <script src="regler.js"> </script>
    <title>Spiel101</title>
  </head>
  <body>
    <!-- http://localhost/PHP_Datenbanken/Spiel_101/OberflaecheSpiel.php -->
    <!-- Sichtbarer Dokumentinhalt im body
    <p>Sehen Sie sich den Quellcode dieser Seite an.
      <kbd>(Kontextmenu: Seitenquelltext anzeigen)</kbd></p> -->
      <div>
        <h1>Spiel 101</h1>

      <?php
          session_start();
          var_dump($_SESSION);
          include 'Spieler.php';
          include 'Ranking.php';
          $name = $_SESSION['spieler1'];
          $spieler1 = new Spieler($name);
          $spieler2 = new Spieler('Gast');
          $ran = new Ranking();
      ?>
      </div>
      <div>
        <fieldset class="schmal">
          <form method="post">
            <input class="btn btn-default" type="submit" name="wurf" value="Würfeln"></input>
            <?php $spieler1->wuerfelnAuswertung();
            var_dump($_SESSION);?>
            <input class="btn btn-default" type="submit" name="bunkern" value="Bunkern!"></input>
            <input class="btn btn-default" type="submit" name="reset" value="neues Spiel"></input>
            <div class="erzieltePktDiv">
              <p class="erzieltePktP"> Test</p>
            </div>
          </form>
        </fieldset>
      </div>

      <div class="Spielerscores">
        <fieldset class="schmal">
          <label for="score">Spieler1: </label>
	        <input type="range" id="score" class="regler" value="0"> </input>
	        <output id="output" for="score">0</output> <br>
        </fieldset>
      </div>

      <div class="Spielerscores">
        <fieldset class="schmal">
          <label for="scoreG">Spieler2:</label>
  	      <input type="range" id="scoreG" class="regler" value="0"> </input>
  	      <output id="outputG" for="scoreG">0</output>
        </fieldset>
      </div>

      <div class="ranking">
        <form method="post">
          <input class="btn btn-default" type="submit" name="rangliste" value="Ranking"></input>
        </form>
        <table class="rankingListe">
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

      <div class="anleitung">
        <button class="btn btn-default" type="button" onclick="anleitung()" name="btnAnleitung">Anleitung</button>
      </div>
      <div>
        <p> </p>
        <p>
          <?php
            function anleitung()
            {
              ?>
              <script>window.alert(
                "<h4> Anleitung </h1> <br> <p> Hier wird die Anleitung stehen!</p>");
              </script>
              <?php
            }
          ?>
        </p>
      </div>
      <div id="infoDiv">
        <p class="infoBox" name="infoBox"> #InfoBox </p>
      </div>

      <div class="logoutDiv">
        <form method="post">
          <input class="btn btn-default" type="submit" name="logout" value="logout"></input>
          <?php $spieler1->logoutAuswertung(); ?>
        </form>
      </div>      
  </body>
</html>
