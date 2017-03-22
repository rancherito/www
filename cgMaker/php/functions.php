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
    <script src='srcNative/js/jquery-1.12.4.js'></script>
    <script src='srcNative/js/cg.class.js'></script>
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
div.n_panel_p, div.n_panel_a{
  border: 1px gray dashed;
  box-sizing: border-box;
  padding: 10px 0;
  margin: 1px 0;
  border-radius: 4px;
}
.restore{
  font-family: Calibri;
  text-indent: 0px;
  font-size: 18px;
  line-height: normal;
  color: black;
}
div.addGatget{
  height: 30px;
  text-align: center;
  padding: 0 10px;
  box-sizing: border-box;
  overflow: hidden;
  position: relative;
}
div.addGatget > div{
  color: #545454;
  height: 30px;
  background: #dcdcdc !important;
  line-height: 30px;
  border-radius: 4px;
  cursor: pointer;
  transition: all 0.2s linear;
}
div.addGatget > div:hover{
  background: #afafaf !important;
}

div.pnl_setgatget, div.pnl_gatget{
  width: 100%;
  height: 100%;
  background: gray !important;
  position: fixed;
  top: 0;
  left: 0;
}
div.pnl_setgatget > div.n_bodyGatget_p, div.pnl_gatget > div.n_bodyGatget_p{
  background: white !important;;
  height: calc(100% - 60px);
  box-sizing: border-box;
  padding: 10px;
  overflow: auto;
}
div.pnl_setgatget > div.n_settingsGatget_p, div.pnl_gatget > div.n_settingsGatget_p{
  background: #ffb266 !important;;
  height: 60px;
  box-sizing: border-box;
  padding: 10px;
}
div.pnl_setgatget > div.n_settingsGatget_p > button, div.pnl_gatget > div.n_settingsGatget_p > button{
  height: 30px;
  width: 130px;
  background: #ff5722 !important;
  float: right;
  margin-left: 10px;
  margin-top: 5px;
  border-style: solid;
  border: 0;
  outline: 0;
  cursor: pointer;
  border-radius: 3px;
  color: white;
  transition: all 0.2s linear;
}
div.pnl_setgatget > div.n_settingsGatget_p > button:hover,div.pnl_gatget > div.n_settingsGatget_p > button:hover{
  background: #ff855f !important;
}
div.pnl_setgatget > div.n_bodyGatget_p > div{
  margin-bottom: 10px;
  box-sizing: border-box;
  border: 1px #ff5722 solid;
  border-radius: 3px;
}
div.pnl_setgatget > div.n_bodyGatget_p > div > div {
  background: #ff5722 !important;
  height: 30px;
  line-height: 30px;
  box-sizing: border-box;
  padding: 0 10px;
}
div.pnl_setgatget > div.n_bodyGatget_p > div > textarea{
  width: 100%;
  max-width: 100%;
  outline: 0;
  box-sizing: border-box;
  padding: 10px;
}

.cgObjet{
  background: #dcdcdc !important;
}

.cgObjet > div.editGatget{
  background: #545454 !important;
  color: white;
  padding: 5px;
  box-sizing: border-box;
  border-radius: 3px;
  text-align: center;
  cursor: pointer;
  transition: all 0.2s linear;
  font-size: 14px;
}

.cgObjet > div.editGatget:hover{
  background: #afafaf !important
}

div.contentPage{
  margin: 0 10px;
  text-align: center;
  height: 30px;
  background: #dcdcdc !important;
  border-radius: 3px;
  line-height: 30px;
}

EOT;
$scriptCode = <<<EOT
$(document).ready(function() {
	var pnlGatget = cg.$('div').addClass('pnl_gatget').hide().appendTo($('body'));
	var add = cg.$('div').text('Add your Gatget').addClass('restore');
	var addGatget = cg.$('div')
	.addClass('addGatget restore')
	.append(add);

	pnlGatget.append(
		cg.$('div').addClass('n_bodyGatget_p'),
		cg.$('div').addClass('n_settingsGatget_p').append(
			cg.$('button').addClass('btn_close restore').text('Close Panel'),
			cg.$('button').addClass('btn_save restore').text('Add Gatget')
		)
	);
	pnlGatget.find('.btn_close').click(function(event) {
		pnlGatget.hide();
	});

	add.click(function(event) {
		$(this).parent().parent().append(cg.$('div').text('some text').addClass('restore'));
		pnlGatget.show();
	});
	$('div.n_panel_p').prepend(addGatget);
});
EOT;
    $dir = '../'.$Projet;

    if (is_dir($dir)) {
      echo '{"PROCESS":"FAIL"}';
    }else {
      mkdir($dir, 0777, true);
      echo '{"PROCESS":"CORRECT"}';
      $myfile = fopen($dir.'/index.php', "w");fwrite($myfile, $bodyIndex);fclose($myfile);
      $myfile = fopen($dir.'/base.php', "w");fwrite($myfile, $bodyIndex);fclose($myfile);

      $myfile = fopen($dir.'/projet.cginfo', "w");fclose($myfile);

      //making de folder cgMProjet and
      mkdir($dir.'/cgMProjet', 0777, true);
      $myfile = fopen($dir.'/cgMProjet/index.cgM', "w");fwrite($myfile, $bodyIndex);fclose($myfile);
      $myfile = fopen($dir.'/cgMProjet/style.css', "w");fwrite($myfile, $style);fclose($myfile);
      $myfile = fopen($dir.'/cgMProjet/script.js', "w");fwrite($myfile, $scriptCode);fclose($myfile);
      $myfile = fopen($dir.'/cgMProjet/obligatoryDependence.cgM', "w");fclose($myfile);

      //making the index arquitecture and dependent files
      $myfile = fopen($dir.'/indexArq.php', "w");
      $replace = "\t<link rel='stylesheet' href='cgMProjet/style.css'>\n</head>";
      $indexArq = str_replace('</head>',$replace,$bodyIndex);
      $replace = "\t<script src='cgMProjet/script.js'></script>\n</body>";
      $indexArq = str_replace('</body>',$replace,$indexArq);
      fwrite($myfile, $indexArq);fclose($myfile);

      mkdir($dir.'/src', 0777, true);

      mkdir($dir.'/src/js', 0777, true);
      $myfile = fopen($dir.'/src/js/main.js', "w");fclose($myfile);
      mkdir($dir.'/src/css', 0777, true);
      $myfile = fopen($dir.'/src/css/style.css', "w");fclose($myfile);


      mkdir($dir.'/srcNative', 0777, true);

      mkdir($dir.'/srcNative/js', 0777, true);
      copy("js/cg.class.js", "$dir/srcNative/js/cg.class.js");
      copy("js/jquery-1.12.4.js", "$dir/srcNative/js/jquery-1.12.4.js");
      mkdir($dir.'/srcNative/font', 0777, true);
      xcopy("src/font",$dir.'/srcNative/font');

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

  function listSourcesProjet($projet){
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
    $pageInclude = '
      <?php
         include_once "pages/".pathinfo($_SERVER[PHP_SELF])["basename"];
      ?>
      ';
    $extencion = ['css' => '<link rel="stylesheet" href="{{link}}">','js' => '<script src="{{link}}"></script>'];
    $ruta = ['css' => 'css','js' => 'js'];

    $dir = '../'.$projet.'/cgMProjet/index.cgM';
    $toWriteDoc = htmlspecialchars_decode($toWrite);
    $myfile = fopen($dir, "w");
    fwrite($myfile, $toWriteDoc);fclose($myfile);

    //echo preg_replace("/[\t]*<[a-z ]+src[ ]*=[ ]*'srcNative[a-z\/\-_.0-9]+'[ \/]*>[ \n]*[<>\/a-z]+[ \n]*/i","",$toWriteDoc);
    //print_r($search);

    preg_match_all("/<[ \t\n]*cgObjet[ \t\na-z='\"_\-0-9]*>[ \t\n]*<\/[ \t\n]*cgObjet[ \t\n]*>|<[ \t\n]*cgObjet[ \t\na-z='\"_\-0-9]*\/>/i",$toWriteDoc,$michilala);

    foreach ($michilala[0] as $key => $value) {
      $createVar = "";
      preg_match("/type[ \t\n]*=[ \t\n]*('|\")[a-z_\-]+('|\")/i",$value,$typeOut);

      preg_match("/('|\")[a-z_\-]+('|\")/i",$typeOut[0],$typeOut);
      $createVar .= substr($typeOut[0],1,-1).".";

      preg_match("/name[ \t\n]*=[ \t\n]*('|\")[a-z_\-]+('|\")/i",$value,$typeOut);
      preg_match("/('|\")[a-z_\-]+('|\")/i",$typeOut[0],$typeOut);
      $createVar .= substr($typeOut[0],1,-1);
      echo "\n$createVar\n";
    }

    $newstring = preg_replace_callback('/{{[a-z:. ]+}}/i',
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
       },$toWriteDoc);

    $newstring = str_replace('[[outputPage]]',"<div class=\"n_panel_a\">$pageInclude</div>",$newstring);

    $myfile = fopen("../$projet/base.php", "w");fwrite($myfile, $newstring);fclose($myfile);

    $indexArq = str_replace('</head>',"\t<link rel='stylesheet' href='cgMProjet/style.css'>\n</head>",$newstring);
    $indexArq = str_replace('</body>',"\t<script src='cgMProjet/script.js'></script>\n</body>",$indexArq);
    $myfile = fopen("../$projet/indexArq.php", "w");fwrite($myfile, $indexArq);fclose($myfile);


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
  function listFolderSource($projet){
    $dir = "../$projet/src";
    $dirsFiles = [];//['asd0' => 'das'];
    foreach (scandir($dir) as $key => $value) {
      if ($value != '.' && $value != '..') {
        $dirDir = "$dir/$value";
        $numFiles = scandir($dirDir);
        if (count($numFiles) > 2) {
          // IDEA: aqui un la direccion
          //array_push($dirsFiles,([$value => 'llaa']));
          $dirsFiles[$value] = ['name' => [], 'path' => []];
          foreach ($numFiles as $key2 => $value2) {
            if ($value2 != '.' && $value2 != '..') {
              array_push($dirsFiles[$value]['name'], $value2);
              array_push($dirsFiles[$value]['path'], "$dirDir/$value2");
            }
          }
        }
      }
    }
    return $dirsFiles;
  }
  function saveGatget($gatget, $script, $style, $globalStyle, $source, $isNew){
    $a_return = ["PROCESS" => "FAIL"];
    $dir = "src/gatgets/$gatget";
    $exec = "
    <?php
      echo '<link rel=\"stylesheet\" href=\"../../font/font-awesome/font.css\">'.\"\n\";
      echo '<link rel=\"stylesheet\" href=\"../../font/Ionicons/font.css\">'.\"\n\";
      echo '<script type=\"text/javascript\" src=\"../../../js/jquery-1.12.4.js\"></script>'.\"\n\";
      echo '<script type=\"text/javascript\" src=\"../../../js/cg.class.js\"></script>'.\"\n\";

      $nameExec = ;

      echo '<style media=\"screen\">';
        include_once '../gatgets.php';
      echo '</style>'.\"\n\";
      echo \"<body></body>\";
      echo '<script type=\"text/javascript\">'.\"\n\";
        include_once 'script.js';
      echo \"
        var test = new cg.\".basename(realpath(\".\")).\"();
        test.appendTo($('body'));
      </script>\";
     ?>
      ";


    $myfile = fopen("src/gatgets/style.css", "w");fwrite($myfile, htmlspecialchars_decode($globalStyle));fclose($myfile);
    if ($isNew === "true") {
      if (array_search($gatget,listgatgets())  === false && strlen($gatget) > 0) {
        mkdir($dir, 0777, true);
        $myfile = fopen("$dir/script.js", "w");fclose($myfile);
        $myfile = fopen("$dir/style.css", "w");fwrite($myfile, htmlspecialchars_decode($style));fclose($myfile);
        $myfile = fopen("$dir/source.php", "w");fwrite($myfile, htmlspecialchars_decode($source));fclose($myfile);
        $myfile = fopen("$dir/execGatget.php", "w");fwrite($myfile, $exec);fclose($myfile);

        $a_return["PROCESS"] = "CORRECT";
      }
    }else {
      $myfile = fopen("$dir/script.js", "w");fwrite($myfile, htmlspecialchars_decode($script));fclose($myfile);
      $myfile = fopen("$dir/style.css", "w");fwrite($myfile, htmlspecialchars_decode($style));fclose($myfile);
      $myfile = fopen("$dir/source.php", "w");fwrite($myfile, htmlspecialchars_decode($source));fclose($myfile);
      $a_return["PROCESS"] = "CORRECT";
    }
    return $a_return;
  }
  function listgatgets(){
    $a_return = [];
    foreach (scandir("src/gatgets") as $key => $value) {
      if ($value != '..' && $value != '.' && is_dir("src/gatgets/$value")) {
        array_push($a_return,$value);
      }
    }
    return $a_return;
  }

  // this function is provided by community
  function xcopy($source, $dest){
    if (is_link($source)) {
        return symlink(readlink($source), $dest);
    }
    if (is_file($source)) {
        return copy($source, $dest);
    }
    if (!is_dir($dest)) {
        mkdir($dest, 0777, true);
    }
    $dir = dir($source);
    while (false !== $entry = $dir->read()) {
        if ($entry == '.' || $entry == '..') {
            continue;
        }
        xcopy("$source/$entry", "$dest/$entry");
    }
    $dir->close();
    return true;
  }

  function recursiveDelete($str) {
      if (is_file($str)) {
          return @unlink($str);
      }
      elseif (is_dir($str)) {
          $scan = glob(rtrim($str,'/').'/*');
          foreach($scan as $index=>$path) {
              recursiveDelete($path);
          }
          return @rmdir($str);
      }
  }

  function exportGatget($source,$gatget){
    $dirSrc = "../$source/cgMProjet/src";
    $dir = "$dirSrc/gatgets";
    if (!is_dir($dirSrc)) {mkdir($dirSrc, 0777, true);}
    if (!is_dir($dir)) {mkdir($dir, 0777, true);}

    if (!is_dir("$dir/$gatget")){
      mkdir("$dir/$gatget", 0777, true);
    }
    copy("src/gatgets/$gatget/script.js","$dir/$gatget/script.js");
    copy("src/gatgets/$gatget/style.css","$dir/$gatget/style.css");

    print_r(listGatgetProjets($source));
  }
  function listPagesProjet($projet){
    $listPage = [];
    $dir = ("../$projet/pages");
    foreach (scandir($dir) as $key => $value) {
      if (is_dir("$dir/$values") && $value != "." && $value != ".." && $value != "base.php") {
        array_push($listPage,$value);
      }
    }
    return $listPage;
  }
  function listGatgetProjets($projet){
    $r_array = [];
    $script = "";
    $style = "";

    $dir = "../$projet/cgMProjet/src/gatgets";
    $dirNative = "../$projet/srcNative";
    $dirGD = "../$projet/cgMProjet/src/gatgetDesign";
    if (is_dir($dir)) {
      foreach (scandir($dir) as $key => $value) {
        $dirGG = "$dir/$value";
        if ($value != "." && $value != ".." && is_dir($dirGG)) {
          foreach (scandir($dirGG) as $key2 => $value2) {
            if (is_file("$dirGG/$value2")) {
              $extsn = pathinfo("$dirGG/$value2")['extension'];
              $filename = "$dirGG/$value2";
              $contenido = "";
              if($extsn === "js" || $extsn === "css"){
                $gestor = fopen($filename, "rb");
                $contenido = fread($gestor, filesize($filename));
                fclose($gestor);
              }
              if ($extsn === "js") {
                $script.= "/*file from gatget $value scripts*"."/\n";
                $script .= "$contenido\n";
              }
              if ($extsn === "css") {
                $style.= "/*file from gatget $value styles*"."/\n";
                $style .= "$contenido\n";
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
    $myfile = fopen("$dirNative/css/gatgetStyle.css", "w");fwrite($myfile, $style);fclose($myfile);

    return $r_array;
  }
  function openSource($path){
    $gestor = fopen($path, "rb");
    $contenido = fread($gestor, filesize($path));
    fclose($gestor);
    return $contenido;
  }
  function savePageProjet($projet,$page,$source){
    $dir = "../$projet/pages/$page";
    $myfile = fopen($dir, "w");fwrite($myfile, htmlspecialchars_decode($source));fclose($myfile);
  }
?>
