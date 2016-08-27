{*
* 2007-2012 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2012 PrestaShop SA
*  @version  Release: $Revision: 8971 $
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

{if count($initiatives) && isset($initiatives)}
<div style="max-height:250px;width:60em;overflow:auto;margin-bottom:20px;">
<table cellspacing="0" cellpadding="0" class="table" style="width:100%;">
	<tr>
		<th>
			<input type="checkbox" name="checkme" id="checkme" class="noborder" onclick="checkDelBoxes(this.form, 'initiativeBox[]', this.checked)" />
		</th>
		<th>{l s='ID'}</th>
		<th>Profile name</th>
	</tr>
	{foreach $initiatives as $key => $initiative}
		<tr {if $key %2}class="alt_row"{/if}>
			<td>
				{assign var=id_checkbox value=initiativeBox|cat:'_'|cat:$initiative['id_initiative']}
				<input type="checkbox" name="initiativeBox[]" class="initiativeBox" id="{$id_checkbox}" value="{$initiative['id_initiative']}" {if $fields_value[$id_checkbox]}checked="checked"{/if} />
			</td>
			<td>{$initiative['id_initiative']}</td>
			<td><label for="{$id_checkbox}" class="t">{$initiative['name']}</label></td>
		</tr>
	{/foreach}
</table>
</div>
{else}
<p>{l s='No profile created'}</p>
{/if}

