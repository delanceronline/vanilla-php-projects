<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Draw clients</title>
</head>

<body>
<?php
	include_once ('./../inc/config.inc.php');
	include_once ('./../lib/MySQLConnector.php');
	$connector = new TMySQLConnector($global_db_location, $global_db_name, $global_db_login_id, $global_db_password);	
	if($connector)
	{
		$num_clients = rand(1, 8);
		
		for($i = 0; $i < $num_clients; $i++)
		{
			$sql = "SELECT id FROM clients WHERE is_drawn = 0 AND DATEDIFF(NOW(), creation_date ) > 3 ORDER BY RAND() LIMIT 0, 1";
			$result = $connector->Execute($sql);
			if($result)
			{
				$row = mysql_fetch_row($result);
				echo "id: ".$row[0]."<br />";
				
				$client['is_drawn'] = 1;
				$connector->Update($client, "WHERE id = {$row[0]}", "clients");
			}
		}
	}	
?>
</body>
</html>
