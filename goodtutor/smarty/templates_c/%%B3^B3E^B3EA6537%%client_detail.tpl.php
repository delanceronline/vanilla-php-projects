<?php /* Smarty version 2.6.26, created on 2010-06-04 00:56:29
         compiled from client_detail.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>搵補習.hk --- 個案詳情</title>
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
                      <td height="100" valign="middle" bgcolor="#336633"><img src="images/clients.jpg" alt="" width="525" height="90" /></td>
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
                          <td width="700">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">

                              <tr>
                                <td valign="top">&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td width="53%">&nbsp;</td>
                                    <td width="47%"><div align="center"><a href="#" class="brown_text">我有興趣</a><br />
                                        <a href="#"><img src="images/mag_glass_icon.jpg" alt="" width="40" height="40" border="0" /></a></div></td>
                                  </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td width="140" valign="top"><strong class="brown_bold_underline_text">個案詳情</strong></td>
                                <td width="210">&nbsp;</td>
                                <td width="140"><div align="center"></div></td>
                                <td width="210">&nbsp;</td>
                              </tr>
                              
                              <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td><span class="brown_text">授課地區：</span></td>
                                <td><strong class="brown_bold_text"><?php echo $this->_tpl_vars['client']['sub_region']; ?>
</strong></td>
                                <td><span class="brown_text">補習項目：</span></td>
                                <td><strong class="brown_bold_text"><?php if ($this->_tpl_vars['client']['service'] != ''): ?><?php echo $this->_tpl_vars['client']['service']; ?>
<?php else: ?>N/A<?php endif; ?></strong></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td><span class="brown_text">屋苑 ／地點：</span></td>
                                <td><strong class="brown_bold_text"><?php if ($this->_tpl_vars['client']['estate'] != ''): ?><?php echo $this->_tpl_vars['client']['estate']; ?>
<?php else: ?>N/A<?php endif; ?></strong></td>
                                <td><span class="brown_text">專補科目／項目補充：</span></td>
                                <td><strong class="brown_bold_text"><?php if ($this->_tpl_vars['client']['service_detail'] != ''): ?><?php echo $this->_tpl_vars['client']['service_detail']; ?>
<?php else: ?>N/A<?php endif; ?></strong></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td><span class="brown_text">每星期堂數：</span></td>
                                <td class="brown_bold_text"><?php if ($this->_tpl_vars['client']['lesson_count'] != ''): ?><?php echo $this->_tpl_vars['client']['lesson_count']; ?>
堂<?php else: ?>N/A<?php endif; ?></td>
                                <td><span class="brown_text">每堂時數：</span></td>
                                <td class="brown_bold_text"><?php if ($this->_tpl_vars['client']['lesson_length'] != ''): ?><?php echo $this->_tpl_vars['client']['lesson_length']; ?>
小時<?php else: ?>N/A<?php endif; ?></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td><span class="brown_text">導師最低學歷要求：</span></td>
                                <td><strong class="brown_bold_text"><?php if ($this->_tpl_vars['client']['mq'] != ''): ?><?php echo $this->_tpl_vars['client']['mq']; ?>
<?php else: ?>N/A<?php endif; ?></strong></td>
                                <td><span class="brown_text">每小時學費：</span></td>
                                <td><span class="brown_bold_text"><?php if ($this->_tpl_vars['client']['rate'] != '$'): ?><?php echo $this->_tpl_vars['client']['rate']; ?>
<?php else: ?>N/A<?php endif; ?></span></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td><span class="brown_text">學歷要求補充：</span></td>
                                <td><span class="brown_bold_text"><?php if ($this->_tpl_vars['client']['mq_detail'] != ''): ?><?php echo $this->_tpl_vars['client']['mq_detail']; ?>
<?php else: ?>N/A<?php endif; ?></span></td>
                                <td><span class="brown_text">學生姓別：</span></td>
                                <td><span class="brown_bold_text"><?php if ($this->_tpl_vars['client']['student_gender'] != ''): ?><?php echo $this->_tpl_vars['client']['student_gender']; ?>
<?php else: ?>N/A<?php endif; ?></span></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td><span class="brown_text">導師姓別要求：</span></td>
                                <td><span class="brown_bold_text"><?php if ($this->_tpl_vars['client']['tutor_gender'] != ''): ?><?php echo $this->_tpl_vars['client']['tutor_gender']; ?>
<?php else: ?>N/A<?php endif; ?></span></td>
                                <td><span class="brown_text">學生年齡：</span></td>
                                <td><span class="brown_bold_text"><?php if ($this->_tpl_vars['client']['student_age'] != ''): ?><?php echo $this->_tpl_vars['client']['student_age']; ?>
歲<?php else: ?>N/A<?php endif; ?></span></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td><span class="brown_text">特別要求：</span></td>
                                <td><span class="brown_bold_text"><?php if ($this->_tpl_vars['client']['special_request'] != ''): ?><?php echo $this->_tpl_vars['client']['special_request']; ?>
<?php else: ?>N/A<?php endif; ?></span></td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td class="brown_bold_underline_text">授課時間</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td colspan="4">
                                <?php if ($this->_tpl_vars['client']['is_all_time'] == 0): ?>
                                <table width="700" border="1" cellpadding="0" cellspacing="0" bordercolor="#C09B76">
                                  <tbody>
                                    <tr>
                                      <td width="140"> </td>
                                      <td class="brown_bold_text" align="center">星期一</td>
                                      <td class="brown_bold_text" align="center">星期二</td>
                                      <td class="brown_bold_text" align="center">星期三</td>
                                      <td class="brown_bold_text" align="center">星期四</td>
                                      <td class="brown_bold_text" align="center">星期五</td>
                                      <td class="brown_bold_text" align="center">星期六</td>
                                      <td class="brown_bold_text" align="center">星期日</td>
                                    </tr>
                                    <tr>
                                    <td height="40" valign="middle" class="brown_bold_text">上午 (2:00pm前)</td>
                                    <td align="center">
                                    <?php if ($this->_tpl_vars['client']['timeslots'][0] == 1): ?><span class="darkgreen_bold_text">可以</span><?php else: ?><span class="brown_bold_text">---</span><?php endif; ?>
                                    </td>
                                    <td align="center">
                                    <?php if ($this->_tpl_vars['client']['timeslots'][3] == 1): ?><span class="darkgreen_bold_text">可以</span><?php else: ?><span class="brown_bold_text">---</span><?php endif; ?>
                                    </td>
                                    <td align="center">
                                    <?php if ($this->_tpl_vars['client']['timeslots'][6] == 1): ?><span class="darkgreen_bold_text">可以</span><?php else: ?><span class="brown_bold_text">---</span><?php endif; ?>
                                    </td>
                                    <td align="center">
                                    <?php if ($this->_tpl_vars['client']['timeslots'][9] == 1): ?><span class="darkgreen_bold_text">可以</span><?php else: ?><span class="brown_bold_text">---</span><?php endif; ?>
                                    </td>
                                    <td align="center">
                                    <?php if ($this->_tpl_vars['client']['timeslots'][12] == 1): ?><span class="darkgreen_bold_text">可以</span><?php else: ?><span class="brown_bold_text">---</span><?php endif; ?>
                                    </td>
                                    <td align="center">
                                    <?php if ($this->_tpl_vars['client']['timeslots'][15] == 1): ?><span class="darkgreen_bold_text">可以</span><?php else: ?><span class="brown_bold_text">---</span><?php endif; ?>
                                    </td>
                                    <td align="center">
                                    <?php if ($this->_tpl_vars['client']['timeslots'][18] == 1): ?><span class="darkgreen_bold_text">可以</span><?php else: ?><span class="brown_bold_text">---</span><?php endif; ?>
                                    </td>
                                    </tr>
                                    <tr>
                                    <td height="40" valign="middle" class="brown_bold_text">下午 (2-7:00pm)</td>
                                    <td align="center">
                                    <?php if ($this->_tpl_vars['client']['timeslots'][1] == 1): ?><span class="darkgreen_bold_text">可以</span><?php else: ?><span class="brown_bold_text">---</span><?php endif; ?>
                                    </td>
                                    <td align="center">
                                    <?php if ($this->_tpl_vars['client']['timeslots'][4] == 1): ?><span class="darkgreen_bold_text">可以</span><?php else: ?><span class="brown_bold_text">---</span><?php endif; ?>
                                    </td>
                                    <td align="center">
                                    <?php if ($this->_tpl_vars['client']['timeslots'][7] == 1): ?><span class="darkgreen_bold_text">可以</span><?php else: ?><span class="brown_bold_text">---</span><?php endif; ?>
                                    </td>
                                    <td align="center">
                                    <?php if ($this->_tpl_vars['client']['timeslots'][10] == 1): ?><span class="darkgreen_bold_text">可以</span><?php else: ?><span class="brown_bold_text">---</span><?php endif; ?>
                                    </td>
                                    <td align="center">
                                    <?php if ($this->_tpl_vars['client']['timeslots'][13] == 1): ?><span class="darkgreen_bold_text">可以</span><?php else: ?><span class="brown_bold_text">---</span><?php endif; ?>
                                    </td>
                                    <td align="center">
                                    <?php if ($this->_tpl_vars['client']['timeslots'][16] == 1): ?><span class="darkgreen_bold_text">可以</span><?php else: ?><span class="brown_bold_text">---</span><?php endif; ?>
                                    </td>
                                    <td align="center">
                                    <?php if ($this->_tpl_vars['client']['timeslots'][19] == 1): ?><span class="darkgreen_bold_text">可以</span><?php else: ?><span class="brown_bold_text">---</span><?php endif; ?>
                                    </td>
                                    </tr>
                                    <tr>
                                    <td height="40" valign="middle" class="brown_bold_text">晚上 (7-10:00pm)</td>
                                    <td align="center">
                                    <?php if ($this->_tpl_vars['client']['timeslots'][2] == 1): ?><span class="darkgreen_bold_text">可以</span><?php else: ?><span class="brown_bold_text">---</span><?php endif; ?>
                                    </td>
                                    <td align="center">
                                    <?php if ($this->_tpl_vars['client']['timeslots'][5] == 1): ?><span class="darkgreen_bold_text">可以</span><?php else: ?><span class="brown_bold_text">---</span><?php endif; ?>
                                    </td>
                                    <td align="center">
                                    <?php if ($this->_tpl_vars['client']['timeslots'][8] == 1): ?><span class="darkgreen_bold_text">可以</span><?php else: ?><span class="brown_bold_text">---</span><?php endif; ?>
                                    </td>
                                    <td align="center">
                                    <?php if ($this->_tpl_vars['client']['timeslots'][11] == 1): ?><span class="darkgreen_bold_text">可以</span><?php else: ?><span class="brown_bold_text">---</span><?php endif; ?>
                                    </td>
                                    <td align="center">
                                    <?php if ($this->_tpl_vars['client']['timeslots'][14] == 1): ?><span class="darkgreen_bold_text">可以</span><?php else: ?><span class="brown_bold_text">---</span><?php endif; ?>
                                    </td>
                                    <td align="center">
                                    <?php if ($this->_tpl_vars['client']['timeslots'][17] == 1): ?><span class="darkgreen_bold_text">可以</span><?php else: ?><span class="brown_bold_text">---</span><?php endif; ?>
                                    </td>
                                    <td align="center">
                                    <?php if ($this->_tpl_vars['client']['timeslots'][20] == 1): ?><span class="darkgreen_bold_text">可以</span><?php else: ?><span class="brown_bold_text">---</span><?php endif; ?>
                                    </td>
                                    </tr>                                    
                                  </tbody>
                                </table>  
                                <?php else: ?>
								<span class="brown_bold_text">任何時間</span><br /><br />
                                <?php endif; ?>
                                                              
                                </td>
                                </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td><div align="center">
                                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td width="53%">&nbsp;</td>
                                      <td width="47%"><div align="center"><a href="#" class="brown_text">我有興趣</a><br />
                                        <a href="#"><img src="images/mag_glass_icon.jpg" alt="" width="40" height="40" border="0" /></a></div></td>
                                    </tr>
                                  </table>
                                  </div></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>                              
                            </table>                            
                            </td>
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