
<?php 
  session_start();
  $_SESSION['user'] = 'admin';
  $_SESSION['pass'] = '123';
 
?>
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
              <div class="content_box-log"><?php include 'widget/login.administrator.php';?></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>