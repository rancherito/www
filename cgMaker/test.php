<?php

 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title></title>
     <?php include 'php/contents/scripsHeader.php'; ?>
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

        var test = cg.input()
        .input('label')
        .appendTo($('body'))
        .placeholder('locos')
        .val('gato loco')
        .text('some text');

        console.log(cg.function('lalal',['das','sda']));

        test.input('select');
        //$('body').append(test.input())

       });
     </script>
   </head>
   <body>
   </body>
 </html>