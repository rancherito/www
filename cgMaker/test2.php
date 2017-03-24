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
         box-sizing: border-box;
       }
       .FormMagictheme01 > div.FormMagic-group > div.FormMagic-body > div.InputForm{
         padding: 0 0 10px;
         height: 55px;
         width: 50%;
         float: left;
       }
       .FormMagictheme01 > div.FormMagic-group > div.FormMagic-body > div.InputForm > div{
         height: 100%;
         padding: 0 10px;
         box-sizing: border-box;
       }
       .FormMagictheme01 > div.FormMagic-group > div.FormMagic-body > div.InputForm > div div.ImputX{
         height: 30px;
       }
       .FormMagictheme01 > div.FormMagic-group > div.FormMagic-body > div.InputForm > div .ImputX .ImputX-input{
         padding: 5px;
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

         var inputf = cg.obj.ImputForm.test;
          inputf.placeholder("my textlalal").input("select").text('un texto');
          inputf.addItem(
            cg.Option("0","primer valosssr"),
            cg.Option("1","segundo valor"),
            cg.Option("2","sdada"),
            cg.Option("3","fdgdfgdfgd")
          );

         var data = new cg.DataTable();
         data.source({
            'grupos':["INDICE INFORMACION PERSONAL","INDICE INFORMACION PERSONAL","INDICE INFORMACION PERSONAL","INDICE INFORMACION PERSONAL","INDICE INFORMACION PERSONAL","INDICE INFORMACION PERSONAL"],
            'preguntas':["CUANTOS AÑOS TIENES","CUANTOS AÑOS TIENES","CUANTOS AÑOS TIENES","PREFERENCIA MUSICAL","PREFERENCIA MUSICAL","PREFERENCIA MUSICAL"],
            'types': ["select","select","select","multiselect","multiselect","multiselect"],
            'alternativas':["DIECIOCO","TRENTA Y NUEVE","SESENTA Y CINCO","ROCK","ELECTRO","POP"],
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



        /* $.post('query.php', {sql: cg.fn('preguntasCuestionario',["170001"])}, function(data) {
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
       <cgObjet type="ImputForm" name="test"></cgObjet>
     </body>
 </html>
