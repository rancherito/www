<?php

include 'server.php';
function parametros($proce)
  {
    $valor = '(';
    for ($i=1; $i < count($proce); $i++)$valor.=($i!=1?",":"")."'".$proce[$i]."'";

    $valor.=')';
    return $valor;
  }

function gCall($procedure)
  {

    $limites = arrayCompletar(str_split('(),'));
    $ar = array();
    $temm='';$count=0;
    for ($i=0; $i < strlen($procedure); $i++) {

      if (!$limites[$procedure[$i]]) {
        $temm = $temm.$procedure[$i];
      }else {

        if (strlen($temm)>0) {
          $ar[$count]=str_replace('$','',$temm);
          $count++;
          $temm='';
        }
      }

    }
    return $ar;
  }

function arrayCompletar($value)
  {     $la = array();
        for ($i=0; $i < count($value); $i++) {
          $la[$value[$i]]=$value[$i];
        }
        return $la;
  }

function DB($proc,$DB){
   $db = new mysqli($proc[1].':'.$proc[2],$proc[3],$proc[4],$DB);
   return $db;
}
function discDB($conexion){
    $close = mysqli_close($conexion);
    return $close;
}

function DATA($conn,$sql)
  {
    $conn->set_charset("utf8");
    if(!$result = mysqli_query($conn, $sql)) die('{"PROCESO":"CONSULTA_INTERRUMPIDA"}');
    $result2 = $result;
    $rawdata = array();
    $i=0;


    while($row = $result->fetch_array(MYSQLI_ASSOC)){$rawdata[$i] = $row;$i++;}

    $rawdata2 = array();
    $i=0;
    $info_campo = $result2->fetch_fields();
    foreach ($info_campo as $valor) {
      $rawdata2[$i] = $valor->name;
      $i++;
    }


    discDB($conn);


    return [0 => $rawdata,1 => $rawdata2];
  }


 ?>
