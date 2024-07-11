<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");


include("include/dbcommon.php");
include("include/supplies_variables.php");
include('include/xtempl.php');
include('classes/runnerpage.php');
include("classes/searchclause.php");

add_nocache_headers();

/////////////////////////////////////////////////////////////
//	check if logged in
/////////////////////////////////////////////////////////////
if(!@$_SESSION["UserID"] || !CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Edit"))
{ 
	$_SESSION["MyURL"]=$_SERVER["SCRIPT_NAME"]."?".$_SERVER["QUERY_STRING"];
	header("Location: login.php?message=expired"); 
	return;
}

/////////////////////////////////////////////////////////////
//init variables
/////////////////////////////////////////////////////////////
if(postvalue("editType")=="inline")
	$inlineedit = EDIT_INLINE;
elseif(postvalue("editType")==EDIT_POPUP)
	$inlineedit = EDIT_POPUP;
else
	$inlineedit = EDIT_SIMPLE;			

$id = postvalue("id");
if(intval($id)==0)
	$id = 1;

$flyId = $id+1;	
$xt = new Xtempl();

// assign an id		
$xt->assign("id",$id);

//array of params for classes
$params = array("pageType" => PAGE_EDIT,"id" => $id);

////////////////////// data picker

////////////////////// time picker

$params["useIbox"] = true;	

$params['tName'] = $strTableName;
$params['xt'] = &$xt;
$params['mode'] = $inlineedit;
$params['includes_js']=$includes_js;
$params['includes_jsreq']=$includes_jsreq;
$params['includes_css']=$includes_css;
$params['locale_info']=$locale_info;
$params['pageEditLikeInline'] = ($inlineedit == EDIT_INLINE);
//Get array of tabs for edit page
$params['useTabsOnEdit'] = useTabsOnEdit($strTableName);
if($params['useTabsOnEdit'])
	$params['arrEditTabs'] = GetEditTabs($strTableName);
$pageObject = new RunnerPage($params);

//	For ajax request 
if($_REQUEST["action"]!="")
{
	if($pageObject->lockingObj)
	{
		$arrkeys = explode("&",refine($_REQUEST["keys"]));
		foreach($arrkeys as $ind=>$val)
			$arrkeys[$ind]=urldecode($val);
		
		if($_REQUEST["action"]=="unlock")
		{
			$pageObject->lockingObj->UnlockRecord($strTableName,$arrkeys,$_REQUEST["sid"]);
			exit();	
		}
		else if($_REQUEST["action"]=="lockadmin" && (IsAdmin() || $_SESSION["AccessLevel"] == ACCESS_LEVEL_ADMINGROUP))
		{
			$pageObject->lockingObj->UnlockAdmin($strTableName,$arrkeys,$_REQUEST["startEdit"]=="yes");
			if($_REQUEST["startEdit"]=="no")
				echo "unlock";
			else if($_REQUEST["startEdit"]=="yes")
				echo "lock";
			exit();	
		}
		else if($_REQUEST["action"]=="confirm")
		{echo '<br>confirm';
			if(!$pageObject->lockingObj->ConfirmLock($strTableName,$arrkeys,$message));
				echo $message;
			exit();	
		}
	}
	else
		exit();
}

$filename = $status = $message = $mesClass = $usermessage = $strWhereClause = $bodyonload = "";
$showValues = $showRawValues = $showFields = $showDetailKeys = $key = $next = $prev = array();
$HaveData = $enableCtrlsForEditing = true;
$error_happened = $readevalues = $IsSaved = false;

$templatefile = "supplies_edit.htm";

$auditObj = GetAuditObject($strTableName);

// SearchClause class stuff
$pageObject->searchClauseObj->parseRequest();
$_SESSION[$strTableName.'_advsearch'] = serialize($pageObject->searchClauseObj);

//Get detail table keys	
$detailKeys = $pageObject->detailKeysByM;

//Array of fields, which appear on edit page
$editFields = $pageObject->getFieldsByPageType();

// add onload event
$onLoadJsCode = GetTableData($pageObject->tName, ".jsOnloadEdit", '');
$pageObject->addOnLoadJsEvent($onLoadJsCode);

if($pageObject->lockingObj)
{
	$system_attrs = "style='display:none;'";
	$system_message = "";
}

if ($inlineedit!=EDIT_INLINE)
{
	// add button events if exist
	$pageObject->addButtonHandlers();
}

$url_page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1,12);

//	Before Process event
if($eventObj->exists("BeforeProcessEdit"))
	$eventObj->BeforeProcessEdit($conn);

$keys = array();
$skeys = "";
$savedKeys = array();
$keys["id"]=urldecode(postvalue("editid1"));
$savedKeys["id"]=urldecode(postvalue("editid1"));
$skeys.=rawurlencode(postvalue("editid1"))."&";

if($skeys!="")
	$skeys = substr($skeys,0,-1);

//For show detail tables on master page edit
if($inlineedit!=EDIT_INLINE)	
{
	$dpParams = array();
	if($pageObject->isShowDetailTables)
	{
		$ids = $id;
		$pageObject->jsSettings['tableSettings'][$strTableName]['dpParams'] = array('tableNames'=>$dpParams['strTableNames'], 'ids'=>$dpParams['ids']);
		$pageObject->AddJSFile("include/detailspreview");
	}	
}	
/////////////////////////////////////////////////////////////
//	process entered data, read and save
/////////////////////////////////////////////////////////////

// proccess captcha
if ($inlineedit!=EDIT_INLINE)
	if($pageObject->captchaExists())
		$pageObject->doCaptchaCode();

if(@$_POST["a"] == "edited")
{
	$strWhereClause = whereAdd($strWhereClause,KeyWhere($keys));
		//	select only owned records
	$strWhereClause = whereAdd($strWhereClause,SecuritySQL("Edit"));
	$oldValuesRead = false;
	if($eventObj->exists("AfterEdit") || $eventObj->exists("BeforeEdit") || $auditObj)
	{
		//	read old values
		$rsold = db_query(gSQLWhere($strWhereClause), $conn);
		$dataold = db_fetch_array($rsold);
		$oldValuesRead = true;
	}
	$evalues = $efilename_values = $blobfields = array();
	

//	processing estate - begin
	$condition = $inlineedit!=EDIT_INLINE;//(!$inlineedit) edit simple mode

	if($condition)
	{
		$value = postvalue("value_estate_".$id);
		$type = postvalue("type_estate_".$id);
		if(FieldSubmitted("estate_".$id))
		{
				$value = prepare_for_db("estate",$value,$type);
		}
		else
			$value = false;
	
			if($value!==false)
		{	
	
	
	
	
	
			if(0 && "estate"=="password" && $url_page=="admin_users_")
				$value = md5($value);
			$evalues["estate"] = $value;
		
			}
	
		}
//	processing estate - end
//	processing zone_id - begin
	$condition = $inlineedit!=EDIT_INLINE;//(!$inlineedit) edit simple mode

	if($condition)
	{
		$value = postvalue("value_zone_id_".$id);
		$type = postvalue("type_zone_id_".$id);
		if(FieldSubmitted("zone_id_".$id))
		{
				$value = prepare_for_db("zone_id",$value,$type);
		}
		else
			$value = false;
	
			if($value!==false)
		{	
	
	
	
	
	
			if(0 && "zone_id"=="password" && $url_page=="admin_users_")
				$value = md5($value);
			$evalues["zone_id"] = $value;
		
			}
	
		}
//	processing zone_id - end
//	processing district_id - begin
	$condition = $inlineedit!=EDIT_INLINE;//(!$inlineedit) edit simple mode

	if($condition)
	{
		$value = postvalue("value_district_id_".$id);
		$type = postvalue("type_district_id_".$id);
		if(FieldSubmitted("district_id_".$id))
		{
				$value = prepare_for_db("district_id",$value,$type);
		}
		else
			$value = false;
	
			if($value!==false)
		{	
	
	
	
	
	
			if(0 && "district_id"=="password" && $url_page=="admin_users_")
				$value = md5($value);
			$evalues["district_id"] = $value;
		
			}
	
		}
//	processing district_id - end
//	processing supply_mode_id - begin
	$condition = $inlineedit!=EDIT_INLINE;//(!$inlineedit) edit simple mode

	if($condition)
	{
		$value = postvalue("value_supply_mode_id_".$id);
		$type = postvalue("type_supply_mode_id_".$id);
		if(FieldSubmitted("supply_mode_id_".$id))
		{
				$value = prepare_for_db("supply_mode_id",$value,$type);
		}
		else
			$value = false;
	
			if($value!==false)
		{	
	
	
	
	
	
			if(0 && "supply_mode_id"=="password" && $url_page=="admin_users_")
				$value = md5($value);
			$evalues["supply_mode_id"] = $value;
		
			}
	
		}
//	processing supply_mode_id - end
//	processing support_type_id - begin
	$condition = $inlineedit!=EDIT_INLINE;//(!$inlineedit) edit simple mode

	if($condition)
	{
		$value = postvalue("value_support_type_id_".$id);
		$type = postvalue("type_support_type_id_".$id);
		if(FieldSubmitted("support_type_id_".$id))
		{
				$value = prepare_for_db("support_type_id",$value,$type);
		}
		else
			$value = false;
	
			if($value!==false)
		{	
	
	
	
	
	
			if(0 && "support_type_id"=="password" && $url_page=="admin_users_")
				$value = md5($value);
			$evalues["support_type_id"] = $value;
		
			}
	
		}
//	processing support_type_id - end
//	processing area - begin
	$condition = $inlineedit!=EDIT_INLINE;//(!$inlineedit) edit simple mode

	if($condition)
	{
		$value = postvalue("value_area_".$id);
		$type = postvalue("type_area_".$id);
		if(FieldSubmitted("area_".$id))
		{
				$value = prepare_for_db("area",$value,$type);
		}
		else
			$value = false;
	
			if($value!==false)
		{	
	
	
	
	
	
			if(0 && "area"=="password" && $url_page=="admin_users_")
				$value = md5($value);
			$evalues["area"] = $value;
		
			}
	
		}
//	processing area - end
//	processing address - begin
	$condition = $inlineedit!=EDIT_INLINE;//(!$inlineedit) edit simple mode

	if($condition)
	{
		$value = postvalue("value_address_".$id);
		$type = postvalue("type_address_".$id);
		if(FieldSubmitted("address_".$id))
		{
				$value = prepare_for_db("address",$value,$type);
		}
		else
			$value = false;
	
			if($value!==false)
		{	
	
	
	
	
	
			if(0 && "address"=="password" && $url_page=="admin_users_")
				$value = md5($value);
			$evalues["address"] = $value;
		
			}
	
		}
//	processing address - end
//	processing unit_price - begin
	$condition = $inlineedit!=EDIT_INLINE;//(!$inlineedit) edit simple mode

	if($condition)
	{
		$value = postvalue("value_unit_price_".$id);
		$type = postvalue("type_unit_price_".$id);
		if(FieldSubmitted("unit_price_".$id))
		{
				$value = prepare_for_db("unit_price",$value,$type);
		}
		else
			$value = false;
	
			if($value!==false)
		{	
	
	
	
	
	
			if(0 && "unit_price"=="password" && $url_page=="admin_users_")
				$value = md5($value);
			$evalues["unit_price"] = $value;
		
			}
	
		}
//	processing unit_price - end
//	processing years - begin
	$condition = $inlineedit!=EDIT_INLINE;//(!$inlineedit) edit simple mode

	if($condition)
	{
		$value = postvalue("value_years_".$id);
		$type = postvalue("type_years_".$id);
		if(FieldSubmitted("years_".$id))
		{
				$value = prepare_for_db("years",$value,$type);
		}
		else
			$value = false;
	
			if($value!==false)
		{	
	
	
	
	
	
			if(0 && "years"=="password" && $url_page=="admin_users_")
				$value = md5($value);
			$evalues["years"] = $value;
		
			}
	
		}
//	processing years - end
//	processing rc - begin
	$condition = $inlineedit!=EDIT_INLINE;//(!$inlineedit) edit simple mode

	if($condition)
	{
		$value = postvalue("value_rc_".$id);
		$type = postvalue("type_rc_".$id);
		if(FieldSubmitted("rc_".$id))
		{
				$value = prepare_for_db("rc",$value,$type);
		}
		else
			$value = false;
	
			if($value!==false)
		{	
	
	
	
	
	
			if(0 && "rc"=="password" && $url_page=="admin_users_")
				$value = md5($value);
			$evalues["rc"] = $value;
		
			}
	
		}
//	processing rc - end
//	processing hc - begin
	$condition = $inlineedit!=EDIT_INLINE;//(!$inlineedit) edit simple mode

	if($condition)
	{
		$value = postvalue("value_hc_".$id);
		$type = postvalue("type_hc_".$id);
		if(FieldSubmitted("hc_".$id))
		{
				$value = prepare_for_db("hc",$value,$type);
		}
		else
			$value = false;
	
			if($value!==false)
		{	
	
	
	
	
	
			if(0 && "hc"=="password" && $url_page=="admin_users_")
				$value = md5($value);
			$evalues["hc"] = $value;
		
			}
	
		}
//	processing hc - end
//	processing sf - begin
	$condition = $inlineedit!=EDIT_INLINE;//(!$inlineedit) edit simple mode

	if($condition)
	{
		$value = postvalue("value_sf_".$id);
		$type = postvalue("type_sf_".$id);
		if(FieldSubmitted("sf_".$id))
		{
				$value = prepare_for_db("sf",$value,$type);
		}
		else
			$value = false;
	
			if($value!==false)
		{	
	
	
	
	
	
			if(0 && "sf"=="password" && $url_page=="admin_users_")
				$value = md5($value);
			$evalues["sf"] = $value;
		
			}
	
		}
//	processing sf - end
//	processing height_id - begin
	$condition = $inlineedit!=EDIT_INLINE;//(!$inlineedit) edit simple mode

	if($condition)
	{
		$value = postvalue("value_height_id_".$id);
		$type = postvalue("type_height_id_".$id);
		if(FieldSubmitted("height_id_".$id))
		{
				$value = prepare_for_db("height_id",$value,$type);
		}
		else
			$value = false;
	
			if($value!==false)
		{	
	
	
	
	
	
			if(0 && "height_id"=="password" && $url_page=="admin_users_")
				$value = md5($value);
			$evalues["height_id"] = $value;
		
			}
	
		}
//	processing height_id - end
//	processing ps_id - begin
	$condition = $inlineedit!=EDIT_INLINE;//(!$inlineedit) edit simple mode

	if($condition)
	{
		$value = postvalue("value_ps_id_".$id);
		$type = postvalue("type_ps_id_".$id);
		if(FieldSubmitted("ps_id_".$id))
		{
				$value = prepare_for_db("ps_id",$value,$type);
		}
		else
			$value = false;
	
			if($value!==false)
		{	
	
	
	
	
	
			if(0 && "ps_id"=="password" && $url_page=="admin_users_")
				$value = md5($value);
			$evalues["ps_id"] = $value;
		
			}
	
		}
//	processing ps_id - end
//	processing feature - begin
	$condition = $inlineedit!=EDIT_INLINE;//(!$inlineedit) edit simple mode

	if($condition)
	{
		$value = postvalue("value_feature_".$id);
		$type = postvalue("type_feature_".$id);
		if(FieldSubmitted("feature_".$id))
		{
				$value = prepare_for_db("feature",$value,$type);
		}
		else
			$value = false;
	
			if($value!==false)
		{	
	
	
	
	
	
			if(0 && "feature"=="password" && $url_page=="admin_users_")
				$value = md5($value);
			$evalues["feature"] = $value;
		
			}
	
		}
//	processing feature - end
//	processing remark - begin
	$condition = $inlineedit!=EDIT_INLINE;//(!$inlineedit) edit simple mode

	if($condition)
	{
		$value = postvalue("value_remark_".$id);
		$type = postvalue("type_remark_".$id);
		if(FieldSubmitted("remark_".$id))
		{
				$value = prepare_for_db("remark",$value,$type);
		}
		else
			$value = false;
	
			if($value!==false)
		{	
	
	
	
	
	
			if(0 && "remark"=="password" && $url_page=="admin_users_")
				$value = md5($value);
			$evalues["remark"] = $value;
		
			}
	
		}
//	processing remark - end
//	processing icon - begin
	$condition = $inlineedit!=EDIT_INLINE;//(!$inlineedit) edit simple mode

	if($condition)
	{
		$value = postvalue("value_icon_".$id);
		$type = postvalue("type_icon_".$id);
		if(FieldSubmitted("icon_".$id))
		{
			$fileNameForPrepareFunc = postvalue("filename_icon_".$id);
					if($fileNameForPrepareFunc)
				$value = $fileNameForPrepareFunc;
			if(substr($type,0,4)=="file")
				$value = prepare_file($value,"icon",$type,$fileNameForPrepareFunc ,$id);
			else if(substr($type,0,6)=="upload")
			{
				if($type=="upload1")
				{
// file deletion, read filename from the database
					if(!$oldValuesRead)
					{
						$rsold = db_query(gSQLWhere($strWhereClause), $conn);
						$dataold = db_fetch_array($rsold);
						$oldValuesRead = true;
					}
					$fileNameForPrepareFunc = $dataold["icon"];
				}
				$value = prepare_upload("icon",$type,$fileNameForPrepareFunc,$value,"" ,$id,$pageObject);
			}
		}
		else
			$value = false;
	
			if($value!==false)
		{	
				if($value)
				$contents = GetUploadedFileContents("value_icon_".$id);

						if($value)
			{
				$ext = CheckImageExtension(GetUploadedFileName("value_icon_".$id));
				$thumb = CreateThumbnail($contents,150,$ext);
				$pageObject->filesToSave[] = new SaveFile($thumb,"th".$value,GetUploadFolder("icon"), GetFieldData("","icon","Absolute",false));
			}

	
	
	
			if(0 && "icon"=="password" && $url_page=="admin_users_")
				$value = md5($value);
			$evalues["icon"] = $value;
		
			}
	
		}
//	processing icon - end
//	processing pic1 - begin
	$condition = $inlineedit!=EDIT_INLINE;//(!$inlineedit) edit simple mode

	if($condition)
	{
		$value = postvalue("value_pic1_".$id);
		$type = postvalue("type_pic1_".$id);
		if(FieldSubmitted("pic1_".$id))
		{
			$fileNameForPrepareFunc = postvalue("filename_pic1_".$id);
					if($fileNameForPrepareFunc)
				$value = $fileNameForPrepareFunc;
			if(substr($type,0,4)=="file")
				$value = prepare_file($value,"pic1",$type,$fileNameForPrepareFunc ,$id);
			else if(substr($type,0,6)=="upload")
			{
				if($type=="upload1")
				{
// file deletion, read filename from the database
					if(!$oldValuesRead)
					{
						$rsold = db_query(gSQLWhere($strWhereClause), $conn);
						$dataold = db_fetch_array($rsold);
						$oldValuesRead = true;
					}
					$fileNameForPrepareFunc = $dataold["pic1"];
				}
				$value = prepare_upload("pic1",$type,$fileNameForPrepareFunc,$value,"" ,$id,$pageObject);
			}
		}
		else
			$value = false;
	
			if($value!==false)
		{	
				if($value)
				$contents = GetUploadedFileContents("value_pic1_".$id);

						if($value)
			{
				$ext = CheckImageExtension(GetUploadedFileName("value_pic1_".$id));
				$thumb = CreateThumbnail($contents,150,$ext);
				$pageObject->filesToSave[] = new SaveFile($thumb,"th".$value,GetUploadFolder("pic1"), GetFieldData("","pic1","Absolute",false));
			}

	
	
	
			if(0 && "pic1"=="password" && $url_page=="admin_users_")
				$value = md5($value);
			$evalues["pic1"] = $value;
		
			}
	
		}
//	processing pic1 - end
//	processing pic2 - begin
	$condition = $inlineedit!=EDIT_INLINE;//(!$inlineedit) edit simple mode

	if($condition)
	{
		$value = postvalue("value_pic2_".$id);
		$type = postvalue("type_pic2_".$id);
		if(FieldSubmitted("pic2_".$id))
		{
			$fileNameForPrepareFunc = postvalue("filename_pic2_".$id);
					if($fileNameForPrepareFunc)
				$value = $fileNameForPrepareFunc;
			if(substr($type,0,4)=="file")
				$value = prepare_file($value,"pic2",$type,$fileNameForPrepareFunc ,$id);
			else if(substr($type,0,6)=="upload")
			{
				if($type=="upload1")
				{
// file deletion, read filename from the database
					if(!$oldValuesRead)
					{
						$rsold = db_query(gSQLWhere($strWhereClause), $conn);
						$dataold = db_fetch_array($rsold);
						$oldValuesRead = true;
					}
					$fileNameForPrepareFunc = $dataold["pic2"];
				}
				$value = prepare_upload("pic2",$type,$fileNameForPrepareFunc,$value,"" ,$id,$pageObject);
			}
		}
		else
			$value = false;
	
			if($value!==false)
		{	
				if($value)
				$contents = GetUploadedFileContents("value_pic2_".$id);

						if($value)
			{
				$ext = CheckImageExtension(GetUploadedFileName("value_pic2_".$id));
				$thumb = CreateThumbnail($contents,150,$ext);
				$pageObject->filesToSave[] = new SaveFile($thumb,"th".$value,GetUploadFolder("pic2"), GetFieldData("","pic2","Absolute",false));
			}

	
	
	
			if(0 && "pic2"=="password" && $url_page=="admin_users_")
				$value = md5($value);
			$evalues["pic2"] = $value;
		
			}
	
		}
//	processing pic2 - end
//	processing pic3 - begin
	$condition = $inlineedit!=EDIT_INLINE;//(!$inlineedit) edit simple mode

	if($condition)
	{
		$value = postvalue("value_pic3_".$id);
		$type = postvalue("type_pic3_".$id);
		if(FieldSubmitted("pic3_".$id))
		{
			$fileNameForPrepareFunc = postvalue("filename_pic3_".$id);
					if($fileNameForPrepareFunc)
				$value = $fileNameForPrepareFunc;
			if(substr($type,0,4)=="file")
				$value = prepare_file($value,"pic3",$type,$fileNameForPrepareFunc ,$id);
			else if(substr($type,0,6)=="upload")
			{
				if($type=="upload1")
				{
// file deletion, read filename from the database
					if(!$oldValuesRead)
					{
						$rsold = db_query(gSQLWhere($strWhereClause), $conn);
						$dataold = db_fetch_array($rsold);
						$oldValuesRead = true;
					}
					$fileNameForPrepareFunc = $dataold["pic3"];
				}
				$value = prepare_upload("pic3",$type,$fileNameForPrepareFunc,$value,"" ,$id,$pageObject);
			}
		}
		else
			$value = false;
	
			if($value!==false)
		{	
				if($value)
				$contents = GetUploadedFileContents("value_pic3_".$id);

						if($value)
			{
				$ext = CheckImageExtension(GetUploadedFileName("value_pic3_".$id));
				$thumb = CreateThumbnail($contents,150,$ext);
				$pageObject->filesToSave[] = new SaveFile($thumb,"th".$value,GetUploadFolder("pic3"), GetFieldData("","pic3","Absolute",false));
			}

	
	
	
			if(0 && "pic3"=="password" && $url_page=="admin_users_")
				$value = md5($value);
			$evalues["pic3"] = $value;
		
			}
	
		}
//	processing pic3 - end
//	processing pic4 - begin
	$condition = $inlineedit!=EDIT_INLINE;//(!$inlineedit) edit simple mode

	if($condition)
	{
		$value = postvalue("value_pic4_".$id);
		$type = postvalue("type_pic4_".$id);
		if(FieldSubmitted("pic4_".$id))
		{
			$fileNameForPrepareFunc = postvalue("filename_pic4_".$id);
					if($fileNameForPrepareFunc)
				$value = $fileNameForPrepareFunc;
			if(substr($type,0,4)=="file")
				$value = prepare_file($value,"pic4",$type,$fileNameForPrepareFunc ,$id);
			else if(substr($type,0,6)=="upload")
			{
				if($type=="upload1")
				{
// file deletion, read filename from the database
					if(!$oldValuesRead)
					{
						$rsold = db_query(gSQLWhere($strWhereClause), $conn);
						$dataold = db_fetch_array($rsold);
						$oldValuesRead = true;
					}
					$fileNameForPrepareFunc = $dataold["pic4"];
				}
				$value = prepare_upload("pic4",$type,$fileNameForPrepareFunc,$value,"" ,$id,$pageObject);
			}
		}
		else
			$value = false;
	
			if($value!==false)
		{	
				if($value)
				$contents = GetUploadedFileContents("value_pic4_".$id);

						if($value)
			{
				$ext = CheckImageExtension(GetUploadedFileName("value_pic4_".$id));
				$thumb = CreateThumbnail($contents,150,$ext);
				$pageObject->filesToSave[] = new SaveFile($thumb,"th".$value,GetUploadFolder("pic4"), GetFieldData("","pic4","Absolute",false));
			}

	
	
	
			if(0 && "pic4"=="password" && $url_page=="admin_users_")
				$value = md5($value);
			$evalues["pic4"] = $value;
		
			}
	
		}
//	processing pic4 - end
//	processing pic5 - begin
	$condition = $inlineedit!=EDIT_INLINE;//(!$inlineedit) edit simple mode

	if($condition)
	{
		$value = postvalue("value_pic5_".$id);
		$type = postvalue("type_pic5_".$id);
		if(FieldSubmitted("pic5_".$id))
		{
			$fileNameForPrepareFunc = postvalue("filename_pic5_".$id);
					if($fileNameForPrepareFunc)
				$value = $fileNameForPrepareFunc;
			if(substr($type,0,4)=="file")
				$value = prepare_file($value,"pic5",$type,$fileNameForPrepareFunc ,$id);
			else if(substr($type,0,6)=="upload")
			{
				if($type=="upload1")
				{
// file deletion, read filename from the database
					if(!$oldValuesRead)
					{
						$rsold = db_query(gSQLWhere($strWhereClause), $conn);
						$dataold = db_fetch_array($rsold);
						$oldValuesRead = true;
					}
					$fileNameForPrepareFunc = $dataold["pic5"];
				}
				$value = prepare_upload("pic5",$type,$fileNameForPrepareFunc,$value,"" ,$id,$pageObject);
			}
		}
		else
			$value = false;
	
			if($value!==false)
		{	
				if($value)
				$contents = GetUploadedFileContents("value_pic5_".$id);

						if($value)
			{
				$ext = CheckImageExtension(GetUploadedFileName("value_pic5_".$id));
				$thumb = CreateThumbnail($contents,150,$ext);
				$pageObject->filesToSave[] = new SaveFile($thumb,"th".$value,GetUploadFolder("pic5"), GetFieldData("","pic5","Absolute",false));
			}

	
	
	
			if(0 && "pic5"=="password" && $url_page=="admin_users_")
				$value = md5($value);
			$evalues["pic5"] = $value;
		
			}
	
		}
//	processing pic5 - end
//	processing pic6 - begin
	$condition = $inlineedit!=EDIT_INLINE;//(!$inlineedit) edit simple mode

	if($condition)
	{
		$value = postvalue("value_pic6_".$id);
		$type = postvalue("type_pic6_".$id);
		if(FieldSubmitted("pic6_".$id))
		{
			$fileNameForPrepareFunc = postvalue("filename_pic6_".$id);
					if($fileNameForPrepareFunc)
				$value = $fileNameForPrepareFunc;
			if(substr($type,0,4)=="file")
				$value = prepare_file($value,"pic6",$type,$fileNameForPrepareFunc ,$id);
			else if(substr($type,0,6)=="upload")
			{
				if($type=="upload1")
				{
// file deletion, read filename from the database
					if(!$oldValuesRead)
					{
						$rsold = db_query(gSQLWhere($strWhereClause), $conn);
						$dataold = db_fetch_array($rsold);
						$oldValuesRead = true;
					}
					$fileNameForPrepareFunc = $dataold["pic6"];
				}
				$value = prepare_upload("pic6",$type,$fileNameForPrepareFunc,$value,"" ,$id,$pageObject);
			}
		}
		else
			$value = false;
	
			if($value!==false)
		{	
				if($value)
				$contents = GetUploadedFileContents("value_pic6_".$id);

						if($value)
			{
				$ext = CheckImageExtension(GetUploadedFileName("value_pic6_".$id));
				$thumb = CreateThumbnail($contents,150,$ext);
				$pageObject->filesToSave[] = new SaveFile($thumb,"th".$value,GetUploadFolder("pic6"), GetFieldData("","pic6","Absolute",false));
			}

	
	
	
			if(0 && "pic6"=="password" && $url_page=="admin_users_")
				$value = md5($value);
			$evalues["pic6"] = $value;
		
			}
	
		}
//	processing pic6 - end
//	processing pic7 - begin
	$condition = $inlineedit!=EDIT_INLINE;//(!$inlineedit) edit simple mode

	if($condition)
	{
		$value = postvalue("value_pic7_".$id);
		$type = postvalue("type_pic7_".$id);
		if(FieldSubmitted("pic7_".$id))
		{
			$fileNameForPrepareFunc = postvalue("filename_pic7_".$id);
					if($fileNameForPrepareFunc)
				$value = $fileNameForPrepareFunc;
			if(substr($type,0,4)=="file")
				$value = prepare_file($value,"pic7",$type,$fileNameForPrepareFunc ,$id);
			else if(substr($type,0,6)=="upload")
			{
				if($type=="upload1")
				{
// file deletion, read filename from the database
					if(!$oldValuesRead)
					{
						$rsold = db_query(gSQLWhere($strWhereClause), $conn);
						$dataold = db_fetch_array($rsold);
						$oldValuesRead = true;
					}
					$fileNameForPrepareFunc = $dataold["pic7"];
				}
				$value = prepare_upload("pic7",$type,$fileNameForPrepareFunc,$value,"" ,$id,$pageObject);
			}
		}
		else
			$value = false;
	
			if($value!==false)
		{	
				if($value)
				$contents = GetUploadedFileContents("value_pic7_".$id);

						if($value)
			{
				$ext = CheckImageExtension(GetUploadedFileName("value_pic7_".$id));
				$thumb = CreateThumbnail($contents,150,$ext);
				$pageObject->filesToSave[] = new SaveFile($thumb,"th".$value,GetUploadFolder("pic7"), GetFieldData("","pic7","Absolute",false));
			}

	
	
	
			if(0 && "pic7"=="password" && $url_page=="admin_users_")
				$value = md5($value);
			$evalues["pic7"] = $value;
		
			}
	
		}
//	processing pic7 - end
//	processing pic8 - begin
	$condition = $inlineedit!=EDIT_INLINE;//(!$inlineedit) edit simple mode

	if($condition)
	{
		$value = postvalue("value_pic8_".$id);
		$type = postvalue("type_pic8_".$id);
		if(FieldSubmitted("pic8_".$id))
		{
			$fileNameForPrepareFunc = postvalue("filename_pic8_".$id);
					if($fileNameForPrepareFunc)
				$value = $fileNameForPrepareFunc;
			if(substr($type,0,4)=="file")
				$value = prepare_file($value,"pic8",$type,$fileNameForPrepareFunc ,$id);
			else if(substr($type,0,6)=="upload")
			{
				if($type=="upload1")
				{
// file deletion, read filename from the database
					if(!$oldValuesRead)
					{
						$rsold = db_query(gSQLWhere($strWhereClause), $conn);
						$dataold = db_fetch_array($rsold);
						$oldValuesRead = true;
					}
					$fileNameForPrepareFunc = $dataold["pic8"];
				}
				$value = prepare_upload("pic8",$type,$fileNameForPrepareFunc,$value,"" ,$id,$pageObject);
			}
		}
		else
			$value = false;
	
			if($value!==false)
		{	
				if($value)
				$contents = GetUploadedFileContents("value_pic8_".$id);

						if($value)
			{
				$ext = CheckImageExtension(GetUploadedFileName("value_pic8_".$id));
				$thumb = CreateThumbnail($contents,150,$ext);
				$pageObject->filesToSave[] = new SaveFile($thumb,"th".$value,GetUploadFolder("pic8"), GetFieldData("","pic8","Absolute",false));
			}

	
	
	
			if(0 && "pic8"=="password" && $url_page=="admin_users_")
				$value = md5($value);
			$evalues["pic8"] = $value;
		
			}
	
		}
//	processing pic8 - end

	foreach($efilename_values as $ekey=>$value)
		$evalues[$ekey] = $value;
		
	if($pageObject->lockingObj)
	{
		$lockmessage = "";
		if(!$pageObject->lockingObj->ConfirmLock($strTableName,$savedKeys,$lockmessage))
		{
			$enableCtrlsForEditing = false;
			$system_attrs = "style='display:block;'";
			if($inlineedit == EDIT_INLINE)
			{
				if(IsAdmin() || $_SESSION["AccessLevel"] == ACCESS_LEVEL_ADMINGROUP)
					$lockmessage = $pageObject->lockingObj->GetLockInfo($strTableName,$savedKeys,false,$id);
				
				$returnJSON['success'] = false;
				$returnJSON['message'] = $lockmessage;
				$returnJSON['enableCtrls'] = $enableCtrlsForEditing;
				$returnJSON['confirmTime'] = $pageObject->lockingObj->ConfirmTime;
				echo "<textarea>".htmlspecialchars(my_json_encode($returnJSON))."</textarea>";
				exit();
			}
			else
			{
				if(IsAdmin() || $_SESSION["AccessLevel"] == ACCESS_LEVEL_ADMINGROUP)
					$system_message = $pageObject->lockingObj->GetLockInfo($strTableName,$savedKeys,true,$id);
				else
					$system_message = $lockmessage;
			}
			$status = "DECLINED";
			$readevalues = true;
		}
	}
	
	if($readevalues==false)
	{
	//	do event
		$retval = true;
		if($eventObj->exists("BeforeEdit"))
			$retval=$eventObj->BeforeEdit($evalues,$strWhereClause,$dataold,$keys,$usermessage,(bool)$inlineedit);
		if($retval && $pageObject->isCaptchaOk)
		{		
			if($inlineedit!=EDIT_INLINE)
				$_SESSION[$strTableName."_count_captcha"] = $_SESSION[$strTableName."_count_captcha"]+1;
				
			if(DoUpdateRecord($strOriginalTableName,$evalues,$blobfields,$strWhereClause,$id,$pageObject))
			{
				$IsSaved = true;
				
				//	after edit event
				if($pageObject->lockingObj && $inlineedit == EDIT_INLINE)
					$pageObject->lockingObj->UnlockRecord($strTableName,$savedKeys,"");
				if($auditObj || $eventObj->exists("AfterEdit"))
				{
					foreach($dataold as $idx=>$val)
					{
						if(!array_key_exists($idx,$evalues))
							$evalues[$idx] = $val;
					}
				}

				if($auditObj)
					$auditObj->LogEdit($strTableName,$evalues,$dataold,$keys);
				if($eventObj->exists("AfterEdit"))
					$eventObj->AfterEdit($evalues,KeyWhere($keys),$dataold,$keys,(bool)$inlineedit);
							
				$mesClass = "mes_ok";	
			}
			elseif($inlineedit!=EDIT_INLINE)
				$mesClass = "mes_not";	
		}
		else
		{
			$message = $usermessage;
			$readevalues = true;
			$status = "DECLINED";
		}
	}
	if($readevalues)
		$keys = $savedKeys;
}
//else
{
	/////////////////////////
	//Locking recors
	/////////////////////////

	if($pageObject->lockingObj)
	{
		$enableCtrlsForEditing = $pageObject->lockingObj->LockRecord($strTableName,$keys);
		if(!$enableCtrlsForEditing)
		{
			if($inlineedit == EDIT_INLINE)
			{
				if(IsAdmin() || $_SESSION["AccessLevel"] == ACCESS_LEVEL_ADMINGROUP)
					$lockmessage = $pageObject->lockingObj->GetLockInfo($strTableName,$keys,false,$id);
				else
					$lockmessage = $pageObject->lockingObj->LockUser;
				$returnJSON['success'] = false;
				$returnJSON['message'] = $lockmessage;
				$returnJSON['enableCtrls'] = $enableCtrlsForEditing;
				$returnJSON['confirmTime'] = $pageObject->lockingObj->ConfirmTime;
				echo my_json_encode($returnJSON);
				exit();
			}
			
			$system_attrs = "style='display:block;'";
			$system_message = $pageObject->lockingObj->LockUser;
			
			if(IsAdmin() || $_SESSION["AccessLevel"] == ACCESS_LEVEL_ADMINGROUP)
			{
				$rb = $pageObject->lockingObj->GetLockInfo($strTableName,$keys,true,$id);
				if($rb!="")
					$system_message = $rb;
			}
		}
	}
}

if($pageObject->lockingObj && $inlineedit!=EDIT_INLINE)
	$pageObject->body["begin"] .='<div id="system_div'.$id.'" class="admin_message" '.$system_attrs.'>'.$system_message.'</div>';

$message = "<div class='message ".$mesClass."'>".$message."</div>";

// PRG rule, to avoid POSTDATA resend
if ($IsSaved && no_output_done() && $inlineedit == EDIT_SIMPLE)
{
	// saving message
	$_SESSION["message"] = ($message ? $message : "");
	// key get query
	$keyGetQ = "";
		$keyGetQ.="editid1=".rawurldecode($keys["id"])."&";
	// cut last &
	$keyGetQ = substr($keyGetQ, 0, strlen($keyGetQ)-1);	
	// redirect
	header("Location: supplies_".$pageObject->getPageType().".php?".$keyGetQ);
	// turned on output buffering, so we need to stop script
	exit();
}
// for PRG rule, to avoid POSTDATA resend. Saving mess in session
if ($inlineedit == EDIT_SIMPLE && isset($_SESSION["message"]))
{
	$message = $_SESSION["message"];
	unset($_SESSION["message"]);
}

/////////////////////////////////////////////////////////////
//	read current values from the database
/////////////////////////////////////////////////////////////
$query = $queryData_supplies->Copy();

$strWhereClause = KeyWhere($keys);
//	select only owned records
$strWhereClause = whereAdd($strWhereClause,SecuritySQL("Edit"));
$strSQL = gSQLWhere($strWhereClause);

$strSQLbak = $strSQL;
//	Before Query event
if($eventObj->exists("BeforeQueryEdit"))
	$eventObj->BeforeQueryEdit($strSQL, $strWhereClause);

if($strSQLbak == $strSQL)
	$strSQL = gSQLWhere($strWhereClause);
	
LogInfo($strSQL);

$rs = db_query($strSQL, $conn);
$data = db_fetch_array($rs);
if(!$data)
{
	if($inlineedit == EDIT_SIMPLE)
	{
		header("Location: supplies_list.php?a=return");
		exit();
	}
	else
		$data = array();
}

$readonlyfields = array();


if($readevalues)
{
	$data["estate"] = $evalues["estate"];
	$data["zone_id"] = $evalues["zone_id"];
	$data["district_id"] = $evalues["district_id"];
	$data["supply_mode_id"] = $evalues["supply_mode_id"];
	$data["support_type_id"] = $evalues["support_type_id"];
	$data["area"] = $evalues["area"];
	$data["address"] = $evalues["address"];
	$data["unit_price"] = $evalues["unit_price"];
	$data["years"] = $evalues["years"];
	$data["rc"] = $evalues["rc"];
	$data["hc"] = $evalues["hc"];
	$data["sf"] = $evalues["sf"];
	$data["height_id"] = $evalues["height_id"];
	$data["ps_id"] = $evalues["ps_id"];
	$data["feature"] = $evalues["feature"];
	$data["remark"] = $evalues["remark"];
}

if($eventObj->exists("ProcessValuesEdit"))
	$eventObj->ProcessValuesEdit($data);

/////////////////////////////////////////////////////////////
//	assign values to $xt class, prepare page for displaying
/////////////////////////////////////////////////////////////
//Basic includes js files
$includes = "";
//javascript code
	
if($inlineedit != EDIT_INLINE)
{
	if($inlineedit == EDIT_SIMPLE)
	{
		$includes.= "<script language=\"JavaScript\" src=\"include/jquery.js\"></script>\r\n";
			
		if ($pageObject->debugJSMode === true)
		{
			/*$includes.="<script type=\"text/javascript\" src=\"include/runnerJS/Runner.js\"></script>\r\n".
				"<script type=\"text/javascript\" src=\"include/runnerJS/Util.js\"></script>\r\n".
				"<script type=\"text/javascript\" src=\"include/runnerJS/Observer.js\"></script>\r\n";*/
			$includes.="<script language=\"JavaScript\" src=\"include/runnerJS/RunnerBase.js\"></script>\r\n";
		}
		else
			$includes.= "<script language=\"JavaScript\" src=\"include/runnerJS/RunnerBase.js\"></script>\r\n";
			
		$includes.= "<script language=\"JavaScript\" src=\"include/jsfunctions.js\"></script>\r\n";
		$includes.= "<div id=\"search_suggest".$id."\"></div>\r\n";
		if($pageObject->isShowDetailTables)
			$includes.= "<div id=\"master_details\" onmouseover=\"RollDetailsLink.showPopup();\" onmouseout=\"RollDetailsLink.hidePopup();\"> </div>";
		$pageObject->body["begin"].= $includes;
	}	

	if(!$pageObject->isAppearOnTabs("estate"))
		$xt->assign("estate_fieldblock",true);
	else
		$xt->assign("estate_tabfieldblock",true);
	$xt->assign("estate_label",true);
	if(isEnableSection508())
		$xt->assign_section("estate_label","<label for=\"".GetInputElementId("estate", $id)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("zone_id"))
		$xt->assign("zone_id_fieldblock",true);
	else
		$xt->assign("zone_id_tabfieldblock",true);
	$xt->assign("zone_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("zone_id_label","<label for=\"".GetInputElementId("zone_id", $id)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("district_id"))
		$xt->assign("district_id_fieldblock",true);
	else
		$xt->assign("district_id_tabfieldblock",true);
	$xt->assign("district_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("district_id_label","<label for=\"".GetInputElementId("district_id", $id)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("supply_mode_id"))
		$xt->assign("supply_mode_id_fieldblock",true);
	else
		$xt->assign("supply_mode_id_tabfieldblock",true);
	$xt->assign("supply_mode_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("supply_mode_id_label","<label for=\"".GetInputElementId("supply_mode_id", $id)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("support_type_id"))
		$xt->assign("support_type_id_fieldblock",true);
	else
		$xt->assign("support_type_id_tabfieldblock",true);
	$xt->assign("support_type_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("support_type_id_label","<label for=\"".GetInputElementId("support_type_id", $id)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("area"))
		$xt->assign("area_fieldblock",true);
	else
		$xt->assign("area_tabfieldblock",true);
	$xt->assign("area_label",true);
	if(isEnableSection508())
		$xt->assign_section("area_label","<label for=\"".GetInputElementId("area", $id)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("address"))
		$xt->assign("address_fieldblock",true);
	else
		$xt->assign("address_tabfieldblock",true);
	$xt->assign("address_label",true);
	if(isEnableSection508())
		$xt->assign_section("address_label","<label for=\"".GetInputElementId("address", $id)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("unit_price"))
		$xt->assign("unit_price_fieldblock",true);
	else
		$xt->assign("unit_price_tabfieldblock",true);
	$xt->assign("unit_price_label",true);
	if(isEnableSection508())
		$xt->assign_section("unit_price_label","<label for=\"".GetInputElementId("unit_price", $id)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("years"))
		$xt->assign("years_fieldblock",true);
	else
		$xt->assign("years_tabfieldblock",true);
	$xt->assign("years_label",true);
	if(isEnableSection508())
		$xt->assign_section("years_label","<label for=\"".GetInputElementId("years", $id)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("rc"))
		$xt->assign("rc_fieldblock",true);
	else
		$xt->assign("rc_tabfieldblock",true);
	$xt->assign("rc_label",true);
	if(isEnableSection508())
		$xt->assign_section("rc_label","<label for=\"".GetInputElementId("rc", $id)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("hc"))
		$xt->assign("hc_fieldblock",true);
	else
		$xt->assign("hc_tabfieldblock",true);
	$xt->assign("hc_label",true);
	if(isEnableSection508())
		$xt->assign_section("hc_label","<label for=\"".GetInputElementId("hc", $id)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("sf"))
		$xt->assign("sf_fieldblock",true);
	else
		$xt->assign("sf_tabfieldblock",true);
	$xt->assign("sf_label",true);
	if(isEnableSection508())
		$xt->assign_section("sf_label","<label for=\"".GetInputElementId("sf", $id)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("height_id"))
		$xt->assign("height_id_fieldblock",true);
	else
		$xt->assign("height_id_tabfieldblock",true);
	$xt->assign("height_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("height_id_label","<label for=\"".GetInputElementId("height_id", $id)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("ps_id"))
		$xt->assign("ps_id_fieldblock",true);
	else
		$xt->assign("ps_id_tabfieldblock",true);
	$xt->assign("ps_id_label",true);
	if(isEnableSection508())
		$xt->assign_section("ps_id_label","<label for=\"".GetInputElementId("ps_id", $id)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("feature"))
		$xt->assign("feature_fieldblock",true);
	else
		$xt->assign("feature_tabfieldblock",true);
	$xt->assign("feature_label",true);
	if(isEnableSection508())
		$xt->assign_section("feature_label","<label for=\"".GetInputElementId("feature", $id)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("remark"))
		$xt->assign("remark_fieldblock",true);
	else
		$xt->assign("remark_tabfieldblock",true);
	$xt->assign("remark_label",true);
	if(isEnableSection508())
		$xt->assign_section("remark_label","<label for=\"".GetInputElementId("remark", $id)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("icon"))
		$xt->assign("icon_fieldblock",true);
	else
		$xt->assign("icon_tabfieldblock",true);
	$xt->assign("icon_label",true);
	if(isEnableSection508())
		$xt->assign_section("icon_label","<label for=\"".GetInputElementId("icon", $id)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("pic1"))
		$xt->assign("pic1_fieldblock",true);
	else
		$xt->assign("pic1_tabfieldblock",true);
	$xt->assign("pic1_label",true);
	if(isEnableSection508())
		$xt->assign_section("pic1_label","<label for=\"".GetInputElementId("pic1", $id)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("pic2"))
		$xt->assign("pic2_fieldblock",true);
	else
		$xt->assign("pic2_tabfieldblock",true);
	$xt->assign("pic2_label",true);
	if(isEnableSection508())
		$xt->assign_section("pic2_label","<label for=\"".GetInputElementId("pic2", $id)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("pic3"))
		$xt->assign("pic3_fieldblock",true);
	else
		$xt->assign("pic3_tabfieldblock",true);
	$xt->assign("pic3_label",true);
	if(isEnableSection508())
		$xt->assign_section("pic3_label","<label for=\"".GetInputElementId("pic3", $id)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("pic4"))
		$xt->assign("pic4_fieldblock",true);
	else
		$xt->assign("pic4_tabfieldblock",true);
	$xt->assign("pic4_label",true);
	if(isEnableSection508())
		$xt->assign_section("pic4_label","<label for=\"".GetInputElementId("pic4", $id)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("pic5"))
		$xt->assign("pic5_fieldblock",true);
	else
		$xt->assign("pic5_tabfieldblock",true);
	$xt->assign("pic5_label",true);
	if(isEnableSection508())
		$xt->assign_section("pic5_label","<label for=\"".GetInputElementId("pic5", $id)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("pic6"))
		$xt->assign("pic6_fieldblock",true);
	else
		$xt->assign("pic6_tabfieldblock",true);
	$xt->assign("pic6_label",true);
	if(isEnableSection508())
		$xt->assign_section("pic6_label","<label for=\"".GetInputElementId("pic6", $id)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("pic7"))
		$xt->assign("pic7_fieldblock",true);
	else
		$xt->assign("pic7_tabfieldblock",true);
	$xt->assign("pic7_label",true);
	if(isEnableSection508())
		$xt->assign_section("pic7_label","<label for=\"".GetInputElementId("pic7", $id)."\">","</label>");
		
	if(!$pageObject->isAppearOnTabs("pic8"))
		$xt->assign("pic8_fieldblock",true);
	else
		$xt->assign("pic8_tabfieldblock",true);
	$xt->assign("pic8_label",true);
	if(isEnableSection508())
		$xt->assign_section("pic8_label","<label for=\"".GetInputElementId("pic8", $id)."\">","</label>");
		

	$xt->assign("show_key1", htmlspecialchars(GetData($data,"id", "")));
	//$xt->assign('editForm',true);
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Begin Next Prev button
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////    
	if(!@$_SESSION[$strTableName."_noNextPrev"] && $inlineedit == EDIT_SIMPLE)
	{
		$next = array();
		$prev = array();
		$pageObject->getNextPrevRecordKeys($data,"Edit",$next,$prev);
	}
	$nextlink = $prevlink = "";
	if(count($next))
	{
		$xt->assign("next_button",true);
				$nextlink.= "editid1=".htmlspecialchars(rawurlencode($next[1]));
		$xt->assign("nextbutton_attrs","id=\"nextButton".$id."\" align=\"absmiddle\"");
	}
	else 
		$xt->assign("next_button",false);
	if(count($prev))
	{
		$xt->assign("prev_button",true);
				$prevlink.= "editid1=".htmlspecialchars(rawurlencode($prev[1]));
		$xt->assign("prevbutton_attrs","id=\"prevButton".$id."\" align=\"absmiddle\"");
	}
	else 
		$xt->assign("prev_button",false);
	
	
	$xt->assign("resetbutton_attrs",'id="resetButton'.$id.'"');
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//End Next Prev button
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////    
	if($inlineedit == EDIT_SIMPLE)
	{
		$xt->assign("back_button",true);
		$xt->assign("backbutton_attrs","id=\"backButton".$id."\"");
	}
	// onmouseover event, for changing focus. Needed to proper submit form
	$onmouseover = "this.focus();";
	$onmouseover = 'onmouseover="'.$onmouseover.'"';
	
	$xt->assign("save_button",true);
	if(!$enableCtrlsForEditing)
		$xt->assign("savebutton_attrs", "id=\"saveButton".$id."\" disabled=\"true\" style='background-color:#dcdcdc' ".$onmouseover);
	else
		$xt->assign("savebutton_attrs", "id=\"saveButton".$id."\"".$onmouseover);
		
	$xt->assign("reset_button",true);
}

if($message)
{
	$xt->assign("message_block",true);
	$xt->assign("message",$message);
}
/////////////////////////////////////////////////////////////
//process readonly and auto-update fields
/////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////
//	prepare Edit Controls
/////////////////////////////////////////////////////////////
//	validation stuff
$regex = '';
$regexmessage = '';
$regextype = '';
$control = array();

foreach($editFields as $fName)
{
	$gfName = GoodFieldName($fName);
	$controls = array('controls'=>array());
	if (!$detailKeys || !in_array($fName, $detailKeys))
	{		
		$control[$gfName] = array();
		$control[$gfName]["func"]="xt_buildeditcontrol";
		$control[$gfName]["params"] = array();
		$control[$gfName]["params"]["id"] = $id;
		$control[$gfName]["params"]["field"] = $fName;
		$control[$gfName]["params"]["value"] = @$data[$fName];
		
		//	Begin Add validation
		$arrValidate = getValidation($fName,$strTableName);	
		$control[$gfName]["params"]["validate"] = $arrValidate;
		//	End Add validation	
		$additionalCtrlParams = array();
		$additionalCtrlParams["disabled"] = !$enableCtrlsForEditing;
		$control[$gfName]["params"]["additionalCtrlParams"] = $additionalCtrlParams;
	}
	$controls["controls"]['ctrlInd'] = 0;
	$controls["controls"]['id'] = $id;
	$controls["controls"]['fieldName'] = $fName;
	
	if($inlineedit == EDIT_INLINE)
	{
		if(!$detailKeys || !in_array($fName, $detailKeys))
			$control[$gfName]["params"]["mode"]="inline_edit";
		$controls["controls"]['mode'] = "inline_edit";
	}
	else{
			if (!$detailKeys || !in_array($fName, $detailKeys))
				$control[$gfName]["params"]["mode"] = "edit";
			$controls["controls"]['mode'] = "edit";
		}
                                                                                                    	
	if(!$detailKeys || !in_array($fName, $detailKeys))
		$xt->assignbyref($gfName."_editcontrol",$control[$gfName]);
	elseif($detailKeys && in_array($fName, $detailKeys))
		$controls["controls"]['value'] = @$data[$fName];
		
	// category control field
	$strCategoryControl = $pageObject->hasDependField($fName);
	
	if($strCategoryControl!==false && in_array($strCategoryControl, $editFields))
		$vals = array($fName => @$data[$fName],$strCategoryControl => @$data[$strCategoryControl]);
	else
		$vals = array($fName => @$data[$fName]);
		
	$preload = $pageObject->fillPreload($fName, $vals);
	if($preload!==false)
		$controls["controls"]['preloadData'] = $preload;	
	
	$pageObject->fillControlsMap($controls);
	
	//fill field tool tips
	$pageObject->fillFieldToolTips($fName);
	
	// fill special settings for timepicker
	if(GetEditFormat($fName) == 'Time')	
		$pageObject->fillTimePickSettings($fName, $data[$fName]);
	
	if(ViewFormat($fName) == FORMAT_MAP)	
		$pageObject->googleMapCfg['isUseGoogleMap'] = true;
		
	if($detailKeys && in_array($fName, $detailKeys) && array_key_exists($fName, $data))
	{
		if((GetEditFormat($fName)==EDIT_FORMAT_LOOKUP_WIZARD || GetEditFormat($fName)==EDIT_FORMAT_RADIO) && GetpLookupType($fName) == LT_LOOKUPTABLE)
			$value=DisplayLookupWizard($fName,$data[$fName],$data,"",MODE_VIEW);
		elseif(NeedEncode($fName))
			$value = ProcessLargeText(GetData($data,$fName, ViewFormat($fName)),"field=".rawurlencode(htmlspecialchars($fName)),"",MODE_VIEW);
		else
			$value = GetData($data,$fName, ViewFormat($fName));
		
		$xt->assign($gfName."_editcontrol",$value);
	}
}
//fill tab groups name and sections name to controls
$pageObject->fillCntrlTabGroups();
			
$pageObject->jsSettings['tableSettings'][$strTableName]["keys"] = $keys;
$pageObject->jsSettings['tableSettings'][$strTableName]["prevKeys"] = $prev;
$pageObject->jsSettings['tableSettings'][$strTableName]["nextKeys"] = $next; 
if($pageObject->lockingObj)
{
	$pageObject->jsSettings['tableSettings'][$strTableName]["sKeys"] = $skeys;
	$pageObject->jsSettings['tableSettings'][$strTableName]["enableCtrls"] = $enableCtrlsForEditing;
	$pageObject->jsSettings['tableSettings'][$strTableName]["confirmTime"] = $pageObject->lockingObj->ConfirmTime;
}
//fill jsSettings and ControlsHTMLMap
$pageObject->fillSetCntrlMaps();

/////////////////////////////////////////////////////////////
if($pageObject->isShowDetailTables && $inlineedit!=EDIT_INLINE)
{
	$options = array();
	//array of params for classes
	$options["mode"] = LIST_DETAILS;
	$options["pageType"] = PAGE_LIST;
	$options["masterPageType"] = PAGE_EDIT;
	$options["mainMasterPageType"] = PAGE_EDIT;
	$options['masterTable'] = $strTableName;
	$options['firstTime'] = 1;
	
	if(count($dpParams['ids']))
	{
		include('classes/listpage.php');
		include('classes/listpage_embed.php');
		include('classes/listpage_dpinline.php');
		$xt->assign("detail_tables",true);	
	}
	
	$dControlsMap = array();
	
	$flyId = $ids+1;
	for($d=0;$d<count($dpParams['ids']);$d++)
	{
		$strTableName = $dpParams['strTableNames'][$d];
		include("include/".GetTableURL($strTableName)."_settings.php");
		if(!CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Search"))
		{
			$strTableName = "supplies";		
			continue;
		}
		$options['xt'] = new Xtempl();
		$options['id'] = $dpParams['ids'][$d];
		$options['flyId'] = $flyId++;
		$mkr=1;
		foreach($mKeys[$strTableName] as $mk)
			$options['masterKeysReq'][$mkr++] = $data[$mk];

		$listPageObject = ListPage::createListPage($strTableName, $options);
		// prepare code
		$listPageObject->prepareForBuildPage();
		$flyId = $listPageObject->recId+1;
		// show page
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
	$strTableName = "supplies";
	$pageObject->controlsHTMLMap[$strTableName][PAGE_EDIT][$id]['dControlsMap'] = $dControlsMap;	
}
/////////////////////////////////////////////////////////////	

if($inlineedit == EDIT_SIMPLE)
{
	$pageObject->jsSettings["global"]['idStartFrom'] =  $flyId + 1;
	$pageObject->body['end'].= '<script>';
	$pageObject->body['end'].= "window.controlsMap = '".jsreplace(my_json_encode($pageObject->controlsHTMLMap))."';";
	$pageObject->body['end'].= "window.settings = '".jsreplace(my_json_encode($pageObject->jsSettings))."';";
	$pageObject->body['end'].= '</script>';
}
else{
		$returnJSON['controlsMap'] = $pageObject->controlsHTMLMap;
		//if($isNeedSettings)
		$returnJSON['settings'] = $pageObject->jsSettings;	
	}
	
$pageObject->addCommonJs();

$jscode = $pageObject->PrepareJS();

if($inlineedit==EDIT_SIMPLE)
{
	$pageObject->body["end"].= "<script>".$jscode."</script>";
	$xt->assign("body",$pageObject->body);
	$xt->assign("flybody",true);	
}
elseif($inlineedit==EDIT_POPUP){
		$xt->assign("footer","");
		$xt->assign("flybody",$pageObject->body);
		$xt->assign("body",true);
	}
	
$xt->assign("style_block",true);
$pageObject->xt->assign("legend", true);



/////////////////////////////////////////////////////////////
//display the page
/////////////////////////////////////////////////////////////
if($eventObj->exists("BeforeShowEdit"))
	$eventObj->BeforeShowEdit($xt,$templatefile,$data);
if($inlineedit==EDIT_POPUP)
{
	$xt->load_template($templatefile);
	$returnJSON['html'] = $xt->fetch_loaded('style_block').$xt->fetch_loaded('flybody');
	if($pageObject->isShowDetailTables)
		$returnJSON['html'].= $xt->fetch_loaded('detail_tables');
	$returnJSON['idStartFrom'] = $flyId + 1;
	echo (my_json_encode($returnJSON)); 
}
elseif($inlineedit == EDIT_INLINE)
{
	$xt->load_template($templatefile);
	$returnJSON["html"] = array();
	foreach($editFields as $fName)
	{
		if($detailKeys && in_array($fName, $detailKeys))
			continue;
		$returnJSON["html"][$fName] = $xt->fetchVar(GoodFieldName($fName)."_editcontrol");	
	}
	
	echo (my_json_encode($returnJSON)); 
}
else	
	$xt->display($templatefile);

?>
