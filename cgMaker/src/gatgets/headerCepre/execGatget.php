
    <?php
      echo '<link rel="stylesheet" href="../../font/font-awesome/font.css">';
      echo '<link rel="stylesheet" href="../../font/Ionicons/font.css">';
      echo '<script type="text/javascript" src="../../../js/jquery-1.12.4.js"></script>';
      echo '<script type="text/javascript" src="../../../js/cg.class.js"></script>';
      echo '<style media="screen">';
        include_once '../gatgets.php';
      echo '</style>';
      echo "<body></body>";
      echo '<script type="text/javascript">';
        include_once 'script.js';
      echo "
        var test = new cg.".basename(realpath("."))."();
        test.appendTo($('body'));
      </script>";
     ?>
