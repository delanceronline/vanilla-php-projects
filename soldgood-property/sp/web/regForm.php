<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<? include ("meta.php") ?>
</head>

<body>
<!-- Wrapper -->
<div class="wrapper">
<? include ("header.php") ?>

<!-- ********************************************************* main content start  *************************************-->
<div class="content">


<!-- Reigistration Form -->
<div id="regForm">
<table border="0" cellpadding="7" cellspacing="0">
            <tr>
              <td align="left">登記成為本網站會員，可免費享用各項網站功能，買樓賣樓，盡享方便!</td>
            </tr>
            <tr>
              <td align="left" bgcolor="#00CCFF"><b>個人資料</b></td>
            </tr>
            <tr>
              <td align="right"><table width="100%" border="0" cellspacing="0" cellpadding="3">
                <tr>
                  <td align="right">放盤人身份</td>
                  <td colspan="2" align="left"><table width="100%" height="25" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><input name="fmRole" type="radio" id="fmRole" value="0" checked="checked" /></td>
                      <td>個人業主</td>
                      <td><input name="fmRole" type="radio" id="fmRole" value="1" /></td>
                      <td>地產代理</td>
                      <td>&nbsp;</td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td align="right"><span class="red">**</span></span>&nbsp;名稱</td>
                  <td align="left"><label>
                    <input name="fmFirstName" type="text"/>
                  </label></td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="right"><span class="red">**</span>&nbsp;</span>手提電話</td>
                  <td colspan="2" align="left"><label>
                    <input name="fmContact" type="text" maxlength="8" />
                    <span class="green">&#8225;</span>&nbsp;&nbsp;<span class="red">(請輸入正確手提電話以短訊確認會員身份)</span></label></td>
                </tr>
                <tr>
                  <td align="right"><span class="red">**</span>&nbsp;</span>電郵</td>
                  <td colspan="2" align="left"><label>
                    <input name="fmEmail2" type="text"/>
                    <span class="green">&#8225;</span>&nbsp;&nbsp; </span></label>
                    <span class="red">(請輸入正確電郵以確認會員身份)</span></span></td>
                </tr>
                <tr>
                  <td align="right">顯示相片</td>
                  <td align="left"><input name="fmImage" type="file"/></td>
                  <td>&nbsp;</td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td align="left" bgcolor="#00CCFF"><b>設定會員名稱及密碼</b></td>
            </tr>
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="3">
                <tr>
                  <td align="right"><span class="red">**</span>&nbsp;</span>會員登入名稱</td>
                  <td colspan="2" align="left"><input name="fmLogin" type="text"/>
                    <span class="green">&#8225;</span>&nbsp;&nbsp; </span><span class="red">(英文字母 / 數字 / 底線, 如: john88, john_88)</span></span></td>
                </tr>
                <tr>
                  <td align="right"><span class="red">**</span></span>&nbsp;密碼</td>
                  <td align="left"><label>
                    <input name="fmPwd" type="password"/>
                  </label></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td align="right"><span class="red">**</span></span>&nbsp;確定密碼</td>
                  <td align="left"><label>
                    <input name="fmConfirmPwd" type="password"/>
                  </label></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td align="right"><span class="red">**</span></span>&nbsp;驗証字符</td>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td align="left"><input name="security_code" type="text" size="10" /></td>
                      <td align="left"><img src="function/CaptchaSecurityImages.php?width=120&amp;height=40&amp;characters=6" /></td>
                    </tr>
                  </table></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><table border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><label>
                        <input name="submit" type="submit" id="submit" value="提交" />
                      </label></td>
                      <td>&nbsp;</td>
                      <td><label>
                        <input name="button2" type="reset" id="button2" value="重新填寫" />
                      </label></td>
                    </tr>
                  </table>
                    <label></label></td>
                  <td>&nbsp;</td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td align="left" class="successText"><table width="100%" border="0" cellspacing="0" cellpadding="2">
                <tr>
                  <td align="right"><span class="red">**</span></td>
                  <td align="left" class="red">必須填寫</td>
                </tr>
                <tr>
                  <td align="right" class="green">&#8225;</td>
                  <td align="left" class="green">一經登記, 便不能更改</td>
                </tr>
              </table></td>
            </tr>
          </table>
</div>
<!-- Reigistration Form end -->

</div>

<!-- ********************************************************* main content end  *************************************-->


<!-- footer -->
<? include("footer.php") ?>
<!-- footer end -->

</div>
<!-- wrapper end -->
</body>
</html>