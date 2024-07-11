<?php
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");


include("include/dbcommon.php");

if(!@$_SESSION["UserID"] || @$_SESSION["UserID"]=="<Guest>")
{ 
	$_SESSION["MyURL"]=$_SERVER["SCRIPT_NAME"]."?".$_SERVER["QUERY_STRING"];
	header("Location: login.php?message=expired"); 
	return;
}

$message="";
$go=1;

include('include/xtempl.php');
include('classes/runnerpage.php');
$xt = new Xtempl();

$id = postvalue("id") != "" ? postvalue("id") : 1;
//array of params for classes
$params = array("pageType" => PAGE_CHANGEPASS, "id" =>$id);
$params['xt'] = &$xt;
$params['tName'] = "global";
$params['needSearchClauseObj'] = false;
$pageObject = new RunnerPage($params);


$auditObj = GetAuditObject();

//	Before Process event
if($globalEvents->exists("BeforeProcessChangePwd"))
	$globalEvents->BeforeProcessChangePwd($conn);

if (@$_POST["btnSubmit"] == "Submit")
{	
	$go = postvalue("go")+1;
	$xt->assign("backlink_attrs","href=\"javascript:history.go(-".$go.")\"");
	$opass = postvalue("opass");
	$newpass = postvalue("newpass");
	$newpassraw=$newpass;
	
	$value = @$_SESSION["UserID"];
	if(NeedQuotes($cUserNameFieldType))
		$value="'".db_addslashes($value)."'";
	else
		$value=(0+$value);
	$passvalue = $newpass;
	if(NeedQuotes($cPasswordFieldType))
		$passvalue="'".db_addslashes($passvalue)."'";
	else
		$passvalue=(0+$passvalue);


    	$sWhere = " where ".AddFieldWrappers($cUserNameField)."=".$value;
		$strSQL = "select * from ".AddTableWrappers($cLoginTable).$sWhere;
		$rstemp=db_query($strSQL,$conn);

		if($row=db_fetch_array($rstemp))
		{
			if($opass == $row[$cPasswordField])
			{
	if(!checkpassword($newpassraw))
	{
		$fmt=mlang_message("SEC_PWD_LEN");
		$fmt=str_replace("%%","8",$fmt);
		$message.="<br>".$fmt;
	}
	else
	{
				$retval=true;
				if($globalEvents->exists("BeforeChangePassword"))
					$retval=$globalEvents->BeforeChangePassword(postvalue("opass"), postvalue("newpass"));
				if($retval)
				{
					$strSQL= "update ".AddTableWrappers($cLoginTable)." set ".AddFieldWrappers($cPasswordField)."=".$passvalue.$sWhere;
					db_exec($strSQL,$conn);
					if($auditObj)
						$auditObj->LogChPassword();
					if($globalEvents->exists("AfterChangePassword"))
						$globalEvents->AfterChangePassword(postvalue("opass"), postvalue("newpass"));
					$xt->assign("body",true);
					$xt->display("changepwd_success.htm");
					return;
				}
	}
			}
			else
				$message = mlang_message("INVALID_PASSWORD");
	}
}
else $xt->assign("backlink_attrs","href=\"javascript:history.go(-1)\"");
	
if($message)
{
	$xt->assign("message",$message);
	$xt->assign("message_block",true);
}


$includes="";
$includes.="<script language=\"JavaScript\" src=\"include/jquery.js\"></script>\r\n";
$includes.="<script language=\"JavaScript\" src=\"include/jsfunctions.js\"></script>\r\n";
if ($pageObject->debugJSMode === true)
{
	$includes.="<script language=\"JavaScript\" src=\"include/runnerJS/RunnerBase.js\"></script>\r\n";
}
else
{
	$includes.="<script language=\"JavaScript\" src=\"include/runnerJS/RunnerBase.js\"></script>\r\n";
}	




$pageObject->body["begin"] .= $includes."<script language=\"JavaScript\">
function validate()
{

	
	if (document.forms.form1.cpass.value!=document.forms.form1.newpass.value)
	{	
		alert('".jsreplace(mlang_message("DONT_MATCH")).
		"');
		document.forms.form1.newpass.value='';
		document.forms.form1.cpass.value='';
		document.forms.form1.newpass.focus();
		return false;
	}
	return true;
}
</script>
 <form method=\"POST\" action=\"changepwd.php\" id=form1 name=form1 onsubmit=\"return validate();\">
<input type=hidden name=btnSubmit value=\"Submit\">
<input type=hidden name=go value=\"".$go."\">";
$pageObject->body["end"] .="</form>";


$pageObject->addCommonJs();
$pageObject->fillSetCntrlMaps();
$pageObject->body['end'] .= '<script>';
$pageObject->body['end'] .= "window.controlsMap = '".jsreplace(my_json_encode($pageObject->controlsHTMLMap))."';";
$pageObject->body['end'] .= "window.settings = '".jsreplace(my_json_encode($pageObject->jsSettings))."';";
$pageObject->body["end"] .= $pageObject->PrepareJS()."</script>";
$pageObject->addButtonHandlers();


$xt->assignbyref("body",$pageObject->body);

$templatefile="changepwd.htm";
if($globalEvents->exists("BeforeShowChangePwd"))
	$globalEvents->BeforeShowChangePwd($xt,$templatefile);

$xt->display($templatefile);
?>