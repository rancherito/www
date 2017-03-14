<?php
$projetsCG = list_projets();
$lala = '';
foreach ($projetsCG as $key => $value) {
  $lala.='<div class="textIcon_link"><div class="">'.$key.'</div><a href="?page_projet='.$key.'"><i class="ion-android-exit"></i></a></div>';
}

$page_index = <<<EOT
  <div class="_s_1">
    <div class="item-1">
      <div class="icon"><i class="ion-android-folder-open"></i></div>
      <div class="title">NEW PROJET</div>
      <a class="cgButtom01 link" href="?page_index=create_projet">GO</a>
    </div>
    <div class="item-2">
      <div class="icon"><i class="ion-ios-filing-outline"></i></div>
      <div class="title">OPEN PROJET EXSTENT</div>
      <a class="cgButtom01 link" href="?page_index=open_projet">GO</a>
    </div>
    <div class="item-3">
      <div class="icon"><i class="ion-cube"></i></div>
      <div class="title">GATGETS</div>
      <a class="cgButtom01 link" href="?page_index=gatget-factory">GO</a>
    </div>
  </div>
EOT;

$page_index_cf = <<<EOT
  <div class="_s_2">
    <div class="_s_title">Create your projet</div>
    <div class="_s_body">
      <div class="_ss_body">
        <div class="_ci_text">
          <div class="">Nombre del Proyecto</div>
        </div>
        <div class="cgButtom01 createProjet">Create projet</div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    $(document).ready(function() {
      var txtNameProjet = cg.input().appendTo($('._ci_text')).placeholder('ingrese el nombre del proyecto');
      $('.createProjet').click(function(event) {
        $.post("query.php", {fn: cg.fn('createProjet', [txtNameProjet.val()])}, function(data) {
          var DATA = JSON.parse(data);
          if (DATA.PROCESS === 'CORRECT') {
            window.open('?page_index=open_projet','_self');
          }else {
            var a = cg.messageBox('ONLY_CONFIRMATION').messageSee(DATA.PROCESS).show();
          }
        });
      });
    });
  </script>
EOT;

$page_index_op = <<<EOT
  <div class="_s_3">
  <div class="_s_title">Search Projets</div>
    <div class="_s_body">
      $lala
    </div>
  </div>
EOT;

$page_index_gg = <<<EOT
<div class="_s_4">
  <div class="_s_title">Gatgets</div>
  <div class="_s_body">
    <div class="cgSquareIcon2 add-gatget">
      <div class="">
        <i class="ion-android-add"></i>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    $('div.add-gatget').click(function (event){
      window.open("?page_gatgets=new",'_self');
    });
  });
</script>
EOT;
 ?>

<div class="panel_p">
  <div class="panel_s">
    <div class="n_panel_p n_header">
      <div class="n_panel_s">
        <div class="_m_title">Panel de control</div>
        <div class="_m_home">
          <a href="index.php"><i class="ion-radio-waves"></i></a>
        </div>
      </div>
    </div>
    <div class="n_panel_p n_body">
      <div class="n_panel_s">
        <div class="back"></div>
        <div class="floor">
          <div class="sub_menus">
            <?php
              if (!empty($_GET['page_index'])) {
                switch ($_GET['page_index']) {
                  case 'create_projet':
                    echo $page_index_cf;
                    break;
                  case 'open_projet':
                    echo $page_index_op;
                    break;
                  case 'gatget-factory':
                    echo $page_index_gg;
                    break;
                  default:
                    echo $page_index;
                    break;
                }
              }else {
                echo $page_index;
              }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
