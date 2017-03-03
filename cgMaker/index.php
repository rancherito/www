<?php


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

        if (!empty($_GET['page_projet'])) {
          echo "wachalala";
        }else {
          include_once 'php/contents/cpindex.php';
        }


     ?>
  </body>
</html>
