<?php
  echo '<link rel="stylesheet" href="../../font/font-awesome/font.css">'."\n";
  echo '<link rel="stylesheet" href="../../font/Ionicons/font.css">'."\n";
  echo '<script type="text/javascript" src="../../../js/jquery-1.12.4.js"></script>'."\n";
  echo '<script type="text/javascript" src="../../../js/cg.class.js"></script>'."\n";

  echo '<style media="screen">';
    include_once '../gatgets.php';
  echo '</style>'."\n";
  echo "<body></body>";
  echo '<script type="text/javascript">'."\n";
    include_once 'script.js';
  echo "
    var test = new cg.".basename(realpath("."))."();
    test.appendTo($('body'));
  </script>";
 ?>
