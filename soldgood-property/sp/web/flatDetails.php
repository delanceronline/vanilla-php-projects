<?php
include_once ('./inc/config.inc.php');
include_once ('./lib/MySQLConnector.php');
$connector = new TMySQLConnector($global_db_location, $global_db_name, $global_db_login_id, $global_db_password);

$language = 0;
$language_type = 'Chinese (Hong Kong S.A.R.)';
if(isset($_REQUEST['language']))
	$language = $_REQUEST['language'];
if($language == 1)
	$language_type = 'English';

$id = 0;
if(isset($_REQUEST['id']) && is_numeric($_REQUEST['id']))
	$id = $_REQUEST['id'];

if($connector && $id > 0)
{
	$connector->Execute("SET NAMES 'utf8';");
	
	$property = array();
	$connector->GetOneRow($property, "WHERE id = $id", "supplies");
	
	$user = array();
	$connector->GetOneRow($user, "WHERE id = {$property['user_id']}", "users");
	
	$district = array();
	$connector->GetOneRow($district, "WHERE id = {$property['district_id']} AND language_type='$language_type'", 'districts');
	
	$tn = "images/tnt.jpg";
	if($property['icon'] != "")
		$tn = "./../files/".$property['icon'];
	
	$estate = '---';
	if($property['estate']  != '')
		$estate = $property['estate'];
	
	$address = '---';
	if($property['address']  != '')
		$address = $property['address'];

	$area = '---';
	if($property['area']  != '')
		$area = $property['area'];
	
	$years = '***';
	if($property['years']  != '')
		$years = $property['years'];			
		
	$sf = '---';
	if($property['sf']  != '')
		$sf = $property['sf'];		
		
	$feature = '---';
	if($property['feature']  != '')
		$feature = $property['feature'];
	
	$remark = '---';
	if($property['remark']  != '')
		$remark = $property['remark'];
	
	$rc = '***';
	if($property['rc'] != '')
		$rc = $property['rc'];
	
	$hc = '***';
	if($property['hc'] != '')
		$hc = $property['hc'];	
		
	$price = $property['unit_price'];
	if($property['unit_price'] >= 10000)
		$price = round($property['unit_price'] * 0.00001, 2);
		
	$photos = array();
	for($i = 1; $i < 9; $i++)
	{
		if($property['pic'.$i] != '')
			$photos[] = $property['pic'.$i];
	}
?>
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


<!-- Flat Details -->
<div id="flatDetails">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td height="30" align="left" bgcolor="#00CCFF"><b class="leftpad12px">放盤人資料</b></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellpadding="5" cellspacing="0">
              <tr>
                <td class="bottomborder"><span class="blue">放盤人</span></td>
                <td class="bottomborder"><?php echo $user['name']; ?></td>
                <td rowspan="4" align="center"><img src="<?php echo $tn; ?>" width="160" height="120" /></td>
              </tr>
              <tr>
                <td class="bottomborder"><span class="blue">聯絡電話</span></td>
                <td class="bottomborder"><?php echo $user['cn']; ?></td>
              </tr>
              <tr>
                <td class="bottomborder"><span class="blue">電郵</span></td>
                <td class="bottomborder"><?php echo $user['email']; ?></td>
              </tr>
              <tr>
                <td height="25" colspan="2" align="center"><a href="#">查看此放盤人其他放盤</a></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="30" align="left" bgcolor="#00CCFF"><b class="leftpad12px">樓盤資料</b></td>
          </tr>
          <tr>
            <td valign="top"><table width="100%" border="0" cellpadding="5" cellspacing="0">
              <tr>
                <td class="bottomborder" width="150px"><span class="blue leftpad12px">樓盤編號</span></td>
                <td class="bottomborder">ref : <?php echo $property['id']; ?></td>
              </tr>
              <tr>
                <td class="bottomborder"><span class="blue leftpad12px">樓盤種類</span></td>
                <td class="bottomborder"><?php if($property['supply_mode_id'] == 1){ ?>租<?php }else{?>售<?php } ?></td>
              </tr>
              <tr>
                <td class="bottomborder"><span class="blue leftpad12px">樓盤名稱</span></td>
                <td class="bottomborder"><?php echo $estate; ?></td>
              </tr>
              <tr>
                <td class="bottomborder"><span class="blue leftpad12px">地區</span></td>
                <td class="bottomborder"><?php echo $district['value']; ?></td>
              </tr>
              <tr>
                <td class="bottomborder"><span class="blue leftpad12px">地址</span></td>
                <td class="bottomborder"><?php echo $address; ?></td>
              </tr>
              <tr>
                <td class="bottomborder"><span class="blue leftpad12px">價錢</span></td>
                <td class="bottomborder"><b><span class="orange"><?php echo $price; ?><?php if($property['unit_price'] >= 10000){ ?>萬<?php }else{?>元<?php } ?></span></b></td>
              </tr>
              <tr>
                <td class="bottomborder"><span class="blue leftpad12px">面積</span></td>
                <td class="bottomborder"><b><span class="orange"><?php echo $area; ?>呎</span></b></td>
              </tr>
              <tr>
                <td bgcolor="#ECFFFF" class="bottomborder"><span class="blue leftpad12px">層數</span></td>
                <td bgcolor="#ECFFFF" class="bottomborder"><?php if($property['height_id'] == 1){ ?>高層<?php }else if($property['height_id'] == 2){ ?>中層<?php }else if($property['height_id'] == 3){ ?>低層<?php } ?></td>
              </tr>
              <tr>
                <td bgcolor="#ECFFFF" class="bottomborder"><span class="blue leftpad12px">間隔</span></td>
                <td bgcolor="#ECFFFF" class="bottomborder"><?php echo $rc; ?>房<?php echo $hc; ?>廳</td>
              </tr>
              <tr>
                <td bgcolor="#ECFFFF" class="bottomborder"><span class="blue leftpad12px">樓齡</span></td>
                <td bgcolor="#ECFFFF" class="bottomborder"><?php echo $years; ?>年</td>
              </tr>
              <tr>
                <td bgcolor="#ECFFFF" class="bottomborder"><span class="blue leftpad12px">管理費</span></td>
                <td bgcolor="#ECFFFF" class="bottomborder"><?php echo $sf; ?>元</td>
              </tr>
              <tr>
                <td bgcolor="#ECFFFF" class="bottomborder"><span class="blue leftpad12px">特式</span></td>
                <td colspan="3" bgcolor="#ECFFFF" class="bottomborder"><?php echo $feature; ?></td>
              </tr>
              <tr>
                <td bgcolor="#ECFFFF" class="bottomborder"><span class="blue leftpad12px">備註</span></td>
                <td colspan="3" bgcolor="#ECFFFF" class="bottomborder"><?php echo $remark; ?></td>
              </tr>
              <tr>
                <td bgcolor="#ECFFFF" class="bottomborder"><span class="blue leftpad12px">最後更新</span></td>
                <td bgcolor="#ECFFFF" class="bottomborder"><?php echo $property['modified_date']; ?></td>
              </tr>
            </table></td>
          </tr>
        </table>
</div>
<!-- Flat Details end -->

<!-- photo gallery -->
<div id="gallery">
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="right">
 	<tr>
      <td height="30" align="left" bgcolor="#00CCFF"><b class="leftpad12px">樓盤相片</b></td>
    </tr>
</table>
    <ul>
    <?php 
		foreach($photos as $photo)
		{
			$path = "./../files/".$photo;			
	?>
        <li>
            <a href="<?php echo $path; ?>" title="image01"><img src="<?php echo $path; ?>" width="72" height="72" border="0" alt="#"/></a>
        </li>
	<?php 
		}
	?>
    </ul>
</div>
<!-- photo gallery -->

<!-- google video -->
<div id="gvideo">
<table width="90%" border="0" cellpadding="0" cellspacing="0" align="right">
 	<tr>
      <td height="30" align="left" bgcolor="#00CCFF"><b class="leftpad12px">樓盤影片</b></td>
    </tr>
    <tr>
      <td>
        <iframe width="425" height="349" src="http://www.youtube.com/embed/-SRHaXbHquc?rel=0?wmode=opaque" frameborder="0" wmode="opaque" allowfullscreen></iframe>
	  </td>
    </tr>
</table>
</div>
<!-- google video -->




<!-- comment form
<div id="usercomment">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
 	<tr>
      <td height="30" align="left" bgcolor="#00CCFF"><b class="leftpad12px">放盤留言</b></td>
    </tr>
      <tr>
        <td align="center" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="detailMsgBorder">
          <tr>
            <td><form method="post" action="#">
              <table width="100%" border="0" cellpadding="3" cellspacing="0">
                <tr>
                  <td align="right" valign="top">你的姓名</td>
                  <td>&nbsp;</td>
                  <td align="left"><input name="fmName" type="text" class="headerFormField" id="fmName" /></td>
                </tr>
                <tr>
                  <td align="right" valign="top">你的電郵</td>
                  <td>&nbsp;</td>
                  <td align="left"><label>
                    <input name="fmEmail" type="text" class="headerFormField" id="fmEmail" />
                  </label></td>
                </tr>
                <tr>
                  <td align="right" valign="top">你的電話</td>
                  <td>&nbsp;</td>
                  <td align="left"><label>
                    <input name="fmPhone" type="text" class="headerFormField" id="fmPhone" />
                  </label></td>
                </tr>
                <tr>
                  <td align="right" valign="top">查詢內容</td>
                  <td>&nbsp;</td>
                  <td align="left"><label>
                    <textarea name="fmContent" cols="45" rows="5" class="headerFormField" id="fmContent"></textarea>
                  </label></td>
                </tr>
                <tr>
                  <td align="right" valign="top">聯絡方式:</td>
                  <td>&nbsp;</td>
                  <td align="left"><table width="50%" border="0" cellpadding="2" cellspacing="0">
                    <tr>
                      <td align="left" valign="top"><input name="fmSendMethod" type="radio" id="radio" value="2" /></td>
                      <td align="left" valign="top">電郵給放盤人</td>
                    </tr>
                    <tr>
                      <td align="left" valign="top"><input name="fmSendMethod" type="radio" id="radio2" value="3" /></td>
                      <td align="left" valign="top">只顯示於留言版上</td>
                    </tr>
                    <tr>
                      <td align="left" valign="top"><input name="fmSendMethod" type="radio" id="fmSendMethod" value="1" checked="checked" /></td>
                      <td align="left" valign="top">以上兩者皆是</td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td align="right" valign="top">&nbsp;</td>
                  <td>&nbsp;</td>
                  <td><table width="100%" height="30" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td align="center"><input name="Submit" type="submit" class="stButton" value="送出" />
                        <input name="fmMessageHouseID" type="hidden" id="fmMessageHouseID" value="#" /></td>
                      <td>&nbsp;</td>
                    </tr>
                  </table></td>
                </tr>
              </table>
            </form></td>
          </tr>
        </table>
		</td>
      </tr>
    </table>
</div>



<div id="usercomment">
<table width="97%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
	 	<tr>
      	<td height="30" align="left" bgcolor="#00CCFF"><b class="leftpad12px">留言板</b></td>
    	</tr>
        </table></td>
      </tr>
      <tr>
        <td align="center"><table width="90%" height="5" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td></td>
          </tr>
        </table>
          <table width="100%" height="30" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td align="center"><span>&nbsp;&nbsp;&nbsp;&nbsp;未有留言訊息</span></td>
            </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="250" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
		 	<tr>
    	  	<td height="30" align="left" bgcolor="#00CCFF"><b class="leftpad12px">訪客</b></td>
    		</tr>
                <tr>
                  <td height="149" valign="middle"><table width="100%" height="149" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td colspan="2" align="center" background="images/headpicbg.gif"><img src="images/headpicnonmem.gif" alt="" width="110" height="101" /></td>
                    </tr>
                    <tr>
                      <td height="25" align="center" class="bottomborder"><span class="blue">姓名</span></td>
                      <td align="left" class="bottomborder">Horry Chan</td>
                    </tr>
                    <tr>
                      <td height="25" align="center" class="bottomborder"><span class="blue">電郵</span></td>
                      <td align="left" class="bottomborder">horry@gmail.com</td>
                    </tr>
                    <tr>
                      <td height="25" align="center" class="bottomborder"><span class="blue">電話</span></td>
                      <td align="left" class="bottomborder">31068033</td>
                    </tr>
                  </table></td>
                </tr>
              </table></td>
              <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
            <td>&nbsp;</td>
    	  	<td height="30" align="left" bgcolor="#C6FFFF"><b class="leftpad12px">日期: 22-07-2011 21:00</b></td>
    		</tr>
                <tr>
                  <td>&nbsp;</td>
                  <td align="left"><table width="90%" height="140" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td align="left"><span>內容</span></td>
                    </tr>
                  </table></td>
                </tr>
              </table></td>
            </tr>
          </table>
          <table width="99%" border="0" cellpadding="0" cellspacing="0" height="7">
            <tr>
              <td>&nbsp;</td>
            </tr>
          </table>
          <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="250" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
		 	<tr>
    	  	<td height="30" align="left" bgcolor="#00CCFF"><b class="leftpad12px">放盤人</b></td>
    		</tr>
                <tr>
                  <td height="149" valign="middle"><table width="100%" height="149" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td colspan="2" align="center" background="images/headpicbg.gif"><img src="images/headpic.gif" alt="" /></td>
                    </tr>
                    <tr>
                      <td height="25" align="center" class="bottomborder"><span class="blue">姓名</span></td>

                      <td align="left" class="bottomborder">Terence Lee</td>
                    </tr>
                    <tr>
                      <td height="25" align="center" bgcolor="#FFFFFF" class="bottomborder"><span class="blue">電郵</span></td>
                      <td align="left" bgcolor="#FFFFFF" class="bottomborder">terence@antinow.com</td>
                    </tr>
                    <tr>
                      <td height="25" align="center" class="bottomborder"><span class="blue">電話</span></td>
                      <td align="left" class="bottomborder">31882694</td>
                    </tr>
                  </table></td>
                </tr>
              </table></td>
              <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
		 	<tr>
            <td>&nbsp;</td>
    	  	<td height="30" align="left" bgcolor="#C6FFFF"><b class="leftpad12px">日期: 22-07-2011 21:00</b></td>
    		</tr>
                <tr>
                  <td>&nbsp;</td>
                  <td align="left"><table width="90%" height="140" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td align="left">內容</td>
                    </tr>
                  </table></td>
                </tr>
              </table></td>
            </tr>
          </table>
          <table width="99%" border="0" cellpadding="0" cellspacing="0" height="7">
            <tr>
              <td><img src="images/spacer2.gif" width="100%" height="1" /></td>
            </tr>
          </table></td>
      </tr>
    </table>
</div>-->


</div>

<!-- ********************************************************* main content end  *************************************-->


<!-- footer -->
<? include("footer.php") ?>
<!-- footer end -->

</div>
<!-- wrapper end -->
</body>
</html>
<?php
}
?>
