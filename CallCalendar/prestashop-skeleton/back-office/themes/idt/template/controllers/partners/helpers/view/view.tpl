{extends file="helpers/view/view.tpl"}

{block name="override_tpl"}

	<fieldset>
		<ul>
			<li><span style="font-weight: bold; font-size: 13px; color:#000;">{l s='Name:'}</span> {$partner[0]['name']}</li>
			<br>
			<li><span style="font-weight: bold; font-size: 13px; color:#000;">{l s='Type:'}</span><br> {$partner[0]['type']}</li>
			<br>
			<li><span style="font-weight: bold; font-size: 13px; color:#000;">{l s='Acronym:'}</span> {$partner[0]['acronym']}</li>
			<br>
			<li><span style="font-weight: bold; font-size: 13px; color:#000;">{l s='City:'}</span><br> {$partner[0]['city']}</li>
			<br>
			<li><span style="font-weight: bold; font-size: 13px; color:#000;">{l s='Country:'}</span><br> {$partner[0]['country']}</li>
		</ul>
	</fieldset>

	<div class="separation"></div>
	<h2>{l s='Projects related to this partner'}</h2>
	{$projectList}
	

{/block}
