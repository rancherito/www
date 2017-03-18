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
            <div class="sources">
              <div class="">
                <div class="cLink">
                  <div class="ccLink"></div>
                  <div class="ccSource"></div>
                  <div class="ccCode"></div>
                </div>
                <div class="cSettings">
                  <button type="button" name="button" class="btnReturn">Return</button>
                  <button type="button" name="button" class="btnSave" style="display: none">Save changes</button>
                </div>
              </div>
            </div>
            <div class="gallery-gatgets">
              <div>
                <div class="cont-listGatget"></div>
                <div class="cont-settingsGatget">
                  <button class="btn_insert themeButton02">Insert Gatget</button>
                  <cgObjet type='Input' name='nameGatget'></cgObjet>
                </div>
              </div>
            </div>
            <div class="paginaEdicion"></div>
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
    cg.readyObj();
    var pnlEditor = cg.$('div');
    var pnlEditorSource = $('div.ccCode');
    var btnAddGatget = $('div.add-gatget');
    var insertGatget = $('button.btn_insert');

    insertGatget.click(function(event) {
      var nameGatgetInsert = cg.obj.Input.nameGatget.val();
      if (nameGatgetInsert.length > 0) {
        $.post('query.php', {fn: cg.fn('exportGatget', [projet, nameGatgetInsert])}, function(data) {
          console.log(data);
        });
      }
    });

    var editor = CodeMirror(pnlEditor[0],{
      lineNumbers: true,
      mode: "htmlmixed",
      keyMap: "sublime",
      autoCloseBrackets: true,
      matchBrackets: true,
      showCursorWhenSelecting: true,
      theme: "base16-light",
      tabSize: 2
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


    cg.obj.Input.nameGatget.input('label').style('themeInput01');

    $.post("../"+projet+'/cgMProjet/index.cgM',{}, function(data) {
      editor.setValue(data);
    });

    var panels = cg.multiPanelView()
      .addPanel({text: 'Código fuente',panel: pnlEditor})
      .addPanel({text: 'Arquitectura',panel: cg.$('div').addClass('arquitecture')})
      .addPanel({text: 'Recursos',panel: $('div.sources')})
      .addPanel({text: 'Gatget GALLERY',panel: $('div.gallery-gatgets')})
      .addPanel({text: 'Pagina',panel: $('div.paginaEdicion')})
      .addPanel({text: 'Pagina',panel: cg.$('div').addClass('listPages')})
      .prependTo($('._s_n_body'));

    panels.views()[2].find('.btnReturn').click(function () {
      panels.views()[2].find('div.ccLink').show();
      panels.views()[2].find('div.ccCode').hide();
      panels.views()[2].find('div.ccSource').hide();
      panels.views()[2].find('.btnSave').hide();
    });
    panels.views()[2].find('.btnSave').click(function (event) {
      $.post('query.php', {fn: cg.fn('saveSourceProjets',[projet, source[1], editorResource.getValue()])});
    });

    $('.saveChanges').click(function(event) {
      var proj = projet;
      $.post('query.php', {fn: cg.fn('saveProjets',[proj,editor.getValue()])},function (data) {
        console.log(data);
      });
    });

    btnAddGatget.click(function (event) {
      window.open("?page_gatgets=true",'_self');
    });

    $.post('query.php', {fn: cg.fn('listgatgets', [])}, function(data) {
      var DATA = JSON.parse(data);
      for (var variable in DATA) {
        var iconPanel = cg.$('div').addClass('cgSquareIcon');
        selectGatget(iconPanel,DATA[variable]);
        iconPanel.append(
          cg.$('div').append(
            cg.$('i').addClass('ion-ios-cog'),
            cg.$('div').text(DATA[variable])
          )
        );
        panels.views()[3].find('div.cont-listGatget').append(iconPanel);
      }

    });

    $.post('query.php', {fn: cg.fn('listFolderSource', [projet])}, function(data) {
      var DATA = JSON.parse(data);
      console.log(DATA);
      for (var variable in DATA) {
        var squareicon = cg.$('div').addClass('cgSquareIcon').append(
          cg.$('div').append(
            cg.$('i').addClass('ion-ios-folder-outline'),
            cg.$('div').text(variable)
          )
        );
        var ee = {type: variable, files: DATA[variable]};
        openFolderS(squareicon,ee);
        panels.views()[2].find('div.ccLink').append(squareicon);
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
    var lastModifiedSource = new fileAsModified('ccc',function (change) {
      if (change) {
        $.post('query.php', {fn: cg.fn('getCodeSourceProjet',[projet, source[1]])}, function(data) {
          editorResource.setOption("mode", extencion[cg.getFileExtension(source[0])]);
          editorResource.setValue(data);
        });
      }
    });

    function selectGatget(selector,name) {
      selector.click(function(event) {
        cg.obj.Input.nameGatget.text(name).val(name);
      });

    }

    function openFolderS(selector,folderPath){
      selector.click(function (event) {
          panels.views()[2].find('div.ccLink').hide();
          panels.views()[2].find('div.ccSource').empty().show();
          for (var file in folderPath['files']['name']) {
            var link = cg.$('i').addClass('ion-android-apps');
            openCodeS(link,[folderPath['files']['name'][file],folderPath['files']['path'][file],folderPath['type']]);
            panels.views()[2].find('div.ccSource').append(
              cg.$('div').addClass('cgSquareIcon').append(
                cg.$('div').append(
                  link,cg.$('div').text(folderPath['files']['name'][file])
                )
              )
            );
          }
      });
    }
    function openCodeS(selector,newSource) {

      selector.click(function (event) {
        source = newSource;
        lastModifiedSource.path(source[1]);
        panels.views()[2].find('div.ccSource').hide();
        panels.views()[2].find('div.ccCode').show();
        panels.views()[2].find('.btnSave').show();
        $.post('query.php', {fn: cg.fn('getCodeSourceProjet',[projet, source[1]])}, function(data) {
          editorResource.setOption("mode", extencion[source[2]]);
          editorResource.setValue(data);
        });
      });
    }
});
</script>
