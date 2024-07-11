<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tutor's requests</title>
</head>

<body>
<p><strong>Tutor's requests</strong></p>
<form id="form1" name="form1" method="post" action="tutor_requests.php">
  Case:
  <label>
    <select name="case" id="case">
      <option value="0">---</option>
      {html_options values=$client_ids output=$client_ids selected=$case}
    </select>
    Generated:
    <select name="is_generated" id="is_generated">
      <option value="0" {if $is_generated == 0}selected="selected"{/if}>No</option>
      <option value="1" {if $is_generated == 1}selected="selected"{/if}>Yes</option>
    </select>
  </label>
<label>
    <input type="submit" name="button" id="button" value="Filter" />
    </label>
</form>
<br /><br />
<table width="800" border="1" cellspacing="0" cellpadding="0">
{foreach from=$requests key=index item=v}
  <tr>
     <td width="400"><div align="center"><a href="tutor_detail.php?id={$v.i_tutor}" target="_blank"><br />
      {$v.tutor_email}</a><br />
        <br />
      {$v.message}<br />
      <br />
    </div></td>
    <td width="100"><div align="center"><a href="edit_client.php?id={$v.i_client}" target="_blank">{$v.i_client}</a><br /><br />{$v.creation_date}</div></td>
    <td width="200"><div align="center"><a href="tutor_requests.php?action=1&id={$v.id}">archive</a></div></td>
  </tr>
{/foreach}
</table>
<p><a href="index.php">Back</a></p>
</body>
</html>
