<?php

  include 'functions.php';
  include 'procedures.php';
  if ($_POST) {
    if ($_POST['conecction']) {
        $dbconn = 'information_schema';
        $proc = gCall($_POST['conecction']);
        $sql = 'SELECT * FROM SCHEMATA';

        $DATA = DATA(DB($proc,$dbconn),$sql);
        echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';

    }
    elseif ($_POST['rutine']) {
      if ($_POST['rutine_schema']) {
        $dbconn = 'information_schema';
        $RUTINA = $_POST['rutine_schema'];
        $proc = gCall($_POST['rutine']);
        $sql = "SELECT * FROM PARAMETERS WHERE SPECIFIC_SCHEMA = '$RUTINA'";

        $DATA = DATA(DB($proc,$dbconn),$sql);
        echo '{"PROCESO":"EXITOSO","DATA":'.json_encode($DATA[0]).',"HEAD":'.json_encode($DATA[1]).'}';

      }else {
        echo '{"PROCESO":"SIN_RUTINA_DECLARADA"}';
      }

    }

    else if ($_POST['procedure']) {
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
