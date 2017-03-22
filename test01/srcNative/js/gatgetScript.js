/*file from gatget boxIcon scripts*/
cg.boxIcon = function(){

	cg.myDom.call(this);
	this.container = $("<div class=\"boxIcon\" cggname=\"boxIcon\"><div class=\"biIcon\"><i class=\"cg-gg\" cggIcon=\"true\" cggname=\"icon\"></i></div><div class=\"biText cg-gg\" cggeditContent=\"true\" cggname=\"txtTitle\"></div></div>");
	var icon = this.container.find("[cggname=icon]");
	var txtTitle = this.container.find("[cggname=txtTitle]");

  var iconIcon = "ion-android-archive";
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

  var txtTitleContent = "Your Content";
  this.txtTitleContent = function(setContent){
    if(typeof setContent !== "undefined" && typeof setContent === "string"){
      txtTitleContent = setContent;
      txtTitle.empty().append(txtTitleContent);
      return this;
    }
    return txtTitleContent;
  }
  this.txtTitleContent(txtTitleContent);

}
/*file from gatget headerCepre scripts*/
cg.headerCepre = function(){

	cg.myDom.call(this);
	this.container = $("<div class=\"headerCepre\" cggname=\"headerCepre\"><a class=\"page_home\"><i class=\"icon cg-gg\" cggIcon=\"true\" cggname=\"icon\"></i></a><div class=\"title\">PORTAL PREUNIVERSITARIO</div></div>");
	var icon = this.container.find("[cggname=icon]");

  var iconIcon = "ion-android-archive";
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

}
/*file from gatget infoBlock scripts*/
cg.infoBlock = function(){

	cg.myDom.call(this);
	this.container = $("<div class=\"infoBlock\" cggname=\"infoBlock\"><div><div class=\"title\"><div class=\"txt-title cg-gg\" cggeditContent=\"true\" cggname=\"txtTitle\">YOUR TITLE</div><i class=\"icon cg-gg\" cggIcon=\"true\" cggname=\"icon\"></i></div><div class=\"ifBody cg-gg\" cggeditContent=\"true\" cggname=\"ifBody\">your content</div></div></div>");
	var txtTitle = this.container.find("[cggname=txtTitle]");
	var icon = this.container.find("[cggname=icon]");
	var ifBody = this.container.find("[cggname=ifBody]");

  var txtTitleContent = "Your Content";
  this.txtTitleContent = function(setContent){
    if(typeof setContent !== "undefined" && typeof setContent === "string"){
      txtTitleContent = setContent;
      txtTitle.empty().append(txtTitleContent);
      return this;
    }
    return txtTitleContent;
  }
  this.txtTitleContent(txtTitleContent);

  var iconIcon = "ion-android-archive";
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

  var ifBodyContent = "Your Content";
  this.ifBodyContent = function(setContent){
    if(typeof setContent !== "undefined" && typeof setContent === "string"){
      ifBodyContent = setContent;
      ifBody.empty().append(ifBodyContent);
      return this;
    }
    return ifBodyContent;
  }
  this.ifBodyContent(ifBodyContent);

}
//editing values
function initGatgetComponets(){
cg.obj.boxIcon.iconos.style("myDom");
cg.obj.boxIcon.iconos.iconIcon("ion-android-globe");
cg.obj.boxIcon.iconos.txtTitleContent("este es un globito : )");

cg.obj.headerCepre.header.style("myDom");
cg.obj.headerCepre.header.iconIcon("ion-android-home");

cg.obj.infoBlock.contacto.style("myDom");
cg.obj.infoBlock.contacto.txtTitleContent("Contacto");
cg.obj.infoBlock.contacto.iconIcon("ion-android-archive");
cg.obj.infoBlock.contacto.ifBodyContent("Your Content");

cg.obj.infoBlock.evaluaciones.style("my styles");
cg.obj.infoBlock.evaluaciones.txtTitleContent("Evaluaciones");
cg.obj.infoBlock.evaluaciones.iconIcon("ion-android-apps");
cg.obj.infoBlock.evaluaciones.ifBodyContent("Your Content");

cg.obj.infoBlock.inscripcion.style("lalala");
cg.obj.infoBlock.inscripcion.txtTitleContent("Inscripción");
cg.obj.infoBlock.inscripcion.iconIcon("fa-tag");
cg.obj.infoBlock.inscripcion.ifBodyContent("Your Content");

}