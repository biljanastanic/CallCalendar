<div class="centre-column-single">
	<h1>{$title}</h1>

	<h2>Research Leader</h2>
	<div style="width:727px; text-align:center; margin:10px 10px 30px 10px; ">
		<a href="{$base_url}staff/{$research_leader.id_customer}-{$research_leader.firstname|replace:"ö":"o"|replace:"Ö":"O"|replace:"ü":"u"|replace:"Ü":"U"|replace:"ä":"a"|replace:"Ä":"A"|replace:"å":"a"|replace:"Å":"A"|replace:"é":"e"|replace:"É":"E"|replace:"á":"a"|replace:"Á":"A"|regex_replace:"/[^A-Za-z0-9]/":"_"}_{$research_leader.lastname|replace:"ö":"o"|replace:"Ö":"O"|replace:"ü":"u"|replace:"Ü":"U"|replace:"ä":"a"|replace:"Ä":"A"|replace:"å":"a"|replace:"Å":"A"|replace:"é":"e"|replace:"É":"E"|replace:"á":"a"|replace:"Á":"A"|regex_replace:"/[^A-Za-z0-9]/":"_"}">
			<img src="../img/staff/{$research_leader.id_customer}-staff.jpg?time={time()}" width="100px"/>
			<div style="text-align:center;">{$research_leader.firstname} {$research_leader.lastname}</div>
		</a>
	</div>
	<h2>Research Group Leaders</h2>
	<div> 
		{foreach from=$research_group_leaders item=research_group_leader name=research_group_leaders}
		<div style="width:230px; text-align:center; float:left;margin:10px 10px 30px 10px;">
			<div style="text-align:center; height:40px">
				<a href="research-groups/{$research_group_leader.id_initiative}-{$research_group_leader.name|replace:"ö":"o"|replace:"Ö":"O"|replace:"ü":"u"|replace:"Ü":"U"|replace:"ä":"a"|replace:"Ä":"A"|replace:"å":"a"|replace:"Å":"A"|replace:"é":"e"|replace:"É":"E"|replace:"á":"a"|replace:"Á":"A"|regex_replace:"/[^A-Za-z0-9]/":"_"}">
					{$research_group_leader.name|escape:'htmlall':'UTF-8'}
				</a>
				<br class="clearBoth">
			</div>	
			<a href="{$base_url}staff/{$research_group_leader.id_customer}-{$research_group_leader.firstname|replace:"ö":"o"|replace:"Ö":"O"|replace:"ü":"u"|replace:"Ü":"U"|replace:"ä":"a"|replace:"Ä":"A"|replace:"å":"a"|replace:"Å":"A"|replace:"é":"e"|replace:"É":"E"|replace:"á":"a"|replace:"Á":"A"|regex_replace:"/[^A-Za-z0-9]/":"_"}_{$research_group_leader.lastname|replace:"ö":"o"|replace:"Ö":"O"|replace:"ü":"u"|replace:"Ü":"U"|replace:"ä":"a"|replace:"Ä":"A"|replace:"å":"a"|replace:"Å":"A"|replace:"é":"e"|replace:"É":"E"|replace:"á":"a"|replace:"Á":"A"|regex_replace:"/[^A-Za-z0-9]/":"_"}">
				<img src="../img/staff/{$research_group_leader.id_customer}-staff.jpg?time={time()}" width="100px"/>
				<div style="text-align:center;">{$research_group_leader.firstname} {$research_group_leader.lastname}</div>
			</a>
		</div>
		{/foreach}
		<br class="clearBoth">
	</div> 

	
	
	

	<h2>Map and Directions</h2>
	<p>
		<iframe src="https://maps.google.se/maps?q=M%C3%A4lardalens+h%C3%B6gskola,+V%C3%A4ster%C3%A5s&amp;hl=en&amp;ie=UTF8&amp;sll=61.606396,21.225586&amp;sspn=39.013818,135.263672&amp;oq=m%C3%A4larda&amp;hq=M%C3%A4lardalens+h%C3%B6gskola,&amp;hnear=V%C3%A4ster%C3%A5s&amp;t=m&amp;ll=59.6186,16.540657&amp;spn=0.010809,0.026157&amp;z=14&amp;iwloc=A&amp;cid=4267164619311386926&amp;output=embed" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" width="750" height="620"></iframe>
		<br />
		<small>
			<a style="color: text-align: left;" href="https://maps.google.se/maps?q=M%C3%A4lardalens+h%C3%B6gskola,+V%C3%A4ster%C3%A5s&amp;hl=sv&amp;ie=UTF8&amp;sll=61.606396,21.225586&amp;sspn=39.013818,135.263672&amp;oq=m%C3%A4larda&amp;hq=M%C3%A4lardalens+h%C3%B6gskola,&amp;hnear=V%C3%A4ster%C3%A5s&amp;t=m&amp;ll=59.6186,16.540657&amp;spn=0.010809,0.026157&amp;z=14&amp;iwloc=A&amp;cid=4267164619311386926&amp;source=embed">
				Show on Google Maps
			</a>
		</small>
	</p>
	
	<div>
	<div style="width:230px; text-align:center; float:left;margin:10px 10px 30px 10px;"><a href="http://www.mdh.se/polopoly_fs/1.1269!/Menu/general/column-content/attachment/LokalguideVVT13%20201301.pdf">Campus map for Västerås <img src="themes/es/img/guide_vasteras.png" /></a></div>
	
	<div style="width:230px; text-align:center; float:left;margin:10px 10px 30px 10px;"><a href="http://www.mdh.se/polopoly_fs/1.1268!/Menu/general/column-content/attachment/LokalguideEVT13%2C%20201301.pdf">Campus map for Eskilstuna <img src="themes/es/img/guide_eskilstuna.png" /></a></div>
	<br class="clearBoth">
	</div>
	
	<h2>Directions for International Visitors</h2>
	<p><a href="http://www.swedavia.com/airports/stockholm-arlanda-airport/">Arlanda Airport, Stockholm</a> (100 km from Västerås): <a href="http://www.swebus.se/Flygtransfer/">Swebus Bus</a> to Västerås</p>
	<p><a href="http://www.stockholmvasteras.se/">Stockholm/Västerås Airport</a> (3 km from Västerås city centre): <a href="http://www.flygtaxi.se/">Flygtaxi Taxi</a> to Västerås</p>
	<p><a href="http://www.swedavia.se/bromma/">Stockholm/Bromma Airport</a>: Train to Västerås</p>
	<p><a href="http://www.skavsta.se/">Stockholm/Skavsta Airport</a>: Train to Västerås</p>
	<p>SJ Train <a href="http://www.sj.se">time table</a></p>

	<h2>Other Info</h2>
	<p>More about Västerås: <a href="http://visitvasteras.se/">Visit Västerås</a> (Swedish) <a href="http://www.vasterasmalarstaden.se/en/">Västerås Mälarstaden</a> (English)</p>
	<p>Hotels in Västerås <a href="http://www.booking.com/searchresults.sv.html?aid=310018;label=se-vasteras-IR%2Ahn2EkUoDh_3yimcIy4QS18696119470%3Apl%3Ata%3Ap1%3Ap2%3Aac%3Aap1t1%3Aneg;sid=531b77c01ce8bb481afdbdfa296ffe33;dcid=1;city=-2534274;redirected_from_city=1;src=city">via booking.com</a></p>
	<p>Organisational number: 202100-2916</p>
	
	<table class="contact_address_table">
		<tr>
			<td>
				<div class="contact_address"><strong>Visiting adress</strong><br /> Mälardalen University/IDT<br /> Högskoleplan 1<br /> 72218 Västerås<br /> Sweden</div>
			</td>
			<td>
				<div class="contact_address"><strong>Postal adress</strong><br /> Mälardalen University/IDT<br /> PO Box 883<br /> SE-72123 Västerås<br /> Sweden</div>
			</td>
			<td>
				<div class="contact_address"><strong>Invoice adress</strong><br /> Mälardalen University/IDT<br /> PO Box 1020<br /> 72126 Västerås<br /> Sweden</div>
			</td>
			<td>
				<div class="contact_address"><strong>Delivery adress</strong><br /> Mälardalen University/IDT<br /> Gurksaltargatan 9<br /> 72218 Västerås<br /> Sweden</div>
			</td>
		</tr>
	</table>
    <div id="chart_div"></div>

</div>

