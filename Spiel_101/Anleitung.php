<!DOCTYPE html>
<html>
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
    <title>Anleitung</title>
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-upper">
      <div class="navbar-header">
        <a class="navbar-brand headline">Spiel 101</a>
        <ul class="nav navbar-nav navbar-left">
          <li><a>Anleitung</a></li>
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
            <form class="form-horizontal" action="OberflaecheSpiel.php" method="post">
              <h4 style="margin-left: auto; margin-right: auto;"><span class="label label-default">Anleitung für das Spiel 101</span> <br><br>
                Spielziel: <br>
                Beim Spiel 101 geht es darum, durch glückliches und geschicktes Würfeln und
                überlegtes bunkern der erzielten Augensumme möglichst viele Punkte zu erzielen.
                <br><br>
                Würfeln <br>
                Zu Beginn eines Zugs wird der Würfel frisch gewürfelt.
                Du kannst diese Kombination direkt bunkern oder versuchen, noch mehr für dein Konto zu sammeln.
                Du kannst solange Würfeln, wie du dich traust!
                Nur Würfelst du eine "1" verlierst du alle Augen dieses Zugs.

                <br><br>
                Bunkern <br>
                Die erwürfelten Augen kannst du mittels "bunkern" auf deinem Konto speichern.
                Sobald du bunkerst werden die gewürfelten Augen aufsummiert auf deinem Konto gutgeschrieben
                und können nicht mehr durch eine "1" gelöscht werden.

                <br><br>
                Spielzug <br>
                Ein Spielzug endet, sobald der aktuelle Spieler eine "1" gewürfelt hat oder "bunkert".
                Nach einer dieser Aktionen, ist der nächste Spieler dran.

                <br><br>
                Spielende und Gewinner <br>
                Das Spiel endet, sobald ein Spieler 101 Augen auf seinem Konto gespeichert hat.
                Dieser Spieler ist auch der sofortige Gewinner.



              </h4>
              <br>
              <button type="submit" name="zurueck">Zurück zum Spiel</button>
            </form>
  				</div>
          <div>
            <hr />
            <p style="text-align: center"> &copy; Jana Krahe &amp; Lars Korthing </p>
          </div>
  			</div>
  		</div>
  </body>
</html>
