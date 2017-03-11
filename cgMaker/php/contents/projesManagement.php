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
        <div class="_s_n_body">
          <div class="sources2">
            <div class="">
              <div class="cLink">
                <div class="ccLink"></div>
                <div class="ccCode"></div>
              </div>
              <div class="cSettings">
                <button type="button" name="button" class="btnReturn">Return</button>
                <button type="button" name="button" class="btnSave" style="display: none">Save changes</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  var source = [];
  var projet = '<?php echo $projet ?>';
  var extencion = {css: 'css', js: 'javascript'};

  $(document).ready(function() {
    var pnlEditor = cg.$('div');
    var pnlEditorSource = $('div.ccCode');

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

    var editorResource = CodeMirror(pnlEditorSource[0],{
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

    $.post("../"+projet+'/cgMProjet/index.cgM',{}, function(data) {
      editor.setValue(data);
    });

    var panels = cg.multiPanelView()
      .addPanel({text: 'Código fuente',panel: pnlEditor})
      .addPanel({text: 'Arquitectura',panel: cg.$('div').addClass('arquitecture')})
      .addPanel({text: 'Recursos',panel: $('div.sources2')})
      .prependTo($('._s_n_body'));


    panels.views()[2].find('div.cLink').css('height','calc(100% - 50px)');
    panels.views()[2].find('.btnReturn').click(function () {
      panels.views()[2].find('div.ccLink').show();
      panels.views()[2].find('div.ccCode').hide();
      panels.views()[2].find('.btnSave').hide();
    });
    panels.views()[2].find('.btnSave').click(function (event) {
      $.post('query.php', {fn: cg.fn('saveSourceProjets',[projet, source[1], editorResource.getValue()])});
    });

    $('div._s_n_body').heightCalc(100, -41);
    panels.container().find('> div').eq(0).width(200);
    panels.container().find('> div').eq(1).css('width','calc(100% - 200px)');

    $('.saveChanges').click(function(event) {
      var proj = projet;
      $.post('query.php', {fn: cg.fn('saveProjets',[proj,editor.getValue()])});
    });

    $.post("query.php",{fn:cg.fn('sourcesProjet',[projet])}, function(data) {
      var DATA = JSON.parse(data);
      for (var variable in DATA) {
        var link = cg.$('a').append(cg.$('i').addClass('ion-android-exit'));
        openCodeS(link,DATA[variable]);
        panels.views()[2].find('div.ccLink').append(
          cg.$('div').addClass('textIcon_link').append(
            cg.$('div').text(DATA[variable][0]),link
          )
        );
      }
    });

    panels.views()[1].append(cg.$('iframe').prop('src', '../'+projet+'/indexArq.php'));

    // others functios
    new fileAsModified('../'+projet+'/cgMProjet/index.cgM',function (change) {
      if (change) {
        $.post("../"+projet+'/cgMProjet/index.cgM',{}, function(data) {
          editor.setValue(data);
        });
      }
    });
    var lastModifiedSource = new fileAsModified('',function (change) {
      if (change) {
        $.post('query.php', {fn: cg.fn('getCodeSourceProjet',[projet, source[1]])}, function(data) {
          editorResource.setOption("mode", extencion[cg.getFileExtension(source[0])]);
          editorResource.setValue(data);
        });
      }
    });
    function openCodeS(selector,newSource) {

      selector.click(function (event) {
        source = newSource;
        lastModifiedSource.path(source[1]);
        panels.views()[2].find('div.ccLink').hide();
        panels.views()[2].find('div.ccCode').show();
        panels.views()[2].find('.btnSave').show();
        $.post('query.php', {fn: cg.fn('getCodeSourceProjet',[projet, source[1]])}, function(data) {
          editorResource.setOption("mode", extencion[cg.getFileExtension(source[0])]);
          editorResource.setValue(data);
        });
      });
    }
});

</script>
