<?php
$style = <<<EOT
  <style>
    *{
      color: transparent;
    }
    div.n_panel_p{
      border: 1px gray solid;
      box-sizing: border-box;
    }
  </style>
</head>
EOT;
  $projet = $_GET['projet'];
  if (!empty($projet)) {
    $dir = '../../'.$projet.'/index.php';
    $read = fopen($dir, "r");
    $contenido = fread($read, filesize($dir));
    fclose($read);
    echo str_replace('</head>',$style,$contenido);
  }else {
    echo "no hay gets";
  }

 ?>
