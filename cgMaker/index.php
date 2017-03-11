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
        $gatgets = $_GET['page_gatgets'];
        if (!empty($projet)) {
          if (isProjet($projet)) {
            include_once 'php/contents/projesManagement.php';
          }else {
            include_once 'php/contents/cpindex.php';
          }
        }elseif (!empty($gatgets)) {
          include_once 'php/contents/gatgetFactory.php';
        }else {
          include_once 'php/contents/cpindex.php';
        }
     ?>
  </body>
</html>
