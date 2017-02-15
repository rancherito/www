<?php
  $myfile = fopen("newfile.json", "w") or die("Unable to open file!");
  $txt = '{"holas":""}';
  fwrite($myfile, $txt);
  fclose($myfile);
?>
