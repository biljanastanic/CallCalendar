var partners_automcomplete;
partners_automcomplete = new function(){
	var self = this;
	this.initPartnersAutocomplete = function (){
		$('#name_1')
			.autocomplete('ajax_partners_list.php', {
				minChars: 1,
				autoFill: false,
				max:20,
				matchContains: true,
				mustMatch:false,
				scroll:true,
				cacheLength:0,
				formatItem: function(item) {
					return item[1]+' - '+item[0];
				}
			}).result();;

	};

	this.onReady = function(){
		self.initPartnersAutocomplete();
	};
}

var partner_contacts;
partner_contacts = new function(){
	var self = this;
	this.initPartnerContactsAutocomplete = function (){
		$('#partner_contact_autocomplete_input')
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
			}).result(self.addPartnerContact);

		$('#partner_contact_autocomplete_input').setOptions({
			extraParams: {
				excludeIds : self.getContactIds()
			}
		});
	};

	this.getContactIds = function()
	{
		if ($('#inputPartnerContacts').val() === undefined)
			return '';
		var ids = '';
		ids += $('#inputPartnerContacts').val().replace(/\\-/g,',').replace(/\\,$/,'');
		ids = ids.replace(/\,$/,'');
		
		return ids;		
	}

	this.addPartnerContact = function(event, data, formatted)
	{
		if (data == null)
			return false;
		var contactId = data[1];
		var contactName = data[0];
		
		var $divPartnerContacts = $('#divPartnerContacts');
		var $inputPartnerContacts = $('#inputPartnerContacts');
		var $namePartnerContacts = $('#namePartnerContacts');

		$divPartnerContacts.html($divPartnerContacts.html() + '<span class="partnerContact">' + contactName + ' <span class="delPartnerContact" name="' + contactId + '" style="cursor: pointer;"><img src="../img/admin/delete.gif" /></span></span> <br />');
		
		$namePartnerContacts.val($namePartnerContacts.val() + contactName + '*');
		$inputPartnerContacts.val($inputPartnerContacts.val() + contactId + '-');
		$('#partner_contact_autocomplete_input').val('');
		$('#partner_contact_autocomplete_input').setOptions({
			extraParams: {excludeIds : self.getContactIds()}
		});
	};

	this.delPartnerContact = function(id)
	{
		var div = getE('divPartnerContacts');
		var input = getE('inputPartnerContacts');
		var name = getE('namePartnerContacts');

		// Cut hidden fields in array
		var inputCut = input.value.split('-');
		var nameCut = name.value.split('*');

		if (inputCut.length != nameCut.length)
			return jAlert('Bad size'+input.value+ "--"+ name.value);

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
				name.value += nameCut[i] + '*';
				div.innerHTML += '<span class="partnerContact">' + nameCut[i] + ' <span class="delPartnerContact" name="' + inputCut[i] + '" style="cursor: pointer;"><img src="../img/admin/delete.gif" /></span></span> <br />';
			}
			//else
			//	$('#selectPartnerContacts').append('<option selected="selected" value="' + inputCut[i] + '-' + nameCut[i] + '">' + inputCut[i] + ' - ' + nameCut[i] + '</option>');
		}

		$('#partner_contact_autocomplete_input').setOptions({
			extraParams: {excludeIds : self.getContactIds()}
		});
	};

	this.onReady = function(){
		var input = getE('inputPartnerContacts');
		var name = getE('namePartnerContacts');
		var input_from_db = getE('contactIdsFromDb');
		var name_from_db = getE('contactNamesFromDb');
		input.value = input_from_db.value;
		name.value = name_from_db.value;
			
		self.initPartnerContactsAutocomplete();
		$('#divPartnerContacts').delegate('.delPartnerContact', 'click', function(){
			self.delPartnerContact($(this).attr('name'));
		});
	};
}


$(document).ready(function() {
	partners_automcomplete.onReady();
	partner_contacts.onReady();
});

