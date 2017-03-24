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
       .ImputXtheme01{
         box-sizing: border-box;
       }
       .ImputXtheme01 .ImputX-input{
         height: 30px;
         border: 0;
         padding: 5px;
         overflow: hidden;
       }

     </style>
     <script type="text/javascript">
       $(document).ready(function() {
         cg.readyObj();
         var test = cg.obj.FormMagic.test;
         test.style("FormMagictheme01");

        var inputx = cg.obj.InputX.test;
         inputx.style("ImputXtheme01").placeholder("my text").input("multiselect").text('un texto');
         inputx.addItem(
           cg.Option("0","primer valor"),
           cg.Option("1","segundo valor"),
           cg.Option("2","sdada"),
           cg.Option("3","fdgdfgdfgd")
         );
         inputx.val("1");
         var data = new cg.DataTable();
         data.source({
            'grupos':["INDICE INFORMACION PERSONAL","INDICE INFORMACION PERSONAL","INDICE INFORMACION PERSONAL","INDICE INFORMACION PERSONAL","INDICE INFORMACION PERSONAL","INDICE INFORMACION PERSONAL"],
            'preguntas':["CUANTOS AÑOS TIENES","CUANTOS AÑOS TIENES","CUANTOS AÑOS TIENES","PREFERENCIA MUSICAL","PREFERENCIA MUSICAL","PREFERENCIA MUSICAL"],
            'types': ["select","select","select","select","select","select"],
            'alternativas':["18","19","20","ROCK","ELECTRO","POP"],
            'valores':["1","2","3","1","2","3"]
          });
          test.datatable(data);
          test.makeForm({
            groups: "grupos",
            quest: "preguntas" ,
            type: "types",
            alter: "alternativas",
            value: "valores"
          });




         /*$.post('query.php', {sql: cg.fn('preguntasCuestionario',["170001"])}, function(data) {
           var mydata = new cg.DataTable();
           console.log(JSON.parse(data));
           mydata.source(JSON.parse(data));
           test.datatable(mydata);
           test.makeForm({
             groups: "grupo_descripcion",
             quest: "descripcion_pregunta" ,
             type: "tipo_eleccion",
             alter: "descripcion_alternativas",
             value: "valor_alternativas"
           });
         });*/

       });

     </script>
     <body>
       <cgObjet type="FormMagic" name="test"></cgObjet>
       <cgObjet type="InputX" name="test"></cgObjet>
     </body>
 </html>
