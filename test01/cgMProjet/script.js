$(document).ready(function() {
	var varEdir = "";
	var varname = "";
	var vartype = "";

	var pnlGatget = cg.$('div').addClass('pnl_gatget').hide().appendTo($('body'));
	var pnlSetGatget = cg.$('div').addClass('pnl_setgatget').hide().appendTo($('body'));
	var add = cg.$('div').text('Add your Gatget').addClass('restore');
	var addGatget = cg.$('div')
	.addClass('addGatget restore')
	.append(add);

	var nameGatget = cg.input().input('label').addClass('restore');

	pnlSetGatget.append(
		cg.$('div').addClass('n_bodyGatget_p'),
		cg.$('div').addClass('n_settingsGatget_p').append(
			cg.$('button').addClass('btn_close restore').text('Close Panel'),
			cg.$('button').addClass('btn_save restore').text('Save Changes'),
			nameGatget.dom()
		)
	);

	pnlGatget.append(
		cg.$('div').addClass('n_bodyGatget_p'),
		cg.$('div').addClass('n_settingsGatget_p').append(
			cg.$('button').addClass('btn_close restore').text('Close Panel'),
			cg.$('button').addClass('btn_save restore').text('Add Gatget')
		)
	);
	pnlGatget.find('.btn_close').click(function(event) {
		pnlGatget.hide();
	});

	pnlSetGatget.find('.btn_save').click(function(event) {
		var exportVars = "";
		pnlSetGatget.find('div.n_bodyGatget_p').find('div.varEdit').each(function(i, s) {
			var sel = $(s);
			var variable = sel.find('> div').text();
			var value = sel.find('> textarea').val();
			value = value.replace(/\n/g,"<br>");
			exportVars += "cg.obj."+vartype+"."+varname+"."+variable+"(\""+value+"\");"+"\n";
		});
		$.post('cgMProjet/query.php',{fn: cg.fn('editVarGatgets',[varEdir,exportVars])}, function(data) {
			console.log(data);
		});
	});
	pnlSetGatget.find('.btn_close').click(function(event) {
		pnlSetGatget.hide();
	});


	$('.cgObjet').each(function (i,s) {
		var sel = $(s);
		var name = sel.attr('cggname');
		var type = sel.attr('cggtype');

		var notEdit = ['container','dom','appendTo','prependTo','addClass'];
		sel.append(cg.$('div').text('name: '+name+' typeObj: '+type).addClass('restore editGatget')).click(function (event) {
			pnlSetGatget.show();
			pnlSetGatget.find('div.n_bodyGatget_p').empty();
			varname = name;
			vartype = type;

			nameGatget.text(type + "." + name);

			varEdir = type + "." + name + ".cgM";

			for (var i in cg.obj[type][name]) {
				if (notEdit.indexOf(i) === -1) {
					var value = cg.obj[type][name][i]();
					value = value.replace(/(<br>|<\/br>)/g,"\n");
					pnlSetGatget.find('div.n_bodyGatget_p').append(
						cg.$('div').addClass('varEdit').append(
							cg.$('div').text(i).addClass('restore'),
							cg.$('textarea').addClass('restore').attr('rows', '1').text(value)
						)
					);
				}
			}
		});
	});

	function addComponent(selc,type,name,variable) {
		selc.empty().append(cg.$('div').text(variable));
	}
	add.click(function(event) {
		//$(this).parent().parent().append(cg.$('div').text('some text').addClass('restore'));
		pnlGatget.show();
	});
	$('div.n_panel_p').prepend(addGatget);
	$('div.n_panel_a').prepend(
		cg.$('div').addClass('restore contentPage').text('Content Page')
	);
});
