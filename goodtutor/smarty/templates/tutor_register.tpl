<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>搵補習.hk --- 登記成為GOODTUTOR!</title>
<link type="text/css" href="./lib/jquery/css/smoothness/jquery-ui-1.8.custom.css" rel="stylesheet" />
<script src="./lib/jquery/js/jquery-1.4.2.min.js" type="text/javascript"></script>
<script src="./lib/jquery/js/jquery-ui-1.8.custom.min.js" type="text/javascript"></script>
<script type="text/javascript" src="./tutor_register.js"></script>
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="./ga.js"></script>
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
<div id="error_email" title="請注意！" style="display: none;">請輸入識別電郵！</div>
<div id="error_vc" title="請注意！" style="display: none;">請確認驗證碼！</div>
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
                      <td>{include file='logo_and_menu.inc.tpl'}</td>
                    </tr>
                    <tr>
                      <td height="100" valign="middle" bgcolor="#336633" class="hd_white_bold_text"><img src="images/tutor_register.jpg" width="525" height="90" /></td>
                    </tr>
                  </table></td>
                  <td width="305" valign="top" bgcolor="#336633">{include file='find_tutor_form.inc.tpl'}</td>
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
                          <td width="700">
                          <form action="tutor_register_do.php" method="post" enctype="multipart/form-data" name="tutor_register_form" id="tutor_register_form">
                          {if $is_generated == 1}<input type="hidden" id="is_generated" name="is_generated" value="1" />{/if}
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
                                    <td><input name="si_title" type="text" class="black_text" id="si_title" maxlength="128" />
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
                                    <td width="400"><textarea name="si_detail" cols="60" rows="5" class="black_text" id="si_detail"></textarea></td>
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
                                    <td valign="top" class="brown_bold_text">個人短片</td>
                                    <td><input name="si_movie_embed" type="text" class="black_text" id="si_movie_embed" size="80" /></td>
                                  </tr>
                                  <tr>
                                    <td height="6" valign="top" class="brown_bold_text"></td>
                                    <td></td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td><span class="brown_bold_text">(只支援YouTube&quot;  嵌入 &quot;碼)</span></td>
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
                                    <td valign="top" class="brown_bold_text"><strong class="brown_bold_underline_text">個人資料</strong></td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">稱呼名稱</td>
                                    <td><input name="pi_nickname" type="text" class="black_text" id="pi_nickname" maxlength="64" />
                                      <span class="required_field_red_star">*</span></td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">英文名稱</td>
                                    <td><input name="pi_english_name" type="text" class="black_text" id="pi_english_name" maxlength="128" />
                                      <span class="required_field_red_star">*</span></td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">中文名稱</td>
                                    <td><input name="pi_chinese_name" type="text" class="black_text" id="pi_chinese_name" maxlength="64" />
                                      <span class="required_field_red_star">*</span></td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">身份証號碼</td>
                                    <td><input name="pi_hkid" type="text" class="black_text" id="pi_hkid" maxlength="16" /></td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">居住地區</td>
                                    <td><label>
                                        <select name="pi_live_region" id="pi_live_region">
                                          <option value="-1">------請選擇------</option>
                                          <option value="-1">------新界區------</option>
                                          {html_options values=$nt_ids output=$nt_names}
                                          <option value="-1">------九龍區------</option>
                                          {html_options values=$kn_ids output=$kn_names}
                                          <option value="-1">------港島區------</option>
                                          {html_options values=$hki_ids output=$hki_names}      
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
                                    <td>
                                    <select name="pi_gender" id="pi_gender">
                                    <option value="-1">------請選擇------</option>
                                    <option value="1">男</option>
                                    <option value="2">女</option>
                                    </select>
                                      <span class="required_field_red_star">*</span></td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">聯絡電話</td>
                                    <td><input name="pi_contact_no" type="text" class="black_text" id="pi_contact_no" maxlength="64" />
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
                                    <td valign="top" class="brown_bold_text"><strong class="brown_bold_underline_text">個人識別資料</strong></td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">您的電郵</td>
                                    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                          <td width="360"><input name="email" type="text" class="black_text" id="email" size="30" maxlength="128" />
                                            <span class="required_field_red_star">*</span></td>
                                          <td><input name="email_button" type="button" class="black_text" id="email_button" value="確認電郵" /></td>
                                        </tr>
                                      </table></td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>
                                    <div id="div_note_email_ok" style="display:none;"><span class="darkgreen_bold_text">OK</span></div>
          							<div id="div_note_email_failed" style="display:none"><span class="lightred_bold_text">請選用另一個電郵地址！</span></div>
                                    </td>
                                  </tr>
                                  <tr>
                                    
                                    </tr></table>
                                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td valign="top" class="brown_bold_text">&nbsp;</td>
                                      <td class="brown_text">&nbsp;</td>
                                    </tr>
                                    <tr><td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td class="brown_text">（您將會收到一封由我們傳來的電郵，內裡包括一組識別密碼，用作日後更新個人資料之用）</td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td width="140" valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td width="360"><span class="brown_bold_text">{$recaptcha}</span></td>
                                        <td valign="top"><span class="brown_bold_text">
                                          <input name="verify_button" type="button" class="black_text" id="verify_button" value="確認驗證碼" />
                                        </span></td>
                                      </tr>
                                    </table></td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>
                                    <div id="div_note_vc_ok" style="display:none;"><span class="darkgreen_bold_text">驗證碼正確 ^^</span></div>
                                    <div id="div_note_vc_failed" style="display:none;"><span class="lightred_bold_text">驗證碼錯誤，請更正！</span></div>                                    </td>
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
                                    <td><input name="ec_name" type="text" class="black_text" id="ec_name" maxlength="64" /></td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">緊急聯絡人電話</td>
                                    <td><input name="en_contact_no" type="text" class="black_text" id="en_contact_no" maxlength="64" /></td>
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
                                      <label>
                                      <input name="cb_region_all" type="checkbox" class="black_text" id="cb_region_all" value="1" />
                                      </label>
                                    </strong> 全港各區
                                    <label> <br />
                                    <input name="cb_region_nt" type="checkbox" class="black_text" id="cb_region_nt" value="1" />
                                    </label>
全新界區
<input name="cb_region_kn" type="checkbox" class="black_text" id="cb_region_kn" value="1" />
全九龍區
<input name="cb_region_hki" type="checkbox" class="black_text" id="cb_region_hki" value="1" />
全港島區 <br />
<input name="cb_region_others" type="checkbox" class="black_text" id="cb_region_others" value="1" />
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
                                        <td valign="top"> {foreach from=$nt_names key=index item=v}
                                          <input name="cb_region_nt_{$nt_ids[$index]}" type="checkbox" id="cb_region_nt_{$nt_ids[$index]}" value="{$nt_ids[$index]}" />
                                          <span class="brown_bold_text">{$v}</span><br />
                                          {/foreach} </td>
                                        <td valign="top"> {foreach from=$kn_names key=index item=v}
                                          <input name="cb_region_kn_{$kn_ids[$index]}" type="checkbox" id="cb_region_kn_{$kn_ids[$index]}" value="{$kn_ids[$index]}" />
                                          <span class="brown_bold_text">{$v}</span><br />
                                          {/foreach} </td>
                                        <td valign="top"> {foreach from=$hki_names key=index item=v}
                                          <input name="cb_region_hki_{$hki_ids[$index]}" type="checkbox" id="cb_region_hki_{$hki_ids[$index]}" value="{$hki_ids[$index]}" />
                                          <span class="brown_bold_text">{$v}</span><br />
                                          {/foreach} </td>
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
                                      <input name="cb_time_all" type="checkbox" class="black_text" id="cb_time_all" value="0" />
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
                                        <td>下午 (2-7:00pm)</td>
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
                                        <td>晚上 (7-10:00pm)</td>
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
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">補充資料</td>
                                    <td><textarea name="lt_additional" cols="60" rows="5" class="black_text" id="lt_additional"></textarea></td>
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
                                    <td colspan="2" valign="top" class="brown_bold_text"><input name="st_1" type="checkbox" class="black_text" id="st_1" value="1" />
小學生
  <input name="st_2" type="checkbox" class="black_text" id="st_2" value="2" />
初中生
<input name="st_3" type="checkbox" class="black_text" id="st_3" value="3" />
高中生
<input name="st_4" type="checkbox" class="black_text" id="st_4" value="4" />
大專生
<input name="st_5" type="checkbox" class="black_text" id="st_5" value="5" />
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
                                    <td colspan="2" valign="top" class="brown_bold_text"><textarea name="tf_detail" cols="60" rows="5" class="black_text" id="tf_detail"></textarea></td>
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
                                    <td>
                                    <select name="aq_el" class="black_text" id="aq_el">
                                      <option value="-1" selected="selected">------請選擇------</option>                                      
								      {html_options values=$qf_ids output=$qf_names}    
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
								      {html_options values=$college_ids output=$college_names}
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
                                      <textarea name="aq_college_others" cols="60" rows="5" class="black_text" id="aq_college_others"></textarea>
                                    </span></td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">主修科目</td>
                                    <td><span class="brown_bold_text">
                                      <textarea name="aq_major" cols="60" rows="5" class="black_text" id="aq_major"></textarea>
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
								        {html_options values=$hm_ids output=$hm_names}   
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
                                      <textarea name="aq_professional" cols="60" rows="5" class="black_text" id="aq_professional"></textarea>
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
                                    <td><input name="aq_hkcee_mark" type="text" class="black_text" id="aq_hkcee_mark" maxlength="16" /></td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">補習年資</td>
                                    <td><input name="aq_tutor_year" type="text" class="black_text" id="aq_tutor_year" maxlength="16" /></td>
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
                                    <td colspan="2" valign="top" class="brown_bold_text"><textarea name="pe_result_detail" cols="60" rows="5" class="black_text" id="pe_result_detail"></textarea></td>
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
                                    <td colspan="2" valign="top" class="brown_bold_text"><strong class="brown_bold_underline_text">其他可教授語言</strong></td>
                                    </tr>
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" valign="top" class="brown_bold_text">
                                    
                                    {foreach from=$language_names key=index item=v}      
                                    <input name="cb_language_{$language_ids[$index]}" type="checkbox" id="cb_language_{$language_ids[$index]}" value="{$language_ids[$index]}" />{$v}<br />
                                    {/foreach}                                    </td>
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
                                    
                                    {foreach from=$instrument_names key=index item=v}
                                    <input name="cb_instrument_{$instrument_ids[$index]}" type="checkbox" id="cb_instrument_{$instrument_ids[$index]}" value="{$instrument_ids[$index]}" />{$v}<br />
                                    {/foreach}                                    </td>
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
                                    <td colspan="2" valign="top" class="brown_bold_text"><strong>如何得悉本網站？</strong>
                                      <select name="know_way" class="black_text" id="know_way">
                                        <option value="-1" selected="selected">------請選擇------</option>
                                        <option value="1">朋友介紹</option>
                                        <option value="2">我是現有用戶</option>
                                        <option value="3">網上廣告</option>
                                        <option value="4">行人廣告</option>
                                        <option value="5">Facebook.com</option>
                                        <option value="0">其他</option>
                                      </select></td>
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
                                    <td colspan="2" valign="top" class="brown_bold_text"><strong class="brown_bold_underline_text">會員合約（導師）條文</strong></td>
                                    </tr>
                                  
                                  
                                  <tr>
                                    <td valign="top" class="brown_bold_text">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" valign="top" class="brown_bold_text">本人得悉GoodTutor有關<a href="terms.php#t2" target="_blank" class="brown_bold_text">使用方式及服務條件</a>（<a href="terms.php#t2" target="_blank" class="brown_bold_text">按此檢視</a>），並遵守服務條款。本人保證以上資料正確無誤。</td>
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
                                    <td colspan="2" valign="top" class="brown_bold_text">
                                    <input type="button" name="submit_button" id="submit_button" value="我同意遵守服務條款, 並註冊成為會員." /></td>
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
          <td width="600" bgcolor="#346633">{include file='footer.inc.tpl'}</td>
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