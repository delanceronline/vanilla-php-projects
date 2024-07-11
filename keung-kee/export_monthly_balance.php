<?php

	session_start();

	if(!isset($_SESSION['login_id']))
		header("location: login.php");

	$od1 = "";
	$date1 = "";
	if(isset($_REQUEST['date1']))
	{
		$od1 = $_REQUEST['date1'];
		$date1 = $_REQUEST['date1']." 00:00:00";
	}

	$od2 = "";
	$date2 = "";
	if(isset($_REQUEST['date2']))
	{
		$od2 = $_REQUEST['date2'];
		$date2 = $_REQUEST['date2']." 23:59:59";
	}

	include_once("db_info.php");
	include_once("MySQLConnector.php");
	$db_connector = new TMySQLConnector($global_db_adress, $global_db, $global_db_user, $global_db_pass);

	$csv_files = array();
	
	$zipped_filename = 'csv_'.$od1.'_'.$od2.'.zip';
	
	$zip = new ZipArchive;
	if ($zip->open('./csv/'.$zipped_filename, ZipArchive::CREATE) === TRUE) 
	{	
		$shops = array();
		$db_connector->GetRows($shops, "WHERE ID > 0", "client_shop");
		
		foreach($shops as $shop)
		{
			// get all departments of a shop
			$departments = array();
			$departments['client_department.ID'] = 0;
			$departments['client_department.department_name'] = '';
			$db_connector->JoinGetRows($departments, "WHERE shop_dept.i_dept = client_department.ID AND shop_dept.i_shop = {$shop['ID']}", "client_department, shop_dept", TRUE);
			
			$department_balances = array();
			foreach($departments as $key => $department)
				$department_balances[$key] = 0;
			
			$invoices = array();
			/*
			$invoices['invoice.department_id'] = 0;
			$invoices['invoice.creation_date'] = '';
			$invoices['invoice.total'] = 0;
			$invoices['invoice.shop_f_code'] = '';
			*/
			$num = $db_connector->GetRows($invoices, "WHERE (creation_date BETWEEN '$date1' AND '$date2') AND shop_f_code = '{$shop['f_code']}' ORDER BY creation_date ASC", "invoice");
			
			if($num == 0)
				continue;
			
			$total = 0;
			
			$rows = array();
			$row_balances = array();
			$current_date = date("Y-m-d", strtotime($date1));
			foreach($invoices as $key1 => $invoice)
			{
				$cdate =  date("Y-m-d", strtotime($invoice['creation_date']));
				if(count($rows) == 0 || $current_date != $cdate)
				{
					$current_date = $cdate;
					// add a new row
					$rows[$cdate] = array();
					foreach($departments as $key3 => $department)
						$rows[$cdate][$key3] = 0;
						
					$row_balances[$current_date] = 0;
				}
			
				foreach($departments as $key2 => $department)
				{			
					// update balances
					if($invoice['department_id'] == $department['client_department.ID'])
					{
						$rows[$current_date][$key2] += $invoice['total'];
						$total += $invoice['total'];
						$department_balances[$key2] += $invoice['total'];
						
						$row_balances[$current_date] += $invoice['total'];
						
						break;
					}
				}
			}		
				
			// put to csv file
			$csv_filename = $shop['f_code'].'_'.$od1.'_'.$od2.'.csv';
			$csv_file_path = "./csv/".$csv_filename;
			$fp = fopen($csv_file_path, 'w');
			
			$line = array("強記月結單");
			fputcsv($fp, $line);
				
			$line = array("電話: 21093628", "傳真: 24070167", "手提: 94253431");
			fputcsv($fp, $line);
			
			$line = array($shop['shop_name'], "由($od1)", "至($od2)", "總共銀:", "$".number_format($total, 2, '.', ','));
			fputcsv($fp, $line);
			
			$line = array();
			$line[] = "日期";
			foreach($departments as $department)
				$line[] = $department['client_department.department_name'];
			$line[] = "共銀";
			fputcsv($fp, $line);
			
			foreach($rows as $key => $row)
			{
				$line = array($key);
				
				foreach($row as $balance)
					$line[] = number_format($balance, 2, '.', ',');
				
				$line[] = "$".number_format($row_balances[$key], 2, '.', ',');
				fputcsv($fp, $line);
			}
			
			$line = array("總共銀:");
			foreach($department_balances as $department_balance)
				$line[] = "$".number_format($department_balance, 2, '.', ',');
			$line[] = "$".number_format($total, 2, '.', ',');
			fputcsv($fp, $line);
			
			fclose($fp);
			
			$csv_files[] = $csv_file_path;
			$zip->addFile($csv_file_path, $csv_filename);
		}
	}
	
	$zip->close();
	
	/*
	header("Content-Disposition: attachment; filename=" . urlencode($zipped_filename));   
	header("Content-Type: application/force-download");
	header("Content-Type: application/zip");
	header("Content-Type: application/download");
	header("Content-Description: File Transfer");            
	header("Content-Length: " . filesize('./csv/'.$zipped_filename));		
	$fp = fopen('./csv/'.$zipped_filename, "r"); 
	while (!feof($fp))
	{
		echo fread($fp, 65536); 
		flush(); // this is essential for large downloads
	}  
	fclose($fp); 
	*/
	
	//header('Content-type: application/zip');
	header('Content-type: application/octet-stream');
	header('Content-Transfer-Encoding: binary');
	header('Content-Disposition: attachment; filename="'.$zipped_filename.'"');
	readfile('./csv/'.$zipped_filename); 	
	
	unlink('./csv/'.$zipped_filename);
	foreach($csv_files as $csv_file)
		unlink($csv_file);
?>