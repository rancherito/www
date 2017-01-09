<?php
function Procedure($procedure)
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

function connectDB(){
   $db = new mysqli('localhost','root','12345678','bussparrandero');
   return $db;
}
function disconnectDB($conexion){
    $close = mysqli_close($conexion);
    return $close;
}
function arraySql($conn,$sql)
{
  $conn->set_charset("utf8");
  if(!$result = mysqli_query($conn, $sql)) die('{"PROCESO":"FALLIDO"}');
  $rawdata = array();
  $i=0;
  while($row = mysqli_fetch_array($result)){$rawdata[$i] = $row;$i++;}
  disconnectDB($conn);


  return $rawdata;
}

function sendSQL($conn,$sql)
{
  $conn->set_charset("utf8");



  if(!mysqli_query($conn,$sql)){
    die('{"PROCESO":"FALLIDO"');
  }
  echo '{"PROCESO":"EXITOSO"}';
  disconnectDB($conn);
}

function parametros($proce)
{
  $valor = '(';
  for ($i=1; $i < count($proce); $i++)$valor.=($i!=1?",":"")."'".$proce[$i]."'";

  $valor.=')';
  return $valor;
}

 ?>
