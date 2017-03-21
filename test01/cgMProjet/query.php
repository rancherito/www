<?php
date_default_timezone_set('America/Lima');
function f_parameters($function){
  $procedure = htmlspecialchars($function);
  preg_match('/\([\w\W]+\)/i',$procedure,$encontrado);
  $array_r = array_merge([explode('(',$procedure)[0]],explode(',$',substr($encontrado[0],2,-1)));
  return $array_r;
}
function editVarGatgets($file,$value){
  $dir = "src/gatgetDesign";
  $myfile = fopen("$dir/$file", "w");fwrite($myfile, htmlspecialchars_decode($value));fclose($myfile);
  print_r(generateFilesGatgets());
}
function generateFilesGatgets(){
  $r_array = [];
  $script = "";

  $dir = "../cgMProjet/src/gatgets";
  $dirNative = "../srcNative";
  $dirGD = "../cgMProjet/src/gatgetDesign";
  if (is_dir($dir)) {
    foreach (scandir($dir) as $key => $value) {
      $dirGG = "$dir/$value";
      if ($value != "." && $value != ".." && is_dir($dirGG)) {
        foreach (scandir($dirGG) as $key2 => $value2) {
          if (is_file("$dirGG/$value2")) {
            $extsn = pathinfo("$dirGG/$value2")['extension'];
            $filename = "$dirGG/$value2";
            $contenido = "";
            if($extsn === "js"){
              $gestor = fopen($filename, "rb");
              $contenido = fread($gestor, filesize($filename));
              fclose($gestor);
              $script.= "/*file from gatget $value scripts*"."/\n";
              $script .= "$contenido\n";
            }
            array_push($r_array,"$dirGG/$value2");
          }
        }
      }
    }
  }
  if (!is_dir("$dirNative/css")) {mkdir("$dirNative/css", 0777, true);}

  $script .= "//editing values\n";
  $script .= "function initGatgetComponets(){\n";
    foreach (scandir($dirGD) as $key => $value) {
      $filename = "$dirGD/$value";
      if (is_file($filename)) {
        $myfile = fopen($filename, "rb");
        $sizeFile = filesize($filename);
        $contenido = "";
        if ($sizeFile > 0) {
          $contenido = fread($myfile, $sizeFile);
          $script .= "$contenido\n";
        }
        fclose($myfile);

      }
    }
  $script .= "}";

  $myfile = fopen("$dirNative/js/gatgetScript.js", "w");fwrite($myfile, $script);fclose($myfile);

  return $r_array;
}
if (!empty($_POST['fn'])) {
  $n_f = f_parameters($_POST['fn']);
  if ($n_f[0] === 'editVarGatgets') {
    editVarGatgets($n_f[1],$n_f[2]);
  }

}
 ?>
