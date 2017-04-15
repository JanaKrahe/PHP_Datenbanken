<html>
<head>
  <title>Registrierung</title>
</head>
<body>
  <h1>Spiel 101</h1>
  <form method="post">
    <fieldset>
      <legend>Bitte melden Sie sich an.</legend>
      E-Mail:<br>
      <input type="email" size="40" maxlength="250" name="email"><br>
      Dein Passwort:<br>
      <input type="Password" size="40"  maxlength="250" name="passwort"><br><br>

      <input type="submit" value="Anmelden">
    </fieldset>
  </form>

  <fieldset>
    <legend></legend>
  <form method="post">
      <label>
      <input type="radio" name="gender" value="registrieren"> Registrieren<br>
      <input type="radio" name="gender" value="anmelden" checked="checked"> Anmelden<br>
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
