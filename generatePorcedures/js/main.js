$(document).ready(function() {
  var _listViewCG = listViewCG();
  var _dataViewCG = dataViewCG();
  var slbd = $('.slbd');
  var bdver = $('.bdver');
  var tablaTest = $('.tablaTest');
  var _data = dataViewCG();

  var serv = $('.serv');
  var puer = $('.puer');
  var user = $('.user');
  var pass = $('.pass');

  $('.conec').click(function(event) {

    var _serv = serv.val();
    var _puer = puer.val();
    var _user = user.val();
    var _pass = pass.val();

    var _call = call('conecctServer',[_serv,_puer,_user,_pass]);
    var _conn = {conecction:_call,rutine_schema:'null'};
    $.post('php/query.php',_conn, function(data) {

      var DATA = $.parseJSON(data);
      _listViewCG.setDataQuery(new dataQuery(DATA)).setView('SCHEMA_NAME').setValue("SCHEMA_NAME");
      _listViewCG.setContainer(slbd);


      _dataViewCG.setDataQuery(new dataQuery(DATA));

      tablaTest.append(_dataViewCG.getContainer());
      bdver.css('display', 'block');

      });
  });
  bdver.click(function(event) {
    var _rtna = slbd.val();
    var _serv = serv.val();
    var _puer = puer.val();
    var _user = user.val();
    var _pass = pass.val();

    var _call = call('rutina',[_serv,_puer,_user,_pass]);
    var _conn = {rutine:_call,rutine_schema:_rtna};
    $.post('php/query.php',_conn, function(data) {
      var DATA = $.parseJSON(data);

      var dtQ = new dataQuery(DATA)
      _data.setDataQuery(dtQ);
      //$('.asdda').append(_data.getContainer());

      var texto = '';
      var jmp = '\n';

      var antes = '';
      for (var i = 0; i < dtQ.getTable()['SPECIFIC_NAME'].length; i++) {
        var valor = dtQ.getTable()['SPECIFIC_NAME'][i];
        if (antes!=valor) {

          texto += 'function '+valor+'($proc){'+jmp;
          texto += '\t$sql = "call  '+valor+'".parametros($proc);'+jmp;
          texto += '\t$DATA = DATA(connectDB(),$sql);'+jmp;
          texto += '\techo \'{"PROCESO":"EXITOSO","DATA":\'.json_encode($DATA[0]).\',"HEAD":\'.json_encode($DATA[1]).\'}\';'+jmp;
          texto += '}'+jmp;
          texto += jmp+jmp;
        }
        antes=valor;
      }

      $('.textarea').text(texto);




    });


  });

  $('.connLocal').click(function(event) {
    var _call = call('bussCrear',['2','40','48','A2055','A']);
    var _conn = {procedure:_call};
      $.post('php/query.php',_conn, function(data) {
        console.log(data);
      });
  });
});
