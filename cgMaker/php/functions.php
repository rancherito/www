<?php
  function f_parameters($function){
    $procedure = htmlspecialchars($function);
    $limites = completeArray(str_split("(),"));
    $array_r = array(); $temm=""; $count=0;
    for ($i=0; $i < strlen($procedure); $i++) {
      if (empty($limites[$procedure[$i]])) {
        $temm = $temm.$procedure[$i];
      }else {
        if (strlen($temm)>0) {
          $array_r[$count]=str_replace("$","",$temm);
          $count++;
          $temm="";
        }
      }
    }
    return $array_r;
  }

  function completeArray($value){
    $array_r = array();
    for ($i=0; $i < count($value); $i++) {
      $array_r[$value[$i]]=$value[$i];
    }
    return $array_r;
  }

  function createProjet($nameProjet){
    $dir = '../'.$nameProjet;
    $id = $dir.'/projet.cginfo';
    if (is_dir($dir)) {
      echo '{"PROCESS":"FAIL"}';
    }else {
      if(!mkdir($dir, 0777, true)) {
        die('{"PROCESS":"FAIL"}');
      }else {
        echo '{"PROCESS":"CORRECT"}';
        $myfile = fopen($id, "w");
        fclose($myfile);
      }
    }
  }

  function list_projets(){
    $projetsCG = [];

    $directorio = '../';
    foreach (scandir($directorio) as $key => $value) {
      $dir =  $directorio.$value;
      if (is_dir($dir) && $value != '.' && $value != '..') {
        foreach (scandir($dir) as $key2 => $value2) {
          $dir1 = $dir.'/'.$value2;
          if (is_file($dir1)) {
            if ($value2 === 'projet.cginfo') {
              $projetsCG[$value] = $dir;
            }
          }
        }
      }
    }
    return $projetsCG;
  }
  function isProjet($projet){
    if (is_writable('../'.$projet)) {
      return is_writable('../'.$projet.'/projet.cginfo');
    }
    return false;
  }


 ?>
