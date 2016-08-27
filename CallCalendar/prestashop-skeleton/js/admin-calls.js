//javascript support for contact person field in calls
//code is used from admin-projects1/js

var leaders;
leaders = new function(){
	var self = this;
	this.initLeaderAutocomplete = function (){
		$('#leader_autocomplete_input')
			.autocomplete('ajax_customers_list.php', {
				minChars: 1,
				autoFill: true,
				max:20,
                matchContains: true,
				mustMatch:false,
                multiple:true,
				scroll:false,
				cacheLength:0,
				formatItem: function(item) {
					return item[1]+' - '+item[0];
				}
			}).result(self.addLeader);

		$('#leader_autocomplete_input').setOptions({
			extraParams: {
				excludeIds : self.getLeaderIds()
			}
		});
	};

	this.getLeaderIds = function()
	{
		if ($('#inputLeaders').val() === undefined)
			return '';
		var ids = '';
		ids += $('#inputLeaders').val().replace(/\\-/g,',').replace(/\\,$/,'');
		ids = ids.replace(/\,$/,'');
		
		return ids;		
	}

	this.addLeader = function(event, data, formatted)
	{
		if (data == null)
			return false;
		var leaderId = data[1];
		var leaderName = data[0];
		var $divLeaders = $('#divLeaders');
		var $inputLeaders = $('#inputLeaders');
		var $nameLeaders = $('#nameLeaders');
		

		$divLeaders.html($divLeaders.html() + '<span class="leader">' + leaderName + ' <span class="delLeader" name="' + leaderId + '" style="cursor: pointer;"><img src="../img/admin/delete.gif" /></span></span> <br />');
		
		$nameLeaders.val($nameLeaders.val() + leaderName + '¤');
		$inputLeaders.val($inputLeaders.val() + leaderId + '-');
	
		
		$('#leader_autocomplete_input').val('');
		$('#leader_autocomplete_input').setOptions({
			extraParams: {excludeIds : self.getLeaderIds()}
		});
	};

	this.delLeader = function(id)
	{
		var div = getE('divLeaders');
		var input = getE('inputLeaders');
		var name = getE('nameLeaders');

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
				div.innerHTML += '<span class="leader">' + nameCut[i] + ' <span class="delLeader" name="' + inputCut[i] + '" style="cursor: pointer;"><img src="../img/admin/delete.gif" /></span></span><br />';
			}
			else
				$('#selectLeaders').append('<option selected="selected" value="' + inputCut[i] + '-' + nameCut[i] + '">' + inputCut[i] + ' - ' + nameCut[i] + '</option>');
		}

		$('#leader_autocomplete_input').setOptions({
			extraParams: {excludeIds : self.getLeaderIds()}
		});
	};

	this.onReady = function(){
		var input = getE('inputLeaders');
		var name = getE('nameLeaders');
		var input_from_db = getE('leaderIdsFromDb');
		var name_from_db = getE('leaderNamesFromDb');
		input.value = input_from_db.value;
		name.value = name_from_db.value;
			
		self.initLeaderAutocomplete();
		$('#divLeaders').delegate('.delLeader', 'click', function(){
			self.delLeader($(this).attr('name'));
		});
	};
}



$(document).ready(function() {
	leaders.onReady();
});

