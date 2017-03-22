<?php

 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title></title>
     <?php include 'php/contents/scripsHeader.php'; ?>

     <style media="screen">
      body{
        background: gray;
      }
       div.lalal{
         background: gray;
         height: 100px;
         width: 80%;
       }
       div.infoBlock{
        width: 100%;
        max-width: 400px;
        background: white;
        margin: 5px;
        border-radius: 8px;
        box-sizing: border-box;
        padding: 10px;
      }
      div.infoBlock > div{
        width: 100%;
      }
      div.infoBlock > div > div.title{
        background: #ffc267;
        height: 50px;
        border-radius: 5px;
        line-height: 50px;
        text-align: center;
        color: white;
        position: relative;
      }
      div.infoBlock > div > div.title .txt-title{
        width: 100%;
        font-size: 26px;
      }
      div.infoBlock > div > div.title i{
        width: 50px;
        height: 50px;
        display: block;
        top: 0;
        right: 0;
        line-height: 50px;
        position: absolute;
        font-size: 30px;
      }
      div.infoBlock > div > div.ifBody{
        padding-top: 10px;
        text-align: center;
      }
      .boxIcon{
      	height: 100px;
      	width: 100px;
      	overflow: hidden;
      	box-sizing: border-box;
      	padding: 5px;
      }
      .boxIcon > div{
      	width: 90px;
      	height: 90px;
      	border: 1px #00bcd4 solid;
      	border-radius: 3px;
        cursor: pointer;
        position: relative;
      }
      .boxIcon > div i{
        display: block;
        line-height: 65px;
        height: 65px;
        text-align: center;
        font-size: 40px;
        color: #00bcd4;
      }
      .boxIcon > div div{
        background: #00bcd4;
        height: 25px;
        text-align: center;
        color: white;
        line-height: 25px;
      }

     </style>
   </head>
   <body >
     <div class="lalal"></div>
     <cgObjet type="myDom" name="lala"></cgObjet>
     <cgObjet type="infoBlock" name="wacha"></cgObjet>
     <cgObjet type="boxIcon" name="wachalo"></cgObjet>
     <cgObjet type="GaleryImages" name="test"></cgObjet>
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
cg.infoBlock = function(){

	cg.myDom.call(this);
	this.container = $("<div class=\"infoBlock\" cggname=\"infoBlock\"><div><div class=\"title\"><div class=\"txt-title cg-gg\" cggeditContent=\"true\" cggname=\"txtTitle\">YOUR TITLE</div><i class=\"icon cg-gg\" cggIcon=\"true\" cggname=\"icon\"></i></div><div class=\"ifBody cg-gg\" cggeditContent=\"true\" cggname=\"ifBody\">your content</div></div></div>");
	var txtTitle = this.container.find("[cggname=txtTitle]");
	var icon = this.container.find("[cggname=icon]");
	var ifBody = this.container.find("[cggname=ifBody]");

  this.txtTitleContent = function(setContent){
    txtTitle.empty().append(setContent);
    return this;
  }

  var iconIcon = "fa-heart";
	this.iconIcon = function(setIcon){
    if(typeof setIcon !== "undefined" && typeof setIcon === "string"){
      icon.removeClass(iconIcon);
  		iconIcon = setIcon;
  		icon.addClass(iconIcon);
      return this;
    }
		return iconIcon;
	}
  this.iconIcon(iconIcon);

  this.ifBodyContent = function(setContent){
    ifBody.empty().append(setContent);
    return this;
  }

}

cg.boxIcon = function(){

	cg.myDom.call(this);
	this.container = $("<div class=\"boxIcon\" cggname=\"boxIcon\"><div class=\"\"><i class=\"ion-alert-circled\"></i><div class=\"\">hola mundo</div></div></div>");

}
       $(document).ready(function() {

         cg.readyObj();
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

        var galImg = cg.obj;

        console.log(galImg.GaleryImages.test.addImage("src/img/A.jpg","src/img/B.jpg"));
        console.log(galImg.GaleryImages.test.addImage());
       });

     </script>
   </body>
 </html>
