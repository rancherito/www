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