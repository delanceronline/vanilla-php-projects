<?php /* Smarty version 2.6.26, created on 2010-04-29 10:35:04
         compiled from admin_review_tutor_profile_editions.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Review tutor profile editions</title>
</head>

<body>
<p><strong>Tutors recently updated the profile</strong><br />
  <br />
<?php $_from = $this->_tpl_vars['tutors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
<?php echo $this->_tpl_vars['v']['modified_date']; ?>
. <?php echo $this->_tpl_vars['v']['i_email']; ?>
<?php if ($this->_tpl_vars['v']['pi_gender'] == 1): ?>, Male<?php elseif ($this->_tpl_vars['v']['pi_gender'] == 2): ?>, Female<?php else: ?>, ???<?php endif; ?> ------ <a href="review_tutor_profile_editions_detail.php?id=<?php echo $this->_tpl_vars['v']['id']; ?>
" target="_blank">info</a> ------ <a href="review_tutor_profile_editions.php?action=1&id=<?php echo $this->_tpl_vars['v']['id']; ?>
">trash</a><br />
<?php endforeach; endif; unset($_from); ?></p>
<p>&nbsp;</p>
<p><a href="index.php">Back</a></p>
</body>
</html>