<?php
  class connection{
    public $nameServer = '172.17.2.18';
    public $puerto = "80";
    public $db = 'desarrollo';
    public $pass = '123';
    public $changeDecode = true;
    function execSql($sql){
      $sql = $this->changeDecode ? $sql : utf8_decode($sql);
      $columns = [];
      $conn = mssql_connect($this->nameServer, $this->db, $this->pass);
      $query = mssql_query($sql,$conn);
      mssql_close($conn);
      if (gettype($query) === "resource") {
        for ($i=0; $i < mssql_num_fields($query); $i++) {
          $columns[mssql_field_name($query)] = [];
        }
        while ($row = mssql_fetch_array($query, MSSQL_ASSOC)) {
            foreach ($row as $key => $value) {
              $value = $this->changeDecode ? utf8_encode($value) : $value;
              array_push($columns[$key],$value);
            }
        }
      }
      $query = "";
      return $columns;
    }
  }


 ?>
