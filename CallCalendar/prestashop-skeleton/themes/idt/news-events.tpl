{capture name=path}{l s='News and Events'}{/capture}
<div class="centre-column">
<h1>{$item.title|escape:'htmlall':'UTF-8'}</h1>

{if !isset($speakers) && isset($item.speaker) && $item.speaker <> ''}
		<div class="centre-block">
			<div class="div-label">
				<h3>Speaker:</h3>
			</div>
			<div class="div-content">
				{$item.speaker|escape:'htmlall':'UTF-8'}				
			</div>
			<br class="clearBoth">
		</div>
	{/if}
	
	{if isset($speakers)}
		<div class="centre-block">
			<div class="div-label">
				<h3>Speaker{if ($speakers|@count > 1) || (isset($item.speaker) && $item.speaker <> '')}s{/if}:</h3>
			</div>
			<div class="div-content">
				{$i = 1}
				{foreach from=$speakers item=speaker name=speakers}
					<a href="{$base_url}staff/{$speaker.id_customer}-{$speaker.firstname|replace:"ö":"o"|replace:"Ö":"O"|replace:"ü":"u"|replace:"Ü":"U"|replace:"ä":"a"|replace:"Ä":"A"|replace:"å":"a"|replace:"Å":"A"|replace:"é":"e"|replace:"É":"E"|replace:"á":"a"|replace:"Á":"A"|regex_replace:"/[^A-Za-z0-9]/":"_"}_{$speaker.lastname|replace:"ö":"o"|replace:"Ö":"O"|replace:"ü":"u"|replace:"Ü":"U"|replace:"ä":"a"|replace:"Ä":"A"|replace:"å":"a"|replace:"Å":"A"|replace:"é":"e"|replace:"É":"E"|replace:"á":"a"|replace:"Á":"A"|regex_replace:"/[^A-Za-z0-9]/":"_"}">
						{$speaker.firstname|escape:'htmlall':'UTF-8'} {$speaker.lastname|escape:'htmlall':'UTF-8'}{if $speakers|@count != $i},{/if}
					</a>
					{$i = $i + 1}							
				{/foreach}
				
			{if isset($item.speaker) && $item.speaker <> ''}
				, {$item.speaker|escape:'htmlall':'UTF-8'}	{/if}
			</div>
			<br class="clearBoth">
		</div>
	{/if}	
	
{if isset($item.type) && $item.type <> ''}
		<div class="centre-block">
			<div class="div-label">
				<h3>Type:</h3>
			</div>
			<div class="div-content">
				{$item.type|escape:'htmlall':'UTF-8'}				
			</div>
			<br class="clearBoth">
		</div>


{if isset($item.date_time_start) && $item.date_time_start <> '' &&  $item.type!="News"}
		<div class="centre-block">
			<div class="div-label">
				<h3>Start time:</h3>
			</div>
			<div class="div-content">
				{$item.date_time_start|date_format:'%Y-%m-%d %H:%M'}				
			</div>
			<br class="clearBoth">
		</div>
	{/if}
{if isset($item.date_time_end) && $item.date_time_end <> '' && $item.type!="News"}
		<div class="centre-block">
			<div class="div-label">
				<h3>End time:</h3>
			</div>
			<div class="div-content">
				{$item.date_time_end|date_format:'%Y-%m-%d %H:%M'}				
			</div>
			<br class="clearBoth">
		</div>
	{/if}	

{/if}	
{if isset($item.venue) && $item.venue <> ''}
		<div class="centre-block">
			<div class="div-label">
				<h3>Location:</h3>
			</div>
			<div class="div-content">
				{$item.venue|escape:'htmlall':'UTF-8'}				
			</div>
			<br class="clearBoth">
		</div>
		
{/if}

{if $attached_files}
		<div class="centre-block">
			<div class="div-label">
				<h3>Download attachment:</h3>
			</div>
			<div class="div-content">
				<a id="fulltext-url" href="{$attach_files}"></a>
				<img id="fulltext" border="0" src="{$base_url}img/file_icon.png" style="cursor:pointer">
			</div>
			<br class="clearBoth">
		</div>
	{/if}

{if isset($contact)}
	<div class="centre-block">
			<div class="div-label">
				<h3>Contact person:</h3>
			</div>
			<div class="div-content">
					<a href="{$base_url}staff/{$contact.id_customer}-{$contact.firstname|replace:"ö":"o"|replace:"Ö":"O"|replace:"ü":"u"|replace:"Ü":"U"|replace:"ä":"a"|replace:"Ä":"A"|replace:"å":"a"|replace:"Å":"A"|replace:"é":"e"|replace:"É":"E"|replace:"á":"a"|replace:"Á":"A"|regex_replace:"/[^A-Za-z0-9]/":"_"}_{$contact.lastname|replace:"ö":"o"|replace:"Ö":"O"|replace:"ü":"u"|replace:"Ü":"U"|replace:"ä":"a"|replace:"Ä":"A"|replace:"å":"a"|replace:"Å":"A"|replace:"é":"e"|replace:"É":"E"|replace:"á":"a"|replace:"Á":"A"|regex_replace:"/[^A-Za-z0-9]/":"_"}">
						{$contact.firstname|escape:'htmlall':'UTF-8'} {$contact.lastname|escape:'htmlall':'UTF-8'}
					</a>
			</div>
			<br class="clearBoth">
		</div>
	{/if}
	
{if isset($item.content) && $item.content <> ''}
		<hr>
		<h2>Description</h2>
		<div class="centre-block">
			{$item.content}				
			<br class="clearBoth">
		</div>
	{/if}	
	</div>

{if isset($speakers) && $speakers|@count > 0}
<div class="right-column">
	{if count($speakers) > 1}
	<div style="margin-bottom: 20px">
		<img class="logo" src="{$base_url}img/headers/speakers.png"/>
		{foreach from=$speakers item=speaker}
		<div class="row">
			<div style="float:left">
				<img src="../img/staff/{$speaker.id_customer}-staff.jpg" style="width:72px;"/>
			</div>	
			<div style="float:left;width:120px;margin-left:10px">
				<br>
				<h3>
					<a href="{$base_url}staff/{$speaker.id_customer}-{$speaker.firstname|replace:"ö":"o"|replace:"Ö":"O"|replace:"ü":"u"|replace:"Ü":"U"|replace:"ä":"a"|replace:"Ä":"A"|replace:"å":"a"|replace:"Å":"A"|replace:"é":"e"|replace:"É":"E"|replace:"á":"a"|replace:"Á":"A"|regex_replace:"/[^A-Za-z0-9]/":"_"}_{$speaker.lastname|replace:"ö":"o"|replace:"Ö":"O"|replace:"ü":"u"|replace:"Ü":"U"|replace:"ä":"a"|replace:"Ä":"A"|replace:"å":"a"|replace:"Å":"A"|replace:"é":"e"|replace:"É":"E"|replace:"á":"a"|replace:"Á":"A"|regex_replace:"/[^A-Za-z0-9]/":"_"}">
						{$speaker.firstname} {$speaker.lastname}, {$speaker.title}
					</a>			
				</h3>
				{if isset($speaker.email)}Email: {$speaker.email}{/if}			
			</div>	
		</div>
		<br class="clearBoth">
		{/foreach}
	</div>
	{else isset($speakers[0])}
	<div style="margin-bottom: 20px">
		<div style="margin-left:90px; margin-bottom: -27px; position:relative; z-index:2;">
			<img src="../img/staff/{$speakers[0].id_customer}-staff.jpg" style="width:105px;"/>
		</div>
		<div style="position:relative;float:left;z-index:1;">
			<img class="logo" src="{$base_url}img/headers/speaker.png"/>
			<h3>
				<a href="{$base_url}staff/{$speakers[0].id_customer}-{$speakers[0].firstname|replace:"ö":"o"|replace:"Ö":"O"|replace:"ü":"u"|replace:"Ü":"U"|replace:"ä":"a"|replace:"Ä":"A"|replace:"å":"a"|replace:"Å":"A"|replace:"é":"e"|replace:"É":"E"|replace:"á":"a"|replace:"Á":"A"|regex_replace:"/[^A-Za-z0-9]/":"_"}_{$speakers[0].lastname|replace:"ö":"o"|replace:"Ö":"O"|replace:"ü":"u"|replace:"Ü":"U"|replace:"ä":"a"|replace:"Ä":"A"|replace:"å":"a"|replace:"Å":"A"|replace:"é":"e"|replace:"É":"E"|replace:"á":"a"|replace:"Á":"A"|regex_replace:"/[^A-Za-z0-9]/":"_"}">
					{$speakers[0].firstname} {$speakers[0].lastname}, {$speakers[0].title}
				</a>			
				</h3>
			{if isset($speakers[0].email)}Email: {$speakers[0].email}{/if}
		</div>
		<br class="clearBoth">
	</div>
	{/if}	
</div>
	{/if}	