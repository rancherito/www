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
  actualizarDestinos();
  crearDestinos();
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
  _makeAddBlock.setTitulo('AGREGAR SUCURSALES');
  _makeAddBlock.save('sucursalAgregar');

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


function actualizarDestinos() {
  var _makeUpBlock = new makeUpBlock();
  _makeUpBlock.setTitulo('ACTUALIZAR DESTINOS');
  _makeUpBlock.setTextChange('Ingrese codigo del DESTINO que desea cambiar');
  _makeUpBlock.setHeadTable(['CONDUCTOR','ESTADO','PLACA EL BUSS','COD. DESTINO'],['NUEVO CONDUCTOR','NUEVO ESTADO']);
  _makeUpBlock.personalTable({optionsDB:['destinosbusesListarByID',['%','%','%','%']]});
  _makeUpBlock.setTypeEdit([
    {type:'select',options:[optionCG('null','NINGUNO')]},
    {type:'select',options:[optionCG('null','NINGUNO')]}
  ]);
  _makeUpBlock.setType([
    {type:'select',options:[optionCG('%','TODOS')]},
    {type:'select',options:[optionCG('%','TODOS')]},
    {type:'select',options:[optionCG('%','TODOS')]},
    {type:'select',options:[optionCG('%','TODOS')]}
  ]);
  $('.actualizarDestinos').append(_makeUpBlock.getContainer());

  ;

  dataListas(upcall('destinosbusesListarByID',_makeUpBlock.cell),_makeUpBlock._listViewCGS[0],'personal_conductor','personal_conductor',_makeUpBlock.cell[0],function () {
    dataListas(upcall('destinosbusesListarByID',_makeUpBlock.cell),_makeUpBlock._listViewCGS[1],'estado','estado',_makeUpBlock.cell[1],function () {
      dataListas(upcall('destinosbusesListarByID',_makeUpBlock.cell),_makeUpBlock._listViewCGS[2],'placa_bus','placa_bus',_makeUpBlock.cell[2],function () {
        dataListas(upcall('destinosbusesListarByID',_makeUpBlock.cell),_makeUpBlock._listViewCGS[3],'cod_destino','cod_destino',_makeUpBlock.cell[3],function () {
          dataTablas(upcall('destinosbusesListarByID',_makeUpBlock.cell),_makeUpBlock._dataViewCG,_makeUpBlock.putTabla,{});
        });
      });
    });
  });

  dataListas({procedure:call('sestadoListarByID',['%','GRAL'])},_makeUpBlock._listViewCGS[5],'estado','nombre',_makeUpBlock.cell2[1]);
  dataListas({procedure:call('spersonalListarByID',['CON', '%', '%'])},_makeUpBlock._listViewCGS[4],'dni','nombre_completo',_makeUpBlock.cell2[0]);

  _makeUpBlock.save('destinosbusesActualizarByID');
}

function crearDestinos() {
  var _makeAddBlock = new makeAddBlock();
  _makeAddBlock.setHeadTable(['PLACA DEL BUS','SUCURSAL DE ORIGEN','SUCURSAL DE DESTINO','CONDUCTOR','ESTADO']);
  _makeAddBlock.setType([
    {type:'select'},
    {type:'select'},
    {type:'select'},
    {type:'select'},
    {type:'select'}
  ]);
  _makeAddBlock.setTitulo('AGREGAR DESTINOS');

  dataListas({procedure:call('sbusesListar',[])},_makeAddBlock._listViewCGS[0],'placa','placa',_makeAddBlock.cell[0]);
  dataListas({procedure:call('sucursalListar',[])},_makeAddBlock._listViewCGS[1],'sucursal','nombre',_makeAddBlock.cell[1]);
  dataListas({procedure:call('sucursalListar',[])},_makeAddBlock._listViewCGS[2],'sucursal','nombre',_makeAddBlock.cell[2]);
  dataListas({procedure:call('spersonalListarByID',['CON', '%', '%'])},_makeAddBlock._listViewCGS[3],'placa','nombre_completo',_makeAddBlock.cell[3]);
  dataListas({procedure:call('sestadoListarByID',['%','GRAL'])},_makeAddBlock._listViewCGS[4],'estado','nombre',_makeAddBlock.cell[4]);

  _makeAddBlock.save('sucursalAgregar');

  $('.crearDestinos').append(_makeAddBlock.getContainer());
}
