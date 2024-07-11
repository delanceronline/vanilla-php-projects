<?php /* Smarty version 2.6.26, created on 2010-06-08 23:12:31
         compiled from clients.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>搵補習.hk --- 補習個案</title>
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
                      <td height="100" valign="middle" bgcolor="#336633"><img src="images/clients.jpg" width="525" height="90" /></td>
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
                  <td><img src="images/cltc_top1.jpg" width="830" height="20" /></td>
                </tr>
                <tr>
                  <td height="60" bgcolor="#61A327"><table width="740" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="80" height="64" valign="top"><a name="clients" id="clients"></a></td>
                      <td width="60" valign="top"><a href="<?php if ($this->_tpl_vars['ri'] != 1): ?>clients.php?ri=1<?php endif; ?>#nt_case" name="nt_case" id="nt_case"><img src="images/nt_icon.jpg" width="46" height="62" border="0" /></a></td>
                      <td width="40">&nbsp;</td>
                      <td width="60"><a href="<?php if ($this->_tpl_vars['ri'] != 2): ?>clients.php?ri=2<?php endif; ?>#kn_case" name="kn_case" id="kn_case"><img src="images/kln_icon.jpg" width="46" height="62" border="0" /></a></td>
                      <td width="40">&nbsp;</td>
                      <td width="60"><a href="<?php if ($this->_tpl_vars['ri'] != 3): ?>clients.php?ri=3<?php endif; ?>#hki_case" name="hki_case" id="hki_case"><img src="images/hki_icon.jpg" width="46" height="62" border="0" /></a></td>
                      <td width="40">&nbsp;</td>
                      <td width="360" valign="middle" class="white_bold_text"><span class="hd_white_bold_text">要找到合適的學生？...<br />
                        快些加入我們的導師聯盟吧！</span><br /></td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td><img src="images/cltc_top2.jpg" width="830" height="20" /></td>
                </tr>
                <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="40" background="images/tc_left.jpg"></td>
                      <td width="750" bgcolor="#FFFADD"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td>&nbsp;</td>
                          <td width="700"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            
                            <?php $_from = $this->_tpl_vars['clients']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['index'] => $this->_tpl_vars['v']):
?>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>                            
                            <tr>
                              <td><table width="700" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td width="60" align="center" valign="top"><a href="client_detail.php?ci=<?php echo $this->_tpl_vars['v']['id']; ?>
" target="_blank"><img src="images/paper_record_icon.jpg" width="40" height="40" border="0" /></a></td>
                                  <td width="460" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <td width="300"><span class="darkgreen_bold_text"><a href="client_detail.php?ci=<?php echo $this->_tpl_vars['v']['id']; ?>
" target="_blank" class="darkgreen_bold_text"><?php echo $this->_tpl_vars['v']['sub_region']; ?>
 <?php echo $this->_tpl_vars['v']['estate']; ?>
</a></span></td>
                                            <td class="black_text"> <div align="right" class="brown_text">
                                              <div align="center"><?php echo $this->_tpl_vars['v']['creation_date']; ?>
</div>
                                            </div></td>
                                          </tr>
                                        </table>                                          
                                          </td>
                                      </tr>
                                      <tr>
                                        <td height="4"></td>
                                      </tr>
                                      <tr>
                                        <td><br /><span class="darkgreen_bold_text"><?php echo $this->_tpl_vars['v']['service']; ?>
 <?php echo $this->_tpl_vars['v']['service_detail']; ?>
<?php if ($this->_tpl_vars['v']['rate'] != '$'): ?>, <?php echo $this->_tpl_vars['v']['rate']; ?>
 / 小時<?php endif; ?><?php if ($this->_tpl_vars['v']['lesson_count'] != ''): ?>, 每星期<?php echo $this->_tpl_vars['v']['lesson_count']; ?>
堂<?php endif; ?></span></td>
                                      </tr>
                                      <tr>
                                        <td height="4"></td>
                                      </tr>
                                      <tr>
                                        <td></td>
                                      </tr>
                                  </table></td>
                                  <td width="20">&nbsp;</td>
                                  <td align="center" valign="top">
                                  <?php if ($this->_tpl_vars['v']['is_drawn'] == 0): ?>
                                  <div align="center"><span class="brown_text"><a href="tutor_request.php?ci=<?php echo $this->_tpl_vars['v']['id']; ?>
" class="brown_text" target="_blank">我有興趣</a></span><br />
                                      <a href="tutor_request.php?ci=<?php echo $this->_tpl_vars['v']['id']; ?>
" target="_blank"><img src="images/mag_glass_icon.jpg" width="40" height="40" border="0" /></a></div>
                                  <?php else: ?><div align="center"><span class="brown_bold_text">已接收</span></div><?php endif; ?></td>
                                </tr>
                              </table></td>
                            </tr>
                            <tr>
                              <td><hr /></td>
                            </tr>
                            <?php endforeach; endif; unset($_from); ?>
                            

                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>
                              <?php echo $this->_tpl_vars['paging']->Render(); ?>

                              </td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                          </table></td>
                          <td>&nbsp;</td>
                        </tr>
                      </table>
                       </td>
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