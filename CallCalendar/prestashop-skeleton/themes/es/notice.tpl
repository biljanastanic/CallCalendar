{capture name=path}{l s='Research Group'}{/capture}
<script type="text/javascript">
//<![CDATA[

//]]>
</script>
<style type="text/css">
table#rg_members{
	width:535px;
	border:0;
    cellspacing:0;
	cellpadding:0;
    align:left;
	margin-bottom:10px;}
	
table#rg_members tr{
background:transparent;
border:0;}
table#rg_members td{
background:transparent;
border:0;
valign:top; 
}
.leader_sign {
height:180px;
width:100%;
background-image: url({$img_dir}right_column_back.png);
background-position:bottom;
}

.leader_sign td
{
border:0;
}
</style>
<div id="res_groups">
	<h1>{$title}</h1>
		<table id="rg_members">  
			<tr>
				<td  width="80" valign="top" >
				Members:
				</td>
				<td>
					{if isset($members)}
				<ul>
				{foreach from=$members item=member name=members}
					<li>
					<a href="#">{$member.firstname|escape:'htmlall':'UTF-8'}&#32;{$member.lastname|escape:'htmlall':'UTF-8'}</a>
					<!---{$member.firstname|escape:'htmlall':'UTF-8'}&#32;{$member.lastname|escape:'htmlall':'UTF-8'}-->
					</li>
				{/foreach}
				</ul>
				{/if}
				</td>
			</tr>
			<tr><td colspan="2" style="BORDER-BOTTOM: solid 1px #aabac4;" align="center">&nbsp;</td></tr>
			<tr style="background-color:transparent">
			<td colspan="2">
			<h1>Introduction</h1>
			{if isset($introduction)}
			{$introduction}
			{/if}
			</td>
			</tr>
			<tr><td colspan="2" style="BORDER-BOTTOM: solid 1px #aabac4;" align="center">&nbsp;</td></tr>
			<tr style="background-color:transparent">
			<td colspan="2">
			<h1>Ongoing projects <a href="#" style="font-size:70%">[Show all projects]</a></h1>
			{if isset($projects)}
				<ul>
				{foreach from=$projects item=project name=projects}
					<li><a href="#">{$project.acronym|escape:'htmlall':'UTF-8'} - {$project.title|escape:'htmlall':'UTF-8'}</a>
					</li>
				{/foreach}
				</ul>
			{/if}
			</td>
			</tr>
			<tr><td colspan="2" style="BORDER-BOTTOM: solid 1px #aabac4;" align="center">&nbsp;</td></tr>
			<tr style="background-color:transparent;">
			<td colspan="2">
			<h1>Latest group publications <a href="#" style="font-size:70%">[Show all publications]</a></h1>
			{if isset($projects)}
				<ul >
				{foreach from=$publications item=publication name=publications}
					<li><a href="#">{$publication.title|escape:'htmlall':'UTF-8'}</a>
					</li>
				{/foreach}
				</ul>
			{/if}
			</td>
			</tr>
	</table>
	
</div>

<div class="right-column">
	<div style="position:relative;float:left;z-index:1;top:150px">
		<img class="logo" src="{$base_url}img/headers/group-leader.png"/>
	</div>
	<div style="margin-left:80px;position:relative;z-index:2;">
		<img src="{$img_url}staff/{$leader[0].id_customer}-staff.jpg" style="width:105px;"/>
	</div>
	<div style="margin-top:16px">
		<h3><a>{$leader[0].firstname} {$leader[0].lastname},{$leader[0].title}</a></h3>
		Email: {$leader[0].email}
		<br>Room: {$leader[0].room}
		<br>Phone: {$leader[0].phone}
	</div>
</div>


