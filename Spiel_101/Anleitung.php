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
                Es gewinnt derjenige Spieler, der zuerst in Summe 101 Augen gesammelt hat.
                Innerhalb eines Spielzugs werden alle Würfelaugen zusammengezählt, bis entweder eine EINS gewürfelt wird,
                dann ist der Zug zu Ende und alle Punkte dieses Zugs sind verloren, oder der Spieler den Würfel weiterreicht.
                Nur in diesem Fall werden die gewürfelten Augen aufsummiert und dem Konto des Spielers gutgeschrieben.
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
