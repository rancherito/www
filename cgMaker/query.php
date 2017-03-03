<?php
include_once 'php/functions.php';
if (!empty($_POST['function'])) {
  $n_f = f_parameters($_POST['function']);
  if ($n_f[0] === 'createProjet') {
    createProjet($n_f[1]);
  }
}
 ?>
