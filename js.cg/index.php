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
           apellidoMaterno:['AQUINO','CASERES','CARTAGENA'],
           apellidoPaterno:['LARICO','MESTAS','CATEDRA']
         };

        var a = cg.dataTable(data);
        a.newRows(['JUANA','YANA','APAZA'],{
          nombres: 'ANTONIO' ,
          apellidoMaterno: 'SUCATICONA',
          apellidoPaterno:'HAMILTON'}
        );

        console.log(a.source());
        console.log(a.isEmpty());

        var a = {};
        console.log(typeof a.w);

       });
     </script>
   </head>
   <body>
   </body>
 </html>
