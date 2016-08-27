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
		var $nameMembers = $('#nameMembers');
		if($nameMembers.val().indexOf(leaderName)<0){

		$divLeaders.html($divLeaders.html() + '<span class="leader">' + leaderName + ' <span class="delLeader" name="' + leaderId + '" style="cursor: pointer;"><img src="../img/admin/delete.gif" /></span></span> <br />');
		
		$nameLeaders.val($nameLeaders.val() + leaderName + '¤');
		$inputLeaders.val($inputLeaders.val() + leaderId + '-');
		}
		else
		showErrorMessage("Warning: In order to convert a member to a leader you need to remove the member from the members list first. Leaders are implied to be members.",10000);
	
		
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

var members;
members = new function(){
	var self = this;
	this.initMemberAutocomplete = function (){
		$('#member_autocomplete_input')
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
			}).result(self.addMember);

		$('#member_autocomplete_input').setOptions({
			extraParams: {
				excludeIds : self.getMemberIds()
			}
		});
	};

	this.getMemberIds = function()
	{
		if ($('#inputMembers').val() === undefined)
			return '';
		var ids = '';
		ids += $('#inputMembers').val().replace(/\\-/g,',').replace(/\\,$/,'');
		ids = ids.replace(/\,$/,'');
		
		return ids;		
	}

	this.addMember = function(event, data, formatted)
	{
		if (data == null)
			return false;
		var memberId = data[1];
		var memberName = data[0];
		
		var $divMembers = $('#divMembers');
		var $inputMembers = $('#inputMembers');
		var $nameMembers = $('#nameMembers');
		var $nameLeaders = $('#nameLeaders');
		if($nameLeaders.val().indexOf(memberName)<0){
		$divMembers.html($divMembers.html() + '<span class="member">' + memberName + ' <span class="delMember" name="' + memberId + '" style="cursor: pointer;"><img src="../img/admin/delete.gif" /></span></span> <br />');
		
		$nameMembers.val($nameMembers.val() + memberName + '¤');
		$inputMembers.val($inputMembers.val() + memberId + '-');
		}
		else
		showErrorMessage("Warning: There is no need to add a leader as a member. Leaders are implied to be members.",10000);
	
		$('#member_autocomplete_input').val('');
		$('#member_autocomplete_input').setOptions({
			extraParams: {excludeIds : self.getMemberIds()}
		});
		};

	this.delMember = function(id)
	{
		var div = getE('divMembers');
		var input = getE('inputMembers');
		var name = getE('nameMembers');

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
				div.innerHTML += '<span class="member">' + nameCut[i] + ' <span class="delMember" name="' + inputCut[i] + '" style="cursor: pointer;"><img src="../img/admin/delete.gif" /></span></span> <br />';
			}
			else
				$('#selectMember').append('<option selected="selected" value="' + inputCut[i] + '-' + nameCut[i] + '">' + inputCut[i] + ' - ' + nameCut[i] + '</option>');
		}

		$('#member_autocomplete_input').setOptions({
			extraParams: {excludeIds : self.getMemberIds()}
		});
	};

	this.onReady = function(){
		var input = getE('inputMembers');
		var name = getE('nameMembers');
		var input_from_db = getE('memberIdsFromDb');
		var name_from_db = getE('memberNamesFromDb');
		input.value = input_from_db.value;
		name.value = name_from_db.value;
			
		self.initMemberAutocomplete();
		$('#divMembers').delegate('.delMember', 'click', function(){
			self.delMember($(this).attr('name'));
		});
	};
}

var associated;
associated = new function(){
	var self = this;
	this.initAssociatedAutocomplete = function (){
		$('#associated_autocomplete_input')
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
			}).result(self.addAssociated);

		$('#associated_autocomplete_input').setOptions({
			extraParams: {
				excludeIds : self.getAssociatedIds()
			}
		});
	};

	this.getAssociatedIds = function()
	{
		if ($('#inputAssociated').val() === undefined)
			return '';
		var ids = '';
		ids += $('#inputAssociated').val().replace(/\\-/g,',').replace(/\\,$/,'');
		ids = ids.replace(/\,$/,'');
		
		return ids;		
	}

	this.addAssociated = function(event, data, formatted)
	{
		if (data == null)
			return false;
		var associatedId = data[1];
		var associatedName = data[0];
		
		var $divAssociated = $('#divAssociated');
		var $inputAssociated = $('#inputAssociated');
		var $nameAssociated = $('#nameAssociated');

		$divAssociated.html($divAssociated.html() + '<span class="associated">' + associatedName + ' <span class="delAssociated" name="' + associatedId + '" style="cursor: pointer;"><img src="../img/admin/delete.gif" /></span></span> <br />');
		
		$nameAssociated.val($nameAssociated.val() + associatedName + '¤');
		$inputAssociated.val($inputAssociated.val() + associatedId + '-');
		$('#associated_autocomplete_input').val('');
		$('#associated_autocomplete_input').setOptions({
			extraParams: {excludeIds : self.getAssociatedIds()}
		});
	};

	this.delAssociated = function(id)
	{
		var div = getE('divAssociated');
		var input = getE('inputAssociated');
		var name = getE('nameAssociated');

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
				div.innerHTML += '<span class="associated">' + nameCut[i] + ' <span class="delAssociated" name="' + inputCut[i] + '" style="cursor: pointer;"><img src="../img/admin/delete.gif" /></span></span> <br />';
			}
			else
				$('#selectAssociated').append('<option selected="selected" value="' + inputCut[i] + '-' + nameCut[i] + '">' + inputCut[i] + ' - ' + nameCut[i] + '</option>');
		}

		$('#associated_autocomplete_input').setOptions({
			extraParams: {excludeIds : self.getAssociatedIds()}
		});
	};

	this.onReady = function(){
		var input = getE('inputAssociated');
		var name = getE('nameAssociated');
		var input_from_db = getE('associatedIdsFromDb');
		var name_from_db = getE('associatedNamesFromDb');
		
		input.value = input_from_db.value;
		name.value = name_from_db.value;
			
		self.initAssociatedAutocomplete();
		$('#divAssociated').delegate('.delAssociated', 'click', function(){
			self.delAssociated($(this).attr('name'));
		});
	};
}

$(document).ready(function() {
	leaders.onReady();
	members.onReady();
	associated.onReady();
});

