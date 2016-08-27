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

{if count($projects) && isset($projects)}

<script type="text/javascript">
        function doSearch() {
    		var searchText = new Array();
            searchText['id']= document.getElementById('searchID').value.toLowerCase();
            searchText['name']= document.getElementById('searchName').value.toLowerCase();
            searchText['type']=  document.getElementById('searchType').value.toLowerCase();
    		var targetTable = document.getElementById('dataTable');
    		//var targetTableColCount;

    		//Loop through table rows
    		for (var rowIndex = 2; rowIndex < targetTable.rows.length; rowIndex++) {
    			var rowData = new Array();

                if (navigator.appName == 'Microsoft Internet Explorer'){
    					rowData['id'] = targetTable.rows.item(rowIndex).cells.item(1).innerText.toLowerCase();
                		rowData['name'] = targetTable.rows.item(rowIndex).cells.item(2).innerText.toLowerCase();
                		rowData['type'] = targetTable.rows.item(rowIndex).cells.item(3).innerText.toLowerCase();
                
                }else
                {
    					rowData['id'] = targetTable.rows.item(rowIndex).cells.item(1).textContent.toLowerCase();    
    					rowData['name'] = targetTable.rows.item(rowIndex).cells.item(2).textContent.toLowerCase();    
    					rowData['type'] = targetTable.rows.item(rowIndex).cells.item(3).textContent.toLowerCase();    
                    
                }
    			if (rowData['id'].indexOf(searchText['id']) == -1 || rowData['name'].indexOf(searchText['name']) == -1 || rowData['type'].indexOf(searchText['type']) == -1)
    				targetTable.rows.item(rowIndex).style.display = 'none';
    			else
    				targetTable.rows.item(rowIndex).style.display = 'table-row';
    		}
    	}
    </script>

<div  class="tableContainerFixed">
<table cellspacing="0" cellpadding="0" class="table" style="width:100%;" id="dataTable">
<thead class="TableFixedHeader">
	<tr>
		<th>
			<input type="checkbox" name="checkme" id="checkme" class="noborder" onclick="checkDelBoxes(this.form, 'projectBox[]', this.checked)" />
		</th>
		<th>{l s='ID'}</th>
		<th>{l s='Project name'}</th>
		<th>{l s='Project type'}</th>
	</tr>
    <tr>
    <th></th>
    <th><input type="text" id="searchID" onkeyup="doSearch()" style="width:15px"/></th>
    <th><input type="text" id="searchName"  onkeyup="doSearch()" /></th>
    <th><input type="text" id="searchType" onkeyup="doSearch()" /></th>
    </tr>
	</thead>
	<tbody class="TableScrollContent">
	{foreach $projects as $key => $project}
		<tr {if $key %2}class="alt_row"{/if}>
			<td>
				{assign var=id_checkbox value=projectBox|cat:'_'|cat:$project['id_project']}
				<input type="checkbox" name="projectBox[]" class="projectBox" id="{$id_checkbox}" value="{$project['id_project']}" {if $fields_value[$id_checkbox]}checked="checked"{/if} />
			</td>
			<td>{$project['id_project']}</td>
			<td><label for="{$id_checkbox}" class="t">{$project['name']}</label></td>
			<td><label for="{$id_checkbox}" class="t">{$project['type']}</label></td>
		</tr>
	{/foreach}
	</tbody>
</table>
</div>
{else}
<p>{l s='No projects created'}</p>
{/if}