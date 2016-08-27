<table>
	<tr>
		<td style="padding-bottom:5px;">
			<input type="hidden" name="inputMembers" id="inputMembers" value="{foreach from=$members item=person}{$person.id_customer}-{/foreach}" />
			<input type="hidden" id="id_project" value="{$id_project}" />
			<input type="hidden" name="nameMembers" id="nameMembers" value="{foreach from=$members item=person}{$person.firstname|escape:'htmlall':'UTF-8'} {$person.lastname|escape:'htmlall':'UTF-8'}¤{/foreach}" />
			<input type="hidden" name="memberIdsFromDb" id="memberIdsFromDb" value="{foreach from=$members item=person}{$person.id_customer}-{/foreach}" />
			<input type="hidden" name="memberNamesFromDb" id="memberNamesFromDb" value="{foreach from=$members item=person}{$person.firstname|escape:'htmlall':'UTF-8'} {$person.lastname|escape:'htmlall':'UTF-8'}¤{/foreach}" />
			
			<div id="ajax_choose_customer">
				<p style="clear:both;margin-top:0;">
					<input type="text" value="" id="member_autocomplete_input" />
					{l s='Begin typing the first letters of the members name, then select the person from the drop-down list'}
				</p>
				<p class="preference_description">{l s='(Do not forget to save afterwards)'}</p>
			</div>
			<div id="divMembers">
				{foreach from=$members item=person}
					<span class="member">{$person.firstname|escape:'htmlall':'UTF-8'} {$person.lastname|escape:'htmlall':'UTF-8'}
						<span class="delMember" name="{$person.id_customer}" style="cursor: pointer;">
							<img src="../img/admin/delete.gif" class="middle" alt="" />
						</span>
					</span>
					<br />
				{/foreach}
			</div>
		</td>
	</tr>
</table>
			
			