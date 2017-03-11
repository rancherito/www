<?php



  function f_parameters($function){
    $procedure = htmlspecialchars($function);
    preg_match('/\([\w\W]+\)/i',$procedure,$encontrado);
    $array_r = array_merge([explode('(',$procedure)[0]],explode(',$',substr($encontrado[0],2,-1)));
    return $array_r;
  }

  function completeArray($value){
    $array_r = array();
    for ($i=0; $i < count($value); $i++) {
      $array_r[$value[$i]]=$value[$i];
    }
    return $array_r;
  }

  function createProjet($Projet){
$bodyIndex = <<<EOT
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>my projet</title>
    </head>
	<body>
		<div class="panel_p">
				<div class="n_panel_p n_header"></div>
				<div class="n_panel_p n_body">hola mundo</div>
				<div class="n_panel_p n_footer"></div>
		</div>
  	</body>
</html>
EOT;

$style = <<<EOT
*{
  color: transparent;
  background: transparent !important;
  text-indent:-999px;
  font: 0/0 a;
  text-shadow: transparent;
  color: transparent;
  text-decoration: none;
}
div.n_panel_p{
  border: 1px gray dashed;
  box-sizing: border-box;
  padding: 10px 0;
  margin: 1px 0;
  border-radius: 4px;
}
div.n_panel_p::before{
  content: "Add Gatget";
  display: block;
  background: #dcdcdc;
  height: 30px;
  font-family: Calibri;
  text-indent: 0px;
  font-size: 18px;
  line-height: 30px;
  color: #545454;
  text-align: center;
  cursor: pointer;
}
EOT;
    $dir = '../'.$Projet;

    if (is_dir($dir)) {
      echo '{"PROCESS":"FAIL"}';
    }else {
      mkdir($dir, 0777, true);
      echo '{"PROCESS":"CORRECT"}';
      $myfile = fopen($dir.'/index.php', "w");fwrite($myfile, $bodyIndex);fclose($myfile);
      $myfile = fopen($dir.'/indexArq.php', "w");fwrite($myfile, str_replace('</head>',"<link rel='stylesheet' href='cgMProjet/style.css'>\n</head>",$bodyIndex));fclose($myfile);

      mkdir($dir.'/cgMProjet', 0777, true);
      $myfile = fopen($dir.'/cgMProjet/index.cgM', "w");fwrite($myfile, $bodyIndex);fclose($myfile);
      $myfile = fopen($dir.'/cgMProjet/style.css', "w");fwrite($myfile, $style);fclose($myfile);
      $myfile = fopen($dir.'/projet.cginfo', "w");fclose($myfile);

      mkdir($dir.'/src', 0777, true);

      mkdir($dir.'/src/js', 0777, true);
      $myfile = fopen($dir.'/src/js/main.js', "w");fclose($myfile);
      mkdir($dir.'/src/css', 0777, true);
      $myfile = fopen($dir.'/src/css/style.css', "w");fclose($myfile);

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
    $dir = '../'.$projet.'/src';
    $files = [];
    if (is_dir($dir)) {
      foreach (scandir($dir) as $key => $value) {
        $dirSrc = $dir.'/'.$value;
        if ($value != '.' && $value != '..' && is_dir($dirSrc)) {
          foreach (scandir($dirSrc) as $key2 => $value2) {
            $dirFile = $dirSrc.'/'.$value2;
            if (is_file($dirFile)) {
              array_push($files,[$value2, $dirFile]);
            }
          }
        }
      }
    }else {
      mkdir($dir, 0777, true);
    }
    return $files;
  }

  function getCodeSourceProjet($projet, $source){
    $dir = $source;
    $read = fopen($dir, "r");
    $size = filesize($dir);
    $contenido = $size > 0 ? fread($read, $size):'';
    fclose($read);

    return $contenido;
  }

  function saveProjets($projet,$toWrite){
    $extencion = ['css' => '<link rel="stylesheet" href="{{link}}">','js' => '<script src="{{link}}"></script>'];
    $ruta = ['css' => 'css','js' => 'js'];

    $dir = '../'.$projet.'/cgMProjet/index.cgM';
    $toWriteDoc = htmlspecialchars_decode($toWrite);
    $myfile = fopen($dir, "w");
    fwrite($myfile, $toWriteDoc);fclose($myfile);

    preg_match("/{{[a-z:. ]+}}/i",$toWriteDoc,$search);
    $newstring = preg_replace_callback(
      '/{{[a-z:. ]+}}/i',
      function($match) use ($extencion, $projet, $ruta) {

          $resourceToReplace = preg_replace('/ /i','',$match[0]);
          preg_match('/[a-z]+\.[a-z]+/i',$resourceToReplace,$resourceToReplace);
          $resourceEnd = $resourceToReplace[0];
          $ext = (new SplFileInfo($resourceEnd))->getExtension();
          $rutaEnd = (!empty($ruta[$ext]) ? $ruta[$ext] : 'other');
          $dirSrc = "../$projet/src/$rutaEnd/$resourceEnd";

          $newSource = '';
          if (is_file($dirSrc)) {
            $newSource = preg_replace('/{{link}}/i',"src/$rutaEnd/$resourceEnd",$extencion[$ext]);
          }

         return (($newSource));
       },
      $toWriteDoc
    );

    $myfile = fopen("../$projet/index.php", "w");
    fwrite($myfile, $newstring);fclose($myfile);

    $indexArq = str_replace('</head>',"<link rel='stylesheet' href='cgMProjet/style.css'>\n</head>",$newstring);

    $myfile = fopen("../$projet/indexArq.php", "w");
    fwrite($myfile, $indexArq);fclose($myfile);


  }
  function saveSourceProjets($projet, $source, $toWrite){
    $dir = $source;
    $myfile = fopen($dir, "w");
    fwrite($myfile, htmlspecialchars_decode($toWrite));
    fclose($myfile);
  }
  function createDirByExt($projet,$ext){
    $extencion = ['css' => 'css', 'js' => 'js'];
    $ext = !empty($extencion[$ext]) ? $extencion[$ext] : 'others';
    $dir = '../'.$projet.'/'.$ext;
    if (!file_exists($dir) && !is_file($dir)) {
      mkdir($dir, 0777, true);
    }
    return [$dir, $ext];
  }
  function lastModified($path){
    return is_file($path) ? filemtime($path) : '0000000000';
  }

 ?>
