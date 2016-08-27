<!-- source: modules/editorial/editorial.tpl -->

<script type="text/javascript">
//<![CDATA[
$(document).ready(function()
{
	var data = [];
	for (i = 0; i < 10; i++)
	{
		data.push([parseInt($('#year_' + i).val()), parseInt($('#number_' + i).val())]);
  	}
	
	var profile = $( '#profile_name' ).val();

});
//]]> 


</script>

<!-- Module Editorial -->
<div id="editorial_block_center" class="editorial_block">
	<input type="hidden" id="profile_name" name="profile_name" value="{$profile_name}">
	
	{assign var="i" value=0}
	{foreach from=$number_of_publications item=row}
		<input type="hidden" id="year_{$i}" name="year_{$i}" value="{$row.publication_year}">
		<input type="hidden" id="number_{$i}" name="number_{$i}" value="{$row.count}">
		{assign var="i" value=$i+1}
	{/foreach}
	
	<img class="home-img" src="{$image_path}" />
	{if $editorial->body_paragraph}<div class="rte">{$editorial->body_paragraph|stripslashes}</div>
	{elseif $editorial->body_paragraph}<div class="rte">{$editorial->body_paragraph|stripslashes}</div>{/if}
	
	<b>{$profile_name} in numbers:</b><br>
	<br>
	<ul>
	<li>
			<a href="projects?status=2">Active research projects ({$number_of_active_research_projects})</a>
		</li>
	</ul>
	<br>
</div>
<!-- /Module Editorial -->
