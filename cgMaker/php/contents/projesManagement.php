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
        <div class="_n_open_projet"><a href="<?php echo '../'.$projet; ?>" target="_blank"><?php echo 'open '.$projet; ?></a></div>
        <div class="_s_n_body">
            <div class="_s_p_1"></div>
            <div class="_s_p_2">PANEL ARQUITECTURA</div>
            <div class="_s_p_3">CUALQUIER OTRA COSA</div>
            <script type="text/javascript">
            $(document).ready(function() {


              var editor = CodeMirror($('div._s_p_1')[0],{
                value: '<html>jajaja soy un html</html>',
                lineNumbers: true,
                mode: "htmlmixed",
                keyMap: "sublime",
                autoCloseBrackets: true,
                matchBrackets: true,
                showCursorWhenSelecting: true,
                theme: "base16-light",
                tabSize: 2
              });

              var panels = cg.multiPanelView()
              .addPanel({text:'Código fuente',panel:$('div._s_p_1')})
              .addPanel({text:'Arquitectura',panel:$('div._s_p_2')})
              .addPanel({text:'panel3',panel:$('div._s_p_3')})
              .prependTo($('._s_n_body'));

              $('div._s_n_body').heightCalc(100,-40);
              panels.container().find('> div').eq(0).width(200);
              panels.container().find('> div').eq(1).widthCalc(100,-200);

            });
            </script>
        </div>
      </div>
    </div>
  </div>
</div>
