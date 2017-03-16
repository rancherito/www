cg.infoBlock = function(){
	cg.myDom.call(this);
	this.container = $("<div class=\"infoBlock\" cggname=\"infoBlock\"><div><div class=\"title\"><div class=\"txt-title cg-gg\" cggeditContent=\"true\" cggname=\"txtTitle\">YOUR TITLE</div><i class=\"icon cg-gg\" cggIcon=\"true\" cggname=\"icon\">i</i></div><div class=\"content cg-gg\" cggeditContent=\"true\" cggname=\"content\">your content</div></div></div>");
	var txtTitle = this.container.find("[cggname=txtTitle]")
	var icon = this.container.find("[cggname=icon]")
	var content = this.container.find("[cggname=content]")
}