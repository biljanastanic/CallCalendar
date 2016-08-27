<div class="centre-column">
	<h1>{$title}</h1>
	{if isset($areas) && $areas}
		<h2>Research Areas</h2>
		{foreach from=$areas item=area name=area}
				<a class="standardLink" href="research-areas/{$area.id_initiative}-{$area.name|replace:"ö":"o"|replace:"Ö":"O"|replace:"ü":"u"|replace:"Ü":"U"|replace:"ä":"a"|replace:"Ä":"A"|replace:"å":"a"|replace:"Å":"A"|replace:"é":"e"|replace:"É":"E"|replace:"á":"a"|replace:"Á":"A"|regex_replace:"/[^A-Za-z0-9]/":"_"}">
					{$area.name|escape:'htmlall':'UTF-8'}
				</a>
			<br> 
		{/foreach}
	{/if}

	{if isset($divisions) && $divisions}
		<h2>Divisions</h2>
		{foreach from=$divisions item=division name=division}
				<a class="standardLink" href="divisions/{$division.id_initiative}-{$division.name|replace:"ö":"o"|replace:"Ö":"O"|replace:"ü":"u"|replace:"Ü":"U"|replace:"ä":"a"|replace:"Ä":"A"|replace:"å":"a"|replace:"Å":"A"|replace:"é":"e"|replace:"É":"E"|replace:"á":"a"|replace:"Á":"A"|regex_replace:"/[^A-Za-z0-9]/":"_"}">
					{$division.name|escape:'htmlall':'UTF-8'}
				</a>
		<br> 
		{/foreach}
	{/if}

	{if isset($groups) && $groups}
		<h2>Research Groups</h2>
		{foreach from=$groups item=group name=group}
				<a class="standardLink" href="research-groups/{$group.id_initiative}-{$group.name|replace:"ö":"o"|replace:"Ö":"O"|replace:"ü":"u"|replace:"Ü":"U"|replace:"ä":"a"|replace:"Ä":"A"|replace:"å":"a"|replace:"Å":"A"|replace:"é":"e"|replace:"É":"E"|replace:"á":"a"|replace:"Á":"A"|regex_replace:"/[^A-Za-z0-9]/":"_"}">
					{$group.name|escape:'htmlall':'UTF-8'}
				</a>
		<br> 
		{/foreach}
	{/if}
	<br>
</div>

<div class = "right-column">
	<div style="margin-bottom: 20px">
		<div style="margin-left:93px; margin-bottom: -45px; position:relative; z-index:2;">
			<img src="img/staff/{$research_leader.id_customer}-staff.jpg" style="width:105px;"/>
		</div>
		<div style="position:relative;float:left;z-index:1;">
			<img class="logo" src="{$base_url}img/headers/research-leader.png"/>
			<h3>
				<a href="staff/{$research_leader.id_customer}-{$research_leader.firstname|replace:"ö":"o"|replace:"Ö":"O"|replace:"ü":"u"|replace:"Ü":"U"|replace:"ä":"a"|replace:"Ä":"A"|replace:"å":"a"|replace:"Å":"A"|replace:"é":"e"|replace:"É":"E"|replace:"á":"a"|replace:"Á":"A"|regex_replace:"/[^A-Za-z0-9]/":"_"}_{$research_leader.lastname|replace:"ö":"o"|replace:"Ö":"O"|replace:"ü":"u"|replace:"Ü":"U"|replace:"ä":"a"|replace:"Ä":"A"|replace:"å":"a"|replace:"Å":"A"|replace:"é":"e"|replace:"É":"E"|replace:"á":"a"|replace:"Á":"A"|regex_replace:"/[^A-Za-z0-9]/":"_"}">
					{$research_leader.firstname} {$research_leader.lastname}, {$research_leader.title}
				</a>			
				</h3>
			Email: {$research_leader.email}
			<br>Room: {$research_leader.room}
			<br>Phone: {$research_leader.phone}
		</div>
		<br class="clearBoth">
	</div>
</div>
