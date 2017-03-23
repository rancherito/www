<?php
class listProcedures {
  function preguntasCuestionario($parameters){
    $conn = new connection();
    return $conn -> execSql("exec Academico.dbo.tbPreguntasCuestionario_Recuperar ".parametros($parameters));
  }
}


 ?>
