<table>
	<tr>
		<td style="padding-bottom:5px;">
			<input type="hidden" name="inputAssociated" id="inputAssociated" value="{foreach from=$associated item=person}{$person.id_customer}-{/foreach}" />
			<input type="hidden" id="id_project" value="{$id_project}" />
			<input type="hidden" name="nameAssociated" id="nameAssociated" value="{foreach from=$associated item=person}{$person.firstname|escape:'htmlall':'UTF-8'} {$person.lastname|escape:'htmlall':'UTF-8'}¤{/foreach}" />
			<input type="hidden" name="associatedIdsFromDb" id="associatedIdsFromDb" value="{foreach from=$associated item=person}{$person.id_customer}-{/foreach}" />
			<input type="hidden" name="associatedNamesFromDb" id="associatedNamesFromDb" value="{foreach from=$associated item=person}{$person.firstname|escape:'htmlall':'UTF-8'} {$person.lastname|escape:'htmlall':'UTF-8'}¤{/foreach}" />
			
			<div id="ajax_choose_customer">
				<p style="clear:both;margin-top:0;">
					<input type="text" value="" id="associated_autocomplete_input" />
					{l s='Begin typing the first letters of the associated persons name, then select the person from the drop-down list'}
				</p>
				<p class="preference_description">{l s='(Do not forget to save afterwards)'}</p>
			</div>
			<div id="divAssociated">
				{foreach from=$associated item=person}
					<span class="associated">{$person.firstname|escape:'htmlall':'UTF-8'} {$person.lastname|escape:'htmlall':'UTF-8'}
						<span class="delAssociated" name="{$person.id_customer}" style="cursor: pointer;">
							<img src="../img/admin/delete.gif" class="middle" alt="" />
						</span>
					</span>
					<br />
				{/foreach}
			</div>
		</td>
	</tr>
</table>
			
			