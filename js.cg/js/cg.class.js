var tool = {};
tool.$ = function (selector) {
  if (selector) return $('<'+selector+'></'+selector+'>');
  return $('<div></div>');
}
tool.centerSelector = function (selector) {
  var w = selector.outerWidth();
  var h = selector.outerHeight();
  selector.css({'margin-top':'-'+(h/2)+'px','margin-left':'-'+(w/2)+'px'});
  selector.resize(function () {
    w = selector.outerWidth();
    h = selector.outerHeight();
    selector.css({'margin-top':'-'+(h/2)+'px','margin-left':'-'+(w/2)+'px'});
  });
}

var cg = {};
cg.error = {
  selector:'cg.error: Selector no exist',
  typeOf:'cg.error: typeof incorrect'
};
cg.ERROR_SELECTOR = 'cg.error: Selector no exist';
cg.ERROR_TYPE_ICORRECT = 'cg.error: typeof incorrect';
cg.$ = function (selector) {
  if (selector) return $('<'+selector+'></'+selector+'>');
  return $('<div></div>');
}
cg.centerSelector = function (selector) {
  var w = selector.outerWidth();
  var h = selector.outerHeight();
  selector.css({'margin-top':'-'+(h/2)+'px','margin-left':'-'+(w/2)+'px'});
  selector.resize(function () {
    w = selector.outerWidth();
    h = selector.outerHeight();
    selector.css({'margin-top':'-'+(h/2)+'px','margin-left':'-'+(w/2)+'px'});
  });
}
cg.MessageBox = function (setTypeBox) {
  var container = tool.$('div');
  var btnAceptar = tool.$('button');
  var btnCerrar = tool.$('button');
  var pnlBotones = tool.$('div');
  var _container = tool.$('div');
  var container_ = tool.$('div');
  var contentMessage = tool.$('div');


  this.constructor = function () {
    var THIS = this;

    btnAceptar
    .css({height:'30px',width:'100px',float:'right'})
    .hide()
    .click(function(event) {THIS.close()})
    .text('Aceptar');

    btnCerrar
    .css({height:'30px',width:'100px',float:'right'})
    .text('Cerrar')
    .click(function(event) {THIS.close()});


    pnlBotones
    .css({width:'100%',height:'30px',padding:'15px 0 0'})
    .append(btnCerrar)
    .append(btnAceptar);

    container
    .css({background:'white',position:'absolute',left:'50%',top:'50%'})
    .css({width:'320px','box-sizing':'border-box',padding:'15px'})
    .append(contentMessage)
    .append(pnlBotones);


    tool.centerSelector(container);
    _container
    .css({background:'rgba(0,0,0,0.5)',position:'fixed',top:0,left:0,width:'100%',height:'100%','z-index':9999})
    .append(container);

    if (setTypeBox) {
      this.typeBox(setTypeBox);
    }
  }


  this.typeBox = function (editarTipo) {
    if (editarTipo === 'COMMON') {
      btnAceptar.hide();
    }
    else if (editarTipo === 'CONFIRMATION') {
      btnAceptar.show();
    }
    return this;
  }


  this.container = function (getcontainer) {
    if (getcontainer) {
      getcontainer(container);
      return this;
    }else {
      return container
    }
  }

  this.appendTo = function (selector) {
    if (selector) {
      container.appendTo(selector);
    }else {
      console.log(cg.ERROR_SELECTOR);
    }

    return this;
  }

  this.show = function () {
    _container.appendTo('body');
    return this;
  }
  this.close = function () {
    (_container).detach();
    return this;
  }

  this.messageView = function (newcontentMessage) {
    if (typeof newcontentMessage === 'string') {
      newcontentMessage = newcontentMessage.replace(/\n/g,'<br>');
    }
    contentMessage.append(newcontentMessage);
    return this;
  }
  this.accept = function (callback) {
    btnAceptar.click(function(event) {
      if (callback) {
        callback();
      }
    });
    return this;
  }

  this.constructor();

}
cg.DataTable = function(){
  var data = {};
  this.addColumn= function(nameColumn){
    data[nameColumn] = null;
    return this;
  }
  this.source = function(newData){
    if (typeof newData === 'object') {
      data = newData;
      return this;
    }else
      console.log(cg.error.typeOf);
    return data;
  }
  this.status = function(bool){
    var countData = 0;
    for (var variable in data) { countData++; if(countData > 0)break;}

    if (typeof boolean === 'string'){
      if(bool === 'bool') return countData > 0;
    }

    return countData === 0 ? 'NO_DATA':'CORRECT';
  }
}
cg.dataTable = function(){return new cg.DataTable()}
cg.messageBox = function (param) { return new cg.MessageBox(param)}