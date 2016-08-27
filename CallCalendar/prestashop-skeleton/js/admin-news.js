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
				mustMatch:true,
				scroll:false,
                multiple:true,
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


$( document ).ready(function() {
	news_contact.onReady();
});