<?php

 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title></title>
     <?php include 'php/contents/scripsHeader.php'; ?>

     <style media="screen">
       div.lalal{
         background: gray;
         height: 100px;
         width: 80%;
       }
     </style>
   </head>
   <body >
     <div class="lalal">

     </div>
     <script type="text/javascript">
       function lala(selector) {
         var W = selector.outerWidth();
         var H = selector.outerHeight();
         setInterval(function () {
           var w = selector.outerWidth();
           var h = selector.outerHeight();
           if (W !== w || H !== h) {
             console.log('lala has change');
           }
           W = w;
           H = h;
         }, 10);
       }
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

          $.post('query.php', {function: cg.fn('test',["console.log('wachalatato1áñÑ@--_d3°|#$%&/()=?¡'')))))555555","EL GATOVOLADOR",'tabitopacholino 1255'])}, function(data) {
            console.log(data);
          });
          test.input('select');
          var sa = $('div.lalal');
          sa.isResize(function () {
            console.log('wachalatato');
          });
          //lala(sa);
         });

     </script>
   </body>
 </html>
