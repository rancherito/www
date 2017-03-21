  var {{var}}Content = "Your Content";
  this.{{var}}Content = function(setContent){
    if(typeof setContent !== "undefined" && typeof setContent === "string"){
      {{var}}.empty().append(setContent);
      return this;
    }
    return {{var}}Content;
  }
  this.{{var}}Content({{var}}Content);
