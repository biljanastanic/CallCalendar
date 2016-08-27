var MAXCOUNT            = 25;
var COUNT_SPACES        = false;
var EXACT               = false;
var COUNT_PUNCTUATION   = true;
var BLOCKS_CLASS        = 'truncate';

window.onload = function () 
{
	var hidden = document.getElementById('hiddenDiv');

	if (hidden == null)
	{
		hidden = document.createElement('div');
		hidden.id = 'hiddenDiv';
		document.body.appendChild(hidden);
	}

	var blocks = document.getElementsByClassName(BLOCKS_CLASS);     

	for (var i=0; i<blocks.length; i++)
	{
		var block           = blocks[i];
		var text            = block.innerHTML;
		var truncate        = '';
		var html_tag        = false;
		var special_char    = false;
		maxcount            = MAXCOUNT;
		for (var x=0; x<maxcount; x++)
		{
			var previous_char = (x>0) ? text.charAt(x-1) : '';
			var current_char = text.charAt(x);

			// Closing HTML tags
			if (current_char == '>' && html_tag)
			{
				html_tag = false;
				maxcount++;
				continue;
			}
			// Closing special chars
			if (current_char == ';' && special_char)
			{
				special_char = false;
				maxcount++;
				continue;
			}
			// Jumping HTML tags
			if (html_tag)
			{
				maxcount++;
				continue;
			}
			// Jumping special chars
			if (special_char)
			{
				maxcount++;
				continue;
			}
			// Checking for HTML tags
			if (current_char == '<')
			{
				var next = text.substring(x,text.indexOf('>')+1);
				var regex = /(^<\w+[^>]*>$)/gi;
				var matches = regex.exec(next); 
				if (matches[0])
				{
					html_tag = true;
					maxcount++;
					continue;
				}                       
			}
			// Checking for special chars
			if (current_char == '&')
			{
				var next = text.substring(x,text.indexOf(';')+1);
				var regex = /(^&#{0,1}[0-9a-z]+;$)/gi;
				var matches = regex.exec(next);
				if (matches[0])
				{
					special_char = true;
					maxcount++;
					continue;
				}
			}                   
			// Shrink multiple white spaces into a single white space
			if (current_char == ' ' && previous_char == ' ')
			{
				maxcount++;
				continue;
			}
			// Jump new lines
			if (current_char.match(/\n/))
			{
				maxcount++;
				continue;
			}                   
			if (current_char == ' ')
			{
				// End of the last word
				if (x == maxcount-1 && !EXACT) { break; }
				// Must I count white spaces?
				if ( !COUNT_SPACES ) { maxcount++; }
			}
			// Must I count punctuation?
			if (current_char.match(/\W/) && current_char != ' ' && !COUNT_PUNCTUATION)
			{
				maxcount++;
			}
			// Adding this char
			truncate += current_char;
			// Must I cut exactly?
			if (!EXACT && x == maxcount-1) { maxcount++; }
		}

		hidden.innerHTML = '<h1><nobr>'+truncate+'</nobr></h1>';

		block.style.width = hidden.offsetWidth+"px";
	}
}

