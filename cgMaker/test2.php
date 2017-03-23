<?php

 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title></title>
     <?php include 'php/contents/scripsHeader.php'; ?>
     <style media="screen">
       .FormMagictheme01{
         padding: 30px 10px;
         overflow: hidden;
       }
       .FormMagictheme01 > div.FormMagic-group{
         margin-bottom: 30px;
         border-radius: 3px;
         border: 1px #e91e63 solid;
         position: relative;
       }
       .FormMagictheme01 > div.FormMagic-group:last-of-type{
         margin-bottom: 0;
       }
       .FormMagictheme01 > div.FormMagic-group > div.FormMagic-title{
         background: white;
         height: 20px;
         position: absolute;
         padding: 5px;
         border: 1px #e91e63 solid;
         border-radius: 3px;
         left: 10px;
         top: -15px;
         color: #e91e63;
         font-weight: bold;
       }
       .FormMagictheme01 > div.FormMagic-group > div.FormMagic-body{
         padding: 30px 10px 10px;
         width: 100%;
         overflow: hidden;
         box-sizing: border-box;
       }
       .FormMagictheme01 > div.FormMagic-group > div.FormMagic-body > div{
         padding: 0 0 10px;
         height: 55px;
         width: 50%;
         float: left;
       }
       .FormMagictheme01 > div.FormMagic-group > div.FormMagic-body > div > div{
         height: 100%;
         padding: 0 10px;
         box-sizing: border-box;
       }
       .FormMagictheme01 > div.FormMagic-group > div.FormMagic-body > div .InputForm-boxTitle{
         height: 20px;
         color: black;
       }
       .FormMagictheme01 > div.FormMagic-group > div.FormMagic-body > div .cg-input{
         border-radius: 3px;
         box-sizing: border-box;
         border: 1px #00bcd4 solid;
         width: 100%;
         height: 35px;
         padding: 5px 10px;
         outline: 0;
       }
       .FormMagictheme01 > div.FormMagic-group > div.FormMagic-body > div .cg-input:focus{
         background: #f0fcfd;
       }

     </style>
     <script type="text/javascript">
       $(document).ready(function() {
         cg.readyObj();
         var test = cg.obj.FormMagic.test;
         test.style("FormMagictheme01");

         $.post('query.php', {sql: cg.fn('preguntasCuestionario',["170001"])}, function(data) {
           var mydata = new cg.DataTable();
           mydata.source(JSON.parse(data));
           test.datatable(mydata);
           test.makeForm();
         });
       });

     </script>
     <body>
       <cgObjet type="FormMagic" name="test"></cgObjet>
     </body>
 </html>
