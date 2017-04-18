<?php
/**
 *
 */
class sessionClass
{

  function SessionStart()
  {
    ob_start();
    session_start();

    if ($_REQUEST['username'] == 'admin' && $_REQUEST['passwort'] =='1234') {
      $_Session['logged_IN_user'] = 'admin';
      # code...
    }
  }
}
 ?>
