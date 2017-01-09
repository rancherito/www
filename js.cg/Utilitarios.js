function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) === ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) === 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function getGET(){
    var loc = document.location.href;
    if(loc.indexOf('?')>0)
    {
        var getString = loc.split('?')[1];
        var GET = getString.split('&');
        var get = {};
        for(var i = 0, l = GET.length; i < l; i++){
            var tmp = GET[i].split('=');
            get[tmp[0]] = unescape(decodeURI(tmp[1]));
        }
        return get;
    }
}

var $selector = function(selector){

	this.$sD = function  (sel,indice) {
		if (sel&&indice) {
			return new $selector(selector+' > '+sel+':nth-of-type('+indice+')');
		}else if(sel){
			return new $selector(selector+' > '+sel);
		}
		return new $selector(selector);

	}
	this.$s = function  (sel,indice) {
		if (sel&&indice) {
			return new $selector(selector+' '+sel+':nth-of-type('+indice+')');
		}else if(sel){
			return new $selector(selector+' '+sel);
		}
		return new $selector(selector);

	}

  this.$i = function  (indice) {

    if (indice) {
			return new $selector(selector+':nth-of-type('+indice+')');
		}
		return new $selector(selector);
	}


  this.$o = function (nose) {
    nose(selector);
  }


	this.end = $(selector);
	this.toString = selector;
  this.$t = selector;
	this.$ = $(selector);
};

var $s = function(sel,indice){
	if (sel&&indice) {
		return new $selector(sel+':nth-of-type('+indice+')');
	}else if(sel){
		return new $selector(sel);
	}
	return new $selector('body');
}

function $disable (selector) {
	$(selector).attr('disabled','disabled');
}
function $enable (selector) {
	$(selector).removeAttr('disabled');
}

function GToR(radian) {
  return (Math.PI/180)*radian;
}

var inputFormOS = function () {
  var contenedor =
  $('<div></div>')
  .addClass('inputFormOS');

  var descripcion = $('<span>Texto generado</span>');
  var alerta = $('<span>incompleto</span>').css('color', 'red');

  var leyenda = $('<div></div>').append(descripcion).append(alerta);



  var textBox =
  $('<input></input>')
  .attr('type', 'text')
  .attr('placeholder', 'yourText');

  var selectBox =
  $('<select></select>')
  .css('display', 'none');

  var inputDate =
  $('<input></input>')
  .attr('type', 'date')
  .css('display', 'none');

  var Tipo = 'inputText';
  var SelectUpdate = function(){};

  contenedor
  .append(leyenda)
  .append(textBox)
  .append(selectBox)
  .append(inputDate);

  this.selectUpdate = function (up) {
    SelectUpdate = up;

  }

  this.tipoInput = function (tipo) {
    Tipo = tipo;
    if (tipo==='select') {
      textBox.css('display', 'none');
      selectBox.css('display', 'block');
      inputDate.css('display', 'none');
    }else if (tipo==='inputText') {
      textBox.css('display', 'block');
      selectBox.css('display', 'none');
      inputDate.css('display', 'none');
    }
    else if (tipo==='inputDate') {
      textBox.css('display', 'none');
      selectBox.css('display', 'none');
      inputDate.css('display', 'block');
    }
  }

  this.setPlaceholder = function (placeholder) {
    textBox.attr('placeholder',placeholder);
  }
  this.setLeyenda = function (LeyendaText) {
    descripcion.text(LeyendaText);
  }
  this.inputAddClass = function (nuevaClase) {
    contenedor.addClass(nuevaClase);
  }



  this.selectAddOptionDB = function (url,prodec,opciones,endProcess) {

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        $.post(url, {procedure:prodec}, function(data) {
          try {
            selectBox.html('').append(dataList(opciones,JSON.parse(data)));
            SelectUpdate();
            if(endProcess){
              endProcess();
            }
          } catch (e) {
            selectBox.html('').append('<option value="-2">No se obtubo datos de la BD</option>');
            console.log(data);
          }
        });
      }
      else{
        selectBox.html('').append('<option value="-1">No se establesio Coneccion con BD</option>');
      }
    };
    xhttp.open("POST",url, true);
    xhttp.send();

  }
  this.getSelect = function(){
    return selectBox;
  }
  this.getValue = function () {
    if (Tipo==='select') {
      return selectBox.val();
    }else if (Tipo==='inputText') {
      return textBox.val();
    }
    else if (Tipo==='inputDate') {
      return inputDate.val();
    }
  }

  this.setValue = function (val) {
    if (Tipo==='select') {
      return selectBox.val(val);
    }else if (Tipo==='inputText') {
      return textBox.val(val);
    }
    else if (Tipo==='inputDate') {
      return inputDate.val(val);
    }
  }

  this.getInput = function () {
    if (Tipo==='select') {
      return selectBox;
    }else if (Tipo==='inputText') {
      return textBox;
    }
    else if (Tipo==='inputDate') {
      return inputDate;
    }
  }

  this.selectAddOption = function (option) {
    selectBox.append(option);
  }

  this.getInputForm = function () {
    return contenedor;
  }

}

function dataList(rest,oJsonData) {
  var List = '';
  var nombre = oJsonData[rest['nombre']];
  var valor = oJsonData[rest['valor']];

  for (var i = 0; i < valor.length; i++) {
    List+='<option value="'+valor[i]+'">'+nombre[i]+'</option>';
  }

  return $(List);
}

function dataTable(nuevosNombres,ocultos,oJsonData) {
  var table = '';

  table+='<tr>';
  for (var variable in oJsonData) {

    if (ocultos.indexOf(variable)===-1) {

      if (existObjtJson(variable,nuevosNombres)) {
        table+='<th>'+nuevosNombres[variable]+'</th>';
      }else {
        table+='<th>'+variable+'</th>';
      }

    }
  }
  table+='</tr>';

  var temp = [];
  var init = 0;
  for (var variable in oJsonData) {
      init2=0;
        if (ocultos.indexOf(variable)===-1) {
          for (var i = 0; i < oJsonData[variable].length; i++) {
            if (init===0) {temp.push('');}
            temp[i]+='<td>'+oJsonData[variable][i]+'</td>';

          }
        }

    init++;
  }


  for (var i = 0; i < temp.length; i++) {
    table+='<tr>'+temp[i]+'<tr>';
  }


  return table;
}

function existObjtJson(element,objtJson) {
  for (var variable in objtJson) {
    if (variable===element) {
      return true;
    }
  }
  return false;
}


function jsonIndex(p_json) {
  var indice = 0;
  var newJson = p_json;
  for (var variable in p_json) {
    newJson[indice] = p_json[variable];
    indice++;
  }
  return newJson;
}

var dtTable = function () {
  var table = {};
  var hTable = {};
  var InputsCG = [];
  var component = $('<table></table>');
  var trHead = $('<tr></tr>');
  var trRows = [];
  var tdColumn = [];
  component.append(trHead);
  var columnas = 0,filas = 0;
  this.addcolumna = function (p_head) {
    table[p_head] = [];
    InputsCG.push([]);
    tdColumn.push([]);

    trHead.append('<th>'+p_head+'</th>');
    columnas++;

  }
  this.addFilas = function () {

    var ii = 0;

    trRows.push($('<tr></tr>'));
    component.append(trRows[filas]);
    for (var variable in table) {

      table[variable].push('');
      InputsCG[ii].push(new inputsCG());
      tdColumn[ii].push($('<td></td>').append(InputsCG[ii][filas].getContainer()));
      trRows[filas].append(tdColumn[ii][filas]);
      ii++;
    }
    filas++;
  }


  this.getContainer = function () {
    return component;
  }
  this.getInputs = function () {
    return InputsCG;
  }


}

function parametros(proce){
  var valor = '(';
  for (var i=0; i < proce.length; i++)valor+=(i!=0?",":"")+"$"+proce[i];
  valor+=')';
  return valor;
}

function call(procedure,proce){
  var valor = '(';
  for (var i=0; i < proce.length; i++)valor+=(i!=0?",":"")+"$"+proce[i];
  valor+=')';
  return procedure+valor;
}

function dataE(DATA){
  return DATA['PROCESO']==='EXITOSO';
}

function dataR(DATA){
  return DATA['DATA'][0]['resultado'];
}

function JsonIndex(newJson) {
  return Object.keys(newJson).map(function(k) { return newJson[k] });
}

function indexJson(newJson) {
  var array = [];
  for (var variable in newJson) {
    array.push(variable);
  }
  return array;
}
