<?php
  $lala = print_r(list_projets(),true);
 ?>

<div class="panel_p projet-management">
  <div class="panel_s">
    <div class="n_panel_p n_header">
      <div class="n_panel_s">
        <div class="_m_title">Administracion de proyectos</div>
        <div class="_m_home">
          <a href="index.php"><i class="ion-radio-waves"></i></a>
        </div>
      </div>
    </div>
    <div class="n_panel_p n_body">
      <div class="n_panel_s">
        <div class="_n_open_projet">
          <a href="<?php echo '../'.$projet; ?>" target="_blank"><?php echo 'open '.$projet; ?></a>
          <a class="saveChanges">Save changes</a>
        </div>
        <div class="_s_n_body"></div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    var pnlEditor = cg.$('div');
    var projet = '<?php echo $projet ?>';
    var jaja = '';

    var editor = CodeMirror(pnlEditor[0],{
      lineNumbers: true,
      mode: "htmlmixed",
      keyMap: "sublime",
      autoCloseBrackets: true,
      matchBrackets: true,
      showCursorWhenSelecting: true,
      theme: "base16-light",
      tabSize: 5
    });
    editor.setSize("100%", "100%");


    $.post("../"+projet+'/index.php',{}, function(data) {
      editor.setValue(data);
    });



    var panels = cg.multiPanelView()
    .addPanel({text: 'Código fuente',panel: pnlEditor})
    .addPanel({text: 'Arquitectura',panel: cg.$('div').addClass('arquitecture')})
    .addPanel({text: 'Recursos',panel: cg.$('div').addClass('sources')})
    .prependTo($('._s_n_body'));

    $('div._s_n_body').heightCalc(100, -41);
    panels.container().find('> div').eq(0).width(200);
    panels.container().find('> div').eq(1).widthCalc(100, -201);
    $('.saveChanges').click(function(event) {
      var proj = projet;
      var func = {function: cg.function('saveProjets',[proj,editor.getValue()])};
      $.post('query.php', func,function () {
        location.reload();
      });
    });


    var cont = cg.$('div').css({width:'100%',height:'100%',position:'relative'}).appendTo(panels.views()[2]);
    var cLink = cg.$('div').appendTo(cont).heightCalc(100,-51);
    var cclink = cg.$('div').css({width:'100%',height:'100%'}).appendTo(cLink);
    var ccCode = cg.$('div').css({width:'100%',height:'100%',position: 'relative'}).hide().appendTo(cLink);

    var editorResource = CodeMirror(ccCode[0],{
      lineNumbers: true,
      mode: "htmlmixed",
      keyMap: "sublime",
      autoCloseBrackets: true,
      matchBrackets: true,
      showCursorWhenSelecting: true,
      theme: "base16-light",
      tabSize: 5
    });
    editorResource.setSize("100%", "100%");

    $.post("query.php",{function:cg.function('sourcesProjet',[projet])}, function(data) {
      var DATA = JSON.parse(data);


      var cOption = cg.$('div').appendTo(cont).css({height:50,background:'#e2ea89'}).append(
        cg.$('button').text('algo'),
        cg.$('button').text('Regresar').click(function (event) {
          ccCode.hide();
          cclink.show();
        })
      );
      for (var variable in DATA) {
        cclink.append(
          cg.$('div').addClass('textIcon_link').append(
            cg.$('div').text(DATA[variable]),
            cg.$('a').append(cg.$('i').addClass('ion-android-exit')).click(function (event) {
              ccCode.show();
              cclink.hide();
            })
          )
        );
      }
      console.log(DATA);
    });

    panels.views()[1].append(cg.$('iframe').prop('src', 'php/arquitect.php?projet='+projet));

    /*panels.access()[1].click(function (event) {
      $.post("../"+projet+'/index.php',{}, function(data) {
        var DATA = $(data);
        panels.views()[1].empty().append(DATA);
        panels.views()[1].find('title').remove();
        panels.views()[1].find('meta').remove();
      });
    });*/
});
</script>
