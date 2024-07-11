<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>搵補習.hk --- 個案詳情</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="./ga.js"></script>
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
                      <td>{include file='logo_and_menu.inc.tpl'}</td>
                    </tr>
                    <tr>
                      <td height="100" valign="middle" bgcolor="#336633"><img src="images/clients.jpg" alt="" width="525" height="90" /></td>
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
                                <td><strong class="brown_bold_text">{$client.sub_region}</strong></td>
                                <td><span class="brown_text">補習項目：</span></td>
                                <td><strong class="brown_bold_text">{if $client.service != ''}{$client.service}{else}N/A{/if}</strong></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td><span class="brown_text">屋苑 ／地點：</span></td>
                                <td><strong class="brown_bold_text">{if $client.estate != ''}{$client.estate}{else}N/A{/if}</strong></td>
                                <td><span class="brown_text">專補科目／項目補充：</span></td>
                                <td><strong class="brown_bold_text">{if $client.service_detail != ''}{$client.service_detail}{else}N/A{/if}</strong></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td><span class="brown_text">每星期堂數：</span></td>
                                <td class="brown_bold_text">{if $client.lesson_count != ''}{$client.lesson_count}堂{else}N/A{/if}</td>
                                <td><span class="brown_text">每堂時數：</span></td>
                                <td class="brown_bold_text">{if $client.lesson_length != ''}{$client.lesson_length}小時{else}N/A{/if}</td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td><span class="brown_text">導師最低學歷要求：</span></td>
                                <td><strong class="brown_bold_text">{if $client.mq != ''}{$client.mq}{else}N/A{/if}</strong></td>
                                <td><span class="brown_text">每小時學費：</span></td>
                                <td><span class="brown_bold_text">{if $client.rate != '$'}{$client.rate}{else}N/A{/if}</span></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td><span class="brown_text">學歷要求補充：</span></td>
                                <td><span class="brown_bold_text">{if $client.mq_detail != ''}{$client.mq_detail}{else}N/A{/if}</span></td>
                                <td><span class="brown_text">學生姓別：</span></td>
                                <td><span class="brown_bold_text">{if $client.student_gender != ''}{$client.student_gender}{else}N/A{/if}</span></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td><span class="brown_text">導師姓別要求：</span></td>
                                <td><span class="brown_bold_text">{if $client.tutor_gender != ''}{$client.tutor_gender}{else}N/A{/if}</span></td>
                                <td><span class="brown_text">學生年齡：</span></td>
                                <td><span class="brown_bold_text">{if $client.student_age != ''}{$client.student_age}歲{else}N/A{/if}</span></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td><span class="brown_text">特別要求：</span></td>
                                <td><span class="brown_bold_text">{if $client.special_request != ''}{$client.special_request}{else}N/A{/if}</span></td>
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
                                {if $client.is_all_time == 0}
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
                                    {if $client.timeslots[0] == 1}<span class="darkgreen_bold_text">可以</span>{else}<span class="brown_bold_text">---</span>{/if}
                                    </td>
                                    <td align="center">
                                    {if $client.timeslots[3] == 1}<span class="darkgreen_bold_text">可以</span>{else}<span class="brown_bold_text">---</span>{/if}
                                    </td>
                                    <td align="center">
                                    {if $client.timeslots[6] == 1}<span class="darkgreen_bold_text">可以</span>{else}<span class="brown_bold_text">---</span>{/if}
                                    </td>
                                    <td align="center">
                                    {if $client.timeslots[9] == 1}<span class="darkgreen_bold_text">可以</span>{else}<span class="brown_bold_text">---</span>{/if}
                                    </td>
                                    <td align="center">
                                    {if $client.timeslots[12] == 1}<span class="darkgreen_bold_text">可以</span>{else}<span class="brown_bold_text">---</span>{/if}
                                    </td>
                                    <td align="center">
                                    {if $client.timeslots[15] == 1}<span class="darkgreen_bold_text">可以</span>{else}<span class="brown_bold_text">---</span>{/if}
                                    </td>
                                    <td align="center">
                                    {if $client.timeslots[18] == 1}<span class="darkgreen_bold_text">可以</span>{else}<span class="brown_bold_text">---</span>{/if}
                                    </td>
                                    </tr>
                                    <tr>
                                    <td height="40" valign="middle" class="brown_bold_text">下午 (2-7:00pm)</td>
                                    <td align="center">
                                    {if $client.timeslots[1] == 1}<span class="darkgreen_bold_text">可以</span>{else}<span class="brown_bold_text">---</span>{/if}
                                    </td>
                                    <td align="center">
                                    {if $client.timeslots[4] == 1}<span class="darkgreen_bold_text">可以</span>{else}<span class="brown_bold_text">---</span>{/if}
                                    </td>
                                    <td align="center">
                                    {if $client.timeslots[7] == 1}<span class="darkgreen_bold_text">可以</span>{else}<span class="brown_bold_text">---</span>{/if}
                                    </td>
                                    <td align="center">
                                    {if $client.timeslots[10] == 1}<span class="darkgreen_bold_text">可以</span>{else}<span class="brown_bold_text">---</span>{/if}
                                    </td>
                                    <td align="center">
                                    {if $client.timeslots[13] == 1}<span class="darkgreen_bold_text">可以</span>{else}<span class="brown_bold_text">---</span>{/if}
                                    </td>
                                    <td align="center">
                                    {if $client.timeslots[16] == 1}<span class="darkgreen_bold_text">可以</span>{else}<span class="brown_bold_text">---</span>{/if}
                                    </td>
                                    <td align="center">
                                    {if $client.timeslots[19] == 1}<span class="darkgreen_bold_text">可以</span>{else}<span class="brown_bold_text">---</span>{/if}
                                    </td>
                                    </tr>
                                    <tr>
                                    <td height="40" valign="middle" class="brown_bold_text">晚上 (7-10:00pm)</td>
                                    <td align="center">
                                    {if $client.timeslots[2] == 1}<span class="darkgreen_bold_text">可以</span>{else}<span class="brown_bold_text">---</span>{/if}
                                    </td>
                                    <td align="center">
                                    {if $client.timeslots[5] == 1}<span class="darkgreen_bold_text">可以</span>{else}<span class="brown_bold_text">---</span>{/if}
                                    </td>
                                    <td align="center">
                                    {if $client.timeslots[8] == 1}<span class="darkgreen_bold_text">可以</span>{else}<span class="brown_bold_text">---</span>{/if}
                                    </td>
                                    <td align="center">
                                    {if $client.timeslots[11] == 1}<span class="darkgreen_bold_text">可以</span>{else}<span class="brown_bold_text">---</span>{/if}
                                    </td>
                                    <td align="center">
                                    {if $client.timeslots[14] == 1}<span class="darkgreen_bold_text">可以</span>{else}<span class="brown_bold_text">---</span>{/if}
                                    </td>
                                    <td align="center">
                                    {if $client.timeslots[17] == 1}<span class="darkgreen_bold_text">可以</span>{else}<span class="brown_bold_text">---</span>{/if}
                                    </td>
                                    <td align="center">
                                    {if $client.timeslots[20] == 1}<span class="darkgreen_bold_text">可以</span>{else}<span class="brown_bold_text">---</span>{/if}
                                    </td>
                                    </tr>                                    
                                  </tbody>
                                </table>  
                                {else}
								<span class="brown_bold_text">任何時間</span><br /><br />
                                {/if}
                                                              
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
