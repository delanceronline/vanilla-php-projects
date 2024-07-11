<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<?php    
	include_once("db_info.php");
	include_once("MySQLConnector.php");

	function FillZeroNumber($num, $size)
	{
		$output = $num;
		$length = strlen($num);
		
		if($size > $length)
		{
			$diff = $size - $length;
			for($i = 0; $i < $diff; $i++)
				$output = "0".$output;
		}
		
		return $output;
	}		

    $ic = 0;
    if(isset($_REQUEST['ic']))
        $ic = intval($_REQUEST['ic']);

    if($ic > 0)
    {
        $db_connector = new TMySQLConnector($global_db_adress, $global_db, $global_db_user, $global_db_pass);
        
        $content_xml = '<?xml version="1.0" encoding="utf-8"?><pages>';

        for($i = 0; $i < $ic; $i++)
        {
            // for each invoice
			$bPrintUnit = 0;			
            $num_items = 0;
			$items = array();
            if(isset($_REQUEST['i'.$i]))
            {                
                $items['invoice.ID'] = 0;
                $items['invoice.shop_name'] = '';
				$items['invoice.shop_f_code'] = '';				
                $items['invoice.department_name'] = '';
                $items['invoice.total'] = 0;
                $items['invoice.creation_date'] = '';
                $items['invoice_item.unit_price'] = 0;
                $items['invoice_item.product_name'] = '';
				$items['invoice_item.unit'] = '';
                $items['invoice_item.quantity'] = 0;
                $items['invoice_item.sub_total'] = 0;

                $num_items = $db_connector->JoinGetRows($items, "WHERE invoice_item.i_invoice = invoice.ID AND invoice.ID = {$_REQUEST['i'.$i]} ORDER BY invoice_item.ID ASC", "invoice, invoice_item");
				
				if($num_items > 0)
				{
					$shop_info = array();
					if($db_connector->GetOneRow($shop_info, "WHERE f_code = '{$items[0]['invoice.shop_f_code']}'", "client_shop"))
					{
						if($shop_info['is_unit_printing'] == 1)
							$bPrintUnit = 1;
					}
				}
            }
			
            $content_xml .= get_page_nodes($items, $bPrintUnit);
        }
        
        $content_xml .= '</pages>';

        $unique_file = "./printing/".md5(rand() * time()).".xml";
        
        file_put_contents($unique_file, $content_xml);
        exec("PrinterToPaper.exe ./printing/config.xml $unique_file -d");
		//exec("PrinterToPaper.exe ./printing/config.xml $unique_file");
    }

    function get_page_nodes(&$items, $bPrintUnit = 0)
    {
        $num_page_items = 40;

        $num_items = count($items);
        $num_pages = intval($num_items / $num_page_items) + 1;
        $page_num = 1;

        if($num_items > 0)
        {
            $invoice_num = FillZeroNumber($items[0]['invoice.ID'], 7);
            if($num_pages > 1)
                $invoice_num .= " ($page_num)";
            
			$items[0]['invoice.shop_name'] = filter_textnode_xml($items[0]['invoice.shop_name']);
			$items[0]['invoice.department_name'] = filter_textnode_xml($items[0]['invoice.department_name']);
			$items[0]['invoice.creation_date'] = filter_textnode_xml($items[0]['invoice.creation_date']);
			$items[0]['invoice.total'] = filter_textnode_xml($items[0]['invoice.total']);
			
            $info_nodes = get_info_nodes("{$items[0]['invoice.shop_name']} ({$items[0]['invoice.department_name']})", $invoice_num, $items[0]['invoice.creation_date'], $items[0]['invoice.total']);

            $run_count = 0;
            $item_count = 0;
            $content_xml .= "<page>";
            $content_xml .= $info_nodes;
            foreach($items as $item)
            {                
				$item['invoice_item.unit_price'] = filter_textnode_xml($item['invoice_item.unit_price']);
				$item['invoice_item.product_name'] = filter_textnode_xml($item['invoice_item.product_name']);
				$item['invoice_item.quantity'] = filter_textnode_xml($item['invoice_item.quantity']);
				$item['invoice_item.sub_total'] = filter_textnode_xml($item['invoice_item.sub_total']);
				
				if($bPrintUnit == 1)				
	                $content_xml .= get_item_node($item['invoice_item.unit_price'], $item['invoice_item.product_name'], $item['invoice_item.quantity'], $item['invoice_item.unit'], $item['invoice_item.sub_total'], $run_count);
				else
					$content_xml .= get_item_node($item['invoice_item.unit_price'], $item['invoice_item.product_name'], $item['invoice_item.quantity'], "", $item['invoice_item.sub_total'], $run_count);

                $item_count++;                
                $run_count++;
                
                if($run_count >= $num_page_items)
                {
                    $run_count = 0;
                    $page_num++;

                    $invoice_num = FillZeroNumber($items[0]['invoice.ID'], 7);
                    if($num_pages > 1)
                        $invoice_num .= " ($page_num)";

                    $info_nodes = get_info_nodes("{$items[0]['invoice.shop_name']} ({$items[0]['invoice.department_name']})", $invoice_num, $items[0]['invoice.creation_date'], $items[0]['invoice.total']);

                    $content_xml .= "</page><page>";
                    $content_xml .= $info_nodes;
                }
            }
            $content_xml .= "</page>";
        }

        return $content_xml;
    }

    function get_item_node($unit_price, $item_name, $quantity, $unit, $sub_total, $index)
    {
        $dy = 25.65;
        $y = 225;

        $x = array();
                
        if($index < 20 && $index >= 0)
        {
            $x[0] = 100;
            $x[1] = 110;
            $x[2] = 285;
            $x[3] = 400;
            
            $y += $index * $dy;
        }
        else if($index >= 20 && $index < 40)
        {
            $x[0] = 510;
            $x[1] = 520;
            $x[2] = 695;
            $x[3] = 800;

            $y += (($index - 20) * $dy);
        }

		$formatted_unit_price = "---";
		$formatted_sub_total = "---";
		
		if($unit_price > 0)
			$formatted_unit_price = number_format($unit_price, 2, '.', ',');

		if($sub_total > 0)
			$formatted_sub_total = number_format($sub_total, 2, '.', ',');

		$qu = $quantity;
		if($unit != "")
			$qu .= " ".$unit;
		
		if($quantity == 0)
			$qu = "---";

        $node_str = "<text x='{$x[0]}' y='$y' align='right'>".$formatted_unit_price."</text>";
        $node_str .= "<text x='{$x[1]}' y='$y' align='left'>$item_name</text>";
        $node_str .= "<text x='{$x[2]}' y='$y' align='centre'>$qu</text>";
        $node_str .= "<text x='{$x[3]}' y='$y' align='right'>".$formatted_sub_total."</text>";

        return $node_str;
    }

    function get_info_nodes($shop_name, $invoice_no, $creation_date, $total)
    {
        $datainfo = explode(" ", $creation_date);

		//$str = "<text x='100' y='148' align='left' size='20'>$shop_name</text><text x='715' y='98' align='left'>$invoice_no</text><text x='715' y='148' align='left'>{$datainfo[0]}</text><text x='740' y='740' align='centre'>$ ".number_format($total, 2, '.', ',')."</text>";
        $str = "<text x='100' y='140' align='left' size='16'>$shop_name</text><text x='715' y='98' align='left'>$invoice_no</text><text x='715' y='148' align='left'>{$datainfo[0]}</text><text x='740' y='740' align='centre'>$ ".number_format($total, 2, '.', ',')."</text>";
        return $str;
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
    <p>發票已被傳送到打印機．</p>
    <p><a href="main.php">按此返回主頁</a></p>
    </body>
</html>
