<script type="text/javascript">
//<![CDATA[
$(document).ready(function()
{
	$("table").tablesorter(); 
	$( "#get_projects" ).click(function() 
	{	
		url = 'projects?';
		if ($( "#selectStatus" ).val() != "") 
			url = url + 'status=' + $( "#selectStatus" ).val()
		if ($( "#selectMember" ).val() != "") 
			url = url + '&member=' + $( "#selectMember" ).val()
		if ($( "#selectFunding" ).val() != "") 
			url = url + '&funding=' + $( "#selectFunding" ).val()
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
					<option value="{$status.id_project_status|escape:'htmlall':'UTF-8'}"
					{if $id_status eq $status.id_project_status}selected="selected"{/if}
					>{$status.name|escape:'htmlall':'UTF-8'}</option>
				{/foreach}
			</select>
			
			<span style="left:290px;position:absolute;width:50px">{l s='Member:'}</span>
			<select id="selectMember" class="selectMember" name="selectMember" style="left:349px;position:absolute;width:185px;margin-top:-2px">
				<option value="">--- all ---</option>
				{foreach from=$people item=member name=people}
					<option value="{$member.id_customer|escape:'htmlall':'UTF-8'}"
					{if $id_member eq $member.id_customer}selected="selected"{/if}
					>{$member.firstname|truncate:35|escape:'htmlall':'UTF-8'} {$member.lastname|truncate:34|escape:'htmlall':'UTF-8'}</option>
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
			<input type="button" id="get_projects" class="get_projects" value="Get projects">
		</div>
	</form>
	<br>
	{if !$number_of_projects}
		No projects found.
	{else}
	
	<table id="projects-table" class="tablesorter"> 
		<thead> 
			<tr> 
				<th class="projects-list-title" style="padding-left:3px">Project Title</th> 
				<th class="projects-list-status" style="width:80px;padding-left:3px">Status</th> 
			</tr> 
		</thead> 
		<tbody> 
			{foreach from=$projects item=project name=project}
			<tr>
				<td class="projects-list-title">
					<a href="projects/{$project.id_project}-{if $project.acronym!=''}{$project.acronym|replace:"ö":"o"|replace:"Ö":"O"|replace:"ü":"u"|replace:"Ü":"U"|replace:"ä":"a"|replace:"Ä":"A"|replace:"å":"a"|replace:"Å":"A"|replace:"é":"e"|replace:"É":"E"|replace:"á":"a"|replace:"Á":"A"|regex_replace:"/[^A-Za-z0-9]/":"_"}
					{else}{$project.name|replace:"ö":"o"|replace:"Ö":"O"|replace:"ü":"u"|replace:"Ü":"U"|replace:"ä":"a"|replace:"Ä":"A"|replace:"å":"a"|replace:"Å":"A"|replace:"é":"e"|replace:"É":"E"|replace:"á":"a"|replace:"Á":"A"|regex_replace:"/[^A-Za-z0-9]/":"_"}{/if}">
						{$project.name|escape:'htmlall':'UTF-8'}
					</a>
				</td>
				<td class="projects-list-status">
					<a href="projects/{$project.id_project}-{if $project.acronym!=''}{$project.acronym|replace:"ö":"o"|replace:"Ö":"O"|replace:"ü":"u"|replace:"Ü":"U"|replace:"ä":"a"|replace:"Ä":"A"|replace:"å":"a"|replace:"Å":"A"|replace:"é":"e"|replace:"É":"E"|replace:"á":"a"|replace:"Á":"A"|regex_replace:"/[^A-Za-z0-9]/":"_"}
					{else}{$project.name|replace:"ö":"o"|replace:"Ö":"O"|replace:"ü":"u"|replace:"Ü":"U"|replace:"ä":"a"|replace:"Ä":"A"|replace:"å":"a"|replace:"Å":"A"|replace:"é":"e"|replace:"É":"E"|replace:"á":"a"|replace:"Á":"A"|regex_replace:"/[^A-Za-z0-9]/":"_"}{/if}">
						{$project.status|escape:'htmlall':'UTF-8'}
					</a>
				</td>
			</tr>
			{/foreach}
		</tbody> 
	</table> 
	{/if}
</div>

<div class = "right-column">
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
	{/foreach}
</div>

