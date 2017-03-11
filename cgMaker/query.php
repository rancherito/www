<?php
date_default_timezone_set('America/Lima');
include_once 'php/functions.php';
if (!empty($_POST['fn'])) {
  $n_f = f_parameters($_POST['fn']);
  if ($n_f[0] === 'createProjet') {
    createProjet($n_f[1]);
  }elseif ($n_f[0] === 'listProjets') {
    $json = json_encode(list_projets());
    echo $json;
  }elseif ($n_f[0] === 'saveProjets') {
    saveProjets($n_f[1],$n_f[2]);
  }elseif ($n_f[0] === 'sourcesProjet') {
    echo json_encode(sourcesProjet($n_f[1]));
  }elseif ($n_f[0] === 'getCodeSourceProjet') {
    echo getCodeSourceProjet($n_f[1], $n_f[2]);
  }elseif ($n_f[0] === 'saveSourceProjets') {
    saveSourceProjets($n_f[1], $n_f[2], $n_f[3]);
  }elseif ($n_f[0] === 'lastModified') {
    echo lastModified($n_f[1]);
  }elseif ($n_f[0] === 'listFolderSource') {
    echo json_encode(listFolderSource($n_f[1]));
  }
}
 ?>
