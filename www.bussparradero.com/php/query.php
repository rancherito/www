<?php

include 'funciones.php';
include 'procedures.php';

  if ($_POST) {
    if ($_POST['procedure']) {
      include 'listProcedures.php';
    }else {
      echo '{"PROCESO":"FALLIDO"}';
    }
  }
  else {
    echo '{"PROCESO":"FALLIDO"}';
  }

 ?>
