$(document).ready(function() {

	listarPersonal();
});

function listarPersonal() {
	var listPer = listControlCG()
	.import($('cgimt.claustro'))
	.setFirstFilter({'AREA DE TRABAJO':'select','ESTADO DE LABOR':'select','ESTADO':'select','DNI':'select'})
	.setSecondFilter({'AREA DE TRABAJO':'select','ESTADO DE LABOR':'select','ESTADO':'select','DNI':'input'})
	.setTitle('LISTAR PERSONAL')
	.addClass('lister');
	listPer.dataViews[0].import(listPer.tablaList);

	//hideColums

	console.log(listPer.dataViews[0]);
	listPer.dataViews[0].hideColums(['area_trabajo','estado','categoria','estado_categoria']);
	//sp_area_trabajo_Listar
	dataListas({procedure:call('areatrabajoListar',[])},listPer.listViews2[0],'area_trabajo','nombre',listPer.filters2[0]);
	dataListas({procedure:call('estadoListarByID',['%','GRAL'])},listPer.listViews2[2],'estado','nombre',listPer.filters2[2]);

	dataListas(upcall('personalListarByID',listPer.filters),listPer.listViews[0],'area_trabajo','AREA TRABAJO',listPer.filters[0],function () {
		dataListas(upcall('personalListarByID',listPer.filters),listPer.listViews[1],'estado','ESTADO LABOR',listPer.filters[1],function () {
			dataListas(upcall('personalListarByID',listPer.filters),listPer.listViews[2],'estado_categoria','ESTADO',listPer.filters[2],function () {
				dataListas(upcall('personalListarByID',listPer.filters),listPer.listViews[3],'DNI','DNI',listPer.filters[3],function () {
					dataTablas2(upcall('personalListarByID',listPer.filters),listPer.dataViews[0],function () {
						if (listPer.dataViews[0].getContainer().find('tr').length ===2) {
							listPer.addRowToChange.css('display', 'initial');
							listPer.getTableAlter().getContainer().css('display', 'table');
							console.log(listPer.dataViews[0].getCells(0,8));
							dataListas(
								{procedure:call('estadoListarByID',['%',listPer.dataViews[0].getCells(0,8)])},
								listPer.listViews2[1],'estado','nombre',listPer.filters2[1]);

						}else {
							listPer.addRowToChange.css('display', 'none');
							listPer.getTableAlter().getContainer().css('display', 'none');
						}
						listPer.filters2[3].val(listPer.dataViews[0].getCells(0,3));
					});
				});
			});
		});
	});

	listPer.relize();
}

function functionName() {

}


var listControl = function(){
	var container = $etq('div');
	var tablaSelector = tableCG();
	var tablaAlter = tableCG();
	var inAndSelecs = {};
	var title = $etq('div').addClass('titleListC');
	var notify = $etq('div').text('some text').addClass('notify');
	var contNtAndChange = $etq('div');
	this.tablaList = $etq('cgimt');
	this.filters = [];
	this.filters2 = [];
	this.listViews = [];
	this.listViews2 = [];
	this.dataViews = [];
	this.addRowToChange = $etq('button').text('CAMBIAR');
	this.dataViews.push(dataViewCG());

	container
	.append(title)
	.append(tablaSelector.getContainer())
	.append(this.tablaList)
	.append(tablaAlter.getContainer())
	.append(contNtAndChange.append(this.addRowToChange).append(notify))
	.append($etq('div').css('clear', 'both'))
	;

	this.getTableAlter = function () {
		return tablaAlter;
	}

	this.setTitle = function(newTtile){
		title.text(newTtile);
		return this;
	};

	this.setSecondFilter = function (filter) {
		tablaAlter.addRow();
		var i = 0;
		for (var variable in filter) {
			if (filter[variable] === 'select') {
				this.filters2.push($etq('select').append(optionCG('null','NINGUNO')));
				this.listViews2.push(listViewCG());
			}
			else{
				this.filters2.push($etq('input')
				.attr('type', 'text')
				.attr('placeholder', 'Ingrese su texo')
				.prop('disabled', true)
			);
			}

			tablaAlter
			.addHead(variable)
			.setCells(0,i,this.filters2[i]);

			i++;
		}
		return this;
	}

	this.setFirstFilter = function(filter){
		tablaSelector.addRow();
		var i = 0;
		for (var variable in filter) {
			if (filter[variable] === 'select') {
				this.filters.push($etq('select').append(optionCG('%','TODO')));
				this.listViews.push(listViewCG());
			}
			else{
				this.filters.push($etq('input').attr('type', 'text').attr('placeholder', 'Ingrese su texo'));
			}

			tablaSelector
			.addHead(variable)
			.setCells(0,i,this.filters[i]);

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
		dom.after(container);
		dom.remove();
		return this;
	}

	this.addClass = function(newClass){
		container.addClass(newClass);
		return this;
	}

	this.relize = function () {
		var filtr = this.filters2;
		this.addRowToChange.click(function(event) {
			console.log(upcall('personalActualizarByID',filtr));
			$.post('php/query.php',upcall('personalActualizarByID',filtr), function(data) {
				var DATA = $.parseJSON(data);
				if (dataE(DATA)) {
					notify.text('CAMBIO EXITOSO');
				}else {
					notify.text(dataR(DATA));
				}

				notify.css('opacity', '1').animate({opacity:0}, 2000);
			});
		});
	}

};

function listControlCG() {
	return new listControl();
}
