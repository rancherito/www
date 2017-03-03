<?php
  include_once 'php/functions.php';
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?php include 'php/contents/scripsHeader.php'; ?>
    <title></title>
  </head>
  <body>
    <?php
        $projet = $_GET['page_projet'];
        if (!empty($projet)) {
          echo "wachalala";
          var_dump(isProjet($projet));
        }else {
          include_once 'php/contents/cpindex.php';
        }

     ?>
  </body>
</html>
