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
      $('.asdda').append(_data.getContainer());

      var texto = '';
      var texto2 = '';
      var jmp = '\n';
      var antes = '';

      texto += '<?php'+jmp;
      texto2 += '<?php'+jmp;
      for (var i = 0; i < dtQ.getTable()['SPECIFIC_NAME'].length; i++) {
        var valor = dtQ.getTable()['SPECIFIC_NAME'][i];
        if (antes!=valor) {


          texto += '\tfunction '+valor+'($proc){'+jmp;
          texto += '\t\t$sql = "call  '+valor+'".parametros($proc);'+jmp;
          texto += '\t\t$DATA = DATA(connectDB(),$sql);'+jmp;
          texto += '\t\techo \'{"PROCESO":"EXITOSO","DATA":\'.json_encode($DATA[0]).\',"HEAD":\'.json_encode($DATA[1]).\'}\';'+jmp;
          texto += '\t}'+jmp;
          texto += jmp;

          var t2V = valor.replace(/sp_|tb_|_/gi,'');

          texto2 += i===0?'\tif ($proc[0]===\''+t2V+'\') {'+jmp:'\telse if ($proc[0]===\''+t2V+'\') {'+jmp;
          texto2 += '\t\t'+valor+'($proc);'+jmp;
          texto2 += '\t}'+jmp;
          texto2 += jmp;

        }
        antes=valor;
      }

      texto2 += '\telse {'+jmp;
      texto2 += '\t\techo \'{"PROCESO":"FALLIDO"}\';'+jmp;
      texto2 += '\t}'+jmp;

      texto += '?>'+jmp;
      texto2 += '?>'+jmp;
      $('.textarea').text(texto);
      $('.textarea2').text(texto2);

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
