<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit client</title>
<link type="text/css" href="./../lib/jquery/css/smoothness/jquery-ui-1.8.custom.css" rel="stylesheet" />
<script src="./../lib/jquery/js/jquery-1.4.2.min.js" type="text/javascript"></script>
<script src="./../lib/jquery/js/jquery-ui-1.8.custom.min.js" type="text/javascript"></script>
</head>

<body>
<form id="find_tutor_form" name="find_tutor_form" method="post" action="edit_client.php">
	<input type="hidden" name="action" id="action" value="1" />
    <input type="hidden" name="id" id="id" value="{$client.id}" />
  <strong>找尋導師</strong><br />
  <br />
  家長或學生可以透過我們找尋合適的導師；我們絕不會向家長／學生收取任何形式的費用。請提供以下資料，我們會用心並有效地處理您的配對！<br />
  <br />
  <br />
  聯絡人姓名
  <label>
  <input name="contact_name" type="text" id="contact_name" maxlength="64" value="{$client.contact_name}" />
    * </label>
  <p> 聯絡電話
    <label>
      <input name="contact_no" type="text" id="contact_no" maxlength="64" value="{$client.contact_no}" />
      </label>
    *<br />
    <br />
    聯絡時間
    <input name="contact_time" type="text" id="contact_time" maxlength="128" value="{$client.contact_time}" />
    (如需要)</p>
  <p> 學生年齡
    <label>
      <input name="student_age" type="text" id="student_age" maxlength="16" value="{$client.student_age}" />
      </label>
  </p>
  <p> 學生姓別
    <select name="student_gender" id="student_gender">
        <option value="-1">------請選擇------</option>
        <option value="1" {if $client.student_gender == 1}selected="selected"{/if}>男</option>
        <option value="2" {if $client.student_gender == 2}selected="selected"{/if}>女</option>
      </select>
  </p>
  <p> 授課地區
    <select name="sub_region" id="sub_region">
        <option value="-1">------請選擇------</option>
        <option value="-1">------新界區------</option>
      
      {html_options values=$nt_ids output=$nt_names selected=$client.sub_region}
      
      <option value="-1">------九龍區------</option>
      
      {html_options values=$kn_ids output=$kn_names selected=$client.sub_region}
      
      <option value="-1">------港島區------</option>
      
      {html_options values=$hki_ids output=$hki_names selected=$client.sub_region}
      
      <option value="0">------其他------</option>
      </select>
    *</p>
  <p> 屋苑 ／地點
    <input name="estate" type="text" id="estate" maxlength="256" value="{$client.estate}" />
  </p>
  <p>授課時間*<br />
  </p>
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
        <input name="cb_time_slot_1" type="checkbox" id="cb_time_slot_1" value="1" {if $timeslots[0] == 1}checked="checked"{/if} />
      </strong></td>
      <td><strong>
        <input name="cb_time_slot_5" type="checkbox" id="cb_time_slot_5" value="5" {if $timeslots[3] == 1}checked="checked"{/if} />
      </strong></td>
      <td><strong>
        <input name="cb_time_slot_9" type="checkbox" id="cb_time_slot_9" value="9" {if $timeslots[6] == 1}checked="checked"{/if} />
      </strong></td>
      <td><strong>
        <input name="cb_time_slot_13" type="checkbox" id="cb_time_slot_13" value="13" {if $timeslots[9] == 1}checked="checked"{/if} />
      </strong></td>
      <td><strong>
        <input name="cb_time_slot_17" type="checkbox" id="cb_time_slot_17" value="17" {if $timeslots[12] == 1}checked="checked"{/if} />
      </strong></td>
      <td><strong>
        <input name="cb_time_slot_21" type="checkbox" id="cb_time_slot_21" value="21" {if $timeslots[15] == 1}checked="checked"{/if} />
      </strong></td>
      <td><strong>
        <input name="cb_time_slot_25" type="checkbox" id="cb_time_slot_25" value="25" {if $timeslots[18] == 1}checked="checked"{/if} />
      </strong></td>
    </tr>
    <tr>
      <td>下午 (2-7:00pm)</td>
      <td><strong>
        <input name="cb_time_slot_2" type="checkbox" id="cb_time_slot_2" value="2" {if $timeslots[1] == 1}checked="checked"{/if} />
      </strong></td>
      <td><strong>
        <input name="cb_time_slot_6" type="checkbox" id="cb_time_slot_6" value="6" {if $timeslots[4] == 1}checked="checked"{/if} />
      </strong></td>
      <td><strong>
        <input name="cb_time_slot_10" type="checkbox" id="cb_time_slot_10" value="10" {if $timeslots[7] == 1}checked="checked"{/if} />
      </strong></td>
      <td><strong>
        <input name="cb_time_slot_14" type="checkbox" id="cb_time_slot_14" value="14" {if $timeslots[10] == 1}checked="checked"{/if} />
      </strong></td>
      <td><strong>
        <input name="cb_time_slot_18" type="checkbox" id="cb_time_slot_18" value="18" {if $timeslots[13] == 1}checked="checked"{/if} />
      </strong></td>
      <td><strong>
        <input name="cb_time_slot_22" type="checkbox" id="cb_time_slot_22" value="22" {if $timeslots[16] == 1}checked="checked"{/if} />
      </strong></td>
      <td><strong>
        <input name="cb_time_slot_26" type="checkbox" id="cb_time_slot_26" value="26" {if $timeslots[19] == 1}checked="checked"{/if} />
      </strong></td>
    </tr>
    <tr>
      <td>晚上 (7-10:00pm)</td>
      <td><strong>
        <input name="cb_time_slot_3" type="checkbox" id="cb_time_slot_3" value="3" {if $timeslots[2] == 1}checked="checked"{/if} />
      </strong></td>
      <td><strong>
        <input name="cb_time_slot_7" type="checkbox" id="cb_time_slot_7" value="7" {if $timeslots[5] == 1}checked="checked"{/if} />
      </strong></td>
      <td><strong>
        <input name="cb_time_slot_11" type="checkbox" id="cb_time_slot_11" value="11" {if $timeslots[8] == 1}checked="checked"{/if} />
      </strong></td>
      <td><strong>
        <input name="cb_time_slot_15" type="checkbox" id="cb_time_slot_15" value="15" {if $timeslots[11] == 1}checked="checked"{/if} />
      </strong></td>
      <td><strong>
        <input name="cb_time_slot_19" type="checkbox" id="cb_time_slot_19" value="19" {if $timeslots[14] == 1}checked="checked"{/if} />
      </strong></td>
      <td><strong>
        <input name="cb_time_slot_23" type="checkbox" id="cb_time_slot_23" value="23" {if $timeslots[17] == 1}checked="checked"{/if} />
      </strong></td>
      <td><strong>
        <input name="cb_time_slot_27" type="checkbox" id="cb_time_slot_27" value="27" {if $timeslots[20] == 1}checked="checked"{/if} />
      </strong></td>
    </tr>
  </table>
  <br />
  <strong>
  <input name="cb_time_all" type="checkbox" id="cb_time_all" value="0" {if $is_all_time == 1}checked="checked"{/if} />
  </strong>任何時間<br />
  <br />
  <p> 補習項目
    <label>
      <select name="service" id="service">
        <option value="-1">------請選擇------</option>
        
    {html_options values=$service_ids output=$service_names selected=$client.service}
  
      </select>
      </label>
    *</p>
  <p>專補科目／項目補充
    <label>(如適用)<br />
      <br />
      <textarea name="service_detail" id="service_detail" cols="60" rows="5">{$client.service_detail}</textarea>
      </label>
      <br />
  </p>
  <p>每星期堂數
    <label>
      <input name="lesson_count" type="text" id="lesson_count" maxlength="64" value="{$client.lesson_count}" />
      </label>
  </p>
  <p>每堂時數
    <label>
      <input name="lesson_length" type="text" id="lesson_length" maxlength="64" value="{$client.lesson_length}" />
      </label>
    (小時或分鐘)</p>
  <p>每小時學費
    <label> $
      <input name="hour_rate" type="text" id="hour_rate" maxlength="64" value="{$client.hour_rate}" />
      </label>
    *</p>
  <p> 導師最低學歷要求
    <label>
      <select name="mq" id="mq">
        <option value="-1">------請選擇------</option>
        
      {html_options values=$qf_ids output=$qf_names selected=$client.mq}
  
      </select>
      </label>
  </p>
  <p>學歷要求補充</p>
  <p>
    <textarea name="mq_detail" id="mq_detail" cols="60" rows="5">{$client.mq_detail}</textarea>
  </p>
  <p> 導師姓別要求
    <label>
      <select name="tutor_gender" id="tutor_gender">
        <option value="-1">------請選擇------</option>
        <option value="0" {if $client.tutor_gender == 0}selected="selected"{/if}>男女均可</option>
        <option value="1" {if $client.tutor_gender == 1}selected="selected"{/if}>男</option>
        <option value="2" {if $client.tutor_gender == 2}selected="selected"{/if}>女</option>
      </select>
      </label>
  </p>
  <p>特別要求<br />
      <br />
      <label>
      <textarea name="special_request" id="special_request" cols="60" rows="5">{$client.special_request}</textarea>
      </label>
  </p>
  <p>如何得悉本網站？
    <label>
      <select name="know_way" id="know_way">
        <option value="-1">------請選擇------</option>
        <option value="1" {if $client.know_way == 1}selected="selected"{/if}>朋友介紹</option>
        <option value="2" {if $client.know_way == 2}selected="selected"{/if}>我是現有用戶</option>
        <option value="3" {if $client.know_way == 3}selected="selected"{/if}>網上廣告</option>
        <option value="4" {if $client.know_way == 4}selected="selected"{/if}>行人廣告</option>
        <option value="5" {if $client.know_way == 5}selected="selected"{/if}>Facebook.com</option>
        <option value="0" {if $client.know_way == 0}selected="selected"{/if}>其他</option>
      </select>
      </label>
  </p>
  <p>
    <label>
      <input type="submit" name="submit_button" id="submit_button" value="更新" />
    </label>
  </p>
</form>
</body>
</html>
