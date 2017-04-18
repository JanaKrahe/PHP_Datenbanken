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
    <legend>Kennwort ändern</legend>
    <p><span class="error">* Pflichtfelder</span></p>
    <form method="post"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      E-Mail:<br>
      <input type="email" size="40" maxlength="250" name="email">
      <span class="error">* <?php $feld->pruefungEmail(); ?></span>
      <br>
      Altes Passwort:<br>
      <input type="Password" size="40"  maxlength="250" name="passwort">
      <span class="error">* <?php $feld->pruefungPasswort(); ?></span><br>
      Neues Passwort:<br>
      <input type="Password" size="40"  maxlength="250" name="passwort2">
      <span class="error">* <?php $feld->pruefungPasswort2(); ?>
        <br>
      Neues Passwort wiederholen:<br>
      <input type="Password" size="40" maxlength="250" name="passwort3">
      <span class="error">* <?php $feld->pruefungPasswort3(); ?><br><br>

      <input type="submit" value="Kennwort Ändern" name="kennwortAendern">
      <?php $feld->kennwortAendern(); ?>
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
