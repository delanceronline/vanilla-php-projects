<?php
	$global_db_adress = "localhost";
	$global_db = "qbuild_keungkee";
	$global_db_user = "root";
	$global_db_pass = "adminpass";
	$global_login_user = "admin";
	$global_login_pass =  "adminpass";
	
	function Filter_UTF8($string)
	{
		$string = htmlspecialchars($string, ENT_QUOTES);
	
		$converted = preg_replace('/([\xc0-\xdf].)/se', "'&#' . ((ord(substr('$1', 0, 1)) - 192) * 64 + (ord(substr('$1', 1, 1)) - 128)) . ';'", $string);
		$converted = preg_replace('/([\xe0-\xef]..)/se', "'&#' . ((ord(substr('$1', 0, 1)) - 224) * 4096 + (ord(substr('$1', 1, 1)) - 128) * 64 + (ord(substr('$1', 2, 1)) - 128)) . ';'", $converted); 
		
		return $converted;
	}
	
	function filter_textnode_xml($str)
	{		
		$str = str_replace("&", "&amp;", $str);
		$str = str_replace(">", "&gt;", str_replace("<", "&lt;", $str));		
		$str = str_replace("'", "&apos;", $str);
		$str = str_replace('"', "&quot;", $str);
		
		return $str;
	}	
	
	$global_zzz = array();
	$global_zzz[] = "斤";
	$global_zzz[] = "磅";
	$global_zzz[] = "件";
	$global_zzz[] = "打";
	$global_zzz[] = "桶";
	$global_zzz[] = "條";
	$global_zzz[] = "個";
	$global_zzz[] = "板";
	$global_zzz[] = "包";
	$global_zzz[] = "兩";
	$global_zzz[] = "張";
	$global_zzz[] = "盒";
	$global_zzz[] = "枝";
	$global_zzz[] = "扎";
	$global_zzz[] = "茜";
	$global_zzz[] = "只";
	$global_zzz[] = "籮";
	$global_zzz[] = "張";
	$global_zzz[] = "樽";
	$global_zzz[] = "罐";
	$global_zzz[] = "袋";
	$global_zzz[] = "份";
	$global_zzz[] = "排";
	
	function get_unit_text($index)
	{
		foreach($global_zzz as $key => $unit)
		{
			if($key == $index)
				return $unit;
		}
		
		return 0;
	}
	
	function pull_down_menu($names, $values, $id, $selected)
	{
		echo "<select id=\"$id\" name=\"$id\">";
		
		foreach($names as $key => $name)
		{
			$value = $values[$key];
			$st = "";
			if($value == $selected)
				$st = "selected";
			
			echo "<option value=\"$value\" $st>$name</option>";
		}
		
		echo "</select>";
	}
	
?>
