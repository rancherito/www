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
      txtTitle.empty().append(setContent);
      return this;
    }
    return txtTitleContent;
  }
  this.txtTitleContent(txtTitleContent);

}