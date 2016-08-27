<table>
	<tr>
		<td style="padding-bottom:5px;">
			<input type="hidden" id="id_partner" value="{$id_partner}" />
			<input type="hidden" name="inputPartnerContacts" id="inputPartnerContacts" value="{foreach from=$contacts item=contact}{$contact.id_customer}-{/foreach}" />
			<input type="hidden" name="namePartnerContacts" id="namePartnerContacts" value="{foreach from=$contacts item=contact}{$contact.firstname|escape:'htmlall':'UTF-8'} {$contact.lastname|escape:'htmlall':'UTF-8'}*{/foreach}" />
			<input type="hidden" name="contactIdsFromDb" id="contactIdsFromDb" value="{foreach from=$contacts item=contact}{$contact.id_customer}-{/foreach}" />
			<input type="hidden" name="contactNamesFromDb" id="contactNamesFromDb" value="{foreach from=$contacts item=contact}{$contact.firstname|escape:'htmlall':'UTF-8'} {$contact.lastname|escape:'htmlall':'UTF-8'}*{/foreach}" />
			
			<div id="ajax_choose_partner_contact">
				<p style="clear:both;margin-top:0;">
					<input type="text" value="" id="partner_contact_autocomplete_input" />
					{l s='Begin typing the first letters of the contact´s name, then select the contact from the drop-down list'}
				</p>
				<p class="preference_description">{l s='(Do not forget to save afterwards)'}</p>
			</div>
			<div id="divPartnerContacts">
				{foreach from=$contacts item=contact}
					<span class="partnerContact">{$contact.firstname|escape:'htmlall':'UTF-8'} {$contact.lastname|escape:'htmlall':'UTF-8'}
						<span class="delPartnerContact" name="{$contact.id_customer}" style="cursor: pointer;">
							<img src="../img/admin/delete.gif" class="middle" alt="" />
						</span>
						<br />
					</span>
				{/foreach}
			</div>
		</td>
	</tr>
</table>
			
			
			