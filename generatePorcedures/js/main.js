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
      console.log(DATA);

      _data.setDataQuery(new dataQuery(DATA));
      $('.asdda').append(_data.getContainer());
    });

  });

  $('.connLocal').click(function(event) {
    console.log('dasfdaesv');
    var _call = call('bussCrear',['2','40','48','DDFSF452PE','A']);
    var _conn = {procedure:_call};
      $.post('php/query.php',_conn, function(data) {
        console.log(data);
      });
  });
});
