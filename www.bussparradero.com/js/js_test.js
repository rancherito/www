$(document).ready(function() {


	console.log('holas');

	var la = listControlCG().import('claustro').setFirstDilter({primero:'input',segundo:'input',tercero:'select'});



});

var listControl = function(){
	var container = $etq('div');
	var tablaSelector = tableCG();
	var inAndSelecs = {};
	var filters = [];

	tablaSelector.appendTo(container)


	this.setFirstDilter = function(filter){
		tablaSelector.addRow();
		var i = 0;
		for (var variable in filter) {
			if (filter[variable] === 'select') {
				filters.push($etq('select'));
			}else{
				filters.push($etq('input').attr('type', 'text'));
			}

			tablaSelector
			.addHead(variable)
			.setCells(0,i,filters[i]);

			i++;
		}



		return this;
	}

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
