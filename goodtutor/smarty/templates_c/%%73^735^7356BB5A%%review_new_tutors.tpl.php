<?php /* Smarty version 2.6.26, created on 2010-04-06 18:08:57
         compiled from admin_review_new_tutors.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Review new tutors</title>
</head>

<body>
<strong>Newly registered tutors</strong><br />
<br />
<?php $_from = $this->_tpl_vars['tutors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
<?php echo $this->_tpl_vars['k']; ?>
. <?php echo $this->_tpl_vars['v']['email']; ?>
<?php if ($this->_tpl_vars['v']['pi_gender'] == 1): ?>, Male<?php elseif ($this->_tpl_vars['v']['pi_gender'] == 2): ?>, Female<?php else: ?>, ???<?php endif; ?>, <?php echo $this->_tpl_vars['v']['creation_date']; ?>
<?php if ($this->_tpl_vars['v']['is_generated'] == 1): ?>, *<?php endif; ?> <a href="review_new_tutor_detail.php?id=<?php echo $this->_tpl_vars['v']['id']; ?>
" target="_blank">info</a><br />
<?php endforeach; endif; unset($_from); ?>
</body>
</html>
