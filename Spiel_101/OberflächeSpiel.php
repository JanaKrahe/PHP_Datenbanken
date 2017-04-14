<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>aussagekräftiger Titel der Seite</title>
  </head>
  <body>
    <!-- http://localhost/PHP_Datenbanken/Spiel_101/Oberfl%C3%A4cheSpiel.php -->
    <!-- Sichtbarer Dokumentinhalt im body
    <p>Sehen Sie sich den Quellcode dieser Seite an.
      <kbd>(Kontextmenu: Seitenquelltext anzeigen)</kbd></p> -->

      <p>Seite abgerufen am <?php
        echo date('d.m.Y \u\m H:i:s');
        ?> Uhr</p>

      <form method="post">
        <input type="submit" name="wurf" id="wurf" value="Wurf"></button>
      </form>

      <form method="post">
        <input type="submit" name="test" id="test" value="RUN" /><br/>
      </form>
      <?php
      function testfun()
      {
        echo "Your test function on button click is working";
      }
      if(array_key_exists('test',$_POST)){
        testfun();
      }
      include 'includeTest.php';

      ?>
  </body>
</html>
