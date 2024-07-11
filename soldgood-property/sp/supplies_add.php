<?php 
include("include/dbcommon.php");

@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

add_nocache_headers();
include("include/supplies_variables.php");
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
	$templatefile = "supplies_inline_add.htm";
else
	$templatefile = "supplies_add.htm";

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

////////////////////// time picker

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
//	processing supply_mode_id - start
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
		$value = postvalue("value_supply_mode_id_".$id);
		$type=postvalue("type_supply_mode_id_".$id);
		if (FieldSubmitted("supply_mode_id_".$id))
		{
				$value=prepare_for_db("supply_mode_id",$value,$type);
		}
		else
			$value=false;
		
		if(!($value===false))
		{
	
	
						if(0 && "supply_mode_id"=="password" && $url_page=="admin_users_")
				$value=md5($value);
			$avalues["supply_mode_id"]=$value;
		}
		}
//	processibng supply_mode_id - end
//	processing support_type_id - start
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
		$value = postvalue("value_support_type_id_".$id);
		$type=postvalue("type_support_type_id_".$id);
		if (FieldSubmitted("support_type_id_".$id))
		{
				$value=prepare_for_db("support_type_id",$value,$type);
		}
		else
			$value=false;
		
		if(!($value===false))
		{
	
	
						if(0 && "support_type_id"=="password" && $url_page=="admin_users_")
				$value=md5($value);
			$avalues["support_type_id"]=$value;
		}
		}
//	processibng support_type_id - end
//	processing zone_id - start
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
		$value = postvalue("value_zone_id_".$id);
		$type=postvalue("type_zone_id_".$id);
		if (FieldSubmitted("zone_id_".$id))
		{
				$value=prepare_for_db("zone_id",$value,$type);
		}
		else
			$value=false;
		
		if(!($value===false))
		{
	
	
						if(0 && "zone_id"=="password" && $url_page=="admin_users_")
				$value=md5($value);
			$avalues["zone_id"]=$value;
		}
		}
//	processibng zone_id - end
//	processing district_id - start
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
		$value = postvalue("value_district_id_".$id);
		$type=postvalue("type_district_id_".$id);
		if (FieldSubmitted("district_id_".$id))
		{
				$value=prepare_for_db("district_id",$value,$type);
		}
		else
			$value=false;
		
		if(!($value===false))
		{
	
	
						if(0 && "district_id"=="password" && $url_page=="admin_users_")
				$value=md5($value);
			$avalues["district_id"]=$value;
		}
		}
//	processibng district_id - end
//	processing estate - start
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
		$value = postvalue("value_estate_".$id);
		$type=postvalue("type_estate_".$id);
		if (FieldSubmitted("estate_".$id))
		{
				$value=prepare_for_db("estate",$value,$type);
		}
		else
			$value=false;
		
		if(!($value===false))
		{
	
	
						if(0 && "estate"=="password" && $url_page=="admin_users_")
				$value=md5($value);
			$avalues["estate"]=$value;
		}
		}
//	processibng estate - end
//	processing area - start
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
		$value = postvalue("value_area_".$id);
		$type=postvalue("type_area_".$id);
		if (FieldSubmitted("area_".$id))
		{
				$value=prepare_for_db("area",$value,$type);
		}
		else
			$value=false;
		
		if(!($value===false))
		{
	
	
						if(0 && "area"=="password" && $url_page=="admin_users_")
				$value=md5($value);
			$avalues["area"]=$value;
		}
		}
//	processibng area - end
//	processing address - start
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
		$value = postvalue("value_address_".$id);
		$type=postvalue("type_address_".$id);
		if (FieldSubmitted("address_".$id))
		{
				$value=prepare_for_db("address",$value,$type);
		}
		else
			$value=false;
		
		if(!($value===false))
		{
	
	
						if(0 && "address"=="password" && $url_page=="admin_users_")
				$value=md5($value);
			$avalues["address"]=$value;
		}
		}
//	processibng address - end
//	processing unit_price - start
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
		$value = postvalue("value_unit_price_".$id);
		$type=postvalue("type_unit_price_".$id);
		if (FieldSubmitted("unit_price_".$id))
		{
				$value=prepare_for_db("unit_price",$value,$type);
		}
		else
			$value=false;
		
		if(!($value===false))
		{
	
	
						if(0 && "unit_price"=="password" && $url_page=="admin_users_")
				$value=md5($value);
			$avalues["unit_price"]=$value;
		}
		}
//	processibng unit_price - end
//	processing years - start
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
		$value = postvalue("value_years_".$id);
		$type=postvalue("type_years_".$id);
		if (FieldSubmitted("years_".$id))
		{
				$value=prepare_for_db("years",$value,$type);
		}
		else
			$value=false;
		
		if(!($value===false))
		{
	
	
						if(0 && "years"=="password" && $url_page=="admin_users_")
				$value=md5($value);
			$avalues["years"]=$value;
		}
		}
//	processibng years - end
//	processing ps_id - start
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
		$value = postvalue("value_ps_id_".$id);
		$type=postvalue("type_ps_id_".$id);
		if (FieldSubmitted("ps_id_".$id))
		{
				$value=prepare_for_db("ps_id",$value,$type);
		}
		else
			$value=false;
		
		if(!($value===false))
		{
	
	
						if(0 && "ps_id"=="password" && $url_page=="admin_users_")
				$value=md5($value);
			$avalues["ps_id"]=$value;
		}
		}
//	processibng ps_id - end
//	processing rc - start
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
		$value = postvalue("value_rc_".$id);
		$type=postvalue("type_rc_".$id);
		if (FieldSubmitted("rc_".$id))
		{
				$value=prepare_for_db("rc",$value,$type);
		}
		else
			$value=false;
		
		if(!($value===false))
		{
	
	
						if(0 && "rc"=="password" && $url_page=="admin_users_")
				$value=md5($value);
			$avalues["rc"]=$value;
		}
		}
//	processibng rc - end
//	processing hc - start
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
		$value = postvalue("value_hc_".$id);
		$type=postvalue("type_hc_".$id);
		if (FieldSubmitted("hc_".$id))
		{
				$value=prepare_for_db("hc",$value,$type);
		}
		else
			$value=false;
		
		if(!($value===false))
		{
	
	
						if(0 && "hc"=="password" && $url_page=="admin_users_")
				$value=md5($value);
			$avalues["hc"]=$value;
		}
		}
//	processibng hc - end
//	processing sf - start
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
		$value = postvalue("value_sf_".$id);
		$type=postvalue("type_sf_".$id);
		if (FieldSubmitted("sf_".$id))
		{
				$value=prepare_for_db("sf",$value,$type);
		}
		else
			$value=false;
		
		if(!($value===false))
		{
	
	
						if(0 && "sf"=="password" && $url_page=="admin_users_")
				$value=md5($value);
			$avalues["sf"]=$value;
		}
		}
//	processibng sf - end
//	processing height_id - start
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
		$value = postvalue("value_height_id_".$id);
		$type=postvalue("type_height_id_".$id);
		if (FieldSubmitted("height_id_".$id))
		{
				$value=prepare_for_db("height_id",$value,$type);
		}
		else
			$value=false;
		
		if(!($value===false))
		{
	
	
						if(0 && "height_id"=="password" && $url_page=="admin_users_")
				$value=md5($value);
			$avalues["height_id"]=$value;
		}
		}
//	processibng height_id - end
//	processing feature - start
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
		$value = postvalue("value_feature_".$id);
		$type=postvalue("type_feature_".$id);
		if (FieldSubmitted("feature_".$id))
		{
				$value=prepare_for_db("feature",$value,$type);
		}
		else
			$value=false;
		
		if(!($value===false))
		{
	
	
						if(0 && "feature"=="password" && $url_page=="admin_users_")
				$value=md5($value);
			$avalues["feature"]=$value;
		}
		}
//	processibng feature - end
//	processing remark - start
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
		$value = postvalue("value_remark_".$id);
		$type=postvalue("type_remark_".$id);
		if (FieldSubmitted("remark_".$id))
		{
				$value=prepare_for_db("remark",$value,$type);
		}
		else
			$value=false;
		
		if(!($value===false))
		{
	
	
						if(0 && "remark"=="password" && $url_page=="admin_users_")
				$value=md5($value);
			$avalues["remark"]=$value;
		}
		}
//	processibng remark - end
//	processing icon - start
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
		$value = postvalue("value_icon_".$id);
		$type=postvalue("type_icon_".$id);
		if (FieldSubmitted("icon_".$id))
		{
				$fileNameForPrepareFunc = postvalue("filename_icon_".$id);
					$value=prepare_upload("icon","upload2",$fileNameForPrepareFunc,$fileNameForPrepareFunc,"" ,$id,$pageObject);
		}
		else
			$value=false;
		
		if(!($value===false))
		{
				if($value)
				$contents = GetUploadedFileContents("value_icon_".$id);

		//	create thumbnail
			if($value)
			{
						$ext = CheckImageExtension(GetUploadedFileName("value_icon_".$id));
				$thumb = CreateThumbnail($contents,150,$ext);
				$pageObject->filesToSave[] = new SaveFile($thumb,"th".$value,GetUploadFolder("icon"), GetFieldData("","icon","Absolute",false));
			}

						if(0 && "icon"=="password" && $url_page=="admin_users_")
				$value=md5($value);
			$avalues["icon"]=$value;
		}
		}
//	processibng icon - end
//	processing pic1 - start
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
		$value = postvalue("value_pic1_".$id);
		$type=postvalue("type_pic1_".$id);
		if (FieldSubmitted("pic1_".$id))
		{
				$fileNameForPrepareFunc = postvalue("filename_pic1_".$id);
					$value=prepare_upload("pic1","upload2",$fileNameForPrepareFunc,$fileNameForPrepareFunc,"" ,$id,$pageObject);
		}
		else
			$value=false;
		
		if(!($value===false))
		{
				if($value)
				$contents = GetUploadedFileContents("value_pic1_".$id);

		//	create thumbnail
			if($value)
			{
						$ext = CheckImageExtension(GetUploadedFileName("value_pic1_".$id));
				$thumb = CreateThumbnail($contents,150,$ext);
				$pageObject->filesToSave[] = new SaveFile($thumb,"th".$value,GetUploadFolder("pic1"), GetFieldData("","pic1","Absolute",false));
			}

						if(0 && "pic1"=="password" && $url_page=="admin_users_")
				$value=md5($value);
			$avalues["pic1"]=$value;
		}
		}
//	processibng pic1 - end
//	processing pic2 - start
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
		$value = postvalue("value_pic2_".$id);
		$type=postvalue("type_pic2_".$id);
		if (FieldSubmitted("pic2_".$id))
		{
				$fileNameForPrepareFunc = postvalue("filename_pic2_".$id);
					$value=prepare_upload("pic2","upload2",$fileNameForPrepareFunc,$fileNameForPrepareFunc,"" ,$id,$pageObject);
		}
		else
			$value=false;
		
		if(!($value===false))
		{
				if($value)
				$contents = GetUploadedFileContents("value_pic2_".$id);

		//	create thumbnail
			if($value)
			{
						$ext = CheckImageExtension(GetUploadedFileName("value_pic2_".$id));
				$thumb = CreateThumbnail($contents,150,$ext);
				$pageObject->filesToSave[] = new SaveFile($thumb,"th".$value,GetUploadFolder("pic2"), GetFieldData("","pic2","Absolute",false));
			}

						if(0 && "pic2"=="password" && $url_page=="admin_users_")
				$value=md5($value);
			$avalues["pic2"]=$value;
		}
		}
//	processibng pic2 - end
//	processing pic3 - start
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
		$value = postvalue("value_pic3_".$id);
		$type=postvalue("type_pic3_".$id);
		if (FieldSubmitted("pic3_".$id))
		{
				$fileNameForPrepareFunc = postvalue("filename_pic3_".$id);
					$value=prepare_upload("pic3","upload2",$fileNameForPrepareFunc,$fileNameForPrepareFunc,"" ,$id,$pageObject);
		}
		else
			$value=false;
		
		if(!($value===false))
		{
				if($value)
				$contents = GetUploadedFileContents("value_pic3_".$id);

		//	create thumbnail
			if($value)
			{
						$ext = CheckImageExtension(GetUploadedFileName("value_pic3_".$id));
				$thumb = CreateThumbnail($contents,150,$ext);
				$pageObject->filesToSave[] = new SaveFile($thumb,"th".$value,GetUploadFolder("pic3"), GetFieldData("","pic3","Absolute",false));
			}

						if(0 && "pic3"=="password" && $url_page=="admin_users_")
				$value=md5($value);
			$avalues["pic3"]=$value;
		}
		}
//	processibng pic3 - end
//	processing pic4 - start
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
		$value = postvalue("value_pic4_".$id);
		$type=postvalue("type_pic4_".$id);
		if (FieldSubmitted("pic4_".$id))
		{
				$fileNameForPrepareFunc = postvalue("filename_pic4_".$id);
					$value=prepare_upload("pic4","upload2",$fileNameForPrepareFunc,$fileNameForPrepareFunc,"" ,$id,$pageObject);
		}
		else
			$value=false;
		
		if(!($value===false))
		{
				if($value)
				$contents = GetUploadedFileContents("value_pic4_".$id);

		//	create thumbnail
			if($value)
			{
						$ext = CheckImageExtension(GetUploadedFileName("value_pic4_".$id));
				$thumb = CreateThumbnail($contents,150,$ext);
				$pageObject->filesToSave[] = new SaveFile($thumb,"th".$value,GetUploadFolder("pic4"), GetFieldData("","pic4","Absolute",false));
			}

						if(0 && "pic4"=="password" && $url_page=="admin_users_")
				$value=md5($value);
			$avalues["pic4"]=$value;
		}
		}
//	processibng pic4 - end
//	processing pic5 - start
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
		$value = postvalue("value_pic5_".$id);
		$type=postvalue("type_pic5_".$id);
		if (FieldSubmitted("pic5_".$id))
		{
				$fileNameForPrepareFunc = postvalue("filename_pic5_".$id);
					$value=prepare_upload("pic5","upload2",$fileNameForPrepareFunc,$fileNameForPrepareFunc,"" ,$id,$pageObject);
		}
		else
			$value=false;
		
		if(!($value===false))
		{
				if($value)
				$contents = GetUploadedFileContents("value_pic5_".$id);

		//	create thumbnail
			if($value)
			{
						$ext = CheckImageExtension(GetUploadedFileName("value_pic5_".$id));
				$thumb = CreateThumbnail($contents,150,$ext);
				$pageObject->filesToSave[] = new SaveFile($thumb,"th".$value,GetUploadFolder("pic5"), GetFieldData("","pic5","Absolute",false));
			}

						if(0 && "pic5"=="password" && $url_page=="admin_users_")
				$value=md5($value);
			$avalues["pic5"]=$value;
		}
		}
//	processibng pic5 - end
//	processing pic6 - start
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
		$value = postvalue("value_pic6_".$id);
		$type=postvalue("type_pic6_".$id);
		if (FieldSubmitted("pic6_".$id))
		{
				$fileNameForPrepareFunc = postvalue("filename_pic6_".$id);
					$value=prepare_upload("pic6","upload2",$fileNameForPrepareFunc,$fileNameForPrepareFunc,"" ,$id,$pageObject);
		}
		else
			$value=false;
		
		if(!($value===false))
		{
				if($value)
				$contents = GetUploadedFileContents("value_pic6_".$id);

		//	create thumbnail
			if($value)
			{
						$ext = CheckImageExtension(GetUploadedFileName("value_pic6_".$id));
				$thumb = CreateThumbnail($contents,150,$ext);
				$pageObject->filesToSave[] = new SaveFile($thumb,"th".$value,GetUploadFolder("pic6"), GetFieldData("","pic6","Absolute",false));
			}

						if(0 && "pic6"=="password" && $url_page=="admin_users_")
				$value=md5($value);
			$avalues["pic6"]=$value;
		}
		}
//	processibng pic6 - end
//	processing pic7 - start
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
		$value = postvalue("value_pic7_".$id);
		$type=postvalue("type_pic7_".$id);
		if (FieldSubmitted("pic7_".$id))
		{
				$fileNameForPrepareFunc = postvalue("filename_pic7_".$id);
					$value=prepare_upload("pic7","upload2",$fileNameForPrepareFunc,$fileNameForPrepareFunc,"" ,$id,$pageObject);
		}
		else
			$value=false;
		
		if(!($value===false))
		{
				if($value)
				$contents = GetUploadedFileContents("value_pic7_".$id);

		//	create thumbnail
			if($value)
			{
						$ext = CheckImageExtension(GetUploadedFileName("value_pic7_".$id));
				$thumb = CreateThumbnail($contents,150,$ext);
				$pageObject->filesToSave[] = new SaveFile($thumb,"th".$value,GetUploadFolder("pic7"), GetFieldData("","pic7","Absolute",false));
			}

						if(0 && "pic7"=="password" && $url_page=="admin_users_")
				$value=md5($value);
			$avalues["pic7"]=$value;
		}
		}
//	processibng pic7 - end
//	processing pic8 - start
	$inlineAddOption = true;
	$inlineAddOption = $inlineadd!=ADD_INLINE;
	if($inlineAddOption)
	{
		$value = postvalue("value_pic8_".$id);
		$type=postvalue("type_pic8_".$id);
		if (FieldSubmitted("pic8_".$id))
		{
				$fileNameForPrepareFunc = postvalue("filename_pic8_".$id);
					$value=prepare_upload("pic8","upload2",$fileNameForPrepareFunc,$fileNameForPrepareFunc,"" ,$id,$pageObject);
		}
		else
			$value=false;
		
		if(!($value===false))
		{
				if($value)
				$contents = GetUploadedFileContents("value_pic8_".$id);

		//	create thumbnail
			if($value)
			{
						$ext = CheckImageExtension(GetUploadedFileName("value_pic8_".$id));
				$thumb = CreateThumbnail($contents,150,$ext);
				$pageObject->filesToSave[] = new SaveFile($thumb,"th".$value,GetUploadFolder("pic8"), GetFieldData("","pic8","Absolute",false));
			}

						if(0 && "pic8"=="password" && $url_page=="admin_users_")
				$value=md5($value);
			$avalues["pic8"]=$value;
		}
		}
//	processibng pic8 - end

//	insert ownerid value if exists
	if($strOriginalTableName == GetFieldData($strTableName, "user_id", "ownerTable", ""))
		$avalues["user_id"]=prepare_for_db("user_id",$_SESSION["_".$strTableName."_OwnerID"]);



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
						$message .='&nbsp;<a href=\'supplies_edit.php?'.$keylink.'\'>'.mlang_message("EDIT").'</a>&nbsp;';
					if(GetTableData($strTableName,".view",false) && $permis['search'])
						$message .='&nbsp;<a href=\'supplies_view.php?'.$keylink.'\'>'.mlang_message("VIEW").'</a>&nbsp;';
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
	header("Location: supplies_".$pageObject->getPageType().".php");
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
	$strWhere=whereAdd($strWhere,SecuritySQL("Search"));
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
}


if($readavalues)
{
	$defvalues["estate"]=@$avalues["estate"];
	$defvalues["zone_id"]=@$avalues["zone_id"];
	$defvalues["district_id"]=@$avalues["district_id"];
	$defvalues["supply_mode_id"]=@$avalues["supply_mode_id"];
	$defvalues["support_type_id"]=@$avalues["support_type_id"];
	$defvalues["area"]=@$avalues["area"];
	$defvalues["address"]=@$avalues["address"];
	$defvalues["unit_price"]=@$avalues["unit_price"];
	$defvalues["years"]=@$avalues["years"];
	$defvalues["rc"]=@$avalues["rc"];
	$defvalues["hc"]=@$avalues["hc"];
	$defvalues["sf"]=@$avalues["sf"];
	$defvalues["height_id"]=@$avalues["height_id"];
	$defvalues["ps_id"]=@$avalues["ps_id"];
	$defvalues["feature"]=@$avalues["feature"];
	$defvalues["remark"]=@$avalues["remark"];
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
		//	select only owned records
		$where=whereAdd($where,SecuritySQL("Search"));
		
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
//	estate - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value="";
			$value = ProcessLargeText(GetData($data,"estate", ""),"field=estate".$keylink,"",MODE_LIST);
	$showValues["estate"] = $value;
	$showFields[] = "estate";
		$showRawValues["estate"] = substr($data["estate"],0,100);
	}	
//	zone_id - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value = DisplayLookupWizard("zone_id",$data["zone_id"],$data,$keylink,MODE_LIST);
	$showValues["zone_id"] = $value;
	$showFields[] = "zone_id";
		$showRawValues["zone_id"] = substr($data["zone_id"],0,100);
	}	
//	district_id - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value = DisplayLookupWizard("district_id",$data["district_id"],$data,$keylink,MODE_LIST);
	$showValues["district_id"] = $value;
	$showFields[] = "district_id";
		$showRawValues["district_id"] = substr($data["district_id"],0,100);
	}	
//	supply_mode_id - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value = DisplayLookupWizard("supply_mode_id",$data["supply_mode_id"],$data,$keylink,MODE_LIST);
	$showValues["supply_mode_id"] = $value;
	$showFields[] = "supply_mode_id";
		$showRawValues["supply_mode_id"] = substr($data["supply_mode_id"],0,100);
	}	
//	support_type_id - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				$value = DisplayLookupWizard("support_type_id",$data["support_type_id"],$data,$keylink,MODE_LIST);
	$showValues["support_type_id"] = $value;
	$showFields[] = "support_type_id";
		$showRawValues["support_type_id"] = substr($data["support_type_id"],0,100);
	}	
//	area - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value="";
			$value = ProcessLargeText(GetData($data,"area", ""),"field=area".$keylink,"",MODE_LIST);
	$showValues["area"] = $value;
	$showFields[] = "area";
		$showRawValues["area"] = substr($data["area"],0,100);
	}	
//	address - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
			$value = ProcessLargeText(GetData($data,"address", ""),"field=address".$keylink,"",MODE_LIST);
	$showValues["address"] = $value;
	$showFields[] = "address";
		$showRawValues["address"] = substr($data["address"],0,100);
	}	
//	unit_price - Number
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value="";
			$value = ProcessLargeText(GetData($data,"unit_price", "Number"),"field=unit%5Fprice".$keylink,"",MODE_LIST);
	$showValues["unit_price"] = $value;
	$showFields[] = "unit_price";
		$showRawValues["unit_price"] = substr($data["unit_price"],0,100);
	}	
//	years - Number
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
			$value = ProcessLargeText(GetData($data,"years", "Number"),"field=years".$keylink,"",MODE_LIST);
	$showValues["years"] = $value;
	$showFields[] = "years";
		$showRawValues["years"] = substr($data["years"],0,100);
	}	
//	rc - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
			$value = ProcessLargeText(GetData($data,"rc", ""),"field=rc".$keylink,"",MODE_LIST);
	$showValues["rc"] = $value;
	$showFields[] = "rc";
		$showRawValues["rc"] = substr($data["rc"],0,100);
	}	
//	hc - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
			$value = ProcessLargeText(GetData($data,"hc", ""),"field=hc".$keylink,"",MODE_LIST);
	$showValues["hc"] = $value;
	$showFields[] = "hc";
		$showRawValues["hc"] = substr($data["hc"],0,100);
	}	
//	sf - Number
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
			$value = ProcessLargeText(GetData($data,"sf", "Number"),"field=sf".$keylink,"",MODE_LIST);
	$showValues["sf"] = $value;
	$showFields[] = "sf";
		$showRawValues["sf"] = substr($data["sf"],0,100);
	}	
//	height_id - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value="";
				$value = DisplayLookupWizard("height_id",$data["height_id"],$data,$keylink,MODE_LIST);
	$showValues["height_id"] = $value;
	$showFields[] = "height_id";
		$showRawValues["height_id"] = substr($data["height_id"],0,100);
	}	
//	ps_id - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value="";
				$value = DisplayLookupWizard("ps_id",$data["ps_id"],$data,$keylink,MODE_LIST);
	$showValues["ps_id"] = $value;
	$showFields[] = "ps_id";
		$showRawValues["ps_id"] = substr($data["ps_id"],0,100);
	}	
//	feature - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
			$value = ProcessLargeText(GetData($data,"feature", ""),"field=feature".$keylink,"",MODE_LIST);
	$showValues["feature"] = $value;
	$showFields[] = "feature";
		$showRawValues["feature"] = substr($data["feature"],0,100);
	}	
//	remark - 
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
			$value = ProcessLargeText(GetData($data,"remark", ""),"field=remark".$keylink,"",MODE_LIST);
	$showValues["remark"] = $value;
	$showFields[] = "remark";
		$showRawValues["remark"] = substr($data["remark"],0,100);
	}	
//	icon - File-based Image
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($inlineadd==ADD_INLINE || $inlineadd==ADD_ONTHEFLY || $inlineadd==ADD_POPUP)
		$display = true;
	if($display)
	{	
		$value="";
				if(CheckImageExtension($data["icon"])) 
		{
					// show thumbnail
			$thumbname="th".$data["icon"];
			if(substr("./files/",0,7)!="http://" && !myfile_exists(getabspath("./files/".$thumbname)))
				$thumbname=$data["icon"];
			$value="<a";
							$value .= " target=_blank";
			$value.=" href=\"".htmlspecialchars(AddLinkPrefix("icon",$data["icon"]))."\">";
			$value.="<img";
			if(isEnableSection508())
				$value.= " alt=\"".htmlspecialchars($data["icon"])."\"";
			if($thumbname==$data["icon"])
			{
											}
			$value.=" id=\"img_icon_".$id."\" border=0";
			$value.=" src=\"".htmlspecialchars(AddLinkPrefix("icon",$thumbname))."\"></a>";
		}
	$showValues["icon"] = $value;
	$showFields[] = "icon";
		$showRawValues["icon"] = substr($data["icon"],0,100);
	}	
//	pic1 - File-based Image
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				if(CheckImageExtension($data["pic1"])) 
		{
					// show thumbnail
			$thumbname="th".$data["pic1"];
			if(substr("./files/",0,7)!="http://" && !myfile_exists(getabspath("./files/".$thumbname)))
				$thumbname=$data["pic1"];
			$value="<a";
							$value .= " rel='ibox'";
			$value.=" href=\"".htmlspecialchars(AddLinkPrefix("pic1",$data["pic1"]))."\">";
			$value.="<img";
			if(isEnableSection508())
				$value.= " alt=\"".htmlspecialchars($data["pic1"])."\"";
			if($thumbname==$data["pic1"])
			{
											}
			$value.=" id=\"img_pic1_".$id."\" border=0";
			$value.=" src=\"".htmlspecialchars(AddLinkPrefix("pic1",$thumbname))."\"></a>";
		}
	$showValues["pic1"] = $value;
	$showFields[] = "pic1";
		$showRawValues["pic1"] = substr($data["pic1"],0,100);
	}	
//	pic2 - File-based Image
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				if(CheckImageExtension($data["pic2"])) 
		{
					// show thumbnail
			$thumbname="th".$data["pic2"];
			if(substr("./files/",0,7)!="http://" && !myfile_exists(getabspath("./files/".$thumbname)))
				$thumbname=$data["pic2"];
			$value="<a";
							$value .= " rel='ibox'";
			$value.=" href=\"".htmlspecialchars(AddLinkPrefix("pic2",$data["pic2"]))."\">";
			$value.="<img";
			if(isEnableSection508())
				$value.= " alt=\"".htmlspecialchars($data["pic2"])."\"";
			if($thumbname==$data["pic2"])
			{
											}
			$value.=" id=\"img_pic2_".$id."\" border=0";
			$value.=" src=\"".htmlspecialchars(AddLinkPrefix("pic2",$thumbname))."\"></a>";
		}
	$showValues["pic2"] = $value;
	$showFields[] = "pic2";
		$showRawValues["pic2"] = substr($data["pic2"],0,100);
	}	
//	pic3 - File-based Image
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				if(CheckImageExtension($data["pic3"])) 
		{
					// show thumbnail
			$thumbname="th".$data["pic3"];
			if(substr("./files/",0,7)!="http://" && !myfile_exists(getabspath("./files/".$thumbname)))
				$thumbname=$data["pic3"];
			$value="<a";
							$value .= " rel='ibox'";
			$value.=" href=\"".htmlspecialchars(AddLinkPrefix("pic3",$data["pic3"]))."\">";
			$value.="<img";
			if(isEnableSection508())
				$value.= " alt=\"".htmlspecialchars($data["pic3"])."\"";
			if($thumbname==$data["pic3"])
			{
											}
			$value.=" id=\"img_pic3_".$id."\" border=0";
			$value.=" src=\"".htmlspecialchars(AddLinkPrefix("pic3",$thumbname))."\"></a>";
		}
	$showValues["pic3"] = $value;
	$showFields[] = "pic3";
		$showRawValues["pic3"] = substr($data["pic3"],0,100);
	}	
//	pic4 - File-based Image
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				if(CheckImageExtension($data["pic4"])) 
		{
					// show thumbnail
			$thumbname="th".$data["pic4"];
			if(substr("./files/",0,7)!="http://" && !myfile_exists(getabspath("./files/".$thumbname)))
				$thumbname=$data["pic4"];
			$value="<a";
							$value .= " rel='ibox'";
			$value.=" href=\"".htmlspecialchars(AddLinkPrefix("pic4",$data["pic4"]))."\">";
			$value.="<img";
			if(isEnableSection508())
				$value.= " alt=\"".htmlspecialchars($data["pic4"])."\"";
			if($thumbname==$data["pic4"])
			{
											}
			$value.=" id=\"img_pic4_".$id."\" border=0";
			$value.=" src=\"".htmlspecialchars(AddLinkPrefix("pic4",$thumbname))."\"></a>";
		}
	$showValues["pic4"] = $value;
	$showFields[] = "pic4";
		$showRawValues["pic4"] = substr($data["pic4"],0,100);
	}	
//	pic5 - File-based Image
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				if(CheckImageExtension($data["pic5"])) 
		{
					// show thumbnail
			$thumbname="th".$data["pic5"];
			if(substr("./files/",0,7)!="http://" && !myfile_exists(getabspath("./files/".$thumbname)))
				$thumbname=$data["pic5"];
			$value="<a";
							$value .= " rel='ibox'";
			$value.=" href=\"".htmlspecialchars(AddLinkPrefix("pic5",$data["pic5"]))."\">";
			$value.="<img";
			if(isEnableSection508())
				$value.= " alt=\"".htmlspecialchars($data["pic5"])."\"";
			if($thumbname==$data["pic5"])
			{
											}
			$value.=" id=\"img_pic5_".$id."\" border=0";
			$value.=" src=\"".htmlspecialchars(AddLinkPrefix("pic5",$thumbname))."\"></a>";
		}
	$showValues["pic5"] = $value;
	$showFields[] = "pic5";
		$showRawValues["pic5"] = substr($data["pic5"],0,100);
	}	
//	pic6 - File-based Image
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				if(CheckImageExtension($data["pic6"])) 
		{
					// show thumbnail
			$thumbname="th".$data["pic6"];
			if(substr("./files/",0,7)!="http://" && !myfile_exists(getabspath("./files/".$thumbname)))
				$thumbname=$data["pic6"];
			$value="<a";
							$value .= " rel='ibox'";
			$value.=" href=\"".htmlspecialchars(AddLinkPrefix("pic6",$data["pic6"]))."\">";
			$value.="<img";
			if(isEnableSection508())
				$value.= " alt=\"".htmlspecialchars($data["pic6"])."\"";
			if($thumbname==$data["pic6"])
			{
											}
			$value.=" id=\"img_pic6_".$id."\" border=0";
			$value.=" src=\"".htmlspecialchars(AddLinkPrefix("pic6",$thumbname))."\"></a>";
		}
	$showValues["pic6"] = $value;
	$showFields[] = "pic6";
		$showRawValues["pic6"] = substr($data["pic6"],0,100);
	}	
//	pic7 - File-based Image
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				if(CheckImageExtension($data["pic7"])) 
		{
					// show thumbnail
			$thumbname="th".$data["pic7"];
			if(substr("./files/",0,7)!="http://" && !myfile_exists(getabspath("./files/".$thumbname)))
				$thumbname=$data["pic7"];
			$value="<a";
							$value .= " rel='ibox'";
			$value.=" href=\"".htmlspecialchars(AddLinkPrefix("pic7",$data["pic7"]))."\">";
			$value.="<img";
			if(isEnableSection508())
				$value.= " alt=\"".htmlspecialchars($data["pic7"])."\"";
			if($thumbname==$data["pic7"])
			{
											}
			$value.=" id=\"img_pic7_".$id."\" border=0";
			$value.=" src=\"".htmlspecialchars(AddLinkPrefix("pic7",$thumbname))."\"></a>";
		}
	$showValues["pic7"] = $value;
	$showFields[] = "pic7";
		$showRawValues["pic7"] = substr($data["pic7"],0,100);
	}	
//	pic8 - File-based Image
	$display = false;
	if($inlineadd==ADD_MASTER)
		$display = true;
	if($display)
	{	
		$value="";
				if(CheckImageExtension($data["pic8"])) 
		{
					// show thumbnail
			$thumbname="th".$data["pic8"];
			if(substr("./files/",0,7)!="http://" && !myfile_exists(getabspath("./files/".$thumbname)))
				$thumbname=$data["pic8"];
			$value="<a";
							$value .= " rel='ibox'";
			$value.=" href=\"".htmlspecialchars(AddLinkPrefix("pic8",$data["pic8"]))."\">";
			$value.="<img";
			if(isEnableSection508())
				$value.= " alt=\"".htmlspecialchars($data["pic8"])."\"";
			if($thumbname==$data["pic8"])
			{
											}
			$value.=" id=\"img_pic8_".$id."\" border=0";
			$value.=" src=\"".htmlspecialchars(AddLinkPrefix("pic8",$thumbname))."\"></a>";
		}
	$showValues["pic8"] = $value;
	$showFields[] = "pic8";
		$showRawValues["pic8"] = substr($data["pic8"],0,100);
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
							//	select only owned records
				$where=whereAdd($where,SecuritySQL("Search"));
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
	$strTableName = "supplies";
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
