<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <meta charset="utf-8">
</head>
<body>
  <?php
  include ('FelderInhalt.php');
  $feld = new Pruefen;
  $feld->error = false;
  ?>
  <h1>Spiel 101</h1>
    <fieldset>
      <legend>Bitte melden Sie sich an.</legend>
      <p><span class="error">* Pflichtfelder</span></p>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      E-Mail:<br>
      <input type="email" size="40" maxlength="250" name="email">
      <span class="error">* <?php $feld->pruefungEmail(); ?></span>
      <br>Dein Passwort:<br>
      <input type="Password" size="40"  maxlength="250" name="passwort">
      <span class="error">* <?php $feld->pruefungPasswort(); ?></span><br>
      <?php $feld->login(); ?><br>

      <input type="submit" value="Anmelden" name="Anmelden">
  </form>
</fieldset>


  <fieldset>
  <form method="post">
      <label>
      <input type="radio" name="gender" value="registrieren"> Registrieren<br>
      <input type="radio" name="gender" value="anmelden" checked="checked""> Anmelden<br>
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
