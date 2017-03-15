<div class="panel_p gatget-factory">
  <div class="panel_s">
    <div class="n_panel_p n_header">
      <div class="n_panel_s">
        <div class="_m_title">Gatget Factory</div>
        <div class="_m_home">
          <a href="index.php"><i class="ion-radio-waves"></i></a>
        </div>
      </div>
    </div>
    <div class="n_panel_p n_body">
      <div class="n_body_s">
        <div class="gf-settings">
          <button class="themeButton01 btnSaveGatget">Save</button>
          <cgObjet type='Input' name='nameGatget'></cgObjet>
        </div>
        <div class="pnl_multi">
          <div class="pnlScript"></div>
          <div class="pnlStyle"></div>
          <div class="pnlSource"></div>
          <div class="pnlVeiew">Los Views</div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
var configEditor = {
  lineNumbers: true,
  keyMap: "sublime",
  autoCloseBrackets: true,
  matchBrackets: true,
  showCursorWhenSelecting: true,
  theme: "base16-light",
  tabSize: 5
};
var nameGatget = <?php echo "'$gatgets';"; ?>
  $(document).ready(function() {
    cg.readyObj();
    var inputs = cg.obj.Input;

    inputs.nameGatget
    .style('themeInput01')
    .placeholder('Name gatget');

    var editorJavascript = CodeMirror($('div.pnlScript')[0],configEditor);
    editorJavascript.setSize("100%", "100%");
    editorJavascript.setOption('mode', 'javascript');

    var editorStyle= CodeMirror($('div.pnlStyle')[0],configEditor);
    editorStyle.setSize("100%", "100%");
    editorStyle.setOption('mode', 'css');

    var editorSource= CodeMirror($('div.pnlSource')[0],configEditor);
    editorSource.setSize("100%", "100%");
    editorSource.setOption('mode', 'htmlmixed');

    if (nameGatget !== 'new') {
      inputs.nameGatget.input('label').text(nameGatget);
      $.post('src/gatgets/'+nameGatget+'/script.js',{}, function(data) {
        editorJavascript.setValue(data);
      });

    }



    var panels = cg.multiPanelView()
      .addPanel({text: 'JavaScript',panel: $('div.pnlScript')})
      .addPanel({text: 'Style',panel: $('div.pnlStyle')})
      .addPanel({text: 'Code Source',panel: $('div.pnlSource')})
      .addPanel({text: 'See Gatget',panel: $('div.pnlVeiew')})
      .appendTo($('div.pnl_multi'))
      .style('themeMultipanel01');

    panels.access()[1].click(function(event) {
      if (nameGatget !== 'new') {
        $.post('src/gatgets/'+nameGatget+'/style.css',{}, function(data) {
          editorStyle.setValue(data);
        });
      }
    });

    panels.access()[2].click(function(event) {
      if (nameGatget !== 'new') {
        $.post('src/gatgets/'+nameGatget+'/source.php',{}, function(data) {
          editorSource.setValue(data);
        });
      }
    });

    $('button.btnSaveGatget').click(function(event) {
      $.post('query.php', {fn: cg.fn('saveGatget',[
        inputs.nameGatget.val(),
        editorJavascript.getValue(),
        editorStyle.getValue(),
        editorSource.getValue(),
         nameGatget === 'new'
       ])}, function(data) {
        console.log(data);

      });
    });


  });
</script>
