
var cg = {};
//utils
cg.error = {
  selector: 'cg.error: Selector no exist',
  typeOf: 'cg.error: typeof incorrect',
  argument: 'cg.error: arguments invalid'
};
cg.$ = function (selector) {
  if (selector) return $('<' + selector + '></' + selector + '>');
  return $('<div></div>');
};
cg.centerSelector = function (selector) {
  var w = selector.outerWidth();
  var h = selector.outerHeight();
  selector.css({'margin-top': ('-' + (h / 2) + 'px'), 'margin-left': ('-' + (w / 2) + 'px')
  });
  selector.resize(function () {
    w = selector.outerWidth();
    h = selector.outerHeight();
    selector.css({'margin-top': '-' + (h / 2) + 'px', 'margin-left': '-' + (w / 2) + 'px'});
  });
};
cg.fn = function (name,values) {
  var parameters = '(';
  if (values instanceof Array) for (var i=0; i < values.length; i++) parameters+=(i!=0?",":"")+"$"+values[i];
  return name+parameters+')';
}
cg.getFileExtension = function (filename) {
  return filename.slice((filename.lastIndexOf(".") - 1 >>> 0) + 2);
}
//class
cg.myDom = function () {
  this.container = cg.$('div');
  var style = 'myDom';
  this.style = function (newStyle) {
    if (typeof newStyle !== "undefined") {
      this.container.removeClass(style);
      style = newStyle;
      this.container.addClass(style);
      return this;
    }
    return style;
  }
  this.addClass = function (newClass) {
    this.container.addClass(newClass);
    return this;
  }
  this.dom = function (getcontainer) {
    if ( typeof getcontainer === 'function') {
      getcontainer(this.container);
      return this;
    }
    return this.container;
  };
  this.appendTo = function (setAppend) {
    if (setAppend.length > 0) {
      this.container.appendTo(setAppend);
    }
    return this;
  };
  this.prependTo = function (setPrepend) {
    if (setPrepend.length > 0) {
      this.container.prependTo(setPrepend);
    }
    return this;
  };
}
cg.MessageBox = function (setTypeBox) {
  var container = cg.$('div');
  var btnAceptar = cg.$('button');
  var btnCerrar = cg.$('button');
  var pnlBotones = cg.$('div');
  var _container = cg.$('div');
  var contentMessage = cg.$('div');

  this.constructor = function () {
    var THIS = this;

    btnAceptar
    .css({height: '30px', width: '100px', float: 'right'})
    .hide()
    .click(function (event) { THIS.close(); })
    .text('Aceptar');

    btnCerrar
    .css({height: '30px', width: '100px', float: 'right'})
    .text('Cerrar')
    .click(function (event) { THIS.close(); });

    pnlBotones
    .css({width: '100%', height: '30px', padding: '15px 0 0'})
    .append(btnCerrar)
    .append(btnAceptar);

    container
    .css({background: 'white', position: 'absolute', left: '50%', top: '50%'})
    .css({width: '320px', 'box-sizing': 'border-box', padding: '15px'})
    .append(contentMessage)
    .append(pnlBotones);

    cg.centerSelector(container);
    _container
    .css({background: 'rgba(0, 0, 0, 0.5)', position: 'fixed', top: 0, left: 0, width: '100%', height: '100%', 'z-index': 9999})
    .append(container);

    if (setTypeBox) {
      this.typeBox(setTypeBox);
    }
  };
  this.typeBox = function (editarTipo) {
    switch (editarTipo) {
      case 'COMMON':
        btnAceptar.hide();
        btnCerrar.show();
        break;
      case 'CONFIRMATION':
        btnAceptar.show();
        btnCerrar.show();
        break;
      case 'ONLY_CONFIRMATION':
        btnAceptar.show();
        btnCerrar.hide();
        break;
      case 'NO_BUTTONS':
        pnlBotones.hide();
        break;
    }
    return this;
  };
  this.dom = function (getcontainer) {
    if ( typeof getcontainer === 'function') {
      getcontainer(container);
      return this;
    }
    return container;

  };
  this.appendTo = function (selector) {
    if (selector) {
      container.appendTo(selector);
    } else {
      console.log(cg.error.selector);
    }
    return this;
  };
  this.show = function () {
    _container.css('opacity', '0').appendTo('body').animate({'opacity': 1}, 250);
    return this;
  };
  this.close = function (setTime) {
    var time = typeof setTime === 'number' ? setTime : 250;

    _container.animate({'opacity': 0}, time, function () {
      _container.detach();
    });
    return this;
  };
  this.messageSee = function (newcontentMessage) {
    if (typeof newcontentMessage === 'string') {
      newcontentMessage = newcontentMessage.replace(/\n/g, '<br>');
    }
    contentMessage.append(newcontentMessage);
    return this;
  };
  this.accept = function (callback) {
    btnAceptar.click(function (event) {
      if (callback) {
        callback();
      }
    });
    return this;
  };
  this.constructor();
};
cg.DataTable = function (setSource) {
  var data = {};
  var rowsData = 0;
  this.addColumn = function (nameColumn) {
    data[nameColumn] = null;
    return this;
  };

  this.source = function (newData) {
    var maxDimension = 0;
    if (typeof newData === 'object') {
      for (var column in newData) {
        var size = newData[column].length;
        maxDimension = maxDimension < size ? size : maxDimension;
      }
      rowsData = maxDimension;
      for (var variable in newData) {
        for (var i = newData[variable].length; i < maxDimension; i++) {
          newData[variable].push(null);
        }
      }

      data = newData;
      return this;
    } else if (typeof newData !== 'undefined') { console.log(cg.error.typeOf); }
    return data;
  };
  this.isEmpty = function (bool) {
    var empty = $.isEmptyObject(data);

    if (typeof bool === 'string') {
      if (bool === 'bool') return !empty;
    }
    return empty ? 'YES' : 'NO_EMPTY';
  };
  this.newRows = function () {
    for (var variable in arguments) {
      var args = arguments[variable];
      if (args instanceof Array) {
        var newRow = args;
        var i = 0,arSize = args.length;
        if (arSize > 0) {
          for (var column in data) {
            if ( arSize > i) {
              if (typeof args[i] === 'string') data[column].push(args[i]);
              else data[column].push(null);
            }
            else data[column].push(null);
            i++;
          }
          rowsData++;
        }
      }
      else if(args instanceof Object){
        for (var column in data) {
          var newArg = typeof args[column] === 'string'? args[column] : null;
          data[column].push(newArg);
        }
      }
      else {
        console.log(cg.error.argument + '(' + args +')');
      }
    }
    return this;
  };
  this.constructor = function () {
    this.source(setSource);
  };
  this.constructor();
};
cg.Input = function (type) {
  var isInDom = false;
  var inputType = 'textBox';
  var listInputs =  {
    'textBox': cg.$('input').attr('type', 'text').show().addClass('cg-input'),
    'label': cg.$('option').show().addClass('cg-input'),
    'select': cg.$('select').show().addClass('cg-input')
  };
  this.input = function (setInput) {
    if (typeof setInput !== 'undefined') {
      if (typeof setInput === 'string' && listInputs[setInput] !== 'undefined' && inputType !== setInput) {
        if (listInputs[inputType].parent().length)listInputs[inputType].after(listInputs[setInput]).detach();
        inputType = setInput;
      }
      return this;
    }
    return listInputs[inputType];
  };
  this.dom = function (setInput) {
    return this.input(setInput);
  }
  this.appendTo = function (setAppend) {
    if (setAppend.length > 0) {
      this.input().appendTo(setAppend);
      isInDom = true;
    }
    return this;
  };
  this.prependTo = function (setPrepend) {
    if (setPrepend.length > 0) {
      this.input().prependTo(setPrepend);
      isInDom = true;
    }
    return this;
  };
  this.placeholder = function (newPlaceholder) {
    if (typeof newPlaceholder === 'string') {
      listInputs.textBox.prop('placeholder', newPlaceholder);
    }
    return this;
  };
  this.val = function (setVal) {
    if (typeof setVal !== 'undefined') {
      if (typeof setVal !== 'object') {
        this.input().val(setVal);
      }
      return this;
    }
    return this.input().val();
  };
  this.text = function (setText) {
    if (typeof setText !== 'undefined') {
      if (typeof setText !== 'object') {
        this.input().text(setText);
      }
      return this;
    }
    return this.input().text();
  }
  this.addClass = function (addClass) {
    if (typeof addClass !== 'undefined') {
      for (var variable in listInputs) {
        listInputs[variable].addClass(addClass);
      }
    }
    return this;
  };

  var style = "";
  this.style = function (newStyle) {
    if (typeof newStyle !== "undefined") {
      this.input().removeClass(style);
      for (var i in listInputs) {
        listInputs[i].removeClass(style);
      }
      style = newStyle;
      this.input().addClass(style);
      for (var i in listInputs) {
        listInputs[i].addClass(style);
      }
      return this;
    }
    return style;
  }
}
cg.MultiPanelView = function () {
  cg.myDom.call(this);
  this.container = cg.$('div').addClass('cg-multipanel');
  var pnl_access = cg.$('div').addClass('cg-multipanel-access').appendTo(this.container);
  var pnl_view = cg.$('div').addClass('cg-multipanel-view').appendTo(this.container);
  var list_access = [];
  var list_views = [];

  this.access = function () {
    return list_access;
  }
  this.views = function () {
    return list_views;
  }

  function addEventClick(access,panel) {
    access.click(function(event) {
      for (var views in list_views) {
        list_views[views].detach();
      }
      panel.appendTo(pnl_view);
    });
  }

  this.addPanel = function (custom) {
    if (typeof custom !== 'undefined' && typeof custom === 'object') {
        list_access.push(cg.$('button').text(custom.text !== 'undefined'? custom.text: 'panel'));
        pnl_access.append(list_access[list_access.length-1])
        list_views.push(custom.panel !== 'undefined' ? custom.panel : cg.$('div'));
    }
    for (var views in list_views) {
      list_views[views].detach();
    }
    list_views[0].appendTo(pnl_view);
    for (var access in list_access) {
      list_access[access].unbind('click');
      addEventClick(list_access[access],list_views[access]);
    }
    return this;
  }
}
//delegates
cg.dataTable = function (source) { return new cg.DataTable(source); };
cg.messageBox = function (param) { return new cg.MessageBox(param); };
cg.input = function (type) { return new cg.Input(type); };
cg.multiPanelView = function () { return new cg.MultiPanelView(); };
cg.obj = {};
cg.readyObj = function () {
  $('cgObjet').each(function( index ) {
    var type = $(this).attr('type');
    var name = $(this).attr('name');
    if (typeof cg[type] !== 'undefined') {
      if (typeof cg.obj[type] === 'undefined') {
        cg.obj[type] = {};
      }
      if (typeof cg.obj[type][name] === 'undefined') {
        eval('cg.obj.' + type + '.' + name + ' = new cg.' + type + '();');
        $(this).after(cg.obj[type][name].addClass('cgObjet').dom().attr({'cggname':name, 'cggtype': type})).remove();
      }
    }
  });
};
