<?php

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>QBIS</title>
</head>
<script language="JavaScript" src="calendar3.js"></script><!-- Date only with year scrolling -->
<script language="javascript" src="prototype-1.6.0.2.js"></script>
<script language="javascript">

    function show_invoices()
    {
        var d1 = document.getElementById('date1').value;
        var d2 = document.getElementById('date2').value;
        var sfc = document.getElementById('shop_f_code').value;
        var di = document.getElementById('department_id').value;

        if(document.getElementById('shop_name_div').innerHTML == '' || document.getElementById('shop_name_div').innerHTML == '---')
            sfc = '';

        new Ajax.Updater('invoice_div', './ajax_call/get_invoices_table.php?fc=' + sfc + '&date1=' + d1 + '&date2=' + d2 + '&di=' + di + '&uid=' + Math.random(), { method: 'get'} );
    }

    function on_shop_f_code_blur(shop_f_code)
    {
        if(shop_f_code != '')
        {
            // update shop name
            new Ajax.Updater('shop_name_div', './ajax_call/get_shop_name.php?f_code=' + shop_f_code + '&uid=' + Math.random(), { method: 'get', onComplete: on_complete_get_shop_name } );

            // update department pull-down menu
            new Ajax.Updater('department_name_div', './ajax_call/get_departments_pullmenu.php?all=1&f_code=' + shop_f_code + '&uid=' + Math.random(),
                    { method: 'get',
                        onComplete: on_complete_get_department
                    });
        }
        else
        {
            document.getElementById('shop_name_div').innerHTML = '';
            document.getElementById('department_name_div').innerHTML = '<select id="department_id" name="department_id"><option value="0">沒有</option></select>';
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
        document.getElementById('department_id').focus();
    }

    function on_init()
    {
        document.getElementById('shop_f_code').focus();
    }

    function select_all_checkbox(count)
    {
        alert(count);
    }

</script>
<body onload="on_init();"><tr>
    <td colspan="4"><div align="center">發票清單</div></td>
  </tr>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<form action="delete_bill.php" method="get" name="tstest" id="tstest" >


  <tr>
    <td width="20">&nbsp;</td>
    <td style="width: 115px">&nbsp;</td>
    <td style="width: 155px">&nbsp;</td>
    <td style="width: 209px">&nbsp;</td>
    <td style="width: 141px">&nbsp;</td>
    <td style="width: 116px">&nbsp;</td>
    <td style="width: 120px">&nbsp;</td>
    <td style="width: 86px">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="20">&nbsp;</td>
    <td style="width: 115px">日期：</td>
    <td style="width: 155px">由&nbsp;&nbsp;&nbsp;
      <input   name="date1" type="text" id="date1" value="<?php echo date('Y-m-d'); ?>" size="10" maxlength="16" />      <a href="javascript:c1_window.popup();" ><img src="img/cal.gif" width="16" height="16" border="0" alt="Click Here to Pick up the date"></a></td>
    <td style="width: 209px">&nbsp;至&nbsp;&nbsp;&nbsp;<input  name="date2" type="text" id="date2" value="<?php echo date('Y-m-d'); ?>" size="10" maxlength="16" />
      <a href="javascript:c2_window.popup();" ><img src="img/cal.gif" width="16" height="16" border="0" alt="Click Here to Pick up the date"></a></td>
    <td style="width: 141px">&nbsp;</td>
    <td style="width: 116px">&nbsp;</td>
    <td style="width: 120px">&nbsp;</td>
    <td style="width: 86px">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

  <tr>
    <td width="20">&nbsp;</td>
    <td style="width: 115px">&nbsp;</td>
    <td style="width: 155px">&nbsp;</td>
    <td style="width: 209px">&nbsp;</td>
    <td style="width: 141px">&nbsp;</td>
    <td style="width: 116px">&nbsp;</td>
    <td style="width: 120px">&nbsp;</td>
    <td style="width: 86px">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>


  <tr>
    <td>&nbsp;</td>
    <td style="width: 115px">分店：</td>
    <td style="width: 155px"><label>
      <input type="text" name="shop_f_code" id="shop_f_code" onblur="on_shop_f_code_blur(this.value);" />
    </label></td>
    <td style="width: 209px"><div id="shop_name_div" align="center"></div></td>
  <td style="width: 141px">&nbsp;</td>
    <td style="width: 116px">&nbsp;</td>
    <td style="width: 120px">&nbsp;</td>
    <td style="width: 86px">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td style="width: 115px">&nbsp;</td>
    <td style="width: 155px">&nbsp;</td>
    <td style="width: 209px">&nbsp;</td>
    <td style="width: 141px">&nbsp;</td>
    <td style="width: 116px">&nbsp;</td>
    <td style="width: 120px">&nbsp;</td>
    <td style="width: 86px">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td></td>
    <td>部門：</td>
    <td>
    <div id="department_name_div">
        <select id="department_id" name="department_id"><option value="0">沒有</option></select>
    </div>
    </td>
    <td><label>
      <input type="button" name="filter_button" id="filter_button" value="顯示" onclick="show_invoices();" />
    </label></td>
  <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td style="width: 115px">&nbsp;</td>
    <td style="width: 155px">&nbsp;</td>
    <td style="width: 209px">&nbsp;</td>
    <td style="width: 141px">&nbsp;</td>
    <td style="width: 116px">&nbsp;</td>
    <td style="width: 120px">&nbsp;</td>
    <td style="width: 86px">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="8"><label></label>
      <label></label>      <div id="invoice_div"></div>      </td>
    </tr>

<tr>
    <td>&nbsp;</td>
    <td style="width: 115px">&nbsp;</td>
    <td style="width: 155px">&nbsp;</td>
    <td style="width: 209px"><label></label></td>
    <td style="width: 141px">&nbsp;</td>
    <td style="width: 116px">&nbsp;</td>
    <td style="width: 120px">&nbsp;</td>
    <td style="width: 86px">&nbsp;</td>
    <td>&nbsp;</td>
  </tr></form>
    <tr>
    <td>&nbsp;</td>
    <td style="width: 115px"><a href="main.php">返回主頁</a></td>
    <td style="width: 155px">&nbsp;</td>
    <td style="width: 209px"><div align="center"></div></td>
    <td style="width: 141px">&nbsp;</td>
    <td style="width: 116px">&nbsp;</td>
    <td style="width: 120px">&nbsp;</td>
    <td style="width: 86px">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td style="width: 115px">&nbsp;</td>
    <td style="width: 155px">&nbsp;</td>
    <td style="width: 209px">&nbsp;</td>
    <td style="width: 141px">&nbsp;</td>
    <td style="width: 116px">&nbsp;</td>
    <td style="width: 120px">&nbsp;</td>
    <td style="width: 86px">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<script language="JavaScript">
<!-- // create calendar object(s) just after form tag closed
	 // specify form element as the only parameter (document.forms['formname'].elements['inputname']);
	 // note: you can have as many calendar objects as you need for your application
		var c1_window = new calendar3(window.document.getElementById('date1'));
		c1_window.year_scroll = true;
		c1_window.time_comp = false;

		var c2_window = new calendar3(window.document.getElementById('date2'));
		c2_window.year_scroll = true;
		c2_window.time_comp = false;
//-->
</script>
</body>
</html>
