<?php /* Smarty version 2.6.26, created on 2010-06-04 00:44:15
         compiled from find_tutor.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'find_tutor.tpl', 139, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>搵補習.hk --- 搵個GOODTUTOR!</title>
<link type="text/css" href="./lib/jquery/css/smoothness/jquery-ui-1.8.custom.css" rel="stylesheet" />
<script src="./lib/jquery/js/jquery-1.4.2.min.js" type="text/javascript"></script>
<script src="./lib/jquery/js/jquery-ui-1.8.custom.min.js" type="text/javascript"></script>
<script type="text/javascript" src="./find_tutor.js"></script>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="error_contact_name" title="請注意！" style="display: none;">請輸入聯絡人姓名！</div>
<div id="error_contact_no" title="請注意！" style="display: none;">請輸入聯絡電話！</div>
<div id="error_region" title="請注意！" style="display: none;">請選擇授課地區！</div>
<div id="error_service" title="請注意！" style="display: none;">請選擇補習項目！</div>
<div id="error_time" title="請注意！" style="display: none;">請選擇授課時間！</div>
<div id="error_hour_rate" title="請注意！" style="display: none;">請輸入學費數目！</div>
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
                      <td height="100" valign="middle" bgcolor="#336633"><img src="images/find_tutor.jpg" width="525" height="90" /></td>
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
                  <td bgcolor="#61A327"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="40" height="70">&nbsp;</td>
                      <td width="60" valign="middle"><div align="center"><img src="images/yellow_star.jpg" width="40" height="39" /></div></td>
                      <td valign="middle"><span class="hd_white_bold_text">家長或學生可以透過我們找尋合適的導師；我們絕不會向家長／學生收取任何形式的費用。<br />
請提供以下資料，我們會用心並有效地處理您的要求！ </span></td>
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
                      <td width="750" valign="top" bgcolor="#FFFADD"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td>&nbsp;</td>
                          <td width="700">
                            <form id="find_tutor_form" name="find_tutor_form" method="post" action="find_tutor_do.php">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td width="140" class="brown_bold_text">&nbsp;</td>
                                      <td><label></label></td>
                                    </tr>
                                    <tr>
                                      <td><span class="brown_bold_text">聯絡人姓名 </span></td>
                                      <td><input name="contact_name" type="text" class="black_text" id="contact_name" value="<?php echo $this->_tpl_vars['contact_name']; ?>
" maxlength="64" />
                                        <span class="required_field_red_star">*</span></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="brown_bold_text"> 聯絡電話 </td>
                                      <td><input name="contact_no" type="text" class="black_text" id="contact_no" value="<?php echo $this->_tpl_vars['contact_no']; ?>
" maxlength="64" />
                                          <span class="required_field_red_star">*</span></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="brown_bold_text"> 聯絡時間 </td>
                                      <td><input name="contact_time" type="text" class="black_text" id="contact_time" maxlength="128" />
                                          <span class="brown_bold_text">(如需要)</span> </td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="brown_bold_text"> 學生年齡 </td>
                                      <td><input name="student_age" type="text" class="black_text" id="student_age" maxlength="16" /></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="brown_bold_text"> 學生姓別 </td>
                                      <td><label>
                                        <select name="student_gender" id="student_gender">
                                        <option value="-1">------請選擇------</option>
                                        <option value="1">男</option>
                                        <option value="2">女</option>
                                        </select>
                                      </label></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="brown_bold_text"> 授課地區 </td>
                                      <td>
                                        <select name="sub_region" id="sub_region">
                                        <option value="-1">------請選擇------</option>
                                        <option value="-1">------新界區------</option>
                                        <?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['nt_ids'],'output' => $this->_tpl_vars['nt_names'],'selected' => $this->_tpl_vars['sub_region']), $this);?>

                                        <option value="-1">------九龍區------</option>
                                        <?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['kn_ids'],'output' => $this->_tpl_vars['kn_names'],'selected' => $this->_tpl_vars['sub_region']), $this);?>

                                        <option value="-1">------港島區------</option>
                                        <?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['hki_ids'],'output' => $this->_tpl_vars['hki_names'],'selected' => $this->_tpl_vars['sub_region']), $this);?>

                                        <option value="0">------其他------</option>
                                        </select>
                                          <span class="required_field_red_star">*</span></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="brown_bold_text"> 屋苑 ／地點 </td>
                                      <td><input name="textfield7" type="text" class="black_text" id="textfield7" /></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td><span class="brown_bold_underline_text">授課時間 </span><span class="required_field_red_star">*</span></td>
                              </tr>
                              <tr>
                                <td><table width="700" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td width="140" class="brown_text">&nbsp;</td>
                                      <td class="brown_bold_text">星期一</td>
                                      <td class="brown_bold_text">星期二</td>
                                      <td class="brown_bold_text">星期三</td>
                                      <td class="brown_bold_text">星期四</td>
                                      <td class="brown_bold_text">星期五</td>
                                      <td class="brown_bold_text">星期六</td>
                                      <td class="brown_bold_text">星期日</td>
                                    </tr>
                                    <tr>
                                      <td class="brown_bold_text">上午 (2:00pm前)</td>
                                      <td class="black_text"><strong>
                                        <input name="cb_time_slot_1" type="checkbox" id="cb_time_slot_1" value="1" />
                                      </strong></td>
                                      <td class="black_text"><strong>
                                        <input name="cb_time_slot_5" type="checkbox" id="cb_time_slot_5" value="5" />
                                      </strong></td>
                                      <td class="black_text"><strong>
                                        <input name="cb_time_slot_9" type="checkbox" id="cb_time_slot_9" value="9" />
                                      </strong></td>
                                      <td class="black_text"><strong>
                                        <input name="cb_time_slot_13" type="checkbox" id="cb_time_slot_13" value="13" />
                                      </strong></td>
                                      <td class="black_text"><strong>
                                        <input name="cb_time_slot_17" type="checkbox" id="cb_time_slot_17" value="17" />
                                      </strong></td>
                                      <td class="black_text"><strong>
                                        <input name="cb_time_slot_21" type="checkbox" id="cb_time_slot_21" value="21" />
                                      </strong></td>
                                      <td class="black_text"><strong>
                                        <input name="cb_time_slot_25" type="checkbox" id="cb_time_slot_25" value="25" />
                                      </strong></td>
                                    </tr>
                                    <tr>
                                      <td class="brown_bold_text">下午 (2-7:00pm)</td>
                                      <td class="black_text"><strong>
                                        <input name="cb_time_slot_2" type="checkbox" id="cb_time_slot_2" value="2" />
                                      </strong></td>
                                      <td class="black_text"><strong>
                                        <input name="cb_time_slot_6" type="checkbox" id="cb_time_slot_6" value="6" />
                                      </strong></td>
                                      <td class="black_text"><strong>
                                        <input name="cb_time_slot_10" type="checkbox" id="cb_time_slot_10" value="10" />
                                      </strong></td>
                                      <td class="black_text"><strong>
                                        <input name="cb_time_slot_14" type="checkbox" id="cb_time_slot_14" value="14" />
                                      </strong></td>
                                      <td class="black_text"><strong>
                                        <input name="cb_time_slot_18" type="checkbox" id="cb_time_slot_18" value="18" />
                                      </strong></td>
                                      <td class="black_text"><strong>
                                        <input name="cb_time_slot_22" type="checkbox" id="cb_time_slot_22" value="22" />
                                      </strong></td>
                                      <td class="black_text"><strong>
                                        <input name="cb_time_slot_26" type="checkbox" id="cb_time_slot_26" value="26" />
                                      </strong></td>
                                    </tr>
                                    <tr>
                                      <td class="brown_bold_text">晚上 (7-10:00pm)</td>
                                      <td class="black_text"><strong>
                                        <input name="cb_time_slot_3" type="checkbox" id="cb_time_slot_3" value="3" />
                                      </strong></td>
                                      <td class="black_text"><strong>
                                        <input name="cb_time_slot_7" type="checkbox" id="cb_time_slot_7" value="7" />
                                      </strong></td>
                                      <td class="black_text"><strong>
                                        <input name="cb_time_slot_11" type="checkbox" id="cb_time_slot_11" value="11" />
                                      </strong></td>
                                      <td class="black_text"><strong>
                                        <input name="cb_time_slot_15" type="checkbox" id="cb_time_slot_15" value="15" />
                                      </strong></td>
                                      <td class="black_text"><strong>
                                        <input name="cb_time_slot_19" type="checkbox" id="cb_time_slot_19" value="19" />
                                      </strong></td>
                                      <td class="black_text"><strong>
                                        <input name="cb_time_slot_23" type="checkbox" id="cb_time_slot_23" value="23" />
                                      </strong></td>
                                      <td class="black_text"><strong>
                                        <input name="cb_time_slot_27" type="checkbox" id="cb_time_slot_27" value="27" />
                                      </strong></td>
                                    </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td><strong>
                                  <input name="cb_time_all" type="checkbox" class="black_text" id="cb_time_all" value="0" />
                                </strong><span class="brown_bold_text">任何時間</span></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td width="140" class="brown_bold_text">補習項目</td>
                                      <td>
                                        <select name="service" id="service">
                                        <option value="-1">------請選擇------</option>
                                        <?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['service_ids'],'output' => $this->_tpl_vars['service_names'],'selected' => $this->_tpl_vars['service']), $this);?>

                                        </select>
                                          <span class="required_field_red_star">*</span></td>
                                    </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td><span class="brown_bold_underline_text">專補科目／項目補充</span> 
                                  <label class="brown_bold_text">(如適用)</label></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td><textarea name="service_detail" cols="80" rows="5" class="black_text" id="service_detail"></textarea></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td width="140" class="brown_bold_text">每星期堂數</td>
                                      <td><input name="lesson_count" type="text" class="black_text" id="lesson_count" maxlength="64" /></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="brown_bold_text">每堂時數</td>
                                      <td><input name="lesson_length" type="text" class="black_text" id="lesson_length" maxlength="64" />
                                          <span class="brown_bold_text">(小時或分鐘)</span></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="brown_bold_text">每小時學費</td>
                                      <td><span class="brown_bold_text">$</span>
                                          <input name="hour_rate" type="text" class="black_text" id="hour_rate" maxlength="64" />
                                          <span class="required_field_red_star">*</span></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="brown_bold_text">導師最低學歷要求</td>
                                      <td>
                                        <select name="mq" id="mq">
                                        <option value="-1" selected="selected">------請選擇------</option>
                                        <?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['qf_ids'],'output' => $this->_tpl_vars['qf_names']), $this);?>

                                        </select>  									</td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td valign="top" class="brown_bold_text">學歷要求補充</td>
                                      <td><textarea name="mq_detail" id="mq_detail" cols="60" rows="5"></textarea></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td width="140" class="brown_bold_text">導師姓別要求</td>
                                      <td><select name="tutor_gender" id="tutor_gender">
      <option value="-1">------請選擇------</option>
	  <option value="0">男女均可</option>
      <option value="1">男</option>
      <option value="2">女</option>
  </select></td>
                                    </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td class="brown_bold_underline_text">特別要求 </td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td><textarea name="special_request" cols="80" rows="5" class="black_text" id="special_request"></textarea></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td width="140" class="brown_bold_text">如何得悉本網站？</td>
                                      <td><select name="know_way" id="know_way">
    <option value="-1" selected="selected">------請選擇------</option>
    <option value="1">朋友介紹</option>
    <option value="2">我是現有用戶</option>
    <option value="3">網上廣告</option>
    <option value="4">行人廣告</option>
    <option value="5">Facebook.com</option>
    <option value="0">其他</option>
  </select></td>
                                    </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td><div align="center">
                                    <input name="submit_button" type="button" class="brown_bold_text" id="submit_button" value="送出" />
                                </div></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                              </tr>
                            </table>
                          </form></td>
                          <td>&nbsp;</td>
                        </tr>
                      </table>                        </td>
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