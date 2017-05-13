<?php
//session_start();

//Prüfung ob User eingeloggt ist
if (empty($_SESSION['eingeloggt'])) {
header("Location: index.php?site=login");
}

//Automatischer Logout nach 10 Minuten
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 600)) {
  session_unset();
  session_destroy();
  header("Location: index.php?site=automatic");
}
// Update des Aktivitätszeitstempel
$_SESSION['LAST_ACTIVITY'] = time();

include '../classes/spiel.php';

$spiel = new Spiel();
//Prüft ob der Reset-Button gedrückt wurde
$spiel->resetNachSieg();
//Prüft ob der Logout-Button gedrückt wurden
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
          <li><a href="?reset"><span class="glyphicon glyphicon-plus"></span> Neues Spiel</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a><span class="glyphicon glyphicon-user"></span> Angemeldet als <?php echo $_SESSION['spieler1']; ?></a></li>
          <li><a href="?logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        </ul>
      </div>
    </nav>
    <!-- Main-Content -->
    <div class="container">
  			<div class="row main">
  				<div class="panel-heading">
  	        <div class="panel-title text-center">
  	        </div>
  	      </div>
  				<div class="main-l main-center">
            <div id="siegesDiv">
              <legend> Gewonnen hat: </legend>
              <h4 style=" text-align: center; color: rgb(51, 122, 183)">
                <span class="glyphicon glyphicon-menu-left"></span>
                <span class="glyphicon glyphicon-menu-left"></span>
                <span class="glyphicon glyphicon-menu-left"></span>
                <?php echo $_SESSION['sieger']; ?>
                <span class="glyphicon glyphicon-menu-right"></span>
                <span class="glyphicon glyphicon-menu-right"></span>
                <span class="glyphicon glyphicon-menu-right"></span></h4><br> <br>
            </div>
            <br>
            <!-- Anzeige Ranking -->
            <div>
              <legend> Ranking: </legend>
              <br>
              <?php
              $datenbank = new DatenbankAufrufe;
              $ranking = array($datenbank->ranking());
              if ($ranking != NULL) {
                ?>
                <div class="ranking">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Sieger</th>
                        <th>Züge</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $rowcount = 1;
                      $firstmatch = true;
                      foreach ($ranking[0] as $key => $row) {
                        //Hervorhebung des aktuellen Spielstands
                        if ($row['sieger'] == $_SESSION['sieger'] && $row['zugAnzahl'] == $_SESSION['runde'] && $firstmatch) {
                          ?>
                          <tr class="info">
                            <th scope="row"><?php echo $rowcount; ?></th>
                            <td><?php echo $row['sieger']; ?></td>
                            <td><?php echo $row['zugAnzahl']; ?></td>

                          </tr>
                          <?php
                          $firstmatch = false;
                        }
                        else {
                          ?>
                          <tr>
                            <th scope="row"><?php echo $rowcount; ?></th>
                            <td><?php echo $row['sieger']; ?></td>
                            <td><?php echo $row['zugAnzahl']; ?></td>
                          </tr>
                          <?php
                        }
                        $rowcount += 1;
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
                <?php
              }else {
                echo "Es existiert noch kein beendetes Spiel.";
              }
              ?>
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
