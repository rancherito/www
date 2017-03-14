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
          <button class="themeButton01">Save</button>
          <cgObjet type='Input' name='nameGatget'></cgObjet>
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
    cg.readyObj();
    var inputs = cg.obj.Input;
    inputs.nameGatget
    .style('themeInput01')
    .placeholder('Name gatget')
    .input('label');

    var panels = cg.multiPanelView()
      .addPanel({text: 'Javescript',panel: $('div.pnlScript')})
      .addPanel({text: 'Style',panel: $('div.pnlStyle')})
      .addPanel({text: 'Code Source',panel: $('div.pnlSource')})
      .addPanel({text: 'See Gatget',panel: $('div.pnlVeiew')})
      .appendTo($('div.pnl_multi'))
      .style('themeMultipanel01');
  });
</script>
