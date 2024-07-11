<?php
	session_start();

	if(!isset($_SESSION['login_id']))
		header("location: login.php");
		
	include_once("./db_info.php");
	include_once("./MySQLConnector.php");
	$db_connector = new TMySQLConnector($global_db_adress, $global_db, $global_db_user, $global_db_pass);
	
	$groups = array();
	$db_connector->GetRows($groups, "WHERE ID > 0 ORDER BY group_code ASC", "client_group");	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>QBIS</title>
</head>
<script language="JavaScript" src="calendar3.js"></script><!-- Date only with year scrolling -->
<script language="javascript" src="prototype-1.6.0.2.js"></script>
<script language="javascript" src="date.js"></script>
<script language="javascript">

    var gFoundCount = 0;
	var gIsShopCodeDirty = true;

    function show_invoices()
    {
		if(isDate(document.getElementById('date1').value, 'y-M-d') == false)
		{
			alert('請輸入正確日期');
			document.getElementById('date1').focus();
			document.getElementById('date1').select();			
			return;			
		}

		if(isDate(document.getElementById('date2').value, 'y-M-d') == false)
		{
			alert('請輸入正確日期');
			document.getElementById('date2').focus();
			document.getElementById('date2').select();			
			return;			
		}
	
        var d1 = document.getElementById('date1').value;
        var d2 = document.getElementById('date2').value;
        var sfc = document.getElementById('shop_f_code').value;
        var di = document.getElementById('department_id').value;
		var ii1 = document.getElementById('invoice_id1').value;
		var ii2 = document.getElementById('invoice_id2').value;
		var un = document.getElementById('user_name').value;
		var gi = document.getElementById('group_id').value;
		var sort_types = document.getElementsByName('sort_type');
		
		var sort_type = 0;
		for(var i = 0; i < sort_types.length; i++)
		{
			if(sort_types[i].checked == true)
			{
				sort_type = sort_types[i].value;
				break;
			}
		}
		
        if(document.getElementById('shop_name_div').innerHTML == '' || document.getElementById('shop_name_div').innerHTML == '---')
            sfc = '';		

        new Ajax.Updater('invoice_div', './ajax_call/get_invoices_table.php?gi=' + gi + '&un=' + un + '&fc=' + sfc + '&date1=' + d1 + '&date2=' + d2 + '&di=' + di + '&ii1=' + ii1 + '&ii2=' + ii2 + '&sort_type=' + sort_type + '&uid=' + Math.random(), { method: 'get', onComplete: on_complete_show_invoices });
    }

    function on_shop_f_code_blur(shop_f_code)
    {
        if(gIsShopCodeDirty == true)
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
    }

    function on_complete_get_shop_name()
    {
    }

    function on_complete_get_department()
    {
		gIsShopCodeDirty = false;
        document.getElementById('department_id').focus();
    }

    function on_complete_show_invoices()
    {
        gFoundCount = parseInt(document.getElementById('match_count_div').innerHTML);

        if(gFoundCount > 0)
            document.getElementById('print_all_selected_button').disabled = false;
        else
            document.getElementById('print_all_selected_button').disabled = true;
    }

    function on_init()
    {
        document.getElementById('shop_f_code').focus();
        document.getElementById('print_all_selected_button').disabled = true;
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

    function do_print()
    {
        var ids = new Array();

        if(gFoundCount > 0)
        {
            for(var i = 0; i < gFoundCount; i++)
            {
                if(document.getElementById('cb' + i).checked == true)
                    ids.push(document.getElementById('cb' + i).value);
            }

            if(ids.length > 0)
            {
                var form = document.getElementById('invoice_list_form');

                form.appendChild(create_hidden_input('ic', ids.length));
                for(var j = 0; j < ids.length; j++)
                {
                    //alert(ids[j])
                    form.appendChild(create_hidden_input('i' + j, ids[j]));
                }

                form.action = "print_invoice.php";
                form.submit();
            }
            else
                alert('沒有發票已被選取！');            
        }
    }

	function do_delete()
	{
		if(confirm("確定要刪除已選登票？") == true)
		{
			var ids = new Array();
	
			if(gFoundCount > 0)
			{
				for(var i = 0; i < gFoundCount; i++)
				{
					if(document.getElementById('cb' + i).checked == true)
						ids.push(document.getElementById('cb' + i).value);
				}
	
				if(ids.length > 0)
				{
					var form = document.getElementById('invoice_list_form');
	
					form.appendChild(create_hidden_input('ic', ids.length));
					for(var j = 0; j < ids.length; j++)
					{
						form.appendChild(create_hidden_input('i' + j, ids[j]));
					}
	
					form.action = "delete_invoice.php";
					form.submit();
				}
				else
					alert('沒有發票已被選取！');            
			}
        }		
	}

</script>
<body onload="on_init();"><tr>
    <td colspan="4"><div align="center">發票清單</div></td>
  </tr>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
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
    <td style="width: 115px">身份：</td>
    <td style="width: 155px"><input type="text" name="user_name" id="user_name" /></td>
    <td style="width: 209px">&nbsp;</td>
    <td style="width: 141px"><input name="sort_type" type="radio" id="radio2" value="1" checked="checked" />
      以身份排序</td>
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
    <td style="width: 115px">編號：</td>
    <td style="width: 155px">由&nbsp;&nbsp;&nbsp;
    <input name="invoice_id1" type="text" id="invoice_id1" size="12" maxlength="20" /></td>
    <td style="width: 209px"><span style="width: 155px">
      至&nbsp;&nbsp;
      <input name="invoice_id2" type="text" id="invoice_id2" size="12" maxlength="20" />
    </span></td>
    <td style="width: 141px"><label>
      <input type="radio" name="sort_type" id="radio" value="2" />
    以<span style="width: 115px">編號</span>排序</label></td>
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
    <td>&nbsp;</td>
    <td style="width: 115px">集團：</td>
    <td style="width: 155px"><label>
      <select name="group_id" id="group_id">
        <option value="0" selected="selected">---</option>
<?php
	foreach($groups as $group)
	{
?>
        <option value="<?php echo $group['ID']; ?>"><?php echo $group['group_name']; ?> (<?php echo $group['group_code']; ?>)</option>
<?php
	}
?>        
      </select>
    </label></td>
    <td style="width: 209px">&nbsp;</td>
    <td style="width: 141px"><input type="radio" name="sort_type" id="radio3" value="3" />
    以<span style="width: 115px">集團</span>排序</td>
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
    <td>&nbsp;</td>
    <td style="width: 115px">分店：</td>
    <td style="width: 155px"><label>
      <input type="text" name="shop_f_code" id="shop_f_code" onblur="on_shop_f_code_blur(this.value);" onchange="gIsShopCodeDirty = true;" />
    </label></td>
    <td style="width: 209px"><div id="shop_name_div" align="center"></div></td>
  <td style="width: 141px"><input type="radio" name="sort_type" id="radio4" value="4" />
    以<span style="width: 115px">分店</span>排序</td>
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
    </div>    </td>
    <td><label>
      <input type="button" name="filter_button" id="filter_button" value="顯示" onclick="show_invoices();" />
    </label></td>
  <td><input type="button" name="print_all_selected_button" id="print_all_selected_button" value="列印所選" onclick="do_print();" /></td>
    <td><input type="button" name="delete_all_selected_button" id="delete_all_selected_button" value="刪除所選" onclick="do_delete();" /></td>
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
    <td colspan="8">
    <form method="post" name="invoice_list_form" id="invoice_list_form">
      <div id="invoice_div">
        <div align="left"></div>
      </div>
    </form>    </td>
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
  </tr>
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
