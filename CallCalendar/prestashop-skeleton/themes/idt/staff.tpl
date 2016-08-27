<script type="text/javascript">
//<![CDATA[
$(document).ready(function()
{
	$("table").tablesorter(); 
	$('.selectScope').change(function()
	{
		document.location.href = 'staff?scope=' + $(this).val();
	});

});
//]]> 
</script>

<div class="centre-column">
	<h1>{$title}</h1>
	<form id="staffFilterForm" action="">
		{l s='Scope:'}
		<select id="selectScope" class="selectScope" name="selectScope" style="left:50px;position:absolute;width:484px;margin-top:-2px">
			<option value="">--- all ---</option>
			{if $areas}
				<option value="" style="font-weight:bold">--- RESEARCH AREAS ---</option>
				{foreach from=$areas item=area name=areas}
					<option value="id_area_{$area.id_initiative|escape:'htmlall':'UTF-8'}" 
					{if $id_area eq $area.id_initiative}selected="selected"{/if}
					>{$area.name|truncate:70|escape:'htmlall':'UTF-8'}</option>
				{/foreach}
			{/if}
	
			{if $divisions}
				<option value="" style="font-weight:bold">--- DIVISIONS ---</option>
				{foreach from=$divisions item=division name=divisions}
					<option value="id_division_{$division.id_initiative|escape:'htmlall':'UTF-8'}"
					{if $id_division eq $division.id_initiative}selected="selected"{/if}
					>{$division.name|truncate:70|escape:'htmlall':'UTF-8'}</option>
				{/foreach}
			{/if}
	
			{if $groups}
				<option value="" style="font-weight:bold">--- RESEARCH GROUPS ---</option>
				{foreach from=$groups item=group name=groups}
					<option value="id_group_{$group.id_initiative|escape:'htmlall':'UTF-8'}"
					{if $id_group eq $group.id_initiative}selected="selected"{/if}
					>{$group.name|truncate:70|escape:'htmlall':'UTF-8'}</option>
				{/foreach}
			{/if}
	
			{if $projects}
				<option value="" style="font-weight:bold">--- PROJECTS ---</option>
				{foreach from=$projects item=project name=projects}
					<option value="id_project_{$project.id_project|escape:'htmlall':'UTF-8'}"
					{if $id_project eq $project.id_project}selected="selected"{/if}
					>{$project.name|truncate:70|escape:'htmlall':'UTF-8'}</option>
				{/foreach}				
			{/if}
		</select>		
	</form>
	<br>
	{if isset($people)}
	<table id="staff-table" class="tablesorter"> 
		<thead> 
			<tr> 
				<th class="staff-list-lastname">First Name</th> 
				<th class="staff-list-firstname">Last Name</th> 
				<th class="staff-list-title">Title</th> 
				<th class="staff-list-phone">Phone</th> 
			</tr> 
		</thead> 
		<tbody> 
			{foreach from=$people item=person name=people}
			<tr>
				<td class="staff-list-firstname">
					<a href="staff/{$person.id_customer}-{$person.firstname|replace:"ö":"o"|replace:"Ö":"O"|replace:"ü":"u"|replace:"Ü":"U"|replace:"ä":"a"|replace:"Ä":"A"|replace:"å":"a"|replace:"Å":"A"|replace:"é":"e"|replace:"É":"E"|replace:"á":"a"|replace:"Á":"A"|regex_replace:"/[^A-Za-z0-9]/":"_"}_{$person.lastname|replace:"ö":"o"|replace:"Ö":"O"|replace:"ü":"u"|replace:"Ü":"U"|replace:"ä":"a"|replace:"Ä":"A"|replace:"å":"a"|replace:"Å":"A"|replace:"é":"e"|replace:"É":"E"|replace:"á":"a"|replace:"Á":"A"|regex_replace:"/[^A-Za-z0-9]/":"_"}">
						{$person.firstname|escape:'htmlall':'UTF-8'}
					</a>
				</td>
				<td class="staff-list-lastname">
					<a href="staff/{$person.id_customer}-{$person.firstname|replace:"ö":"o"|replace:"Ö":"O"|replace:"ü":"u"|replace:"Ü":"U"|replace:"ä":"a"|replace:"Ä":"A"|replace:"å":"a"|replace:"Å":"A"|replace:"é":"e"|replace:"É":"E"|replace:"á":"a"|replace:"Á":"A"|regex_replace:"/[^A-Za-z0-9]/":"_"}_{$person.lastname|replace:"ö":"o"|replace:"Ö":"O"|replace:"ü":"u"|replace:"Ü":"U"|replace:"ä":"a"|replace:"Ä":"A"|replace:"å":"a"|replace:"Å":"A"|replace:"é":"e"|replace:"É":"E"|replace:"á":"a"|replace:"Á":"A"|regex_replace:"/[^A-Za-z0-9]/":"_"}">
						{$person.lastname|escape:'htmlall':'UTF-8'}
					</a>
				</td>
				<td class="staff-list-title">
					<a href="staff/{$person.id_customer}-{$person.firstname|replace:"ö":"o"|replace:"Ö":"O"|replace:"ü":"u"|replace:"Ü":"U"|replace:"ä":"a"|replace:"Ä":"A"|replace:"å":"a"|replace:"Å":"A"|replace:"é":"e"|replace:"É":"E"|replace:"á":"a"|replace:"Á":"A"|regex_replace:"/[^A-Za-z0-9]/":"_"}_{$person.lastname|replace:"ö":"o"|replace:"Ö":"O"|replace:"ü":"u"|replace:"Ü":"U"|replace:"ä":"a"|replace:"Ä":"A"|replace:"å":"a"|replace:"Å":"A"|replace:"é":"e"|replace:"É":"E"|replace:"á":"a"|replace:"Á":"A"|regex_replace:"/[^A-Za-z0-9]/":"_"}">
						{$person.title|escape:'htmlall':'UTF-8'}
					</a>
				</td>
				<td class="staff-list-phone">
					<a href="staff/{$person.id_customer}-{$person.firstname|replace:"ö":"o"|replace:"Ö":"O"|replace:"ü":"u"|replace:"Ü":"U"|replace:"ä":"a"|replace:"Ä":"A"|replace:"å":"a"|replace:"Å":"A"|replace:"é":"e"|replace:"É":"E"|replace:"á":"a"|replace:"Á":"A"|regex_replace:"/[^A-Za-z0-9]/":"_"}_{$person.lastname|replace:"ö":"o"|replace:"Ö":"O"|replace:"ü":"u"|replace:"Ü":"U"|replace:"ä":"a"|replace:"Ä":"A"|replace:"å":"a"|replace:"Å":"A"|replace:"é":"e"|replace:"É":"E"|replace:"á":"a"|replace:"Á":"A"|regex_replace:"/[^A-Za-z0-9]/":"_"}">
						{$person.phone|escape:'htmlall':'UTF-8'}
					</a>
				</td>
			</tr>
			{/foreach}
		</tbody> 
	</table> 
	{/if}
</div>

<div class="right-column">
	<img class="logo" src="{$base_url}img/headers/research-groups.png" />
	{foreach from=$groups item=group}
		<div class="row-group">
			<a href="{$base_url}research-groups/{$group.id_initiative}-{$group.name|replace:"ö":"o"|replace:"Ö":"O"|replace:"ü":"u"|replace:"Ü":"U"|replace:"ä":"a"|replace:"Ä":"A"|replace:"å":"a"|replace:"Å":"A"|replace:"é":"e"|replace:"É":"E"|replace:"á":"a"|replace:"Á":"A"|regex_replace:"/[^A-Za-z0-9]/":"_"}">
				{$group.name|escape:'htmlall':'UTF-8'}
			</a>
		</div>
	{/foreach}
</div>