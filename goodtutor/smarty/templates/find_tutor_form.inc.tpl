<form action="find_tutor.php" name="ft_form" id="ft_form">
<table width="305" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="images/bg3_04.jpg" width="305" height="85" alt="" /></td>
  </tr>
  <tr>
    <td height="27"><table width="305" border="0" cellspacing="0" cellpadding="0" background="images/bg3_07.jpg">
        <tr>
          <td width="40" height="27">&nbsp;</td>
          <td width="235" class="hd_brown_text">免費尋找導師</td>
          <td width="30">&nbsp;</td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td height="27"><table width="305" border="0" cellspacing="0" cellpadding="0" background="images/bg3_07.jpg">
        <tr>
          <td width="40" height="27">&nbsp;</td>
          <td width="235">&nbsp;</td>
          <td width="30">&nbsp;</td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td height="27"><table width="305" border="0" cellspacing="0" cellpadding="0" background="images/bg3_07.jpg">
        <tr>
          <td width="40" height="27">&nbsp;</td>
          <td width="235" class="brown_text"> 搵補習.hk提供免費導師介紹服務！ </td>
          <td width="30">&nbsp;</td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td height="27"><table width="305" border="0" cellspacing="0" cellpadding="0" background="images/bg3_07.jpg">
        <tr>
          <td width="40" height="27">&nbsp;</td>
          <td width="235" class="brown_text"> 歡迎家長及學生提供以下資料作</td>
          <td width="30">&nbsp;</td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td height="27"><table width="305" border="0" cellspacing="0" cellpadding="0" background="images/bg3_07.jpg">
        <tr>
          <td width="40" height="27">&nbsp;</td>
          <td width="235"><span class="brown_text">配對之用，   當有合適的導師， </span></td>
          <td width="30">&nbsp;</td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td height="27"><table width="305" border="0" cellspacing="0" cellpadding="0" background="images/bg3_07.jpg">
        <tr>
          <td width="40" height="27">&nbsp;</td>
          <td width="235" class="brown_text"> 我們會馬上跟您聯絡： </td>
          <td width="30">&nbsp;</td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="305" border="0" cellspacing="0" cellpadding="0" background="images/bg3_07.jpg">
        <tr>
          <td width="40" height="27">&nbsp;</td>
          <td width="80">&nbsp;</td>
          <td width="185">&nbsp;</td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="305" border="0" cellspacing="0" cellpadding="0" background="images/bg3_07.jpg">
        <tr>
          <td width="40" height="27">&nbsp;</td>
          <td width="80" class="brown_bold_text"> 聯絡人姓名</td>
          <td width="185"><label>
            <input name="sf_contact_name" type="text" class="brown_text" id="sf_contact_name" maxlength="64" />
          </label></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="305" border="0" cellspacing="0" cellpadding="0" background="images/bg3_07.jpg">
        <tr>
          <td width="40" height="27">&nbsp;</td>
          <td width="80" class="brown_bold_text"> 聯絡電話</td>
          <td width="185"><input name="sf_contact_no" type="text" class="brown_text" id="sf_contact_no" maxlength="64" /></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="305" border="0" cellspacing="0" cellpadding="0" background="images/bg3_07.jpg">
        <tr>
          <td width="40" height="27">&nbsp;</td>
          <td width="80" class="brown_bold_text"> 授課地區</td>
          <td width="185"><label>
            <select name="sf_sub_region" id="sf_sub_region">
              <option value="-1">------請選擇------</option>
              <option value="-1">------新界區------</option>
              
              
              {html_options values=$nt_ids output=$nt_names}
              
              
              <option value="-1">------九龍區------</option>
              
              
              {html_options values=$kn_ids output=$kn_names}
              
              
              <option value="-1">------港島區------</option>
              
              
              {html_options values=$hki_ids output=$hki_names}      
              
              
              <option value="0">------其他------</option>
            </select>
          </label></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="305" border="0" cellspacing="0" cellpadding="0" background="images/bg3_07.jpg">
        <tr>
          <td width="40" height="27">&nbsp;</td>
          <td width="80" class="brown_bold_text"> 補習項目</td>
          <td width="185">
            <select name="sf_service" id="sf_service">
              <option value="-1">------請選擇------</option>
              
            {html_options values=$service_ids output=$service_names}
          
            </select>          
          </td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="305" border="0" cellspacing="0" cellpadding="0" background="images/bg3_07.jpg">
        <tr>
          <td width="40" height="27">&nbsp;</td>
          <td width="160">&nbsp;</td>
          <td width="105"><input name="button" type="image" id="button" value="Submit" src="images/sign_up_button.jpg" /></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td><img src="images/bg3_18.jpg" width="305" height="20" alt="" /></td>
  </tr>
  <tr>
    <td height="10"><img src="images/bg3_20.jpg" width="305" height="10" alt="" /></td>
  </tr>
</table>
</form>