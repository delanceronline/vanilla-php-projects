<?php
$tdatausers=array();
	$tdatausers[".NumberOfChars"]=80; 
	$tdatausers[".ShortName"]="users";
	$tdatausers[".OwnerID"]="id";
	$tdatausers[".OriginalTable"]="users";


	
//	field labels
$fieldLabelsusers = array();
if(mlang_getcurrentlang()=="English")
{
	$fieldLabelsusers["English"]=array();
	$fieldToolTipsusers["English"]=array();
	$fieldLabelsusers["English"]["id"] = "User ID";
	$fieldToolTipsusers["English"]["id"] = "";
	$fieldLabelsusers["English"]["name"] = "Name";
	$fieldToolTipsusers["English"]["name"] = "";
	$fieldLabelsusers["English"]["cn"] = "Contact Phone Number";
	$fieldToolTipsusers["English"]["cn"] = "";
	$fieldLabelsusers["English"]["email"] = "Email";
	$fieldToolTipsusers["English"]["email"] = "";
	$fieldLabelsusers["English"]["login"] = "Login";
	$fieldToolTipsusers["English"]["login"] = "";
	$fieldLabelsusers["English"]["password"] = "Password";
	$fieldToolTipsusers["English"]["password"] = "";
	$fieldLabelsusers["English"]["icon"] = "Icon";
	$fieldToolTipsusers["English"]["icon"] = "";
	$fieldLabelsusers["English"]["identity_id"] = "Identity";
	$fieldToolTipsusers["English"]["identity_id"] = "";
	$fieldLabelsusers["English"]["creation_date"] = "Post Date";
	$fieldToolTipsusers["English"]["creation_date"] = "";
	if (count($fieldToolTipsusers["English"])){
		$tdatausers[".isUseToolTips"]=true;
	}
}
if(mlang_getcurrentlang()=="Chinese (Hong Kong S.A.R.)")
{
	$fieldLabelsusers["Chinese (Hong Kong S.A.R.)"]=array();
	$fieldToolTipsusers["Chinese (Hong Kong S.A.R.)"]=array();
	$fieldLabelsusers["Chinese (Hong Kong S.A.R.)"]["id"] = "會員編號";
	$fieldToolTipsusers["Chinese (Hong Kong S.A.R.)"]["id"] = "";
	$fieldLabelsusers["Chinese (Hong Kong S.A.R.)"]["name"] = "名稱";
	$fieldToolTipsusers["Chinese (Hong Kong S.A.R.)"]["name"] = "";
	$fieldLabelsusers["Chinese (Hong Kong S.A.R.)"]["cn"] = "聯絡電話";
	$fieldToolTipsusers["Chinese (Hong Kong S.A.R.)"]["cn"] = "";
	$fieldLabelsusers["Chinese (Hong Kong S.A.R.)"]["email"] = "電郵地址";
	$fieldToolTipsusers["Chinese (Hong Kong S.A.R.)"]["email"] = "";
	$fieldLabelsusers["Chinese (Hong Kong S.A.R.)"]["login"] = "登入名稱";
	$fieldToolTipsusers["Chinese (Hong Kong S.A.R.)"]["login"] = "";
	$fieldLabelsusers["Chinese (Hong Kong S.A.R.)"]["password"] = "登入密碼";
	$fieldToolTipsusers["Chinese (Hong Kong S.A.R.)"]["password"] = "";
	$fieldLabelsusers["Chinese (Hong Kong S.A.R.)"]["icon"] = "會員示圖";
	$fieldToolTipsusers["Chinese (Hong Kong S.A.R.)"]["icon"] = "";
	$fieldLabelsusers["Chinese (Hong Kong S.A.R.)"]["identity_id"] = "身份";
	$fieldToolTipsusers["Chinese (Hong Kong S.A.R.)"]["identity_id"] = "";
	$fieldLabelsusers["Chinese (Hong Kong S.A.R.)"]["creation_date"] = "加入日期";
	$fieldToolTipsusers["Chinese (Hong Kong S.A.R.)"]["creation_date"] = "";
	if (count($fieldToolTipsusers["Chinese (Hong Kong S.A.R.)"])){
		$tdatausers[".isUseToolTips"]=true;
	}
}


	
	$tdatausers[".NCSearch"]=true;

	

$tdatausers[".shortTableName"] = "users";
$tdatausers[".nSecOptions"] = 1;
$tdatausers[".recsPerRowList"] = 1;	
$tdatausers[".tableGroupBy"] = "0";
$tdatausers[".mainTableOwnerID"] = "id";
$tdatausers[".moveNext"] = 1;




$tdatausers[".showAddInPopup"] = false;

$tdatausers[".showEditInPopup"] = false;

$tdatausers[".showViewInPopup"] = false;


$tdatausers[".fieldsForRegister"] = array();
	//Begin register settings
$tdatausers[".fieldsForRegister"][] = "login";
$tdatausers[".fieldsForRegister"][] = "password";
$tdatausers[".fieldsForRegister"][] = "cn";
$tdatausers[".fieldsForRegister"][] = "email";
$tdatausers[".fieldsForRegister"][] = "identity_id";
$tdatausers[".fieldsForRegister"][] = "name";
$tdatausers[".PasswordField"] = "password";
$tdatausers[".UserNameField"] = "login";	
//End register settings	

$tdatausers[".listAjax"] = false;

	$tdatausers[".audit"] = false;

	$tdatausers[".locking"] = false;
	
$tdatausers[".listIcons"] = true;
$tdatausers[".edit"] = true;
$tdatausers[".view"] = true;




$tdatausers[".showSimpleSearchOptions"] = false;

$tdatausers[".showSearchPanel"] = true;


$tdatausers[".isUseAjaxSuggest"] = true;

$tdatausers[".rowHighlite"] = true;


// button handlers file names

$tdatausers[".addPageEvents"] = false;

$tdatausers[".arrKeyFields"][] = "id";

// use datepicker for search panel
$tdatausers[".isUseCalendarForSearch"] = true;

// use timepicker for search panel
$tdatausers[".isUseTimeForSearch"] = false;

$tdatausers[".isUseiBox"] = false;




$tdatausers[".isUseInlineJs"] = $tdatausers[".isUseInlineAdd"] || $tdatausers[".isUseInlineEdit"];

$tdatausers[".allSearchFields"] = array();



$tdatausers[".googleLikeFields"][] = "id";
$tdatausers[".googleLikeFields"][] = "name";
$tdatausers[".googleLikeFields"][] = "cn";
$tdatausers[".googleLikeFields"][] = "email";
$tdatausers[".googleLikeFields"][] = "login";
$tdatausers[".googleLikeFields"][] = "password";
$tdatausers[".googleLikeFields"][] = "icon";
$tdatausers[".googleLikeFields"][] = "identity_id";
$tdatausers[".googleLikeFields"][] = "creation_date";



$tdatausers[".advSearchFields"][] = "id";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("id", $tdatausers[".allSearchFields"])) 
{
	$tdatausers[".allSearchFields"][] = "id";	
}
$tdatausers[".advSearchFields"][] = "name";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("name", $tdatausers[".allSearchFields"])) 
{
	$tdatausers[".allSearchFields"][] = "name";	
}
$tdatausers[".advSearchFields"][] = "cn";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("cn", $tdatausers[".allSearchFields"])) 
{
	$tdatausers[".allSearchFields"][] = "cn";	
}
$tdatausers[".advSearchFields"][] = "email";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("email", $tdatausers[".allSearchFields"])) 
{
	$tdatausers[".allSearchFields"][] = "email";	
}
$tdatausers[".advSearchFields"][] = "login";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("login", $tdatausers[".allSearchFields"])) 
{
	$tdatausers[".allSearchFields"][] = "login";	
}
$tdatausers[".advSearchFields"][] = "password";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("password", $tdatausers[".allSearchFields"])) 
{
	$tdatausers[".allSearchFields"][] = "password";	
}
$tdatausers[".advSearchFields"][] = "icon";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("icon", $tdatausers[".allSearchFields"])) 
{
	$tdatausers[".allSearchFields"][] = "icon";	
}
$tdatausers[".advSearchFields"][] = "identity_id";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("identity_id", $tdatausers[".allSearchFields"])) 
{
	$tdatausers[".allSearchFields"][] = "identity_id";	
}
$tdatausers[".advSearchFields"][] = "creation_date";
// do in this way, because combine functions array_unique and array_merge returns array with keys like 1,2, 4 etc
if (!in_array("creation_date", $tdatausers[".allSearchFields"])) 
{
	$tdatausers[".allSearchFields"][] = "creation_date";	
}

$tdatausers[".isTableType"] = "list";


	

$tdatausers[".isDisplayLoading"] = true;

$tdatausers[".isResizeColumns"] = false;





$tdatausers[".pageSize"] = 20;

$gstrOrderBy = "";
if(strlen($gstrOrderBy) && strtolower(substr($gstrOrderBy,0,8))!="order by")
	$gstrOrderBy = "order by ".$gstrOrderBy;
$tdatausers[".strOrderBy"] = $gstrOrderBy;
	
$tdatausers[".orderindexes"] = array();

$tdatausers[".sqlHead"] = "SELECT id,   name,   cn,   email,   login,   password,   icon,   identity_id,   creation_date";
$tdatausers[".sqlFrom"] = "FROM users";
$tdatausers[".sqlWhereExpr"] = "";
$tdatausers[".sqlTail"] = "";




//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatausers[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatausers[".arrGroupsPerPage"] = $arrGPP;

	$tableKeys = array();
	$tableKeys[] = "id";
	$tdatausers[".Keys"] = $tableKeys;

//	id
	$fdata = array();
	$fdata["strName"] = "id";
	$fdata["ownerTable"] = "users";
		$fdata["Label"]="會員編號"; 
	
		
		
	$fdata["FieldType"]= 3;
	
		$fdata["AutoInc"]=true;
	
			$fdata["UseiBox"] = false;
	
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
		
		
		
		
		$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "id";
	
		$fdata["FullName"]= "id";
	
		$fdata["IsRequired"]=true; 
	
		
		
		
		
				$fdata["Index"]= 1;
				$fdata["EditParams"]="";
			
		
		
		
		
		
		$fdata["bViewPage"]=true; 
	
		
		
		
	//Begin validation
	$fdata["validateAs"] = array();
				$fdata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");	
						$fdata["validateAs"]["basicValidate"][] = "IsRequired";
	
										//End validation
	
				$fdata["FieldPermissions"]=true;
	
		
				
		
		
		
			$tdatausers["id"]=$fdata;
//	name
	$fdata = array();
	$fdata["strName"] = "name";
	$fdata["ownerTable"] = "users";
		$fdata["Label"]="名稱"; 
	
		
		
	$fdata["FieldType"]= 200;
	
		
			$fdata["UseiBox"] = false;
	
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
		
		
		
		
		$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "name";
	
		$fdata["FullName"]= "name";
	
		
		
		
		
		
				$fdata["Index"]= 2;
				$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=32";
		
		$fdata["bListPage"]=true; 
	
		
		
		$fdata["bEditPage"]=true; 
	
		
		$fdata["bViewPage"]=true; 
	
		
		
		
	//Begin validation
	$fdata["validateAs"] = array();
		
										//End validation
	
				$fdata["FieldPermissions"]=true;
	
		
				
		
		
		
			$tdatausers["name"]=$fdata;
//	cn
	$fdata = array();
	$fdata["strName"] = "cn";
	$fdata["ownerTable"] = "users";
		$fdata["Label"]="聯絡電話"; 
	
		
		
	$fdata["FieldType"]= 200;
	
		
			$fdata["UseiBox"] = false;
	
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
		
		
		
		
		$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "cn";
	
		$fdata["FullName"]= "cn";
	
		
		
		
		
		
				$fdata["Index"]= 3;
				$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=32";
		
		
		
		
		$fdata["bEditPage"]=true; 
	
		
		$fdata["bViewPage"]=true; 
	
		
		
		
	//Begin validation
	$fdata["validateAs"] = array();
		
										//End validation
	
				$fdata["FieldPermissions"]=true;
	
		
				
		
		
		
			$tdatausers["cn"]=$fdata;
//	email
	$fdata = array();
	$fdata["strName"] = "email";
	$fdata["ownerTable"] = "users";
		$fdata["Label"]="電郵地址"; 
	
		
		
	$fdata["FieldType"]= 200;
	
		
			$fdata["UseiBox"] = false;
	
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
		
		
		
		
		$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "email";
	
		$fdata["FullName"]= "email";
	
		$fdata["IsRequired"]=true; 
	
		
		
		
		
				$fdata["Index"]= 4;
				$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=128";
		
		
		
		
		$fdata["bEditPage"]=true; 
	
		
		$fdata["bViewPage"]=true; 
	
		
		
		
	//Begin validation
	$fdata["validateAs"] = array();
				$fdata["validateAs"]["basicValidate"][] = getJsValidatorName("Email");	
						$fdata["validateAs"]["basicValidate"][] = "IsRequired";
	
										if(count($fdata["validateAs"]) && !in_array('IsEmail',$fdata["validateAs"]['basicValidate']))
		$fdata["validateAs"]['basicValidate'][] = 'IsEmail';				
	//End validation
	
				$fdata["FieldPermissions"]=true;
	
		
				
		
		
		
			$tdatausers["email"]=$fdata;
//	login
	$fdata = array();
	$fdata["strName"] = "login";
	$fdata["ownerTable"] = "users";
		$fdata["Label"]="登入名稱"; 
	
		
		$fdata["LinkPrefix"]="./files/"; 
	
	$fdata["FieldType"]= 200;
	
		
			$fdata["UseiBox"] = false;
	
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "File-based Image";
	
		
		
			$fdata["ShowThumbnail"]=true; 
	$fdata["StrThumbnail"]="";
	$fdata["ImageWidth"] = 0;
	$fdata["ImageHeight"] = 0;
	
		
		
	$fdata["GoodName"]= "login";
	
		$fdata["FullName"]= "login";
	
		$fdata["IsRequired"]=true; 
	
		
		
		
		
				$fdata["Index"]= 5;
				$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=32";
		
		
		
		
		
		
		
		
		
		
	//Begin validation
	$fdata["validateAs"] = array();
						$fdata["validateAs"]["basicValidate"][] = "IsRequired";
	
							if(count($fdata["validateAs"]) && !in_array('IsRequired',$fdata["validateAs"]['basicValidate']))
		$fdata["validateAs"]['basicValidate'][] = 'IsRequired';	
				//End validation
	
				
		
				
		
		
		
			$tdatausers["login"]=$fdata;
//	password
	$fdata = array();
	$fdata["strName"] = "password";
	$fdata["ownerTable"] = "users";
		$fdata["Label"]="登入密碼"; 
	
		
		
	$fdata["FieldType"]= 200;
	
		
			$fdata["UseiBox"] = false;
	
	$fdata["EditFormat"]= "Text field";
	$fdata["ViewFormat"]= "";
	
		
		
		
		
		$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "password";
	
		$fdata["FullName"]= "password";
	
		$fdata["IsRequired"]=true; 
	
		
		
		
		
				$fdata["Index"]= 6;
				$fdata["EditParams"]="";
			$fdata["EditParams"].= " maxlength=32";
		
		
		
		
		
		
		
		
		
		
	//Begin validation
	$fdata["validateAs"] = array();
						$fdata["validateAs"]["basicValidate"][] = "IsRequired";
	
							if(count($fdata["validateAs"]) && !in_array('IsRequired',$fdata["validateAs"]['basicValidate']))
		$fdata["validateAs"]['basicValidate'][] = 'IsRequired';	
				//End validation
	
				
		
				
		
		
		
			$tdatausers["password"]=$fdata;
//	icon
	$fdata = array();
	$fdata["strName"] = "icon";
	$fdata["ownerTable"] = "users";
		$fdata["Label"]="會員示圖"; 
	
		
		$fdata["LinkPrefix"]="./files/"; 
	
	$fdata["FieldType"]= 200;
	
		
			$fdata["UseiBox"] = false;
	
	$fdata["EditFormat"]= "Document upload";
	$fdata["ViewFormat"]= "File-based Image";
	
		
		
			$fdata["ShowThumbnail"]=true; 
	$fdata["StrThumbnail"]="th";
	$fdata["ImageWidth"] = 0;
	$fdata["ImageHeight"] = 0;
	
		
		
	$fdata["GoodName"]= "icon";
	
		$fdata["FullName"]= "icon";
	
		
		
		
		
		
		$fdata["UseTimestamp"]=true; 
		$fdata["UploadFolder"]="files"; 
		$fdata["Index"]= 7;
				
		$fdata["bListPage"]=true; 
	
		
		
		$fdata["bEditPage"]=true; 
	
		
		$fdata["bViewPage"]=true; 
	
		
		
		
	//Begin validation
	$fdata["validateAs"] = array();
		
										//End validation
	
				$fdata["FieldPermissions"]=true;
	
		$fdata["CreateThumbnail"]=true;
	$fdata["ThumbnailPrefix"]="th";
	
				
		
		
		
			$tdatausers["icon"]=$fdata;
//	identity_id
	$fdata = array();
	$fdata["strName"] = "identity_id";
	$fdata["ownerTable"] = "users";
		$fdata["Label"]="身份"; 
	
		
		
	$fdata["FieldType"]= 3;
	
		
			$fdata["UseiBox"] = false;
	
	$fdata["EditFormat"]= "Lookup wizard";
	$fdata["ViewFormat"]= "";
	
		
		$fdata["LookupType"]=1;
	$fdata["pLookupType"] = 1;
	$fdata["freeInput"] = 0;	
	$fdata["autoCompleteFieldsOnEdit"] = 0;
	$fdata["autoCompleteFields"] = array();
										$fdata["LinkField"]="id";
	$fdata["LinkFieldType"]=3;
	$fdata["DisplayField"]="value";
				$fdata["LookupTable"]="identity";
	$fdata["LookupOrderBy"]="";
							$fdata["LookupWhere"] = "language_type='".$_SESSION['language']."'";
													
					
		
		
		$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "identity_id";
	
		$fdata["FullName"]= "identity_id";
	
		$fdata["IsRequired"]=true; 
	
		
		
		
		
				$fdata["Index"]= 8;
				
		
		
		
		$fdata["bEditPage"]=true; 
	
		
		$fdata["bViewPage"]=true; 
	
		
		
		
	//Begin validation
	$fdata["validateAs"] = array();
						$fdata["validateAs"]["basicValidate"][] = "IsRequired";
	
										//End validation
	
				$fdata["FieldPermissions"]=true;
	
		
				
		
		
		
			$tdatausers["identity_id"]=$fdata;
//	creation_date
	$fdata = array();
	$fdata["strName"] = "creation_date";
	$fdata["ownerTable"] = "users";
		$fdata["Label"]="加入日期"; 
	
		
		
	$fdata["FieldType"]= 135;
	
		
			$fdata["UseiBox"] = false;
	
	$fdata["EditFormat"]= "Date";
	$fdata["ViewFormat"]= "Short Date";
	
		
		
		
		
		$fdata["NeedEncode"]=true;
	
	$fdata["GoodName"]= "creation_date";
	
		$fdata["FullName"]= "creation_date";
	
		$fdata["IsRequired"]=true; 
	
		
		
		
		
				$fdata["Index"]= 9;
		$fdata["DateEditType"] = 13; 
	$fdata["InitialYearFactor"] = 100; 
	$fdata["LastYearFactor"] = 10; 
			
		$fdata["bListPage"]=true; 
	
		
		
		
		
		$fdata["bViewPage"]=true; 
	
		
		
		
	//Begin validation
	$fdata["validateAs"] = array();
						$fdata["validateAs"]["basicValidate"][] = "IsRequired";
	
										//End validation
	
				$fdata["FieldPermissions"]=true;
	
		
				
		
		
		
			$tdatausers["creation_date"]=$fdata;

	
$tables_data["users"]=&$tdatausers;
$field_labels["users"] = &$fieldLabelsusers;
$fieldToolTips["users"] = &$fieldToolTipsusers;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["users"] = array();

	
// tables which are master tables for current table (detail)
$masterTablesData["users"] = array();

// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










$proto60=array();
$proto60["m_strHead"] = "SELECT";
$proto60["m_strFieldList"] = "id,   name,   cn,   email,   login,   password,   icon,   identity_id,   creation_date";
$proto60["m_strFrom"] = "FROM users";
$proto60["m_strWhere"] = "";
$proto60["m_strOrderBy"] = "";
$proto60["m_strTail"] = "";
$proto61=array();
$proto61["m_sql"] = "";
$proto61["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto61["m_column"]=$obj;
$proto61["m_contained"] = array();
$proto61["m_strCase"] = "";
$proto61["m_havingmode"] = "0";
$proto61["m_inBrackets"] = "0";
$proto61["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto61);

$proto60["m_where"] = $obj;
$proto63=array();
$proto63["m_sql"] = "";
$proto63["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto63["m_column"]=$obj;
$proto63["m_contained"] = array();
$proto63["m_strCase"] = "";
$proto63["m_havingmode"] = "0";
$proto63["m_inBrackets"] = "0";
$proto63["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto63);

$proto60["m_having"] = $obj;
$proto60["m_fieldlist"] = array();
						$proto65=array();
			$obj = new SQLField(array(
	"m_strName" => "id",
	"m_strTable" => "users"
));

$proto65["m_expr"]=$obj;
$proto65["m_alias"] = "";
$obj = new SQLFieldListItem($proto65);

$proto60["m_fieldlist"][]=$obj;
						$proto67=array();
			$obj = new SQLField(array(
	"m_strName" => "name",
	"m_strTable" => "users"
));

$proto67["m_expr"]=$obj;
$proto67["m_alias"] = "";
$obj = new SQLFieldListItem($proto67);

$proto60["m_fieldlist"][]=$obj;
						$proto69=array();
			$obj = new SQLField(array(
	"m_strName" => "cn",
	"m_strTable" => "users"
));

$proto69["m_expr"]=$obj;
$proto69["m_alias"] = "";
$obj = new SQLFieldListItem($proto69);

$proto60["m_fieldlist"][]=$obj;
						$proto71=array();
			$obj = new SQLField(array(
	"m_strName" => "email",
	"m_strTable" => "users"
));

$proto71["m_expr"]=$obj;
$proto71["m_alias"] = "";
$obj = new SQLFieldListItem($proto71);

$proto60["m_fieldlist"][]=$obj;
						$proto73=array();
			$obj = new SQLField(array(
	"m_strName" => "login",
	"m_strTable" => "users"
));

$proto73["m_expr"]=$obj;
$proto73["m_alias"] = "";
$obj = new SQLFieldListItem($proto73);

$proto60["m_fieldlist"][]=$obj;
						$proto75=array();
			$obj = new SQLField(array(
	"m_strName" => "password",
	"m_strTable" => "users"
));

$proto75["m_expr"]=$obj;
$proto75["m_alias"] = "";
$obj = new SQLFieldListItem($proto75);

$proto60["m_fieldlist"][]=$obj;
						$proto77=array();
			$obj = new SQLField(array(
	"m_strName" => "icon",
	"m_strTable" => "users"
));

$proto77["m_expr"]=$obj;
$proto77["m_alias"] = "";
$obj = new SQLFieldListItem($proto77);

$proto60["m_fieldlist"][]=$obj;
						$proto79=array();
			$obj = new SQLField(array(
	"m_strName" => "identity_id",
	"m_strTable" => "users"
));

$proto79["m_expr"]=$obj;
$proto79["m_alias"] = "";
$obj = new SQLFieldListItem($proto79);

$proto60["m_fieldlist"][]=$obj;
						$proto81=array();
			$obj = new SQLField(array(
	"m_strName" => "creation_date",
	"m_strTable" => "users"
));

$proto81["m_expr"]=$obj;
$proto81["m_alias"] = "";
$obj = new SQLFieldListItem($proto81);

$proto60["m_fieldlist"][]=$obj;
$proto60["m_fromlist"] = array();
												$proto83=array();
$proto83["m_link"] = "SQLL_MAIN";
			$proto84=array();
$proto84["m_strName"] = "users";
$proto84["m_columns"] = array();
$proto84["m_columns"][] = "id";
$proto84["m_columns"][] = "name";
$proto84["m_columns"][] = "cn";
$proto84["m_columns"][] = "email";
$proto84["m_columns"][] = "login";
$proto84["m_columns"][] = "password";
$proto84["m_columns"][] = "icon";
$proto84["m_columns"][] = "identity_id";
$proto84["m_columns"][] = "creation_date";
$proto84["m_columns"][] = "active";
$obj = new SQLTable($proto84);

$proto83["m_table"] = $obj;
$proto83["m_alias"] = "";
$proto85=array();
$proto85["m_sql"] = "";
$proto85["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto85["m_column"]=$obj;
$proto85["m_contained"] = array();
$proto85["m_strCase"] = "";
$proto85["m_havingmode"] = "0";
$proto85["m_inBrackets"] = "0";
$proto85["m_useAlias"] = "0";
$obj = new SQLLogicalExpr($proto85);

$proto83["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto83);

$proto60["m_fromlist"][]=$obj;
$proto60["m_groupby"] = array();
$proto60["m_orderby"] = array();
$obj = new SQLQuery($proto60);

$queryData_users = $obj;
$tdatausers[".sqlquery"] = $queryData_users;

$tableEvents["users"] = new eventsBase;

?>
