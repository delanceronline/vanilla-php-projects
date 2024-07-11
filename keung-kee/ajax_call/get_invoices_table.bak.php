<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

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


		$un = "";
        if(isset($_REQUEST['un']))
            $un = $_REQUEST['un'];
		
        $date1 = "";
        if(isset($_REQUEST['date1']))
            $date1 = $_REQUEST['date1'];

        $date2 = "";
        if(isset($_REQUEST['date2']))
            $date2 = $_REQUEST['date2'];

        $fc = "";
        if(isset($_REQUEST['fc']))
            $fc = $_REQUEST['fc'];

        $di = 0;
        if(isset($_REQUEST['di']))
            $di = intval($_REQUEST['di']);

		$ii = 0;
        if(isset($_REQUEST['ii']))
            $ii = intval($_REQUEST['ii']);

		$gi = 0;
        if(isset($_REQUEST['gi']))
            $gi = intval($_REQUEST['gi']);
		
        $num_match = 0;

        if($date1 != "" && $date2 != "")
        {
            include_once("./../db_info.php");
            include_once("./../MySQLConnector.php");
            $db_connector = new TMySQLConnector($global_db_adress, $global_db, $global_db_user, $global_db_pass);
    
            $date1 .= " 00:00:00";
            $date2 .= " 23:59:59";

            $invoices = array();
			/*
            $invoices['invoice.ID'] = 0;
            $invoices['invoice.shop_name'] = '';
            $invoices['invoice.department_name'] = '';
            $invoices['invoice.creation_date'] = '';
            $invoices['invoice.total'] = 0;
			
  */
            

            $condition = "WHERE (creation_date between '$date1' AND '$date2')";
            if($di > 0)
                $condition .= " AND department_id = $di";
            if($fc != "")
                $condition .= " AND shop_f_code = '$fc'";
			if($ii > 0)
				$condition .= " AND ID = $ii";
			if($un != "")
				$condition .= " AND edit_by = '$un'";

            $num_match = $db_connector->GetRows($invoices, $condition, "invoice");
?>
<table width="100%" border="0">
  <tr>
    <td width="10%"><div align="center">發票編號</div></td>
    <td width="13%"><div align="center">發票日期</div></td>
    <td width="15%"><div align="center">店名</div></td>
    <td width="13%"><div align="center">部門</div></td>
    <td width="10%"><div align="center">合共</div></td>
    <td width="9%"><div align="center">動作</div></td>
    <td width="21%"><div align="center">最後編輯</div></td>
    <td width="9%"><div align="center"><?php if($num_match > 0){ ?><input type="button" value="選擇全部" name="select_all_button" onclick="for(var i = 0; i < <?php echo $num_match; ?>; i++){document.getElementById('cb' + i).checked = true;}" /><?php } ?></div></td>
  </tr>
<?php
    $cc = 0;
    foreach($invoices as $invoice)
    {
?>
  <tr>
    <td><div align="center"><a href="invoice_detail.php?id=<?php echo $invoice['ID']; ?>" target="_blank" ><?php echo FillZeroNumber($invoice['ID'], 7); ?></a></div></td>
    <td><div align="center"><?php echo $invoice['creation_date']; ?></div></td>
    <td><div align="center"><?php echo $invoice['shop_name']; ?></div></td>
    <td><div align="center"><?php echo $invoice['department_name']; ?></div></td>
    <td><div align="center">$ <?php echo number_format($invoice['total'], 2, '.', ','); ?></div></td>
    <td><div align="center"><a href="edit_invoice.php?invoice_id=<?php echo $invoice['ID']; ?>" target="_blank">編輯</a></div></td>
    <td><div align="center"><?php echo $invoice['edit_by']; ?> (<?php echo $invoice['last_edit_time']; ?>)</div></td>
    <td><div align="center"><input type="checkbox" name="cb<?php echo $cc; ?>" id="cb<?php echo $cc; ?>" value="<?php echo $invoice['ID']; ?>" /></div></td>
  </tr>
<?php
        $cc++;
    }
?>
  <tr>
    <td width="10%"><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td width="15%"><div align="center"></div></td>
    <td width="13%"><div align="center"></div></td>
    <td width="10%"><div align="center"></div></td>
    <td width="9%">&nbsp;</td>
    <td width="21%">&nbsp;</td>
    <td width="9%"><div align="center"><?php if($num_match > 0){ ?><input type="button" value="取消已選" name="select_all_button" onclick="for(var i = 0; i < <?php echo $num_match; ?>; i++){document.getElementById('cb' + i).checked = false;}" /><?php } ?></div></td>
  </tr>
  <tr>
    <td colspan="8" align="center">共有 <span id="match_count_div"><?php echo $num_match; ?></span> 張發票</td>
  </tr>
</table>
<?php
        }
?>
