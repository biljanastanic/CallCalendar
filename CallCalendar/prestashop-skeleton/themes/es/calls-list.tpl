<script type="text/javascript">
//<![CDATA[
$(document).ready(function()
{
	$("table").tablesorter(); 
	$( "#get_calls" ).click(function() 
	{	
		url = 'calls?';
		if ($( "#selectStatus" ).val() != "") 
			url = url + 'status=' + $( "#selectStatus" ).val()
		if ($( "#selectFunding" ).val() != "") 
			url = url + '&funding=' + $( "#selectFunding" ).val()
		if ($( "#selectType" ).val() != "") 
			url = url + '&type=' + $( "#selectType" ).val()
		document.location.href = url;
	});
});
//]]> 
</script>

<div class="centre-column">
	<h1>{$title}</h1>
	<form id="projectFilterForm" action="">
		<div>
			{l s='Status:'}
			<select id="selectStatus" class="selectStatus" name="selectStatus" style="left:100px;position:absolute;width:165px;margin-top:-2px">
				<option value="any">--- all ---</option>
				{foreach from=$statuses item=status name=statuses}
					<option value="{$status.id_call_status|escape:'htmlall':'UTF-8'}"
					{if $id_status eq $status.id_call_status}selected="selected"{/if}
					>{$status.name|escape:'htmlall':'UTF-8'}</option>
				{/foreach}
			</select>

			<span style="left:290px;position:absolute;width:50px">{l s='Type:'}</span>
			<select id="selectType" class="selectStatus" name="selectStatus" style="left:349px;position:absolute;width:185px;margin-top:-2px">
				<option value="">--- all ---</option>
				{foreach from=$types item=type name=types}
					<option value="{$type.id_call_type|escape:'htmlall':'UTF-8'}"
					{if $id_type eq $type.id_call_type}selected="selected"{/if}
					>{$type.name|escape:'htmlall':'UTF-8'}</option>
				{/foreach}
			</select>

		</div>
		
		<div style="margin-top:10px">
		{l s='Funding Agency:'}
		<select id="selectFunding" class="selectFunding" name="selectFunding" style="left:100px;position:absolute;width:434px;margin-top:-2px">
			<option value="">--- all ---</option>
			{if $funding_agencies}
				{foreach from=$funding_agencies item=funding_agency name=funding_agencies}
					<option value="{$funding_agency.id_funding_agency}" 
					{if $id_funding_agency eq $funding_agency.id_funding_agency}selected="selected"{/if}
					>{$funding_agency.name|truncate:70|escape:'htmlall':'UTF-8'}</option>
				{/foreach}
			{/if}
		</select>
		</div>
				
		<div style="margin-top:10px;padding-left:220px">
			<input type="button" id="get_calls" class="get_projects" value="Get calls">
		</div>
	</form>
	<br>
	{if !$number_of_calls}
		No call found.
	{else}
	
	<table id="projects-table" class="tablesorter"> 
		<thead> 
			<tr> 
				<th class="projects-list-title" style="padding-left:3px">Call Title</th> 
				<th class="projects-list-status" style="width:80px;padding-left:3px">Status</th> 
			</tr> 
		</thead> 
		<tbody> 
			{foreach from=$calls item=call name=call}
			<tr>
				<td class="projects-list-title">
					<a href="calls/{$call.id_call}-{$call.title|replace:"ö":"o"|replace:"Ö":"O"|replace:"ü":"u"|replace:"Ü":"U"|replace:"ä":"a"|replace:"Ä":"A"|replace:"å":"a"|replace:"Å":"A"|replace:"é":"e"|replace:"É":"E"|replace:"á":"a"|replace:"Á":"A"|regex_replace:"/[^A-Za-z0-9]/":"_"}">
					
						{$call.title|escape:'htmlall':'UTF-8'}
					</a>
				</td>
				<td class="projects-list-status">
					<a href="calls/{$call.id_call}-{$call.title|replace:"ö":"o"|replace:"Ö":"O"|replace:"ü":"u"|replace:"Ü":"U"|replace:"ä":"a"|replace:"Ä":"A"|replace:"å":"a"|replace:"Å":"A"|replace:"é":"e"|replace:"É":"E"|replace:"á":"a"|replace:"Á":"A"|regex_replace:"/[^A-Za-z0-9]/":"_"}">
						{$call.status|escape:'htmlall':'UTF-8'}
					</a>
				</td>
			</tr>
			{/foreach}
		</tbody> 
	</table> 
	{/if}
</div>

<div class = "right-column">

	<div class="row-logo">
			<div class="logo">
				
				<a href="http://www.es.mdh.se/divisions/18-Division_of_Research_Coordination" target="_blank">
				
					<img class="logo" src="img/headers/Reco-call-calendar-web.jpg" />
					
					<div style="font-size:11px; padding-top:10px">
						The RECO Call Calendar is maintained by the Division of Research Coordination
					</div>	

				</a>
				
			</div>	
	</div>

	<br class="clearBoth">
	<br class="clearBoth">
	<br class="clearBoth">

	
	<img class="logo" src="{$base_url}img/headers/funding-agencies.png" />
	<div style="font-size:11px; padding-top:10px">
		Our research is funded by a number of different funding agencies. The most common ones are listed below.
	</div>	
	{foreach from=$top_funding_agencies item=funding_agency}
		{if file_exists("img/funding-agencies/{$funding_agency.id_funding_agency}.jpg") }
		<div class="row-logo">
			<div class="logo">
				{if $funding_agency.url != ""}
				<a href="{$funding_agency.url}" target="_blank">
				{/if}
					<img class="logo" src="img/funding-agencies/{$funding_agency.id_funding_agency}.jpg" />
				{if $funding_agency.url != ""}
				</a>
				{/if}
			</div>	
		</div>
		{/if}
		<br class="clearBoth">
	{/foreach}



</div>

