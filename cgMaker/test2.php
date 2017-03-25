<?php

 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title></title>
     <?php include 'php/contents/scripsHeader.php'; ?>
      <link rel="stylesheet" href="test.css">

     <body>
       <button type="button" name="button" class="verify">Verificador de contenido</button>
       <cgObjet type="FormMagic" name="test"></cgObjet>
       <script type="text/javascript">
         $(document).ready(function() {
           cg.readyObj();
           var verify = $('button.verify');
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
             mydata.source(JSON.parse(data));
             test.datatable(mydata);
             test.makeForm({
               groups: "grupo_nombre",
               quest: "pregunta_nombre",
               type: "tipo_eleccion",
               alter: "alternativa_nombre",
               value: "alternativa_valor"
             });
             var indVivienda = test.listFormInput["INDICE VIVIENDA"];
             for (var i in test.listFormInput) {
               for (var e in test.listFormInput[i]) {
                 test.listFormInput[i][e].validation({novalues: ["-1"], novoid: true});
               }
             }
           });

           function addZero(num,length) {
             var s_rtr = "";
             for (var i = 0; i < length - (num+"").length; i++) {
               s_rtr += "0";
             }
             return s_rtr+num;
           };

           verify.click(function(event) {
             var allisValid = true;
             var tripa = "";
             var ii = 0;
             for (var i in test.listFormInput) {
               tripa += "G" + addZero(ii, 2); ii++;
               for (var e in test.listFormInput[i]) {
                 var a = test.listFormInput[i][e];
                 tripa += "P" + addZero(e,2);
                 if (Array.isArray(a.val())) {

                   if (a.val().length > 0) {
                     tripa += "R";
                     for (var f in a.val()) {
                       tripa += addZero(a.val()[f],2)+",";
                     }
                   }else {
                     tripa += "R-1,";
                   }

                 }else {
                   tripa += "R" + addZero(a.val(),2)+",";
                 }


                 allisValid &= a.isValid();
               }
             }
            console.log(allisValid);
            console.log(tripa);

           });

         });

       </script>
     </body>
 </html>
