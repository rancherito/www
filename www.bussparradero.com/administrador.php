<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <script type="text/javascript" src='../js.cg/jquery-3.1.1.js'></script>
    <script type="text/javascript" src='../js.cg/Utilitarios.js'></script>
    <script type="text/javascript" src='../js.cg/class.js'></script>
    <script type="text/javascript" src='js/administrador.main.js'></script>
    <style media="screen">
      th,td{
        border: 1px solid blue;
      }
    </style>
    <title></title>
  </head>
  <body>

    <p>
      <span>ACTUALIZAR TODO</span><button type="button" name="button" class="UPDATE-PAGE">Actualizar</button>
    </p>

    <p class="ssppersonalAgregar">
      <span>Agregar Personal</span>
      <table>
        <tr>
          <td>NOMBRES</td>
          <td>APELLIDOS</td>
          <td>AREA DE TRABAJO</td>
          <td>DNI</td>
          <td>ESTADO</td>
        </tr>
        <tr>
          <td><input type="text" name="" value="" class="ssppersonalAgregar-1"></td>
          <td><input type="text" name="" value="" class="ssppersonalAgregar-2"></td>
          <td><select class="ssppersonalAgregar-3" name=""></select></td>
          <td><input type="number" name="" maxlength="12" value="" class="ssppersonalAgregar-4"></td>
          <td><select class="ssppersonalAgregar-5" name=""></td>
        </tr>
      </table>
      <button type="button" class="ssppersonalAgregar-button">Enviar</button>
      <div class="ssppersonalAgregar-mensaje"></div>


      <br><br><br>
      <p class="spersonalEliminarByID">
        <span>Cambiar estado del personal</span>
        <table>
          <tr>
            <td>AREA DE TRABAJO</td>
            <td>ESTADO</td>
            <td>DNI</td>
          </tr>
          <tr>
            <td><select class="spersonalEliminarByID-1" name=""><option value="%">Todos</option></select></td>
            <td><select class="spersonalEliminarByID-2" name=""><option value="%">Todos</option></select></td>
            <td><select class="spersonalEliminarByID-3" name=""><option value="%">Todos</option></select></td>
          </tr>
        </table>
        <div class="spersonalEliminarByID-tableList">

        </div>

        <button type="button" class="spersonalEliminarByID-button">CAMBIAR ESTADO</button>
        <div class="spersonalEliminarByID-mensaje"></div>


    </p>

  </body>
</html>
