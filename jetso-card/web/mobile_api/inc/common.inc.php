<?php

	function EncodeTextForXML($content, $nl2br = FALSE)
	{
		$detail = $content;
		
		if($nl2br)
			$detail = nl2br($detail);			
	
		$detail = HTML2UTF8($detail);
		
		$detail = str_replace('&', '&amp;', $detail);
		$detail = str_replace('"', '&quot;', $detail);
		$detail = str_replace('<', '&lt;', $detail);
		$detail = str_replace('>', '&gt;', $detail);
		
		if($nl2br == FALSE)
		{
			$detail = str_replace(chr(10), '&#xD;', $detail);
			$detail = str_replace(chr(13), '&#xD;', $detail);
		}
		
		return $detail;
	}
	
	function br2nl( $input ) 
	{
 		return preg_replace('/<br(\s+)?\/?>/i', "\n", $input);
	}	
	
	function HTML2UTF8($data)
	{
		return preg_replace("/\\&\\#([0-9]{3,10})\\;/e", '_html_to_utf8("\\1")', $data);
	}
	
	function _html_to_utf8 ($data)
	{
		if ($data > 127)
		{
			$i = 5;
			while (($i--) > 0)
			{
				if ($data != ($a = $data % ($p = pow(64, $i))))
				{
					$ret = chr(base_convert(str_pad(str_repeat(1, $i + 1), 8, "0"), 2, 10) + (($data - $a) / $p));
					for ($i; $i > 0; $i--)
						$ret .= chr(128 + ((($data % pow(64, $i)) - ($data % ($p = pow(64, $i - 1)))) / $p));
					break;
				}
			}
		}
		else
			$ret = "&#$data;";
		
		return $ret;
	}	

?>