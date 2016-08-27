<table>
	<tr>
		<td style="padding-bottom:5px;">
			<input type="hidden" name="inputSpeakers" id="inputSpeakers" value="{foreach from=$speakers item=person}{$person.id_customer}-{/foreach}" />
			<input type="hidden" id="id_news_and_event" value="{$id_news_and_event}" />
			<input type="hidden" name="nameSpeakers" id="nameSpeakers" value="{foreach from=$speakers item=person}{$person.firstname|escape:'htmlall':'UTF-8'} {$person.lastname|escape:'htmlall':'UTF-8'}_{/foreach}" />
			<input type="hidden" name="speakerIdsFromDb" id="speakerIdsFromDb" value="{foreach from=$speakers item=person}{$person.id_customer}-{/foreach}" />
			<input type="hidden" name="speakerNamesFromDb" id="speakerNamesFromDb" value="{foreach from=$speakers item=person}{$person.firstname|escape:'htmlall':'UTF-8'} {$person.lastname|escape:'htmlall':'UTF-8'}_{/foreach}" />
			
			<div id="ajax_choose_customer">
				<p style="clear:both;margin-top:0;">
					<input type="text" value="" id="event_speaker_autocomplete_input" />
					{l s='Begin typing the first letters of the speakers name, then select the person from the drop-down list'}
				</p>
				<p class="preference_description">{l s='(Do not forget to save afterwards)'}</p>
			</div>
			<div id="divEventSpeakers">
				{foreach from=$speakers item=person}
					<span class="eventSpeaker">
					{$person.firstname|escape:'htmlall':'UTF-8'} {$person.lastname|escape:'htmlall':'UTF-8'}
						<span class="delEventSpeaker" name="{$person.id_customer}" style="cursor: pointer;">
							<img src="../img/admin/delete.gif" class="middle" alt="" />
						</span>
					</span>
					<br />
				{/foreach}
			</div>
		</td>
	</tr>
</table>
		
			