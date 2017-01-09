$(document).ready(function() {

  var registrar = $('.registrar');
  var ingresar = $('.ingresar');
  var loginEnviar = $('.loginEnviar');
  var registroEnviar = $('.registroEnviar');
  var boxRegister = $('.boxRegister');
  var boxLogin = $('.boxLogin');
  var otherCont = $('.otherCont');
  var butons = $('.butons');
  var _bxL = $('._bxL');
  var _inLCG = {};

  var _bttCG = {};

  var _notifyCG =  new notifyCG();
  var _boxShowCG = new boxShowCG();
  _boxShowCG.append(_notifyCG.getContainer());

  _inLCG.user = new inputLegendCG();
  _inLCG.user.setLeyenda('USUARIO');
  _inLCG.user.inputs.setPlaceholder('Igrese usuario');
  _inLCG.user.setIcon('ion-ios-person');
  skinInputLeyenda(_inLCG.user);

  _inLCG.pass = new inputLegendCG();
  _inLCG.pass.inputs.setInput('inputPass');
  _inLCG.pass.setLeyenda('CONTRASEÑA');
  _inLCG.pass.setIcon('ion-ios-locked');
  _inLCG.pass.inputs.setPlaceholder('Igrese contraseña');
  skinInputLeyenda(_inLCG.pass);

  skinNotify(_notifyCG);



  _bttCG.send = new buttonCG()
  _bttCG.send.setLeyenda('Enviar');
  _bttCG.send.setIcon('ion-android-send');



  skinButton(_bttCG.send);

  _bttCG.cCuenta = new buttonCG()
  _bttCG.cCuenta.setLeyenda('Crear una cuenta');
  _bttCG.cCuenta.setIcon('ion-person-add');

  _bttCG.cCuenta.getContainer().click(function(event) {
    boxRegister.show();
    boxLogin.hide();
  });
  skinButton(_bttCG.cCuenta);

  _bxL
  .append(_boxShowCG.getContainer());

  otherCont
  .append(_inLCG.user.getContainer())
  .append(_inLCG.pass.getContainer());

  butons
  .append(_bttCG.send.getContainer())
  .append(_bttCG.cCuenta.getContainer());

  ingresar.click(function(event) {
    boxRegister.hide();
    boxLogin.show();
  });

  registroEnviar.on('click', function(event) {
      var nombresReg = $('.nombresReg'); var appellidosReg = $('.appellidosReg'); var dniReg = $('.dniReg');var contrasenaReg = $('.contrasenaReg');
      $('.resultadoReg').html('datos enviados');
      if (nombresReg.val().length > 0 && appellidosReg.val().length > 0 && dniReg.val().length > 0 && contrasenaReg.val().length > 0 ) {
        var consulta = {'procedure':'registrarUsuario'+parametros([nombresReg.val(),appellidosReg.val(),dniReg.val(),contrasenaReg.val()])};

        $.post('php/query.php',consulta,function(data) {
          var DATA = $.parseJSON(data);

          if (dataE(DATA)) {
            $('.resultadoReg').html(dataR(DATA));
          }

        });

      }else {
        $('.resultadoReg').html('faltan campos por completar');
      }
    });
  _bttCG.send.getContainer().click(function(event) {
      var user = _inLCG.user.inputs;
      var pass = _inLCG.pass.inputs;

      if (!user.void() && !pass.void()) {
        var consulta = {'procedure':'validarLogin'+parametros([user.getValue(),pass.getValue()])};
        console.log(consulta.procedure);
        _notifyCG.setTextAlerta('Datos Enviados');
        $.post('php/query.php',consulta, function(data) {
          console.log(data);
          var DATA = $.parseJSON(data);
          console.log(DATA);

          if (dataE(DATA)) {
            _notifyCG.setTextAlerta(dataR(DATA));
          }
        });
      }else {
        _notifyCG.setTextAlerta('faltan campos por completar');
      }
    });

$('.hide').click(function () {
  _boxShowCG.hide();
});

$('.show').click(function () {
  _boxShowCG.show();
});

});
