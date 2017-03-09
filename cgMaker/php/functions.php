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

$bodyIndex = <<<EOT
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>my projet</title>
    </head>
	<body>
		<div class="panel_p">
			<div class="panel_s">
				<div class="n_panel_p n_header">
					<div class="n_panel_s"></div>
				</div>
				<div class="n_panel_p n_body">
					<div class="n_panel_s">hola mundo</div>
				</div>
				<div class="n_panel_p n_footer">
					<div class="n_panel_s"></div>
				</div>
			</div>
		</div>
  	</body>
</html>
EOT;

    if (is_dir($dir)) {
      echo '{"PROCESS":"FAIL"}';
    }else {
      if(!mkdir($dir, 0777, true)) {
        die('{"PROCESS":"FAIL"}');
      }else {
        echo '{"PROCESS":"CORRECT"}';
        $myfile = fopen($dir.'/index.php', "w");
        fwrite($myfile, $bodyIndex);fclose($myfile);

        mkdir($dir.'/cgMProjet', 0777, true);
        $myfile = fopen($dir.'/cgMProjet/head.cgM', "w");fclose($myfile);
        $myfile = fopen($dir.'/cgMProjet/body.cgM', "w");fclose($myfile);
        $myfile = fopen($dir.'/projet.cginfo', "w");fclose($myfile);

        mkdir($dir.'/cgMProjet/sources', 0777, true);
        $myfile = fopen($dir.'/cgMProjet/sources/main.js', "w");fclose($myfile);
        $myfile = fopen($dir.'/cgMProjet/sources/style.css', "w");fclose($myfile);
      }
    }
  }

  function list_projets(){
    $projetsCG = [];

    $directorio = '../';
    foreach (scandir($directorio) as $key => $value) {
      $dir =  '../'.$value;
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

  function sourcesProjet($projet){
    $dir = '../'.$projet.'/cgMProjet/sources';
    $files = [];
    foreach (scandir($dir) as $key => $value) {
      if (is_file($dir.'/'.$value)) {
        array_push($files,$value);
      }
    }
    return $files;
  }
  function getCodeSourceProjet($projet, $source){
    $dir = '../'.$projet.'/cgMProjet/sources/'.$source;
    $read = fopen($dir, "r");
    $size = filesize($dir);
    $contenido = $size > 0 ? fread($read, $size):'';
    fclose($read);

    return $contenido;
  }

  function saveProjets($projet,$toWrite){
    $dir = '../'.$projet.'/index.php';
    $myfile = fopen($dir, "w");
    fwrite($myfile, htmlspecialchars_decode($toWrite));
    fclose($myfile);
  }
  function saveSourceProjets($projet, $source, $toWrite){
    $dir = '../'.$projet.'/cgMProjet/sources/'.$source;
    $myfile = fopen($dir, "w");
    fwrite($myfile, htmlspecialchars_decode($toWrite));
    fclose($myfile);
  }

 ?>
