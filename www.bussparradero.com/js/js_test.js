$(document).ready(function() {

	/*listarPersonal();
	agregarPersonal();
	listarSucursal();
	agregarSucursal();
	listarBuses();
	agregarBuses();*/
	listarDestino();
	agregarDestino();
});
function listarDestino() {
	var listDest = listControlCG()
	.import($('cgimt.listarDestino'))
	.setFirstFilter({'ESTADO':'select','PLACA DEL BUSS':'select','COD. DESTINO':'select'})
	.setSecondFilter({'ESTADO':'select','COD. DESTINO':'option'})
	.setTitle('LISTAR DESTINOS')
	.addClass('lister');
	listDest.dataViews[0].import(listDest.tablaList).hideColums(['estado','sucursal_origen','sucursal_destino']);

	dataListas(upcall('destinosbusesListarByID',listDest.filters),listDest.listViews[0],'estado','ESTADO',listDest.filters[0],function () {
		dataListas(upcall('destinosbusesListarByID',listDest.filters),listDest.listViews[1],'placa_bus','placa_bus',listDest.filters[1],function () {
			dataListas(upcall('destinosbusesListarByID',listDest.filters),listDest.listViews[2],'cod_destino','cod_destino',listDest.filters[2],function () {
				dataTablas2(upcall('destinosbusesListarByID',listDest.filters),listDest.dataViews[0],function () {
					if (listDest.dataViews[0].getContainer().find('tr').length ===2) {
						listDest.addRowToChange.css('display', 'initial');
						listDest.getTableAlter().getContainer().css('display', 'table');
					}
					else {
						listDest.addRowToChange.css('display', 'none');
						listDest.getTableAlter().getContainer().css('display', 'none');
					}
					listDest.filters2[1]
					.val(listDest.dataViews[0].getCells(0,'cod_destino'))
					.text(listDest.dataViews[0].getCells(0,'cod_destino'))
					;
				});
			});
		});
	});
	dataListas(callP('estadoListarByID',['%','GRAL']),listDest.listViews2[0],'estado','nombre',listDest.filters2[0]);


	listDest.realize('destinosbusesActualizarByID');

}
function agregarDestino() {
	var addDest = newControlCG()
	.import($('cgimt.agregarDestino'))
	.addClass('added')
	.setTitle('AGREGAR DESTINO')
	.setFilter({'PLACA DEL BUS':'select','SUCURSAL A':'select','SUCURSAL B':'select','ESTADO':'select'})
	;

	dataListas(callP('busesListarByID',['%','ACT','%']),addDest.listViews[0],'placa','placa',addDest.filters[0]);
	dataListas(callP('sucursalListarByID',['ACT','%']),addDest.listViews[1],'sucursal','nombre',addDest.filters[1]);
	dataListas(callP('sucursalListarByID',['ACT','%']),addDest.listViews[2],'sucursal','nombre',addDest.filters[2]);
	dataListas(callP('estadoListarByID',['%','GRAL']),addDest.listViews[3],'estado','nombre',addDest.filters[3]);

	addDest.realize('destinosbusesAgregar');
}

function listarSucursal() {
	var listSucur = listControlCG()
	.import($('cgimt.listarSucursal'))
	.setFirstFilter({'ESTADO':'select','SUCURSAL':'select'})
	.setSecondFilter({'GERENTE':'select','ESTADO':'select','SUCURSAL':'input'})
	.setTitle('LISTAR SUCURSAL')
	.addClass('lister');
	listSucur.dataViews[0].import(listSucur.tablaList);


	dataListas(upcall('sucursalListarByID',listSucur.filters),listSucur.listViews[0],'estado','ESTADO',listSucur.filters[0],function () {
		dataListas(upcall('sucursalListarByID',listSucur.filters),listSucur.listViews[1],'sucursal','nombre',listSucur.filters[1],function () {
			dataTablas2(upcall('sucursalListarByID',listSucur.filters),listSucur.dataViews[0],function () {
				if (listSucur.dataViews[0].getContainer().find('tr').length ===2) {
					listSucur.addRowToChange.css('display', 'initial');
					listSucur.getTableAlter().getContainer().css('display', 'table');
				}
				else {
					listSucur.addRowToChange.css('display', 'none');
					listSucur.getTableAlter().getContainer().css('display', 'none');
				}
				listSucur.filters2[2]
				.val(listSucur.dataViews[0].getCells(0,0))
				.text(listSucur.dataViews[0].getCells(0,2))
				;
			});
		});
	});

	listSucur.realize('sucursalActualizarByID');
}
function agregarSucursal() {
	var addSucur = newControlCG();
	addSucur
	.import($('cgimt.agregarSucursal'))
	.addClass('added')
	.setTitle('AGREGAR SUCURSAL')
	.setFilter({'CODIGO SUCURSAL':'input','UBICACION':'input','GERENTE A CARGO':'select','ESTADO':'select'})
	;

	dataListas(callP('personalListarByID',['ADMT','ACT','SSCR','%']),addSucur.listViews[0],'DNI','nombre_completo',addSucur.filters[2]);
	dataListas(callP('estadoListarByID',['%','GRAL']),addSucur.listViews[1],'estado','nombre',addSucur.filters[3]);
	addSucur.realize('sucursalAgregar');
}

function listarBuses() {
	var listBus = listControlCG()
	.import($('cgimt.listarBuses'))
	.setFirstFilter({'TIPO':'select','ESTADO':'select','PLACA DEL BUS':'select'})
	.setSecondFilter({'ESTADO':'select','PLACA DEL BUS':'input'})
	.setTitle('LISTAR BUSES')
	.addClass('lister');
	listBus.dataViews[0].import(listBus.tablaList);

	dataListas({procedure:call('estadoListarByID',['%','GRAL'])},listBus.listViews2[0],'estado','nombre',listBus.filters2[0]);

	dataListas(upcall('busesListarByID',listBus.filters),listBus.listViews[0],'tipo','TIPO',listBus.filters[0],function () {
		dataListas(upcall('busesListarByID',listBus.filters),listBus.listViews[1],'estado','ESTADO BUS',listBus.filters[1],function () {
			dataListas(upcall('busesListarByID',listBus.filters),listBus.listViews[2],'placa','placa',listBus.filters[2],function () {
				dataTablas2(upcall('busesListarByID',listBus.filters),listBus.dataViews[0],function () {
					if (listBus.dataViews[0].getContainer().find('tr').length ===2) {
						listBus.addRowToChange.css('display', 'initial');
						listBus.getTableAlter().getContainer().css('display', 'table');
					}
					else {
						listBus.addRowToChange.css('display', 'none');
						listBus.getTableAlter().getContainer().css('display', 'none');
					}
					listBus.filters2[1]
					.val(listBus.dataViews[0].getCells(0,0))
					.text(listBus.dataViews[0].getCells(0,0));
				});
			});
		});
	});
	//sp_buses_Listar_ByID
	listBus.realize('busesActualizarByID');

}
function agregarBuses() {
	var addBus = newControlCG();
	addBus
	.import($('cgimt.agregarBuses'))
	.addClass('added')
	.setTitle('AGREGAR BUSES')
	.setFilter({'TIPO BUS':'select','AFORO PISO 1':'input','AFORO PISO 2':'input','PLACA DEL BUS':'input','ESTADO':'select'})
	;

	addBus.filters[0].append(optionCG(1,'1R PISO')).append(optionCG(2,'2DO PISO'));
	dataListas(callP('estadoListarByID',['%','GRAL']),addBus.listViews[1],'estado','nombre',addBus.filters[4]);
	addBus.realize('busesAgregar');
}

function listarPersonal() {
	var listPer = listControlCG()
	.import($('cgimt.listarPersonal'))
	.setFirstFilter({'AREA DE TRABAJO':'select','ESTADO DE LABOR':'select','ESTADO':'select','DNI':'select'})
	.setSecondFilter({'AREA DE TRABAJO':'select','ESTADO':'select','ESTADO DE LABOR':'select','DNI':'input'})
	.setTitle('LISTAR PERSONAL')
	.addClass('lister');
	listPer.dataViews[0].import(listPer.tablaList);
	listPer.dataViews[0].hideColums(['area_trabajo','estado','categoria','estado_categoria']);

	dataListas({procedure:call('areatrabajoListar',[])},listPer.listViews2[0],'area_trabajo','nombre',listPer.filters2[0]);
	dataListas({procedure:call('estadoListarByID',['%','GRAL'])},listPer.listViews2[1],'estado','nombre',listPer.filters2[1]);

	dataListas(upcall('personalListarByID',listPer.filters),listPer.listViews[0],'area_trabajo','AREA TRABAJO',listPer.filters[0],function () {
		dataListas(upcall('personalListarByID',listPer.filters),listPer.listViews[1],'estado','ESTADO',listPer.filters[1],function () {
			dataListas(upcall('personalListarByID',listPer.filters),listPer.listViews[2],'estado_categoria','ESTADO LABOR',listPer.filters[2],function () {
				dataListas(upcall('personalListarByID',listPer.filters),listPer.listViews[3],'DNI','DNI',listPer.filters[3],function () {
					dataTablas2(upcall('personalListarByID',listPer.filters),listPer.dataViews[0],function () {
						if (listPer.dataViews[0].getContainer().find('tr').length ===2) {
							listPer.addRowToChange.css('display', 'initial');
							listPer.getTableAlter().getContainer().css('display', 'table');
							dataListas(
								{procedure:call('estadoListarByID',['%',listPer.dataViews[0].getCells(0,2)])},
								listPer.listViews2[2],'estado','nombre',listPer.filters2[2]
							);

						}else {
							listPer.addRowToChange.css('display', 'none');
							listPer.getTableAlter().getContainer().css('display', 'none');
						}
						listPer.filters2[3]
						.val(listPer.dataViews[0].getCells(0,3))
						.text(listPer.dataViews[0].getCells(0,3))
						;

					});
				});
			});
		});
	});

	listPer.realize('personalActualizarByID');
}
function agregarPersonal() {
	var addPer = newControlCG();
	addPer
	.import($('cgimt.agregarPersonal'))
	.addClass('added')
	.setTitle('AGREGAR PERSONAL')
	.setFilter({'NOMBRES':'input','APELLIDOS':'input','AREA DE TRABAJO':'select','DNI':'input',ESTADO:'select','ESTADO LABOR':'select'})
	;
	dataListas(callP('areatrabajoListar',[]),addPer.listViews[0],'area_trabajo','nombre',addPer.filters[2],function () {
		dataListas(callP('estadoListarByID',['%',addPer.filters[2].val()]),addPer.listViews[2],'estado','nombre',addPer.filters[5]);
	});
	dataListas(callP('estadoListarByID',['%','GRAL']),addPer.listViews[1],'estado','nombre',addPer.filters[4]);
	addPer.realize('personalAgregar');
	//area_trabajo_Listar
}

function callP(procedur,parametros) {
	return {procedure:call(procedur,parametros)};
}

var newControl = function () {
	var container = $etq('div');
	var title = $etq('div').addClass('titleListC').text('some text');
	var contentfilters = $etq('div');
	var notify = $etq('div').text('some text').addClass('notify');
	var contNtAndChange = $etq('div');
	this.filters = [];
	this.listViews = [];
	this.addRowToChange = $etq('button').text('REGISTRAR');


	container
	.append(title)
	.append(contentfilters)
	.append(contNtAndChange.append(this.addRowToChange).append(notify))
	.append($etq('div').css('clear', 'both'))
	;

	this.setFilter = function (filter) {
		console.log(filter);

		var i = 0;
		for (var variable in filter) {
			if (filter[variable] === 'select') {
				this.filters.push($etq('select'));
				this.listViews.push(listViewCG());
			}else {
				this.filters.push($etq('input').attr('type', 'text').attr('placeholder', 'Ingrese su texto'));
			}
			contentfilters.append(
				$etq('div').append($etq('div').text(variable)).append(this.filters[i])
			);
			i++;
		}


		return this;
	}

	this.setTitle = function(newTtile){
		title.text(newTtile);
		return this;
	};
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

	this.realize = function (callName) {
		var filtr = this.filters;
		this.addRowToChange.click(function(event) {
			console.log(upcall(callName,filtr));
			$.post('php/query.php',upcall(callName,filtr), function(data) {
				var DATA = $.parseJSON(data);
				if (dataE(DATA)) {
					notify.text('CAMBIO EXITOSO');
				}else {
					notify.text(dataP(DATA));
				}

				notify.css('opacity', '1').delay(2000).animate({opacity:0}, 1000);

			});
		});
	}
}
function newControlCG() {
	return new newControl();
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
				this.filters2.push($etq('option')
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

	this.realize = function (callName) {
		var filtr = this.filters2;
		this.addRowToChange.click(function(event) {
			console.log(upcall(callName,filtr));
			$.post('php/query.php',upcall(callName,filtr), function(data) {
				console.log(data);
				var DATA = $.parseJSON(data);
				if (dataE(DATA)) {
					notify.text('CAMBIO EXITOSO');
				}else {
					notify.text(dataP(DATA));
				}

				notify.css('opacity', '1').delay(2000).animate({opacity:0}, 1000);
			});
		});
	}

};
function listControlCG() {
	return new listControl();
}
