<?php

	session_start();

	if(!isset($_SESSION['login_id']))
		header("location: login.php");


	$group_id = 0;
	if(isset($_REQUEST['group_id']))
		$group_id = $_REQUEST['group_id'];
	
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

	$group = array();
	$db_connector->GetOneRow($group, "WHERE ID = $group_id", "client_group");

	// get all departments of a group
	$departments = array();
	$departments['client_department.ID'] = 0;
	$departments['client_department.department_name'] = '';
	$db_connector->JoinGetRows($departments, "WHERE client_shop.i_group = $group_id AND shop_dept.i_dept = client_department.ID AND shop_dept.i_shop = client_shop.ID", "client_department, shop_dept, client_shop", TRUE);
	
	$department_balances = array();
	foreach($departments as $key => $department)
		$department_balances[$key] = 0;
	
	$invoices = array();
	$invoices['invoice.department_id'] = 0;
	$invoices['invoice.creation_date'] = '';
	$invoices['invoice.total'] = 0;
	$invoices['invoice.shop_f_code'] = '';
	
	$num = $db_connector->JoinGetRows($invoices, "WHERE (invoice.creation_date BETWEEN '$date1' AND '$date2') AND client_shop.f_code = invoice.shop_f_code AND client_shop.i_group = $group_id ORDER BY invoice.creation_date ASC", "invoice, client_shop");	
	
	$total = 0;
	
	$rows = array();
	$row_balances = array();
	$current_date = date("Y-m-d", strtotime($date1));
	foreach($invoices as $key1 => $invoice)
	{
		$cdate =  date("Y-m-d", strtotime($invoice['invoice.creation_date']));
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
			if($invoice['invoice.department_id'] == $department['client_department.ID'])
			{
				$rows[$current_date][$key2] += $invoice['invoice.total'];
				$total += $invoice['invoice.total'];
				$department_balances[$key2] += $invoice['invoice.total'];
				
				$row_balances[$current_date] += $invoice['invoice.total'];
				
				break;
			}
		}
	}		
	
	//var_dump($departments);
	//var_dump($department_balances);	
	//var_dump($row_balances);
	
	// put to csv file
	$csv_file_path = "./csv/".md5(rand() * time()).".csv";
	$fp = fopen($csv_file_path, 'w');
	
	$line = array("強記月結單");
	fputcsv($fp, $line);
		
	$line = array("電話: 21093628", "傳真: 24070167", "手提: 94253431");
	fputcsv($fp, $line);
	
	$line = array($group['group_name'], "由($od1)", "至($od2)", "總共銀:", "$".number_format($total, 2, '.', ','));
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
	
	
	header('Content-type: application/csv');
	header('Content-Disposition: attachment; filename="'.$group['group_name'].'_'.$od1.'_'.$od2.'.csv"');	
	readfile($csv_file_path);	
	
	unlink($csv_file_path);
?>