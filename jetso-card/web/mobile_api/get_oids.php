<?php

ini_set('display_errors',1);
error_reporting(E_ALL|E_STRICT);

	include_once ('./inc/config.inc.php');
	include_once ('./inc/common.inc.php');
	
	$soids = array();
	if(isset($_REQUEST['pids']))
		$soids = explode(",", $_REQUEST['pids']);
	
	$language = 0;
	if(isset($_REQUEST['language']) && is_numeric($_REQUEST['language']))
		$language = intval($_REQUEST['language']);
	
	echo '<?xml version="1.0" encoding="utf-8"?>';
	echo '<oids>';	
	
	if(count($soids) > 0)
	{
		$link = mysql_connect($global_db_location, $global_db_login_id, $global_db_password);
		if ($link) 
		{
			$db_selected = mysql_select_db($global_db_name, $link);
			if ($db_selected) 
			{
				mysql_query("SET NAMES 'utf8';");
				
				$cc = 0;
				foreach($soids as $soid)
				{
					$soids[$cc] = sprintf("%s", $soid);
					$cc++;
				}
				
				$sub_sql = "";
				$sql = "";
				
				if($soids[0] != 'all')
				{
					$fids = implode(',', $soids);
					
					$sub_sql = "(SELECT COUNT(*) FROM campaigns WHERE clients.id = campaigns.owner AND campaigns.status=1 AND TIMESTAMP(campaigns.start_date, campaigns.start_time) <= NOW() AND TIMESTAMP(campaigns.end_date, campaigns.end_time) >= NOW()) > 0";
					$sql = "SELECT DISTINCT clients.fb_page_id, clients.sn, clients.logo, industries.id, industries.symbol FROM clients, industries, campaigns WHERE clients.status = 1 AND clients.fb_page_id IN (".$fids.") AND clients.industry = industries.id AND $sub_sql AND industries.language = '".$global_languages[$language]."' ORDER BY industries.display_order DESC, clients.display_order DESC";									
				}
				else
				{
					// show all shop information
					$sub_sql = "(SELECT COUNT(*) FROM campaigns WHERE clients.id = campaigns.owner AND campaigns.status=1 AND TIMESTAMP(campaigns.start_date, campaigns.start_time) <= NOW() AND TIMESTAMP(campaigns.end_date, campaigns.end_time) >= NOW()) > 0";
					$sql = "SELECT DISTINCT clients.fb_page_id, clients.sn, clients.logo, industries.id, industries.symbol FROM clients, industries, campaigns WHERE clients.fb_page_id != '' AND clients.status = 1 AND clients.industry = industries.id AND $sub_sql AND industries.language = '".$global_languages[$language]."' ORDER BY industries.display_order DESC, clients.display_order DESC";					
				}
				
				//file_put_contents("xml_dump.txt", $sql);
				
				$result = mysql_query($sql);
				$iid = 0;
				while($row = mysql_fetch_row($result))
				{
					if($row[2] == "")
						$row[2] = "shop_icon.png";
					
					$row4 = EncodeTextForXML($row[4]);
					$row1 = EncodeTextForXML($row[1]);
					$row2 = EncodeTextForXML($row[2]);
					
					if($iid == 0)
					{
						$iid = $row[3];
						echo "<industry id=\"{$row[3]}\" symbol=\"$row4\">";
					}
					else if($iid != $row[3])
					{
						$iid = $row[3];
						echo "</industry>";
						echo "<industry id=\"{$row[3]}\" symbol=\"$row4\">";
					}
					echo "<oid id=\"{$row[0]}\" sn=\"$row1\" logo=\"".$global_ci_url.$row2."\" />";
				}
				if($iid != 0)
					echo "</industry>";					
			}
		}
		mysql_close($link);
	}
	
	echo '</oids>';
?>