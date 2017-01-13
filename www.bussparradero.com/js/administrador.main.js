$(document).ready(function() {

  $('.UPDATE-PAGE').click(function(event) {
    window.open('administrador.php', '_self');
  });


  ssppersonalAgregar();
  spersonalEliminarByID();
  busscrear();
  busActualizar();
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
    //console.log(call('spersonalActualizarByID',upParam(nParametros)));
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
    _conn = {procedure:call('sbusesActualizarByID',upParam(nParametros))};
    $.post('php/query.php',upcall(sbusesActualizarByID,nParametros),function (data) {
      var DATA = $.parseJSON(data);
      if (dataE(DATA)) {
        mensaje.text('('+DATA.PROCESO+')')
      }else {
        mensaje.text('No se guardo la informacion ('+DATA.PROCESO+')')
      }
    });
  });

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
