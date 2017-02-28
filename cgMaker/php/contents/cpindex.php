<?php
$page_index =
<<<EOT
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
  </div>
EOT;

$page_index_cf =
<<<EOT
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
        $.post("php/query.php",{function:cg.function('createProjet',[txtNameProjet.val()])}, function(data) {
          console.log(data);
        });
      });
    });
  </script>
EOT;
 ?>

<div class="panel_p">
  <div class="panel_s">
    <div class="n_panel_p n_header">
      <div class="n_panel_s">
        <div class="">Panel de control</div>
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
