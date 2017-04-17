<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/meinecss.css">
    <script src="regler.js"> </script>
    <title>Spiel101</title>
  </head>
  <body>
    <!-- http://localhost/PHP_Datenbanken/Spiel_101/Oberfl%C3%A4cheSpiel.php -->
    <!-- Sichtbarer Dokumentinhalt im body
    <p>Sehen Sie sich den Quellcode dieser Seite an.
      <kbd>(Kontextmenu: Seitenquelltext anzeigen)</kbd></p> -->
      <div>
        <h1>Spiel 101</h1>

      <?php
          include 'Spieler.php';
          include 'Ranking.php';
          $spieler1 = new Spieler('Lars');
          var_dump($spieler1->getZugSumme());
          $spieler2 = new Spieler('Gast');

          $ran = new Ranking();
          $ran->arrayAusgeben();
      ?>
      </div>
      <div>
        <fieldset class="schmal">
          <form method="post">
            <input type="submit" name="wurf" value="Wurf"></input> <br>
            <input type="submit" name="bunkern" value="Bunkern!"></input>
            <input type="submit" name="reset" value="neues Spiel"></input>
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
          <input type="submit" name="rangliste" value="Ranking"></input>
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
              $zaehler = 0;
              foreach ($ran->namensSpalteAusgeben() as $v1 ) {
                $zugArray = $ran->zugSpalteAusgeben();
                  ?>
                    <tr>
                      <td> <?php echo $v2; ?> </td>
                      <td> <?php echo $zugArray[zaehler]; ?> </td>
                    </tr>
                  <?php
              }
             ?>
          </tbody>
        </table>
      </div>

      <div class="anleitung">
        <button type="button" onclick="anleitung()" name="btnAnleitung">Anleitung</button>
      </div>
      <div>
        <p>
          <?php
            include 'includeTest.php';
          ?>
        </p>
        <p>
          <?php
            var_dump($spieler1->getZugSumme());

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
        <p class="infoBox" name="infoBox"> #InfoBox
        </p>
      </div>

      <div class="logoutDiv">
        <form method="post">
          <input type="submit" name="logout" value="logout"></input>
        </form>
      </div>
  </body>
</html>
