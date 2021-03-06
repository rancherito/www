
$(document).ready(function() {
  var formSection = $('div.form-section_s');
  var sendSection = $('div.send-section_s');
  var inLCG = {};
  var bttCG = {};
  var boxSCG = new boxShowCG();
  var notificacion =  new notifyCG();


  skinNotify(notificacion);
  boxSCG.addClass('boxNotify-theme01');


  inLCG.user = new inputLegendCG();
  inLCG.user.setLeyenda('USUARIO');
  inLCG.user.addClass('');
  inLCG.user.inputs.setPlaceholder('Ingrese usuario');
  inLCG.user.setIcon('ion-ios-person');
  inLCG.user.inputs.getContainer().keydown(function(event) {
    boxSCG.hide();
  });
  skinInputLeyenda_theme01(inLCG.user);


  inLCG.pass = new inputLegendCG();
  inLCG.pass.inputs.setInput('inputPass');
  inLCG.pass.setLeyenda('CONTRASEÑA');
  inLCG.pass.inputs.setPlaceholder('Ingrese contraseña');
  inLCG.pass.setIcon('ion-key');
  inLCG.pass.inputs.getContainer().keydown(function(event) {
    boxSCG.hide();
  });
  skinInputLeyenda_theme01(inLCG.pass);


  bttCG.send = new buttonCG()
  bttCG.send.setLeyenda('Enviar');
  bttCG.send.setIcon('ion-android-send');
  bttCG.send.getContainer().click(function(event) {
    var user = inLCG.user.inputs.getValue();
    var pass = inLCG.pass.inputs.getValue();
    notificacion.setTextAlerta('Enviando Datos');
    //notificacion.setTextAlerta(text);

    $.post('php/query.php',{procedure:call('usuarioValidarContrasena',[user, pass, 'PERS', 'GGRL'])}, function(data) {
      var DATA = $.parseJSON(data);
      if (dataE(DATA)) {
        notificacion.setTextAlerta(dataR(DATA));
        if (dataR(DATA)==='USUARIO CORRECTO') {
          $.post('php/processWeb.php',{function:call('startSecionAdm',[user,pass])}, function(data) {
            window.open('administrator.php', '_self');
          });
        }
      }
    });

    boxSCG.show();
  });
  skinButton(bttCG.send);

  sendSection.append(bttCG.send.getContainer());
  formSection.append(inLCG.user.getContainer());
  formSection.append(inLCG.pass.getContainer());
  boxSCG.append(notificacion.getContainer());
  $('.bienvenida').parent().append(boxSCG.getContainer());

  $('.closeSesion').click(function(event) {
    $.post('php/processWeb.php',{function:'cerrarSecion()'}, function(data) {
      window.open('administrator.php', '_self');
    });
  });




});
