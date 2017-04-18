<html>
<head>
  <title>Kennwort ändern</title>
</head>
<body>
  <h1>Spiel 101</h1>

  <fieldset>
    <legend>Kennwort ändern</legend>
    <form method="post">
      E-Mail:<br>
      <input type="email" size="40" maxlength="250" name="email"><br>
      Altes Passwort:<br>
      <input type="Password" size="40"  maxlength="250" name="passwort"><br>
      Neues Passwort:<br>
      <input type="Password" size="40"  maxlength="250" name="passwort"><br>
      Neues Passwort wiederholen:<br>
      <input type="Password" size="40" maxlength="250" name="passwort2"><br><br>

      <input type="submit" value="Übernehmen">
    </form>
  </legend>
  </fieldset>
  <fieldset>
    <legend></legend>
  <form method="post">
      <label>
      <input type="radio" name="gender" value="registrieren"> Registrieren<br>
      <input type="radio" name="gender" value="anmelden"> Anmelden<br>
      <input type="radio" name="gender" value="loeschen"> Account löchen<br>
      <input type="radio" name="gender" value="kennwortAendern" checked="checked"> Kennwort ändern<br>
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
