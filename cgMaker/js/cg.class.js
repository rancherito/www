

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
  this.callbackDom = function () {};
  this.dom = function (getcontainer) {
    if ( typeof getcontainer === 'function') {
      return this;
    }
    return this.container;
  };
  this.appendTo = function (setAppend) {
    if (setAppend.length > 0) {
      this.container.appendTo(setAppend);
      this.callbackDom();
    }
    return this;
  };
  this.prependTo = function (setPrepend) {
    if (setPrepend.length > 0) {
      this.container.prependTo(setPrepend);
      this.callbackDom();
    }
    return this;
  };
}
cg.GaleryImages = function () {
  cg.myDom.call(this);
  var list_images = [];
  var list_imagesDom = [];
  var container = this.container;

  this.callbackDom = function () {
    container.css({width: "50%", overflow: "hidden"});
    container.height(container.width() * 0.5);
    $( window ).resize(function() {
      container.height(container.width() * 0.5);
    });
  }

  this.addImage = function (newImage) {
    if(typeof newImage !== "undefined"){
      for (var arg in arguments) {
        if (typeof arguments[arg] === "string") {
          var image = arguments[arg];
          if (list_images.indexOf(image) === -1) {
            if (cg.getFileExtension(image) !== "") {
              list_images.push(image);
              var procImage = cg.$("img").attr("src", image).css('width', '100%');;
              list_imagesDom.push(procImage);
              this.container.append(procImage);
            }
          }
        }
      }
      for (var i = 0; i < list_imagesDom.length; i++) {
        if (i === 0) {
          list_imagesDom[i].show();
        }else {
          list_imagesDom[i].hide();
        }
      }
      return this;
    }
    return list_images;
  };
}
cg.vview = function (val,view) {
  this.val = val;
  this.view = view;
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
    if (typeof newData !== "undefined") {
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
      }
    }
    return data;
  };
  this.isEmpty = function (bool) {
    var empty = $.isEmptyObject(data);

    if (typeof bool === 'string') {
      if (bool === 'bool') return empty;
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

  this.getListInputs = function () {
    return listInputs;
  }

  if (typeof type !== "undefined") {
    this.input(type);
  }
  this.callbackDom = function () {};
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
cg.Option = function (val,view) {
  return cg.$("option").text(view).val(val);
}
cg.InputX = function (setInput) {
  cg.myDom.call(this);

  var styleDefault = {background: "white", "border": "0px solid", "text-align": "left", position: "relative","box-sizing": "border-box",width: "100%", outline: 0};
  var iSel = cg.$("button").addClass('ion-arrow-down-b').css({cursor: "pointer", "font-family": "Tw Cen MT", border: 0, outline: 0, "border-style": "solid", background: "white", position: "absolute", height: "100%",top:0,right:0, width: 30,"font-size": "16px"});
  var list = cg.$("div").addClass('ImputX-list').hide().css({background:"white","border-radius": "1px",border: "1px gray solid", top: "100%",padding: "3px", "box-sizing": "border-box", width: "100%", position: "absolute"});

  var mlsave = cg.$("button").addClass('ion-close-round').css({padding: "0px 3px"});
  var miSel = cg.$("button").addClass('ion-arrow-down-b').css({cursor: "pointer", "font-family": "Tw Cen MT", border: 0, outline: 0, "border-style": "solid", background: "white", position: "absolute", height: "100%",top:0,right:0, width: 30,"font-size": "16px"});
  var multiList = cg.$("div").addClass('ImputX-list').hide().css({"border-radius": "1px",border: "1px gray solid", top: "100%",padding: "3px", "box-sizing": "border-box", width: "100%", position: "absolute"}).append(
    cg.$("div").addClass('ImputX-close-panel').append(mlsave),
    cg.$("div").addClass('ImputX-list-panel').css({"overflow": "hidden"})
  );
  mlsave.click(function(event) {
    multiList.hide();
  });
  var listInputs = {
    input: cg.$("input").attr('type', 'text').addClass('ImputX-input').css(styleDefault),
    label: cg.$("button").addClass('ImputX-input').css(styleDefault),
    select: cg.$("button").addClass('ImputX-input').css(styleDefault).css({cursor: "pointer"}),
    multiselect: cg.$("button").addClass('ImputX-input').css(styleDefault).text("sin selección").css({cursor: "pointer"})
  };

  iSel.click(function(event) {list.toggle();}).focusout(function(event) {  if (!hoverOptions) {list.hide();}});
  listInputs["select"].click(function(event) {list.toggle();}).focusout(function(event) {if (!hoverOptions) {list.hide();}});

  miSel.click(function(event) {multiList.toggle();});
  listInputs["multiselect"].click(function(event) {multiList.toggle();});

  var hoverOptions = false;
  var typeInput = "input";

  this.container
    .addClass('ImputX')
    .css({position: "relative",border: "1px gray solid"})
    .append(listInputs["input"]);

  this.placeholder = function (setPlaceholder) {
    if (typeof setPlaceholder !== "undefined") {
      listInputs["input"].attr('placeholder', setPlaceholder);
      return this;
    }
    return listInputs["input"].attr('placeholder');
  }
  this.input = function (setInput) {
    if (typeof setInput !== "undefined") {
      if (typeof listInputs[setInput] !== "undefined") {
        if (setInput !== typeInput) {
          listInputs[typeInput].detach();
          this.container.append(listInputs[setInput]);
          typeInput = setInput;
          if (typeInput === "select") {
            this.container.append(iSel,list);
          }else {
            iSel.detach();
            list.detach();
          }
          if (typeInput === "multiselect") {
            this.container.append(miSel,multiList);
          }else {
            miSel.detach();
            multiList.detach();
          }
        }
      }
      return this;
    }
    return listInputs[typeInput];
  }
  this.val = function (setVal) {
    if (typeof setVal !== "undefined") {
      if (typeInput === "select") {
        if (list.children().length > 0) {
          if (list.find('option[value ="'+setVal+'"]').length > 0) {
            listInputs["select"].val(setVal).text(list.find('option[value ="'+setVal+'"]').text());
          }
          else {
            listInputs["select"].val("").text("");
          }
        }
      }else if (typeInput === "multiselect") {
        for (var i in optionList) {
          optionList[i].active = false;
          optionList[i].option.css("background","transparent");
        }

        for (var val in setVal) {
          for (var i in optionList) {
            if (setVal[val]+"" === optionList[i].val) {
              optionList[i].active = true;
              optionList[i].option.css("background",colorOpAct);
            }
          }
        }
        var e = 0;
        var testmsel = "";
        for (var i in optionList) {
          if (e > 1) {  break;}
          if (optionList[i].active) {
            testmsel = optionList[i].option.text();
            e++;
          }
        }
        var text = ['sin selección',testmsel,"multiple selección"];
        listInputs["multiselect"].text(text[e]);
      }
      else {
        listInputs[typeInput].val(setVal);
      }
      return this;
    }
    if (typeInput === "multiselect") {
      var optionVal = [];
      for (var i in optionList) {
        if (optionList[i].active) {
          optionVal.push(optionList[i].option.val());
        }
      }
      return optionVal;
    }
    return listInputs[typeInput].val();
  }
  this.text = function (setText) {
    if (typeof setText !== "undefined") {
      if (typeInput !== "select" && typeInput !== "multiselect") {
        listInputs[typeInput].text(setText);
      }
      return this;
    }
    return listInputs[typeInput].text();
  }
  var colors = ["red","blue"];
  var activeOption = [];
  var optionList = [];

  this.addItem = function (newItem) {
    if (typeof newItem !== "undefined") {
      for (var arg in arguments) {

        if (typeInput === "select") {
          list.append(
            arguments[arg]
            .hover(function() {$(this).css({background: "#ddd"}); hoverOptions = true},function() {$(this).css({background: "transparent"}); hoverOptions = false;})
            .click(function(event) {
              listInputs["select"].attr("value",$(this).val()).text($(this).text());
              list.hide();
            })
          );
        }
        if (typeInput === "multiselect") {
          var myoption = {option: arguments[arg], active: false,val: arguments[arg].val()};
          optionList.push(myoption);
          optionSettings(myoption,listInputs);
          myoption.option.click(function(event) {
            var e = 0;
            var testmsel = "";
            for (var i in optionList) {
              if (e > 1) {  break;}
              if (optionList[i].active) {
                testmsel = optionList[i].option.text();
                e++;
              }
            }
            var text = ['sin selección',testmsel,"multiple selección"];
            listInputs["multiselect"].text(text[e]);
          });
          multiList.find("div.ImputX-list-panel").append(myoption.option);
        }
      }
      if (typeInput === "select") {
        if (list.children().length > 0) {
          listInputs["select"].attr("value",$(list.children()[0]).val()).text($(list.children()[0]).text());
        }
      }
    }
    return this;
  }
  this.input(setInput);
}
var colorOpAct = "#ddd";
function optionSettings(optionList,listInputs) {
  optionList.option.css({float: "left", margin: "2px" , padding: "3px", cursor: "pointer"})
  .hover(function() {
    $(this).css({background: colorOpAct});
  },function() {
    if (optionList.active) {
      $(this).css({background: colorOpAct});
    }else {
      $(this).css({background: "transparent"});
    }
  })
  .click(function(event) {
    optionList.active = !optionList.active;
  })
}
cg.ImputForm = function () {
  cg.myDom.call(this);
  var input = new cg.Input();
  var boxLeyenda = cg.$("div").addClass("InputForm-boxTitle");
  var leyenda = 'some text';
  this.container.append(
    cg.$("div").append(
      boxLeyenda,
      input.placeholder("your text").dom()
    )
  );
  this.input = input.input;

  this.leyenda = function (setLeyenda) {
    if (typeof setLeyenda !== "undefined") {
      if (typeof setLeyenda === "string") {
        leyenda = setLeyenda;
        boxLeyenda.text(leyenda);
        return this;
      }
    }
    return leyenda;
  }
  this.leyenda(leyenda);

  this.addOption = function (newOption) {
    for (var arg in arguments) {
      input.getListInputs()['select'].append(arguments[arg]);
    }

    return this;
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
cg.QuestionsData = function () {
  this.name = "";
  this.question = {view: [], val: []};
  this.type = "";
}
cg.FormMagic = function () {
  cg.myDom.call(this);
  this.container.addClass('FormMagic');
  var datatable = new cg.DataTable();
  var groups = {val: [], view: []};
  var question = {};
  this.datatable = function (newDatatable) {
    if (typeof newDatatable !== "undefined") {
      if (newDatatable instanceof cg.DataTable) {
        datatable = newDatatable;
      }
    }
    return datatable;
  }
  this.makeForm = function (positionForm) {
    if (!datatable.isEmpty("bool")) {
      var source = datatable.source();var columsGroup = {groups: [], quest:[] ,type: [], alter: [], value: []};

      for (var i in columsGroup) {
        columsGroup[i] = source[positionForm[i]];
      }

      var newData = [];
      var a = true;
      for (var i in columsGroup) {
        for (var e in columsGroup[i]) {if (e !== "unique") {if (a) {newData.push([]);}  newData[e].push(columsGroup[i][e]);}}
        a = false;
      }

      var usedQ = [];
      for (var i in newData) {
        if (typeof question[newData[i][0]] === "undefined") {
          question[newData[i][0]] = [];
        }
        if (usedQ.indexOf(newData[i][1]) === -1) {
          var qq = new cg.QuestionsData();
          qq.name = newData[i][1];qq.type = newData[i][2];
          usedQ.push(newData[i][1]);
          question[newData[i][0]].push(qq);
        }
        for (var e = 0; e < question[newData[i][0]].length; e++) {
          if (question[newData[i][0]][e].name === newData[i][1]) {
            question[newData[i][0]][e].question['view'].push(newData[i][3]);
            question[newData[i][0]][e].question['val'].push(newData[i][4]);
          }
        }
      }

      for (var i in question) {
        var body = cg.$("div").addClass('FormMagic-body');
          this.container.append(
            cg.$("div").addClass('FormMagic-group').append(
              cg.$("div").text(i).addClass('FormMagic-title'),
              body
            )
          );
          for (var e in question[i]) {
            var inp = new cg.ImputForm();
            inp.leyenda(question[i][e].name).input(question[i][e].type);
            var  viewData = question[i][e].question.view;
            for (var f in viewData) {
              inp.addOption(cg.Option(f,viewData[f]))
            }
            body.append(inp.dom());
          }
          //body.
      }

    }
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
        cg.obj[type][name].callbackDom();
      }
    }
  });
};
