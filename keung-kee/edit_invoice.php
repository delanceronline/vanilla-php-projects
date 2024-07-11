<?php
	session_start();

	if(!isset($_SESSION['login_id']))
		header("location: login.php");
		
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
		
	$invoice_id = 0;
	if(isset($_REQUEST['invoice_id']))
		$invoice_id = $_REQUEST['invoice_id'];
	
	include_once("./db_info.php");
	include_once("./MySQLConnector.php");
	$db_connector = new TMySQLConnector($global_db_adress, $global_db, $global_db_user, $global_db_pass);	
	
	$vd = array();
	$items = array();
	$departments = array();
	$num_items = 0;
	
	if($db_connector->GetOneRow($vd, "WHERE ID = $invoice_id", "invoice"))
	{
		$items['unit_price'] = 0;
		$items['product_f_code'] = '';
		$items['product_name'] = '';
		$items['quantity'] = 0;
		$items['sub_total'] = 0;
		$items['unit']= '';
		$items['ID'] = 0;

		$num_items = $db_connector->GetRows($items, "WHERE i_invoice = $invoice_id ORDER BY ID ASC", "invoice_item");
		
		$departments['client_department.ID'] = 0;
		$departments['client_department.department_name'] = '';
		$db_connector->JoinGetRows($departments, "WHERE client_shop.i_group = {$vd['group_id']} AND shop_dept.i_dept = client_department.ID AND shop_dept.i_shop = client_shop.ID", "client_department, shop_dept, client_shop", TRUE);
	}	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>編輯發票</title>
<script language="JavaScript" src="calendar3.js"></script>
<script language="javascript" src="prototype-1.6.0.2.js"></script>
<script language="javascript">
    var gRowCount = <?php echo $num_items; ?>;
    var gShopFCode = '<?php echo $vd['shop_f_code'] ?>';
    var gSubTotals = new Array();
    var gValidFlags1 = new Array();
    var gValidFlags2 = new Array();
    var gControlNameOnFocus = "";

	var shop_name_f_code_dirty = false;
	var gProductCodeDirtyFlags = new Array();


<?php 
	for($i = 0; $i < $num_items; $i++)
	{
?>		
        gValidFlags1[<?php echo $i; ?>] = true;
        gValidFlags2[<?php echo $i; ?>] = true;
		gSubTotals[<?php echo $i; ?>] = <?php echo $items[$i]['sub_total']; ?>;
		gProductCodeDirtyFlags[<?php echo $i; ?>] = false;				
<?php
	}
?>			


    document.onkeyup = handleArrowKeys;
    function handleArrowKeys(evt) {
        evt = (evt) ? evt : ((window.event) ? event : null);
        if (evt)
        {
            if(evt.keyCode == 13)
            {
                // "enter" key pressed

                if(gControlNameOnFocus == 'shop_f_code')
				{
					// handle enter key on shop_f_code
					on_shop_f_code_blur(document.getElementById('shop_f_code').value); 
					on_control_blur();
				}
				else if(gControlNameOnFocus == 'department_id')
				{
					// handle enter key on department pulldown menu
					if(document.getElementById('product_f_code0') != null)
					{
						on_control_blur();
						document.getElementById('product_f_code0').focus();
					}
				}
				else if(document.getElementById('department_name_div').innerHTML != '---')
                {
                    var qi = is_on_quantity_input();
                    var pi = is_on_product_input();

                    if(pi > -1)
                    {
                        //document.getElementById('quantity' + (gRowCount - 1)).focus();
						document.getElementById('quantity' + pi).focus();
                    }
					else if(qi > -1 && qi != gRowCount - 1)
					{
						if(document.getElementById('product_f_code' + (qi + 1)) != null)
						{
							document.getElementById('product_f_code' + (qi + 1)).focus();
						}
					}
                    else if(gRowCount > 0 && qi != -1 && qi == gRowCount - 1)
                    {
						if(parseFloat(document.getElementById('quantity' + qi).value) == document.getElementById('quantity' + qi).value && document.getElementById('product_f_code' + qi).value != '')
						{
							add_row();
							document.getElementById('product_f_code' + (gRowCount - 1)).focus();
						}
                    }
                }
            }
            else if(evt.keyCode == 38)
            {
                // "up" key pressed
                var pi = is_on_product_input();
                var qi = is_on_quantity_input();

                if(pi != -1 && pi > 0)
                    document.getElementById('product_f_code' + (pi - 1)).focus();
                else if(qi != -1 && qi > 0)
                    document.getElementById('quantity' + (qi - 1)).focus();
            }
            else if(evt.keyCode == 40)
            {
                // "down" key pressed
                var pi = is_on_product_input();
                var qi = is_on_quantity_input();

                if(pi != -1 && pi < gRowCount - 1)
                    document.getElementById('product_f_code' + (pi + 1)).focus();
                else if(qi != -1 && qi < gRowCount - 1)
                    document.getElementById('quantity' + (qi + 1)).focus();
            }
        }
    }

    function is_on_quantity_input()
    {
        for(var i = 0; i < gRowCount; i++)
        {
            if(gControlNameOnFocus == 'quantity' + i)
                return i;
        }

        return -1;
    }

    function is_on_product_input()
    {
        for(var i = 0; i < gRowCount; i++)
        {
            if(gControlNameOnFocus == 'product_f_code' + i)
                return i;
        }

        return -1;
    }

    function is_any_valid()
    {
        for(var i = 0; i < gRowCount; i++)
        {
            if(gValidFlags1[i] == true && gValidFlags2[i] == true)
                return true;
        }

        return false;
    }

    function is_row_valid(index)
    {
        if(gValidFlags1[index] == true && gValidFlags2[index] == true)
            return true;
        else
            return false;
    }

    function on_shop_f_code_blur(shop_f_code)
    {
        on_control_blur();

        if(shop_f_code != '' && shop_name_f_code_dirty == true)
        {
            // update shop name
            new Ajax.Updater('shop_name_div', './ajax_call/get_shop_name.php?f_code=' + shop_f_code + '&uid=' + Math.random(), { method: 'get', onComplete: on_complete_get_shop_name } );

            // update department pull-down menu
            new Ajax.Updater('department_name_div', './ajax_call/get_departments_pullmenu.php?f_code=' + shop_f_code + '&uid=' + Math.random(),
                    { method: 'get',
                        onComplete: on_complete_get_department
                    });           
        }
    }

    function on_complete_get_shop_name()
    {
	/*
        if(document.getElementById('shop_name_div').innerHTML != '---')
            document.getElementById('shop_f_code').disabled = true;
			*/
    }

    function on_complete_get_department()
    {
        document.getElementById('department_id').onfocus = _on_control_focus_;
        document.getElementById('department_id').onblur = on_control_blur;

        document.getElementById('department_id').focus();
        if(document.getElementById('department_id').value != 0)
		{
			if(gRowCount == 0)
			{
				add_row();        
				gShopFCode = document.getElementById('shop_f_code').value;
			}
		}
		else
		{
			document.getElementById('shop_f_code').focus();
			document.getElementById('shop_f_code').value = '';
		}
		
		shop_name_f_code_dirty = false;
    }

    function on_product_f_code_blur(product_f_code, shop_f_code, index)
    {
        on_control_blur();
		
		if(gProductCodeDirtyFlags[index] == true)
		{
			if(product_f_code != '' && shop_f_code != '')
			{
				new Ajax.Updater('product_name_div' + index, './ajax_call/get_product_name.php?f_code=' + product_f_code + '&uid=' + Math.random(), { method: 'get' });
				new Ajax.Updater('unit_price_div' + index, './ajax_call/get_product_price.php?product_f_code=' + product_f_code + '&shop_f_code=' + shop_f_code + '&uid=' + Math.random(), { method: 'get', onComplete: function(){update_sub_total(index);} });
				new Ajax.Updater('unit_div' + index, './ajax_call/get_unit.php?product_f_code=' + product_f_code + '&shop_f_code=' + shop_f_code + '&uid=' + Math.random(), { method: 'get' });
			}
			else
			{
				document.getElementById('unit_price_div' + index).innerHTML = "---";
				document.getElementById('product_name_div' + index).innerHTML = "---";
				document.getElementById('unit_div' + index).innerHTML = "---";
				
				update_sub_total(index);
			}
		}
    }

    function update_sub_total(index)
    {
        
        var unit_price = parseFloat(document.getElementById('unit_price_div' + index).innerHTML);
        var quantity = parseFloat(document.getElementById('quantity' + index).value);

        if(isNaN(unit_price) == false)
            gValidFlags1[index] = true;
        else
            gValidFlags1[index] = false;

        gSubTotals[index] = unit_price * quantity;
        if(isNaN(gSubTotals[index]) == false)
        {
            gSubTotals[index] = round_number(gSubTotals[index], 2);
            document.getElementById('sub_total_div' + index).innerHTML = gSubTotals[index];
            gValidFlags2[index] = true;            
        }
        else
        {
            document.getElementById('sub_total_div' + index).innerHTML = "---";
            gValidFlags2[index] = false;
        }
            

        var total = 0;
        for(var i = 0; i < gRowCount; i++)
        {
            if(isNaN(gSubTotals[i]) == false)
                total += gSubTotals[i];
        }
        document.getElementById('total_div').innerHTML = round_number(total, 2);

    }

    function update_unit_price(index)
	{
		//alert(index);
		
		var np = parseFloat(document.getElementById('unit_price_edit' + index).value);
		if(isNaN(np) == false)
		{
			document.getElementById('unit_price_edit' + index).value = '';	
			document.getElementById('unit_price_div' + index).innerHTML = np;
			update_sub_total(index);
		}
	}
	
    function _on_control_focus_()
    {
        gControlNameOnFocus = this.name;
    }
    function on_control_focus(control)
    {
        gControlNameOnFocus = control.name;
    }
    function on_control_blur()
    {
        gControlNameOnFocus = "";
    }

    function add_row()
    {
        // add a new row
        var dt = document.getElementById('detail_table_div');
        var new_div = document.createElement('div');
        new_div.innerHTML = '<table width="800" border="1" cellpadding="0" cellspacing="0"><tr><td width="180" align="left"><label><input name="product_f_code' + gRowCount + '" type="text" id="product_f_code' + gRowCount + '" size="20" maxlength="20" onfocus="on_control_focus(this);" onblur="on_product_f_code_blur(this.value, gShopFCode, ' + gRowCount + ');" onchange="gProductCodeDirtyFlags[' + gRowCount + ']=true;" /></label></td><td width="200" align="left"><div id="product_name_div' + gRowCount + '">---</div></td><td width="80" align="center"><label><input name="quantity' + gRowCount + '" type="text" id="quantity' + gRowCount + '" size="4" maxlength="10" onfocus="on_control_focus(this);" onblur="update_sub_total(' + gRowCount + ');" /></label></td><td width="210" align="right">$<span id="unit_price_div' + gRowCount + '">------</span>/<span id="unit_div' + gRowCount + '"></span> <input type="text" id="unit_price_edit' + gRowCount + '" name="unit_price_edit' + gRowCount + '" size="4" maxlength="9" /> <input type="button" value="更新" onclick="update_unit_price(' + gRowCount + ');" /></td><td width="80" align="right"><div id="sub_total_div' + gRowCount + '">---</div></td><td width="50" align="center"></td></tr></table>';
        dt.appendChild(new_div);

        gValidFlags1[gRowCount] = false;
        gValidFlags2[gRowCount] = false;
		gProductCodeDirtyFlags[gRowCount] = true;
		
        gRowCount++;
    }

    function on_init()
    {
        document.getElementById('invoice_date').disabled = true;
        //document.getElementById('shop_f_code').focus();
		document.getElementById('shop_f_code').disabled = true;
		//document.getElementById('department_id').disabled = true;
    }

    function round_number(rnum, rlength) 
    {
        // Arguments: number to round, number of decimal places
        return Math.round(rnum*Math.pow(10,rlength))/Math.pow(10,rlength);      
    }

    function create_hidden_input(id, v)
    {
        var hidden_input = document.createElement('input');
        hidden_input.type = 'hidden';
        hidden_input.id = id;
        hidden_input.name = id;
        hidden_input.value = v;

        return hidden_input;
    }

    function update_invoice()
    {
        if(is_any_valid() == true)
        {
            var form = document.getElementById('invoice_form');

            var vcount = 0;
            for(var i = 0; i < gRowCount; i++)
            {
                if(is_row_valid(i) == true)
                {
                    form.appendChild(create_hidden_input('pfc' + vcount, document.getElementById('product_f_code' + i).value));
                    form.appendChild(create_hidden_input('q' + vcount, document.getElementById('quantity' + i).value));
                    form.appendChild(create_hidden_input('pn' + vcount, document.getElementById('product_name_div' + i).innerHTML));
                    form.appendChild(create_hidden_input('unit' + vcount, document.getElementById('unit_div' + i).innerHTML));
                    form.appendChild(create_hidden_input('st' + vcount, document.getElementById('sub_total_div' + i).innerHTML));
                    form.appendChild(create_hidden_input('up' + vcount, document.getElementById('unit_price_div' + i).innerHTML));

                    vcount++;
                }
            }
            
            form.appendChild(create_hidden_input('cd', document.getElementById('invoice_date').value));
            form.appendChild(create_hidden_input('sn', document.getElementById('shop_name_div').innerHTML));
            form.appendChild(create_hidden_input('total', document.getElementById('total_div').innerHTML));
            form.appendChild(create_hidden_input('vcount', vcount));
            form.appendChild(create_hidden_input('sfc', gShopFCode));
			form.appendChild(create_hidden_input('invoice_id', <?php echo $invoice_id; ?>));

            var dic = document.getElementById('department_id');
            var department_name = dic.options[dic.selectedIndex].text;
            form.appendChild(create_hidden_input('dn', department_name));
            form.appendChild(create_hidden_input('di', dic.value));

            form.action = 'update_invoice.php';
            form.submit();
        }
    }

</script>
</head>

<body onload="on_init();">
 <form name="invoice_form" id="invoice_form" method="post">
<table width="100%" border="0">
  <tr>
    <td>&nbsp;</td>
    <td colspan="3"><div align="center">新增發票</div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td width="8">&nbsp;</td>
    <td width="100">發票編號：</td>
    <td width="160"><?php echo FillZeroNumber($invoice_id, 7); ?></td>
    <td width="884">&nbsp;</td>
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
            <input name="shop_f_code" type="text" id="shop_f_code" onfocus="on_control_focus(this);" onblur="on_shop_f_code_blur(this.value); on_control_blur();" value="<?php echo $vd['shop_f_code']; ?>" onchange="shop_name_f_code_dirty = true;" />
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
    <td>
        <div id="department_name_div">
            <select name="department_id" id="department_id">
<?php
	foreach($departments as $department)
	{
?>            
            	<option value="<?php echo $department['client_department.ID']; ?>" <?php if($department['client_department.ID'] == $vd['department_id']) echo "selected"; ?>><?php echo $department['client_department.department_name']; ?></option>
<?php
	}
?>                
            </select>    
        </div>    </td>
    <td><div align="center">
      <label></label>
    </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">
    <table width="800" border="1" cellpadding="0" cellspacing="0">
      <tr>
        <td width="180"><div align="left">貨品編號&nbsp;           
          (<a href="browse_product.php" target="_blank">查看</a>)</div>
          </td>
        <td width="200"><div align="left">貨品名稱</div></td>
        <td width="80"><div align="center">數量</div></td>
        <td width="210"><div align="right">單價</div></td>
        <td width="80"><div align="right">金額</div></td>
        <td width="50"><div align="center">刪除</div></td>
      </tr>
    </table>
    <div id="detail_table_div">
<?php
	foreach($items as $key => $item)
	{
?>    
    <table width="800" border="1" cellpadding="0" cellspacing="0">
    	<tr>
        	<td width="180" align="center">
    			<label>
    			<div align="left">
    			  <input name="product_f_code<?php echo $key; ?>" type="text" id="product_f_code<?php echo $key; ?>" size="20" maxlength="20" onfocus="on_control_focus(this);" onblur="on_product_f_code_blur(this.value, gShopFCode, <?php echo $key; ?>);" value="<?php echo $item['product_f_code']; ?>" onchange="gProductCodeDirtyFlags[<?php echo $key; ?>]=true;" />
  			  </div>
    			</label>    		</td>
            <td width="200" align="left">
            	<div id="product_name_div<?php echo $key; ?>"><?php echo $item['product_name']; ?></div>            </td>
            <td width="80" align="center">
            	<label><input name="quantity<?php echo $key; ?>" type="text" id="quantity<?php echo $key; ?>" size="4" maxlength="10" onfocus="on_control_focus(this);" onblur="update_sub_total(<?php echo $key; ?>);" value="<?php echo $item['quantity']; ?>" /></label>            </td>
            <td width="210" align="center">
            	<div align="right">$<span id="unit_price_div<?php echo $key; ?>"><?php echo $item['unit_price']; ?></span>/<span id="unit_div<?php echo $key; ?>">
            	  <?php pull_down_menu($global_zzz, $global_zzz, "unit_pdm".$key, $item['unit']); ?>
            	  </span> 
           	      <input type="text" id="unit_price_edit<?php echo $key; ?>" name="unit_price_edit<?php echo $key; ?>" size="4" maxlength="9" /> 
            	  <input type="button" value="更新" onclick="update_unit_price(<?php echo $key; ?>);" />            
          	  </div></td>
            <td width="80" align="right">
            	<div id="sub_total_div<?php echo $key; ?>"><?php echo $item['sub_total']; ?></div>            </td>
            <td width="50" align="center"><input type="hidden" id="item_id<?php echo $key; ?>" name="item_id<?php echo $key; ?>" value="<?php echo $item['ID']; ?>" /><input type="checkbox" id="delete<?php echo $key; ?>" name="delete<?php echo $key; ?>" value="<?php echo $item['ID']; ?>" /></td>
        </tr>
    </table>
<?php
	}
?>    
    </div>    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3"><table width="800" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td><input type="button" name="add_row_button" id="add_row_button" value="新增一行" onclick="add_row();" /></td>
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
        <td width="120"><div align="center">合計 ($)</div></td>
        <td width="120"><div align="center" id="total_div"><?php echo $vd['total']; ?></div></td>
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
    <td colspan="3">
      <div align="center">
        <input name="save_button" type="button" id="save_button" value="更新發票" onclick="update_invoice();" onfocus="on_control_focus(this);" onblur="on_control_blur();" />
        &nbsp;&nbsp;&nbsp;&nbsp;
        <input name="close_button" type="button" id="close_button" value="關閉" onclick="window.close();" onfocus="on_control_focus(this);" onblur="on_control_blur();" /></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3" align="center">    </td>
  </tr>
</table>
</form>
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
