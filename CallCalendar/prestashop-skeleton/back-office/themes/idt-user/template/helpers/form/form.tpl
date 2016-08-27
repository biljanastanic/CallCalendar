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

{if $show_toolbar}
	{include file="toolbar.tpl" toolbar_btn=$toolbar_btn toolbar_scroll=$toolbar_scroll title=$title}
	<div class="leadin">{block name="leadin"}{/block}</div>
{/if}

{if isset($fields.title)}<h2>{$fields.title}</h2>{/if}
{block name="defaultForm"}
<form id="{$table}_form" class="defaultForm {$name_controller}" action="{$current}&{if !empty($submit_action)}{$submit_action}=1{/if}&token={$token}" method="post" enctype="multipart/form-data" {if isset($style)}style="{$style}"{/if}>
	{if $form_id}
		<input type="hidden" name="{$identifier}" id="{$identifier}" value="{$form_id}" />
	{/if}
	{foreach $fields as $f => $fieldset}
		<fieldset id="fieldset_{$f}">
		{if $table=="publication"}
			{if $required_fields}
				<div class="margin-small"><sup>*</sup> {l s='Required field'}</div>
			{/if}
				<div class="margin-small"><sup>§</sup> {l s='Diva required field for the selected publication type'}</div>
				<br/>
			{/if}
			{foreach $fieldset.form as $key => $field}
				{if $key == 'legend'}
					<legend>
						{if isset($field.image)}<img src="{$field.image}" alt="{$field.title|escape:'htmlall':'UTF-8'}" />{/if}
						{$field.title}
					</legend>
				{elseif $key == 'description' && $field}
					<p class="description">{$field}</p>
				{elseif $key == 'input'}
					{foreach $field as $input}
						{if $input.type == 'hidden'}
							<input type="hidden" name="{$input.name}" id="{$input.name}" value="{$fields_value[$input.name]|escape:'htmlall':'UTF-8'}" />
						{else}
							{if $input.name == 'id_state'}
								<div id="contains_states" {if $contains_states}style="display:none;"{/if}>
							{/if}
							{block name="label"}
								{if isset($input.label)}<label>{$input.label} </label>{/if}
							{/block}
							{block name="field"}
								<div class="margin-form">
								{block name="input"}
								{if $input.type == 'text' || $input.type == 'tags'}
									{if isset($input.lang)}
										<div class="translatable">
											{foreach $languages as $language}
												<div class="lang_{$language.id_lang}" style="display:{if $language.id_lang == $defaultFormLanguage}block{else}none{/if}; float: left;">
													{if $input.type == 'tags'}
														{literal}
														<script type="text/javascript">
															$().ready(function () {
																var input_id = '{/literal}{if isset($input.id)}{$input.id}_{$language.id_lang}{else}{$input.name}_{$language.id_lang}{/if}{literal}';
																$('#'+input_id).tagify({addTagPrompt: '{/literal}{l s='Add tag' js=1}{literal}'});
																$({/literal}'#{$table}{literal}_form').submit( function() {
																	$(this).find('#'+input_id).val($('#'+input_id).tagify('serialize'));
																});
															});
														</script>
														{/literal}
													{/if}
													{assign var='value_text' value=$fields_value[$input.name][$language.id_lang]}
													<input type="text"
															name="{$input.name}_{$language.id_lang}"
															id="{if isset($input.id)}{$input.id}_{$language.id_lang}{else}{$input.name}_{$language.id_lang}{/if}"
															value="{if isset($input.string_format) && $input.string_format}{$value_text|string_format:$input.string_format|escape:'htmlall':'UTF-8'}{else}{$value_text|escape:'htmlall':'UTF-8'}{/if}"
															class="{if $input.type == 'tags'}tagify {/if}{if isset($input.class)}{$input.class}{/if}"
															{if isset($input.size)}size="{$input.size}"{/if}
															{if isset($input.maxlength)}maxlength="{$input.maxlength}"{/if}
															{if isset($input.readonly) && $input.readonly}readonly="readonly"{/if}
															{if isset($input.disabled) && $input.disabled}disabled="disabled"{/if}
															{if isset($input.autocomplete) && !$input.autocomplete}autocomplete="off"{/if} />
													{if !empty($input.hint)}<span class="hint" name="help_box">{$input.hint}<span class="hint-pointer">&nbsp;</span></span>{/if}
												</div>
											{/foreach}
										</div>
									{else}
										{if $input.type == 'tags'}
											{literal}
											<script type="text/javascript">
												$().ready(function () {
													var input_id = '{/literal}{if isset($input.id)}{$input.id}{else}{$input.name}{/if}{literal}';
													$('#'+input_id).tagify();
													$('#'+input_id).tagify({addTagPrompt: '{/literal}{l s='Add tag'}{literal}'});
													$({/literal}'#{$table}{literal}_form').submit( function() {
														$(this).find('#'+input_id).val($('#'+input_id).tagify('serialize'));
													});
												});
											</script>
											{/literal}
										{/if}
										{assign var='value_text' value=$fields_value[$input.name]}
										<input type="text"
												name="{$input.name}"
												id="{if isset($input.id)}{$input.id}{else}{$input.name}{/if}"
												value="{if isset($input.string_format) && $input.string_format}{$value_text|string_format:$input.string_format|escape:'htmlall':'UTF-8'}{else}{$value_text|escape:'htmlall':'UTF-8'}{/if}"
												class="{if $input.type == 'tags'}tagify {/if}{if isset($input.class)}{$input.class}{/if}"
												{if isset($input.size)}size="{$input.size}"{/if}
												{if isset($input.maxlength)}maxlength="{$input.maxlength}"{/if}
												{if isset($input.class)}class="{$input.class}"{/if}
												{if isset($input.readonly) && $input.readonly}readonly="readonly"{/if}
												{if isset($input.disabled) && $input.disabled}disabled="disabled"{/if}
												{if isset($input.autocomplete) && !$input.autocomplete}autocomplete="off"{/if} />
										{if isset($input.suffix)}{$input.suffix}{/if}
										{if !empty($input.hint)}<span class="hint" name="help_box">{$input.hint}<span class="hint-pointer">&nbsp;</span></span>{/if}
									{/if}
								{elseif $input.type == 'select'}
									{if isset($input.options.query) && !$input.options.query && isset($input.empty_message)}
										{$input.empty_message}
										{$input.required = false}
										{$input.desc = null}
									{else}
										<select name="{$input.name}" class=""
												id="{if isset($input.id)}{$input.id}{else}{$input.name}{/if}"
												{if isset($input.multiple)}multiple="multiple" {/if}
												{if isset($input.size)}size="{$input.size}"{/if}
												{if isset($input.onchange)}onchange="{$input.onchange}"{/if}>
											{if isset($input.options.default)}
												<option value="{$input.options.default.value}">{$input.options.default.label}</option>
											{/if}
											{if isset($input.options.optiongroup)}
												{foreach $input.options.optiongroup.query AS $optiongroup}
													<optgroup label="{$optiongroup[$input.options.optiongroup.label]}">
														{foreach $optiongroup[$input.options.options.query] as $option}
															<option value="{$option[$input.options.options.id]}"
																{if isset($input.multiple)}
																	{foreach $fields_value[$input.name] as $field_value}
																		{if $field_value == $option[$input.options.options.id]}selected="selected"{/if}
																	{/foreach}
																{else}
																	{if $fields_value[$input.name] == $option[$input.options.options.id]}selected="selected"{/if}
																{/if}
															>{$option[$input.options.options.name]}</option>
														{/foreach}
													</optgroup>
												{/foreach}
											{else}
												{foreach $input.options.query AS $option}
													{if is_object($option)}
														<option value="{$option->$input.options.id}"
															{if isset($input.multiple)}
																{foreach $fields_value[$input.name] as $field_value}
																	{if $field_value == $option->$input.options.id}
																		selected="selected"
																	{/if}
																{/foreach}
															{else}
																{if $fields_value[$input.name] == $option->$input.options.id}
																	selected="selected"
																{/if}
															{/if}
														>{$option->$input.options.name}</option>
													{else}
														<option value="{$option[$input.options.id]}"
															{if isset($input.multiple)}
																{foreach $fields_value[$input.name] as $field_value}
																	{if $field_value == $option[$input.options.id]}
																		selected="selected"
																	{/if}
																{/foreach}
															{else}
																{if $fields_value[$input.name] == $option[$input.options.id]}
																	selected="selected"
																{/if}
															{/if}
														>{$option[$input.options.name]}</option>

													{/if}
												{/foreach}
											{/if}
										</select>
										{if !empty($input.hint)}<span class="hint" name="help_box">{$input.hint}<span class="hint-pointer">&nbsp;</span></span>{/if}
									{/if}
								{elseif $input.type == 'radio'}
									{foreach $input.values as $value}
										<input type="radio"	name="{$input.name}"id="{$value.id}" value="{$value.value|escape:'htmlall':'UTF-8'}"
												{if $fields_value[$input.name] == $value.value}checked="checked"{/if}
												{if isset($input.disabled) && $input.disabled}disabled="disabled"{/if} />
										<label {if isset($input.class)}class="{$input.class}"{/if} for="{$value.id}">
										 {if isset($input.is_bool) && $input.is_bool == true}
											{if $value.value == 1}
												<img src="../img/admin/enabled.gif" alt="{$value.label}" title="{$value.label}" />
											{else}
												<img src="../img/admin/disabled.gif" alt="{$value.label}" title="{$value.label}" />
											{/if}
										 {else}
											{$value.label}
										 {/if}
										</label>
										{if isset($input.br) && $input.br}<br />{/if}
										{if isset($value.p) && $value.p}<p>{$value.p}</p>{/if}
									{/foreach}
								{elseif $input.type == 'textarea'}
									{if isset($input.lang)}
										<div class="translatable">
											{foreach $languages as $language}
												<div class="lang_{$language.id_lang}" id="{$input.name}_{$language.id_lang}" style="display:{if $language.id_lang == $defaultFormLanguage}block{else}none{/if}; float: left;">
													<textarea cols="{$input.cols}" rows="{$input.rows}" name="{$input.name}_{$language.id_lang}" {if isset($input.autoload_rte) && $input.autoload_rte}class="rte autoload_rte"{/if} >{$fields_value[$input.name][$language.id_lang]|escape:'htmlall':'UTF-8'}</textarea>
												</div>
											{/foreach}
										</div>
									{else}
										<textarea name="{$input.name}" cols="{$input.cols}" rows="{$input.rows}" {if isset($input.autoload_rte) && $input.autoload_rte}class="rte autoload_rte"{/if}>{$fields_value[$input.name]|escape:'htmlall':'UTF-8'}</textarea>
									{/if}
								{elseif $input.type == 'checkbox'}
									{foreach $input.values.query as $value}
										{assign var=id_checkbox value=$input.name|cat:'_'|cat:$value[$input.values.id]}
										<input type="checkbox"
											name="{$id_checkbox}"
											id="{$id_checkbox}"
											{if isset($value.val)}value="{$value.val|escape:'htmlall':'UTF-8'}"{/if}
											{if isset($fields_value[$id_checkbox]) && $fields_value[$id_checkbox]}checked="checked"{/if} />
										<label for="{$id_checkbox}" class="t"><strong>{$value[$input.values.name]}</strong></label><br />
									{/foreach}
								{elseif $input.type == 'photo_file'}
									{if isset($input.display_image) && $input.display_image}
										{if isset($fields_value.image) && $fields_value.image}
											<div id="staff_image">
												{$fields_value.image}
												<p align="center">{l s='File size'} {$fields_value.size}kb</p>
												<a href="{$current}&{$identifier}={$form_id}&token={$token}&deleteImage=1">
													<img src="../img/admin/delete.gif" alt="{l s='Delete'}" /> {l s='Delete'}
												</a>
												<br>
												<a href="../img/staff/{$form_id}.jpg">
													<img src="../img/admin/arrow-right.png" style="vertical-align:middle;padding-bottom:3px"/> {l s='Link to original resolution image'}
												</a>
											</div><br />
										{/if}
									{/if}
									<input type="file" name="{$input.name}" {if isset($input.id)}id="{$input.id}"{/if} />
									{if !empty($input.hint)}<span class="hint" name="help_box">{$input.hint}<span class="hint-pointer">&nbsp;</span></span>{/if}
								{elseif $input.type == 'funding_agency_logo_file'}
									{if isset($input.display_image) && $input.display_image}
										{if isset($fields_value.image) && $fields_value.image}
											<div id="funding_agency_image">
												{$fields_value.image}
												<p align="center">{l s='File size'} {$fields_value.size}kb</p>
												<a href="{$current}&{$identifier}={$form_id}&token={$token}&deleteImage=1">
													<img src="../img/admin/delete.gif" alt="{l s='Delete'}" /> {l s='Delete'}
												</a>
											</div><br />
										{/if}
									{/if}
									<input type="file" name="{$input.name}" {if isset($input.id)}id="{$input.id}"{/if} />
									{if !empty($input.hint)}<span class="hint" name="help_box">{$input.hint}<span class="hint-pointer">&nbsp;</span></span>{/if}

								{elseif $input.type == 'partner_logo_file'}
									{if isset($input.display_image) && $input.display_image}
										{if isset($fields_value.image) && $fields_value.image}
											<div id="partner_image">
												{$fields_value.image}
												<p align="center">{l s='File size'} {$fields_value.size}kb</p>
												<a href="{$current}&{$identifier}={$form_id}&token={$token}&deleteImage=1">
													<img src="../img/admin/delete.gif" alt="{l s='Delete'}" /> {l s='Delete'}
												</a>
											</div><br />
										{/if}
									{/if}
									<input type="file" name="{$input.name}" {if isset($input.id)}id="{$input.id}"{/if} />
									{if !empty($input.hint)}<span class="hint" name="help_box">{$input.hint}<span class="hint-pointer">&nbsp;</span></span>{/if}
				
								{elseif $input.type == 'publication_pdf'}
								{if isset($input.pdf) && $input.pdf}
											<div id="publication_pdf_link">
												<a href="{$input.pdf}" target="_blank">
													<img src="../img/pdf.gif" alt="{l s='Open'}" /> {l s='Open'}
												</a>
											</div><br />
										{/if}
								<input type="file" name="{$input.name}" {if isset($input.id)}id="{$input.id}"{/if} />
									{if !empty($input.hint)}<span class="hint" name="help_box">{$input.hint}<span class="hint-pointer">&nbsp;</span></span>{/if}
								{elseif $input.type == 'file_uploading'}
								{if isset($input.file_path) && $input.file_path}
											<div id="news_and_events_file_link">
												<a href="{$input.file_path}" target="_blank">
													<img src="../img/file_icon.png" alt="{l s='Open'}" /> {l s='Open'}
												</a>
											</div><br />
										{/if}
								<input type="file" name="{$input.name}" {if isset($input.id)}id="{$input.id}"{/if} />
								{if !empty($input.hint)}<span class="hint" name="help_box">{$input.hint}<span class="hint-pointer">&nbsp;</span></span>{/if}
									
								{elseif $input.type == 'diva_label'}
								<div>
								<a {if isset($input.style)}style="{$input.style}"{/if}>
								{if isset($input.value)}
												{$input.value}
										{/if}</a></div><br />
										
								{elseif $input.type == 'file'}
									{if isset($input.display_image) && $input.display_image}
										{if isset($fields_value.image) && $fields_value.image}
											<div id="image">
												{$fields_value.image}
												<p align="center">{l s='File size'} {$fields_value.size}kb</p>
												<a href="{$current}&{$identifier}={$form_id}&token={$token}&deleteImage=1">
													<img src="../img/admin/delete.gif" alt="{l s='Delete'}" /> {l s='Delete'}
												</a>
											</div><br />
										{/if}
									{/if}
									<input type="file" name="{$input.name}" {if isset($input.id)}id="{$input.id}"{/if} />
									{if !empty($input.hint)}<span class="hint" name="help_box">{$input.hint}<span class="hint-pointer">&nbsp;</span></span>{/if}
								{elseif $input.type == 'password'}
									<input type="password"
											name="{$input.name}"
											size="{$input.size}"
											value=""
											{if isset($input.autocomplete) && !$input.autocomplete}autocomplete="off"{/if} />
								{elseif $input.type == 'birthday'}
									{foreach $input.options as $key => $select}
										<select name="{$key}" class="">
											<option value="">-</option>
											{if $key == 'months'}
												{*
													This comment is useful to the translator tools /!\ do not remove them
													{l s='January'}
													{l s='February'}
													{l s='March'}
													{l s='April'}
													{l s='May'}
													{l s='June'}
													{l s='July'}
													{l s='August'}
													{l s='September'}
													{l s='October'}
													{l s='November'}
													{l s='December'}
												*}
												{foreach $select as $k => $v}
													<option value="{$k}" {if $k == $fields_value[$key]}selected="selected"{/if}>{l s=$v}</option>
												{/foreach}
											{else}
												{foreach $select as $v}
													<option value="{$v}" {if $v == $fields_value[$key]}selected="selected"{/if}>{$v}</option>
												{/foreach}
											{/if}

										</select>
									{/foreach}
								{elseif $input.type == 'group'}
									{assign var=groups value=$input.values}
									{include file='helpers/form/form_group.tpl'}
								{elseif $input.type == 'initiative'}
									{assign var=initiatives value=$input.values}
									{assign var=initiative_types value=$input.initiative_types}
									{include file='helpers/form/form_initiative.tpl'}
								{elseif $input.type == 'profile'}
									{assign var=initiatives value=$input.values}
									{include file='helpers/form/form_profile.tpl'}
								{elseif $input.type == 'customer_initiative'} 
									{assign var=initiatives value=$input.values}
									{assign var=roles value=$input.roles}
									{assign var=initiative_types value=$input.initiative_types}
									{include file='helpers/form/form_customer_initiative.tpl'}
								{elseif $input.type == 'partner'}
									{assign var=partners value=$input.values}
									{assign var=partner_types value=$input.partner_types}
									{include file='helpers/form/form_partner.tpl'}
								{elseif $input.type == 'partner_contact'}
									{assign var=id_partner value=$input.id_partner}
									{assign var=contacts value=$input.contacts}
									{include file='helpers/form/form_partner_contact.tpl'}
								{elseif $input.type == 'funding_agency'}
									{assign var=funding_agencies value=$input.values}
									{include file='helpers/form/form_funding_agency.tpl'}
								{elseif $input.type == 'project'}
									{assign var=projects value=$input.values}
									{include file='helpers/form/form_project.tpl'}
								{elseif $input.type == 'supervision_main'}
									{assign var=id_supervisor value=$input.supervisor}
									{assign var=ms_students value=$input.students}
									{include file='helpers/form/form_supervision_main.tpl'}
								{elseif $input.type == 'supervision_assistant'}
									{assign var=id_supervisor value=$input.supervisor}
									{assign var=as_students value=$input.students}
									{include file='helpers/form/form_supervision_assistant.tpl'}
								{elseif $input.type == 'news_contact'}
									{assign var=id_contact value=$input.value}
									{assign var=contact_name value=$input.contact_name}
									{include file='helpers/form/form_news_contact.tpl'}	
								{elseif $input.type == 'event_speakers'}
									{assign var=speakers value=$input.value}
									{assign var=id_news_and_event value=$input.news_and_event}
									{include file='helpers/form/form_event_speaker.tpl'}	
								{elseif $input.type == 'customer_position'}
									{assign var=positions value=$input.positions}
									{assign var=customer_positions value=$input.customer_positions}
									{assign var=position_select_label value=$input.position_select_label}
									{include file='helpers/form/form_customer_position.tpl'}
								{elseif $input.type == 'course_developer'}
									{assign var=id_course value=$input.course}
									{assign var=course_developers value=$input.course_developers}
									{include file='helpers/form/form_course_developer.tpl'}
                                {elseif $input.type == 'course_instructor'}
									{assign var=id_course_instance value=$input.course_instance}
									{assign var=course_instructors value=$input.course_instructors}
									{assign var=course_roles value=$input.course_roles}
									{include file='helpers/form/form_course_staff.tpl'}	
                                {elseif $input.type == 'project_leaders'}
									{assign var=id_project value=$input.project}
									{assign var=leaders value=$input.values}
									{include file='helpers/form/form_project_leaders.tpl'}
								{elseif $input.type == 'project_members'}
									{assign var=id_project value=$input.project}
									{assign var=members value=$input.values}
									{include file='helpers/form/form_project_members.tpl'}
								{elseif $input.type == 'project_associated'}
									{assign var=id_project value=$input.project}
									{assign var=associated value=$input.values}
									{include file='helpers/form/form_project_associated.tpl'}
								{elseif $input.type == 'create_project'}
									{include file='helpers/form/form_create_project_button.tpl'}
								{elseif $input.type == 'people'}
									{assign var=people value=$input.values}
									{assign var=id_person value=$input.person}
									{include file='helpers/form/form_customer.tpl'}
								{elseif $input.type == 'publication_authors'}
									{assign var=id_publication value=$input.publication}
									{assign var=authors value=$input.values}
                                    {assign var=quick_link_mdh value=$input.quick_link_mdh}
                                    {assign var=quick_link_ext value=$input.quick_link_ext}
									{include file='helpers/form/form_publication_authors.tpl'}
                                {elseif $input.type == 'publication_venue'}
                                    {assign var=instance value=$input.instance}
                                    {assign var=quick_link value=$input.quick_link}
                                    {assign var=edit_link value=$input.edit_link}
                                    {assign var=countries value=$input.countries}                                    
									{include file='helpers/form/form_publication_venue.tpl'}    
								{elseif $input.type == 'shop'}
									{$input.html}
								{elseif $input.type == 'categories'}
									{include file='helpers/form/form_category.tpl' categories=$input.values}
								{elseif $input.type == 'categories_select'}
									{$input.category_tree}
								{elseif $input.type == 'asso_shop' && isset($asso_shop) && $asso_shop}
										{$asso_shop}
								{elseif $input.type == 'color'}
									<input type="color"
										size="{$input.size}"
										data-hex="true"
										{if isset($input.class)}class="{$input.class}"
										{else}class="color mColorPickerInput"{/if}
										name="{$input.name}"
										value="{$fields_value[$input.name]|escape:'htmlall':'UTF-8'}" />
								{elseif $input.type == 'date'}
									<input type="text"
										size="{$input.size}"
										data-hex="true"
										{if isset($input.class)}class="{$input.class}"
										{else}class="datepicker"{/if}
										name="{$input.name}"
										value="{$fields_value[$input.name]|escape:'htmlall':'UTF-8'}" />
									{elseif $input.type == 'datetime'}
										<input type="text"
										size="{$input.size}"
										data-hex="true"
										{if isset($input.class)}class="{$input.class}"
										{else}class="datetimepicker"{/if}
										name="{$input.name}" id="{$input.name}"
										value="{$fields_value[$input.name]|escape:'htmlall':'UTF-8'}" />
								{elseif $input.type == 'free'}
									{$fields_value[$input.name]}
								{/if}
								{if $input.type != 'radio'} <sup id="{$input.name}_required" {if !isset($input.required) or (isset($input.required) && !$input.required)}style="display:none"{/if}>*</sup>{/if}
								{if isset($input.divaRequired) && $input.divaRequired && $input.type != 'radio'} <sup id="{$input.name}_diva" {if isset($input.divaVisible) && $input.divaVisible==false}hidden{/if}>§</sup>{/if}
								{/block}{* end block input *}
								{block name="description"}
									{if isset($input.desc)}
										<p class="preference_description">
											{if is_array($input.desc)}
												{foreach $input.desc as $p}
													{if is_array($p)}
														<span id="{$p.id}">{$p.text}</span><br />
													{else}
														{$p}<br />
													{/if}
												{/foreach}
											{else}
												{$input.desc}
											{/if}
										</p>
									{/if}
								{/block}
								{if isset($input.lang) && isset($languages)}<div class="clear"></div>{/if}
								</div>
								<div class="clear"></div>
							{/block}{* end block field *}
							{if $input.name == 'id_state'}
								</div>
							{/if}
						{/if}
					{/foreach}
					{hook h='displayAdminForm'}
					{if isset($name_controller)}
						{capture name=hookName assign=hookName}display{$name_controller|ucfirst}Form{/capture}
						{hook h=$hookName}
					{elseif isset($smarty.get.controller)}
						{capture name=hookName assign=hookName}display{$smarty.get.controller|ucfirst|htmlentities}Form{/capture}
						{hook h=$hookName}
					{/if}
				{elseif $key == 'submit'}
					<div class="margin-form">
						<input type="submit"
							id="{if isset($field.id)}{$field.id}{else}{$table}_form_submit_btn{/if}"
							value="{$field.title}"
							name="{if isset($field.name)}{$field.name}{else}{$submit_action}{/if}{if isset($field.stay) && $field.stay}AndStay{/if}"
							{if isset($field.class)}class="{$field.class}"{/if} />
					</div>
				{elseif $key == 'desc'}
					<p class="clear">
						{if is_array($field)}
							{foreach $field as $k => $p}
								{if is_array($p)}
									<span id="{$p.id}">{$p.text}</span><br />
								{else}
									{$p}
									{if isset($field[$k+1])}<br />{/if}
								{/if}
							{/foreach}
						{else}
							{$field}
						{/if}
					</p>
				{/if}
				{block name="other_input"}{/block}
			{/foreach}
			{if $required_fields}
				<div class="small"><sup>*</sup> {l s='Required field'}</div>
			{/if}
			{if $table=="publication"}
				<div class="small"><sup>§</sup> {l s='Diva required field for the selected publication type'}</div>
			{/if}
		</fieldset>
		{block name="other_fieldsets"}{/block}
		{if isset($fields[$f+1])}<br />{/if}
	{/foreach}
</form>
{/block}
{block name="after"}{/block}

{if isset($tinymce) && $tinymce}
	<script type="text/javascript">

	var iso = '{$iso}';
	var pathCSS = '{$smarty.const._THEME_CSS_DIR_}';
	var ad = '{$ad}';

	$(document).ready(function(){
		{block name="autoload_tinyMCE"}
			tinySetup({
				editor_selector :"autoload_rte",
				theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull|cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,undo,redo",
				theme_advanced_buttons2 : "link,unlink,anchor,image,cleanup,code,|,forecolor,backcolor,|,hr,removeformat,visualaid,|,charmap,media,|,ltr,rtl,|,fullscreen",
				theme_advanced_buttons3 : "",
				theme_advanced_buttons4 : ""
			});
		{/block}
	});
	</script>
{/if}
{if $firstCall}
	<script type="text/javascript">
		var module_dir = '{$smarty.const._MODULE_DIR_}';
		var id_language = {$defaultFormLanguage};
		var languages = new Array();
		var vat_number = {if $vat_number}1{else}0{/if};
		// Multilang field setup must happen before document is ready so that calls to displayFlags() to avoid
		// precedence conflicts with other document.ready() blocks
		{foreach $languages as $k => $language}
			languages[{$k}] = {
				id_lang: {$language.id_lang},
				iso_code: '{$language.iso_code}',
				name: '{$language.name}',
				is_default: '{$language.is_default}'
			};
		{/foreach}
		// we need allowEmployeeFormLang var in ajax request
		allowEmployeeFormLang = {$allowEmployeeFormLang};
		displayFlags(languages, id_language, allowEmployeeFormLang);

		$(document).ready(function() {
			{if isset($fields_value.id_state)}
				if ($('#id_country') && $('#id_state'))
				{
					ajaxStates({$fields_value.id_state});
					$('#id_country').change(function() {
						ajaxStates();
					});
				}
			{/if}

			if ($(".datepicker").length > 0)
				$(".datepicker").datepicker({
					prevText: '',
					nextText: '',
					dateFormat: 'yy-mm-dd'
				});
							if ($(".datetimepicker").length > 0)
			$(".datetimepicker").datetimepicker({
				addSliderAccess: true, 
				timeFormat: 'HH:mm',
				dateFormat: 'yy-mm-dd',
				sliderAccessArgs: { touchonly: false }
				});

		});
	{block name="script"}{/block}
	</script>
{/if}
