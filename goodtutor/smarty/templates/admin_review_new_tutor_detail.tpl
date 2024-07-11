<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Review tutor detail</title>
<link type="text/css" href="./../lib/jquery/css/smoothness/jquery-ui-1.8.custom.css" rel="stylesheet" />
<script src="./../lib/jquery/js/jquery-1.4.2.min.js" type="text/javascript"></script>
<script src="./../lib/jquery/js/jquery-ui-1.8.custom.min.js" type="text/javascript"></script>
<script type="text/javascript" src="./../tutor_profile_edit.cc.js"></script>
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
<p><strong>導師個人檔案<br />
</strong></p>
<p><a href="trash_tutor_record.php?id={$tutor_id}"><b>Trash it!!!</b></a><br />
</p>
<form action="review_new_tutor_detail_do.php" method="post" enctype="multipart/form-data" name="tutor_profile_edit_form" id="tutor_profile_edit_form">
  <input type="hidden" id="tutor_id" name="tutor_id" value="{$tutor_id}" />
  <p><strong>自我簡介</strong></p>
  <p>標題
    <label>
    <input name="si_title" type="text" id="si_title" maxlength="128" value="{$si_title}" />
      </label>
    *</p>
  <p> 自我介紹 (不少於20字)<br />
      <br />
      <label>
      <textarea name="si_detail" id="si_detail" cols="45" rows="5">{$si_detail}</textarea>
      </label>
    *<br />
  </p>
  <p> 相片    
    {if $si_photo != ""}<img src="./../tutor_photos/{$si_photo}" /><br />{/if}
    <label>
      <input type="file" name="si_photo" id="si_photo" />
      </label>
    （請少於2MB）</p>
  <p> 個人短片
    {if $si_movie_embed_raw != ""}
    <br />
    {$si_movie_embed_raw}
    <br />
    {/if}    
    <label>
    <input type="text" name="si_movie_embed" id="si_movie_embed" value="{$si_movie_embed}" />
      </label>
    (只支援YouTube&quot;  嵌入 &quot;碼)</p>
  <p>&nbsp;</p>
  <p><br />
      <strong>個人資料</strong></p>
  <p>稱呼名稱
    <input name="pi_nickname" type="text" id="pi_nickname" maxlength="64" value="{$pi_nickname}" />
    *</p>
  <p> 身份証上的英文名稱
    <label>
    <input name="pi_english_name" type="text" id="pi_english_name" maxlength="128" value="{$pi_english_name}" />
      </label>
    *</p>
  <p> 身份証上的中文名稱
    <input name="pi_chinese_name" type="text" id="pi_chinese_name" maxlength="64" value="{$pi_chinese_name}" />
    *</p>
  <p> 身份証號碼
    <label>
    <input name="pi_hkid" type="text" id="pi_hkid" maxlength="10" value="{$pi_hkid}" />
      </label>
    *</p>
  <p> 居住地區
    <label>
      <select name="pi_live_region" id="pi_live_region">
        <option value="-1">------請選擇------</option>
        <option value="-1">------新界區------</option>
        
      {html_options values=$nt_ids output=$nt_names selected=$pi_live_region}
      
        <option value="-1">------九龍區------</option>
        
      {html_options values=$kn_ids output=$kn_names selected=$pi_live_region}
      
        <option value="-1">------港島區------</option>
        
      {html_options values=$hki_ids output=$hki_names selected=$pi_live_region}      
      
        <option value="0">------其他------</option>
      </select>
      </label>
    *</p>
  <p> 性別
    <label>
      <select name="pi_gender" id="pi_gender">
        <option value="-1">------請選擇------</option>
        <option value="1" {if $pi_gender == 1}selected="selected"{/if}>男</option>
        <option value="2" {if $pi_gender == 2}selected="selected"{/if}>女</option>
      </select>
      </label>
    *</p>
  <p> 聯絡電話
    <label>
    <input name="pi_contact_no" type="text" id="pi_contact_no" maxlength="64" value="{$pi_contact_no}" />
      </label>
    *</p>
  <p>&nbsp;</p>
  <p><strong>緊急聯繫資料</strong> </p>
  <p> 緊急聯絡人姓名
    <label>
    <input name="ec_name" type="text" id="ec_name" maxlength="64" value="{$ec_name}" />
      </label>
  </p>
  <p> 緊急聯絡人電話
    <label>
    <input name="en_contact_no" type="text" id="en_contact_no" maxlength="64" value="{$en_contact_no}" />
      </label>
  </p>
  <p>&nbsp;</p>
  <p> <strong>授課地區</strong>*</p>
  <p><strong>
    <label>
    <input name="cb_region_all" type="checkbox" id="cb_region_all" value="1" {if $tr_region_sets[0] == 1}checked="checked"{/if} />
    </label>
    </strong> 全港各區
    <label> <br />
    <input name="cb_region_nt" type="checkbox" id="cb_region_nt" value="1" {if $tr_region_sets[1] == 1}checked="checked"{/if} />
    </label>
    全新界區
    <input name="cb_region_kn" type="checkbox" id="cb_region_kn" value="1" {if $tr_region_sets[2] == 1}checked="checked"{/if} />
    全九龍區
    <input name="cb_region_hki" type="checkbox" id="cb_region_hki" value="1" {if $tr_region_sets[3] == 1}checked="checked"{/if} />
    全港島區 <br />
    <input name="cb_region_others" type="checkbox" id="cb_region_others" value="1" {if $tr_region_sets[4] == 1}checked="checked"{/if} />
    其他 <br />
  </p>
  <table width="800" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><em>新界區<br />
      </em></td>
      <td><em>九龍區</em></td>
      <td><em>港島區</em></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td valign="top">      
      {foreach from=$nt_names key=index item=v}
        <input name="cb_region_nt_{$nt_ids[$index]}" type="checkbox" id="cb_region_nt_{$nt_ids[$index]}" value="{$nt_ids[$index]}" {if $tr_regions_nt_selected[$index] == 1}checked="checked"{/if} />
        {$v}<br />
        {/foreach}
      </td>
      <td valign="top"> {foreach from=$kn_names key=index item=v} <strong>
        <input name="cb_region_kn_{$kn_ids[$index]}" type="checkbox" id="cb_region_kn_{$kn_ids[$index]}" value="{$kn_ids[$index]}" {if $tr_regions_kn_selected[$index] == 1}checked="checked"{/if} />
        </strong>{$v}<br />
        {/foreach} </td>
      <td valign="top"> {foreach from=$hki_names key=index item=v} <strong>
        <input name="cb_region_hki_{$hki_ids[$index]}" type="checkbox" id="cb_region_hki_{$hki_ids[$index]}" value="{$hki_ids[$index]}" {if $tr_regions_hki_selected[$index] == 1}checked="checked"{/if} />
        </strong>{$v}<br />
        {/foreach} </td>
    </tr>
  </table>
  <p><em><br />
  </em></p>
  <p><br />
  </p>
  <p> <strong>授課時間</strong> *<br />
      <br />
      <strong>
      <input name="cb_time_all" type="checkbox" id="cb_time_all" value="0" {if $is_all_day == 1}checked="checked"{/if} />
    </strong>任何時間</p>
  <table width="800" border="0" cellspacing="0" cellpadding="0">
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
      <td><strong>
        <input name="cb_time_slot_1" type="checkbox" id="cb_time_slot_1" value="1" {if $days_selected[0] == 1}checked="checked"{/if} />
      </strong></td>
      <td><strong>
        <input name="cb_time_slot_5" type="checkbox" id="cb_time_slot_5" value="5" {if $days_selected[4] == 1}checked="checked"{/if} />
      </strong></td>
      <td><strong>
        <input name="cb_time_slot_9" type="checkbox" id="cb_time_slot_9" value="9" {if $days_selected[8] == 1}checked="checked"{/if} />
      </strong></td>
      <td><strong>
        <input name="cb_time_slot_13" type="checkbox" id="cb_time_slot_13" value="13" {if $days_selected[12] == 1}checked="checked"{/if} />
      </strong></td>
      <td><strong>
        <input name="cb_time_slot_17" type="checkbox" id="cb_time_slot_17" value="17" {if $days_selected[16] == 1}checked="checked"{/if} />
      </strong></td>
      <td><strong>
        <input name="cb_time_slot_21" type="checkbox" id="cb_time_slot_21" value="21" {if $days_selected[20] == 1}checked="checked"{/if} />
      </strong></td>
      <td><strong>
        <input name="cb_time_slot_25" type="checkbox" id="cb_time_slot_25" value="25" {if $days_selected[24] == 1}checked="checked"{/if} />
      </strong></td>
    </tr>
    <tr>
      <td>下午 (2-7:00pm)</td>
      <td><strong>
        <input name="cb_time_slot_2" type="checkbox" id="cb_time_slot_2" value="2" {if $days_selected[1] == 1}checked="checked"{/if} />
      </strong></td>
      <td><strong>
        <input name="cb_time_slot_6" type="checkbox" id="cb_time_slot_6" value="6" {if $days_selected[5] == 1}checked="checked"{/if} />
      </strong></td>
      <td><strong>
        <input name="cb_time_slot_10" type="checkbox" id="cb_time_slot_10" value="10" {if $days_selected[9] == 1}checked="checked"{/if} />
      </strong></td>
      <td><strong>
        <input name="cb_time_slot_14" type="checkbox" id="cb_time_slot_14" value="14" {if $days_selected[13] == 1}checked="checked"{/if} />
      </strong></td>
      <td><strong>
        <input name="cb_time_slot_18" type="checkbox" id="cb_time_slot_18" value="18" {if $days_selected[17] == 1}checked="checked"{/if} />
      </strong></td>
      <td><strong>
        <input name="cb_time_slot_22" type="checkbox" id="cb_time_slot_22" value="22" {if $days_selected[21] == 1}checked="checked"{/if} />
      </strong></td>
      <td><strong>
        <input name="cb_time_slot_26" type="checkbox" id="cb_time_slot_26" value="26" {if $days_selected[25] == 1}checked="checked"{/if} />
      </strong></td>
    </tr>
    <tr>
      <td>晚上 (7-10:00pm)</td>
      <td><strong>
        <input name="cb_time_slot_3" type="checkbox" id="cb_time_slot_3" value="3" {if $days_selected[2] == 1}checked="checked"{/if} />
      </strong></td>
      <td><strong>
        <input name="cb_time_slot_7" type="checkbox" id="cb_time_slot_7" value="7" {if $days_selected[6] == 1}checked="checked"{/if} />
      </strong></td>
      <td><strong>
        <input name="cb_time_slot_11" type="checkbox" id="cb_time_slot_11" value="11" {if $days_selected[10] == 1}checked="checked"{/if} />
      </strong></td>
      <td><strong>
        <input name="cb_time_slot_15" type="checkbox" id="cb_time_slot_15" value="15" {if $days_selected[14] == 1}checked="checked"{/if} />
      </strong></td>
      <td><strong>
        <input name="cb_time_slot_19" type="checkbox" id="cb_time_slot_19" value="19" {if $days_selected[18] == 1}checked="checked"{/if} />
      </strong></td>
      <td><strong>
        <input name="cb_time_slot_23" type="checkbox" id="cb_time_slot_23" value="23" {if $days_selected[22] == 1}checked="checked"{/if} />
      </strong></td>
      <td><strong>
        <input name="cb_time_slot_27" type="checkbox" id="cb_time_slot_27" value="27" {if $days_selected[26] == 1}checked="checked"{/if} />
      </strong></td>
    </tr>
  </table>
  <p> 補充資料<br />
      <br />
      <label>
      <textarea name="lt_additional" id="lt_additional" cols="45" rows="5">{$lt_additional}</textarea>
      </label>
  </p>
  <p>&nbsp;</p>
  <p><strong>目標服務群組</strong> *<br />
    <br />
    <input name="st_1" type="checkbox" id="st_1" value="1" {if $st_1 == 1}checked="checked"{/if} />
小學生
<input name="st_2" type="checkbox" id="st_2" value="2" {if $st_2 == 2}checked="checked"{/if} />
初中生
<input name="st_3" type="checkbox" id="st_3" value="3" {if $st_3 == 3}checked="checked"{/if} />
高中生
<input name="st_4" type="checkbox" id="st_4" value="4" {if $st_4 == 4}checked="checked"{/if} />
大專生
<input name="st_5" type="checkbox" id="st_5" value="5" {if $st_5 == 5}checked="checked"{/if} />
成人</p>
  <p>&nbsp;</p>
  <p><strong>學費</strong></p>
  <p>授課收費詳情(以每小時計算)<br />
      <br />
      <textarea name="tf_detail" id="tf_detail" cols="60" rows="5">{$tf_detail}</textarea>
      <br />
      <br />
    例如:<br />
    <br />
    <textarea name="textarea7" id="textarea7" cols="60" rows="5">小學全科 --- $80/小時
初中全科 --- $110/小時
會考理科（包括學數，附加數學，物理，化學，生物）--- $130/小時
高考純數 --- $150/小時</textarea>
    <br />
    <br />
    <br />
  </p>
  <p> <strong>學業履歷資料</strong> </p>
  <p> 最高教育程度
    <label>
      <select name="aq_el" id="aq_el">
        <option value="-1" selected="selected">------請選擇------</option>
        
      {html_options values=$qf_ids output=$qf_names selected=$aq_el}
    
      </select>
      </label>
    *</p>
  <p> (曾)就讀院校
    <label>
      <select name="aq_college" id="aq_college">
        <option value="-1" selected="selected">------請選擇------</option>
        
      {html_options values=$college_ids output=$college_names selected=$aq_college}
    
      </select>
      </label>
    (如多於一間, 請選其一)<br />
    <br />
    其他院校
    <label>
    <input name="aq_college_others" type="text" id="aq_college_others" maxlength="128" value="{$aq_college_others}" />
    </label>
    <br />
  </p>
  <p> 主修科目
    <input name="aq_major" type="text" id="aq_major" maxlength="128" value="{$aq_major}" />
  </p>
  <p> 高中修讀科目類別
    <label></label>
      <select name="aq_hs_major" id="aq_hs_major">
        <option value="-1" selected="selected">------請選擇------</option>
        
        {html_options values=$hm_ids output=$hm_names selected=$aq_hs_major}
    
      </select>
    （文／理／商／理商／文商） </p>
  <p> 其他專業應可課程
    <label>
    <input type="text" name="aq_professional" id="aq_professional" value="{$aq_professional}" />
      </label>
    (  TOFEL / GCE / LCC / ACCA / ORACLE / MCSE) </p>
  <p> 香港中學會考分數
    <label>
    <input name="aq_hkcee_mark" type="text" id="aq_hkcee_mark" maxlength="16" value="{$aq_hkcee_mark}" />
      </label>
  </p>
  <p> 補習年資
    <input name="aq_tutor_year" type="text" id="aq_tutor_year" maxlength="16" value="{$aq_tutor_year}" />
      <br />
      <br />
  </p>
  <p><strong>公開考試成績</strong>*</p>
  <p>
    <label>
      <textarea name="pe_result_detail" id="pe_result_detail" cols="60" rows="5">{$pe_result_detail}</textarea>
    </label>
    <br />
    <br />
    請詳述所有公開考試成績, 例如:<br />
    <br />
    <label>
      <textarea name="textarea4" id="textarea4" cols="60" rows="5">中學會考 
------------ 
中國語文 C, 英國語文 A, 數學 B, 物理 B, 生物 C, 化學 B, 附加數學 A, 電腦 B

高級程度會考
------------ 
中國語文 C, 英語運用 B, 通識教育 B, 純粹數學 B, 物理 A, 化學 C</textarea>
    </label>
  </p>
  <p>&nbsp;</p>
  <p> <strong>其他能操並可教授語言</strong><br />
      <br />
    {foreach from=$language_names key=index item=v} <strong>
    <input name="cb_language_{$language_ids[$index]}" type="checkbox" id="cb_language_{$language_ids[$index]}" value="{$language_ids[$index]}" {if $languages_selected[$index] == 1}checked="checked"{/if} />
      </strong>{$v}<br />
    {/foreach} </p>
  <p>&nbsp;</p>
  <p><strong>音樂<strong>技能</strong> </strong><br />
      <br />
    可教授之樂器<br />
    <br />
    {foreach from=$instrument_names key=index item=v} <strong>
      <input name="cb_instrument_{$instrument_ids[$index]}" type="checkbox" id="cb_instrument_{$instrument_ids[$index]}" value="{$instrument_ids[$index]}" {if $instruments_selected[$index] == 1}checked="checked"{/if} />
      </strong>{$v}<br />
  {/foreach}<strong><br />
  </strong><br />
    <br />
  </p>
  <p>
    <label>
    <input type="button" name="submit_button" id="submit_button" value="Approve" />
    </label>
    <br />
  </p>
</form>
<p>&nbsp; </p>
</body>
</html>
