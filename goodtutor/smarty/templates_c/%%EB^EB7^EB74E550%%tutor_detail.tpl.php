<?php /* Smarty version 2.6.26, created on 2010-06-07 11:33:51
         compiled from tutor_detail.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>搵補習.hk --- 導師檔案</title>
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
                      <td height="100" valign="middle" bgcolor="#336633" class="hd_white_bold_text"><img src="images/tutor_detail.jpg" width="514" height="90" /></td>
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
                          <td width="700"><form id="form1" name="form1" method="post" action="">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td><strong class="brown_bold_underline_text">自我簡介</strong> </td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td class="brown_bold_text"><?php echo $this->_tpl_vars['tutor']['si_title']; ?>
</td>
                                    </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td valign="top" class="brown_bold_text"><?php echo $this->_tpl_vars['tutor']['si_detail']; ?>
</td>
                                    </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td class="brown_bold_text">&nbsp;</td>
                              </tr>                              
                              <tr>
                                <td>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">                                
                                  <?php if ($this->_tpl_vars['tutor']['si_photo'] != ''): ?>
                                  <tr>
                                    <td colspan="2"><span class="brown_text">相片</span></td>
                                  </tr>
                                  <tr>
                                    <td class="brown_bold_text" colspan="2">&nbsp;</td>
                                  </tr>
                                
                                  <tr>
                                    <td colspan="2" valign="top" class="brown_text"><img src="./tutor_photos/<?php echo $this->_tpl_vars['tutor']['si_photo']; ?>
" alt="" /></td>
                                    </tr>
                                  <tr>
                                    <td colspan="2">&nbsp;</td>
                                  </tr>
                                  <?php endif; ?>
                                  
                                  <?php if ($this->_tpl_vars['tutor']['si_movie_embed_raw'] != ''): ?>
                                  <tr>
                                    <td colspan="2"><span class="brown_text">個人短片</span></td>
                                  </tr>
                                  <tr>
                                    <td colspan="2">&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td colspan="2"><?php echo $this->_tpl_vars['tutor']['si_movie_embed_raw']; ?>
</td>
                                    </tr>
                                  <?php endif; ?>
                                  
                                  <tr>
                                    <td colspan="2" valign="top" class="brown_text">&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" valign="top" class="brown_text">&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" valign="top" class="brown_text"><span class="brown_bold_text"><strong class="brown_bold_underline_text">個人資料</strong></span></td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" valign="top" class="brown_text">&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" valign="top" class="brown_text"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td width="200">名稱</td>
                                        <td><span class="brown_bold_text"><?php echo $this->_tpl_vars['tutor']['pi_nickname']; ?>
</span></td>
                                      </tr>
                                      <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                      </tr>
                                      <tr>
                                        <td>性別</td>
                                        <td><span class="brown_bold_text"><?php if ($this->_tpl_vars['tutor']['pi_gender'] == 1): ?>男<?php elseif ($this->_tpl_vars['tutor']['pi_gender'] == 2): ?>女<?php else: ?>N/A<?php endif; ?></span></td>
                                      </tr>
                                      <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                      </tr>
                                    </table></td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" valign="top" class="brown_text">&nbsp;</td>
                                  </tr>
                                  
                                  <tr>
                                    <td colspan="2" valign="top" class="brown_bold_text"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                          <td width="160"><span class="brown_bold_underline_text">授課地區</span></td>
                                          <td>&nbsp;</td>
                                        </tr>
                                      </table></td>
                                    </tr>
                                  <tr>
                                    <td colspan="2" valign="top" class="brown_bold_text">&nbsp;</td>
                                    </tr>
                                  <tr>
                                    <td colspan="2" valign="top" class="brown_bold_text"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td width="200"><em>新界區<br />
                                        </em></td>
                                        <td width="200"><em>九龍區</em></td>
                                        <td><em>港島區</em></td>
                                      </tr>
                                      <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                      </tr>
                                      <tr>
                                        <td valign="top"> <?php if ($this->_tpl_vars['tutor']['tr_regions_nt'] == ''): ?>不適用<?php else: ?>
                                          <?php $_from = $this->_tpl_vars['tutor']['tr_regions_nt']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['index'] => $this->_tpl_vars['v']):
?>
                                          <?php echo $this->_tpl_vars['v']; ?>
<br />
                                          <?php endforeach; endif; unset($_from); ?>
                                          <?php endif; ?> </td>
                                        <td valign="top"> <?php if ($this->_tpl_vars['tutor']['tr_regions_kn'] == ''): ?>不適用<?php else: ?>
                                          <?php $_from = $this->_tpl_vars['tutor']['tr_regions_kn']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['index'] => $this->_tpl_vars['v']):
?>
                                          <?php echo $this->_tpl_vars['v']; ?>
<br />
                                          <?php endforeach; endif; unset($_from); ?>
                                          <?php endif; ?> </td>
                                        <td valign="top"> <?php if ($this->_tpl_vars['tutor']['tr_regions_hki'] == ''): ?>不適用<?php else: ?>
                                          <?php $_from = $this->_tpl_vars['tutor']['tr_regions_hki']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['index'] => $this->_tpl_vars['v']):
?>
                                          <?php echo $this->_tpl_vars['v']; ?>
<br />
                                          <?php endforeach; endif; unset($_from); ?>
                                          <?php endif; ?> </td>
                                      </tr>
                                    </table></td>
                                    </tr>
                                  
                                  
                                  <tr>
                                    <td colspan="2" valign="top" class="brown_bold_text">&nbsp;</td>
                                    </tr>
                                  <tr>
                                    <td colspan="2" valign="top" class="brown_bold_text">&nbsp;</td>
                                    </tr>
                                  <tr>
                                    <td colspan="2" valign="top" class="brown_bold_text"><span class="brown_bold_underline_text">授課時間</span></td>
                                    </tr>
                                  <tr>
                                    <td colspan="2" valign="top" class="brown_bold_text">&nbsp;</td>
                                    </tr>
                                  <?php if ($this->_tpl_vars['tutor']['is_all_time'] == 0): ?>
                                  <tr>
                                    <td colspan="2" valign="top" class="brown_bold_text"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td>&nbsp;</td>
                                        <td>星期一</td>
                                        <td>星期二</td>
                                        <td>星期三</td>
                                        <td>星期四</td>
                                        <td>星期五</td>
                                        <td>星期六</td>
                                        <td>星期日</td>
                                      </tr>
                                      <tr>
                                        <td>上午 (2:00pm前)</td>
                                        <td><strong><?php if ($this->_tpl_vars['tutor']['timeslots'][0] == 1): ?>可以<?php else: ?>x<?php endif; ?></strong></td>
                                        <td><strong> <?php if ($this->_tpl_vars['tutor']['timeslots'][3] == 1): ?>可以<?php else: ?>x<?php endif; ?> </strong></td>
                                        <td><strong> <?php if ($this->_tpl_vars['tutor']['timeslots'][6] == 1): ?>可以<?php else: ?>x<?php endif; ?> </strong></td>
                                        <td><strong> <?php if ($this->_tpl_vars['tutor']['timeslots'][9] == 1): ?>可以<?php else: ?>x<?php endif; ?> </strong></td>
                                        <td><strong> <?php if ($this->_tpl_vars['tutor']['timeslots'][12] == 1): ?>可以<?php else: ?>x<?php endif; ?> </strong></td>
                                        <td><strong> <?php if ($this->_tpl_vars['tutor']['timeslots'][15] == 1): ?>可以<?php else: ?>x<?php endif; ?> </strong></td>
                                        <td><strong> <?php if ($this->_tpl_vars['tutor']['timeslots'][18] == 1): ?>可以<?php else: ?>x<?php endif; ?> </strong></td>
                                      </tr>
                                      <tr>
                                        <td>下午 (2-7:00pm)</td>
                                        <td><strong> <?php if ($this->_tpl_vars['tutor']['timeslots'][1] == 1): ?>可以<?php else: ?>x<?php endif; ?> </strong></td>
                                        <td><strong> <?php if ($this->_tpl_vars['tutor']['timeslots'][4] == 1): ?>可以<?php else: ?>x<?php endif; ?> </strong></td>
                                        <td><strong> <?php if ($this->_tpl_vars['tutor']['timeslots'][7] == 1): ?>可以<?php else: ?>x<?php endif; ?> </strong></td>
                                        <td><strong> <?php if ($this->_tpl_vars['tutor']['timeslots'][10] == 1): ?>可以<?php else: ?>x<?php endif; ?> </strong></td>
                                        <td><strong><?php if ($this->_tpl_vars['tutor']['timeslots'][13] == 1): ?>可以<?php else: ?>x<?php endif; ?></strong></td>
                                        <td><strong> <?php if ($this->_tpl_vars['tutor']['timeslots'][16] == 1): ?>可以<?php else: ?>x<?php endif; ?> </strong></td>
                                        <td><strong> <?php if ($this->_tpl_vars['tutor']['timeslots'][19] == 1): ?>可以<?php else: ?>x<?php endif; ?> </strong></td>
                                      </tr>
                                      <tr>
                                        <td>晚上 (7-10:00pm)</td>
                                        <td><strong> <?php if ($this->_tpl_vars['tutor']['timeslots'][2] == 1): ?>可以<?php else: ?>x<?php endif; ?> </strong></td>
                                        <td><strong> <?php if ($this->_tpl_vars['tutor']['timeslots'][5] == 1): ?>可以<?php else: ?>x<?php endif; ?> </strong></td>
                                        <td><strong> <?php if ($this->_tpl_vars['tutor']['timeslots'][8] == 1): ?>可以<?php else: ?>x<?php endif; ?> </strong></td>
                                        <td><strong> <?php if ($this->_tpl_vars['tutor']['timeslots'][11] == 1): ?>可以<?php else: ?>x<?php endif; ?> </strong></td>
                                        <td><strong> <?php if ($this->_tpl_vars['tutor']['timeslots'][14] == 1): ?>可以<?php else: ?>x<?php endif; ?> </strong></td>
                                        <td><strong> <?php if ($this->_tpl_vars['tutor']['timeslots'][17] == 1): ?>可以<?php else: ?>x<?php endif; ?> </strong></td>
                                        <td><strong> <?php if ($this->_tpl_vars['tutor']['timeslots'][20] == 1): ?>可以<?php else: ?>x<?php endif; ?> </strong></td>
                                      </tr>
                                    </table></td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" valign="top" class="brown_bold_text">&nbsp;</td>
                                    </tr>
                                  <?php else: ?>                                  
                                  <tr>
                                    <td colspan="2" valign="top" class="brown_bold_text">任何時間</td>
                                    </tr>
                                  <tr>
                                    <td colspan="2" valign="top" class="brown_bold_text">&nbsp;</td>
                                  </tr>
                                  <?php endif; ?>
                                  
                                  <?php if ($this->_tpl_vars['tutor']['lt_additional'] != ''): ?>
                                  <tr>
                                    <td colspan="2" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td width="200" class="brown_text"><span class="brown_text">補充資料</span></td>
                                        <td class="brown_bold_text">N/A</td>
                                      </tr>
                                    </table></td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" valign="top" class="brown_bold_text">&nbsp;</td>
                                  </tr>
                                  <?php endif; ?>
                                  
                                  <tr>
                                    <td colspan="2" valign="top" class="brown_bold_text">&nbsp;</td>
                                    </tr>
                                  <tr>
                                    <td colspan="2" valign="top" class="brown_bold_text"><strong class="brown_bold_underline_text">目標服務群組</strong></td>
                                    </tr>
                                  <tr>
                                    <td colspan="2" valign="top" class="brown_bold_text">&nbsp;</td>
                                    </tr>
                                  <tr>
                                    <td colspan="2" valign="top" class="brown_bold_text">
                                    <?php $_from = $this->_tpl_vars['tutor']['service_targets']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['index'] => $this->_tpl_vars['v']):
?><?php echo $this->_tpl_vars['v']; ?>
<br /><?php endforeach; endif; unset($_from); ?>                                    </td>
                                  </tr>
                                  <tr>
                                    <td width="292" valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td width="733">&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text"><span class="brown_bold_underline_text">授課收費詳情(以每小時計算)</span></td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" valign="top" class="brown_text"></td>
                                    </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" valign="top" class="brown_bold_text">
                                    <?php if ($this->_tpl_vars['tutor']['tf_detail'] != ''): ?>
                                    <?php echo $this->_tpl_vars['tutor']['tf_detail']; ?>

                                    <?php else: ?>
                                     N/A
                                    <?php endif; ?>                                    </td>
                                    </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text"><strong class="brown_bold_underline_text">學業履歷資料</strong></td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" valign="top" class="brown_bold_text">&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td><span class="brown_text">最高教育程度</span></td>
                                        <td><span class="brown_bold_text"><?php echo $this->_tpl_vars['tutor']['education_level']; ?>
</span></td>
                                      </tr>
                                      <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                      </tr>
                                      <tr>
                                        <td><span class="brown_text">(曾)就讀院校</span></td>
                                        <td><span class="brown_bold_text"><?php echo $this->_tpl_vars['tutor']['aq_college']; ?>
</span></td>
                                      </tr>
                                      <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                      </tr>
                                      <tr>
                                        <td><span class="brown_text">其他院校</span></td>
                                        <td><span class="brown_bold_text"><?php if ($this->_tpl_vars['aq_college_others'] != ''): ?><?php echo $this->_tpl_vars['aq_college_others']; ?>
<?php else: ?>N/A<?php endif; ?></span></td>
                                      </tr>
                                      <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                      </tr>
                                      <tr>
                                        <td><span class="brown_text">主修科目</span></td>
                                        <td><span class="brown_bold_text"><?php if ($this->_tpl_vars['aq_major'] != ''): ?><?php echo $this->_tpl_vars['aq_major']; ?>
<?php else: ?>N/A<?php endif; ?></span></td>
                                      </tr>
                                      <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                      </tr>
                                      <tr>
                                        <td><span class="brown_text">高中修讀科目類別</span></td>
                                        <td><span class="brown_bold_text"><?php echo $this->_tpl_vars['tutor']['hs_major']; ?>
</span></td>
                                      </tr>
                                      <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                      </tr>
                                      <tr>
                                        <td><span class="brown_text">其他專業應可課程</span></td>
                                        <td><span class="brown_bold_text"><?php if ($this->_tpl_vars['aq_professional'] != ''): ?><?php echo $this->_tpl_vars['aq_professional']; ?>
<?php else: ?>N/A<?php endif; ?></span></td>
                                      </tr>
                                      <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                      </tr>
                                      <tr>
                                        <td><span class="brown_text">香港中學會考分數</span></td>
                                        <td><span class="brown_bold_text"><?php if ($this->_tpl_vars['aq_hkcee_mark'] != ''): ?><?php echo $this->_tpl_vars['aq_hkcee_mark']; ?>
<?php else: ?>N/A<?php endif; ?></span></td>
                                      </tr>
                                      <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                      </tr>
                                      <tr>
                                        <td><span class="brown_text">補習年資</span></td>
                                        <td><span class="brown_bold_text"><?php if ($this->_tpl_vars['aq_tutor_year'] != ''): ?><?php echo $this->_tpl_vars['aq_tutor_year']; ?>
<?php else: ?>N/A<?php endif; ?></span></td>
                                      </tr>
                                      <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                      </tr>
                                      <tr>
                                        <td width="200"><span class="brown_text">公開考試成績</span></td>
                                        <td><span class="brown_bold_text"><?php if ($this->_tpl_vars['pe_result_detail'] != ''): ?><?php echo $this->_tpl_vars['pe_result_detail']; ?>
<?php else: ?>N/A<?php endif; ?></span></td>
                                      </tr>
                                    </table></td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" valign="top" class="brown_bold_text">&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" valign="top" class="brown_bold_text">&nbsp;</td>
                                    </tr>
                                  
                                  <?php if (! empty ( $this->_tpl_vars['tutor']['languages'] )): ?>
                                  <tr>
                                    <td colspan="2" valign="top" class="brown_bold_text"><strong class="brown_bold_underline_text">其他能操並可教授語言</strong></td>
                                    </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" valign="top" class="brown_bold_text">
                                    <?php $_from = $this->_tpl_vars['tutor']['languages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['index'] => $this->_tpl_vars['v']):
?><?php echo $this->_tpl_vars['v']; ?>
<br /><?php endforeach; endif; unset($_from); ?>                                    </td>
                                    </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <?php endif; ?>
                                  
                                  <?php if (! empty ( $this->_tpl_vars['tutor']['instruments'] )): ?>
                                  <tr>
                                    <td colspan="2" valign="top" class="brown_bold_underline_text">可教授之樂器</td>
                                    </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" valign="top" class="brown_bold_text">
                                    <?php $_from = $this->_tpl_vars['tutor']['instruments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['index'] => $this->_tpl_vars['v']):
?><?php echo $this->_tpl_vars['v']; ?>
<br /><?php endforeach; endif; unset($_from); ?>                                    </td>
                                  </tr>
                                  <?php endif; ?>
                                  
                                </table></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                              </tr>
                            </table>
                                                    </form>
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