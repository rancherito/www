<?php
class listProcedures {
  function preguntasCuestionario($parameters){
    $conn = new connection();
    return $conn -> execSql("exec Academico.[Encuesta].[spu_EncuestaData_Recuperar] ".parametros($parameters));
  }
}


 ?>
