<?php
  session_start();
  $_SESSION['test'] = 'testtext';
  header("Location: OberflaecheSpiel.php");
 ?>
