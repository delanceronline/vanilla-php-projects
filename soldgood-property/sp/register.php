<?php
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

include("include/dbcommon.php");
include("include/users_variables.php");
include("classes/runnerpage.php");


$registered=false;
//event for onsubmit

$strMessage = "";
$allow_registration = true;
$strUsername = "";
$strPassword = "";
$strEmail = "";
$values = array();
$keys = array();
$id = 1;
include('include/xtempl.php');

$isNeedSettings = true;
$xt = new Xtempl();

$params = array("pageType" => PAGE_REGISTER,"id" => $id);
$params['xt'] = &$xt;
$params['tName'] = $strTableName;
$params["needSearchClauseObj"] = false;
$params["calendar"] = false;

////////////////////// time picker
//////////////////////

$pageObject = new RunnerPage($params);


$isUseCaptcha = $globalEvents->existsCAPTCHA(PAGE_REGISTER);
if(!$pageObject->isCaptchaOk)
	$allow_registration = false;	

//	Before Process event
if($globalEvents->exists("BeforeProcessRegister"))
	$globalEvents->BeforeProcessRegister($conn);
//Send activation link to user's email

$includes = "";
$includes.= "<script language=\"JavaScript\" src=\"include/jquery.js\"></script>\r\n";
$includes.= "<script language=\"JavaScript\" src=\"include/jsfunctions.js\"></script>\r\n";
if ($pageObject->debugJSMode === true)
{
		$includes.="<script language=\"JavaScript\" src=\"include/runnerJS/RunnerBase.js\"></script>\r\n";
}
else
{
	$includes.= "<script language=\"JavaScript\" src=\"include/runnerJS/RunnerBase.js\"></script>\r\n";
}	
	

// proccess captcha
if($isUseCaptcha)
	$pageObject->doCaptchaCode();

if(@$_POST["btnSubmit"] == "Register")
{
	$filename_values = array();
	$blobfields = array();
	$inlineedit = ADD_SIMPLE;


//	processing login - start
	$value = postvalue("value_login_".$id);
	$type = postvalue("type_login_".$id);
	if (FieldSubmitted("login_".$id))
	{
		$value = prepare_for_db("login",$value,$type);
	}
	else
		$value = false;
	if(!($value===false))
	{


		$values["login"] = $value;
	}
//	processibng login - end

//	processing password - start
	$value = postvalue("value_password_".$id);
	$type = postvalue("type_password_".$id);
	if (FieldSubmitted("password_".$id))
	{
		$value = prepare_for_db("password",$value,$type);
	}
	else
		$value = false;
	if(!($value===false))
	{


		$values["password"] = $value;
	}
//	processibng password - end

//	processing cn - start
	$value = postvalue("value_cn_".$id);
	$type = postvalue("type_cn_".$id);
	if (FieldSubmitted("cn_".$id))
	{
		$value = prepare_for_db("cn",$value,$type);
	}
	else
		$value = false;
	if(!($value===false))
	{


		$values["cn"] = $value;
	}
//	processibng cn - end

//	processing email - start
	$value = postvalue("value_email_".$id);
	$type = postvalue("type_email_".$id);
	if (FieldSubmitted("email_".$id))
	{
		$value = prepare_for_db("email",$value,$type);
	}
	else
		$value = false;
	if(!($value===false))
	{


		$values["email"] = $value;
	}
//	processibng email - end

//	processing identity_id - start
	$value = postvalue("value_identity_id_".$id);
	$type = postvalue("type_identity_id_".$id);
	if (FieldSubmitted("identity_id_".$id))
	{
		$value = prepare_for_db("identity_id",$value,$type);
	}
	else
		$value = false;
	if(!($value===false))
	{


		$values["identity_id"] = $value;
	}
//	processibng identity_id - end

//	processing name - start
	$value = postvalue("value_name_".$id);
	$type = postvalue("type_name_".$id);
	if (FieldSubmitted("name_".$id))
	{
		$value = prepare_for_db("name",$value,$type);
	}
	else
		$value = false;
	if(!($value===false))
	{


		$values["name"] = $value;
	}
//	processibng name - end

	$strUsername = $values["login"];
	$strPassword = $values["password"];
	$strEmail = $values["email"];


//	add filenames to values
	foreach($filename_values as $key=>$value)
		$values[$key] = $value;

//	check if entered username already exists
	if(!strlen($strUsername))
	{
		$xt->assign("user_msg",mlang_message("USER_NOEMPTY"));
		$allow_registration = false;
	}	
	else
	{
		$strSQL = "select count(*) from `users` where `login`=".add_db_quotes("login",$strUsername);
	   	$rs = db_query($strSQL,$conn);
		$data = db_fetch_numarray($rs);
		if($data[0]>0)
		{
			$xt->assign("user_msg",mlang_message("USERNAME_EXISTS1")." <i>".$strUsername."</i> ".mlang_message("USERNAME_EXISTS2"));
			$allow_registration=false;
		}
	}


	if(!checkpassword($values["password"]))
	{
		$msg = "";
		$fmt = mlang_message("SEC_PWD_LEN");
		$fmt = str_replace("%%","8",$fmt);
		$msg.= "<br>".$fmt;
		if($msg)
			$msg = substr($msg,4);
		$xt->assign("password_msg",$msg);
		$allow_registration = false;
	}
	$retval = true;
	
	if($allow_registration)
	{
		if($globalEvents->exists("BeforeRegister"))
			$retval = $globalEvents->BeforeRegister($values,$strMessage);
	}
	else
		$retval = false;

	if($retval)
	{
		$message = "";
		$retval = DoInsertRecord("users",$values,$blobfields,$id,$pageObject);
		$strMessage = $message;
	}
	
	if($isUseCaptcha && $pageObject->isCaptchaOk)
		$_SESSION[$strTableName."_count_captcha"] = $_SESSION[$strTableName."_count_captcha"]+1;
	
	if($retval)
	{
		if($globalEvents->exists("AfterSuccessfulRegistration"))
			$globalEvents->AfterSuccessfulRegistration($values);
		$url = GetSiteUrl();
		$url.=$_SERVER["SCRIPT_NAME"];
//	send email to user
		$message = mlang_message("REGMAIL_USER1")." ".$url."\r\n\r\n";
		$strLabel = GetFieldLabel("users","login");
		$message.= $strLabel.": ".$values["login"]."\r\n";
		$strLabel = GetFieldLabel("users","cn");
		$message.= $strLabel.": ".$values["cn"]."\r\n";
		$strLabel = GetFieldLabel("users","email");
		$message.= $strLabel.": ".$values["email"]."\r\n";
		$strLabel = GetFieldLabel("users","identity_id");
		$message.= $strLabel.": ".$values["identity_id"]."\r\n";
		$strLabel = GetFieldLabel("users","name");
		$message.= $strLabel.": ".$values["name"]."\r\n";
		if(($pos = strpos($strEmail,"\r"))!==FALSE || ($pos=strpos($strEmail,"\n"))!==FALSE)
			$strEmail = substr($strEmail,0,$pos);
		runner_mail(array('to' => $strEmail, 'subject' => mlang_message("REGMAIL_USER4"), 'body' => $message));

//	send letter to admin
		$message=mlang_message("REGMAIL_ADMIN1")." ".$url."\r\n";
		$strLabel = GetFieldLabel("users","login");

		$message.= $strLabel.": ".$values["login"]."\r\n";
		$strLabel = GetFieldLabel("users","cn");

		$message.= $strLabel.": ".$values["cn"]."\r\n";
		$strLabel = GetFieldLabel("users","email");

		$message.= $strLabel.": ".$values["email"]."\r\n";
		$strLabel = GetFieldLabel("users","identity_id");

		$message.= $strLabel.": ".$values["identity_id"]."\r\n";
		$strLabel = GetFieldLabel("users","name");

		$message.= $strLabel.": ".$values["name"]."\r\n";
		runner_mail(array('to' => "horry@soldgood.com", 'subject' => mlang_message("REGMAIL_USER4"), 'body' => $message));

//	show Registartion successful message
		

		$pageObject->addCommonJs();
		$pageObject->fillSetCntrlMaps();
		$pageObject->addButtonHandlers();


		$pageObject->body["begin"] .= $includes."<form method=\"POST\" action=\"login.php\" name=\"loginform\">
		<input type=\"Hidden\" name=username value=\"".htmlspecialchars($strUsername)."\">".
		"<input type=\"Hidden\" name=password value=\"".htmlspecialchars($strPassword)."\"></form>";
		$pageObject->body["end"] .= "<script>";
		$pageObject->body['end'] .= "window.controlsMap = '".jsreplace(my_json_encode($pageObject->controlsHTMLMap))."';";
		$pageObject->body['end'] .= "window.settings = '".jsreplace(my_json_encode($pageObject->jsSettings))."';";
		$pageObject->body["end"] .= $pageObject->PrepareJS()."</script>";
		$xt->assign("registered_block",true);

		$xt->assign("body",$pageObject->body);
		$xt->assign("loginlink_attrs","onclick=\"document.forms.loginform.submit();return false;\"");
		$xt->display("register_success.htm");
		return;
	}
	else
	{
		if($globalEvents->exists("AfterUnsuccessfulRegistration"))
			$globalEvents->AfterUnsuccessfulRegistration($values,$strMessage);
	
		if($strMessage!="")
		{
			$xt->assign("message",$strMessage);
			$xt->assign("message_block",true);
		}
		
	}
}

$includes.="<script language=\"JavaScript\" src=\"include/customlabels.js\"></script>\r\n";
$includes.="<div id=\"search_suggest\"></div>\r\n";

//	assign values to the controls

if(!count($values))
{
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////
//	Begin Add validation params for Regester	
$regex = '';
$regexmessage = '';
$regextype = '';
$controls = array('controls'=>array());

$regFields = $pageObject->getFieldsByPageType();
foreach($regFields as $fName)
{
	$gfName = GoodFieldName($fName);	
	$control[$gfName] = array();
	$control[$gfName]["func"] = "xt_buildeditcontrol";
	$control[$gfName]["params"] = array();
	$control[$gfName]["params"]["id"] = $id;
	$control[$gfName]["params"]["mode"] = "add";
	$control[$gfName]["params"]["field"] = $fName;
	$control[$gfName]["params"]["value"] = @$values[$fName];
	
	if(GetEditFormat($fName) == 'Time')	
		$pageObject->fillTimePickSettings($fName, @$values[$fName]);
	
	if($fName == GetPasswordField())
	{
		$control[$gfName]["params"]["format"] = "Password";
		$pageObject->jsSettings['tableSettings'][$strTableName]['passFieldName'] = $fName;
	}
	
	//	Begin Add validation
	$arrValidate = getValidation($fName,$strTableName);	
	$control[$gfName]["params"]["validate"] = $arrValidate;
	//	End Add validation
	
	$controls["controls"]['ctrlInd'] = 0;
	$controls["controls"]['id'] = $id;
	$controls["controls"]['fieldName'] = $fName;
	$controls["controls"]['mode'] = "add";

	$xt->assignbyref($gfName."_editcontrol",$control[$gfName]);
	$xt->assign($gfName."_label",true);
	if(isEnableSection508())
		$xt->assign_section($gfName."_label","<label for=\"".GetInputElementId($fName, $id)."\">","</label>");
	$xt->assign($gfName."_fieldblock",true);
	
	// category control field
	$strCategoryControl = $pageObject->hasDependField($fName);
	
	if($strCategoryControl!==false && in_array($strCategoryControl, $regFields))
		$vals = array($fName => @$values[$fName],$strCategoryControl => @$values[$strCategoryControl]);
	else
		$vals = array($fName => @$values[$fName]);
	
	$preload = $pageObject->fillPreload($fName, $vals);
	if($preload!==false)
		$controls["controls"]['preloadData'] = $preload;
	
	$pageObject->fillControlsMap($controls);
	
	if(GetEditFormat($fName) == 'Time')	
		$pageObject->fillTimePickSettings($fName, @$values[$fName]);
		
	if($fName==GetPasswordField() && GetPasswordField()!=GetUserNameField())
	{
		//Begin second field for re-enter password
		$xt->assign("confirm_label",true);
		if(isEnableSection508())
			$xt->assign_section("confirm_label","<label for=\"value_confirm_".$id."\">","</label>");

		$control1['confirm'] = array();
		$control1['confirm']["func"] = "xt_buildeditcontrol";
		$control1['confirm']["params"] = array();
		$control1['confirm']["params"]["field"] = "confirm";
		$control1['confirm']["params"]["format"] = "Password";
		$control1['confirm']["params"]["validate"]['basicValidate'] = array('IsRequired');
		$control1['confirm']["params"]["id"] = $id;
		$control1['confirm']["params"]["mode"] = "add";

		$controls = array('controls'=>array());
		$controls["controls"]['ctrlInd'] = 0;
		$controls["controls"]['id'] = $id;
		$controls["controls"]['fieldName'] = "confirm";
		$controls["controls"]['mode'] = "add";

		$xt->assignbyref("confirm_editcontrol1",$control1['confirm']);
		$xt->assign("confirm_block",true);

		$pageObject->fillControlsMap($controls);
	}
}

//////////////////////////////////
$xt->assign("buttons_block",true);

$readonlyfields = array();

//	show readonly fields

$xt->assign("submit_attrs","id=\"saveButton".$id."\"");

$pageObject->body["begin"].= $includes;
$pageObject->addCommonJs();
$pageObject->fillSetCntrlMaps();
$pageObject->addButtonHandlers();

$pageObject->body['end'] = array();
$pageObject->body['end']["method"] = "assignBodyEnd";		
$pageObject->body['end']["object"] = &$pageObject;	
$xt->assignbyref("body",$pageObject->body);

$pageObject->xt->assign("legend", true);

$templatefile = "register.htm";
if($globalEvents->exists("BeforeShowRegister"))
{
	$globalEvents->BeforeShowRegister($xt,$templatefile);
}
$xt->eventsObject = &$globalEvents;
$xt->display($templatefile);

?>
