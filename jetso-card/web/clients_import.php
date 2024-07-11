<?php

@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");
session_cache_limiter("none");
include("include/dbcommon.php");

header("Expires: Thu, 01 Jan 1970 00:00:01 GMT"); 

set_time_limit(600);

include("include/clients_variables.php");
include("include/import_functions.php");

$strOriginalTableName="`clients`";

if(!@$_SESSION["UserID"])
{ 
	$_SESSION["MyURL"]=$_SERVER["SCRIPT_NAME"]."?".$_SERVER["QUERY_STRING"];
	header("Location: login.php?message=expired"); 
	return;
}
if(!CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Import"))
{
	echo "<p>".mlang_message("NO_PERMISSIONS")."<a href=\"login.php\">".mlang_message("BACK_TO_LOGIN")."</a></p>";
	return;
}

// keys array
$keys[]=AddFieldWrappers("id");
$keys_present=1;

$total_records=0;
$goodlines = 0;


function getFieldNamesByHeaders($fields) 
{
	global $strTableName, $conn, $strOriginalTableName;
// check fields in column headers
	// check that we have labes in column headers
	$fieldsNotFoundArr = array();
	$fNamesArr = array();
	$fNamesFromQuery = GetFieldsList($strTableName);
	
	$fieldLabelError = false;
	$labelFieldsNotFoundArr = array();
	
	for ($j=0;$j<count($fields);$j++)
	{		
		$labelNotFound = true;
		for($i=0;$i<count($fNamesFromQuery);$i++)
		{			
			$label = GetFieldLabel(GoodFieldName($strTableName), GoodFieldName($fNamesFromQuery[$i]));
			if($fields[$j] == $label)
			{				
				$fNamesArr[$j] = $fNamesFromQuery[$i];
				$labelNotFound = false;
				break;
			}				
		}
		if ($labelNotFound)
		{			
			$fieldLabelError = true;
			$labelFieldsNotFoundArr[] = $fields[$j];
		}				
	}
	// if field names are not labels, than compare them with fields from query	
	$fieldsListError = false;
	$queryFieldsNotFoundArr = array();
	
	if ($fieldLabelError)
	{
		$fieldFromListNotFound = true;
		$fNamesArr = array();
		for ($j=0;$j<count($fields);$j++)
		{
			$fieldNotFound = true;
			for($i=0;$i<count($fNamesFromQuery);$i++)
			{
				if($fields[$j] == $fNamesFromQuery[$i])
				{
					$fNamesArr[$j] = $fNamesFromQuery[$i];
					$fieldNotFound = false;
					$fieldFromListNotFound = false;
					break;
				}
			}
			if ($fieldNotFound)
			{
				$fieldsListError = true;
				$queryFieldsNotFoundArr[] = $fields[$j];
			}	
		}
	}
	
	// if field list not lables or fields from query, than compare fields from DB
	$fieldsDbError = false;
	$dbFieldsNotFoundArr = array();
	if ($fieldLabelError && $fieldsListError)
	{
		$fNamesArr = array();
		$strSQL = "select * from ".AddTableWrappers($strOriginalTableName);
		$rs = db_query($strSQL,$conn);
		$dbFieldNum = db_numfields($rs);
		
		for ($j=0;$j<count($fields);$j++)
		{	
			$fieldFromDBNotFound = true;
			for($i=0;$i<$dbFieldNum;$i++)
			{
				$fNameFromDB = db_fieldname($rs,$i);
				if($fields[$j] == $fNameFromDB)
				{				
					$fNamesArr[$j] = $fNameFromDB;
					$fieldFromDBNotFound = false;
					break;
				}				
			}	
			if ($fieldFromDBNotFound)
			{
				$fieldsDbError = true;
				$dbFieldsNotFoundArr[] = $fields[$j];
			}				
		}		
	}
	
	// if fields are not labels, fields from list and fields from table
	if ($fieldLabelError && $fieldsListError && $fieldsDbError)
	{
		if (count($labelFieldsNotFoundArr) < count($dbFieldsNotFoundArr) && count($labelFieldsNotFoundArr) < count($queryFieldsNotFoundArr) ){
			$fieldsNotFoundArr = $labelFieldsNotFoundArr;
		}elseif (count($dbFieldsNotFoundArr) < count($labelFieldsNotFoundArr) && count($dbFieldsNotFoundArr) < count($queryFieldsNotFoundArr) ){
			$fieldsNotFoundArr = $dbFieldsNotFoundArr;
		}elseif (count($queryFieldsNotFoundArr) < count($labelFieldsNotFoundArr) && count($queryFieldsNotFoundArr) < count($dbFieldsNotFoundArr)){
			$fieldsNotFoundArr = $queryFieldsNotFoundArr;
		}elseif(count($queryFieldsNotFoundArr) == count($labelFieldsNotFoundArr) && count($queryFieldsNotFoundArr) == count($dbFieldsNotFoundArr)){
			$fieldsNotFoundArr = $dbFieldsNotFoundArr;
		}
		echo "Import didn't succed, couldn't find followind fields: ".implode(", ", $fieldsNotFoundArr);
		exit();
	}
	// if found any type of fields, than use them as fields array
	else
	{
		return $fNamesArr;
	}
}

//////////////////////
// import from Excel
//////////////////////
function ImportFromExcel($uploadfile)
{
	$autoinc=false;
	$ret = 1;
	global $error_message, $keys, $goodlines, $total_records, $conn, $strOriginalTableName, $strTableName, $keys_present;
	
	$data=openImportExcelFile($uploadfile);
	
	// populate field names array
	
	$fields=array();
	
	$fields=getImportExcelFields($data);
	
	$fields = getFieldNamesByHeaders($fields);	
	
	$keys_present=1;
	
	for($k=0; $k<count($keys); $k++)
	{
		if (!in_array(RemoveFieldWrappers($keys[$k]),$fields))
		{
			$keys_present=0;
			break;
		}
	}

		$autoinc=true;
																		
	$ret=getImportExelData($data,$fields);
	
		
	return $ret;

}

/////////////////////////
// import from CSV
/////////////////////////
function ImportFromCSV($uploadfile)
{	
	$ret = 1;
	global $error_message, $keys, $goodlines, $total_records, $conn, $strOriginalTableName,$keys_present;
	
	$fields = array();
	
	$fields = getImportCVSFields($uploadfile);
	
	// populate field names array
	for ($j=0;$j<count($fields);$j++)
	{
		$fields[$j] = trim(str_replace('"', "", $fields[$j]));
	}
	$fields = getFieldNamesByHeaders($fields);
	
	$keys_present=1;
	for($k=0; $k<count($keys); $k++)
	{
		if (!in_array(RemoveFieldWrappers($keys[$k]),$fields))
		{
			$keys_present=0;
			break;
		}
	}
	$autoinc = false;
		$autoinc=true;
																	
		
	
	
	$total_records = 0;
	$line = "";		
	$row = 0;
	// parse records from file
	if (($handle = fopen($uploadfile, "r")) !== FALSE) 
	{
	    while (($data = fgetcsv($handle, 1000000, ",")) !== FALSE) 
	    {
			// first rec contain only fields names	    	
	    	if ($row === 0)
	    	{
	    		$row++;
	    		continue;	    		
	    	}
	    	$arr = array();
			foreach($data as $key=>$value)
			{
				$arr[$fields[$key]]=$value;
			}
	    	$ret = InsertRecord($arr, $row);
	        $row++;
	    }
	    fclose($handle);
	}
	
	$total_records = $row-1;
	
	
		
	return $ret;	
} 

function import_error_handler($errno, $errstr, $errfile, $errline)
{
	global $error_happened;
	// echo $errstr ."<br>";
	$error_happened=1;
}
		
function ParseCSVLine($line)
{

	$arr = array();
	$inword=0;
	$hasquotes=0;
	$start=0;
	for ($i=0;$i<strlen($line);$i++)
	{
		$c = $line[$i];
		switch ($c)
		{
			case "\"":
			
				if (!$inword)
					{
						$inword=1;
						$hasquotes=1;
						$start=$i+1;
					}
				else
					{
						if ($line[$i+1]=="\"")
						{
							$i++;
							continue;
						}
						else
						{
							$inword=0;
							$hasquotes=0;
							$arr[] = substr($line, $start, $i-$start);
							$start=$i+1;
						}
					}				
					
				break;
			case ",":
				if (!$inword)
					{
						if ($line[$i+1]==",") $inword=1;
						$hasquotes=0;
						$start=$i+1;
					}
				else
					{
						if (!$hasquotes)
						{
							$inword=0;
							if ($line[$i+1]==",") $inword=1;
							$hasquotes=0;
							$arr[] = substr($line, $start, $i-$start);
							$start=$i+1;
						}
					}		
				break;
			case " ":
				break;
			default:
				$inword=1;		
				break;
		}
	}
	
		if ($start<strlen($line))
			$arr[] = substr($line, $start);


	
	return $arr;

}		
		
		
function InsertRecord($arr, $recInd)
{

	global $goodlines, $conn, $error_message, $keys_present, $keys, $strOriginalTableName,$eventObj;
	$ret=1;
	$rawvalues = array();
	foreach($arr as $key=>$val)
    {
        $rawvalues[$key] = $val;
		$type=GetFieldType($key);
		if(NeedQuotes($type))
        {
            if(IsDateFieldType($type))
            {
                $value = localdate2db($val);
                if ($value !== -1 && $value !== FALSE && strlen($value))
                    $arr[$key]=$value;
                else
                    $arr[$key] = NULL;
            }
            elseif(IsTimeType($type))
            {
                $value = localtime2db($val);
                if ($value !== -1 && $value !== FALSE && strlen($value) && strlen($val) && !is_null($val))
                    $arr[$key]=$value;
                else
                    $arr[$key] = NULL;
            }
        }    
        else
        {
            $value = (string)$val;
            $value = str_replace(",",".",$value);
			if(strlen($value)>0)
				$arr[$key]=0+$value;
			else
				$arr[$key]=NULL;
        }
    }
    $retval=true;
    if ($eventObj->exists('BeforeInsert'))
        $retval=$eventObj->BeforeInsert($rawvalues,$arr);
    
    if($retval)
    {
        $fields = array_keys($arr);
        
        foreach($fields as $key=>$val)
            $fields_list[$key]=AddFieldWrappers($val);
        
        $values_list="";
        foreach($arr as $key=>$val)
        {
            if(!is_null($arr[$key]))
                $values_list.=add_db_quotes($key,$val).", ";
            else
                $values_list.="NULL, ";
        }
        if(strlen($values_list)>0)
            $values_list=substr($values_list,0,strlen($values_list)-2);

            $sql = "insert into ".AddTableWrappers($strOriginalTableName)." (".implode(",", $fields_list).") values (".$values_list.")"; 
        
        if (db_exec_import($sql,$conn))
        {
            $goodlines++;
        }
        else    
        {
            $temp_error_message="<b>Error:</b> in the line: ".implode(",",$arr).'&nbsp;&nbsp;<a linkType="debugOpener" recId="'.$recInd.'" href="" onclick="importMore('.$recInd.');">More info</a><br>';
            $temp_error_message .= '<div id="importDebugInfoTable'.$recInd.'" cellpadding="3" cellspacing="1" align="center" style="display: none;"><p class="error">SQL query: '.$sql.'; </p><p class="error">DB error: '.db_error().';</p></div>';
            
            
            $temp_error_message .= "<br><br>";
            // we'll try to update the record
            
            if ($keys_present)
            {
                $sql = "update ".AddTableWrappers($strOriginalTableName)." set ";
                $sqlset="";
                $where = " where ";
                foreach($fields as $k=>$val)
                {                	
                    if (!in_array(AddFieldWrappers($fields[$k]), $keys))
                    {
                        if(!is_null($arr[$val]))
							$sqlset .= $fields_list[$k] . "=". add_db_quotes($val,$arr[$val]) . ", ";
						else
							$sqlset .= $fields_list[$k] . "=NULL, ";
                    }
					else 
                    {
                        $where.= $fields_list[$k] . "=". add_db_quotes($val,$arr[$val]) . " and ";
                    }
                }                        
				
                if(strlen($sqlset)>0)
                    $sql.= substr($sqlset, 0, strlen($sqlset)-2);
                $where = substr($where, 0, strlen ($where)-5);
                $sql.= " " . $where;
            
            
                $rstmp=db_query("select * from " .AddTableWrappers($strOriginalTableName). " " . $where,$conn);
                $data=db_fetch_array($rstmp);
                
                              
                if ($data)
                {                	
                    if (db_exec_import($sql,$conn))
                    {
                        // update successfull
                        $goodlines++;
                    }
                    else
                    {
                    	echo 'not updated';
                        // update not successfull
                        $error_message .= $temp_error_message;
                        $ret = 0;            
                    }
                }
                else    //     nothing to update  
                {
                    $error_message .= $temp_error_message;
                    $ret = 0;            
                }
            }
            else
                $error_message .= $temp_error_message;
        }
        return $ret;
    }
}		
	

$id = postvalue("id") != "" ? postvalue("id") : 1;
$error_message = "";


if(@$_POST["a"]=="added")
{
	
$value=postvalue("value_ImportFileName".$id);
$type=postvalue("type_ImportFileName".$id);

$importfile=getImportTableName("file_ImportFileName".$id);
	
//check the file extension  
$ext = substr($value, strlen($value)-4);
$ext=strtoupper($ext);

if ($eventObj->exists('BeforeImport'))
{
	if ($eventObj->BeforeImport() === false)
	{
		exit(0);
	}
}
if($ext==".XLS")
{
	ImportFromExcel($importfile);
}	
else 
{
	ImportFromCSV($importfile);
}	

if ($eventObj->exists('AfterImport'))
{
	$eventObj->AfterImport($goodlines, $total_records-$goodlines);
}

if ($goodlines==$total_records)
{
	$error_message = "<font size=2>" . $goodlines . " records were imported</font><br>";
	$error_message .= "<font size=2>To back to your list click on the <b>Back to list</b> button.</font>";
}
else
{
	$error_message .= "Number of records: ". $total_records ."<br>";
	$error_message .= "Imported: ".$goodlines."<br>";
	$error_message .= "Not imported: ";
	$error_message .= $total_records-$goodlines ."<br>";
}	
}

include('include/xtempl.php');
include('classes/runnerpage.php');
$xt = new Xtempl();


//array of params for classes
$params = array("pageType" => PAGE_IMPORT, "id" =>$id, "tName"=>$strTableName);
$params["xt"] = &$xt;
$params["needSearchClauseObj"] = false;
$pageObject = new RunnerPage($params);

// add button events if exist
$pageObject->addButtonHandlers();

$pageObject->body["begin"] .="<script type=\"text/javascript\" src=\"include/jquery.js\"></script>\r\n";
$pageObject->body["begin"].="<script language=\"JavaScript\" src=\"include/jsfunctions.js\"></script>\r\n";
$pageObject->body["begin"].="<script>\r\n";
$pageObject->body["begin"].="function importMore(id)\r\n";
$pageObject->body["begin"].="{\r\n";
$pageObject->body["begin"].="	if($('#importDebugInfoTable'+id).css('display')=='none')\r\n";
$pageObject->body["begin"].="		$('#importDebugInfoTable'+id).show();\r\n";
$pageObject->body["begin"].="	else\r\n";
$pageObject->body["begin"].="		$('#importDebugInfoTable'+id).hide();\r\n";
$pageObject->body["begin"].="}\r\n";
$pageObject->body["begin"].="</script>\r\n";
if ($pageObject->debugJSMode === true)
{
	/*$pageObject->body['begin'] .= "<script type=\"text/javascript\" src=\"include/runnerJS/Runner.js\"></script>\r\n".
		"<script type=\"text/javascript\" src=\"include/runnerJS/Util.js\"></script>\r\n".
		"<script type=\"text/javascript\" src=\"include/runnerJS/Observer.js\"></script>\r\n";*/
	$pageObject->body['begin'] .= "<script language=\"JavaScript\" src=\"include/runnerJS/RunnerBase.js\"></script>\r\n";
}
else
	$pageObject->body["begin"].="<script language=\"JavaScript\" src=\"include/runnerJS/RunnerBase.js\"></script>\r\n";

$pageObject->fillSetCntrlMaps();
$pageObject->body['end'] .= '<script>';
$pageObject->body['end'] .= "window.controlsMap = '".jsreplace(my_json_encode($pageObject->controlsHTMLMap))."';";
$pageObject->body['end'] .= "window.settings = '".jsreplace(my_json_encode($pageObject->jsSettings))."';";
$pageObject->body['end'] .= '</script>';
$pageObject->addCommonJs();	
	
$pageObject->body["end"] .= "<script>".$pageObject->PrepareJS()."</script>";
$xt->assignbyref("body",$pageObject->body);

$xt->assign("importfile_attrs", "id=\"file_ImportFileName".$pageObject->id."\" name=\"file_ImportFileName".$pageObject->id."\"");
$xt->assign("backtolist_attrs", "id=\"backButton".$pageObject->id."\"");
$xt->assign("importlink_attrs", "id=\"saveButton".$pageObject->id."\"");
$xt->assign("error_message", $error_message);
$xt->display("clients_import.htm");

?>


