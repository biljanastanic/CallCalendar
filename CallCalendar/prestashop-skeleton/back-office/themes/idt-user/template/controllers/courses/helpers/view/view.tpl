{extends file="helpers/view/view.tpl"}

{block name="override_tpl"}

	<fieldset>
		<ul>
			<li><span style="font-weight: bold; font-size: 13px; color:#000;">{l s='Name:'}</span> {$course[0]['name']}</li>
			<br>
			<li><span style="font-weight: bold; font-size: 13px; color:#000;">{l s='Type:'}</span><br> {$course[0]['type']}</li>
		</ul>
	</fieldset>

	<div class="separation"></div>
	<h2>{l s='Projects related to this course'}</h2>
	{$projectList}
	<div class="separation"></div>
	<h2>{l s='Initiatives related to this course'}</h2>
	{$initiativeList}

{/block}
