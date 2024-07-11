<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
        session_start();

        if(!isset($_SESSION['login_id']))
            header("location: login.php");

        $bPrinting = 0;
        if(isset($_REQUEST['printing']))
            $bPrinting = $_REQUEST['printing'];

        $vcount = 0;
        if(isset($_REQUEST['vcount']))
            $vcount = intval($_REQUEST['vcount']);

        $sfc = "";
        if(isset($_REQUEST['sfc']))
            $sfc = $_REQUEST['sfc'];

        $di = 0;
        if(isset($_REQUEST['di']))
            $di = intval($_REQUEST['di']);

        $total = 0;
        if(isset($_REQUEST['total']))
            $total = floatval($_REQUEST['total']);

        $sn = "";
        if(isset($_REQUEST['sn']))
            $sn = $_REQUEST['sn'];

        $dn = "";
        if(isset($_REQUEST['dn']))
            $dn = $_REQUEST['dn'];

        $cd = "";
        if(isset($_REQUEST['cd']))
            $cd = "{$_REQUEST['cd']} ".date("H:i:s");

        if($vcount > 0 && $sfc != "" && $di > 0)
        {
            include_once("db_info.php");
            include_once("MySQLConnector.php");
            $db_connector = new TMySQLConnector($global_db_adress, $global_db, $global_db_user, $global_db_pass);

			
			$group_id = 0;
			$group_data = array();
			if($db_connector->GetOneRow($group_data, "WHERE f_code = '$sfc'", "client_shop"))
				$group_id = $group_data['i_group'];


			$department_info = array();
			if($db_connector->GetOneRow($department_info, "WHERE ID = $di", "client_department"))
			{
				$invoice_data = array();
				$invoice_data['shop_f_code'] = $sfc;
				$invoice_data['shop_name'] = $sn;
				$invoice_data['department_id'] = $di;
				$invoice_data['group_id'] = $group_id;
				$invoice_data['department_name'] = $department_info['department_name'];
				$invoice_data['creation_date'] = $cd;
				$invoice_data['total'] = $total;
				$invoice_data['edit_by'] = $_SESSION['login_id'];
				$invoice_data['last_edit_time'] = date('Y-m-d H:i:s');
				$invoice_id = $db_connector->Insert($invoice_data, "invoice");
	
				$pfcs = array();
				$qs = array();
				$pns = array();
				$units = array();
				$sts = array();
				$ups = array();
	
				for($i = 0; $i < $vcount; $i++)
				{
					if(isset($_REQUEST['pfc'.$i]) && isset($_REQUEST['q'.$i]) && isset($_REQUEST['pn'.$i]) && isset($_REQUEST['unit'.$i]) && isset($_REQUEST['st'.$i]) && isset($_REQUEST['up'.$i]))
					{
						$item = array();
						$item['product_f_code'] = $_REQUEST['pfc'.$i];
						$item['product_name'] = $_REQUEST['pn'.$i];
						$item['unit'] = $_REQUEST['unit'.$i];
						$item['sub_total'] = $_REQUEST['st'.$i];
						$item['unit_price'] = $_REQUEST['up'.$i];
						$item['quantity'] = $_REQUEST['q'.$i];
						$item['i_invoice'] = $invoice_id;
	
						$db_connector->Insert($item, "invoice_item");
					}
				}
	
				if($bPrinting != 0)
					header("location: print_invoice.php?ic=1&i0=$invoice_id");
			
			}
        }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
    <br /><br />
    <p>發票已被儲存．</p>
    <p><a href="add_invoice.php">按此繼續新增發票</a></p>
    </body>
</html>