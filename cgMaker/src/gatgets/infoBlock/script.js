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
  this.txtTitleContent("Your content");

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

  this.ifBodyContent = function(setContent){
    ifBody.empty().append(setContent);
    return this;
  }
  this.ifBodyContent("Your content");

}