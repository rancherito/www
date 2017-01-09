<?php
function connectDB(){
   $db = new mysqli('localhost:3306','root','12345678','bussparrandero');
   return $db;
}
 ?>
