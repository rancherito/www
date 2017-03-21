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