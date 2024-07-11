<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
        session_start();

        if(!isset($_SESSION['login_id']))
            header("location: login.php");
/*
        $bPrinting = 0;
        if(isset($_REQUEST['printing']))
            $bPrinting = $_REQUEST['printing'];
*/
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

		$invoice_id = 0;
        if(isset($_REQUEST['invoice_id']))
            $invoice_id = $_REQUEST['invoice_id'];
		
        if($vcount > 0 && $sfc != "" && $di > 0 && $invoice_id > 0)
        {
            include_once("db_info.php");
            include_once("MySQLConnector.php");
            $db_connector = new TMySQLConnector($global_db_adress, $global_db, $global_db_user, $global_db_pass);

            for($i = 0; $i < $vcount; $i++)
            {
                if(isset($_REQUEST['pfc'.$i]) && isset($_REQUEST['q'.$i]) && isset($_REQUEST['pn'.$i]) && isset($_REQUEST['unit'.$i]) && isset($_REQUEST['st'.$i]) && isset($_REQUEST['up'.$i]))
                {
					if(isset($_REQUEST['delete'.$i]))
					{
						// delete an item
						if($db_connector->Delete("WHERE ID = {$_REQUEST['delete'.$i]}", "invoice_item"))
						{
							$total -= $_REQUEST['st'.$i];
						}						
					}
					else
					{
						$item = array();
						$item['product_f_code'] = $_REQUEST['pfc'.$i];
						$item['product_name'] = $_REQUEST['pn'.$i];
						
						if(isset($_REQUEST['unit_pdm'.$i]))
							$item['unit'] = $_REQUEST['unit_pdm'.$i];
						else
							$item['unit'] = $_REQUEST['unit'.$i];
						
						$item['sub_total'] = $_REQUEST['st'.$i];
						$item['unit_price'] = $_REQUEST['up'.$i];
						$item['quantity'] = $_REQUEST['q'.$i];
						$item['i_invoice'] = $invoice_id;

						if(isset($_REQUEST['item_id'.$i]))
						{
							// update an item		
							$db_connector->Update($item, "WHERE ID = {$_REQUEST['item_id'.$i]}", "invoice_item");
					   }
					   else
					   {
					   		//add a new item							
							$db_connector->Insert($item, "invoice_item");
					   }
					}
                }
            }
						
            $invoice_data = array();
            $invoice_data['creation_date'] = $cd;
            $invoice_data['total'] = $total;
			$invoice_data['edit_by'] = $_SESSION['login_id'];
			$invoice_data['last_edit_time'] = date('Y-m-d H:i:s');
			if($di > 0)
			{
				$invoice_data['department_id'] = $di;
				
				$dn_data = array();
				$db_connector->GetOneRow($dn_data, "WHERE ID = $di", "client_department");
				$invoice_data['department_name'] = $dn_data['department_name'];
			}			
			$db_connector->Update($invoice_data, "WHERE ID = $invoice_id", "invoice");
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
    <p>發票已被更新．</p>
    <p><a href="javascript: window.close();">按此關閉</a></p>
    </body>
</html>