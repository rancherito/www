
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
  this._listViewCGS = [];
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
        this._listViewCGS.push(_listViewCG);
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
    console.log(procedure);
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
}

var makeUpBlock = function (nameBLock) {
  var nuevoBlock = $('<div></div>').addClass(nameBLock);
  var titulo = $('<span></span>').text('title');
  var _tableCG = new tableCG();
  this._dataViewCG = dataViewCG();
  this.putTabla = $('<table></table>');
  var changeTable = new tableCG();
  var boton = $('<button></button>').text('GUARDAR');
  var mensaje = $('<div></div>');
  var types = [];
  this.cell = [];
  this.cell2 = [];
  this._listViewCGS = [];
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
  .append(this.putTabla)
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
    for (var i = 0; i < newTypesEdit.length; i++) {

      if (newTypesEdit[i]['type'] === 'select') {
        var select = $('<select></select>');
        var _listViewCG = listViewCG();
        this._listViewCGS.push(_listViewCG);
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
                    dataTablas({procedure:call(optionsDB[0],upParam(cells))},this._dataViewCG,this.putTabla,{});
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
    dataTablas({procedure:call(optionsDB[0],optionsDB[1])},this._dataViewCG,this.putTabla,{});


    for (var i = 0; i < newTypes.length; i++) {

      if (newTypes[i]['type'] === 'select') {
        var select = $('<select></select>');
        var _listViewCG = listViewCG();
        this._listViewCGS.push(_listViewCG);
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
                var dataVCG = this._dataViewCG;
                var pTb = this.putTabla;
                this.cell[depen[f]-1].on('change', function(event) {
                  dataListas(upcall(opDB[0],cells),_listViewCG,opList?opList[0]:'SDA',opList?opList[1]:'FSD',select,function () {
                    dataTablas({procedure:call(optionsDB[0],upParam(cells))},dataVCG,pTb,{});
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
      var dataVCG = this._dataViewCG;
      var pTb = this.putTabla;

      for (var f = 0; f < depen.length; f++) {
        this.cell[depenT[f]-1].on('change', function(event) {
          dataTablas({procedure:call(optionsDB[0],upParam(cells))},dataVCG,pTb,{});
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
