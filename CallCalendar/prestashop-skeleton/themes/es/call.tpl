{capture name=path}{l s='Research call'}{/capture}
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
	<h1>{$call.title}</h1>
	<!--{if isset($call.focus) && $call.focus != ""}
		<div class="centre-block">
			<div class="div-label">
				<h3>Focus:</h3>
			</div>
			<div class="div-content">
				{$call.focus}
			</div>
			<br class="clearBoth">
		</div>
	{/if}	-->

	

	{if isset($call.status) && $call.status != ""}
		<div class="centre-block">
			<div class="div-label">
				<h3>Status:</h3>
			</div>
			<div class="div-content">
				{$call.status}
			</div>
			<br class="clearBoth">
		</div>
	{/if}
	
	{if isset($call.type) && $call.type != ""}
		<div class="centre-block">
			<div class="div-label">
				<h3>Type:</h3>
			</div>
			<div class="div-content">
				{$call.type}
			</div>
			<br class="clearBoth">
		</div>
	{/if}

	{if isset($call.type) && $call.type != ""}
		<div class="centre-block">
			<div class="div-label">
				<h3>Funding agency:</h3>
			</div>
			<div class="div-content">
				{$call.agency}
			</div>
			<br class="clearBoth">
		</div>
	{/if}

	{if isset($call.planed_project_start) && $call.planed_project_start != "0000-00-00"}
		<div class="centre-block">
			<div class="div-label">
				<h3>Start date:</h3>
			</div>
			<div class="div-content">
				{$call.planed_project_start|replace:'-00':''|replace:'0000':''}
			</div>
			<br class="clearBoth">
		</div>
	{/if}

	{if isset($call.budget) && $call.budget != "0"}
		<div class="centre-block">
			<div class="div-label">
				<h3>Budget:</h3>
			</div>
			<div class="div-content">
				{$call.budget} <!-- |replace:'-00':''|replace:'0000':''} -->
			</div>
			<br class="clearBoth">
		</div>
	{/if}

	{if isset($call.repeating)}
		<div class="centre-block">
			<div class="div-label">
				<h3>Repeating:</h3>
			</div>
			<div class="div-content">
				{$call.repeating|replace:'0':'NO'|replace:'1':'YES'}
			</div>
			<br class="clearBoth">
		</div>
	{/if}
	
	{if isset($call.url_to_call) && $call.url_to_call!=''}
	<div class="centre-block">
			<div class="div-label">
				<h3>Url:</h3>
			</div>
			<div class="div-content">
				<a href="{$call.url_to_call}" target="_blank">{$call.url_to_call}</a>
			</div>
			<br class="clearBoth">
		</div>
	{/if}
	<div id="tabs">
		<ul>
			{if isset($call.description) && $call.description != ""}
				<li><a href="#tabs-1">Description</a></li>
			{/if}	
			{if isset($call.requirements) && $call.requirements|@count > 0}
				<li><a href="#tabs-2">Requirements</a></li>
			{/if}
			{if isset($attachments) }
				<li><a href="#tabs-3">Attachments</a></li>
			{/if}
		</ul>
	
	{if isset($call.description) && $call.description != ""}
		<div id="tabs-1">
			{$call.description}
		</div>	
	{/if}
	{if isset($call.requirements) && $call.requirements != ""}
		<div id="tabs-2">
			{$call.requirements}
		</div>	
	{/if}

	{if isset($attachments)}
		<ul id="tabs-3" calss="bullet">
			{foreach from=$attachments item=attachment}
				<li><a href="{$link->getPageLink('attachment', true, NULL, "id_attachment={$attachment.id_attachment}")}">{$attachment.name|escape:'htmlall':'UTF-8'}</a><br />{$attachment.description|escape:'htmlall':'UTF-8'}
				</li>

			{/foreach}

		</ul>	
	{/if}

	</div>
		 
</div>

<!-- TODO add contact person here -->

<div class = "right-column">

	{if count($leaders) > 1}

	<div style="margin-bottom: 20px">
		<img class="logo" src="{$base_url}img/headers/call-contacts.png"/>
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
	{elseif isset($leaders[0])}
	<div style="margin-bottom: 20px">
		<div style="margin-left:100px; margin-bottom: -45px; position:relative; z-index:2;">
			<img src="../img/staff/{$leaders[0].id_customer}-staff.jpg" style="width:105px;"/>
		</div>
		<div style="position:relative;float:left;z-index:1;">
			<img class="logo" src="{$base_url}img/headers/call-contact.png"/>
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

	{if isset($funding_agency) && $funding_agency|@count > 0}
	<div style="margin-bottom: 20px">
		<img class="logo" src="{$base_url}img/headers/funding-agencies.png" />
		{foreach from=$funding_agency item=fa}
		<div class="row-logo">
			<div class="logo">
				{if $fa.url != ""}
				<a href="{$fa.url}" target="_blank">
				{/if}
					<img class="logo" src="../img/funding-agencies/{$fa.id_funding_agency}.jpg" />
				{if $fa.url != ""}
				</a>
				{/if}
			</div>	
		</div>
		<br class="clearBoth">
		{/foreach}
	</div>	
	{/if}

	
</div>

