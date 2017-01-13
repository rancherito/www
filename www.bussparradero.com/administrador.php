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
  </p>

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
      <br>
      <div class="">
        <label for="">Ingrese DNI del personal que desea cambiar</label><input type="text" name="" value="" class="spersonalEliminarByID-changeIn">
      </div>

      <div class="">
        <table>
          <tr>
            <th>Nuevo Area de Trabajo</th>
            <th>Nuevo Estado</th>
          </tr>
          <tr>
            <td><select class="spersonalEliminarByID-E1" name=""><option value="null">Ninguno</option></select></td>
            <td><select class="spersonalEliminarByID-E2" name=""><option value="null">Ninguno</option></select></td>
          </tr>
        </table>
      </div>
      <br>
      <button type="button" class="spersonalEliminarByID-button">CAMBIAR</button>
      <div class="spersonalEliminarByID-mensaje"></div>
    </p>

    <br><br><br>
    <p class="busscrear">
      <span>Agregar Bus</span>
      <table>
        <tr>
          <td>TIPO</td>
          <td>AFORO PRIMER PISO</td>
          <td>AFORO SEGUNDO PISO</td>
          <td>PLACA</td>
          <td>ESTADO</td>
        </tr>
        <tr>
          <td><select class="busscrear-1" name=""><option value="1">1 PISO</option><option value="2">2 PISOS</option></select></td>
          <td><input type="number" name="" value="" class="busscrear-2"></td>
          <td><input type="number" name="" value="" class="busscrear-3"></select></td>
          <td><input type="text" name="" maxlength="9" value="" class="busscrear-4"></td>
          <td><select class="busscrear-5" name=""></td>
          </tr>
      </table>
        <button type="button" class="busscrear-button">Guardar</button>
        <div class="busscrear-mensaje"></div>
    </p>

    <br><br><br>
    <p class="busActualizar">
      <span>Cambiar estado del personal</span>
      <table>
        <tr>
          <td>TIPO BUS</td>
          <td>ESTADO</td>
          <td>PLACA</td>
        </tr>
        <tr>
          <td><select class="busActualizar-1" name="">
            <option value="%">Todos</option>
            <option value="1">1 PISO</option>
            <option value="2">2 PISOS</option>
          </select></td>
          <td><select class="busActualizar-2" name=""><option value="%">Todos</option></select></td>
          <td><select class="busActualizar-3" name=""><option value="%">Todos</option></select></td>
        </tr>
      </table>
      <div class="busActualizar-tableList">

      </div>
      <br>
      <div class="">
        <label for="">Ingrese la PLACA del buss que desea cambiar</label><input type="text" name="" value="" class="busActualizar-changeIn">
      </div>

      <div class="">
        <table>
          <tr>
            <th>Nuevo Estado</th>
          </tr>
          <tr>
            <td><select class="busActualizar-E1" name=""><option value="null">Ninguno</option></select></td>
          </tr>
        </table>
      </div>
      <br>
      <button type="button" class="busActualizar-button">CAMBIAR</button>
      <div class="busActualizar-mensaje"></div>
  </body>
  </html>
