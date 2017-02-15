<?php

 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title></title>
     <script type="text/javascript" src="js/jquery-1.12.4.js"></script>
     <script type="text/javascript" src="js/cg.tool.js"></script>
     <script type="text/javascript" src="js/cg.class.js"></script>
     <script type="text/javascript">
       $(document).ready(function() {
         var file = $('.fileChoise');
         file.hide();
         file.prop('accept', 'application/javascript')


         $('.open').click(function(event) {file.click()});

         file.change(function(event) {
           if (file.prop('value').length > 0) {
             console.log(file.prop('files')[0].name);
             console.log(file.prop('value'));
           }

         });
       });
     </script>
   </head>
   <body>
     <input class="fileChoise" type="file" id="myFile">
     <button class="open">Seleccionar Archivo</button>
   </body>
 </html>
