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
<div class="centre-column-single">
	<h1>
		{$person.firstname|escape:'htmlall':'UTF-8'} {$person.lastname|escape:'htmlall':'UTF-8'}{if $person.title != ''}, <span style="color:#666;font-style:italic;font-size:0.8em;">{$person.title|escape:'htmlall':'UTF-8'}</span>{/if}
		{if $person.external}<span style="color:#ff0000;font-style:italic;font-size:0.6em;"> (external)</span>
		{else if !$person.active}<span style="color:#ff0000;font-style:italic;font-size:0.6em;"> (not working at IDT anymore)</span>
		{/if}
	</h1>
	<div class="centre-block">
		{if file_exists("img/staff/{$person.id_customer}-staff.jpg") }
			<div class="div-photo">
				<img src="{$img_url}staff/{$person.id_customer}-staff.jpg?time={time()}" >
			</div>
		{/if}	
		<div class="person-meta-data">
			{if isset($person.email) && $person.email != ""}
				<div class="div-label-2">
					<b>E-mail:</b>
				</div>
				<div class="div-content-2">
					{$person.email|escape:'htmlall':'UTF-8'}
				</div>
			{/if}
			
			{if isset($person.room) && $person.room != ""}
				<div class="div-label-2">
					<b>Room:</b>
				</div>
				<div class="div-content-2">
					{$person.room|escape:'htmlall':'UTF-8'}
				</div>
			{/if}
			
			{if isset($person.phone) && $person.phone != ""}
				<div class="div-label-2">
					<b>Phone:</b>
				</div>
				<div class="div-content-2">
					{$person.phone|escape:'htmlall':'UTF-8'}
				</div>
			{/if}
			
			{if isset($person.phone_alt) && $person.phone_alt != ""}
				<div class="div-label-2">
					<b>Phone (alt):</b>
				</div>
				<div class="div-content-2">
					{$person.phone_alt|escape:'htmlall':'UTF-8'}
				</div>
			{/if}			
			
		
			{if isset($divisions) && $divisions|@count > 0}
				<div class="div-label-2">
					{if isset($divisions) && $divisions|@count == 1}
					<b>Division:</b>
					{else}
					<b>Divisions:</b>
					{/if}
					</div>
				<div class="div-content-2">
					{$i = 1}
					{foreach from=$divisions item=division name=divisions}
						<a class="standardLink" href="{$base_url}divisions/{$division.id_initiative}-{$division.name|replace:"ö":"o"|replace:"Ö":"O"|replace:"ü":"u"|replace:"Ü":"U"|replace:"ä":"a"|replace:"Ä":"A"|replace:"å":"a"|replace:"Å":"A"|replace:"é":"e"|replace:"É":"E"|replace:"á":"a"|replace:"Á":"A"|regex_replace:"/[^A-Za-z0-9]/":"_"}">{$division.name|escape:'htmlall':'UTF-8'}</a>{if $divisions|@count != $i}<br>{/if}
						{$i = $i + 1}							
					{/foreach}
				</div>
			{/if}	
			{if isset($groups) && $groups|@count > 0}
				<div class="div-label-2">
					{if isset($groups) && $groups|@count == 1}
					<b>Research group:</b>
					{else}
					<b>Research groups:</b>
					{/if}
					</div>
				<div class="div-content-2">
					{$i = 1}
					{foreach from=$groups item=group name=groups}
						<a class="standardLink" href="{$base_url}research-groups/{$group.id_initiative}-{$group.name|replace:"ö":"o"|replace:"Ö":"O"|replace:"ü":"u"|replace:"Ü":"U"|replace:"ä":"a"|replace:"Ä":"A"|replace:"å":"a"|replace:"Å":"A"|replace:"é":"e"|replace:"É":"E"|replace:"á":"a"|replace:"Á":"A"|regex_replace:"/[^A-Za-z0-9]/":"_"}">{$group.name|escape:'htmlall':'UTF-8'}</a>{if $group|@count != $i}<br>{/if}
						{$i = $i + 1}							
					{/foreach}
				</div>
			{/if}	
			
			{if (isset($person.url) && $person.url != "") || (isset($person.url_private) && $person.url_private != "") || (isset($person.url_linkedin) && $person.url_linkedin != "")}
				<div class="div-label-2">
					<b>Web:</b>
				</div>
				<div class="div-content-2">
					{if isset($person.url_private) && $person.url_private != ""}
						<a class="standardLink" href="{$person.url_private}">
							Personal homepage
						</a>
						<br>
					{/if}
					{if isset($person.url) && $person.url != ""}
						<a class="standardLink" href="{$person.url}">
							Official university homepage
						</a>
						<br>
					{/if}
					{if isset($person.url_linkedin) && $person.url_linkedin != ""}
						<a class="standardLink" href="{$person.url_linkedin}">
							Linkedin page
						</a>
					{/if}
					<br>
				</div>
			{/if}
			
			<br class="clearBoth">
		</div>
		
		
		<br class="clearBoth">
	</div>

	<div id="tabs">
		<ul>
			{if isset($person.biography) && $person.biography != ""}
				<li><a href="#tabs-1">Biography</a></li>
			{/if}
			{if isset($person.research) && $person.research != ""}
				<li><a href="#tabs-2">Research</a></li>
			{/if}
			{if isset($publications) && $publications|@count > 0}
				<li><a href="#tabs-3">Publications</a></li>
			{/if}
			{if isset($projects) && $projects|@count > 0}
				<li><a href="#tabs-4">Projects</a></li>
			{/if}
			{if (isset($phd_students_main) && $phd_students_main|@count > 0) || (isset($phd_students_assistant) && $phd_students_assistant|@count > 0)}
				<li><a href="#tabs-5">PhD students</a></li>
			{/if}
			{if isset($msc_theses) && $msc_theses|@count > 0}
				<li><a href="#tabs-6">MSc theses</a></li>
			{/if}
		</ul>
	
	{if isset($person.biography) && $person.biography != ""}
		<div id="tabs-1">
			{$person.biography}
		</div>	
	{/if}
	
	{if isset($person.research) && $person.research != ""}
		<div id="tabs-2">
			{$person.research}
		</div>	
	{/if}
	
	{if isset($publications) && $publications|@count > 0}
		<div id="tabs-3">
		<p>
			<a href="{$base_url}publications?author={$person.id_customer}">[Show all publications]</a>
		</p>
		{if isset($person.url_scholar) && $person.url_scholar != ""}
			<p>
				<a href="{$person.url_scholar}">[Google Scholar author page]</a>
			</p>
		{/if}	
		
		<span style="display:block;margin-bottom:10px">
			<u>Latest publications:</u>
		</span>	
		
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
	{if isset($projects) && $projects|@count > 0}
		<div id="tabs-4">
			<table id="person-table" class="tablesorter" style="width:705px;"> 
				<thead> 
					<tr> 
						<th class="person-projects-list-title" style="width:400px;padding-left:3px">Project Title</th> 
						<th class="person-projects-list-status" style="width:80px;padding-left:3px">Status</th> 
					</tr> 
				</thead> 
				<tbody> 
					{foreach from=$projects item=project name=project}
					<tr>
						<td class="person-projects-list-title">
							<a href="{$base_url}projects/{$project.id_project}-{$project.name|replace:"ö":"o"|replace:"Ö":"O"|replace:"ü":"u"|replace:"Ü":"U"|replace:"ä":"a"|replace:"Ä":"A"|replace:"å":"a"|replace:"Å":"A"|replace:"é":"e"|replace:"É":"E"|replace:"á":"a"|replace:"Á":"A"|regex_replace:"/[^A-Za-z0-9]/":"_"}">
								{$project.name|escape:'htmlall':'UTF-8'}
							</a>
						</td>
						<td class="person-projects-list-status">
							<a href="{$base_url}projects/{$person.id_customer}-{$project.name|replace:"ö":"o"|replace:"Ö":"O"|replace:"ü":"u"|replace:"Ü":"U"|replace:"ä":"a"|replace:"Ä":"A"|replace:"å":"a"|replace:"Å":"A"|replace:"é":"e"|replace:"É":"E"|replace:"á":"a"|replace:"Á":"A"|regex_replace:"/[^A-Za-z0-9]/":"_"}">
								{$project.status|escape:'htmlall':'UTF-8'}
							</a>
						</td>
					</tr>
					{/foreach}
				</tbody> 
			</table>
		</div>	
	{/if}
	
	{if (isset($phd_students_main) && $phd_students_main|@count > 0) || (isset($phd_students_assistant) && $phd_students_assistant|@count > 0)}
		<div id="tabs-5">
			{if isset($phd_students_main) && $phd_students_main|@count > 0}
				<div style="margin-bottom:8px"> 
					PhD students supervised as main supervisor:
					<br class="clearBoth">
				</div>
				<p>
				{foreach from=$phd_students_main item=phd_student name=phd_students_main}
					<a class="standardLink" href="{$base_url}staff/{$phd_student.id_customer}-{$phd_student.firstname|replace:"ö":"o"|replace:"Ö":"O"|replace:"ü":"u"|replace:"Ü":"U"|replace:"ä":"a"|replace:"Ä":"A"|replace:"å":"a"|replace:"Å":"A"|replace:"é":"e"|replace:"É":"E"|replace:"á":"a"|replace:"Á":"A"|regex_replace:"/[^A-Za-z0-9]/":"_"}_{$phd_student.lastname|replace:"ö":"o"|replace:"Ö":"O"|replace:"ü":"u"|replace:"Ü":"U"|replace:"ä":"a"|replace:"Ä":"A"|replace:"å":"a"|replace:"Å":"A"|replace:"é":"e"|replace:"É":"E"|replace:"á":"a"|replace:"Á":"A"|regex_replace:"/[^A-Za-z0-9]/":"_"}">
						{$phd_student.firstname|escape:'htmlall':'UTF-8'} {$phd_student.lastname|escape:'htmlall':'UTF-8'}
					</a>
					{$is_phd_student = 0} 	
					{foreach from=$phd_student.positions item=position name=positions}
						{if $position.name == 'Doctoral student' or $position.name == 'Industrial Doctoral Student'}
							{$is_phd_student = 1} 									
						{/if} 
					{/foreach}
					
					{if $phd_student.active == 0 || $phd_student.away == 1 || $is_phd_student == 0}
						(former)
					{/if}
					<br>
				{/foreach}
				</p>
			{/if}
			{if isset($phd_students_assistant) && $phd_students_assistant|@count > 0}
				<div style="margin-bottom:8px"> 
					PhD students supervised as assistant supervisor:
					<br class="clearBoth">
				</div>
				<p>
				{foreach from=$phd_students_assistant item=phd_student name=phd_students_assistant}
					<a class="standardLink" href="{$base_url}staff/{$phd_student.id_customer}-{$phd_student.firstname|replace:"ö":"o"|replace:"Ö":"O"|replace:"ü":"u"|replace:"Ü":"U"|replace:"ä":"a"|replace:"Ä":"A"|replace:"å":"a"|replace:"Å":"A"|replace:"é":"e"|replace:"É":"E"|replace:"á":"a"|replace:"Á":"A"|regex_replace:"/[^A-Za-z0-9]/":"_"}_{$phd_student.lastname|replace:"ö":"o"|replace:"Ö":"O"|replace:"ü":"u"|replace:"Ü":"U"|replace:"ä":"a"|replace:"Ä":"A"|replace:"å":"a"|replace:"Å":"A"|replace:"é":"e"|replace:"É":"E"|replace:"á":"a"|replace:"Á":"A"|regex_replace:"/[^A-Za-z0-9]/":"_"}">
						{$phd_student.firstname|escape:'htmlall':'UTF-8'} {$phd_student.lastname|escape:'htmlall':'UTF-8'}
					</a>
					{$is_phd_student = 0} 	
					{foreach from=$phd_student.positions item=position name=positions}
						{if $position.name == 'Doctoral student' or $position.name == 'Industrial Doctoral Student'}
							{$is_phd_student = 1} 									
						{/if} 
					{/foreach}
					
					{if  $phd_student.active == 0 || $phd_student.away == 1 || $is_phd_student == 0}
						(former)
					{/if}
					<br>
				{/foreach}
				</p>
			{/if}			
		</div>
	{/if}	
	
	{if isset($msc_theses) && $msc_theses|@count > 0}
		<div id="tabs-6">
			MSc theses supervised (or examined): 
			<table id="person-table" class="tablesorter" style="width:705px;"> 
				<thead> 
					<tr> 
						<th class="person-projects-list-title" style="width:300px;padding-left:3px">Thesis Title</th> 
						<th class="person-projects-list-status" style="width:80px;padding-left:3px">Status</th> 
					</tr> 
				</thead> 
				<tbody> 
					{foreach from=$msc_theses item=msc_thesis name=msc_theses}
					<tr>
						<td class="msc-thesis-title">
							<a href="http://www.idt.mdh.se/examensarbete/index.php?choice=show&lang=en&id={$msc_thesis.id}">
								{$msc_thesis.title}
							</a>
						</td>
						<td class="msc-thesis-status">
							<a href="http://www.idt.mdh.se/examensarbete/index.php?choice=show&lang=en&id={$msc_thesis.id}">
								{$msc_thesis.status}
							</a>
						</td>
					</tr>
					{/foreach}
				</tbody> 
			</table>
		</div>
	{/if}	
	</div>
	
</div>