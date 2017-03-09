<?php
  include_once 'php/functions.php';
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?php include 'php/contents/scripsHeader.php'; ?>
    <title>Management cg projets</title>
  </head>
  <body>
    <?php
        $projet = $_GET['page_projet'];
        if (!empty($projet)) {
          if (isProjet($projet)) {
            include_once 'php/contents/projesManagement.php';
          }else {
            include_once 'php/contents/cpindex.php';
          }
        }else {
          include_once 'php/contents/cpindex.php';
        }
     ?>
  </body>
</html>
