<?php
	session_start();

	if(!isset($_SESSION['login_id']))
		header("location: login.php");
		
	include_once("db_info.php");
	include_once("MySQLConnector.php");
	$db_connector = new TMySQLConnector($global_db_adress, $global_db, $global_db_user, $global_db_pass);
	
	$groups = array();
	$db_connector->GetRows($groups, "WHERE ID > 0", "client_group");	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>下載月結檔案</title>
<script language="JavaScript" src="calendar3.js"></script>
<script language="javascript" src="date.js"></script>
</head>

<body>
<form id="form1" name="form1" method="post" action="export_monthly_balance.php">
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="3"><div align="center">下載月結檔案</div></td>
    </tr>
    <tr>
      <td width="2%">&nbsp;</td>
      <td width="9%">&nbsp;</td>
      <td width="89%">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>日期：</td>
      <td>由
        <label>
        <span style="width: 155px">
        <input   name="date1" type="text" id="date1" value="<?php echo date('Y-m-d'); ?>" size="10" maxlength="16" />
        </span>
        <a href="javascript:c1_window.popup();" ><img src="img/cal.gif" width="16" height="16" border="0" alt="Click Here to Pick up the date" /></a> 至 
<span style="width: 209px">
<input  name="date2" type="text" id="date2" value="<?php echo date('Y-m-d'); ?>" size="10" maxlength="16" />
</span>        <a href="javascript:c2_window.popup();" ><img src="img/cal.gif" width="16" height="16" border="0" alt="Click Here to Pick up the date" /></a></label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><label>
        <input type="submit" name="button" id="button" value="下載" />
      </label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
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
</form>
</body>
</html>
