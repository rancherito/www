<?php
include_once 'php/functions.php';
if (!empty($_POST['function'])) {
  $n_f = f_parameters($_POST['function']);
  if ($n_f[0] === 'createProjet') {
    createProjet($n_f[1]);
  }elseif ($n_f[0] === 'listProjets') {
    $json = json_encode(list_projets());
    echo $json;
  }elseif ($n_f[0] === 'saveProjets') {
    saveProjets($n_f[1],$n_f[2]);
  }
}
 ?>
