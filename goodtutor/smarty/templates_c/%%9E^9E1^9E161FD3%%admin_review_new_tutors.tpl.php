<?php /* Smarty version 2.6.26, created on 2010-04-26 11:49:21
         compiled from admin_review_new_tutors.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Review new tutors</title>
</head>

<body>
<p><strong>Newly registered tutors</strong><br />
    <br />
</p>
<form id="form1" name="form1" method="post" action="">
  Verified: 
    <label>
  <select name="is_verified" id="is_verified">
    <option value="-1">---</option>
    <option value="1" <?php if ($this->_tpl_vars['is_verified'] == 1): ?>selected="selected"<?php endif; ?>>Yes</option>
    <option value="0" <?php if ($this->_tpl_vars['is_verified'] == 0): ?>selected="selected"<?php endif; ?>>No</option>
  </select>
  </label>
  <label>
  <input type="submit" name="button" id="button" value="Filter" />
  </label>
</form>
<p><br />
  <br />
<?php $_from = $this->_tpl_vars['tutors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->_tpl_vars['v']['email']; ?>
<?php if ($this->_tpl_vars['v']['pi_gender'] == 1): ?>, Male<?php elseif ($this->_tpl_vars['v']['pi_gender'] == 2): ?>, Female<?php else: ?>, ???<?php endif; ?>, <?php echo $this->_tpl_vars['v']['creation_date']; ?>
<?php if ($this->_tpl_vars['v']['is_verified'] == 0): ?>, not verified<?php endif; ?><?php if ($this->_tpl_vars['v']['is_generated'] == 1): ?>, *<?php endif; ?> ------ <a href="review_new_tutor_detail.php?id=<?php echo $this->_tpl_vars['v']['id']; ?>
" target="_blank">info</a><br /><br />
<?php endforeach; endif; unset($_from); ?></p>
<p>&nbsp;</p>
<p><a href="index.php">Back</a></p>
</body>
</html>