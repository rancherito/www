
<?php
  session_start();
  include 'php/functions.php';
  include 'php/query_php.php';
  $saa = '';
  if(!empty($_SESSION['user']) && !empty($_SESSION['pass'])){
    if(count($_SESSION['user']) > 0 && count($_SESSION['pass']) > 0){
      $saa = usuarioNombre('name($'.$_SESSION['user'].',$'.$_SESSION['pass'].',$PERS,$GGRL)')['DATA'][0]['nombre_completo'];
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
  <div class="controler control-main page1">
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
  <div class="controler control-main page2">
    <div class="controler control-main_s">
      <div class="controler control-header">
        <div class="controler control-header_s">
          <div class="content-nameUser">
            <div class="user">$saa</div><i class="ion-ios-person-outline"></i>
          </div><i class="ion-power closeSesion iconNav"></i><i class="ion-arrow-left-c iconNav"></i>
        </div>
      </div>
      <div class="controler control-panel">
        <div class="controler control-panel_s">
          <div class="contenTitles">
            <div class="subTitle">ADMINISTRADOR</div>
          </div>
          <div class="contentAccesDirects">
            <div class="contentAccesDirects_s">
              <div class="contentAcces">
                <div class="contentAcces_s"><i class="icon ion-ios-people"></i>
                  <div class="text">
                    <div class="title">PERSONAL</div>
                    <div class="description">En esta seccion podras realizar cambios en el estado de los personales</div>
                  </div>
                </div>
              </div>
              <div class="contentAcces">
                <div class="contentAcces_s"><i class="icon ion-android-bus"></i>
                  <div class="text">
                    <div class="title">BUSES</div>
                    <div class="description">En esta seccion podras realizar cambios en el estado de los buses</div>
                  </div>
                </div>
              </div>
              <div class="contentAcces">
                <div class="contentAcces_s"><i class="icon ion-cube"></i>
                  <div class="text">
                    <div class="title">PERSONAL</div>
                    <div class="description">En esta seccion podras realizar cambios en el estado de los personales</div>
                  </div>
                </div>
              </div>
              <div class="contentAcces">
                <div class="contentAcces_s"><i class="icon ion-cube"></i>
                  <div class="text">
                    <div class="title">PERSONAL</div>
                    <div class="description">En esta seccion podras realizar cambios en el estado de los personales          </div>
                  </div>
                </div>
              </div>
              <div class="contentAcces">
                <div class="contentAcces_s"><i class="icon ion-cube"></i>
                  <div class="text">
                    <div class="title">PERSONAL</div>
                    <div class="description">En esta seccion podras realizar cambios en el estado de los personales</div>
                  </div>
                </div>
              </div>
              <div class="contentAcces">
                <div class="contentAcces_s"><i class="icon ion-cube"></i>
                  <div class="text">
                    <div class="title">PERSONAL</div>
                    <div class="description">En esta seccion podras realizar cambios en el estado de los personales</div>
                  </div>
                </div>
              </div>
              <div class="contentAcces">
                <div class="contentAcces_s"><i class="icon ion-cube"></i>
                  <div class="text">
                    <div class="title">PERSONAL</div>
                    <div class="description">En esta seccion podras realizar cambios en el estado de los personales</div>
                  </div>
                </div>
              </div>
              <div class="contentAcces">
                <div class="contentAcces_s"><i class="icon ion-cube"></i>
                  <div class="text">
                    <div class="title">PERSONAL</div>
                    <div class="description">En esta seccion podras realizar cambios en el estado de los personales             </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
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