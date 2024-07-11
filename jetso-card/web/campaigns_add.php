<?php 
include("include/dbcommon.php");

@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

add_nocache_headers();
include("include/campaigns_variables.php");
include('include/xtempl.php');
include('classes/runnerpage.php');

//	check if logged in
if(!@$_SESSION["UserID"] || !CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Add"))
{ 
	$_SESSION["MyURL"]=$_SERVER["SCRIPT_NAME"]."?".$_SERVER["QUERY_STRING"];
	
	header("Location: login.php?message=expired"); 
	return;
}

$filename = "";
$status = "";
$message = "";
$mesClass = "";
$usermessage = "";
$error_happened = false;
$readavalues = false;

$keys = array();
$showValues = array();
$showRawValues = array();
$showFields = array();
$showDetailKeys = array();
$IsSaved = false;
$HaveData = true;
$popUpSave = false;

$sessionPrefix = $strTableName;

$onFly = false;
if(postvalue("onFly"))
	$onFly = true;

if(@$_REQUEST["editType"]=="inline")
	$inlineadd = ADD_INLINE;
elseif(@$_REQUEST["editType"]==ADD_POPUP)
{
	$inlineadd = ADD_POPUP;
	if(@$_POST["a"]=="added" && postvalue("field")=="" && postvalue("category")=="")
		$popUpSave = true;	
}
elseif(@$_REQUEST["editType"]=="addmaster")
	$inlineadd = ADD_MASTER;
elseif($onFly)
{
	$inlineadd = ADD_ONTHEFLY;
	$sessionPrefix = $strTableName."_add";
}
else
	$inlineadd = ADD_SIMPLE;

if($inlineadd == ADD_INLINE)
	$templatefile = "campaigns_inline_add.htm";
else
	$templatefile = "campaigns_add.htm";

$id = postvalue("id");	
if(intval($id)==0)
	$id = 1;

//If undefined session value for mastet table, but exist post value master table, than take second
//It may be happen only when use dpInline mode on page add
if(!@$_SESSION[$sessionPrefix."_mastertable"] && postvalue("mastertable"))
	$_SESSION[$sessionPrefix."_mastertable"] = postvalue("mastertable");

$xt = new Xtempl();
	
// assign an id		
$xt->assign("id",$id);
	
$auditObj = GetAuditObject($strTableName);

//array of params for classes
$params = array("pageType" => PAGE_ADD,"id" => $id,"mode" => $inlineadd);

////////////////////// data picker
$params["calendar"] = true;

////////////////////// time picker
$params["timepicker"] = true;

$params['tName'] = $strTableName;
$params['strOriginalTableName'] = $strOriginalTableName;
$params['menuTablesArr'] = $menuTablesArr;
$params['xt'] = &$xt;
$params['needSearchClauseObj'] = false;
$params['includes_js']=$includes_js;
$params['includes_jsreq']=$includes_jsreq;
$params['includes_css']=$includes_css;
$params['locale_info']=$locale_info;
$params['pageAddLikeInline'] = ($inlineadd==ADD_INLINE);
$params['useTabsOnAdd'] = useTabsOnAdd($strTableName);
if($params['useTabsOnAdd'])
	$params['arrAddTabs'] = GetAddTabs($strTableName);
$pageObject = new RunnerPage($params);

//Get detail table keys	
$detailKeys = $pageObject->detailKeysByM;

//Array of fields, which appear on add page
$addFields = $pageObject->getFieldsByPageType();

// add onload event
//$onLoadJsCode = GetTableData($pageObject->tName, ".jsOnloadAdd", '');
//$pageObject->addOnLoadJsEvent($onLoadJsCode);

if ($inlineadd==ADD_SIMPLE)
{
	// add button events if exist
	$pageObject->addButtonHandlers();
}

$url_page=substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1,12);

//For show detail tables on master page add
if($inlineadd==ADD_SIMPLE || $inlineadd==ADD_MASTER || $inlineadd==ADD_POPUP)
{
	$dpParams = array();
	if($pageObject->isShowDetailTables)
	{
		$ids = $id;
		$pageObject->jsSettings['tableSettings'][$strTableName]['dpParams'] = array('tableNames'=>$dpParams['strTableNames'], 'ids'=>$dpParams['ids']);
		if($inlineadd==ADD_SIMPLE)
			$pageObject->AddJSFile("include/detailspreview");	
	}
}

//	Before Process event
if($eventObj->exists("BeforeProcessAdd"))
	$eventObj->BeforeProcessAdd($conn);

// proccess captcha
if ($inlineadd==ADD_SIMPLE || $inlineadd==ADD_MASTER || $inlineadd==ADD_POPUP)
	if($pageObject->captchaExists())
		$pageObject->doCaptchaCode();	
	
// insert new record if we have to
if(@$_POST["a"]=="added")
{
	$afilename_values=array();
	$avalues=array();
	$blobfields=array();
//	processing pt - start
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
		$value = postvalue("value_pt_".$id);
		$type=postvalue("type_pt_".$id);
		if (FieldSubmitted("pt_".$id))
		{
				$value=prepare_for_db("pt",$value,$type);
		}
		else
			$value=false;
		
		if(!($value===false))
		{
	
	
						if(0 && "pt"=="password" && $url_page=="admin_users_")
				$value=md5($value);
			$avalues["pt"]=$value;
		}
		}
//	processibng pt - end
//	processing pd - start
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
		$value = postvalue("value_pd_".$id);
		$type=postvalue("type_pd_".$id);
		if (FieldSubmitted("pd_".$id))
		{
				$value=prepare_for_db("pd",$value,$type);
		}
		else
			$value=false;
		
		if(!($value===false))
		{
	
	
						if(0 && "pd"=="password" && $url_page=="admin_users_")
				$value=md5($value);
			$avalues["pd"]=$value;
		}
		}
//	processibng pd - end
//	processing pi - start
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
		$value = postvalue("value_pi_".$id);
		$type=postvalue("type_pi_".$id);
		if (FieldSubmitted("pi_".$id))
		{
				$fileNameForPrepareFunc = postvalue("filename_pi_".$id);
					$value=prepare_upload("pi","upload2",$fileNameForPrepareFunc,$fileNameForPrepareFunc,"" ,$id,$pageObject);
		}
		else
			$value=false;
		
		if(!($value===false))
		{
	
	
						if(0 && "pi"=="password" && $url_page=="admin_users_")
				$value=md5($value);
			$avalues["pi"]=$value;
		}
		}
//	processibng pi - end
//	processing coupon - start
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
		$value = postvalue("value_coupon_".$id);
		$type=postvalue("type_coupon_".$id);
		if (FieldSubmitted("coupon_".$id))
		{
				$fileNameForPrepareFunc = postvalue("filename_coupon_".$id);
					$value=prepare_upload("coupon","upload2",$fileNameForPrepareFunc,$fileNameForPrepareFunc,"" ,$id,$pageObject);
		}
		else
			$value=false;
		
		if(!($value===false))
		{
	
	
						if(0 && "coupon"=="password" && $url_page=="admin_users_")
				$value=md5($value);
			$avalues["coupon"]=$value;
		}
		}
//	processibng coupon - end
//	processing terms - start
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
		$value = postvalue("value_terms_".$id);
		$type=postvalue("type_terms_".$id);
		if (FieldSubmitted("terms_".$id))
		{
				$value=prepare_for_db("terms",$value,$type);
		}
		else
			$value=false;
		
		if(!($value===false))
		{
	
	
						if(0 && "terms"=="password" && $url_page=="admin_users_")
				$value=md5($value);
			$avalues["terms"]=$value;
		}
		}
//	processibng terms - end
//	processing ti - start
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
		$value = postvalue("value_ti_".$id);
		$type=postvalue("type_ti_".$id);
		if (FieldSubmitted("ti_".$id))
		{
				$fileNameForPrepareFunc = postvalue("filename_ti_".$id);
					$value=prepare_upload("ti","upload2",$fileNameForPrepareFunc,$fileNameForPrepareFunc,"" ,$id,$pageObject);
		}
		else
			$value=false;
		
		if(!($value===false))
		{
	
	
						if(0 && "ti"=="password" && $url_page=="admin_users_")
				$value=md5($value);
			$avalues["ti"]=$value;
		}
		}
//	processibng ti - end
//	processing cc - start
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
		$value = postvalue("value_cc_".$id);
		$type=postvalue("type_cc_".$id);
		if (FieldSubmitted("cc_".$id))
		{
				$value=prepare_for_db("cc",$value,$type);
		}
		else
			$value=false;
		
		if(!($value===false))
		{
	
	
						if(0 && "cc"=="password" && $url_page=="admin_users_")
				$value=md5($value);
			$avalues["cc"]=$value;
		}
		}
//	processibng cc - end
//	processing cn_prefix - start
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
		$value = postvalue("value_cn_prefix_".$id);
		$type=postvalue("type_cn_prefix_".$id);
		if (FieldSubmitted("cn_prefix_".$id))
		{
				$value=prepare_for_db("cn_prefix",$value,$type);
		}
		else
			$value=false;
		
		if(!($value===false))
		{
	
	
						if(0 && "cn_prefix"=="password" && $url_page=="admin_users_")
				$value=md5($value);
			$avalues["cn_prefix"]=$value;
		}
		}
//	processibng cn_prefix - end
//	processing cn_offset - start
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
		$value = postvalue("value_cn_offset_".$id);
		$type=postvalue("type_cn_offset_".$id);
		if (FieldSubmitted("cn_offset_".$id))
		{
				$value=prepare_for_db("cn_offset",$value,$type);
		}
		else
			$value=false;
		
		if(!($value===false))
		{
	
	
						if(0 && "cn_offset"=="password" && $url_page=="admin_users_")
				$value=md5($value);
			$avalues["cn_offset"]=$value;
		}
		}
//	processibng cn_offset - end
//	processing start_date - start
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
		$value = postvalue("value_start_date_".$id);
		$type=postvalue("type_start_date_".$id);
		if (FieldSubmitted("start_date_".$id))
		{
				$value=prepare_for_db("start_date",$value,$type);
		}
		else
			$value=false;
		
		if(!($value===false))
		{
	
	
						if(0 && "start_date"=="password" && $url_page=="admin_users_")
				$value=md5($value);
			$avalues["start_date"]=$value;
		}
		}
//	processibng start_date - end
//	processing start_time - start
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
		$value = postvalue("value_start_time_".$id);
		$type=postvalue("type_start_time_".$id);
		if (FieldSubmitted("start_time_".$id))
		{
				$value=prepare_for_db("start_time",$value,$type);
		}
		else
			$value=false;
		
		if(!($value===false))
		{
	
	
						if(0 && "start_time"=="password" && $url_page=="admin_users_")
				$value=md5($value);
			$avalues["start_time"]=$value;
		}
		}
//	processibng start_time - end
//	processing end_date - start
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
		$value = postvalue("value_end_date_".$id);
		$type=postvalue("type_end_date_".$id);
		if (FieldSubmitted("end_date_".$id))
		{
				$value=prepare_for_db("end_date",$value,$type);
		}
		else
			$value=false;
		
		if(!($value===false))
		{
	
	
						if(0 && "end_date"=="password" && $url_page=="admin_users_")
				$value=md5($value);
			$avalues["end_date"]=$value;
		}
		}
//	processibng end_date - end
//	processing end_time - start
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
		$value = postvalue("value_end_time_".$id);
		$type=postvalue("type_end_time_".$id);
		if (FieldSubmitted("end_time_".$id))
		{
				$value=prepare_for_db("end_time",$value,$type);
		}
		else
			$value=false;
		
		if(!($value===false))
		{
	
	
						if(0 && "end_time"=="password" && $url_page=="admin_users_")
				$value=md5($value);
			$avalues["end_time"]=$value;
		}
		}
//	processibng end_time - end
//	processing status - start
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
		$value = postvalue("value_status_".$id);
		$type=postvalue("type_status_".$id);
		if (FieldSubmitted("status_".$id))
		{
				$value=prepare_for_db("status",$value,$type);
		}
		else
			$value=false;
		
		if(!($value===false))
		{
	
	
						if(0 && "status"=="password" && $url_page=="admin_users_")
				$value=md5($value);
			$avalues["status"]=$value;
		}
		}
//	processibng status - end




	$failed_inline_add=false;
//	add filenames to values
	foreach($afilename_values as $akey=>$value)
		$avalues[$akey]=$value;
	
//	before Add event
	$retval = true;
	if($eventObj->exists("BeforeAdd"))
		$retval=$eventObj->BeforeAdd($avalues,$usermessage,(bool)$inlineadd);
	if($retval && $pageObject->isCaptchaOk)
	{
		$_SESSION[$strTableName."_count_captcha"] = $_SESSION[$strTableName."_count_captcha"]+1;
		if(DoInsertRecord($strOriginalTableName,$avalues,$blobfields,$id,$pageObject))
		{
			$IsSaved=true;
//	after edit event
			if($auditObj || $eventObj->exists("AfterAdd"))
			{
				foreach($keys as $idx=>$val)
					$avalues[$idx]=$val;
			}
			
			if($auditObj)
				$auditObj->LogAdd($strTableName,$avalues,$keys);

			if($eventObj->exists("AfterAdd"))
				$eventObj->AfterAdd($avalues,$keys,(bool)$inlineadd);
				
			if($inlineadd==ADD_SIMPLE || $inlineadd==ADD_MASTER)
			{
				$permis = array();
				$keylink = "";$k = 0;
				foreach($keys as $idx=>$val)
				{
					if($k!=0)
						$keylink .="&";
					$keylink .="editid".(++$k)."=".htmlspecialchars(rawurlencode(@$val));
				}
				$permis = $pageObject->getPermissions();				
				if (count($keys))
				{
					$message .="</br>";
					if(GetTableData($strTableName,".edit",false) && $permis['edit'])
						$message .='&nbsp;<a href=\'campaigns_edit.php?'.$keylink.'\'>'.mlang_message("EDIT").'</a>&nbsp;';
					if(GetTableData($strTableName,".view",false) && $permis['search'])
						$message .='&nbsp;<a href=\'campaigns_view.php?'.$keylink.'\'>'.mlang_message("VIEW").'</a>&nbsp;';
				}
				$mesClass = "mes_ok";	
			}
		}
		elseif($inlineadd!=ADD_INLINE)
			$mesClass = "mes_not";	
	}
	else
	{
		$message = $usermessage;
		$status="DECLINED";
		$readavalues=true;
	}
}

$message = "<div class='message ".$mesClass."'>".$message."</div>";

// PRG rule, to avoid POSTDATA resend
if (no_output_done() && $inlineadd==ADD_SIMPLE && $IsSaved)
{
	// saving message
	$_SESSION["message"] = ($message ? $message : "");
	// redirect
	header("Location: campaigns_".$pageObject->getPageType().".php");
	// turned on output buffering, so we need to stop script
	exit();
}

if($inlineadd==ADD_MASTER && $IsSaved)
	$_SESSION["message"] = ($message ? $message : "");
	
// for PRG rule, to avoid POSTDATA resend. Saving mess in session
if($inlineadd==ADD_SIMPLE && isset($_SESSION["message"]))
{
	$message = $_SESSION["message"];
	unset($_SESSION["message"]);
}

$defvalues=array();

//	copy record
if(array_key_exists("copyid1",$_REQUEST) || array_key_exists("editid1",$_REQUEST))
{
	$copykeys=array();
	if(array_key_exists("copyid1",$_REQUEST))
	{
		$copykeys["id"]=postvalue("copyid1");
	}
	else
	{
		$copykeys["id"]=postvalue("editid1");
	}
	$strWhere=KeyWhere($copykeys);
	$strSQL = gSQLWhere($strWhere);

	LogInfo($strSQL);
	$rs=db_query($strSQL,$conn);
	$defvalues=db_fetch_array($rs);
	if(!$defvalues)
		$defvalues=array();
//	clear key fields
	$defvalues["id"]="";
//call CopyOnLoad event
	if($eventObj->exists("CopyOnLoad"))
		$eventObj->CopyOnLoad($defvalues,$strWhere);
}
else
{
	$defvalues["status"]=1;
}


if($readavalues)
{
	$defvalues["cn_offset"]=@$avalues["cn_offset"];
	$defvalues["cn_prefix"]=@$avalues["cn_prefix"];
	$defvalues["cc"]=@$avalues["cc"];
	$defvalues["pt"]=@$avalues["pt"];
	$defvalues["pd"]=@$avalues["pd"];
	$defvalues["terms"]=@$avalues["terms"];
	$defvalues["start_date"]=@$avalues["start_date"];
	$defvalues["start_time"]=@$avalues["start_time"];
	$defvalues["end_date"]=@$avalues["end_date"];
	$defvalues["end_time"]=@$avalues["end_time"];
	$defvalues["status"]=@$avalues["status"];
}

if($eventObj->exists("ProcessValuesAdd"))
	$eventObj->ProcessValuesAdd($defvalues);


//for basic files
$includes="";

if($inlineadd!=ADD_INLINE)
{
	if($inlineadd!=ADD_ONTHEFLY && $inlineadd!=ADD_POPUP)
	{
		$includes .="<script language=\"JavaScript\" src=\"include/jquery.js\"></script>\r\n";
		if ($pageObject->debugJSMode===true)
		{
			/*$includes.="<script type=\"text/javascript\" src=\"include/runnerJS/Runner.js\"></script>\r\n".
				"<script type=\"text/javascript\" src=\"include/runnerJS/Util.js\"></script>\r\n".
				"<script type=\"text/javascript\" src=\"include/runnerJS/Observer.js\"></script>\r\n";*/
			$includes.="<script language=\"JavaScript\" src=\"include/runnerJS/RunnerBase.js\"></script>\r\n";
		}
		else 
			$includes .= "<script type=\"text/javascript\" src=\"include/runnerJS/RunnerBase.js\"></script>";
		
		$includes.="<script language=\"JavaScript\" src=\"include/jsfunctions.js\"></script>\r\n";
		$includes.="<div id=\"search_suggest\"></div>\r\n";
	}
	
	if(!$pageObject->isAppearOnTabs("coupon"))
		$xt->assign("coupon_fieldblock",true);
	else
		$xt->assign("coupon_tabfieldblock",true);
	$xt->assign("coupon_label",true);
	if(isEnableSection508())
		$xt->assign_section("coupon_label","<label for=\"".GetInputElementId("coupon", $id)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("cn_offset"))
		$xt->assign("cn_offset_fieldblock",true);
	else
		$xt->assign("cn_offset_tabfieldblock",true);
	$xt->assign("cn_offset_label",true);
	if(isEnableSection508())
		$xt->assign_section("cn_offset_label","<label for=\"".GetInputElementId("cn_offset", $id)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("cn_prefix"))
		$xt->assign("cn_prefix_fieldblock",true);
	else
		$xt->assign("cn_prefix_tabfieldblock",true);
	$xt->assign("cn_prefix_label",true);
	if(isEnableSection508())
		$xt->assign_section("cn_prefix_label","<label for=\"".GetInputElementId("cn_prefix", $id)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("cc"))
		$xt->assign("cc_fieldblock",true);
	else
		$xt->assign("cc_tabfieldblock",true);
	$xt->assign("cc_label",true);
	if(isEnableSection508())
		$xt->assign_section("cc_label","<label for=\"".GetInputElementId("cc", $id)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("pt"))
		$xt->assign("pt_fieldblock",true);
	else
		$xt->assign("pt_tabfieldblock",true);
	$xt->assign("pt_label",true);
	if(isEnableSection508())
		$xt->assign_section("pt_label","<label for=\"".GetInputElementId("pt", $id)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("pd"))
		$xt->assign("pd_fieldblock",true);
	else
		$xt->assign("pd_tabfieldblock",true);
	$xt->assign("pd_label",true);
	if(isEnableSection508())
		$xt->assign_section("pd_label","<label for=\"".GetInputElementId("pd", $id)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("pi"))
		$xt->assign("pi_fieldblock",true);
	else
		$xt->assign("pi_tabfieldblock",true);
	$xt->assign("pi_label",true);
	if(isEnableSection508())
		$xt->assign_section("pi_label","<label for=\"".GetInputElementId("pi", $id)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("terms"))
		$xt->assign("terms_fieldblock",true);
	else
		$xt->assign("terms_tabfieldblock",true);
	$xt->assign("terms_label",true);
	if(isEnableSection508())
		$xt->assign_section("terms_label","<label for=\"".GetInputElementId("terms", $id)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("ti"))
		$xt->assign("ti_fieldblock",true);
	else
		$xt->assign("ti_tabfieldblock",true);
	$xt->assign("ti_label",true);
	if(isEnableSection508())
		$xt->assign_section("ti_label","<label for=\"".GetInputElementId("ti", $id)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("start_date"))
		$xt->assign("start_date_fieldblock",true);
	else
		$xt->assign("start_date_tabfieldblock",true);
	$xt->assign("start_date_label",true);
	if(isEnableSection508())
		$xt->assign_section("start_date_label","<label for=\"".GetInputElementId("start_date", $id)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("start_time"))
		$xt->assign("start_time_fieldblock",true);
	else
		$xt->assign("start_time_tabfieldblock",true);
	$xt->assign("start_time_label",true);
	if(isEnableSection508())
		$xt->assign_section("start_time_label","<label for=\"".GetInputElementId("start_time", $id)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("end_date"))
		$xt->assign("end_date_fieldblock",true);
	else
		$xt->assign("end_date_tabfieldblock",true);
	$xt->assign("end_date_label",true);
	if(isEnableSection508())
		$xt->assign_section("end_date_label","<label for=\"".GetInputElementId("end_date", $id)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("end_time"))
		$xt->assign("end_time_fieldblock",true);
	else
		$xt->assign("end_time_tabfieldblock",true);
	$xt->assign("end_time_label",true);
	if(isEnableSection508())
		$xt->assign_section("end_time_label","<label for=\"".GetInputElementId("end_time", $id)."\">","</label>");
	
	if(!$pageObject->isAppearOnTabs("status"))
		$xt->assign("status_fieldblock",true);
	else
		$xt->assign("status_tabfieldblock",true);
	$xt->assign("status_label",true);
	if(isEnableSection508())
		$xt->assign_section("status_label","<label for=\"".GetInputElementId("status", $id)."\">","</label>");
	
	
	
	if($inlineadd!=ADD_ONTHEFLY && $inlineadd!=ADD_POPUP)
	{
		$pageObject->body["begin"] .= $includes;
		if($pageObject->isShowDetailTables)
			$pageObject->body["begin"].= "<div id=\"master_details\" onmouseover=\"RollDetailsLink.showPopup();\" onmouseout=\"RollDetailsLink.hidePopup();\"> </div>";
		$xt->assign("backbutton_attrs","id=\"backButton".$id."\"");
		$xt->assign("back_button",true);
		//$xt->assign('addForm', true);
	}
	else
	{		
		$xt->assign("cancelbutton_attrs", "id=\"cancelButton".$id."\"");
		$xt->assign("cancel_button",true);
		$xt->assign("header","");
	}
	$xt->assign("save_button",true);
}
$xt->assign("savebutton_attrs","id=\"saveButton".$id."\"");
if($message)
{
	$xt->assign("message_block",true);
	$xt->assign("message",$message);
}
/*
if($inlineadd == ADD_ONTHEFLY || $inlineadd == ADD_POPUP)
{
	$xt->assign("message_block",true);
}
*/

$readonlyfields=array();

//	show readonly fields
$linkdata="";

if(@$_POST["a"]=="added" && $inlineadd==ADD_ONTHEFLY)
{
	if( !$error_happened && $status!="DECLINED")
	{
		$LookupSQL = "";
		$linkfield = "";
		$dispfield = "";
		if($LookupSQL)
			$LookupSQL.=" from ".AddTableWrappers($strOriginalTableName);

		$data=0;
		if(count($keys) && $LookupSQL)
		{
			$where=KeyWhere($keys);
			$LookupSQL.=" where ".$where;
			$rs=db_query($LookupSQL,$conn);
			$data=db_fetch_numarray($rs);
		}
		if($data)
		{
			$respData = array($linkfield=>@$data[0], $dispfield=>@$data[1]);
		}
		else
		{
			$respData = array($linkfield=>@$avalues[$linkfield], $dispfield=>@$avalues[$dispfield]);
		}		
		$returnJSON['success'] = true;
		$returnJSON['keys'] = $keys;
		$returnJSON['vals'] = $respData;
		$returnJSON['fields'] = $showFields;
	}
	else
	{
		$returnJSON['success'] = false;
		$returnJSON['message'] = $message;
	}
	echo "<textarea>".htmlspecialchars(my_json_encode($returnJSON))."</textarea>";
	exit();
}

if(@$_POST["a"]=="added" && ($inlineadd == ADD_INLINE || $inlineadd == ADD_MASTER || $inlineadd==ADD_POPUP)) 
{
	//Preparation   view values
	//	get current values and show edit controls
	$dispFieldAlias = "";
	$data=0;
	if(count($keys))
	{
		$where=KeyWhere($keys);
			
		$sqlHead = $gQuery->HeadToSql();
		$sqlGroupBy = $gQuery->GroupByToSql();
		$oHaving = $gQuery->Having();
		$sqlHaving = $oHaving->toSql($gQuery);
		
		$dispFieldAlias = postvalue('dispFieldAlias');
		$dispField = postvalue('dispField');
		
		if ($dispFieldAlias)
		{
			$sqlHead.=", ".($dispField)." as ".AddFieldWrappers($dispFieldAlias)." ";
		}
		$strSQL = gSQLWhere_having($sqlHead, $gsqlFrom, $gsqlWhereExpr, $sqlGroupBy, $sqlHaving, $where, '');		
		
		LogInfo($strSQL);
		$rs=db_query($strSQL,$conn);
		$data=db_fetch_array($rs);
	}
	if(!$data)
	{
		$data=$avalues;
		$HaveData=false;
	}
	//check if correct values added

	$keylink="";
	$keylink.="&key1=".htmlspecialchars(rawurlencode(@$data["id"]));
	
////////////////////////////////////////////
//	coupon - File-based Image
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				if(CheckImageExtension($data["coupon"])) 
		{
					// show thumbnail
			$thumbname="".$data["coupon"];
			if(substr("client_images/",0,7)!="http://" && !myfile_exists(getabspath("client_images/".$thumbname)))
				$thumbname=$data["coupon"];
			$value="<a";
							$value .= " target=_blank";
			$value.=" href=\"".htmlspecialchars(AddLinkPrefix("coupon",$data["coupon"]))."\">";
			$value.="<img";
			if(isEnableSection508())
				$value.= " alt=\"".htmlspecialchars($data["coupon"])."\"";
			if($thumbname==$data["coupon"])
			{
											}
			$value.=" id=\"img_coupon_".$id."\" border=0";
			$value.=" src=\"".htmlspecialchars(AddLinkPrefix("coupon",$thumbname))."\"></a>";
		}
	$showValues["coupon"] = $value;
	$showFields[] = "coupon";
		$showRawValues["coupon"] = substr($data["coupon"],0,100);
	}	
//	cn_offset - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
			$value = ProcessLargeText(GetData($data,"cn_offset", ""),"field=cn%5Foffset".$keylink,"",MODE_LIST);
	$showValues["cn_offset"] = $value;
	$showFields[] = "cn_offset";
		$showRawValues["cn_offset"] = substr($data["cn_offset"],0,100);
	}	
//	cn_prefix - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
			$value = ProcessLargeText(GetData($data,"cn_prefix", ""),"field=cn%5Fprefix".$keylink,"",MODE_LIST);
	$showValues["cn_prefix"] = $value;
	$showFields[] = "cn_prefix";
		$showRawValues["cn_prefix"] = substr($data["cn_prefix"],0,100);
	}	
//	cc - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
			$value = ProcessLargeText(GetData($data,"cc", ""),"field=cc".$keylink,"",MODE_LIST);
	$showValues["cc"] = $value;
	$showFields[] = "cc";
		$showRawValues["cc"] = substr($data["cc"],0,100);
	}	
//	pt - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value="";
			$value = ProcessLargeText(GetData($data,"pt", ""),"field=pt".$keylink,"",MODE_LIST);
	$showValues["pt"] = $value;
	$showFields[] = "pt";
		$showRawValues["pt"] = substr($data["pt"],0,100);
	}	
//	pd - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
			$value = ProcessLargeText(GetData($data,"pd", ""),"field=pd".$keylink,"",MODE_LIST);
	$showValues["pd"] = $value;
	$showFields[] = "pd";
		$showRawValues["pd"] = substr($data["pd"],0,100);
	}	
//	pi - File-based Image
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				if(CheckImageExtension($data["pi"])) 
		{
					// show thumbnail
			$thumbname="".$data["pi"];
			if(substr("client_images/",0,7)!="http://" && !myfile_exists(getabspath("client_images/".$thumbname)))
				$thumbname=$data["pi"];
			$value="<a";
							$value .= " target=_blank";
			$value.=" href=\"".htmlspecialchars(AddLinkPrefix("pi",$data["pi"]))."\">";
			$value.="<img";
			if(isEnableSection508())
				$value.= " alt=\"".htmlspecialchars($data["pi"])."\"";
			if($thumbname==$data["pi"])
			{
											}
			$value.=" id=\"img_pi_".$id."\" border=0";
			$value.=" src=\"".htmlspecialchars(AddLinkPrefix("pi",$thumbname))."\"></a>";
		}
	$showValues["pi"] = $value;
	$showFields[] = "pi";
		$showRawValues["pi"] = substr($data["pi"],0,100);
	}	
//	terms - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
			$value = ProcessLargeText(GetData($data,"terms", ""),"field=terms".$keylink,"",MODE_LIST);
	$showValues["terms"] = $value;
	$showFields[] = "terms";
		$showRawValues["terms"] = substr($data["terms"],0,100);
	}	
//	ti - File-based Image
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				if(CheckImageExtension($data["ti"])) 
		{
					// show thumbnail
			$thumbname="".$data["ti"];
			if(substr("client_images/",0,7)!="http://" && !myfile_exists(getabspath("client_images/".$thumbname)))
				$thumbname=$data["ti"];
			$value="<a";
							$value .= " target=_blank";
			$value.=" href=\"".htmlspecialchars(AddLinkPrefix("ti",$data["ti"]))."\">";
			$value.="<img";
			if(isEnableSection508())
				$value.= " alt=\"".htmlspecialchars($data["ti"])."\"";
			if($thumbname==$data["ti"])
			{
											}
			$value.=" id=\"img_ti_".$id."\" border=0";
			$value.=" src=\"".htmlspecialchars(AddLinkPrefix("ti",$thumbname))."\"></a>";
		}
	$showValues["ti"] = $value;
	$showFields[] = "ti";
		$showRawValues["ti"] = substr($data["ti"],0,100);
	}	
//	start_date - Short Date
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value="";
			$value = ProcessLargeText(GetData($data,"start_date", "Short Date"),"field=start%5Fdate".$keylink,"",MODE_LIST);
	$showValues["start_date"] = $value;
	$showFields[] = "start_date";
		$showRawValues["start_date"] = substr($data["start_date"],0,100);
	}	
//	start_time - Time
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
			$value = ProcessLargeText(GetData($data,"start_time", "Time"),"field=start%5Ftime".$keylink,"",MODE_LIST);
	$showValues["start_time"] = $value;
	$showFields[] = "start_time";
		$showRawValues["start_time"] = substr($data["start_time"],0,100);
	}	
//	end_date - Short Date
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value="";
			$value = ProcessLargeText(GetData($data,"end_date", "Short Date"),"field=end%5Fdate".$keylink,"",MODE_LIST);
	$showValues["end_date"] = $value;
	$showFields[] = "end_date";
		$showRawValues["end_date"] = substr($data["end_date"],0,100);
	}	
//	end_time - Time
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
			$value = ProcessLargeText(GetData($data,"end_time", "Time"),"field=end%5Ftime".$keylink,"",MODE_LIST);
	$showValues["end_time"] = $value;
	$showFields[] = "end_time";
		$showRawValues["end_time"] = substr($data["end_time"],0,100);
	}	
//	status - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value="";
				$value = DisplayLookupWizard("status",$data["status"],$data,$keylink,MODE_LIST);
	$showValues["status"] = $value;
	$showFields[] = "status";
		$showRawValues["status"] = substr($data["status"],0,100);
	}	
//	modified_date - Short Date
	$display = false;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value="";
			$value = ProcessLargeText(GetData($data,"modified_date", "Short Date"),"field=modified%5Fdate".$keylink,"",MODE_LIST);
	$showValues["modified_date"] = $value;
	$showFields[] = "modified_date";
		$showRawValues["modified_date"] = substr($data["modified_date"],0,100);
	}	
	
	// for custom expression for display field
	if ($dispFieldAlias)
	{
		$showValues[] = $data[$dispFieldAlias];	
		$showFields[] = $dispFieldAlias;
		$showRawValues[] = substr($data[$dispFieldAlias],0,100);
	}		
	
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_POPUP)
	{	
		if($IsSaved && count($showValues))
		{		
			$returnJSON['success'] = true;	
			if($HaveData){
				$returnJSON['noKeys'] = false;
			}else{
				$returnJSON['noKeys'] = true;
			}
				
			$returnJSON['keys'] = $keys;
			$returnJSON['vals'] = $showValues;
			$returnJSON['fields'] = $showFields;
			$returnJSON['rawVals'] = $showRawValues;
			$returnJSON['detKeys'] = $showDetailKeys;
			$returnJSON['userMess'] = $usermessage;
		}
		else
		{
			$returnJSON['success'] = false;
			$returnJSON['message'] = $message;
		}
		echo "<textarea>".htmlspecialchars(my_json_encode($returnJSON))."</textarea>";
		exit();
	}	
} 

/////////////////////////////////////////////////////////////
if($inlineadd==ADD_MASTER)
{		
	$respJSON = array();
	if(($_POST["a"]=="added" && $IsSaved))
	{
		$respJSON['success'] = true;
		$respJSON['fields'] = $showFields;
		$respJSON['vals'] = $showValues;
		if($onFly){
			if($HaveData)
				$returnJSON['noKeys'] = false;
			else
				$returnJSON['noKeys'] = true;
			$respJSON['keys'] = $keys;
			$respJSON['rawVals'] = $showRawValues;
			$respJSON['detKeys'] = $showDetailKeys;
			$respJSON['userMess'] = $usermessage;
		}
		$respJSON['mKeys'] = array();	
		for($i=0;$i<count($dpParams['ids']);$i++)
		{
			$data=0;
			if(count($keys))
			{
				$where=KeyWhere($keys);
							$strSQL = gSQLWhere($where);
				LogInfo($strSQL);
				$rs=db_query($strSQL,$conn);
				$data=db_fetch_array($rs);
			}
			if(!$data)
				$data=$avalues;
			
			$mKeyId = 1;
			foreach($mKeys[$dpParams['strTableNames'][$i]] as $mk)	
			{
				if($data[$mk])
					$respJSON['mKeys'][$dpParams['strTableNames'][$i]]['masterkey'.$mKeyId++] = $data[$mk];
				else
					$respJSON['mKeys'][$dpParams['strTableNames'][$i]]['masterkey'.$mKeyId++] = '';
			}		
		}
		if((isset($_SESSION[$strTableName."_count_captcha"])) or ($_SESSION[$strTableName."_count_captcha"]>0) or ($_SESSION[$strTableName."_count_captcha"]<5))
			$respJSON['hideCaptha'] = true;
	}
	else{
			$respJSON['success'] = false;
			if(!$pageObject->isCaptchaOk)
				$respJSON['captha'] = false;
			else		
				$respJSON['error'] = $message;
			if($onFly)
				$respJSON['message'] = $message;				
		}
	echo "<textarea>".htmlspecialchars(my_json_encode($respJSON))."</textarea>";	
	exit();
}

/////////////////////////////////////////////////////////////
//	prepare Edit Controls
/////////////////////////////////////////////////////////////

//	validation stuff
$regex='';
$regexmessage='';
$regextype = '';
$control = array();

foreach($addFields as $fName)
{
	$gfName = GoodFieldName($fName);
	$controls = array('controls'=>array());
	if(!$detailKeys || !in_array($fName, $detailKeys) || $fName == postvalue("category"))
	{		
		$control[$gfName] = array();
		$control[$gfName]["func"]="xt_buildeditcontrol";
		$control[$gfName]["params"] = array();
		$control[$gfName]["params"]["id"]= $id;
		$control[$gfName]["params"]["field"]=$fName;
		$control[$gfName]["params"]["value"]=@$defvalues[$fName];
		if(UseRTE($fName))
			$_SESSION[$strTableName."_".$fName."_rte"]=@$defvalues[$fName];
		
		//	Begin Add validation
		$arrValidate = getValidation($fName,$strTableName);	
		$control[$gfName]["params"]["validate"] = $arrValidate;
		//	End Add validation	
	}
	$controls["controls"]['ctrlInd'] = 0;
	$controls["controls"]['id'] = $id;
	$controls["controls"]['fieldName'] = $fName;
	
	if(UseRTEFCK($fName) || UseRTEInnova($fName) || UseRTEBasic($fName))
	{
		if(!$detailKeys || !in_array($fName, $detailKeys))	
			$control[$gfName]["params"]["mode"]="add";
		$controls["controls"]['mode'] = "add";
	}
	else
	{
		if($inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		{
			if(!$detailKeys || !in_array($fName, $detailKeys) || $fName == postvalue("category"))	
				$control[$gfName]["params"]["mode"]="inline_add";
			$controls["controls"]['mode'] = "inline_add";
		}
		else
		{
			if(!$detailKeys || !in_array($fName, $detailKeys) || $fName == postvalue("category"))	
				$control[$gfName]["params"]["mode"]="add";
			$controls["controls"]['mode'] = "add";
		}
	}
			
	if(!$detailKeys || !in_array($fName, $detailKeys))
		$xt->assignbyref($gfName."_editcontrol",$control[$gfName]);
	elseif($detailKeys && in_array($fName, $detailKeys))
		$controls["controls"]['value'] = @$defvalues[$fName];
		
	// category control field
	$strCategoryControl = $pageObject->hasDependField($fName);
	
	if($strCategoryControl!==false && in_array($strCategoryControl, $addFields))
		$vals = array($fName => @$defvalues[$fName],$strCategoryControl => @$defvalues[$strCategoryControl]);
	else
		$vals = array($fName => @$defvalues[$fName]);
	
	$preload = $pageObject->fillPreload($fName, $vals);
	if($preload!==false)
		$controls["controls"]['preloadData'] = $preload;
	
	$pageObject->fillControlsMap($controls);
	
	//fill field tool tips
	$pageObject->fillFieldToolTips($fName);
	
	// fill special settings for timepicker 	
	if(GetEditFormat($fName) == 'Time')	
		$pageObject->fillTimePickSettings($fName, @$defvalues[$fName]);
	
	if((($detailKeys && in_array($fName, $detailKeys)) || $fName == postvalue("category")) && array_key_exists($fName, $defvalues))
	{
		if((GetEditFormat($fName)==EDIT_FORMAT_LOOKUP_WIZARD || GetEditFormat($fName)==EDIT_FORMAT_RADIO) && GetpLookupType($fName) == LT_LOOKUPTABLE)
			$value=DisplayLookupWizard($fName,$defvalues[$fName],$defvalues,"",MODE_VIEW);
		elseif(NeedEncode($fName))
			$value = ProcessLargeText(GetData($defvalues,$fName, ViewFormat($fName)),"field=".rawurlencode(htmlspecialchars($fName)),"",MODE_VIEW);
		else
			$value = GetData($defvalues,$fName, ViewFormat($fName));
		
		$xt->assign($gfName."_editcontrol", $value);
	}
}
//fill tab groups name and sections name to controls
$pageObject->fillCntrlTabGroups();

//fill jsSettings and ControlsHTMLMap
$pageObject->fillSetCntrlMaps();

/////////////////////////////////////////////////////////////
if($pageObject->isShowDetailTables && ($inlineadd==ADD_SIMPLE || $inlineadd==ADD_POPUP))
{
	$options = array();
	//array of params for classes
	$options["mode"] = LIST_DETAILS;
	$options["pageType"] = PAGE_LIST;
	$options["masterPageType"] = PAGE_ADD;
	$options["mainMasterPageType"] = PAGE_ADD;
	$options['masterTable'] = $strTableName;
	$options['firstTime'] = 1;

	if(count($dpParams['ids']))
	{
		$xt->assign("detail_tables",true);
		include('classes/listpage.php');
		include('classes/listpage_embed.php');
		include('classes/listpage_dpinline.php');
		include("classes/searchclause.php");
	}
	
	$dControlsMap = array();
		
	$flyId = $ids+1;
	for($d=0;$d<count($dpParams['ids']);$d++)
	{
		$strTableName = $dpParams['strTableNames'][$d];
		include("include/".GetTableURL($strTableName)."_settings.php");
		$options['xt'] = new Xtempl();
		$options['id'] = $dpParams['ids'][$d];
		$options['flyId'] = $flyId++;
		$mkr=1;
		
		foreach($mKeys[$strTableName] as $mk)
		{
			if($defvalues[$mk])
				$options['masterKeysReq'][$mkr++] = $defvalues[$mk];
			else
				$options['masterKeysReq'][$mkr++] = '';
		}
		
		$listPageObject = ListPage::createListPage($strTableName,$options);
		// prepare code
		$listPageObject->prepareForBuildPage();
		$flyId = $listPageObject->recId+1;
		
		if($listPageObject->isDispGrid())
		{
			//add detail settings to master settings
			$listPageObject->fillSetCntrlMaps();
			$pageObject->jsSettings['tableSettings'][$strTableName]	= $listPageObject->jsSettings['tableSettings'][$strTableName];		
			$dControlsMap[$strTableName]['gridRows'] = $listPageObject->controlsHTMLMap[$strTableName][PAGE_LIST][$dpParams['ids'][$d]]['gridRows'];
			$dControlsMap[$strTableName]['video'] = $listPageObject->controlsHTMLMap[$strTableName][PAGE_LIST][$dpParams['ids'][$d]]['video'];
			$dControlsMap[$strTableName]['gMaps'] = $listPageObject->controlsHTMLMap[$strTableName][PAGE_LIST][$dpParams['ids'][$d]]['gMaps'];
			foreach($listPageObject->jsSettings['global']['shortTNames'] as $key=>$val)
			{
				if(!array_key_exists($key,$pageObject->jsSettings['global']['shortTNames']))
					$pageObject->jsSettings['global']['shortTNames'][$key] = $val;
			}	
			
			//Add detail's js files to master's files
			$pageObject->copyAllJSFiles($listPageObject->grabAllJSFiles());
			
			//Add detail's css files to master's files	
			$pageObject->copyAllCSSFiles($listPageObject->grabAllCSSFiles());
		}
		$xt->assign("displayDetailTable_".GoodFieldName($strTableName), array("func" => "showDetailTable","params" => array("dpObject" => $listPageObject, "dpParams" => $strTableName)));
	}
	$strTableName = "campaigns";
	$pageObject->controlsHTMLMap[$strTableName][PAGE_ADD][$id]['dControlsMap'] = $dControlsMap;	
}
/////////////////////////////////////////////////////////////

if($inlineadd == ADD_SIMPLE)
{
	$pageObject->body['end'] .= '<script>';
	$pageObject->body['end'] .= "window.controlsMap = '".jsreplace(my_json_encode($pageObject->controlsHTMLMap))."';";
	$pageObject->body['end'] .= "window.settings = '".jsreplace(my_json_encode($pageObject->jsSettings))."';";
	$pageObject->body['end'] .= '</script>';
}
else{
		$returnJSON['controlsMap'] = $pageObject->controlsHTMLMap;
		//if($isNeedSettings)
		$returnJSON['settings'] = $pageObject->jsSettings;	
	}

$pageObject->addCommonJs();

$jscode = $pageObject->PrepareJS();
if($inlineadd==ADD_SIMPLE)
{
	$pageObject->body["end"] .= "<script>".$jscode."</script>";
	$xt->assign("body",$pageObject->body);
	$xt->assign("flybody",true);
}
elseif($inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_MASTER || $inlineadd==ADD_POPUP)
{ 
	$xt->assign("footer","");
	$xt->assign("flybody",$pageObject->body);
	$xt->assign("body",true);
}	

$xt->assign("style_block",true);
$pageObject->xt->assign("legend", true);

if($eventObj->exists("BeforeShowAdd"))
	$eventObj->BeforeShowAdd($xt,$templatefile);

if($inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
{
	$xt->load_template($templatefile);
	$returnJSON['html'] = $xt->fetch_loaded('style_block').$xt->fetch_loaded('flybody');
	if($inlineadd==ADD_POPUP && $pageObject->isShowDetailTables)
		$returnJSON['html'].= $xt->fetch_loaded('detail_tables');
	$returnJSON['idStartFrom'] = $id+1;	
	echo (my_json_encode($returnJSON)); 
}
elseif ($inlineadd == ADD_INLINE)
{
	$xt->load_template($templatefile);
	$returnJSON["html"] = array();
	foreach($addFields as $fName)
	{
		$returnJSON["html"][$fName] = $xt->fetchVar(GoodFieldName($fName)."_editcontrol");	
	}	
	echo (my_json_encode($returnJSON)); 
}
else
	$xt->display($templatefile);

?>
