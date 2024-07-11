<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Manage clients</title>
</head>

<body>
<p><strong>Clients</strong></p>
<p><br />
</p>
<form id="form1" name="form1" method="post" action="manage_clients.php">
  補習項目：
  <label>
    <select name="service" id="service">
      <option value="-1">---</option>
      {html_options values=$service_ids output=$service_names selected=$service}
    </select>
    </label>
  已批閱：
  <select name="is_reviewed" id="is_reviewed">
    <option value="-1">---</option>
    {html_options values=$is_reviewed_ids output=$is_reviewed_names selected=$is_reviewed}
  </select>
  <label>
  <input type="submit" name="button" id="button" value="Filter" />
  </label>
</form>
<p>&nbsp;</p>
<table width="800" border="1" cellspacing="0" cellpadding="0">
{foreach from=$clients key=index item=v}
  <tr>
    <td width="20"></td>
    <td width="300"><p><a href="edit_client.php?id={$v.id}" target="_blank">{$v.contact_name}, {$v.contact_no}</a></p></td>
    <td width="472" valign="middle">&nbsp;&nbsp;{if $v.is_reviewed == 0}------<a href="manage_clients.php?action=1&ci={$v.id}&service={$service}&is_reviewed={$is_reviewed}">approve</a>{/if}{if $v.is_drawn == 0}------<a href="manage_clients.php?action=2&ci={$v.id}&service={$service}&is_reviewed={$is_reviewed}">draw</a>{/if}------<a href="manage_clients.php?action=3&ci={$v.id}&service={$service}&is_reviewed={$is_reviewed}">trash</a></td>
  </tr>
{/foreach}  
</table>
<p>&nbsp;</p>
<p><a href="index.php">Back</a></p>
</body>
</html>
