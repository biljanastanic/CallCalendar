<?php

class Validate extends ValidateCore
{
	public static function isUrl($url)
	{
		
			$pattern="%^((https?://)|(http?://))([a-z0-9-].?)+(:[0-9]+)?(/.*)?$%i";
			if( preg_match( $pattern, $url ) != 1 ) {
					//	$errors[] = Tools::displayError('The link is not valid. It must start with http:// or https://');
							return false;
			}
		
	
		return true;
	}
		public static function isCleanHtml($html)
	{
		/*$events = 'onmousedown|onmousemove|onmmouseup|onmouseover|onmouseout|onload|onunload|onfocus|onblur|onchange';
		$events .= '|onsubmit|ondblclick|onclick|onkeydown|onkeyup|onkeypress|onmouseenter|onmouseleave|onerror|onselect|onreset|onabort|ondragdrop|onresize|onactivate|onafterprint|onmoveend';
		$events .= '|onafterupdate|onbeforeactivate|onbeforecopy|onbeforecut|onbeforedeactivate|onbeforeeditfocus|onbeforepaste|onbeforeprint|onbeforeunload|onbeforeupdate|onmove';
		$events .= '|onbounce|oncellchange|oncontextmenu|oncontrolselect|oncopy|oncut|ondataavailable|ondatasetchanged|ondatasetcomplete|ondeactivate|ondrag|ondragend|ondragenter|onmousewheel';
		$events .= '|ondragleave|ondragover|ondragstart|ondrop|onerrorupdate|onfilterchange|onfinish|onfocusin|onfocusout|onhashchange|onhelp|oninput|onlosecapture|onmessage|onmouseup|onmovestart';
		$events .= '|onoffline|ononline|onpaste|onpropertychange|onreadystatechange|onresizeend|onresizestart|onrowenter|onrowexit|onrowsdelete|onrowsinserted|onscroll|onsearch|onselectionchange';
		$events .= '|onselectstart|onstart|onstop';
		return (!preg_match('/<[ \t\n]*script/ims', $html) && !preg_match('/('.$events.')[ \t\n]*=/ims', $html) && !preg_match('/.*script\:/ims', $html) && !preg_match('/<[ \t\n]*i?frame/ims', $html));
	*/
	return $html;
	}
	public static function isPageNumber($value)
	{
		return (preg_match('#^[0-9-]+$#', (string)$value));
	}
	
	public static function isDateNullable($date)
	{
		if($date=="0000-00-00 00:00:00")return true;
		if (!preg_match('/^([0-9]{4})-((0?[0-9])|(1[0-2]))-((0?[0-9])|([1-2][0-9])|(3[01]))( [0-9]{2}:[0-9]{2}:[0-9]{2})?$/', $date, $matches))
			return false;
		return checkdate((int)$matches[2], (int)$matches[5], (int)$matches[0]);
	}
	public static function isOrcid($orcid)
	{
		if (preg_match('/^([A-Za-z0-9]{4}-[A-Za-z0-9]{4}-[A-Za-z0-9]{4}-[A-Za-z0-9]{4})$/', $orcid)<1)
			return false;
		return true;	
			
	}
	
	public static function isMDHid($mdhid)
	{
		if (preg_match('/^([a-z]{3}[0-9]{2})$/', $mdhid)<1)
			return false;
		return true;	
			
	}
	
	public static function isISRN($mrtcISRN)
	{
		if($mrtcISRN=="" or $mrtcISRN==null or strpos($mrtcISRN,"MDH-MRTC")==false) return true;
		
		if (preg_match('/^(MDH-MRTC-([1-9]|[1-9][0-9]|[1-9][0-9][0-9])/[0-9]{4}-1-SE)$/', $mrtcISRN)<1)
			return false;
		return true;	
			
	}
	
}

