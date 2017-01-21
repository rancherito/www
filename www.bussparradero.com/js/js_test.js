$(document).ready(function() {


	console.log('holas');

	var la = listControlCG().import('claustro');


	
});

var listControl = function(){
	var container = $etq('div');

	this.getContainer = function () {
		return container;
	};
	this.appendTo = function(dom) {
		container.appendTo(dom);
		return this;
	}
	this.import = function(dom){
		var importReplace = $('cgimt.'+dom);
		importReplace.after(container);
		importReplace.remove();
		return this;
	};

};

function listControlCG() {
	return new listControl();
}


