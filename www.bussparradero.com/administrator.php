
<?php
  session_start();
  include 'php/functions.php';
  include 'php/query_php.php';
  $saa = '';
  if(!empty($_SESSION['user']) && !empty($_SESSION['pass'])){
    if(count($_SESSION['user']) > 0 && count($_SESSION['pass']) > 0){
      $saa = usuarioNombre('user($'.$_SESSION['user'].',$'.$_SESSION['pass'].',$PERS,$GGRL)')['DATA'][0]['nombre_completo'];
    }
  }
  $content = matrix('widget/login.administrator.php');
  $head = <<<EOT
 <!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <title>ADMINISTRATOR SITE</title>
  <script type="text/javascript" src="../js.cg/jquery-3.1.1.js"></script>
  <script type="text/javascript" src="../js.cg/Utilitarios.js"></script>
  <script type="text/javascript" src="../js.cg/class.js"></script>
  <script type="text/javascript" src="js/administrator.main.js"></script>
  <link href="Ionicons/css/ionicons.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="css/style.css" type="text/css">
  <link rel="stylesheet" href="css/styleInputs-theme01.css" type="text/css">
  <link rel="stylesheet" href="css/styles-theme01.css" type="text/css">
  <link rel="stylesheet" href="css/style.administrator.css" type="text/css">
</head> 
EOT;
  $page = <<<EOT
 
<body>
  <div class="controler control-main">
    <div class="controler control-main_s">
      <div class="controler control-panel">
        <div class="controler control-panel_s">
          <div class="controler control-panel">
            <div class="controler control-panel_s">
              <div class="bienvenida">
                <div class="_bienvenida">
                  <div class="title">BIENVENIDO AL SISTEMA ADMINISTRATIVO</div>
                  <div class="title2">EL BUSS PARRANDERO</div>
                  <div class="leyenda">Inicie secion para poder realizar actualizaciones cambios y demas</div>
                </div>
              </div>
            </div>
          </div>
          <div class="controler control-panel">
            <div class="controler control-panel_s">
              <div class="content_box-log">$content</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body> 
EOT;
 
$logPage = <<<EOT
 
<body>
  <div class="controler control-main">
    <div class="controler control-main_s">
      <div class="controler control-panel">
        <div class="controler control-panel_s">
          <button class="closeSesion">MY BUTTON</button>
          <div>$saa</div>
        </div>
      </div>
    </div>
  </div>
</body> 
EOT;
 
if(!empty($_SESSION['user']) && !empty($_SESSION['pass'])){
  if(count($_SESSION['user']) > 0 && count($_SESSION['pass']) > 0){
    echo $head;
    echo $logPage;
  }
  else{
    echo $head;
    echo $page;
  }
}
else{
  echo $head;
  echo $page;
}
?>