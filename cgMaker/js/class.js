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
  this.vacio = function() {
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
    container.animate({opacity:1,width: '100%'}, 100);
  }
  this.hide = function () {
    container.animate({opacity: '0'}, 500,function(){
      container.css('width','0');
    });
  }
  this.getContainer = function () {
    return container;
  }

  this.append = function (newJObj) {
    container.append(newJObj);
  }
  this.addClass = function(newClass){
    container.addClass(newClass);
  }

}

function skinNotify(jclass) {
  jclass.addClass('skinNotify');
}
function skinInputLeyenda(jclass) {
  jclass.addClass('skinInputLeyenda');
  jclass.inputs.getInput()
  .focus(function(event) {
    jclass.getlegenda().addClass('skinInputLeyendaTop');
  })
  .focusout(function(event) {
    if (jclass.inputs.vacio()) {
      jclass.getlegenda().removeClass('skinInputLeyendaTop');
    }
  });
}
function skinButton(jclass) {
  jclass.addClass('skinButton');
}
function skinInputLeyenda_theme01(jclass){
  jclass.addClass('inputLeyenda-theme01');
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

  this.endDataQuery = function() {}
  this.setDataQuery = function(newDataQuery) {
    this.dataQuery = newDataQuery;
    this.indexInTable = JsonIndex(this.dataQuery.getTable());

    this.endDataQuery();

    return this;
  }
}
var listView = function () {
  processData.call(this);
  var view = 0;
  var value = 0;
  var list = [];
  var selected = '';
  var exist = [];

  this.setView = function (newView) {
    view = newView;
    this.error();
    var indexOf = this.dataQuery.getHeaders().indexOf(view);

    if (indexOf!=-1) {
      view = indexOf;

    }else {
      view = 0;
    }
    exist = [];
    for (var e = 0; e < list.length; e++) {
      list[e].text(this.indexInTable[view][e]);
      var op = list[e].val()+'-'+list[e].text();
      if (exist.indexOf(op)===-1) {
        exist.push(op);
        list[e].css('display', 'block');
      }else {
        list[e].css('display', 'none');
      }
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


    exist = [];
    for (var e = 0; e < list.length; e++) {
      list[e].val(this.indexInTable[value][e]);
      var op = list[e].val()+'-'+list[e].text();
      if (exist.indexOf(op)===-1) {
        exist.push(op);
        list[e].css('display', 'block');
      }else {
        list[e].css('display', 'none');
      }
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
      exist = [];
      for (var e = 0; e < this.indexInTable[value].length; e++) {
        list.push($('<option></option>'));
        list[e].val(this.indexInTable[value][e]);
        list[e].text(this.indexInTable[view][e]);
        if (list[e].val()===selected) {
          list[e].attr('selected', selected);
        }

        var op = list[e].val()+'-'+list[e].text();
        if (exist.indexOf(op)===-1) {
          exist.push(op);
          list[e].css('display', 'block');
        }else {
          list[e].css('display', 'none');
        }

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
  var headerText = []
  var thHeader = [];
  var filas = [];
  var table = [];
  var hideColum = [];

  this.appendTo = function(dom) {
    container.appendTo(dom);
    return this;
  }

  this.Import = function(dom){
    dom.replaceWith(container);
    return this;
  };

  this.hideColums = function (newHideColum) {
    hideColum = newHideColum;

    for (var i = 0; i < hideColum.length; i++) {
      if (headerText.indexOf(hideColum[i])!=-1) {
        thHeader[headerText.indexOf(hideColum[i])].css('display', 'none');
      }
    }
    for (var i = 0; i < table.length; i++) {
        for (var e = 0; e < hideColum.length; e++) {
          if (headerText.indexOf(hideColum[e])!=-1) {
            table[i][headerText.indexOf(hideColum[e])].css('display', 'none');

          }
        }
    }

    return this;
  }

  this.makeHeaders = function () {
    for (var i = 0; i < thHeader.length; i++) {
      thHeader[i].remove();
    }
    thHeader = [];
    headerText = [];
    for (var i = 0; i < this.dataQuery.getHeaders().length; i++) {
      thHeader.push($('<th></th>').text(this.dataQuery.getHeaders()[i]));
      headerText.push(this.dataQuery.getHeaders()[i]);
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

        table[e].push($('<td></td>').text(this.indexInTable[i][e]));

        filas[e].append(table[e][i]);
      }
    }

    for (var i = 0; i < hideColum.length; i++) {
      if (headerText.indexOf(hideColum[i])!=-1) {
        thHeader[headerText.indexOf(hideColum[i])].css('display', 'none');
      }
    }
    for (var i = 0; i < table.length; i++) {
        for (var e = 0; e < hideColum.length; e++) {
          if (headerText.indexOf(hideColum[e])!=-1) {
            table[i][headerText.indexOf(hideColum[e])].css('display', 'none');

          }
        }
    }


  }
  this.proceed = function () {
    this.makeHeaders();
    this.makeTables();
    return this;
  }
  this.getCells= function (row,column) {
    if (typeof(column)==='string') {
      column = this.dataQuery.getHeaders().indexOf(column);
    }
    return table[row][column].text();
  }
  this.getContainer = function () {
    return container;
  }
}
var dataViewCG = function(newDataQuery) {
  if (newDataQuery) {
    return new dataView().setDataQuery(newDataQuery);
  }
  return new dataView();
}
var tableMake = function () {
  var container = $('<table></table>');
  var header = $('<tr></tr>');
  var thHeader = [];
  var filas = [];
  var table = [];
  container.append(header);
  this.addClass = function(newClass){
    container.addClass(newClass);
    return this;
  }

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

    return this;

  }

  this.addHead = function(head){
    thHeader.push($('<th></th>').text(head));
    header.append(thHeader[thHeader.length-1]);
    for (var i = 0; i < filas.length; i++) {
      table[i].push($('<td></td>'));
      filas[i].append(table[i][table[i].length-1]);
    }
    return this;
  }

  this.addRow = function(){

      filas.push($('<tr></tr>'));
      table.push([]);
      for (var e = 0; e < thHeader.length; e++) {
        table[table.length-1].push($('<td></td>'));
        filas[filas.length-1].append(table[table.length-1][e]);
      }

      container.append(filas[filas.length-1]);

    return this;
  }

  this.getContainer = function (){
    return container;
  }

  this.getTable = function () {
    return table;
  }

  this.setCells = function(column,row,newValue){
    table[column][row].append(newValue);
    return this;
  }

  this.getCells = function (column,row) {
    return table[column][row];
  }

  this.appendTo = function(dom) {
    container.appendTo(dom);
    return this;
  }

  this.Import = function(dom){
    var importReplace = $('cgimt.'+dom);
    importReplace.after(container);
    importReplace.remove();

    return this;
  };
}
function tableCG() {
  return new tableMake();
}
