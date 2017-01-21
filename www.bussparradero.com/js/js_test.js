$(document).ready(function() {


	console.log('holas');


	var listedGenerate = function(){
		var container = etq('div').text('holas');
		this.getContainer = function () {
			return container;
		}
		this.import = function(class) {
			var importReplace = $('cgimport.'+class);
			importReplace.after(container);
			importReplace.remove();
		}
	}



	function etq(dom) {
		return $('<'+dom+'></'+dom+'>')
	}
});