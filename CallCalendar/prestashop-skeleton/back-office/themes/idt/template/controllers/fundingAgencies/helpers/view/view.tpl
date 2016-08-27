{extends file="helpers/view/view.tpl"}

{block name="override_tpl"}

	<fieldset>
		<ul>
			<li><span style="font-weight: bold; font-size: 13px; color:#000;">{l s='Name:'}</span> {$partner->name[$language->id]}</li>
			<br>
			<li><span style="font-weight: bold; font-size: 13px; color:#000;">{l s='Type:'}</span><br> {$tc[0]['type']}</li>
			<br>
			<li><span style="font-weight: bold; font-size: 13px; color:#000;">{l s='Acronym:'}</span> {$partner->acronym[$language->id]}</li>
			<br>
			<li><span style="font-weight: bold; font-size: 13px; color:#000;">{l s='City:'}</span><br> {$partner->city[$language->id]}</li>
			<br>
			<li><span style="font-weight: bold; font-size: 13px; color:#000;">{l s='Country:'}</span><br> {$tc[0]['country']}</li>
		</ul>
	</fieldset>

	<div class="separation"></div>
	<h2>{l s='Projects related to this partner'}</h2>
	{$projectList}
	

{/block}
