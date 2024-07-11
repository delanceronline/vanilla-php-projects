<?php /* Smarty version 2.6.26, created on 2010-04-25 02:26:29
         compiled from admin_tutor_requests.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'admin_tutor_requests.tpl', 15, false),)), $this); ?>
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
      <?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['client_ids'],'output' => $this->_tpl_vars['client_ids'],'selected' => $this->_tpl_vars['case']), $this);?>

    </select>
    Generated:
    <select name="is_generated" id="is_generated">
      <option value="0" <?php if ($this->_tpl_vars['is_generated'] == 0): ?>selected="selected"<?php endif; ?>>No</option>
      <option value="1" <?php if ($this->_tpl_vars['is_generated'] == 1): ?>selected="selected"<?php endif; ?>>Yes</option>
    </select>
  </label>
<label>
    <input type="submit" name="button" id="button" value="Filter" />
    </label>
</form>
<br /><br />
<table width="800" border="1" cellspacing="0" cellpadding="0">
<?php $_from = $this->_tpl_vars['requests']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['index'] => $this->_tpl_vars['v']):
?>
  <tr>
     <td width="400"><div align="center"><a href="tutor_detail.php?id=<?php echo $this->_tpl_vars['v']['i_tutor']; ?>
" target="_blank"><br />
      <?php echo $this->_tpl_vars['v']['tutor_email']; ?>
</a><br />
        <br />
      <?php echo $this->_tpl_vars['v']['message']; ?>
<br />
      <br />
    </div></td>
    <td width="100"><div align="center"><a href="edit_client.php?id=<?php echo $this->_tpl_vars['v']['i_client']; ?>
" target="_blank"><?php echo $this->_tpl_vars['v']['i_client']; ?>
</a><br /><br /><?php echo $this->_tpl_vars['v']['creation_date']; ?>
</div></td>
    <td width="200"><div align="center"><a href="tutor_requests.php?action=1&id=<?php echo $this->_tpl_vars['v']['id']; ?>
">archive</a></div></td>
  </tr>
<?php endforeach; endif; unset($_from); ?>
</table>
<p><a href="index.php">Back</a></p>
</body>
</html>