<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Browse tutors</title>
</head>

<body>
<p><strong>Registered tutors</strong></p>
<form id="form1" name="form1" method="post" action="">
  地區：
  <label>
  <select name="sub_region" id="sub_region">
      <option value="-1">------請選擇------</option>
    <option value="region1" {if $region == 1}selected="selected"{/if}>------新界區------</option>
      {html_options values=$nt_ids output=$nt_names selected=$sub_region}
      <option value="region2" {if $region == 2}selected="selected"{/if}>------九龍區------</option>
      {html_options values=$kn_ids output=$kn_names selected=$sub_region}
      <option value="region3" {if $region == 3}selected="selected"{/if}>------港島區------</option>
      {html_options values=$hki_ids output=$hki_names selected=$sub_region}
      <option value="region100" {if $region == 100}selected="selected"{/if}>------其他------</option>
    </select>
    </label>
  性別：
  <label>
  <select name="gender" id="gender">
    <option value="-1">---</option>
    <option value="1" {if $gender == 1}selected="selected"{/if}>男</option>
    <option value="2" {if $gender == 2}selected="selected"{/if}>女</option>
  </select>
  </label>
  最高教育程度：
  <select name="aq" id="aq">
  <option value="-1">------請選擇------</option>
      {html_options values=$qf_ids output=$qf_names selected=$aq}
    </select>
  高中修讀科目類別 ：
  <select name="hs_major" id="hs_major">
  <option value="-1">------請選擇------</option>
        {html_options values=$hm_ids output=$hm_names selected=$hs_major}
    </select>
就讀院校：
  <select name="college" id="college">
  <option value="-1">------請選擇------</option>
      {html_options values=$college_ids output=$college_names selected=$college}
    </select>
  <label>服務對象：
  <select name="st" id="st">
    <option value="-1">------請選擇------</option>    
      {html_options values=$st_ids output=$st_names selected=$st}    
  </select>
  <input type="submit" name="Submit" id="Submit" value="Filter" />
  </label>
</form>
<p><br />
  <a href="index.php">Back</a></p>
<p><br />
  {foreach from=$tutors key=index item=v}
</p>
<p>{$v.email}, {$v.pi_gender}, {$v.aq_el}, {$v.aq_college} --- <a href="tutor_detail.php?id={$v.id}" target="_blank">details</a> </p>
<p>{/foreach}
  <br />
</p>
<p><a href="index.php">Back</a></p>
</body>
</html>
