<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <script type="text/javascript" src='../js.cg/jquery-3.1.1.js'></script>
    <script type="text/javascript" src='../js.cg/Utilitarios.js'></script>
    <script type="text/javascript" src='../js.cg/class.js'></script>
    <script type="text/javascript" src='js/main.js'></script>
    <style media="screen">
      th,td{
        border: 1px solid blue;
      }
    </style>
    <title></title>
  </head>
  <body>
    <div class="">
      <p>servidor <input type="text" name="" value="localhost" class="serv"></p>
    </div>

    <div class="">
      <p>Puerto <input type="text" name="" value="3306" class="puer"></p>
    </div>

    <div class="">
      <p>Usuario <input type="text" name="" value="root" class="user"></p>
    </div>

    <div class="">
      <p>Contraseña <input type="password" name="" value="12345678" class="pass"></p>
    </div>
    <div class="">
    <button type="button" name="button" class="conec">conectar</button>
    </div>

    <div class="">
      <p>
        SELECCIONA BASE DE DATOS
      </p>
      <select class="slbd" name=""></select>
      <div class="tablaTest">

      </div>
    </div>
    <div class="bdver" style="display:none">
      <p>
        <button type="button" name="button" class="extraer">Extraer Informacion de la base de datos</button>
      </p>
    </div>
    <div class="asdda">

    </div>

    <div class="llllll">
      <button type="button" name="button" class="connLocal" style="display:none">Coneccion local</button>
    </div>

    <div class="escritor">
      <textarea name="name" rows="20" cols="150" class="textarea"></textarea>
      <textarea name="name" rows="20" cols="150" class="textarea2"></textarea>
    </div>

  </body>
</html>
