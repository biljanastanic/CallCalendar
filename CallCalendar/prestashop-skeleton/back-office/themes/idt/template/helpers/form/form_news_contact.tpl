<table>
	<tr>
		<td style="padding-bottom:5px;">
			<input type="hidden" name="id_contact" id="id_contact" value="{$id_contact}" />
			<input type="hidden" name="nameNewsContact" id="nameNewsContact" value="{$contact_name|escape:'htmlall':'UTF-8'}" />
			<input type="hidden" name="newsContactIdFromDb" id="newsContactIdFromDb" value="{$id_contact}" />
			<input type="hidden" name="newsContactNameFromDb" id="newsContactNameFromDb" value="{$contact_name|escape:'htmlall':'UTF-8'}" />
			
			<div id="ajax_choose_customer">
				<p style="clear:both;margin-top:0;">
					<input type="text" value="" id="news_contact_autocomplete_input" />
					{l s='Begin typing the first letters of the contact name, then select the person from the drop-down list'}
				</p>
			</div>
			<div id="divNewsContact">
			{if $id_contact && $contact_name}
					<span class="newsContact">{$contact_name|escape:'htmlall':'UTF-8'}
						<span class="delNewsContact" name="{$id_contact}" style="cursor: pointer;">
							<img src="../img/admin/delete.gif" class="middle" alt="" />
						</span>
						<br />
					</span>
					{/if}
			</div>
		</td>
	</tr>
</table>
			
			