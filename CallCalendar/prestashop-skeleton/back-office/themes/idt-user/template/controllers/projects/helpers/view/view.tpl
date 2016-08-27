{extends file="helpers/view/view.tpl"}

{block name="override_tpl"}

	<fieldset>
		<ul>
			<li><span style="font-weight: bold; font-size: 13px; color:#000;">{l s='Name:'}</span> {$project[0]['name']}</li>
			<br>
			<li><span style="font-weight: bold; font-size: 13px; color:#000;">{l s='Type:'}</span><br> {$project[0]['type']}</li>
			<br>
			<li><span style="font-weight: bold; font-size: 13px; color:#000;">{l s='Acronym:'}</span> {$project[0]['acronym']}</li>
			<br>
			<li><span style="font-weight: bold; font-size: 13px; color:#000;">{l s='Status:'}</span><br> {$project[0]['status']}</li>
			<br>
			<li><span style="font-weight: bold; font-size: 13px; color:#000;">{l s='Registry number:'}</span><br> {$project[0]['registry_number']}</li>
			<br>
			<li><span style="font-weight: bold; font-size: 13px; color:#000;">{l s='URL:'}</span><br> {$project[0]['url']}</li>
			<br>
			<li><span style="font-weight: bold; font-size: 13px; color:#000;">{l s='Start date:'}</span><br> {$project[0]['date_start']}</li>
			<br>
			<li><span style="font-weight: bold; font-size: 13px; color:#000;">{l s='End date:'}</span><br> {$project[0]['date_end']}</li>
			<br>
			<li><span style="font-weight: bold; font-size: 13px; color:#000;">{l s='Keywords:'}</span> {$project[0]['keywords']}</li>
			<br>
			<li><span style="font-weight: bold; font-size: 13px; color:#000;">{l s='Partners:'}</span> {$project[0]['partners']}</li>
			<br>
			<li><span style="font-weight: bold; font-size: 13px; color:#000;">{l s='Overview:'}</span> {$project[0]['overview']}</li>
			<br>
			<li><span style="font-weight: bold; font-size: 13px; color:#000;">{l s='Results:'}</span> {$project[0]['results']}</li>
			<br>
			<li><span style="font-weight: bold; font-size: 13px; color:#000;">{l s='Future work:'}</span> {$project[0]['future_work']}</li>
		</ul>
	</fieldset>

	<div class="separation"></div>
	<h2>{l s='Funding agencies related to this project'}</h2>
	{$fundingAgenciesList}
		<div class="separation"></div>
	<h2>{l s='Initiatives related to this project'}</h2>
	{$initiativesList}
		<div class="separation"></div>
	<h2>{l s='Partners related to this project'}</h2>
	{$partnerList}

{/block}
