<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Invoice</title>
<script language="JavaScript" src="calendar3.js"></script>
<script language="javascript" src="prototype-1.6.0.2.js"></script>
</head>
<?php

	$invoice_id = 0;
	if(isset($_REQUEST['invoice_id']))
		$invoice_id = $_REQUEST['invoice_id'];

	include_once("./db_info.php");
	include_once("./MySQLConnector.php");
	$db_connector = new TMySQLConnector($global_db_adress, $global_db, $global_db_user, $global_db_pass);
	
	$vd = array();
	$items = array();

	if($db_connector->GetOneRow($vd, "WHERE ID = $invoice_id", "invoice"))
	{
		$items['unit_price'] = 0;
		$items['product_name'] = '';
		$items['quantity'] = 0;
		$items['sub_total'] = 0;

		$db_connector->GetRows($items, "WHERE i_invoice = $invoice_id", "invoice_item");
	}
	
?>
<body>
<table width="100%" border="0">
  <tr>
    <td>&nbsp;</td>
    <td colspan="3"><div align="center">編輯發票</div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td width="8">&nbsp;</td>
    <td width="100">日期：</td>
    <td width="160"><label>
      <input name="invoice_date" type="text" id="invoice_date" value="<?php echo $vd['creation_date']; ?>" size="20" maxlength="20" />
    </label></td>
    <td width="884"><a href="javascript:calendar_window.popup();"><img src="img/cal.gif" width="16" height="16" border="0" alt="Click Here to Pick up the date" /></a></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>店名：</td>
    <td width="160" height="20"><label>
      <input type="text" name="shop_f_code" id="shop_f_code" onblur="on_shop_f_code_blur(this.value);" value="<?php echo $vd['shop_f_code']; ?>" />
    </label></td>
    <td><div id="shop_name_div"><?php echo $vd['shop_name']; ?></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>部門：</td>
    <td><?php echo $vd['department_name']; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3"><table width="800" border="1" cellpadding="0" cellspacing="0">
      <tr>
        <td width="180"><div align="center">貨品編號&nbsp;<label>(<a href="browse_product.php" target="_blank">查看</a>)</label></div></td>
        <td width="200"><div align="center">貨品名稱</div></td>
        <td width="120"><div align="center">數量</div></td>
        <td width="170"><div align="center">單價</div></td>
        <td width="120"><div align="center">金額</div></td>
        <td width="10">&nbsp;</td>
      </tr>
<?php
	foreach($items as $item)
	{
?>      
      <tr>
        <td width="180"><div align="center"><?php echo $item['product_f_code']; ?></label></div></td>
        <td width="200"><div align="center"><?php echo $item['product_name']; ?></div></td>
        <td width="120"><div align="center"><?php echo $item['quantity']; ?></div></td>
        <td width="170"><div align="center"><?php echo $item['unit_price']; ?></div></td>
        <td width="120"><div align="center"><?php echo $item['sub_total']; ?></div></td>
        <td width="10">&nbsp;</td>
      </tr>
<?php
	}
?>      
    </table>
        </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3"><table width="800" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="180"><div align="center"></div></td>
        <td width="250"><div align="center"></div></td>
        <td width="100"><div align="center"></div></td>
        <td width="120"><div align="center">合計</div></td>
        <td width="120"><div align="center" id="total_div">0</div></td>
        <td width="30">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3"><div align="center">
      <input name="save_button" type="button" id="save_button" value="儲存編輯" onclick="" onfocus="" />      
    </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3" align="center"></td>
  </tr>
</table>
<script language="JavaScript">
<!-- // create calendar object(s) just after form tag closed
	 // specify form element as the only parameter (document.forms['formname'].elements['inputname']);
	 // note: you can have as many calendar objects as you need for your application
		var calendar_window = new calendar3(window.document.getElementById('invoice_date'));
		calendar_window.year_scroll = true;
		calendar_window.time_comp = false;
//-->
</script>
</body>
</html>
