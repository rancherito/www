<?php
  error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
  include 'functions.php';
  if ($_POST) {
    if (!empty($_POST['function'])) {
      $func = gCall($_POST['function']);

      if ($func[0]==='cerrarSecion') {
        session_start();
        unset($_SESSION['user']);
        unset($_SESSION['pass']);
      }
      if ($func[0]==='startSecionAdm') {
        session_start();
        $_SESSION['user'] = $func[1];
        $_SESSION['pass'] = $func[2];
      }
    }
  }
 ?>
