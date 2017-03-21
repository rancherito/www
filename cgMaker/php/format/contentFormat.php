  var {{var}}Content = "Your Content";
  this.{{var}}Content = function(setContent){
    if(typeof setContent !== "undefined" && typeof setContent === "string"){
      {{var}}Content = setContent;
      {{var}}.empty().append({{var}}Content);
      return this;
    }
    return {{var}}Content;
  }
  this.{{var}}Content({{var}}Content);
