<?php

ini_set('display_errors',1);
error_reporting(E_ALL|E_STRICT);

	include_once ('./inc/config.inc.php');
	include_once ('./inc/common.inc.php');
	
	$oid = "";
	if(isset($_REQUEST['oid']))
		$oid = $_REQUEST['oid'];

	echo '<?xml version="1.0" encoding="utf-8"?>';
	echo '<offers>';
	
	if($oid != '')
	{
		$link = mysql_connect($global_db_location, $global_db_login_id, $global_db_password);
		if ($link) 
		{
			$db_selected = mysql_select_db($global_db_name, $link);
			if ($db_selected) 
			{
				mysql_query("SET NAMES 'utf8';");
				
				$sql = "SELECT campaigns.id, campaigns.coupon, campaigns.cn_offset, campaigns.cn_prefix, campaigns.cc, campaigns.cr, campaigns.pt, campaigns.pd, campaigns.pi, campaigns.terms, campaigns.ti, campaigns.start_date, campaigns.start_time, campaigns.end_date, campaigns.end_time, campaigns.status, campaigns.creation_date, campaigns.modified_date FROM campaigns, clients WHERE campaigns.owner = clients.id AND clients.fb_page_id='$oid' AND campaigns.status=1 AND TIMESTAMP(campaigns.start_date, campaigns.start_time) <= NOW() AND TIMESTAMP(campaigns.end_date, campaigns.end_time) >= NOW()";
				
				$result = mysql_query($sql);
				while($row = mysql_fetch_row($result))
				{
					$row3 = EncodeTextForXML($row[3]);
					$row6 = EncodeTextForXML($row[6]);
					$row7 = EncodeTextForXML($row[7]);
					$row9 = EncodeTextForXML($row[9]);
					
					$coupon = $global_ci_url.$row[1];
					if($row[1] == "")
						$coupon = "";
					
					$pi = $global_ci_url.$row[8];
					if($row[8] == "")
						$pi = "";
					
					$ti = $global_ci_url.$row[10];
					if($row[10] == "")
						$ti = "";
					
					echo "<offer id=\"{$row[0]}\" coupon=\"$coupon\" cn_offset=\"{$row[2]}\" cn_prefix=\"$row3\" cc=\"{$row[4]}\" cr=\"{$row[5]}\" pt=\"$row6\" pd=\"$row7\" pi=\"$pi\" terms=\"$row9\" ti=\"$ti\" start_date=\"{$row[11]}\" start_time=\"{$row[12]}\" end_date=\"{$row[13]}\" end_time=\"{$row[14]}\" status=\"{$row[15]}\" creation_date=\"{$row[16]}\" modified_date=\"{$row[17]}\" />";				
				}
			}
		}
		mysql_close($link);
	}
	
	echo '</offers>';
?>