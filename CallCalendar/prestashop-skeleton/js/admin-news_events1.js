var news_contact;
news_contact = new function(){
	var self = this;
	this.initNewsContactAutocomplete = function (){
		$('#news_contact_autocomplete_input')
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
			}).result(self.addContact);
	};

	this.addContact = function(event, data, formatted)
	{
		if (data == null)
			return false;
		var contactId = data[1];
		var contactName = data[0];
		
		var $divNewsContact = $('#divNewsContact');
		var $id_contact = $('#id_contact');
		var $name_contact = $('#nameNewsContact');

		$divNewsContact.html('<span class="newsContact">' + contactName + ' <span class="delNewsContact" name="' + contactId + '" style="cursor: pointer;"><img src="../img/admin/delete.gif" /></span></span> <br />');
		
		$name_contact.val(contactName);
		$id_contact.val(contactId);
		$('#news_contact_autocomplete_input').val('');
	};

	this.delNewsContact = function(id)
	{
		var div = getE('divNewsContact');
		var input = getE('id_contact');
		var name = getE('nameNewsContact');

		// Reset all hidden fields
		input.value = '';
		name.value = '';
		div.innerHTML = '';
	};

	this.onReady = function(){
		self.initNewsContactAutocomplete();
		$('#divNewsContact').delegate('.delNewsContact', 'click', function(){
			self.delNewsContact($(this).attr('name'));
		});
	};
}

var event_speakers;
event_speakers = new function(){
	var self = this;
	this.initEventSpeakerAutocomplete = function (){
		$('#event_speaker_autocomplete_input')
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
			}).result(self.addSpeaker);

		$('#event_speaker_autocomplete_input').setOptions({
			extraParams: {
				excludeIds : self.getSpeakerIds()
			}
		});
	};

	this.getSpeakerIds = function()
	{
		if ($('#inputSpeakers').val() === undefined)
			return '';
		var ids = '';
		ids += $('#inputSpeakers').val().replace(/\\-/g,',').replace(/\\,$/,'');
		ids = ids.replace(/\,$/,'');
		
		return ids;		
	}

	this.addSpeaker = function(event, data, formatted)
	{
		if (data == null)
			return false;
		var speakerId = data[1];
		var speakerName = data[0];
		
		var $divSpeakers = $('#divEventSpeakers');
		var $inputSpeakers = $('#inputSpeakers');
		var $nameSpeakers = $('#nameSpeakers');
		$divSpeakers.html($divSpeakers.html() + '<span class="eventSpeaker">'+ speakerName + ' <span class="delEventSpeaker" name="' + speakerId + '" style="cursor: pointer;"><img src="../img/admin/delete.gif" /></span></span> <br />');
		
		$nameSpeakers.val($nameSpeakers.val() + speakerName + '_');
		$inputSpeakers.val($inputSpeakers.val() + speakerId + '-');
		$('#event_speaker_autocomplete_input').val('');
		$('#event_speaker_autocomplete_input').setOptions({
			extraParams: {excludeIds : self.getSpeakerIds()}
		});
	};

	this.delSpeaker = function(id)
	{
		var div = getE('divEventSpeakers');
		var input = getE('inputSpeakers');
		var speakerName = getE('nameSpeakers');

		// Cut hidden fields in array
		var inputCut = input.value.split('-');
		var nameCut = speakerName.value.split('_');

		if (inputCut.length != nameCut.length)
			return jAlert('Bad size');

		// Reset all hidden fields
		input.value = '';
		speakerName.value = '';
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
							
				speakerName.value += nameCut[i] + '_';
				div.innerHTML +='<span class="eventSpeaker">'+ nameCut[i] + ' <span class="delEventSpeaker" name="' + inputCut[i] + '" style="cursor: pointer;"><img src="../img/admin/delete.gif" /></span></span> <br />';
			}
			}

		$('#event_speaker_autocomplete_input').setOptions({
			extraParams: {excludeIds : self.getSpeakerIds()}
		});
	};
	
	
	this.onReady = function(){
		var input = getE('inputSpeakers');
		var name = getE('nameSpeakers');
		var input_from_db = getE('speakerIdsFromDb');
		var name_from_db = getE('speakerNamesFromDb');
		input.value = input_from_db.value;
		name.value = name_from_db.value;
			
		self.initEventSpeakerAutocomplete();
		$('#divEventSpeakers').delegate('.delEventSpeaker', 'click', function(){
			self.delSpeaker($(this).attr('name'));
		});
	};
}

$( document ).ready(function() {
	news_contact.onReady();
	event_speakers.onReady();
});