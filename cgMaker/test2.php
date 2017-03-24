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
      .FormMagictheme01 .FormMagic-group{
        background: white;
        margin: 0 0 20px;
        box-shadow: 0 1px 4px 0 #888888;
      }
      .FormMagictheme01 .FormMagic-title{
        background: #fb5656;
        height: 40px;
        line-height: 20px;
        font-size: 18px;
        color: white;
        padding: 10px;
        box-sizing: border-box;
      }
      .FormMagictheme01 .FormMagic-body{
        padding: 10px;
        box-sizing: border-box;
      }
      .FormMagictheme01 .InputForm{
        padding: 10px 10px 20px;
        box-sizing: border-box;
        width: 50%;
        float: left;
      }
      .FormMagictheme01 .InputForm > div{
      }
      .FormMagictheme01 .InputForm > div .InputForm-boxTitle{
        height: 20px;
        color: #f44336;
      }
      .FormMagictheme01 .InputForm > div .ImputX{
        background: white;
        height: 35px;
        border: 0 !important;
        border-bottom: 1px #c1c1c1 solid !important;
      }
      .FormMagictheme01 .InputForm > div .ImputX-input{
        padding: 5px;
      }
      .FormMagictheme01 .InputForm > div .ImputX-list{
        box-shadow:  0 1px 4px 0 #888888;
        border: 0 !important;
        background: #f9f9f9 !important;
        top: 0 !important;
        overflow: auto;
        max-height: 113px;
      }
      .FormMagictheme01 .InputForm > div .ImputX-list option{
        height: 35px;
        line-height: 35px;
        padding: 0 10px !important;
      }
      .FormMagictheme01 .InputForm .ImputX-close{
        background: transparent;
        border-style: solid;
        outline: 0;
        border: 0;
      }
      .FormMagictheme01 .InputForm .ImputX-close:hover{
        background: #fb5656;
        color: white;
      }

     </style>
     <script type="text/javascript">
       $(document).ready(function() {
         cg.readyObj();
         var test = cg.obj.FormMagic.test;
         test.style("FormMagictheme01");

         /*var inputf = cg.obj.ImputForm.test;
          inputf.placeholder("my textlalal").input("select").text('un texto');
          inputf.addItem(
            cg.Option("0","primer valosssr"),
            cg.Option("1","segundo valor"),
            cg.Option("2","sdada"),
            cg.Option("3","fdgdfgdfgd")
          );

         var data = new cg.DataTable();
         data.source({
            'grupos':["INDICE INFORMACION PERSONAL","INDICE INFORMACION PERSONAL","INDICE INFORMACION PERSONAL","INDICE INFORMACION PERSONAL","INDICE INFORMACION PERSONAL","INDICE INFORMACION PERSONAL","palala"],
            'preguntas':["CUANTOS AÑOS TIENES","CUANTOS AÑOS TIENES","CUANTOS AÑOS TIENES","PREFERENCIA MUSICAL","PREFERENCIA MUSICAL","PREFERENCIA MUSICAL","nananna"],
            'types': ["select","select","select","multiselect","multiselect","multiselect","select"],
            'alternativas':["DIECIOCO","TRENTA Y NUEVE","SESENTA Y CINCO","ROCK","ELECTRO","POP","wachala tattoo"],
            'valores':["1","2","3","1","2","3","lala"]
          });
          test.datatable(data);
          test.makeForm({
            groups: "grupos",
            quest: "preguntas" ,
            type: "types",
            alter: "alternativas",
            value: "valores"
          });
*/


        $.post('query.php', {sql: cg.fn('preguntasCuestionario',["170001"])}, function(data) {
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
         });

       });

     </script>
     <body>
       <cgObjet type="FormMagic" name="test"></cgObjet>
       <cgObjet type="ImputForm" name="test"></cgObjet>
     </body>
 </html>
