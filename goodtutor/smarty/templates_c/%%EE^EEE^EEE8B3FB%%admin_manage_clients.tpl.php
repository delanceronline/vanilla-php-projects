<?php /* Smarty version 2.6.26, created on 2010-04-25 00:01:18
         compiled from admin_manage_clients.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'admin_manage_clients.tpl', 17, false),)), $this); ?>
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
      <?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['service_ids'],'output' => $this->_tpl_vars['service_names'],'selected' => $this->_tpl_vars['service']), $this);?>

    </select>
    </label>
  已批閱：
  <select name="is_reviewed" id="is_reviewed">
    <option value="-1">---</option>
    <?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['is_reviewed_ids'],'output' => $this->_tpl_vars['is_reviewed_names'],'selected' => $this->_tpl_vars['is_reviewed']), $this);?>

  </select>
  <label>
  <input type="submit" name="button" id="button" value="Filter" />
  </label>
</form>
<p>&nbsp;</p>
<table width="800" border="1" cellspacing="0" cellpadding="0">
<?php $_from = $this->_tpl_vars['clients']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['index'] => $this->_tpl_vars['v']):
?>
  <tr>
    <td width="20"></td>
    <td width="300"><p><a href="edit_client.php?id=<?php echo $this->_tpl_vars['v']['id']; ?>
" target="_blank"><?php echo $this->_tpl_vars['v']['contact_name']; ?>
, <?php echo $this->_tpl_vars['v']['contact_no']; ?>
</a></p></td>
    <td width="472" valign="middle">&nbsp;&nbsp;<?php if ($this->_tpl_vars['v']['is_reviewed'] == 0): ?>------<a href="manage_clients.php?action=1&ci=<?php echo $this->_tpl_vars['v']['id']; ?>
&service=<?php echo $this->_tpl_vars['service']; ?>
&is_reviewed=<?php echo $this->_tpl_vars['is_reviewed']; ?>
">approve</a><?php endif; ?><?php if ($this->_tpl_vars['v']['is_drawn'] == 0): ?>------<a href="manage_clients.php?action=2&ci=<?php echo $this->_tpl_vars['v']['id']; ?>
&service=<?php echo $this->_tpl_vars['service']; ?>
&is_reviewed=<?php echo $this->_tpl_vars['is_reviewed']; ?>
">draw</a><?php endif; ?>------<a href="manage_clients.php?action=3&ci=<?php echo $this->_tpl_vars['v']['id']; ?>
&service=<?php echo $this->_tpl_vars['service']; ?>
&is_reviewed=<?php echo $this->_tpl_vars['is_reviewed']; ?>
">trash</a></td>
  </tr>
<?php endforeach; endif; unset($_from); ?>  
</table>
<p>&nbsp;</p>
<p><a href="index.php">Back</a></p>
</body>
</html>