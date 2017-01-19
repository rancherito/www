
$(document).ready(function() {
  var formSection = $('div.form-section_s');
  var sendSection = $('div.send-section');
  var inLCG = {};
  var bttCG = {};

  inLCG.user = new inputLegendCG();
  inLCG.user.setLeyenda('USUARIO');
  inLCG.user.addClass('');
  inLCG.user.inputs.setPlaceholder('Igrese usuario');
  inLCG.user.setIcon('ion-ios-person');
  skinInputLeyenda_theme01(inLCG.user);
  formSection.append(inLCG.user.getContainer());

  inLCG.pass = new inputLegendCG();
  inLCG.pass.inputs.setInput('inputPass');
  inLCG.pass.setLeyenda('USUARIO');
  inLCG.pass.inputs.setPlaceholder('Igrese usuario');
  inLCG.pass.setIcon('ion-ios-locked');
  skinInputLeyenda(inLCG.pass);
  formSection.append(inLCG.pass.getContainer());

  bttCG.send = new buttonCG()
  bttCG.send.setLeyenda('Enviar');
  bttCG.send.setIcon('ion-android-send');
  skinButton(bttCG.send);
  sendSection.append(bttCG.send.getContainer());
});
