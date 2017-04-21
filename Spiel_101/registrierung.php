<!DOCTYPE html>
<html>
<head>
  <title>Registrierung</title>
  <meta charset="utf-8">
</head>
<body>
        <?php
        include ('FelderInhalt.php');
        $feld = new Pruefen;
          ?>

  <h1>Spiel 101</h1>

  <fieldset>
    <legend>Bitte registrieren Sie sich für das Spiel 101</legend>

    <p><span class="error">* Pflichtfelder</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      Benutzername:<br>
      <input type="name" size="40" maxlength="250" name="benutzername" >
      <span class="error">* <?php $feld->pruefungBenutzername(); ?></span>
      <br>

      E-Mail:<br>
      <input type="email" size="40" maxlength="250" name="email">
      <span class="error">* <?php $feld->pruefungEmail(); ?></span>

      <br>Dein Passwort:<br>
      <input type="Password" size="40"  maxlength="250" name="passwort">
      <span class="error">* <?php $feld->pruefungPasswort(); ?></span>
      <br>

      Passwort wiederholen:<br>
      <input type="Password" size="40" maxlength="250" name="passwort2">
      <span class="error">*
        <?php $feld->pruefungPasswort2();
          $feld->passwortStimmenUeberein();
        ?>
      </span>
      <br><br>
      <input type="submit" value="Registrieren" name="Registrieren">
    </form>
  </fieldset>
  <fieldset>
  <form method="post">
      <label>
      <input type="radio" name="gender" id="registrieren" value="registrieren" checked="checked">
      <label name="reglab" for="registrieren">Registrieren</label> <br>
      <input type="radio" name="gender" id="anmelden" value="anmelden">
      <label name="anmlab" for="anmelden">Anmelden</label> <br>
      <input type="radio" name="gender" id="loeschen" value="loeschen">
      <label name="loelab" for="loeschen">Account löchen</label><br>
      <input type="radio" name="gender" id="kennwortAendern" value="kennwortAendern">
      <label name="kenlab" for="kennwortAendern" >Kennwort ändern</label><br>
      <input type="submit" value="Auswahl">
    </label>
  </form>
</legend>
</fieldset>

  <?php
    ini_set('display_errors', 0);
    include('radioCheck.php');
    $test = new RadiobuttonAuswerten;
    $test->auswertung();
  ?>
</body>
</html>
