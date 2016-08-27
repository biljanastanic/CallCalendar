<?
function convert_entry($entry)
{
   $bibtexSpCh = array(
		// Deal with '{' and '}' first!
		0x007B	=>	"\\textbraceleft",
		0x007D	=>	"\\textbraceright",
		0x0022	=>	"{\"}",
		0x0023	=>	"{\#}",
		0x0025	=>	"{\%}",
		0x0026	=>	"{\&}",
		0x003C	=>	"\\textless",
		0x003E	=>	"\\textgreater",
		0x005F	=>	"{\_}",
		0x00A3	=>	"\\textsterling",
		0x00C0	=>	"{\`A}",
		0x00C1	=>	"{\'A}",
		0x00C2	=>	"{\^A}",
		0x00C3	=>	"{\~A}",
		0x00C4	=>	'{\"A}',
		0x00C5	=>	"{\AA}",
		0x00C6	=>	"{\AE}",
		0x00C7	=>	"{\c{C}}",
		0x00C8	=>	"{\`E}",
		0x00C9	=>	"{\'E}",
		0x00CA	=>	"{\^E}",
		0x00CB	=>	'{\"E}',
		0x00CC	=>	"{\`I}",
		0x00CD	=>	"{\'I}",
		0x00CE	=>	"{\^I}",
		0x00CF	=>	'{\"I}',
		0x00D1	=>	"{\~N}",
		0x00D2	=>	"{\`O}",
		0x00D3	=>	"{\'O}",
		0x00D4	=>	"{\^O}",
		0x00D5	=>	"{\~O}",
		0x00D6	=>	'{\"O}',
		0x00D8	=>	"{\O}",
		0x00D9	=>	"{\`U}",
		0x00DA	=>	"{\'U}",
		0x00DB	=>	"{\^U}",
		0x00DC	=>	'{\"U}',
		0x00DD	=>	"{\'Y}",
		0x00DF	=>	"{\ss}",
		0x00E0	=>	"{\`a}",
		0x00E1	=>	"{\'a}",
		0x00E2	=>	"{\^a}",
		0x00E3	=>	"{\~a}",
		0x00E4	=>	'{\"a}',
		0x00E5	=>	"{\aa}",
		0x00E6	=>	"{\ae}",
		0x00E7	=>	"{\c{c}}",
		0x00E8	=>	"{\`e}",
		0x00E9	=>	"{\'e}",
		0x00EA	=>	"{\^e}",
		0x00EB	=>	'{\"e}',
		0x00EC	=>	"{\`\i}",
		0x00ED	=>	"{\'\i}",
		0x00EE	=>	"{\^\i}",
		0x00EF	=>	'{\"\i}',
		0x00F1	=>	"{\~n}",
		0x00F2	=>	"{\`o}",
		0x00F3	=>	"{\'o}",
		0x00F4	=>	"{\^o}",
		0x00F5	=>	"{\~o}",
		0x00F6	=>	'{\"o}',
		0x00F8	=>	"{\o}",
		0x00F9	=>	"{\`u}",
		0x00FA	=>	"{\'u}",
		0x00FB	=>	"{\^u}",
		0x00FC	=>	'{\"u}',
		0x00FD	=>	"{\'y}",
		0x00FF	=>	'{\"y}',
		0x00A1	=>	"{\!}",
		0x00BF	=>	"{\?}",
    );
	// Construction of the transformation filter 
	foreach($bibtexSpCh as $key => $value)
	{
		$matchBibtex[] = chr($key);
		$replaceBibtex[] = $value;
    }
		
	// Processing of the entry
	$array = str_split($entry);
	foreach($array as $key => $value)
	{
		$array[$key] = str_replace($matchBibtex, $replaceBibtex, $value);
	}
	$string = implode($array);
	return $string;
}

function print_publication_source($row){
  	
	switch ($row["type"]){
           				case "conf":
							if ($row["book_title"]) echo "".$row["book_title"]."";
      						if ($row["pages"]) echo ", p ".$row["pages"];
							if ($row["publisher"]) echo ", ".$row["publisher"];
      						if ($row["location"]) echo ", ".$row["location"];
							if ($row["editor"]) echo ", Editor(s):".$row["editor"];
				 			break;
	
      					case "jour":
							if ($row["book_title"]) echo "".$row["book_title"]."";
							if ($row["volume"]) echo ", vol ".$row["volume"];
				 			if ($row["number"]) echo ", nr ".$row["number"];
				 			if ($row["pages"])echo ", p".$row["pages"];
							if ($row["publisher"]) echo ", ".$row["publisher"];
							break;
	
            			case "book":
				 			if ($row["publisher"]) echo "".$row["publisher"];
							if ($row["isbn"]){echo ", ISBN: ".$row["isbn"];}
				 			break;
	
            			case "incoll":
				 			if ($row["book_title"]) echo "".$row["book_title"]."";
				 			if ($row["pages"]) echo ", p ".$row["pages"];
				 			if ($row["publisher"]) echo ", ".$row["publisher"];
				 			if ($row["isbn"]) echo ", ISBN: ".$row["isbn"];
							if ($row["editor"]) echo ", Editor(s): ".$row["editor"];
				 			break;
	
      	    			case "mrtc":
							echo "MRTC report";
				 			if ($row["number"]) echo " ".$row["number"];
				 			echo ", M&auml;lardalen Real-Time Research Centre, M&auml;lardalen University";
				 			break;
	
      					case "tech":
						case "tech_msc":
						case "tech_lic":
						case "tech_phd":
				 			switch ($row["type"]){
				   				case "tech_msc":
	  			 	  				echo "Master Thesis";
	  			 	  				break;
				   				case "tech_lic":
	  			 	  				echo "Licentiate Thesis";
	  			 	  				break;
				   				case "tech_phd":
	  			 	  				echo "Ph D Thesis";
	  				  				break;
				   				default:	
					   				echo "Technical Report";
									if($row["number"]) echo " ".$row["number"];
					   				break;
				 			}
							if ($row["publisher"]){ 
								echo ", ".$row["publisher"];
							}	
							else{ 
								echo ", MRTC";
							}	
							break;
						case "pop":
							if ($row["publisher"]) echo $row["publisher"].", ";
							if ($row["url"]) echo " <a target=\"new\" href=\"".$row["url"]."\">".$row["url"]."</a>";
				 			break;	
      	}//switch
  }
 
  function print_bibtex_entry($row){
  		switch ($row["type"]){
           	case "conf":
				$type = "@INPROCEEDINGS"; 
				$booktitle = $row["book_title"];
				break;
			case "jour": 
				$type = "@ARTICLE"; 
				$journal = $row["book_title"];
				$volume = $row["volume"];
				$number = $row["number"];
				break;
			case "book": 
				$type = "@BOOK"; break;
			case "incoll": 
				$type = "@INCOLLECTION"; break;
			case "mrtc": 
			case "tech":
				$type = "@TECHREPORT"; break;
			case "tech_msc": 
				$type = "@MASTERSTHESIS"; 
				break;
			case "tech_lic": 
				$type = "@MISC"; 
				break;
			case "tech_phd": 
				$type = "@PHDTHESIS"; 
				break;
			default:
				$type="@MISC"; break;	
      	}//switch
		
		$type = strtolower($type);
		
		// citation key
		$fullname = get_first_author($row["authors"]);
		list($firstname, $lastname) = split(" ", $fullname);
		$citation_key = wash_swedish($lastname)."_".$row["id"].":".$row["year"];
		
		//authors
		$author_list = get_bibtex_authors($row["authors"],$row["year"],$row["mon"]);
		
		$title = $row["title"];
		
		echo "<p><tt><span class=\"small\">";
		//$out = "$type\{$citation_key,<br>";
		$out = "&nbsp;&nbsp;&nbsp;author = {".convert_entry($author_list)."},<br>";
		$out .= "&nbsp;&nbsp;&nbsp;title  = {".convert_entry($title)."},<br>";
		if($booktitle)
			$out .=  "&nbsp;&nbsp;&nbsp;booktitle  = {".convert_entry($booktitle)."},<br>";
		else if($journal){
			$out .=  "&nbsp;&nbsp;&nbsp;journal  = {".convert_entry($journal)."},<br>";
			if($volume)
				$out .=  "&nbsp;&nbsp;&nbsp;volume  = {".convert_entry($volume)."},<br>";
			if($number)
				$out .=  "&nbsp;&nbsp;&nbsp;number  = {".convert_entry($number)."},<br>";	
		}
		convert_entry($out);
		
		//if($row["location"])
		//	$out .=  "&nbsp;&nbsp;&nbsp;address  = {".$row["location"]."},<br>";
		
		if($row["mon"])
			$out .=  "&nbsp;&nbsp;&nbsp;month  = {".getMonth($row["mon"])."},<br>";	
		
		if($row["year"])
			$out .=  "&nbsp;&nbsp;&nbsp;year  = {".$row["year"]."},<br>";	
		
		if($row["pages"])
			$out .=  "&nbsp;&nbsp;&nbsp;pages  = {".$row["pages"]."},<br>";	
		
		if($row["isbn"])
			$out .=  "&nbsp;&nbsp;&nbsp;isbn  = {".$row["isbn"]."},<br>";	
		
		if($row["editor"])
			$out .=  "&nbsp;&nbsp;&nbsp;editor  = {".convert_entry($row["editor"])."},<br>";		
			
		if($row["publisher"] || $row["type"]=="tech_phd"){
			if($row["type"]=="tech_lic")
			{
				$out .=  "&nbsp;&nbsp;&nbsp;howpublished = {Licentiate thesis},<br>";
			}
			if($row["type"]=="tech_phd")
			{
				if ($row["publisher"] == '')
					$out .=  "&nbsp;&nbsp;&nbsp;school = {M{\\\"{a}}lardalen University},<br>";		
				else
					$out .=  "&nbsp;&nbsp;&nbsp;school = {".convert_entry($row["publisher"])."},<br>";		
			}
			else
				$out .=  "&nbsp;&nbsp;&nbsp;publisher  = {".convert_entry($row["publisher"])."},<br>";		
		}	
		
		if($row["type"]=="tech" || $row["type"]=="mrtc"){
			$out .=  "&nbsp;&nbsp;&nbsp;institution  = {M�lardalen University},<br>";
			$out .=  "&nbsp;&nbsp;&nbsp;number  = {".$row["number"]."},<br>";
	    	$out .=  "&nbsp;&nbsp;&nbsp;type  = {{T}echnical {R}eport},<br>";
		}

		
		
		$out .=  "&nbsp;&nbsp;&nbsp;url  = {http://".$_SERVER['HTTP_HOST']."/index.php?choice=publications&id=".$row["id"]."},<br>";		
		
		echo "$type{".$citation_key.",<br>".wash_latex($out)."}";
		//echo "$type{".$citation_key.",<br>".convert_entry($out)."}";
			
		echo "</span></tt></pre>";
		
  }
?>
