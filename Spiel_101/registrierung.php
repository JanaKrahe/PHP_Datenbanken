<html>
<head>
  <title>Registrierung</title>
</head>
<body>
  <h1>Spiel 101</h1>

  <fieldset>
    <legend>Bitte registrieren Sie sich für das Spiel 101</legend>
    <form method="post">
      Benutzername:<br>
      <input type="name" size="40" maxlength="250" name="benutzername"><br>
      E-Mail:<br>
      <input type="email" size="40" maxlength="250" name="email"><br>
      Dein Passwort:<br>
      <input type="Password" size="40"  maxlength="250" name="passwort"><br>
      Passwort wiederholen:<br>
      <input type="Password" size="40" maxlength="250" name="passwort2"><br><br>

      <input type="submit" value="Registrieren">
    </form>
  </legend>
  </fieldset>
  <fieldset>
    <legend></legend>
  <form method="post">
      <label>
      <input type="radio" name="gender" value="registrieren"  checked="checked"> Registrieren<br>
      <input type="radio" name="gender" value="anmelden" onclick="check(this.value)"> Anmelden<br>
      <input type="radio" name="gender" value="loeschen"> Account löchen<br>
      <input type="radio" name="gender" value="kennwortAendern"> Kennwort ändern<br>
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
