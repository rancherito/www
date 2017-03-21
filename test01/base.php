<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>my projet</title>
	<script src='srcNative/js/jquery-1.12.4.js'></script>
	<script src='srcNative/js/cg.class.js'></script>
  <script src='srcNative/js/gatgetScript.js'></script>
  
  <link rel="stylesheet" href="srcNative/font/font-awesome/font.css">
  <link rel="stylesheet" href="srcNative/font/Ionicons/font.css">
  <link rel="stylesheet" href="srcNative/css/gatgetStyle.css">
	<link rel="stylesheet" href="src/css/style.css">
</head>
<body>
	<div class="panel_p">
		<div class="n_panel_p n_header"></div>
		<div class="panel_s n_body">
      <div class="n_panel_a">
      <?php
         include_once "pages/".pathinfo($_SERVER[PHP_SELF])["basename"];
      ?>
      </div>
			<div class="n_panel_p">
        <cgObjet type="infoBlock" name="inscripcion"></cgObjet>
				<cgObjet type='infoBlock' name='evaluaciones'></cgObjet>
				<cgObjet type='infoBlock' name='contacto'></cgObjet>
        <cgObjet type='boxIcon' name='iconos'></cgObjet>
			</div>
		</div>
		<div class="n_panel_p n_footer"></div>
	</div>
  <script type="text/javascript">
    $(document).ready(function() {
      cg.readyObj();
      initGatgetComponets();
    });
  </script>
  <script src="src/js/main.js"></script>
</body>
</html>
