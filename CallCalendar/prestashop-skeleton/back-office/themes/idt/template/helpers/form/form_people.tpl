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

{if count($persons) && isset($persons)}
<table cellspacing="0" cellpadding="0" class="table" style="width:50em;">
	<tr>
		<th>
			<input type="checkbox" name="checkme" id="checkme" class="noborder" onclick="checkDelBoxes(this.form, 'personBox[]', this.checked)" />
		</th>
		<th>{l s='person name'}</th>
	</tr>
	{foreach $persons as $key => $person}
		<tr {if $key %2}class="alt_row"{/if}>
			<td>
				{assign var=id_checkbox value=personBox|cat:'_'|cat:$person['id_person']}
				<input type="checkbox" name="personBox[]" class="personBox" id="{$id_checkbox}" value="{$person['id_person']}" {if $fields_value[$id_checkbox]}checked="checked"{/if} />
			</td>
			<td>{$person['id_person']}</td>
			<td><label for="{$id_checkbox}" class="t">{$person['name']}</label></td>
			<td><label for="{$id_checkbox}" class="t">{$person['type']}</label></td>
		</tr>
	{/foreach}
</table>
{else}
<p>{l s='No persons created'}</p>
{/if}