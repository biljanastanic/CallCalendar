{capture name=path}{l s='Research project'}{/capture}
<script type="text/javascript">
	$(document).ready(function()
	{
		$( "#tabs" ).tabs({
			collapsible: true
		});
		$(".tablesorter").tablesorter(); 
	});
</script>
<div class="centre-column">
	<h1>{$project.name}</h1>
	{if isset($project.focus) && $project.focus != ""}
		<div class="centre-block">
			<div class="div-label">
				<h3>Focus:</h3>
			</div>
			<div class="div-content">
				{$project.focus}
			</div>
			<br class="clearBoth">
		</div>
	{/if}

	{if isset($divisions) && $divisions|@count > 0}
		<div class="centre-block">
			<div class="div-label">
				{if isset($divisions) && $divisions|@count == 1}
				<h3>Division:</h3>
				{else}
				<h3>Divisions:</h3>
				{/if}
				</div>
			<div class="div-content">
				{$i = 1}
				{foreach from=$divisions item=division name=divisions}
					<a class="standardLink" href="{$base_url}divisions/{$division.id_initiative}-{$division.name|replace:"ö":"o"|replace:"Ö":"O"|replace:"ü":"u"|replace:"Ü":"U"|replace:"ä":"a"|replace:"Ä":"A"|replace:"å":"a"|replace:"Å":"A"|replace:"é":"e"|replace:"É":"E"|replace:"á":"a"|replace:"Á":"A"|regex_replace:"/[^A-Za-z0-9]/":"_"}">{$division.name|escape:'htmlall':'UTF-8'}</a>{if $divisions|@count != $i}<br>{/if}
					{$i = $i + 1}							
				{/foreach}
			</div>
			<br class="clearBoth">
		</div>
	{/if}	
	
	{if isset($research_groups) && $research_groups|@count > 0}
		<div class="centre-block">
			<div class="div-label">
				{if isset($research_groups) && $research_groups|@count == 1}
				<h3>Research Group:</h3>
				{else}
				<h3>Research Groups:</h3>
				{/if}
				</div>
			<div class="div-content">
				{$i = 1}
				{foreach from=$research_groups item=research_group name=research_groups}
					<a class="standardLink" href="{$base_url}research-groups/{$research_group.id_initiative}-{$research_group.name|replace:"ö":"o"|replace:"Ö":"O"|replace:"ü":"u"|replace:"Ü":"U"|replace:"ä":"a"|replace:"Ä":"A"|replace:"å":"a"|replace:"Å":"A"|replace:"é":"e"|replace:"É":"E"|replace:"á":"a"|replace:"Á":"A"|regex_replace:"/[^A-Za-z0-9]/":"_"}">{$research_group.name|escape:'htmlall':'UTF-8'}</a>{if $research_groups|@count != $i}<br>{/if}
					{$i = $i + 1}							
				{/foreach}
			</div>
			<br class="clearBoth">
		</div>
	{/if}	
	
	{if isset($project.status) && $project.status != ""}
		<div class="centre-block">
			<div class="div-label">
				<h3>Status:</h3>
			</div>
			<div class="div-content">
				{$project.status}
			</div>
			<br class="clearBoth">
		</div>
	{/if}

	{if isset($project.date_start) && $project.date_start != "0000-00-00"}
		<div class="centre-block">
			<div class="div-label">
				<h3>Start date:</h3>
			</div>
			<div class="div-content">
				{$project.date_start|replace:'-00':''|replace:'0000':''}
			</div>
			<br class="clearBoth">
		</div>
	{/if}

	{if isset($project.date_end) && $project.date_end != "0000-00-00"}
		<div class="centre-block">
			<div class="div-label">
				<h3>End date:</h3>
			</div>
			<div class="div-content">
				{$project.date_end|replace:'-00':''|replace:'0000':''}
			</div>
			<br class="clearBoth">
		</div>
	{/if}
	
	{if isset($project.url) && $project.url!=''}
	<div class="centre-block">
			<div class="div-label">
				<h3>Url:</h3>
			</div>
			<div class="div-content">
				<a href="{$project.url}" target="_blank">{$project.url}</a>
			</div>
			<br class="clearBoth">
		</div>
				{/if}
	<div id="tabs">
		<ul>
			{if isset($project.overview) && $project.overview != ""}
				<li><a href="#tabs-1">Overview</a></li>
			{/if}
			{if isset($members) && $members|@count > 0}
				<li><a href="#tabs-2">Members</a></li>
			{/if}
			{if isset($publications) && $publications|@count > 0}
				<li><a href="#tabs-3">Latest Publications</a></li>
			{/if}
			{if isset($project.partners) && $project.partners|@count > 0}
				<li><a href="#tabs-4">Partners</a></li>
			{/if}
			{if isset($projectNews) && $projectNews|@count > 0}
				<li><a href="#tabs-5">Project News</a></li>
			{/if}
			{if isset($projectEvents) && $projectEvents|@count > 0}
				<li><a href="#tabs-6">Project Events</a></li>
			{/if}			
		</ul>
	
	{if isset($project.overview) && $project.overview != ""}
		<div id="tabs-1">
			{$project.overview}
		</div>	
	{/if}
	
	{if isset($members) && $members!=null}
		<div id="tabs-2">
			<table id="project-table" class="tablesorter"> 
				<thead> 
					<tr> 
						<th class="staff-list-lastname">First Name</th> 
						<th class="staff-list-firstname">Last Name</th> 
						<th class="staff-list-title">Title</th> 
					</tr> 
				</thead> 
				<tbody> 
					{foreach from=$members item=member name=members}
					<tr>
						<td class="staff-list-firstname">
							<a href="{$base_url}staff/{$member.id_customer}-{$member.firstname|replace:"ö":"o"|replace:"Ö":"O"|replace:"ü":"u"|replace:"Ü":"U"|replace:"ä":"a"|replace:"Ä":"A"|replace:"å":"a"|replace:"Å":"A"|replace:"é":"e"|replace:"É":"E"|replace:"á":"a"|replace:"Á":"A"|regex_replace:"/[^A-Za-z0-9]/":"_"}_{$member.lastname|replace:"ö":"o"|replace:"Ö":"O"|replace:"ü":"u"|replace:"Ü":"U"|replace:"ä":"a"|replace:"Ä":"A"|replace:"å":"a"|replace:"Å":"A"|replace:"é":"e"|replace:"É":"E"|replace:"á":"a"|replace:"Á":"A"|regex_replace:"/[^A-Za-z0-9]/":"_"}">
								{$member.firstname|escape:'htmlall':'UTF-8'}
							</a>
						</td>
						<td class="staff-list-lastname">
							<a href="{$base_url}staff/{$member.id_customer}-{$member.firstname|replace:"ö":"o"|replace:"Ö":"O"|replace:"ü":"u"|replace:"Ü":"U"|replace:"ä":"a"|replace:"Ä":"A"|replace:"å":"a"|replace:"Å":"A"|replace:"é":"e"|replace:"É":"E"|replace:"á":"a"|replace:"Á":"A"|regex_replace:"/[^A-Za-z0-9]/":"_"}_{$member.lastname|replace:"ö":"o"|replace:"Ö":"O"|replace:"ü":"u"|replace:"Ü":"U"|replace:"ä":"a"|replace:"Ä":"A"|replace:"å":"a"|replace:"Å":"A"|replace:"é":"e"|replace:"É":"E"|replace:"á":"a"|replace:"Á":"A"|regex_replace:"/[^A-Za-z0-9]/":"_"}">
								{$member.lastname|escape:'htmlall':'UTF-8'}
							</a>
						</td>
						<td class="staff-list-title">
							<a href="{$base_url}staff/{$member.id_customer}-{$member.firstname|replace:"ö":"o"|replace:"Ö":"O"|replace:"ü":"u"|replace:"Ü":"U"|replace:"ä":"a"|replace:"Ä":"A"|replace:"å":"a"|replace:"Å":"A"|replace:"é":"e"|replace:"É":"E"|replace:"á":"a"|replace:"Á":"A"|regex_replace:"/[^A-Za-z0-9]/":"_"}_{$member.lastname|replace:"ö":"o"|replace:"Ö":"O"|replace:"ü":"u"|replace:"Ü":"U"|replace:"ä":"a"|replace:"Ä":"A"|replace:"å":"a"|replace:"Å":"A"|replace:"é":"e"|replace:"É":"E"|replace:"á":"a"|replace:"Á":"A"|regex_replace:"/[^A-Za-z0-9]/":"_"}">
								{$member.title|escape:'htmlall':'UTF-8'}
							</a>
						</td>
					</tr>
					{/foreach}
				</tbody> 
			</table>
		</div>	
	{/if}


	{if isset($publications) && $publications|@count > 0}
		<div id="tabs-3">
		<p>
			<a href="{$base_url}publications?scope=id_project_{$project.id_project}">[Show all publications]</a>
		</p>
			{foreach from=$publications item=publication name=publications}
				<p>
					<a href="{$base_url}publications/{$publication.id_publication}-{$publication.title|replace:"ö":"o"|replace:"Ö":"O"|replace:"ü":"u"|replace:"Ü":"U"|replace:"ä":"a"|replace:"Ä":"A"|replace:"å":"a"|replace:"Å":"A"|replace:"é":"e"|replace:"É":"E"|replace:"á":"a"|replace:"Á":"A"|regex_replace:"/[^A-Za-z0-9]/":"_"}">
						<b>
							{$publication.title|escape:'htmlall':'UTF-8'}
							{if $publication.date_publish|replace:'-00':''|replace:'0000':''|count_characters > 4}
								({$publication.date_publish|date_format:'%b %Y'})
							{else if $publication.date_publish|replace:'-00':''|replace:'0000':''|count_characters eq 4}
								({$publication.date_publish|replace:'-00':''})
							{/if}		
						</b>
					</a>
					</br>
					{$i = 1}
					{foreach from=$publication['authors'] item=author name=authors}
						<a href="{$base_url}staff/{$author.id_customer}-{$author.firstname|replace:"ö":"o"|replace:"Ö":"O"|replace:"ü":"u"|replace:"Ü":"U"|replace:"ä":"a"|replace:"Ä":"A"|replace:"å":"a"|replace:"Å":"A"|replace:"é":"e"|replace:"É":"E"|replace:"á":"a"|replace:"Á":"A"|regex_replace:"/[^A-Za-z0-9]/":"_"}_{$author.lastname|replace:"ö":"o"|replace:"Ö":"O"|replace:"ü":"u"|replace:"Ü":"U"|replace:"ä":"a"|replace:"Ä":"A"|replace:"å":"a"|replace:"Å":"A"|replace:"é":"e"|replace:"É":"E"|replace:"á":"a"|replace:"Á":"A"|regex_replace:"/[^A-Za-z0-9]/":"_"}">
							{$author.firstname|escape:'htmlall':'UTF-8'} {$author.lastname|escape:'htmlall':'UTF-8'}{if $publication['authors']|@count != $i},{/if}
						</a>
						{$i = $i + 1}							
					{/foreach}
					</br>
					{if $publication.book_title}
						{$publication.book_title}
					{else}
						{$publication.publication_venue_instance_title}{if $publication.publication_venue_instance} ({$publication.publication_venue_instance}){/if}
					{/if}
				</p>
			{/foreach}
		</div>
	{/if}
	
	
		{if isset($project.partners) && $project.partners|@count > 0}
		<div id="tabs-4">
			<table id="project-table" class="tablesorter"> 
				<thead> 
					<tr> 
						<th class="partner-list-name">Partner</th> 
						<th class="partner-list-type">Type</th> 
					</tr> 
				</thead> 
				<tbody> 
					{foreach from=$project.partners item=partner name=partners}
					<tr>
						<td class="partner-list-name">
							<a href="{$partner.url}" target="_blank">{$partner.name|escape:'htmlall':'UTF-8'}</a>
						</td>
						<td class="partner-list-type">
							{$partner.type|escape:'htmlall':'UTF-8'}
						</td>
					</tr>
					{/foreach}
				</tbody> 
			</table>
		</div>	
	{/if}

	</div>
		 
</div>

<div class = "right-column">
	{if count($leaders) > 1}
	<div style="margin-bottom: 20px">
		<img class="logo" src="{$base_url}img/headers/project-leaders.png"/>
		{foreach from=$leaders item=leader}
		<div class="row">
			<div style="float:left">
				<img src="../img/staff/{$leader.id_customer}-staff.jpg" style="width:72px;"/>
			</div>	
			<div style="float:left;width:120px;margin-left:10px">
				<br>
				<h3>
					<a href="{$base_url}staff/{$leader.id_customer}-{$leader.firstname|replace:"ö":"o"|replace:"Ö":"O"|replace:"ü":"u"|replace:"Ü":"U"|replace:"ä":"a"|replace:"Ä":"A"|replace:"å":"a"|replace:"Å":"A"|replace:"é":"e"|replace:"É":"E"|replace:"á":"a"|replace:"Á":"A"|regex_replace:"/[^A-Za-z0-9]/":"_"}_{$leader.lastname|replace:"ö":"o"|replace:"Ö":"O"|replace:"ü":"u"|replace:"Ü":"U"|replace:"ä":"a"|replace:"Ä":"A"|replace:"å":"a"|replace:"Å":"A"|replace:"é":"e"|replace:"É":"E"|replace:"á":"a"|replace:"Á":"A"|regex_replace:"/[^A-Za-z0-9]/":"_"}">
						{$leader.firstname} {$leader.lastname}, {$leader.title}
					</a>			
				</h3>
				Room: {$leader.room}
				<br>Phone: {$leader.phone}
			</div>	
		</div>
		<br class="clearBoth">
		{/foreach}
	</div>
	{else isset($leaders[0])}
	<div style="margin-bottom: 20px">
		<div style="margin-left:90px; margin-bottom: -45px; position:relative; z-index:2;">
			<img src="../img/staff/{$leaders[0].id_customer}-staff.jpg" style="width:105px;"/>
		</div>
		<div style="position:relative;float:left;z-index:1;">
			<img class="logo" src="{$base_url}img/headers/project-leader.png"/>
			<h3>
				<a href="{$base_url}staff/{$leaders[0].id_customer}-{$leaders[0].firstname|replace:"ö":"o"|replace:"Ö":"O"|replace:"ü":"u"|replace:"Ü":"U"|replace:"ä":"a"|replace:"Ä":"A"|replace:"å":"a"|replace:"Å":"A"|replace:"é":"e"|replace:"É":"E"|replace:"á":"a"|replace:"Á":"A"|regex_replace:"/[^A-Za-z0-9]/":"_"}_{$leaders[0].lastname|replace:"ö":"o"|replace:"Ö":"O"|replace:"ü":"u"|replace:"Ü":"U"|replace:"ä":"a"|replace:"Ä":"A"|replace:"å":"a"|replace:"Å":"A"|replace:"é":"e"|replace:"É":"E"|replace:"á":"a"|replace:"Á":"A"|regex_replace:"/[^A-Za-z0-9]/":"_"}">
					{$leaders[0].firstname} {$leaders[0].lastname}, {$leaders[0].title}
				</a>			
				</h3>
			Email: {$leaders[0].email}
			<br>Room: {$leaders[0].room}
			<br>Phone: {$leaders[0].phone}
		</div>
		<br class="clearBoth">
	</div>
	{/if}

	{if isset($funding_agencies) && $funding_agencies|@count > 0}
	<div style="margin-bottom: 20px">
		<img class="logo" src="{$base_url}img/headers/funding-agencies.png" />
		{foreach from=$funding_agencies item=funding_agency}
		<div class="row-logo">
			<div class="logo">
				{if $funding_agency.url != ""}
				<a href="{$funding_agency.url}" target="_blank">
				{/if}
					<img class="logo" src="../img/funding-agencies/{$funding_agency.id_funding_agency}.jpg" />
				{if $funding_agency.url != ""}
				</a>
				{/if}
			</div>	
		</div>
		{/foreach}
	</div>	
	{/if}
</div>

