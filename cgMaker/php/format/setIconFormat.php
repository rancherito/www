  var {{var}}Icon = "ion-android-archive";
	this.{{var}}Icon = function(setIcon){
    if(typeof setIcon !== "undefined" && typeof setIcon === "string"){
      {{var}}.removeClass({{var}}Icon);
  		{{var}}Icon = setIcon;
  		{{var}}.addClass({{var}}Icon);
      return this;
    }
		return {{var}}Icon;
	}
  this.{{var}}Icon({{var}}Icon);
