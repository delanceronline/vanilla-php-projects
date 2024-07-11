<?php /* Smarty version 2.6.26, created on 2010-05-27 14:31:23
         compiled from index.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>搵補習.hk</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
    <td width="92" background="images/left_gradient.png">&nbsp;</td>
    <td width="840">
    
    <table width="840" border="0" cellspacing="0" cellpadding="0">
    <tr><td>
<table width="830" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="10" background="images/spacer_336633.gif"><img src="images/spacer_346633.gif" width="10" /></td>
        <td width="525" valign="top" bgcolor="#346633"><table width="525" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><table width="525" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td>
                  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'logo_and_menu.inc.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                  </td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="17" bgcolor="#346633">&nbsp;</td>
                  <td width="482"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><span class="white_text_12">&gt; 網站首頁</span><br /></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td><img src="images/bg3_33.jpg" width="482" height="9" alt="" /></td>
                      </tr>
                      <tr>
                        <td height="24" background="images/new_cases_bar.jpg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="40" height="24">&nbsp;</td>
                              <td class="black_bold_text">&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td bgcolor="#61A327" height="8"></td>
                      </tr>
                      <tr>
                        <td height="57" bgcolor="#61A327"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="35" height="64">&nbsp;</td>
                              <td width="46" valign="top"><a href="<?php if ($this->_tpl_vars['ri'] != 1): ?>index.php?ri=1<?php endif; ?>#nt_case" name="nt_case" id="nt_case"><img src="images/nt_icon.jpg" width="46" height="62" border="0" /></a></td>
                              <td width="50">&nbsp;</td>
                              <td width="50"><a href="<?php if ($this->_tpl_vars['ri'] != 2): ?>index.php?ri=2<?php endif; ?>#kn_case" name="kn_case" id="kn_case"><img src="images/kln_icon.jpg" width="46" height="62" border="0" /></a></td>
                              <td width="50">&nbsp;</td>
                              <td width="50"><a href="<?php if ($this->_tpl_vars['ri'] != 3): ?>index.php?ri=3<?php endif; ?>#hki_case" name="hki_case" id="hki_case"><img src="images/hki_icon.jpg" width="46" height="62" border="0" /></a></td>
                              <td width="100">&nbsp;</td>
                              <td width="112"><a href="clients.php?ri=<?php echo $this->_tpl_vars['ri']; ?>
"><img src="images/more_button_larger.jpg" width="72" height="29" border="0" /></a></td>
                            </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td><img src="images/bg3_40.jpg" width="482" height="10" alt="" /></td>
                      </tr>
                      <tr>
                        <td><table width="482" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td bgcolor="#61A327" height="10"></td>
                              <td bgcolor="#FEF9DC"></td>
                              <td bgcolor="#61A327"></td>
                            </tr>
                            
                            <?php $_from = $this->_tpl_vars['clients']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['index'] => $this->_tpl_vars['v']):
?>
                            <tr>
                              <td bgcolor="#61A327">&nbsp;</td>
                              <td bgcolor="#FEF9DC"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td width="20">&nbsp;</td>
                                    <td width="60" align="center" valign="top"><a href="client_detail.php?ci=<?php echo $this->_tpl_vars['v']['id']; ?>
" target="_blank"><img src="images/paper_record_icon.jpg" width="40" height="40" border="0" /></a></td>
                                    <td width="220" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                          <td><span class="darkgreen_bold_text"><a href="client_detail.php?ci=<?php echo $this->_tpl_vars['v']['id']; ?>
" target="_blank" class="darkgreen_bold_text"><?php echo $this->_tpl_vars['v']['sub_region']; ?>
 <?php echo $this->_tpl_vars['v']['estate']; ?>
</a></span></td>
                                        </tr>
                                        <tr>
                                          <td height="4"></td>
                                        </tr>
                                        <tr>
                                          <td><span class="darkgreen_bold_text"><?php echo $this->_tpl_vars['v']['service']; ?>
 <?php echo $this->_tpl_vars['v']['service_detail']; ?>
</span></td>
                                        </tr>
                                        <tr>
                                          <td height="4"></td>
                                        </tr>
                                        <tr>
                                          <td><span class="darkgreen_bold_text"><?php if ($this->_tpl_vars['v']['rate'] != '$'): ?><?php echo $this->_tpl_vars['v']['rate']; ?>
 / 小時<?php endif; ?><?php if ($this->_tpl_vars['v']['rate'] != '$' && $this->_tpl_vars['v']['lesson_count'] != ''): ?>, <?php endif; ?><?php if ($this->_tpl_vars['v']['lesson_count'] != ''): ?>每星期<?php echo $this->_tpl_vars['v']['lesson_count']; ?>
堂<?php endif; ?></span></td>
                                        </tr>
                                    </table></td>
                                    <td width="10">&nbsp;</td>
                                    <td width="134" align="center" valign="top"><span class="brown_text"><a href="tutor_request.php?ci=<?php echo $this->_tpl_vars['v']['id']; ?>
" class="brown_text" target="_blank">我有興趣</a></span><br />
                                      <a href="tutor_request.php?ci=<?php echo $this->_tpl_vars['v']['id']; ?>
" target="_blank"><img src="images/mag_glass_icon.jpg" width="40" height="40" border="0" /></a></td>
                                  </tr>
                              </table></td>
                              <td bgcolor="#61A327">&nbsp;</td>
                            </tr>
                            <tr>
                              <td bgcolor="#61A327">&nbsp;</td>
                              <td bgcolor="#FEF9DC"><img src="images/bg3_46.jpg" width="448" height="10" alt="" /></td>
                              <td bgcolor="#61A327">&nbsp;</td>
                            </tr>
                            <?php endforeach; endif; unset($_from); ?>
                            <tr>
                              <td bgcolor="#61A327">&nbsp;</td>
                              <td bgcolor="#FEF9DC">&nbsp;</td>
                              <td bgcolor="#61A327">&nbsp;</td>
                            </tr>
                            <tr>
                              <td width="18" bgcolor="#61A327">&nbsp;</td>
                              <td width="448" bgcolor="#FEF9DC">&nbsp;</td>
                              <td bgcolor="#61A327">&nbsp;</td>
                            </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td><img src="images/bg3_57.jpg" width="482" height="8" alt="" /></td>
                      </tr>
                      <tr>
                        <td><img src="images/bg3_59.jpg" width="482" height="12" alt="" /></td>
                      </tr>
                      <tr>
                        <td bgcolor="#346633">&nbsp;</td>
                      </tr>
                  </table></td>
                  <td bgcolor="#346633">&nbsp;</td>
                </tr>
            </table></td>
          </tr>
        </table></td>
        <td width="305" valign="top" bgcolor="#346633"><table width="305" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'find_tutor_form.inc.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            </td>
          </tr>
          <tr>
            <td><form action="tutor_login.php">
                <table width="305" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><img src="images/bg3_29.jpg" width="305" height="72" alt="" /></td>
                  </tr>
                  <tr>
                    <td><table width="305" border="0" cellspacing="0" cellpadding="0" background="images/bg3_36.jpg">
                        <tr>
                          <td width="40" height="27">&nbsp;</td>
                          <td width="80" class="brown_bold_text"> 登記電郵 </td>
                          <td width="185"><input name="email" type="text" class="brown_text" id="email" /></td>
                        </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td><table width="305" border="0" cellspacing="0" cellpadding="0" background="images/bg3_36.jpg">
                        <tr>
                          <td width="40" height="27">&nbsp;</td>
                          <td width="80" class="brown_bold_text"> 識別密碼 </td>
                          <td width="185"><input name="password" type="password" class="brown_text" id="password" /></td>
                        </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td><table width="305" border="0" cellspacing="0" cellpadding="0" background="images/bg3_36.jpg">
                        <tr>
                          <td height="27">&nbsp;</td>
                          <td><a href="reset_passcode.php" class="brown_underline_text">重設密碼</a></td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td width="40" height="27">&nbsp;</td>
                          <td width="160">&nbsp;</td>
                          <td width="105"><input name="button" type="image" id="button" value="Submit" src="images/sign_in_button.jpg" /></td>
                        </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td><img src="images/bg3_45.jpg" width="305" height="19" alt="" /></td>
                  </tr>
                  <tr>
                    <td height="11"><img src="images/bg3_47.jpg" width="305" height="11" alt="" /></td>
                  </tr>
                  <tr>
                    <td height="24" background="images/tutor_ad_bar.jpg"><table width="305" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="34" height="24">&nbsp;</td>
                          <td width="168" height="24" valign="middle" class="black_bold_text">&nbsp;</td>
                          <td width="103">&nbsp;</td>
                        </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td><img src="images/bg3_50.jpg" width="305" height="9" alt="" /></td>
                  </tr>
                  <tr>
                    <td><img src="images/bg3_51.jpg" width="305" height="10" alt="" /></td>
                  </tr>
                  <tr>
                    <td><table width="305" border="0" cellspacing="0" cellpadding="0">
                        
                        
                        <?php $_from = $this->_tpl_vars['featured_tutors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['index'] => $this->_tpl_vars['v']):
?>
                        <tr>
                          <td background="images/bg3_52.jpg">&nbsp;</td>
                          <td bgcolor="#FFFADD"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="10">&nbsp;</td>
                                <td width="40" valign="top">                                
                                <a href="tutor_detail.php?id=<?php echo $this->_tpl_vars['v']['id']; ?>
" target="_blank">
                                <?php if ($this->_tpl_vars['v']['pi_gender'] == 1): ?><img src="images/male_profile_icon.jpg" width="31" height="33" border="0" /><?php else: ?><img src="images/female_profile_icon.jpg" width="31" height="33" border="0" /><?php endif; ?>                                                                
                                </a>
                                </td>
                                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td class="brown_bold_text"><a href="tutor_detail.php?id=<?php echo $this->_tpl_vars['v']['id']; ?>
" class="brown_bold_text" target="_blank"><?php echo $this->_tpl_vars['v']['si_title']; ?>
</a></td>
                                      <td width="10">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td height="10"></td>
                                      <td></td>
                                    </tr>
                                    <tr>
                                      <td class="brown_text"><?php echo $this->_tpl_vars['v']['si_detail']; ?>
</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                </table></td>
                              </tr>
                          </table></td>
                          <td bgcolor="#61A327">&nbsp;</td>
                        </tr>
                        <?php endforeach; endif; unset($_from); ?>
                        
                        

                        <tr>
                          <td background="images/bg3_52.jpg">&nbsp;</td>
                          <td bgcolor="#FFFADD">&nbsp;</td>
                          <td bgcolor="#61A327">&nbsp;</td>
                        </tr>
                        <tr>
                          <td background="images/bg3_52.jpg">&nbsp;</td>
                          <td bgcolor="#FFFADD">&nbsp;</td>
                          <td bgcolor="#61A327">&nbsp;</td>
                        </tr>
                        <tr>
                          <td width="13" background="images/bg3_52.jpg">&nbsp;</td>
                          <td width="0" bgcolor="#FFFADD">&nbsp;</td>
                          <td width="13" bgcolor="#61A327">&nbsp;</td>
                        </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td><img src="images/bg3_55.jpg" width="305" height="9" alt="" /></td>
                  </tr>
                  <tr>
                    <td background="images/bg3_20.jpg"><table width="305" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="40" height="30">&nbsp;</td>
                          <td width="160">&nbsp;</td>
                          <td><a href="#"><img src="images/more_button.jpg" alt="" width="60" height="24" border="0" /></a></td>
                        </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td><img src="images/bg3_60.jpg" width="305" height="9" alt="" /></td>
                  </tr>
                </table>
            </form></td>
          </tr>
        </table></td>
      </tr>
    </table>    
    </td></tr>
    
    <tr>
      <td><table width="840" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="115" bgcolor="#346633">&nbsp;</td>
            <td width="600" bgcolor="#346633">
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.inc.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            </td>
            <td width="115" bgcolor="#346633">&nbsp;</td>
          </tr>
        </table></td></tr>    
    </table>
    
    </td>
    <td width="92" background="images/right_gradient.png">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>