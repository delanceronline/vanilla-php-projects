<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新增發票</title>
<script language="JavaScript" src="calendar3.js"></script>
<script language="javascript" src="prototype-1.6.0.2.js"></script>
<script language="javascript">
    var gRowCount = 0;
    var gShopFCode = '';
    var gSubTotals = new Array();
    var gValidFlags1 = new Array();
    var gValidFlags2 = new Array();
    var gControlNameOnFocus = "";


    document.onkeyup = handleArrowKeys;
    function handleArrowKeys(evt) {
        evt = (evt) ? evt : ((window.event) ? event : null);
        if (evt)
        {
            if(evt.keyCode == 13)
            {
                // "enter" key pressed

                if(document.getElementById('department_name_div').innerHTML != '---')
                {
                    var qi = is_on_quantity_input();
                    
                    if(gRowCount > 0 && qi != -1 && qi == gRowCount - 1)
                    {
                        add_row();
                        document.getElementById('product_f_code' + (gRowCount - 1)).focus();                        
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

        if(shop_f_code != '')
        {
            // update shop name
            new Ajax.Updater('shop_name_div', './ajax_call/get_shop_name.php?f_code=' + shop_f_code + '&uid=' + Math.random(), { method: 'get', onComplete: function(){document.getElementById('shop_f_code').disabled = true;} } );

            // update department pull-down menu
            new Ajax.Updater('department_name_div', './ajax_call/get_departments_pullmenu.php?f_code=' + shop_f_code + '&uid=' + Math.random(),
                    { method: 'get',
                        onComplete: on_complete_get_department
                    });           
        }
    }

    function on_complete_get_department()
    {
        document.getElementById('department_id').onfocus = _on_control_focus_;
        document.getElementById('department_id').onblur = on_control_blur;

        document.getElementById('department_id').focus();
        if(gRowCount == 0)
            add_row();
        
        gShopFCode = document.getElementById('shop_f_code').value;
    }

    function on_product_f_code_blur(product_f_code, shop_f_code, index)
    {
        on_control_blur();

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
        new_div.innerHTML = '<table width="800" border="1" cellpadding="0" cellspacing="0"><tr><td width="180" align="center"><label><input name="product_f_code' + gRowCount + '" type="text" id="product_f_code' + gRowCount + '" size="20" maxlength="20" onfocus="on_control_focus(this);" onblur="on_product_f_code_blur(this.value, gShopFCode, ' + gRowCount + ');" /></label></td><td width="250" align="center"><div id="product_name_div' + gRowCount + '"></div></td><td width="120" align="center"><label><input name="quantity' + gRowCount + '" type="text" id="quantity' + gRowCount + '" size="4" maxlength="10" onfocus="on_control_focus(this);" onblur="update_sub_total(' + gRowCount + ');" /></label></td><td width="120" align="center"><span id="unit_price_div' + gRowCount + '"></span><span id="unit_div' + gRowCount + '"></span></td><td width="120" align="center"><div id="sub_total_div' + gRowCount + '">---</div></td><td width="10">&nbsp;</td></tr></table>';
        dt.appendChild(new_div);

        gValidFlags1[gRowCount] = false;
        gValidFlags2[gRowCount] = false;

        gRowCount++;
    }

    function on_init()
    {
        document.getElementById('invoice_date').disabled = true;
        document.getElementById('shop_f_code').focus();
    }

    function round_number(rnum, rlength) 
    {
        // Arguments: number to round, number of decimal places
        return Math.round(rnum*Math.pow(10,rlength))/Math.pow(10,rlength);      
    }

</script>
</head>

<body onload="on_init();">
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
    <td width="100">日期：</td>
    <td width="160"><label>
      <input name="invoice_date" type="text" id="invoice_date" value="<?php echo date('Y-m-d'); ?>" size="20" maxlength="20" />
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
            <input type="text" name="shop_f_code" id="shop_f_code" onfocus="on_control_focus(this);" onblur="on_shop_f_code_blur(this.value); on_control_blur();" />
    </label></td>
    <td><div id="shop_name_div">*請輸入店名編號</div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>部門：</td>
    <td><div id="department_name_div">---</div></td>
    <td>&nbsp;</td>
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
        <td width="180"><div align="center">貨品編號</div></td>
        <td width="250"><div align="center">貨品名稱</div></td>
        <td width="120"><div align="center">數量</div></td>
        <td width="120"><div align="center">單價</div></td>
        <td width="120"><div align="center">金額</div></td>
        <td width="10">&nbsp;</td>
      </tr>
    </table>
    <div id="detail_table_div">
    </div>
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
    <td colspan="3">
      <div align="center">
        <input name="save_button" type="button" id="save_button" value="儲存發票" />
        </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
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
