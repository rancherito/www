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
           nombres:['DAVID','MARCOS','MATHEO','JAZAEL'],
           apellidoMaterno:['AQUINO','CASERES','CARTAGENA','JUANTORO','ANIELA'],
           apellidoPaterno:['LARICO','MESTAS','CATEDRA','CARANAS','SANTAS']
         };

        var a = cg.dataTable(data);

        console.log(a.source());

        console.log(a.status('bool'));

       });
     </script>
   </head>
   <body>
   </body>
 </html>
