<?php
    $id = 0;
    if(isset($_REQUEST['id']))
        $id = intval($_REQUEST['id']);

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

    if($id > 0)
    {
        include_once("db_info.php");
        include_once("MySQLConnector.php");
        $db_connector = new TMySQLConnector($global_db_adress, $global_db, $global_db_user, $global_db_pass);

        $vd = array();
        $items = array();

        if($db_connector->GetOneRow($vd, "WHERE ID = $id", "invoice"))
        {
            $items['unit_price'] = 0;
            $items['product_name'] = '';
            $items['quantity'] = 0;
            $items['sub_total'] = 0;

            $db_connector->GetRows($items, "WHERE i_invoice = $id ORDER BY ID ASC", "invoice_item");
        }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $id; ?></title>
</head>

<body>
<p>&nbsp;</p>
<table width="800" border="1" cellpadding="0" cellspacing="0">
  <tr>
    <td width="14%">單號：</td>
    <td colspan="3"><?php echo FillZeroNumber($vd['ID'], 7); ?></td>
  </tr>
  <tr>
    <td>日期：</td>
    <td width="41%"><?php echo $vd['creation_date']; ?></td>
    <td width="22%">&nbsp;</td>
    <td width="23%">&nbsp;</td>
  </tr>
  <tr>
    <td>店名：</td>
    <td><?php echo $vd['shop_name']; ?> (<?php echo $vd['department_name']; ?>)</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center">單價</div></td>
    <td><div align="center">貨名</div></td>
    <td><div align="center">數量</div></td>
    <td><div align="center">金額</div></td>
  </tr>
  <?php
    foreach($items as $item)
    {
  ?>
  <tr>
    <td><div align="center"><?php echo number_format($item['unit_price'], 2, '.', ','); ?></div></td>
    <td><div align="center"><?php echo $item['product_name']; ?></div></td>
    <td><div align="center"><?php echo $item['quantity']; ?></div></td>
    <td><div align="center"><?php echo number_format($item['sub_total'], 2, '.', ','); ?></div></td>
  </tr>
  <?php
    }
  ?>
  <tr>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center">合計</div></td>
    <td><div align="center">$ <?php echo number_format($vd['total'], 2, '.', ','); ?></div></td>
  </tr>
</table>
<p align="center">
  <label>
  <input type="button" name="button" id="button" value="關閉" onclick="window.close();" />
  </label>
</p>
</body>
</html>
<?php
    }
?>
