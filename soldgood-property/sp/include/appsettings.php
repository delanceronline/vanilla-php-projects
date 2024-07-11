<?php
$dDebug=false;
$dSQL="";

$bSubqueriesSupported=true;

$tables_data=array();
$field_labels=array();
$fieldToolTips=array();

//	custom labels
$custom_labels=array();
$custom_labels["Chinese (Hong Kong S.A.R.)"] = array();
$custom_labels["English"] = array();

define("FORMAT_NONE","");
define("FORMAT_DATE_SHORT","Short Date");
define("FORMAT_DATE_LONG","Long Date");
define("FORMAT_DATE_TIME","Datetime");
define("FORMAT_TIME","Time");
define("FORMAT_CURRENCY","Currency");
define("FORMAT_PERCENT","Percent");
define("FORMAT_HYPERLINK","Hyperlink");
define("FORMAT_EMAILHYPERLINK","Email Hyperlink");
define("FORMAT_FILE_IMAGE","File-based Image");
define("FORMAT_DATABASE_IMAGE","Database Image");
define("FORMAT_DATABASE_FILE","Database File");
define("FORMAT_FILE","Document Download");
define("FORMAT_LOOKUP_WIZARD","Lookup wizard");
define("FORMAT_PHONE_NUMBER","Phone Number");
define("FORMAT_NUMBER","Number");
define("FORMAT_HTML","HTML");
define("FORMAT_CHECKBOX","Checkbox");
define("FORMAT_MAP","Map");
define("FORMAT_CUSTOM","Custom");

define("FORMAT_AUDIO", "Audio file");
define("FORMAT_DATABASE_AUDIO", "Database audio");
define("FORMAT_VIDEO", "Video file");
define("FORMAT_DATABASE_VIDEO", "Database video");

define("EDIT_FORMAT_NONE","");
define("EDIT_FORMAT_TEXT_FIELD","Text field");
define("EDIT_FORMAT_TEXT_AREA","Text area");
define("EDIT_FORMAT_PASSWORD","Password");
define("EDIT_FORMAT_DATE","Date");
define("EDIT_FORMAT_TIME","Time");
define("EDIT_FORMAT_RADIO","Radio button");
define("EDIT_FORMAT_CHECKBOX","Checkbox");
define("EDIT_FORMAT_DATABASE_IMAGE","Database image");
define("EDIT_FORMAT_DATABASE_FILE","Database file");
define("EDIT_FORMAT_FILE","Document upload");
define("EDIT_FORMAT_LOOKUP_WIZARD","Lookup wizard");
define("EDIT_FORMAT_HIDDEN","Hidden field");
define("EDIT_FORMAT_READONLY","Readonly");

define("EDIT_DATE_SIMPLE",0);
define("EDIT_DATE_SIMPLE_DP",11);
define("EDIT_DATE_DD",12);
define("EDIT_DATE_DD_DP",13);

define("MODE_ADD",0);
define("MODE_EDIT",1);
define("MODE_SEARCH",2);
define("MODE_LIST",3);
define("MODE_PRINT",4);
define("MODE_VIEW",5);
define("MODE_INLINE_ADD",6);
define("MODE_INLINE_EDIT",7);
define("MODE_EXPORT",8);

define("LOGIN_HARDCODED",0);
define("LOGIN_TABLE",1);

define("SECURITY_NONE",-1);
define("SECURITY_HARDCODED", 0);
define("SECURITY_TABLE", 1);

define("ADVSECURITY_ALL",0);
define("ADVSECURITY_VIEW_OWN",1);
define("ADVSECURITY_EDIT_OWN",2);
define("ADVSECURITY_NONE",3);

define("ACCESS_LEVEL_ADMIN","Admin");
define("ACCESS_LEVEL_ADMINGROUP","AdminGroup");
define("ACCESS_LEVEL_USER","User");
define("ACCESS_LEVEL_GUEST","Guest");

define("nDATABASE_MySQL",0);
define("nDATABASE_Oracle",1);
define("nDATABASE_MSSQLServer",2);
define("nDATABASE_Access",3);
define("nDATABASE_PostgreSQL",4);
define("nDATABASE_Informix",5);
define("nDATABASE_SQLite3",6);
define("nDATABASE_DB2",7);

define("ADD_SIMPLE",0);
define("ADD_INLINE",1);
define("ADD_ONTHEFLY",2);
define("ADD_MASTER",3);
define("ADD_POPUP",4);

define("EDIT_SIMPLE",0);
define("EDIT_INLINE",1);
define("EDIT_ONTHEFLY",2);
define("EDIT_POPUP",3);

define("titTABLE",0);
define("titVIEW",1);
define("titREPORT",2);
define("titCHART",3);

// for report lib
define("REPORT_STEPPED", 0);
define("REPORT_BLOCK", 1);
define("REPORT_OUTLINE", 2);
define("REPORT_ALIGN", 3);
define("REPORT_TABULAR", 6);

define("TOTAL_NONE", -1);
define("TOTAL_MAX", 0);
define("TOTAL_AVG", 1);
define("TOTAL_SUM", 3);
define("TOTAL_MIN", 4);

define("LIST_SIMPLE",0);
define("LIST_LOOKUP",1);
define("LIST_DETAILS",3);
define("LIST_AJAX",4);
define("RIGHTS_PAGE", 5);
define("MEMBERS_PAGE", 6);

define("DP_POPUP",0);
define("DP_INLINE",1);
define("DP_NONE",2);

define("SEARCH_SIMPLE",0);
define("SEARCH_LOAD_CONTROL",1);

define("LCT_DROPDOWN",0);
define("LCT_AJAX",1);
define("LCT_LIST",2);
define("LCT_CBLIST",3);

define("LT_LISTOFVALUES",0);
define("LT_LOOKUPTABLE",1);

$globalSettings = array();
$globalSettings["delFile"] = true;
$globalSettings["nLoginMethod"] = 1;
$globalSettings["dbType"] = 0;
$globalSettings["createLoginPage"] = true;

$wr_is_standalone=false;


$strLeftWrapper="`";
$strRightWrapper="`";

$cLoginTable				= "users";
$cUserNameField			= "login";
$cPasswordField			= "password";
$cUserGroupField			= "login";
$cEmailField			= "email";

$cUserNameFieldType			= 200;
$cPasswordFieldType			= 200;
$cEmailFieldType			= 200;
																								$cEmailFieldType			= 200;
		$cUserNameFieldType			= 200;
								$cPasswordFieldType			= 200;
																										

$nDBType=0;

$useAJAX = true;
$suggestAllContent = true;

$strLastSQL="";

$includes_js=array();
$includes_jsreq=array();
$includes_css=array();

$mlang_messages=array();
$mlang_charsets=array();

// table captions
$tableCaptions = array();
$tableCaptions["English"]=array();
$tableCaptions["English"]["districts"] = "Districts";
$tableCaptions["English"]["supplies"] = "My Property";
$tableCaptions["English"]["supply_modes"] = "Supply Modes";
$tableCaptions["English"]["supply_types"] = "Supply Types";
$tableCaptions["English"]["users"] = "My Information";
$tableCaptions["English"]["zones"] = "Zones";
$tableCaptions["English"]["heights"] = "Heights";
$tableCaptions["English"]["identity"] = "Identity";
$tableCaptions["English"]["property_states"] = "Property States";
$tableCaptions["Chinese (Hong Kong S.A.R.)"]=array();
$tableCaptions["Chinese (Hong Kong S.A.R.)"]["districts"] = "Districts";
$tableCaptions["Chinese (Hong Kong S.A.R.)"]["supplies"] = "我的放盤";
$tableCaptions["Chinese (Hong Kong S.A.R.)"]["supply_modes"] = "Supply Modes";
$tableCaptions["Chinese (Hong Kong S.A.R.)"]["supply_types"] = "Supply Types";
$tableCaptions["Chinese (Hong Kong S.A.R.)"]["users"] = "我的資料";
$tableCaptions["Chinese (Hong Kong S.A.R.)"]["zones"] = "Zones";
$tableCaptions["Chinese (Hong Kong S.A.R.)"]["heights"] = "Heights";
$tableCaptions["Chinese (Hong Kong S.A.R.)"]["identity"] = "Identity";
$tableCaptions["Chinese (Hong Kong S.A.R.)"]["property_states"] = "Property States";

$globalEvents = new class_GlobalEvents;
$tableEvents = array();

// here goes EVENT_INIT_APP event


// Place event code here.
// Use "Add Action" button to add code snippets.
if(!isset($_SESSION['language']))
{
	$_SESSION['language'] = "English";
}
;
$mlang_defaultlang="Chinese (Hong Kong S.A.R.)";


$conn=db_connect();

//	old  menu support
//	deprecated
//	remove after version 5.2
$menuTablesArr = array();
$menuTablesArr[] = array("shortTName"=>"supplies","dataSourceTName"=>"supplies","nType"=>0);
$menuTablesArr[] = array("shortTName"=>"users","dataSourceTName"=>"users","nType"=>0);
$menuTablesArr[] = array("shortTName"=>"property_states","dataSourceTName"=>"property_states","nType"=>0);


$isGroupSecurity = true;

?>