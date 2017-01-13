var inputsCG = function () {
  var container = $('<div></div>').addClass('inputsCG');

  var inputText = $('<input></input>')
  .attr('type', 'text')
  .attr('placeholder', 'Ingrese Texto')
  .css({width:'100%',height:'100%','box-sizing': 'border-box'});

  var label = $('<label></label>')
  .html('texto auto generado')
  .css({width:'100%',height:'100%',display:'none','box-sizing': 'border-box'});

  var selectBox = $('<select></select>')
  .css({width:'100%',height:'100%',display:'none','box-sizing': 'border-box'});

  var inputDate = $('<input></input>')
  .attr('type', 'date').css({width:'100%',height:'100%',display:'none','box-sizing': 'border-box'});

  var inputPass = $('<input></input>')
  .attr('type', 'password').css({width:'100%',height:'100%',display:'none','box-sizing': 'border-box'});

  container
  .append(inputText)
  .append(selectBox)
  .append(inputDate)
  .append(inputPass)
  .append(label);

  var typeInput = 'inputText';

  this.setInput = function(tipo) {
    this.disable();
    typeInput = tipo;
    this.getInput().css('display', 'initial');
  }
  this.setPlaceholder = function(newPlaceholder) {
    this.getInput().attr('placeholder', newPlaceholder);
  }
  this.setValue = function(newValue) {
    if (typeInput==='inputText') {
      return inputText.val(newValue);
    }
    else if (typeInput==='label') {
      return label.text(newValue);
    }
    else if (typeInput==='selectBox') {
      return selectBox.val(newValue);
    }
    else if (typeInput==='inputDate') {
      return inputDate.val(newValue);

    }
    else if (typeInput==='inputPass') {
      return inputPass.val(newValue);
    }
    else {
      return inputText.val(newValue);
    }
  }
  this.getValue = function() {

    if (typeInput==='inputText') {
      return inputText.val();
    }
    else if (typeInput==='label') {
      return label.text();
    }
    else if (typeInput==='selectBox') {
      return selectBox.val();
    }
    else if (typeInput==='inputDate') {
      return inputDate.val();

    }
    else if (typeInput==='inputPass') {
      return inputPass.val();
    }
    else {
      return inputText.val();
    }

  }
  this.getContainer = function() {
    return container;
  }
  this.getInput = function() {
    if (typeInput==='inputText') {
      return inputText;
    }
    else if (typeInput==='label') {
      return label;
    }
    else if (typeInput==='selectBox') {
      return selectBox;
    }
    else if (typeInput==='inputDate') {
      return inputDate;

    }
    else if (typeInput==='inputPass') {
      return inputPass;
    }
    else {
      return inputText;
    }
  }
  this.hide = function() {
    container.hide();
  }
  this.show = function() {
    container.show();
  }
  this.void = function() {
    return !(this.getValue().length > 0);
  }
  this.addClass = function (newClass) {
    container.addClass(newClass);
  }

  this.disable = function() {
    this.getInput().css('display', 'none');
  }


}
var inputLegendCG = function () {
  //vars privates
  var container = $('<div></div>').addClass('inputLegendCG');
  var _container = $('<div></div>').addClass('_CG');
  var _leyenda = $('<div></div>');
  var icon = $('<i></i>').addClass('ion-android-checkbox-outline-blank');
  var leyenda = $('<span></span>').text('LEGENDA');

  // vars publics
  this.inputs = new inputsCG();

  //construct

  _leyenda
  .append(icon)
  .append(leyenda);

  _container
  .append(_leyenda)
  .append(this.inputs.getContainer());
  container
  .append(_container);

  //functions publics
  this.getContainer = function() {
    return container;
  }
  this.addClass = function (newClass) {
    container.addClass(newClass);
  }
  this.getlegenda = function () {
    return _leyenda;
  }
  this.setLeyenda = function (newText) {
    leyenda.text(newText);
  }
  this.setIcon = function (newIcon) {
    icon.attr('class', newIcon);
  }
}
var buttonCG = function () {
  var container = $('<div></div>').addClass('buttonCG');
  var _container = $('<div></div>');
  var leyenda = $('<span></span>').text('LEYENDA');
  var icon = $('<i></i>').addClass('ion-android-checkbox-outline-blank');
  _container
  .append(icon)
  .append(leyenda);

  container.append(_container);

  this.getContainer = function () {
    return container;
  }
  this.addClass = function (newClass) {
    container.addClass(newClass);
  }

  this.setLeyenda = function (newText) {
    leyenda.text(newText);
  }

  this.setIcon = function (newIcon) {
    icon.attr('class', newIcon);
  }
}
var notifyCG = function () {
  var container = $('<div></div>').addClass('notifyCG');
  var _subC = $('<div></div>');
  var _icon = $('<div></div>');
  var _notify = $('<div></div>');


  var text = $('<div></div>').text('Este es un texto de alerta');
  var leyenda = $('<div></div>').text('Alerta!');
  var icon = $('<i></i>').attr('class','ion-alert-circled');

  var textAlerta = 'Este es un texto de alerta';


  container
  .append(_subC);

  _subC
  .append(_icon)
  .append(_notify);

  _icon.append(icon);
  _notify.append(leyenda).append(text);

  this.getContainer = function() {
    return container;
  }

  this.setTextAlerta = function (newText) {
    textAlerta = newText;
    text.text(textAlerta);
  }
  this.addClass = function (newClass) {
    container.addClass(newClass);
  }
}
var boxShowCG = function () {
  var container = $('<div></div>').addClass('boxShowCG').css({width:'0',overflow:'hidden'});

  this.show = function () {
    container.css('width','0').animate({opacity:1,width: '100%'}, 100);
  }
  this.hide = function () {
    container.animate({opacity: '0'}, 500);
  }
  this.getContainer = function () {
    return container;
  }

  this.append = function (newJObj) {
    container.append(newJObj);
  }


}




function skinNotify(jclass) {
  jclass.addClass('skinNotify');
}

//
function skinInputLeyenda(jclass) {
  jclass.addClass('skinInputLeyenda');
  jclass.inputs.getInput()
  .focus(function(event) {
    jclass.getlegenda().addClass('skinInputLeyendaTop');
  })
  .focusout(function(event) {
    if (jclass.inputs.void()) {
      jclass.getlegenda().removeClass('skinInputLeyendaTop');
    }
  });
}

function skinButton(jclass) {
  jclass.addClass('skinButton');
}














var dataQuery = function (DATA) {
  var data = DATA;
  var proceso = data.PROCESO==='EXITOSO';
  this.getHeaders = function () {
    if (proceso) {
      return data.HEAD;
    }
    return {};
  }

  this.getTable = function () {

    if (proceso) {

      var sub = {};
      var run = 0;
      if (data.DATA.length > 0) {
        for (var variable in data.DATA) {
          if (run===0) {
            for (var _var in data.DATA[variable]) {
              sub[_var] = [];
            }
          }
          for (var _var in data.DATA[variable]) {
            sub[_var] = sub[_var].concat([data.DATA[variable][_var]]);
          }
          run++;
        }
      }else {
        for (var i = 0; i < data.HEAD.length; i++) {
          sub[data.HEAD[i]] = [];
        }
      }

      return sub;
    }
    return {};
  }
}
var processData = function () {
  this.dataQuery;
  this.indexInTable
  this.error = function () {
    if (this.dataQuery == null) {
      throw new Error('No se instancio la clase: dataQuery');
    }
  }
  this.setDataQuery = function(newDataQuery) {
    this.dataQuery = newDataQuery;
    this.indexInTable = JsonIndex(this.dataQuery.getTable());


    return this;
  }
}

//processData.prototype = Object.create(processData.prototype);
//processData.prototype.constructor = li;

var listView = function () {
  processData.call(this);
  var view = 0;
  var value = 0;
  var list = [];
  var selected = '';


  this.setView = function (newView) {
    view = newView;
    this.error();
    var indexOf = this.dataQuery.getHeaders().indexOf(view);

    if (indexOf!=-1) {
      view = indexOf;

    }else {
      view = 0;
    }

    for (var e = 0; e < list.length; e++) {
      list[e].html(this.indexInTable[view][e]);
    }

    return this;
  }

  this.setSelected = function (newSelected) {
    selected = newSelected;
    return this
  }

  this.setValue = function (newValue) {
    value = newValue;
    this.error();

    var indexOf = this.dataQuery.getHeaders().indexOf(value);
    if (indexOf!=-1) {
      value = indexOf;
    }else {
      value = 0;
    }

    for (var e = 0; e < list.length; e++) {
      list[e].html(this.indexInTable[value][e]);
    }

    return this;
  }

  this.setContainer = function (newContainer) {

    this.error();
    for (var i = 0; i < list.length; i++) {
      list[i].remove();
    }
    list = [];

    if (this.dataQuery.getHeaders().length > 0) {
      for (var e = 0; e < this.indexInTable[value].length; e++) {
        list.push($('<option></option>'));
        list[e].val(this.indexInTable[value][e]);
        if (list[e].val()===selected) {
          list[e].attr('selected', selected);
        }
      }

      for (var e = 0; e < this.indexInTable[view].length; e++) {
        list[e].text(this.indexInTable[view][e]);

      }
    }

    for (var i = 0; i < list.length; i++) {
      newContainer.append(list[i]);
    }
    return this;
  }


}
var listViewCG = function(newDataQuery) {
  if (newDataQuery) {
    return new listView().setDataQuery(newDataQuery);
  }
  return new listView();
}
var dataView = function () {
  processData.call(this);
  var container = $('<table></table>');
  var header = $('<tr></tr>');
  var thHeader = [];
  var filas = [];
  var table = [];
  var personal = {};

  this.setPersonal = function (newPersonal) {
    personal = newPersonal;
  }
  this.makeHeaders = function () {
    for (var i = 0; i < thHeader.length; i++) {
      thHeader[i].remove();
    }
    thHeader = [];

    for (var i = 0; i < this.dataQuery.getHeaders().length; i++) {
      thHeader.push($('<th></th>').text(this.dataQuery.getHeaders()[i]));

      header.append(thHeader[i]);
    }

    container.append(header);

  }


  function addSelect(_conn,select,selected) {
    $.post('php/query.php',_conn, function(data) {
      var DATA = $.parseJSON(data);
      var lisst = listViewCG();
      lisst.setDataQuery(new dataQuery(DATA)).setSelected(selected).setContainer(select);
    });
  }

  this.makeTables = function () {
    for (var i = 0; i < filas.length; i++) {filas[i].remove();}
    filas = [];
    table = [];


    for (var i = 0; i < this.indexInTable.length; i++) {
      for (var e = 0; e < this.indexInTable[i].length; e++) {

        if (i===0) {
          filas.push($('<tr></tr>'));
          table.push([]);
          container.append(filas[e]);
        }

        var aadd;

        var est = false;

        for (var variable in personal) {
          if (i===this.dataQuery.getHeaders().indexOf(variable)) {

              if (personal[variable]['type']==='select') {
                est=true;
                aadd = $('<select></select>').val(this.indexInTable[i][e]);

                if (personal[variable]['dbconnect']) {
                  addSelect(personal[variable]['dbconnect'],aadd,this.indexInTable[i][e]);
                  aadd.val(this.indexInTable[i][e]);
                }else {
                  aadd.append(optionCG(this.indexInTable[i][e],this.indexInTable[i][e]))
                }

              }
              else {
                aadd = $('<label></label>').text(this.indexInTable[i][e]);
              }
              //dbconnect

          }
        }
        if (!est) {
          aadd = $('<label></label>').text(this.indexInTable[i][e]);
        }


        table[e].push($('<td></td>').append(aadd));

        filas[e].append(table[e][i]);
      }
    }


  }
  this.getContainer = function () {
    this.makeHeaders();
    this.makeTables();
    return container;
  }
}
var dataViewCG = function(newDataQuery) {
  if (newDataQuery) {
    return new dataView().setDataQuery(newDataQuery);
  }
  return new dataView();
}
