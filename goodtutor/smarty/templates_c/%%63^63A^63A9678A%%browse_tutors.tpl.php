<?php /* Smarty version 2.6.26, created on 2010-04-23 13:22:10
         compiled from admin_browse_tutors.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'admin_browse_tutors.tpl', 16, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Browse tutors</title>
</head>

<body>
<p><strong>Registered tutors</strong></p>
<form id="form1" name="form1" method="post" action="">
  地區：
  <label>
  <select name="sub_region" id="sub_region">
      <option value="-1">------請選擇------</option>
    <option value="region1" <?php if ($this->_tpl_vars['region'] == 1): ?>selected="selected"<?php endif; ?>>------新界區------</option>
      <?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['nt_ids'],'output' => $this->_tpl_vars['nt_names'],'selected' => $this->_tpl_vars['sub_region']), $this);?>

      <option value="region2" <?php if ($this->_tpl_vars['region'] == 2): ?>selected="selected"<?php endif; ?>>------九龍區------</option>
      <?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['kn_ids'],'output' => $this->_tpl_vars['kn_names'],'selected' => $this->_tpl_vars['sub_region']), $this);?>

      <option value="region3" <?php if ($this->_tpl_vars['region'] == 3): ?>selected="selected"<?php endif; ?>>------港島區------</option>
      <?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['hki_ids'],'output' => $this->_tpl_vars['hki_names'],'selected' => $this->_tpl_vars['sub_region']), $this);?>

      <option value="region100" <?php if ($this->_tpl_vars['region'] == 100): ?>selected="selected"<?php endif; ?>>------其他------</option>
    </select>
    </label>
  性別：
  <label>
  <select name="gender" id="gender">
    <option value="-1">---</option>
    <option value="1" <?php if ($this->_tpl_vars['gender'] == 1): ?>selected="selected"<?php endif; ?>>男</option>
    <option value="2" <?php if ($this->_tpl_vars['gender'] == 2): ?>selected="selected"<?php endif; ?>>女</option>
  </select>
  </label>
  最高教育程度：
  <select name="aq" id="aq">
  <option value="-1">------請選擇------</option>
      <?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['qf_ids'],'output' => $this->_tpl_vars['qf_names'],'selected' => $this->_tpl_vars['aq']), $this);?>

    </select>
  高中修讀科目類別 ：
  <select name="hs_major" id="hs_major">
  <option value="-1">------請選擇------</option>
        <?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['hm_ids'],'output' => $this->_tpl_vars['hm_names'],'selected' => $this->_tpl_vars['hs_major']), $this);?>

    </select>
就讀院校：
  <select name="college" id="college">
  <option value="-1">------請選擇------</option>
      <?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['college_ids'],'output' => $this->_tpl_vars['college_names'],'selected' => $this->_tpl_vars['college']), $this);?>

    </select>
  <label>服務對象：
  <select name="st" id="st">
    <option value="-1">------請選擇------</option>    
      <?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['st_ids'],'output' => $this->_tpl_vars['st_names'],'selected' => $this->_tpl_vars['st']), $this);?>
    
  </select>
  <input type="submit" name="Submit" id="Submit" value="Filter" />
  </label>
</form>
<br />
<br />
<?php $_from = $this->_tpl_vars['tutors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['index'] => $this->_tpl_vars['v']):
?>
<p><?php echo $this->_tpl_vars['v']['email']; ?>
, <?php echo $this->_tpl_vars['v']['pi_gender']; ?>
, <?php echo $this->_tpl_vars['v']['aq_el']; ?>
, <?php echo $this->_tpl_vars['v']['aq_college']; ?>
 --- <a href="tutor_detail.php?id=<?php echo $this->_tpl_vars['v']['id']; ?>
" target="_blank">details</a> </p>
<?php endforeach; endif; unset($_from); ?>
</body>
</html>
