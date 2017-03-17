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
          <div class="pnlGlobalStyle"></div>
          <div class="pnlSource"></div>
          <div class="pnlVeiew"></div>
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
  tabSize: 2
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

    var editorGlobalStyle= CodeMirror($('div.pnlGlobalStyle')[0],configEditor);
    editorGlobalStyle.setSize("100%", "100%");
    editorGlobalStyle.setOption('mode', 'css');

    var editorSource= CodeMirror($('div.pnlSource')[0],configEditor);
    editorSource.setSize("100%", "100%");
    editorSource.setOption('mode', 'htmlmixed');


    $.post('src/gatgets/style.css',{}, function(data) {
      editorGlobalStyle.setValue(data);
    });

    if (nameGatget !== 'new') {
      inputs.nameGatget.input('label').text(nameGatget);
      $.post('src/gatgets/'+nameGatget+'/script.js',{}, function(data) {
        editorJavascript.setValue(data);
      });
      $.post('src/gatgets/'+nameGatget+'/style.css',{}, function(data) {
        editorStyle.setValue(data);
      });
      $.post('src/gatgets/'+nameGatget+'/source.php',{}, function(data) {
        editorSource.setValue(data);
      });
      $('div.pnlVeiew').append(cg.$('iframe').prop('src','src/gatgets/'+nameGatget+'/execGatget.php'));
    }

    var panels = cg.multiPanelView()
      .addPanel({text: 'JavaScript',panel: $('div.pnlScript')})
      .addPanel({text: 'Style',panel: $('div.pnlStyle')})
      .addPanel({text: 'Global Style',panel: $('div.pnlGlobalStyle')})
      .addPanel({text: 'Code Source',panel: $('div.pnlSource')})
      .addPanel({text: 'See Gatget',panel: $('div.pnlVeiew')})
      .appendTo($('div.pnl_multi'))
      .style('themeMultipanel01');


      panels.access()[0].click(function(event) {
        if (nameGatget !== 'new') {
          $.post('src/gatgets/'+nameGatget+'/script.js',{}, function(data) {
            editorJavascript.setValue(data);
          });
        }
      });

    panels.access()[1].click(function(event) {
      if (nameGatget !== 'new') {
        $.post('src/gatgets/'+nameGatget+'/style.css',{}, function(data) {
          editorStyle.setValue(data);
        });
      }
    });

    panels.access()[2].click(function(event) {
      $.post('src/gatgets/style.css',{}, function(data) {
        editorGlobalStyle.setValue(data);
      });
    });

    panels.access()[3].click(function(event) {
      if (nameGatget !== 'new') {
        $.post('src/gatgets/'+nameGatget+'/source.php',{}, function(data) {
          editorSource.setValue(data);
        });
      }
    });

    var cggAttr = {};
    $.post('php/format/setIconFormat.php', {}, function(data) {
      cggAttr['cggIcon'] = data;
    });
    $.post('php/format/contentFormat.php', {}, function(data) {
      cggAttr['cggeditContent'] = data;
    });

    $('button.btnSaveGatget').click(function(event) {
      var dom = editorSource.getValue().replace(/>[\n\t ]+</gi,"><").replace(/[ ]+/gi," ").replace(/\n|\t/,"");
      var sess = "";
      $(dom).each(function(index, el) {
        var jsScript = "";
        if ($(el).attr('cggname') === nameGatget) {
          var jsScript = "cg."+nameGatget+" = function(){\n\n";
          jsScript+="\tcg.myDom.call(this);\n"
          jsScript+="\tthis.container = $(\""+(dom.replace(/"/gi,"\\\""))+"\");\n";
          $(dom).find(".cg-gg").each(function(index, el2) {
            var name = $(el2).attr('cggname');
            jsScript+="\tvar "+name+" = this.container.find(\"[cggname="+name+"]\");\n";
          });
          jsScript +="\n";
          $(dom).find(".cg-gg").each(function(index, el2) {
            var name = $(el2).attr('cggname');
            for (var i in cggAttr) {
              var attr = $(el2).attr(i);
              if (typeof attr !== "undefined" && attr !== false) {
                jsScript += cggAttr[i].replace(/{{var}}/gi,name);
                jsScript +="\n";
              }
            }
          });
          jsScript+="}";
          sess = jsScript;
        }
      });
      $.post('query.php', {fn: cg.fn('saveGatget',[
        inputs.nameGatget.val(),
        sess,
        editorStyle.getValue(),
        editorGlobalStyle.getValue(),
        editorSource.getValue(),
         nameGatget === 'new'
       ])}, function(data) {
         var DATA = JSON.parse(data);
         console.log(DATA);
         if (nameGatget === 'new') {
           window.open("?page_gatgets=" + inputs.nameGatget.val(),'_self');
         }
      });
    });


  });
</script>
