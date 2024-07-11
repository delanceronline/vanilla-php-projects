<?php /* Smarty version 2.6.26, created on 2010-06-02 14:25:12
         compiled from tutor_profile_edit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'tutor_profile_edit.tpl', 205, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>搵補習.hk --- 更新導師檔案</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link type="text/css" href="./lib/jquery/css/smoothness/jquery-ui-1.8.custom.css" rel="stylesheet" />
<script src="./lib/jquery/js/jquery-1.4.2.min.js" type="text/javascript"></script>
<script src="./lib/jquery/js/jquery-ui-1.8.custom.min.js" type="text/javascript"></script>
<script type="text/javascript" src="./tutor_profile_edit.cc.js"></script>
</head>

<body>
<div id="error_si_title" title="請注意！" style="display: none;">請輸入自我簡介的標題！</div>
<div id="error_si_detail" title="請注意！" style="display: none;">請輸入自我簡介的內容（不少於20字）！</div>
<div id="error_cb_region" title="請注意！" style="display: none;">請選擇授課地區！</div>
<div id="error_time" title="請注意！" style="display: none;">請選擇授課時間！</div>
<div id="error_pi_nickname" title="請注意！" style="display: none;">請輸入稱呼名稱！</div>
<div id="error_pi_english_name" title="請注意！" style="display: none;">請輸入英文名稱！</div>
<div id="error_pi_chinese_name" title="請注意！" style="display: none;">請輸入中文名稱！</div>
<div id="error_pi_hkid" title="請注意！" style="display: none;">請輸入身份証號碼！</div>
<div id="error_pi_live_region" title="請注意！" style="display: none;">請選擇居住地區！</div>
<div id="error_pi_gender" title="請注意！" style="display: none;">請輸入性別！</div>
<div id="error_pi_contact_no" title="請注意！" style="display: none;">請輸入聯絡電話！</div>
<div id="error_aq_el" title="請注意！" style="display: none;">請輸入最高教育程度！</div>
<div id="error_pe_result_detail" title="請注意！" style="display: none;">請輸入公開考試成績！</div>
<div id="error_st" title="請注意！" style="display: none;">請輸入目標服務群組！</div>
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
                      <td height="100" valign="middle" bgcolor="#336633" class="hd_white_bold_text"><strong>更新導師檔案</strong></td>
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
                          <td width="700"><form action="tutor_profile_edit_do.php" method="post" enctype="multipart/form-data" name="tutor_profile_edit_form" id="tutor_profile_edit_form">
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
                                    <td width="140" class="brown_bold_text"> 標題 </td>
                                    <td><input name="si_title" type="text" class="black_text" id="si_title" value="<?php echo $this->_tpl_vars['si_title']; ?>
" maxlength="128" />
                                      <span class="required_field_red_star">*</span></td>
                                  </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td width="140" valign="top"><span class="brown_bold_text">自我介紹</span></td>
                                    <td width="400"><textarea name="si_detail" cols="60" rows="5" class="black_text" id="si_detail"><?php echo $this->_tpl_vars['si_detail']; ?>
</textarea></td>
                                    <td valign="middle"><span class="brown_bold_text">(不少於20字)<span class="required_field_red_star">*</span></span></td>
                                  </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td class="brown_bold_text">&nbsp;</td>
                              </tr>
                              <tr>
                                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td width="140" class="brown_bold_text">相片</td>
                                    <td><input name="si_photo" type="file" class="black_text" id="si_photo" />
                                      <span class="brown_bold_text">（請少於2MB）</span></td>
                                  </tr>
                                  <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td>&nbsp;</td>
                                    <td><img src="./tutor_photos/<?php echo $this->_tpl_vars['si_photo']; ?>
" /></td>
                                  </tr>
                                  <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">個人短片</td>
                                    <td><input name="si_movie_embed" type="text" class="black_text" id="si_movie_embed" value="<?php echo $this->_tpl_vars['si_movie_embed']; ?>
" size="80" /></td>
                                  </tr>
                                  <tr>
                                    <td height="6" valign="top" class="brown_bold_text"></td>
                                    <td></td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td><span class="brown_bold_text">(只支援YouTube&quot;  嵌入 &quot;碼)</span></td>
                                  </tr>
                                  
                                  <?php if ($this->_tpl_vars['si_movie_embed_raw'] != ""): ?>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>
                                    <?php echo $this->_tpl_vars['si_movie_embed_raw']; ?>
                                    </td>
                                  </tr>
                                  <?php endif; ?>
                                  
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text"><strong class="brown_bold_underline_text">個人資料</strong></td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">稱呼名稱</td>
                                    <td><input name="pi_nickname" type="text" class="black_text" id="pi_nickname" value="<?php echo $this->_tpl_vars['pi_nickname']; ?>
" maxlength="64" />
                                      <span class="required_field_red_star">*</span></td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">英文名稱</td>
                                    <td><input name="pi_english_name" type="text" class="black_text" id="pi_english_name" value="<?php echo $this->_tpl_vars['pi_english_name']; ?>
" maxlength="128" />
                                      <span class="required_field_red_star">*</span></td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">中文名稱</td>
                                    <td><input name="pi_chinese_name" type="text" class="black_text" id="pi_chinese_name" value="<?php echo $this->_tpl_vars['pi_chinese_name']; ?>
" maxlength="64" />
                                      <span class="required_field_red_star">*</span></td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">身份証號碼</td>
                                    <td><input name="pi_hkid" type="text" class="black_text" id="pi_hkid" value="<?php echo $this->_tpl_vars['pi_hkid']; ?>
" maxlength="16" />
                                      <span class="required_field_red_star">*</span></td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">居住地區</td>
                                    <td><label>
<select name="pi_live_region" class="black_text" id="pi_live_region">
  <option value="-1">------請選擇------</option>
  <option value="-1">------新界區------</option>
  
        
      <?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['nt_ids'],'output' => $this->_tpl_vars['nt_names'],'selected' => $this->_tpl_vars['pi_live_region']), $this);?>

      
        
  <option value="-1">------九龍區------</option>
  
        
      <?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['kn_ids'],'output' => $this->_tpl_vars['kn_names'],'selected' => $this->_tpl_vars['pi_live_region']), $this);?>

      
        
  <option value="-1">------港島區------</option>
  
        
      <?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['hki_ids'],'output' => $this->_tpl_vars['hki_names'],'selected' => $this->_tpl_vars['pi_live_region']), $this);?>
      
      
        
  <option value="0">------其他------</option>
</select>
<span class="required_field_red_star">*</span></label></td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">性別</td>
                                    <td><select name="pi_gender" class="black_text" id="pi_gender">
                                      <option value="-1">------請選擇------</option>
                                      <option value="1" <?php if ($this->_tpl_vars['pi_gender'] == 1): ?>selected="selected"<?php endif; ?>>男</option>
                                      <option value="2" <?php if ($this->_tpl_vars['pi_gender'] == 2): ?>selected="selected"<?php endif; ?>>女</option>
                                    </select>
                                      <span class="required_field_red_star">*</span></td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">聯絡電話</td>
                                    <td><input name="pi_contact_no" type="text" class="black_text" id="pi_contact_no" value="<?php echo $this->_tpl_vars['pi_contact_no']; ?>
" maxlength="64" />
                                      <span class="required_field_red_star">*</span></td>
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
                                    <td valign="top" class="brown_bold_text"><strong class="brown_bold_underline_text">緊急聯繫資料</strong></td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">緊急聯絡人姓名</td>
                                    <td><input name="ec_name" type="text" class="black_text" id="ec_name" value="<?php echo $this->_tpl_vars['ec_name']; ?>
" maxlength="64" /></td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">緊急聯絡人電話</td>
                                    <td><input name="en_contact_no" type="text" class="black_text" id="en_contact_no" value="<?php echo $this->_tpl_vars['en_contact_no']; ?>
" maxlength="64" /></td>
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
                                    <td colspan="2" valign="top" class="brown_bold_text"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                          <td width="160"><span class="brown_bold_underline_text">授課地區</span> <span class="required_field_red_star">*</span></td>
                                          <td>&nbsp;</td>
                                        </tr>
                                      </table></td>
                                    </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" valign="top" class="brown_bold_text"><strong>
                                      <input name="cb_region_all" type="checkbox" class="black_text" id="cb_region_all" value="1" <?php if ($this->_tpl_vars['tr_region_sets'][0] == 1): ?>checked="checked"<?php endif; ?> />
                                      <label></label>
                                    </strong> 全港各區
                                    <label> <br />
                                    <input name="cb_region_nt" type="checkbox" class="black_text" id="cb_region_nt" value="1" <?php if ($this->_tpl_vars['tr_region_sets'][1] == 1): ?>checked="checked"<?php endif; ?> />
                                    </label>
全新界區
<input name="cb_region_kn" type="checkbox" class="black_text" id="cb_region_kn" value="1" <?php if ($this->_tpl_vars['tr_region_sets'][2] == 1): ?>checked="checked"<?php endif; ?> />
全九龍區
<input name="cb_region_hki" type="checkbox" class="black_text" id="cb_region_hki" value="1" <?php if ($this->_tpl_vars['tr_region_sets'][3] == 1): ?>checked="checked"<?php endif; ?> />
全港島區 <br />
<input name="cb_region_others" type="checkbox" class="black_text" id="cb_region_others" value="1" <?php if ($this->_tpl_vars['tr_region_sets'][4] == 1): ?>checked="checked"<?php endif; ?> />
其他 </td>
                                    </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
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
                                        <td valign="top"> 
                                        <?php $_from = $this->_tpl_vars['nt_names']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['index'] => $this->_tpl_vars['v']):
?>
                                        <input name="cb_region_nt_<?php echo $this->_tpl_vars['nt_ids'][$this->_tpl_vars['index']]; ?>
" type="checkbox" class="black_text" id="cb_region_nt_<?php echo $this->_tpl_vars['nt_ids'][$this->_tpl_vars['index']]; ?>
" value="<?php echo $this->_tpl_vars['nt_ids'][$this->_tpl_vars['index']]; ?>
" <?php if ($this->_tpl_vars['tr_regions_nt_selected'][$this->_tpl_vars['index']] == 1): ?>checked="checked"<?php endif; ?> />
                                        <?php echo $this->_tpl_vars['v']; ?>
<br />
                                        <?php endforeach; endif; unset($_from); ?>                                        </td>
                                        <td valign="top"> <?php $_from = $this->_tpl_vars['kn_names']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['index'] => $this->_tpl_vars['v']):
?> <strong>
                                        <input name="cb_region_kn_<?php echo $this->_tpl_vars['kn_ids'][$this->_tpl_vars['index']]; ?>
" type="checkbox" class="black_text" id="cb_region_kn_<?php echo $this->_tpl_vars['kn_ids'][$this->_tpl_vars['index']]; ?>
" value="<?php echo $this->_tpl_vars['kn_ids'][$this->_tpl_vars['index']]; ?>
" <?php if ($this->_tpl_vars['tr_regions_kn_selected'][$this->_tpl_vars['index']] == 1): ?>checked="checked"<?php endif; ?> />
                                        </strong><?php echo $this->_tpl_vars['v']; ?>
<br />
                                        <?php endforeach; endif; unset($_from); ?> </td>
                                        <td valign="top"> <?php $_from = $this->_tpl_vars['hki_names']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['index'] => $this->_tpl_vars['v']):
?> <strong>
                                        <input name="cb_region_hki_<?php echo $this->_tpl_vars['hki_ids'][$this->_tpl_vars['index']]; ?>
" type="checkbox" class="black_text" id="cb_region_hki_<?php echo $this->_tpl_vars['hki_ids'][$this->_tpl_vars['index']]; ?>
" value="<?php echo $this->_tpl_vars['hki_ids'][$this->_tpl_vars['index']]; ?>
" <?php if ($this->_tpl_vars['tr_regions_hki_selected'][$this->_tpl_vars['index']] == 1): ?>checked="checked"<?php endif; ?> />
                                        </strong><?php echo $this->_tpl_vars['v']; ?>
<br />
                                        <?php endforeach; endif; unset($_from); ?> </td>
                                      </tr>
                                    </table></td>
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
                                    <td valign="top" class="brown_bold_text"><span class="brown_bold_underline_text">授課時間</span><span class="required_field_red_star"> *</span></td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text"><strong>
                                      <input name="cb_time_all" type="checkbox" class="black_text" id="cb_time_all" value="0" <?php if ($this->_tpl_vars['is_all_day'] == 1): ?>checked="checked"<?php endif; ?> />
                                    </strong>任何時間</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" valign="top" class="brown_bold_text"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td width="140">&nbsp;</td>
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
                                        <td class="black_text"><strong>
                                          <input name="cb_time_slot_1" type="checkbox" class="black_text" id="cb_time_slot_1" value="1" <?php if ($this->_tpl_vars['days_selected'][0] == 1): ?>checked="checked"<?php endif; ?> />
                                        </strong></td>
                                        <td class="black_text"><strong>
                                          <input name="cb_time_slot_5" type="checkbox" id="cb_time_slot_5" value="5" <?php if ($this->_tpl_vars['days_selected'][4] == 1): ?>checked="checked"<?php endif; ?> />
                                        </strong></td>
                                        <td class="black_text"><strong>
                                          <input name="cb_time_slot_9" type="checkbox" id="cb_time_slot_9" value="9" <?php if ($this->_tpl_vars['days_selected'][8] == 1): ?>checked="checked"<?php endif; ?> />
                                        </strong></td>
                                        <td class="black_text"><strong>
                                          <input name="cb_time_slot_13" type="checkbox" id="cb_time_slot_13" value="13" <?php if ($this->_tpl_vars['days_selected'][12] == 1): ?>checked="checked"<?php endif; ?> />
                                        </strong></td>
                                        <td class="black_text"><strong>
                                          <input name="cb_time_slot_17" type="checkbox" id="cb_time_slot_17" value="17" <?php if ($this->_tpl_vars['days_selected'][16] == 1): ?>checked="checked"<?php endif; ?> />
                                        </strong></td>
                                        <td class="black_text"><strong>
                                          <input name="cb_time_slot_21" type="checkbox" id="cb_time_slot_21" value="21" <?php if ($this->_tpl_vars['days_selected'][20] == 1): ?>checked="checked"<?php endif; ?> />
                                        </strong></td>
                                        <td class="black_text"><strong>
                                          <input name="cb_time_slot_25" type="checkbox" id="cb_time_slot_25" value="25" <?php if ($this->_tpl_vars['days_selected'][24] == 1): ?>checked="checked"<?php endif; ?> />
                                        </strong></td>
                                      </tr>
                                      <tr>
                                        <td>下午 (2-7:00pm)</td>
                                        <td class="black_text"><strong>
                                          <input name="cb_time_slot_2" type="checkbox" id="cb_time_slot_2" value="2" <?php if ($this->_tpl_vars['days_selected'][1] == 1): ?>checked="checked"<?php endif; ?> />
                                        </strong></td>
                                        <td class="black_text"><strong>
                                          <input name="cb_time_slot_6" type="checkbox" id="cb_time_slot_6" value="6" <?php if ($this->_tpl_vars['days_selected'][5] == 1): ?>checked="checked"<?php endif; ?> />
                                        </strong></td>
                                        <td class="black_text"><strong>
                                          <input name="cb_time_slot_10" type="checkbox" id="cb_time_slot_10" value="10" <?php if ($this->_tpl_vars['days_selected'][9] == 1): ?>checked="checked"<?php endif; ?> />
                                        </strong></td>
                                        <td class="black_text"><strong>
                                          <input name="cb_time_slot_14" type="checkbox" id="cb_time_slot_14" value="14" <?php if ($this->_tpl_vars['days_selected'][13] == 1): ?>checked="checked"<?php endif; ?> />
                                        </strong></td>
                                        <td class="black_text"><strong>
                                          <input name="cb_time_slot_18" type="checkbox" id="cb_time_slot_18" value="18" <?php if ($this->_tpl_vars['days_selected'][17] == 1): ?>checked="checked"<?php endif; ?> />
                                        </strong></td>
                                        <td class="black_text"><strong>
                                          <input name="cb_time_slot_22" type="checkbox" id="cb_time_slot_22" value="22" <?php if ($this->_tpl_vars['days_selected'][21] == 1): ?>checked="checked"<?php endif; ?> />
                                        </strong></td>
                                        <td class="black_text"><strong>
                                          <input name="cb_time_slot_26" type="checkbox" id="cb_time_slot_26" value="26" <?php if ($this->_tpl_vars['days_selected'][25] == 1): ?>checked="checked"<?php endif; ?> />
                                        </strong></td>
                                      </tr>
                                      <tr>
                                        <td>晚上 (7-10:00pm)</td>
                                        <td class="black_text"><strong>
                                          <input name="cb_time_slot_3" type="checkbox" id="cb_time_slot_3" value="3" <?php if ($this->_tpl_vars['days_selected'][2] == 1): ?>checked="checked"<?php endif; ?> />
                                        </strong></td>
                                        <td class="black_text"><strong>
                                          <input name="cb_time_slot_7" type="checkbox" id="cb_time_slot_7" value="7" <?php if ($this->_tpl_vars['days_selected'][6] == 1): ?>checked="checked"<?php endif; ?> />
                                        </strong></td>
                                        <td class="black_text"><strong>
                                          <input name="cb_time_slot_11" type="checkbox" id="cb_time_slot_11" value="11" <?php if ($this->_tpl_vars['days_selected'][10] == 1): ?>checked="checked"<?php endif; ?> />
                                        </strong></td>
                                        <td class="black_text"><strong>
                                          <input name="cb_time_slot_15" type="checkbox" id="cb_time_slot_15" value="15" <?php if ($this->_tpl_vars['days_selected'][14] == 1): ?>checked="checked"<?php endif; ?> />
                                        </strong></td>
                                        <td class="black_text"><strong>
                                          <input name="cb_time_slot_19" type="checkbox" id="cb_time_slot_19" value="19" <?php if ($this->_tpl_vars['days_selected'][18] == 1): ?>checked="checked"<?php endif; ?> />
                                        </strong></td>
                                        <td class="black_text"><strong>
                                          <input name="cb_time_slot_23" type="checkbox" id="cb_time_slot_23" value="23" <?php if ($this->_tpl_vars['days_selected'][22] == 1): ?>checked="checked"<?php endif; ?> />
                                        </strong></td>
                                        <td class="black_text"><strong>
                                          <input name="cb_time_slot_27" type="checkbox" id="cb_time_slot_27" value="27" <?php if ($this->_tpl_vars['days_selected'][26] == 1): ?>checked="checked"<?php endif; ?> />
                                        </strong></td>
                                      </tr>
                                    </table></td>
                                    </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">補充資料</td>
                                    <td><textarea name="lt_additional" cols="60" rows="5" class="black_text" id="lt_additional"><?php echo $this->_tpl_vars['lt_additional']; ?>
</textarea></td>
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
                                    <td valign="top" class="brown_bold_text"><strong class="brown_bold_underline_text">目標服務群組</strong></td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" valign="top" class="brown_bold_text"><input name="st_1" type="checkbox" class="black_text" id="st_1" value="1" <?php if ($this->_tpl_vars['st_1'] == 1): ?>checked="checked"<?php endif; ?> />
小學生
  <input name="st_2" type="checkbox" class="black_text" id="st_2" value="2" <?php if ($this->_tpl_vars['st_2'] == 2): ?>checked="checked"<?php endif; ?> />
初中生
<input name="st_3" type="checkbox" class="black_text" id="st_3" value="3" <?php if ($this->_tpl_vars['st_3'] == 3): ?>checked="checked"<?php endif; ?> />
高中生
<input name="st_4" type="checkbox" class="black_text" id="st_4" value="4" <?php if ($this->_tpl_vars['st_4'] == 4): ?>checked="checked"<?php endif; ?> />
大專生
<input name="st_5" type="checkbox" class="black_text" id="st_5" value="5" <?php if ($this->_tpl_vars['st_5'] == 5): ?>checked="checked"<?php endif; ?> />
成人</td>
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
                                    <td valign="top" class="brown_bold_text"><strong class="brown_bold_underline_text">學費</strong></td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" valign="top" class="brown_bold_text">授課收費詳情(以每小時計算)</td>
                                    </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" valign="top" class="brown_bold_text"><textarea name="tf_detail" cols="60" rows="5" class="black_text" id="tf_detail"><?php echo $this->_tpl_vars['tf_detail']; ?>
</textarea></td>
                                    </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td valign="top"><span class="brown_text">例如</span></td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" valign="top" class="brown_bold_text"><textarea name="textarea7" cols="60" rows="5" class="black_text" id="textarea7">小學全科 --- $80/小時
初中全科 --- $110/小時
會考理科（包括學數，附加數學，物理，化學，生物）--- $130/小時
高考純數 --- $150/小時</textarea></td>
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
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">最高教育程度</td>
                                    <td><select name="aq_el" class="black_text" id="aq_el">
                                      <option value="-1" selected="selected">------請選擇------</option>
                                      
        
      <?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['qf_ids'],'output' => $this->_tpl_vars['qf_names'],'selected' => $this->_tpl_vars['aq_el']), $this);?>

    
      
                                    </select>
                                      <span class="brown_bold_text"><span class="required_field_red_star">*</span></span></td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">(曾)就讀院校</td>
                                    <td><select name="aq_college" class="black_text" id="aq_college">
                                      <option value="-1" selected="selected">------請選擇------</option>
                                      
        
      <?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['college_ids'],'output' => $this->_tpl_vars['college_names'],'selected' => $this->_tpl_vars['aq_college']), $this);?>

    
      
                                    </select>
                                      <span class="brown_text">（如多於一間, 請選其一）</span></td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">其他院校</td>
                                    <td><span class="brown_bold_text">
                                      <textarea name="aq_college_others" cols="60" rows="5" class="black_text" id="aq_college_others"><?php echo $this->_tpl_vars['aq_college_others']; ?>
</textarea>
                                    </span></td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">主修科目</td>
                                    <td><span class="brown_bold_text">
                                      <textarea name="aq_major" cols="60" rows="5" class="black_text" id="aq_major"><?php echo $this->_tpl_vars['aq_major']; ?>
</textarea>
                                    </span></td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">高中修讀科目類別</td>
                                    <td><select name="aq_hs_major" class="black_text" id="aq_hs_major">
                                      <option value="-1" selected="selected">------請選擇------</option>
                                      
        
        <?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['hm_ids'],'output' => $this->_tpl_vars['hm_names'],'selected' => $this->_tpl_vars['aq_hs_major']), $this);?>

    
      
                                    </select>
                                      <span class="brown_text">（文／理／商／理商／文商）</span></td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">其他專業應可課程</td>
                                    <td><span class="brown_bold_text">
                                      <textarea name="aq_professional" cols="60" rows="5" class="black_text" id="aq_professional"><?php echo $this->_tpl_vars['aq_professional']; ?>
</textarea>
                                    </span></td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text" height="6"></td>
                                    <td></td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td class="brown_text">(  TOFEL / GCE / LCC / ACCA / ORACLE / MCSE)</td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">香港中學會考分數</td>
                                    <td><input name="aq_hkcee_mark" type="text" class="black_text" id="aq_hkcee_mark" value="<?php echo $this->_tpl_vars['aq_hkcee_mark']; ?>
" maxlength="16" /></td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">補習年資</td>
                                    <td><input name="aq_tutor_year" type="text" class="black_text" id="aq_tutor_year" value="<?php echo $this->_tpl_vars['aq_tutor_year']; ?>
" maxlength="16" /></td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text"><strong>公開考試成績<span class="required_field_red_star"> *</span></strong></td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" valign="top" class="brown_bold_text"><textarea name="pe_result_detail" cols="60" rows="5" class="black_text" id="pe_result_detail"><?php echo $this->_tpl_vars['pe_result_detail']; ?>
</textarea></td>
                                    </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" valign="top" class="brown_text">請詳述所有公開考試成績, 例如:</td>
                                    </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" valign="top" class="brown_bold_text"><textarea name="textarea4" cols="60" rows="5" class="black_text" id="textarea4">中學會考 
------------ 
中國語文 C, 英國語文 A, 數學 B, 物理 B, 生物 C, 化學 B, 附加數學 A, 電腦 B

高級程度會考
------------ 
中國語文 C, 英語運用 B, 通識教育 B, 純粹數學 B, 物理 A, 化學 C</textarea></td>
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
                                    <td colspan="2" valign="top" class="brown_bold_text"><strong class="brown_bold_underline_text">其他能操並可教授語言</strong></td>
                                    </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" valign="top" class="brown_bold_text">
                                    <?php $_from = $this->_tpl_vars['language_names']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['index'] => $this->_tpl_vars['v']):
?>
                                    <input name="cb_language_<?php echo $this->_tpl_vars['language_ids'][$this->_tpl_vars['index']]; ?>
" type="checkbox" id="cb_language_<?php echo $this->_tpl_vars['language_ids'][$this->_tpl_vars['index']]; ?>
" value="<?php echo $this->_tpl_vars['language_ids'][$this->_tpl_vars['index']]; ?>
" <?php if ($this->_tpl_vars['languages_selected'][$this->_tpl_vars['index']] == 1): ?>checked="checked"<?php endif; ?> />
                                    <span class="brown_bold_text"><?php echo $this->_tpl_vars['v']; ?>
</span><br />
                                    <?php endforeach; endif; unset($_from); ?>
                                    </td>
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
                                    <td colspan="2" valign="top" class="brown_bold_underline_text"><strong>音樂<strong>技能</strong></strong></td>
                                    </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" valign="top" class="brown_bold_text">可教授之樂器</td>
                                    </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" valign="top" class="brown_bold_text">
                                    <?php $_from = $this->_tpl_vars['instrument_names']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['index'] => $this->_tpl_vars['v']):
?>
                                    <input name="cb_instrument_<?php echo $this->_tpl_vars['instrument_ids'][$this->_tpl_vars['index']]; ?>
" type="checkbox" id="cb_instrument_<?php echo $this->_tpl_vars['instrument_ids'][$this->_tpl_vars['index']]; ?>
" value="<?php echo $this->_tpl_vars['instrument_ids'][$this->_tpl_vars['index']]; ?>
" <?php if ($this->_tpl_vars['instruments_selected'][$this->_tpl_vars['index']] == 1): ?>checked="checked"<?php endif; ?> />
                                    <span class="brown_bold_text"><?php echo $this->_tpl_vars['v']; ?>
</span><br />
                                    <?php endforeach; endif; unset($_from); ?>                                    
                                    </td>
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
                                    <td colspan="2" valign="top" class="brown_bold_text"><input type="button" name="submit_button" id="submit_button" value="更新" /></td>
                                    </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                </table></td>
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