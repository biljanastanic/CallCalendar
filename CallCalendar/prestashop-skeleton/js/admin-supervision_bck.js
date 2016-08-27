var supervision_main;
supervision_main = new function(){
	var self = this;
	this.initMainSupervisionAutocomplete = function (){
		$('#main_supervision_autocomplete_input')
			.autocomplete('ajax_customers_list.php', {
				minChars: 1,
				autoFill: true,
				max:20,
				matchContains: true,
				mustMatch:true,
				scroll:false,
				cacheLength:0,
				formatItem: function(item) {
					return item[1]+' - '+item[0];
				}
			}).result(self.addMainSupervision);

		$('#main_supervision_autocomplete_input').setOptions({
			extraParams: {
				excludeIds : self.getMainSupervisionIds()
			}
		});
	};

	this.getMainSupervisionIds = function()
	{
		if ($('#inputMainSupervision').val() === undefined)
			return '';
		var id_supervisor = $('#id_supervisor').val();
		var ids = id_supervisor + '-';
		ids += $('#inputMainSupervision').val().replace(/\\-/g,',').replace(/\\,$/,'');
		ids = ids.replace(/\,$/,'');
		
		return ids;		
	}

	this.addMainSupervision = function(event, data, formatted)
	{
		if (data == null)
			return false;
		var studentId = data[1];
		var studentName = data[0];
		
		var $divMainSupervision = $('#divMainSupervision');
		var $inputMainSupervision = $('#inputMainSupervision');
		var $nameMainSupervision = $('#nameMainSupervision');

		$divMainSupervision.html($divMainSupervision.html() + '<span class="mainSupervisionStudent">' + studentName + ' <span class="delMainSupervision" name="' + studentId + '" style="cursor: pointer;"><img src="../img/admin/delete.gif" /></span></span> <br />');
		
		$nameMainSupervision.val($nameMainSupervision.val() + studentName + '¤');
		$inputMainSupervision.val($inputMainSupervision.val() + studentId + '-');
		$('#main_supervision_autocomplete_input').val('');
		$('#main_supervision_autocomplete_input').setOptions({
			extraParams: {excludeIds : self.getMainSupervisionIds()}
		});
	};

	this.delMainSupervision = function(id)
	{
		var div = getE('divMainSupervision');
		var input = getE('inputMainSupervision');
		var name = getE('nameMainSupervision');

		// Cut hidden fields in array
		var inputCut = input.value.split('-');
		var nameCut = name.value.split('¤');

		if (inputCut.length != nameCut.length)
			return jAlert('Bad size');

		// Reset all hidden fields
		input.value = '';
		name.value = '';
		div.innerHTML = '';
		for (i in inputCut)
		{
			// If empty, error, next
			if (!inputCut[i] || !nameCut[i])
				continue ;

			// Add to hidden fields no selected products OR add to select field selected product
			if (inputCut[i] != id)
			{
				input.value += inputCut[i] + '-';
				name.value += nameCut[i] + '¤';
				div.innerHTML += '<span class="mainSupervisionStudent">' + nameCut[i] + ' <span class="delMainSupervision" name="' + inputCut[i] + '" style="cursor: pointer;"><img src="../img/admin/delete.gif" /></span></span> <br />';
			}
			else
				$('#selectMainSupervision').append('<option selected="selected" value="' + inputCut[i] + '-' + nameCut[i] + '">' + inputCut[i] + ' - ' + nameCut[i] + '</option>');
		}

		$('#main_supervision_autocomplete_input').setOptions({
			extraParams: {excludeIds : self.getMainSupervisionIds()}
		});
	};

	this.onReady = function(){
		var input = getE('inputMainSupervision');
		var name = getE('nameMainSupervision');
		var input_from_db = getE('mainSupervisionStudentIdsFromDb');
		var name_from_db = getE('mainSupervisionStudentNamesFromDb');
		input.value = input_from_db.value;
		name.value = name_from_db.value;
			
		self.initMainSupervisionAutocomplete();
		$('#divMainSupervision').delegate('.delMainSupervision', 'click', function(){
			self.delMainSupervision($(this).attr('name'));
		});
	};
}

var supervision_assistant;
supervision_assistant = new function(){
	var self = this;
	this.initAssistantSupervisionAutocomplete = function (){
		$('#assistant_supervision_autocomplete_input')
			.autocomplete('ajax_customers_list.php', {
				minChars: 1,
				autoFill: true,
				max:20,
				matchContains: true,
				mustMatch:true,
				scroll:false,
				cacheLength:0,
				formatItem: function(item) {
					return item[1]+' - '+item[0];
				}
			}).result(self.addAssistantSupervision);

		$('#assistant_supervision_autocomplete_input').setOptions({
			extraParams: {
				excludeIds : self.getAssistantSupervisionIds()
			}
		});
	};

	this.getAssistantSupervisionIds = function()
	{
		if ($('#inputAssistantSupervision').val() === undefined)
			return '';
		var id_supervisor = $('#id_supervisor').val();
		var ids = id_supervisor + '-';
		ids += $('#inputAssistantSupervision').val().replace(/\\-/g,',').replace(/\\,$/,'');
		ids = ids.replace(/\,$/,'');
		
		return ids;		
	}

	this.addAssistantSupervision = function(event, data, formatted)
	{
		if (data == null)
			return false;
		var studentId = data[1];
		var studentName = data[0];
		
		var $divAssistantSupervision = $('#divAssistantSupervision');
		var $inputAssistantSupervision = $('#inputAssistantSupervision');
		var $nameAssistantSupervision = $('#nameAssistantSupervision');

		$divAssistantSupervision.html($divAssistantSupervision.html() + '<span class="assistantSupervisionStudent">' + studentName + ' <span class="delAssistantSupervision" name="' + studentId + '" style="cursor: pointer;"><img src="../img/admin/delete.gif" /></span></span><br />');
		
		$nameAssistantSupervision.val($nameAssistantSupervision.val() + studentName + '¤');
		$inputAssistantSupervision.val($inputAssistantSupervision.val() + studentId + '-');
		$('#assistant_supervision_autocomplete_input').val('');
		$('#assistant_supervision_autocomplete_input').setOptions({
			extraParams: {excludeIds : self.getAssistantSupervisionIds()}
		});
	};

	this.delAssistantSupervision = function(id)
	{
		var div = getE('divAssistantSupervision');
		var input = getE('inputAssistantSupervision');
		var name = getE('nameAssistantSupervision');

		// Cut hidden fields in array
		var inputCut = input.value.split('-');
		var nameCut = name.value.split('¤');

		if (inputCut.length != nameCut.length)
			return jAlert('Bad size');

		// Reset all hidden fields
		input.value = '';
		name.value = '';
		div.innerHTML = '';
		for (i in inputCut)
		{
			// If empty, error, next
			if (!inputCut[i] || !nameCut[i])
				continue ;

			// Add to hidden fields no selected products OR add to select field selected product
			if (inputCut[i] != id)
			{
				input.value += inputCut[i] + '-';
				name.value += nameCut[i] + '¤';
				div.innerHTML += '<span class="assistantSupervisionStudent">' + nameCut[i] + ' <span class="delAssistantSupervision" name="' + inputCut[i] + '" style="cursor: pointer;"><img src="../img/admin/delete.gif" /></span></span> <br />';
			}
			else
				$('#selectAssistantSupervision').append('<option selected="selected" value="' + inputCut[i] + '-' + nameCut[i] + '">' + inputCut[i] + ' - ' + nameCut[i] + '</option>');
		}

		$('#assistant_supervision_autocomplete_input').setOptions({
			extraParams: {excludeIds : self.getAssistantSupervisionIds()}
		});
	};

	this.onReady = function(){
		var input = getE('inputAssistantSupervision');
		var name = getE('nameAssistantSupervision');
		var input_from_db = getE('assistantSupervisionStudentIdsFromDb');
		var name_from_db = getE('assistantSupervisionStudentNamesFromDb');
		input.value = input_from_db.value;
		name.value = name_from_db.value;
			
		self.initAssistantSupervisionAutocomplete();
		$('#divAssistantSupervision').delegate('.delAssistantSupervision', 'click', function(){
			self.delAssistantSupervision($(this).attr('name'));
		});
	};
}

var multi_positions;
multi_positions = new function(){
	var self = this;
	this.initMultiPositions = function (){
	//var mps=getE('multi_positions_select');
		//mps.onChange=
		$('#multi_positions_select').change(function (){
		var mps=getE('multi_positions_select');
		self.addPosition(mps.options[mps.selectedIndex],mps.selectedIndex);
		mps.selectedIndex=0;
		});
		$('#divMultiplePositions').delegate('.delPosition', 'click', function(){
			self.delPosition($(this).attr('name'));
		});
	};

	this.addPosition = function(element,ind)
	{
		if (!element || ind<1)
			return false;
			
		var positionId = element.value;
		var positionName = element.label;
		
		var divMultiplePositions = getE('divMultiplePositions');
		var inputMultiplePositions = getE('inputMultiplePositions');
		var nameMultiplePositions = getE('nameMultiplePositions');
		
		if(inputMultiplePositions.value=='-')inputMultiplePositions.value='';
		var inputCut = inputMultiplePositions.value.split('-');
		
		var next_element=inputCut.length-1;
		var string_name=positionId+'_'+next_element;

		divMultiplePositions.innerHTML+= '<span class="customerPosition">' 
		+'<table width="600px"><tr  width="100%"><td  width="20%">'+positionName +'</td>' 
		+'<td  width="5%" align="center"><input type="checkbox"  name="externalStatus'+ string_name+'" id="externalStatus'+string_name+'" onchange="organisationPosition'+string_name+'.disabled=!this.checked;if(this.checked)this.value=1;else this.value=0;" value="0"/> </td>'
		+'<td  width="20%"> <input type="text" style="width:80px;" name="startDatePosition'+ string_name+'" id="startDatePosition'+string_name+'"/></td>'
		+'<td  width="20%"> <input type="text" style="width:80px;" name="endDatePosition'+ string_name+'" id="endDatePosition'+ string_name+'"/></td>'
		+'<td  width="30%"><input type="text"  name="organisationPosition'+ string_name+'" id="organisationPosition'+string_name+'" disabled="externalStatus'+string_name+'.checked" style="width:90%"/> </td>'
		+'<td  width="5%"> <span class="delPosition" name="' + string_name + '" style="cursor: pointer;"><img src="../img/admin/delete.gif" /></span></td></tr></table></span>';
		
		nameMultiplePositions.value+= positionName + '¤';
		inputMultiplePositions.value+= positionId + '-';
	};

	
this.delPosition= function(idd)
	{
		var div = getE('divMultiplePositions');
		var input = getE('inputMultiplePositions');
		var name = getE('nameMultiplePositions');
		/*var ext = getE('externalMultiplePositions');
		var startDate = getE('startMultiplePositions');
		var endDate = getE('endMultiplePositions');
		var org = getE('organisationMultiplePositions');
	
		ext= '';
		org= '';
		endDate= '';
		startDate= '';
		*/
		var id_split=idd.split('_');
		
		// Cut hidden fields in array
		var inputCut = input.value.split('-');
		var nameCut = name.value.split('¤');
		
		var extCut = new Array();
		var startCut = new Array();
		var endCut = new Array();
		var orgCut = new Array();
		
		for(var ii=0;ii<inputCut.length;ii++)
		{
		extCut[ii]= $("#externalStatus"+inputCut[ii]+'_'+ii).attr("checked");
		startCut[ii]= $("#startDatePosition"+inputCut[ii]+'_'+ii).val();
		endCut[ii]= $("#endDatePosition"+inputCut[ii]+'_'+ii).val();
		orgCut[ii]= $("#organisationPosition"+inputCut[ii]+'_'+ii).val();
		}

		console.log(inputCut);
		console.log(nameCut);
		console.log(extCut);
		console.log(startCut);
		console.log(endCut);

		/*var extCut = ext.value.split('¤');
		var startCut = startDate.value.split('¤');
		var endCut = endDate.value.split('¤');
		var orgCut = org.value.split('¤');
		
		if (inputCut.length != nameCut.length || extCut.length != nameCut.length || startCut.length != nameCut.length || endCut.length != nameCut.length || orgCut.length != nameCut.length)
*/
	if (inputCut.length != nameCut.length)
			return jAlert('Bad size');

		// Reset all hidden fields
		input.value = '';
		name.value = '';
		/*ext= '';
		org= '';
		endDate= '';
		startDate= '';*/
		div.innerHTML = '';
		
		//$("#positionTable"+idd).remove();
					var j=0;

		for (var i=0;i<inputCut.length;i++)
		{
			// If empty, error, next
			if (!inputCut[i] || !nameCut[i])
				continue ;
			
			// add all previous values except the deleted one
			if (i != id_split[1])
			{
				input.value += inputCut[i] + '-';
				name.value += nameCut[i] + '¤';
				/*ext.value= extCut[i]+ '¤';
				org.value= orgCut[i]+ '¤';
				endDate.value= endCut[i]+ '¤';
				startDate.value= startCut[i]+ '¤';*/
				var string_name=inputCut[i] + '_'+j;
				div.innerHTML += '<span class="customerPosition">' 
		+'<table width="600px"><tr  width="100%"><td  width="20%">'+nameCut[i] +'</td>' 
		+'<td  width="5%" align="center"><input type="checkbox"  name="externalStatus'+ string_name+'" id="externalStatus'+string_name+'" onchange="organisationPosition'+string_name+'.disabled=!this.checked;if(this.checked)this.value=1;else this.value=0;" '+(extCut[i]?'checked="true"':'')+'/> </td>'
		+'<td  width="20%"> <input type="text" style="width:80px;" name="startDatePosition'+ string_name+'" id="startDatePosition'+string_name+'" value="'+startCut[i]+'"/></td>'
		+'<td  width="20%"> <input type="text" style="width:80px;" name="endDatePosition'+ string_name+'" id="endDatePosition'+ string_name+'" value="'+endCut[i]+'"/></td>'
		+'<td  width="30%"><input type="text"  name="organisationPosition'+ string_name+'" id="organisationPosition'+string_name+'" value="'+orgCut[i]+'"'+ (!extCut[i]?' disabled="true" ':'')+' style="width:90%"/> </td>'
		+'<td  width="5%"> <span class="delPosition" name="' + string_name + '" style="cursor: pointer;"><img src="../img/admin/delete.gif" /></span></td></tr></table></span>';

			j=j+1;
			}
			
		}

		for(var ii=0;ii<inputCut.length;ii++)
		{
		extCut[ii]= $("#externalStatus"+inputCut[ii]+'_'+ii).attr("checked");
		startCut[ii]= $("#startDatePosition"+inputCut[ii]+'_'+ii).val();
		endCut[ii]= $("#endDatePosition"+inputCut[ii]+'_'+ii).val();
		orgCut[ii]= $("#organisationPosition"+inputCut[ii]+'_'+ii).val();
		}
		console.log(inputCut);
		console.log(nameCut);
		console.log(extCut);
		console.log(startCut);
		console.log(endCut);
	};

}

$(document).ready(function() {
	supervision_main.onReady();
	supervision_assistant.onReady();
	multi_positions.initMultiPositions();
});

