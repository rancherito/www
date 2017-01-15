$(document).ready(function() {

  $('.UPDATE-PAGE').click(function(event) {
    window.open('administrador.php', '_self');
  });


  ssppersonalAgregar();
  spersonalEliminarByID();
  busscrear();
  busActualizar();
  crearSucursal();
  actualizarSucursal();
});

function ssppersonalAgregar() {
  var _listViewCG = {lAT:listViewCG(),lET:listViewCG()};
  var _call = call('sareatrabajoListar',[]);
  var _conn = {procedure:_call};
  var _dataViewCG = dataViewCG();

  _call = call('sareatrabajoListar',[]);
  _conn = {procedure:_call};
  $.post('php/query.php',_conn, function(data) {
    var DATA = $.parseJSON(data);
    _listViewCG.lAT
    .setDataQuery(new dataQuery(DATA))
    .setView('nombre')
    .setValue('area_trabajo')
    .setContainer($('.ssppersonalAgregar-3'));

  });

  _call = call('sestadoListar',[]);
  _conn = {procedure:_call};

  $.post('php/query.php',_conn, function(data) {
    var DATA = $.parseJSON(data);
    _listViewCG.lET
    .setDataQuery(new dataQuery(DATA))
    .setView('nombre')
    .setValue('estado')
    .setContainer($('.ssppersonalAgregar-5'));

  });



  var tag = '.ssppersonalAgregar';
  var button =$(tag+'-button');
  var mensaje = $(tag+'-mensaje');
  var tableList = $(tag+'-tableList');

  var parametros = [];
  for (var i = 0; i < 5; i++) {
    parametros.push($(tag+'-'+(i+1)));
  }

  button.click(function(event) {
    var param = []
    for (var i = 0; i < parametros.length; i++) {
      param.push(parametros[i].val());
    }

    _call = call('ssppersonalAgregar',param);
    _conn = {procedure:_call};

    $.post('php/query.php',_conn, function(data) {
      var DATA = $.parseJSON(data);
      if (dataE(DATA)) {
        mensaje.text('('+DATA.PROCESO+')')
      }else {
        mensaje.text('No se guardo la informacion ('+DATA.PROCESO+')')
      }

    });
  });

}


function spersonalEliminarByID() {
  var _listViewCG = {lAT:listViewCG(),lET:listViewCG(),lpdni:listViewCG(),lNET:listViewCG(),lNAT:listViewCG()};
  var _dataViewCG = dataViewCG();
  var _call;
  var _conn;

  var tag = '.spersonalEliminarByID';
  var button = $(tag+'-button');
  var mensaje = $(tag+'-mensaje');
  var tableList = $(tag+'-tableList');

  var parametros = {area_trabajo:$(tag+'-1'),estado:$(tag+'-2'),dni:$(tag+'-3')};
  var nParametros = {area_trabajo:$(tag+'-E1'),estado:$(tag+'-E2'),dni:$(tag+'-changeIn')};


  _conn = {procedure:_call = call('sareatrabajoListar',[])};
  dataListas(_conn,_listViewCG.lAT,'area_trabajo','nombre',parametros.area_trabajo,function () {
    _conn = {procedure:_call = call('spersonalListarByID',upParam(parametros))};
    dataTablas(_conn,_dataViewCG,tableList,{});
    dataListas(_conn,_listViewCG.lpdni,'dni','dni',parametros.dni);
  });


  _conn = {procedure:_call = call('spersonalListarByID',upParam(parametros))};
  dataListas(_conn,_listViewCG.lpdni,'dni','dni',parametros.dni,function () {
    _conn = {procedure:_call = call('spersonalListarByID',upParam(parametros))};
    dataTablas(_conn,_dataViewCG,tableList);
  });


  _conn = {procedure:_call = call('sestadoListar',[])};
  dataListas(_conn,_listViewCG.lET,'estado','nombre',parametros.estado,function () {
    _conn = {procedure:_call = call('spersonalListarByID',upParam(parametros))};
    dataTablas(_conn,_dataViewCG,tableList,{});
    dataListas(_conn,_listViewCG.lpdni,'dni','dni',parametros.dni);
  });

  _conn = {procedure:_call = call('sestadoListar',[])};
  dataListas(_conn,_listViewCG.lNET,'estado','nombre',nParametros.estado);

  _conn = {procedure:_call = call('sareatrabajoListar',[])};
  dataListas(_conn,_listViewCG.lNAT,'area_trabajo','nombre',nParametros.area_trabajo);

  button.click(function () {
    _conn = {procedure:call('spersonalActualizarByID',upParam(nParametros))};
    $.post('php/query.php',_conn,function (data) {
      var DATA = $.parseJSON(data);
      if (dataE(DATA)) {
        mensaje.text('('+DATA.PROCESO+')')
      }else {
        mensaje.text('No se guardo la informacion ('+DATA.PROCESO+')')
      }
    });
  });

}

function busscrear() {
  var _listViewCG = {lAT:listViewCG(),lET:listViewCG()};
  var _dataViewCG = dataViewCG();
  var _call;
  var _conn;

  var tag = '.busscrear';
  var button = $(tag+'-button');
  var mensaje = $(tag+'-mensaje');
  var tableList = $(tag+'-tableList');

  var parametros = {tipo:$(tag+'-1'),capacidad_1:$(tag+'-2'),capacidad_2:$(tag+'-3'),placa:$(tag+'-4'),estado:$(tag+'-5')};
  //var nParametros = {area_trabajo:$(tag+'-E1'),estado:$(tag+'-E2'),dni:$(tag+'-changeIn')};
  f_sestadoListar(_listViewCG.lET,parametros.estado);
  button.click(function () {
    _conn = {procedure:call('busscrear',upParam(parametros))};
    $.post('php/query.php',_conn,function (data) {
      var DATA = $.parseJSON(data);
      if (dataE(DATA)) {
        mensaje.text('('+DATA.PROCESO+')')
      }else {
        mensaje.text('No se guardo la informacion ('+DATA.PROCESO+')')
      }
    });
  });
}



function busActualizar() {
  var _listViewCG = {ltipo:listViewCG(),lestado:listViewCG(),lplaca:listViewCG(),lNestado:listViewCG()};
  var _dataViewCG = dataViewCG();
  var _call;
  var _conn;

  var tag = '.busActualizar';
  var button = $(tag+'-button');
  var mensaje = $(tag+'-mensaje');
  var tableList = $(tag+'-tableList');

  var parametros = {tipo:$(tag+'-1'),estado:$(tag+'-2'),placa:$(tag+'-3')};
  var nParametros = {estado:$(tag+'-E1'),placa:$(tag+'-changeIn')};



  parametros.tipo.change(function(event) {
    dataListas(upcall('sbusesListarByID',parametros),_listViewCG.lplaca,'placa','placa',parametros.placa,function () {
      dataTablas(upcall('sbusesListarByID',parametros),_dataViewCG,tableList,{});
    });
  });

  f_sestadoListar(_listViewCG.lestado,parametros.estado,function () {
    dataListas(upcall('sbusesListarByID',parametros),_listViewCG.lplaca,'placa','placa',parametros.placa,function () {
      dataTablas(upcall('sbusesListarByID',parametros),_dataViewCG,tableList,{});
    });
  });

  parametros.placa.change(function(event) {
    dataTablas(upcall('sbusesListarByID',parametros),_dataViewCG,tableList,{});
  });


  f_sestadoListar(_listViewCG.lNestado,nParametros.estado);

  button.click(function(event) {
    $.post('php/query.php',upcall('sbusesActualizarByID',nParametros),function (data) {
      var DATA = $.parseJSON(data);
      if (dataE(DATA)) {
        mensaje.text('('+DATA.PROCESO+')')
      }else {
        mensaje.text('No se guardo la informacion ('+DATA.PROCESO+')')
      }
    });
  });

}

function crearSucursal() {
  var _makeAddBlock = new makeAddBlock();
  _makeAddBlock.setHeadTable(['SUCURSAL','UBICACION','NOMBRE','GERENTE','ESTADO']);
  _makeAddBlock.setType([
    {type:'in'},
    {type:'in'},
    {type:'in'},
    {type:'select',optionsDB:['spersonalListarByID',['ADM','%','%']],opList:['dni','nombre_completo']},
    {type:'select',optionsDB:['sestadoListar',[]],opList:['estado','nombre']}
  ]);
  _makeAddBlock.save('sucursalAgregar');
  _makeAddBlock.setTitulo('AGREGAR SUCURSALES');

  $('.crearSucursal').append(_makeAddBlock.getContainer());

}

function actualizarSucursal() {
  var _makeUpBlock = new makeUpBlock();
  _makeUpBlock.setTitulo('ACTUALIZAR SUCURSALES');
  _makeUpBlock.setTextChange('Ingrese codigo de la SUCURSAL que cambiar');
  _makeUpBlock.setHeadTable(['ESTADO','SUCURSAL'],['NUEVO GERENTE','NUEVO ESTADO']);
  _makeUpBlock.personalTable({optionsDB:['sucursalListarByID',['%','%']],dependeces:[1,2]});
  _makeUpBlock.setTypeEdit([
    {type:'select',options:[optionCG('null','NINGUNO')],optionsDB:['spersonalListarByID',['ADM','%','%']],opList:['dni','nombre_completo']},
    {type:'select',options:[optionCG('null','NINGUNO')],optionsDB:['sestadoListar',[]],opList:['estado','nombre']}
  ]);
  _makeUpBlock.setType([
    {type:'select',options:[optionCG('%','TODOS')],optionsDB:['sestadoListar',[]],opList:['estado','nombre']},
    {type:'select',options:[optionCG('%','TODOS')],optionsDB:['sucursalListarByID',['%','%']],opList:['sucursal','nombre'],dependeces:[1]}
  ]);
  $('.actualizarSucursal').append(_makeUpBlock.getContainer());
  _makeUpBlock.save('sucursalActualizarByID');
}















var tableCG = function () {
  var container = $('<table></table>');
  var header = $('<tr></tr>');
  var thHeader = [];
  var filas = [];
  var table = [];
  container.append(header);
  this.setTable= function (newHead,newfilas) {

    header.empty();
    thHeader = [];
    for (var i = 0; i < filas.length; i++) {
      filas[i].remove();
    }
    filas = [];
    table = [];

    for (var i = 0; i < newHead.length; i++) {
      thHeader.push($('<th></th>').text(newHead[i]));
      header.append(thHeader[i]);
    }

    for (var i = 0; i < newfilas; i++) {
      filas.push($('<tr></tr>'));
      table.push([]);
      for (var e = 0; e < thHeader.length; e++) {
        table[i].push($('<td></td>'));
        filas[i].append(table[i][e]);
      }

      container.append(filas[i]);
    }

  }

  this.getContainer = function (){
    return container;
  }

  this.getTable = function () {
    return table;
  }
}

var makeAddBlock = function(nameBLock) {
  var nuevoBlock = $('<div></div>').addClass(nameBLock);
  var titulo = $('<span></span>').text('title');
  var _tableCG = new tableCG();
  var boton = $('<button></button>').text('GUARDAR');
  var mensaje = $('<div></div>');
  var types = [];
  this.cell = [];
  var _listViewCGS = [];
  nuevoBlock
  .append(titulo)
  .append($('<br>'))
  .append($('<br>'))
  .append(_tableCG.getContainer())
  .append(boton)
  .append(mensaje)
  ;


  this.setTitulo = function (newTitulo) {
    titulo.text(newTitulo);
  }
  this.setHeadTable = function (newHeadTable) {
    _tableCG.setTable(newHeadTable,1);
  }

  this.setType = function (newTypes) {
    for (var i = 0; i < newTypes.length; i++) {

      if (newTypes[i]['type'] === 'select') {
        var select = $('<select></select>');
        var _listViewCG = listViewCG();
        _listViewCGS.push(_listViewCG);
        this.cell.push(select);

        if (newTypes[i]['options']) {
          for (var e = 0; e < newTypes[i]['options'].length; e++) {
            var O = newTypes[i]['options'][e].clone();
            select.append(O);
          }
        }

        if (newTypes[i]['optionsDB']) {
          var opDB = newTypes[i]['optionsDB'];
          var opList = newTypes[i]['opList'];
            dataListas({procedure:call(opDB[0],opDB[1])},_listViewCG,opList?opList[0]:'SDA',opList?opList[1]:'FSD',select);
            if(newTypes[i]['dependeces']){
              var depen = newTypes[i]['dependeces'];
              var cells = this.cell;
              for (var f = 0; f < depen.length; f++) {
                this.cell[depen[f]-1].on('change', function(event) {
                  dataListas(upcall(opDB[0],cells),_listViewCG,opList?opList[0]:'SDA',opList?opList[1]:'FSD',select);
                });
              }
            }

        }

      }else {
        this.cell.push($('<input></input>').attr('type', 'text'));

      }
      _tableCG.getTable()[0][i].append(this.cell[i]);

    }
  }

  this.getContainer = function () {
    return nuevoBlock;
  }

  this.save = function (procedure) {
    var ta = this.cell;
    boton.click(function(event) {
      _conn = {procedure:call(procedure,upParam(ta))};
      $.post('php/query.php',_conn,function (data) {
        var DATA = $.parseJSON(data);
        if (dataE(DATA)) {
          mensaje.text('('+DATA.PROCESO+')')
        }else {
          mensaje.text('No se guardo la informacion ('+DATA.PROCESO+')')
        }
      });
    });
  }


}

var makeUpBlock = function (nameBLock) {
  var nuevoBlock = $('<div></div>').addClass(nameBLock);
  var titulo = $('<span></span>').text('title');
  var _tableCG = new tableCG();
  var _dataViewCG = dataViewCG();
  var putTabla = $('<table></table>');
  var changeTable = new tableCG();
  var boton = $('<button></button>').text('GUARDAR');
  var mensaje = $('<div></div>');
  var types = [];
  this.cell = [];
  this.cell2 = [];
  var _listViewCGS = [];
  var _Types;
  var _personalTable;


  var textChange = $('<label></label>').text('some text');
  var inChange = $('<input></input>').attr('type', 'text');
  nuevoBlock
  .append(titulo)
  .append($('<br>'))
  .append($('<br>'))
  .append(_tableCG.getContainer())
  .append($('<br>'))
  .append(putTabla)
  .append($('<br>'))
  .append(textChange)
  .append(inChange)
  .append($('<br>'))
  .append(changeTable.getContainer())
  .append($('<br>'))
  .append(boton)
  .append(mensaje)
  ;

  this.setTitulo = function (newTitulo) {
    titulo.text(newTitulo);
  }
  this.setHeadTable = function (newHeadTable,_newHeadTable) {
    _tableCG.setTable(newHeadTable,1);
    changeTable.setTable(_newHeadTable,1);
  }
  this.setTypeEdit = function (newTypesEdit) {
    console.log(newTypesEdit);

    for (var i = 0; i < newTypesEdit.length; i++) {

      if (newTypesEdit[i]['type'] === 'select') {
        var select = $('<select></select>');
        var _listViewCG = listViewCG();
        _listViewCGS.push(_listViewCG);
        this.cell2.push(select);

        if (newTypesEdit[i]['options']) {
          for (var e = 0; e < newTypesEdit[i]['options'].length; e++) {
            var O = newTypesEdit[i]['options'][e].clone();
            select.append(O);
          }
        }

        if (newTypesEdit[i]['optionsDB']) {
          var opDB = newTypesEdit[i]['optionsDB'];
          var opList = newTypesEdit[i]['opList'];
            dataListas({procedure:call(opDB[0],opDB[1])},_listViewCG,opList?opList[0]:'SDA',opList?opList[1]:'FSD',select);
            if(newTypesEdit[i]['dependeces']){
              var depen = newTypes[i]['dependeces'];
              var cells = this.cell2;
              for (var f = 0; f < depen.length; f++) {
                this.cell2[depen[f]-1].on('change', function(event) {
                  dataListas(upcall(opDB[0],cells),_listViewCG,opList?opList[0]:'SDA',opList?opList[1]:'FSD',select,function () {
                    dataTablas({procedure:call(optionsDB[0],upParam(cells))},_dataViewCG,putTabla,{});
                  });

                });
              }
            }
        }

      }else {

        this.cell.push($('<input></input>').attr('type', 'text'));

      }
      changeTable.getTable()[0][i].append(this.cell2[i]);

    }
  }
  this.setType = function (newTypes) {
    _Types = newTypes;

    var _conn = _personalTable;
    var optionsDB = _conn['optionsDB'];
    dataTablas({procedure:call(optionsDB[0],optionsDB[1])},_dataViewCG,putTabla,{});


    for (var i = 0; i < newTypes.length; i++) {

      if (newTypes[i]['type'] === 'select') {
        var select = $('<select></select>');
        var _listViewCG = listViewCG();
        _listViewCGS.push(_listViewCG);
        this.cell.push(select);

        if (newTypes[i]['options']) {
          for (var e = 0; e < newTypes[i]['options'].length; e++) {
            var O = newTypes[i]['options'][e].clone();
            select.append(O);
          }
        }

        if (newTypes[i]['optionsDB']) {
          var opDB = newTypes[i]['optionsDB'];
          var opList = newTypes[i]['opList'];
            dataListas({procedure:call(opDB[0],opDB[1])},_listViewCG,opList?opList[0]:'SDA',opList?opList[1]:'FSD',select);
            if(newTypes[i]['dependeces']){
              var depen = newTypes[i]['dependeces'];
              var cells = this.cell;
              for (var f = 0; f < depen.length; f++) {
                this.cell[depen[f]-1].on('change', function(event) {
                  dataListas(upcall(opDB[0],cells),_listViewCG,opList?opList[0]:'SDA',opList?opList[1]:'FSD',select,function () {
                    dataTablas({procedure:call(optionsDB[0],upParam(cells))},_dataViewCG,putTabla,{});
                  });

                });
              }
            }
        }

      }else {

        this.cell.push($('<input></input>').attr('type', 'text'));

      }
      _tableCG.getTable()[0][i].append(this.cell[i]);

    }

    if(_conn['dependeces']){
      var depenT = _conn['dependeces'];
      var cells = this.cell;
      for (var f = 0; f < depen.length; f++) {
        this.cell[depenT[f]-1].on('change', function(event) {
          dataTablas({procedure:call(optionsDB[0],upParam(cells))},_dataViewCG,putTabla,{});
        });
      }
    }
  }

  this.personalTable = function (newPersonalTable) {
    _personalTable = newPersonalTable
  }
  this.setTextChange = function (newText) {
    textChange.text(newText);
  }

  this.save = function (procedure) {
    var ta = this.cell2;
    ta.push(inChange);
    boton.click(function(event) {
      _conn = {procedure:call(procedure,upParam(ta))};
      console.log(_conn);
      $.post('php/query.php',_conn,function (data) {
        var DATA = $.parseJSON(data);
        if (dataE(DATA)) {
          mensaje.text('('+DATA.PROCESO+')')
        }else {
          mensaje.text('No se guardo la informacion ('+DATA.PROCESO+')')
        }
      });
    });
  }


  this.getContainer = function () {
    return nuevoBlock;
  }
}

function upcall(consulta,parametros) {
  return {procedure:call(consulta,upParam(parametros))};
}

function f_sestadoListar(_listViewCG,container,f){
  var _conn = {procedure:call('sestadoListar',[])};
  dataListas(_conn,_listViewCG,'estado','nombre',container,function () {
    if (f) {
      f();
    }
  });
}

function upParam(parametros){
  var _param = []; for (var variable in parametros) {_param.push(parametros[variable].val());};
  return _param;
}

function dataListas(_conn,_listViewCG,val,view,container,funEnd) {
  $.post('php/query.php',_conn, function(data) {
    var DATA = $.parseJSON(data);

    _listViewCG
    .setDataQuery(new dataQuery(DATA))
    .setView(view)
    .setValue(val)
    .setContainer(container);

    if (funEnd) {
      funEnd(data);
    }
  });
  container.change(function(event) {
    if (funEnd) {
      funEnd();
    }
  });

}

function dataTablas(_conn,_dataViewCG,container,personal,funEnd) {
  $.post('php/query.php',_conn, function(data) {
    var DATA = $.parseJSON(data);
    _dataViewCG.setDataQuery(new dataQuery(DATA));
    _dataViewCG.setPersonal(personal);
    container.append(_dataViewCG.getContainer());
    if (funEnd) {
      funEnd();
    }

  });
}

function dependenceList(array_dependencias,_conn,_listViewCG,value,view,container,funEnd){
  for (var i = 0; i < array_dependencias.length; i++) {

  }
}
