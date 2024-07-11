<?php /* Smarty version 2.6.26, created on 2010-06-04 11:16:00
         compiled from tutor_login.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>搵補習.hk --- 導師登入</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
    <td width="92" background="images/left_gradient.png">&nbsp;</td>
    <td width="840">
    
    <table width="840" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="10" bgcolor="#336633"></td>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="525" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'logo_and_menu.inc.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
                    </tr>
                    <tr>
                      <td height="100" valign="middle" bgcolor="#336633"><img src="images/tutor_login.jpg" width="514" height="90" /></td>
                    </tr>
                  </table></td>
                  <td width="305" valign="top" bgcolor="#336633"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'find_tutor_form.inc.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
                </tr>
              </table></td>
            </tr>
            <tr>
            	<td bgcolor="#346631">&nbsp;</td>
            </tr>
            <tr>
              <td bgcolor="#336633"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="images/tc_top.jpg" width="830" height="40" /></td>
                </tr>
                <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="40" background="images/tc_left.jpg"></td>
                      <td width="750" bgcolor="#FFFADD"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td width="700"><form id="form1" name="form1" method="post" action="">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="100" class="brown_text"> <input type="hidden" name="target" id="target" value="<?php echo $this->_tpl_vars['target']; ?>
" />
                                  登記電郵 </td>
                                <td><label>
                                <input name="email" type="text" class="black_text" id="email" value="<?php echo $this->_tpl_vars['email']; ?>
" />
                                </label></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td class="brown_text"> 識別密碼 </td>
                                <td><label>
                                  <input name="password" type="password" class="black_text" id="password" />
                                  <a href="reset_passcode.php" class="brown_underline_text">重設密碼</a></label></td>
                              </tr>
                              
                              <?php if ($this->_tpl_vars['message'] != ''): ?>
                              <tr>
                                <td colspan="2">&nbsp;</td>
                                </tr>
                              <tr>
                                <td colspan="2" class="lightred_bold_text"><?php echo $this->_tpl_vars['message']; ?>
</td>
                                </tr>
                              <?php endif; ?>
                              
                              <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td><label>
                                  <input name="button2" type="submit" class="black_text" id="button2" value="登入" />
                                </label></td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td colspan="2"><a href="tutor_register.php" target="_blank" class="brown_underline_text">立即加入成為GOODTUTOR！</a> </td>
                                </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                            </table>
                                                    </form>
                          </td>
                          <td>&nbsp;</td>
                        </tr>
                      </table>
                        <br /></td>
                      <td width="40" background="images/tc_right.jpg">&nbsp;</td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td><img src="images/tc_buttom.jpg" width="830" height="40" /></td>
                </tr>
              </table></td>
            </tr>
          </table></td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td bgcolor="#336633"><table width="840" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="115" bgcolor="#346633">&nbsp;</td>
          <td width="600" bgcolor="#346633"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.inc.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
          <td width="115" bgcolor="#346633">&nbsp;</td>
        </tr>
      </table></td>
    </tr>
    </table>
    
    </td>
    <td width="92" background="images/right_gradient.png">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>