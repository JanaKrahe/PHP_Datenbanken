<html>
<head>
  <title>Benutzer löchen</title>
</head>
<body>
  <h1>Spiel 101</h1>
  <form method="post">
    <fieldset>
      <legend>Zum Löschen eines Accounts, geben Sie bitte die Anmelde-Daten ein</legend>
      E-Mail:<br>
      <input type="email" size="40" maxlength="250" name="email"><br>
      Dein Passwort:<br>
      <input type="Password" size="40"  maxlength="250" name="passwort"><br><br>

      <input type="submit" value="Weiter">
    </fieldset>
  </form>

  <fieldset>
    <legend></legend>
  <form method="post">
      <label>
      <input type="radio" name="gender" value="registrieren"  checked="checked"> Registrieren<br>
      <input type="radio" name="gender" value="anmelden" onclick="check(this.value)"> Anmelden<br>
      <input type="radio" name="gender" value="loeschen"> Account löchen<br>
      <input type="radio" name="gender" value="kennwortAendern"> Kennwort ändern<br>
      <input type="submit" value="Spieler löschen">
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
