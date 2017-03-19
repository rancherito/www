<?php
date_default_timezone_set('America/Lima');
include_once 'php/functions.php';
if (!empty($_POST['fn'])) {
  $n_f = f_parameters($_POST['fn']);
  if ($n_f[0] === 'createProjet') {
    createProjet($n_f[1]);
  }elseif ($n_f[0] === 'listProjets') {
    echo json_encode(list_projets());
  }elseif ($n_f[0] === 'saveProjets') {
    saveProjets($n_f[1],$n_f[2]);
  }elseif ($n_f[0] === 'listSourcesProjet') {
    echo json_encode(listSourcesProjet($n_f[1]));
  }elseif ($n_f[0] === 'getCodeSourceProjet') {
    echo getCodeSourceProjet($n_f[1], $n_f[2]);
  }elseif ($n_f[0] === 'saveSourceProjets') {
    saveSourceProjets($n_f[1], $n_f[2], $n_f[3]);
  }elseif ($n_f[0] === 'lastModified') {
    echo lastModified($n_f[1]);
  }elseif ($n_f[0] === 'listFolderSource') {
    echo json_encode(listFolderSource($n_f[1]));
  }elseif ($n_f[0] === 'saveGatget') {
    echo json_encode(saveGatget($n_f[1], $n_f[2], $n_f[3], $n_f[4], $n_f[5], $n_f[6]));
  }elseif ($n_f[0] === 'listgatgets') {
    echo json_encode(listgatgets());
  }elseif ($n_f[0] === 'exportGatget') {
    exportGatget($n_f[1], $n_f[2]);
  }elseif ($n_f[0] === 'listPagesProjet') {
    echo json_encode(listPagesProjet($n_f[1]));
  }elseif ($n_f[0] === 'openSource') {
    echo openSource($n_f[1]);
  }

}
 ?>
