<?php

  error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

  include 'functions.php';
  include 'procedures.php';
  if ($_POST) {
    if (!empty($_POST['conecction'])) {
        $dbconn = 'information_schema';
        $proc = gCall($_POST['conecction']);
        $sql = 'SELECT * FROM SCHEMATA';

        $DATA = DATA(DB($proc,$dbconn),$sql);
        echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';

    }
    elseif (!empty($_POST['rutine'])) {
      if (!empty($_POST['rutine_schema'])) {
        $dbconn = 'information_schema';
        $RUTINA = $_POST['rutine_schema'];
        $proc = gCall($_POST['rutine']);
        $sql = "SELECT * FROM ROUTINES WHERE ROUTINE_SCHEMA = '$RUTINA' AND ROUTINE_TYPE='PROCEDURE'";

        $DATA = DATA(DB($proc,$dbconn),$sql);
        echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';

      }else {
        echo '{"PROCESO":"SIN_RUTINA_DECLARADA"}';
      }

    }

    else if (!empty($_POST['procedure'])) {
      $proc = gCall($_POST['procedure']);
      include 'listProcedures.php';
    }
    else {
      echo '{"PROCESO":"CONSULTA_INEXISTENTE"}';
    }
  }else {
    echo '{"PROCESO":"SIN_PARAMETROS"}';
  }
 ?>
