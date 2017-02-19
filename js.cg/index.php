<?php

 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title></title>
     <script type="text/javascript" src="js/jquery-1.12.4.js"></script>
     <script type="text/javascript" src="js/cg.class.js"></script>
     <script type="text/javascript">
       $(document).ready(function() {
         var data = {
           nombres:['DAVID','MARCOS','MATHEO'],
           apellidoMaterno:['AQUINO','CASERES','CARTAGENA','JUANTORO'],
           apellidoPaterno:['LARICO','MESTAS','CATEDRA','CARANAS','SANTAS']
         };

        var a = cg.dataTable(data);
        a.newRows(['gato','perro'], 'holas', 4, 'perro');
        console.log(a.source());
        console.log(a.isEmpty());


       });
     </script>
   </head>
   <body>
   </body>
 </html>
