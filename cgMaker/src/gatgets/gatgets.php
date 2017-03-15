<?php
  include '../style.css';
  foreach (scandir('../') as $key => $value) {
    if ($value!='.' && $value!='..' && !is_file($value)) {
      foreach (scandir("../$value") as $key2 => $value2) {
        if ($value2 === 'style.css') {
          include_once "../$value/$value2";
        }
      }
    }
  }
 ?>
