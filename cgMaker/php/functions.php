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

    var_dump(is_dir('..'));
    echo '../';
  }


 ?>
