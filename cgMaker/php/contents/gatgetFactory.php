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
          <cgObjet type='Input' name='manati'></cgObjet>
          <button type="button" name="button">lalal</button>
        </div>
        <div class="pnl_multi">
          <div class="pnlScript">Los script</div>
          <div class="pnlStyle">Los style</div>
          <div class="pnlSource">Los source</div>
          <div class="pnlVeiew">Los Views</div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    var cgO = {Input:{}};

    $('cgObjet').each(function( index ) {
      var type = $(this).attr('type');
      var name = $(this).attr('name');
      eval('cgO.'+type+'.'+name+' = new cg.'+type+'();');
      $(this).after(cgO[type][name].dom());
    });
    console.log(cgO.Input);

    var panels = cg.multiPanelView()
      .addPanel({text: 'Javescript',panel: $('div.pnlScript')})
      .addPanel({text: 'Style',panel: $('div.pnlStyle')})
      .addPanel({text: 'Code Source',panel: $('div.pnlSource')})
      .addPanel({text: 'See Gatget',panel: $('div.pnlVeiew')})
      .appendTo($('div.pnl_multi'))
      .style('themeMultipanel01');
  });
</script>
