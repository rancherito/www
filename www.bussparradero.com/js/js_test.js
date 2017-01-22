$(document).ready(function() {


	console.log('holas');

	var la = listControlCG()
	.import('claustro')
	.setFirstFilter({'AREA DE TRABAJO':'select','ESTAGO DE LABOR':'select','ESTADO':'select','DNI':'select'})
	.setTitle('LISTAR PERSONAL')
	.addClass('lister')
	;

	console.log(la.filters);
	la.filters[0].append(optionCG('%','TODO'));
	la.filters[1].append(optionCG('%','TODO'));
	la.filters[2].append(optionCG('%','TODO'));
	la.filters[3].append(optionCG('%','TODO'));

	dataListas({procedure:call('areatrabajoListar',[])},la.listViews[0],'area_trabajo','nombre',la.filters[0]);

});

var listControl = function(){
	var container = $etq('div');
	var tablaSelector = tableCG();
	var inAndSelecs = {};
	var title = $etq('div').addClass('titleListC');
	this.filters = [];
	this.listViews = [];


	container.append(title);
	tablaSelector.appendTo(container);

	this.setTitle = function(newTtile){
		title.text(newTtile);
		return this;
	}

	this.setFirstFilter = function(filter){
		tablaSelector.addRow();
		var i = 0;
		for (var variable in filter) {
			if (filter[variable] === 'select') {
				this.filters.push($etq('select'));
			}else{
				this.filters.push($etq('input').attr('type', 'text').attr('placeholder', 'Ingrese su texo'));
			}

			tablaSelector
			.addHead(variable)
			.setCells(0,i,this.filters[i]);
			this.listViews.push(listViewCG());
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
	}

	this.addClass = function(newClass){
		container.addClass(newClass);
		return this;
	}

};

function listControlCG() {
	return new listControl();
}
