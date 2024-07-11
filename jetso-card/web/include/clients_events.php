<?php 
class eventclass_clients  extends eventsBase
{ 
	function eventclass_clients()
	{
	// fill list of events
		$this->events["BeforeQueryList"]=true;

		$this->events["BeforeAdd"]=true;

		$this->events["AfterAdd"]=true;

		$this->events["BeforeEdit"]=true;

		$this->events["AfterEdit"]=true;

		$this->events["BeforeProcessRowList"]=true;

		$this->events["ProcessValuesView"]=true;

		$this->events["ProcessValuesEdit"]=true;


//	onscreen events

	}
// Captchas functions	

//	handlers

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
				// List page: Before SQL query
function BeforeQueryList(&$strSQL,&$strWhereClause,&$strOrderBy)
{

		            

// Place event code here.
// Use "Add Action" button to add code snippets.

$strOrderBy = "ORDER BY modified_date DESC";

if($_SESSION["GroupID"] == 0)
{
	$strWhereClause = "name='".$_SESSION["UserID"]."'";
}
else if($_SESSION["GroupID"] == 1)
{
	$strWhereClause = "added_by='".$_SESSION["UserID"]."' OR name='".$_SESSION["UserID"]."'";
}
else if($_SESSION["GroupID"] == 2)
{
	$strWhereClause = "id > 0";
}
;		
} // function BeforeQueryList

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		

		
		
		
		
		
		
		
		
		
				// Before record added
function BeforeAdd(&$values,&$message,$inline)
{

		                

// Place event code here.
// Use "Add Action" button to add code snippets.

global $conn;
$strSQL = "SELECT COUNT(*) from clients WHERE name='".$values['name']."'";
$rs = db_query($strSQL,$conn);
$data = db_fetch_array($rs);
if($data["COUNT(*)"] > 0)
{
	$message = GetCustomLabel("ACCOUNT_EXISTS");
	return false;
}

if($_SESSION['GroupID'] == 0)
{
	$message = GetCustomLabel("NO_RIGHTS");
	return false;
}
else if($_SESSION['GroupID'] == 1)
{
	$values['group'] = 0;
}


if($values['logo'] == "")
{
	
	//$filename = uniqid().".png";
	//copy("images/shop_icon.png", "client_images/".$filename);
	//$values['logo'] = $filename;

	$values['logo'] = 'shop_icon.png';
}

$values['added_by'] = $_SESSION['UserID'];

$today = date('Y-m-d H:i:s');
$values['creation_date'] = $today;
$values['modified_date'] = $today;

return true;
;		
} // function BeforeAdd

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		

		
		
		
		
		
		
		
		
		
		
				// After record added
function AfterAdd(&$values,&$keys,$inline)
{

		                    

// Place event code here.
// Use "Add Action" button to add code snippets.

include('image_resizer.php');

if($values['logo'] != "")
{
	$image = new SimpleImage();
	$image->load('client_images/'.$values['logo']);

	if($image->getWidth() > $image->getHeight() && $image->getWidth() > 100)
	{
		$image->resizeToWidth(100);
		$image->save('client_images/'.$values['logo'], IMAGETYPE_PNG);
	}
	else if($image->getHeight() > 100)
	{
		$image->resizeToHeight(100);
		$image->save('client_images/'.$values['logo'], IMAGETYPE_PNG);
	}
}

$today = date('Y-m-d H:i:s');
$values['creation_date'] = $today;
$values['modified_date'] = $today;
;		
} // function AfterAdd

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		

		
		
		
		
		
		
		
		
		
		
		
		
		
		
				// Before record updated
function BeforeEdit(&$values,$where,&$oldvalues,&$keys,&$message,$inline)
{

		        

// Place event code here.
// Use "Add Action" button to add code snippets.

if($_SESSION['GroupID'] == 0)
{
	$values['name'] = $oldvalues['name'];
	$values['status'] = $oldvalues['status'];

	if($_SESSION['UserID'] == $oldvalues['name'])
	{
		// editing itself
		$values['group'] = $oldvalues['group'];
	}
	else
	{
		$message = GetCustomLabel("NO_RIGHTS");
		return false;
	}
}
if($_SESSION['GroupID'] == 1)
{
	if($_SESSION['UserID'] == $oldvalues['name'])
	{
		// editing itself
		$values['name'] = $oldvalues['name'];
		$values['group'] = $oldvalues['group'];
	}
	else if($_SESSION['UserID'] == $oldvalues['added_by'])
	{
		// editing client created by itself
	
		if($values['name'] != $oldvalues['name'])
		{
			global $conn;
			$strSQL = "SELECT COUNT(*) from clients WHERE name='".$values['name']."'";
			$rs = db_query($strSQL,$conn);
			$data = db_fetch_array($rs);
			if($data["COUNT(*)"] > 0)
			{
				$message = GetCustomLabel("ACCOUNT_EXISTS");
				return false;
			}
		}

		$values['group'] = $oldvalues['group'];
	}
	else
	{
		// editing the others
		$message = GetCustomLabel("NO_RIGHTS");
		return false;
	}
}
/*
if($values['logo'] == "")
{
	$filename = uniqid().".png";
	copy("images/shop_icon.png", "client_images/".$filename);
	$values['logo'] = $filename;
}
*/

$today = date('Y-m-d H:i:s');
$values['modified_date'] = $today;

return true;
;		
} // function BeforeEdit

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
				// After record updated
function AfterEdit(&$values,$where,&$oldvalues,&$keys,$inline)
{

		                

// Place event code here.
// Use "Add Action" button to add code snippets.

include('image_resizer.php');

if($values['logo'] != "")
{
	$image = new SimpleImage();
	$image->load('client_images/'.$values['logo']);

	if($image->getWidth() > $image->getHeight() && $image->getWidth() > 100)
	{
		$image->resizeToWidth(100);
		$image->save('client_images/'.$values['logo'], IMAGETYPE_PNG);
	}
	else if($image->getHeight() > 100)
	{
		$image->resizeToHeight(100);
		$image->save('client_images/'.$values['logo'], IMAGETYPE_PNG);
	}
}

;		
} // function AfterEdit

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
				// List page: Before record processed
function BeforeProcessRowList(&$data)
{

		

// Place event code here.
// Use "Add Action" button to add code snippets.

if($data['logo'] == '')
{
	$data['logo'] = 'shop_icon.png';
}

return true;
;		
} // function BeforeProcessRowList

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
				// Process record values
function ProcessValuesView(&$values)
{

		

// Place event code here.
// Use "Add Action" button to add code snippets.
if($values['logo'] == '')
{
	$values['logo'] = 'shop_icon.png';
}
;		
} // function ProcessValuesView

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
				// Process record values
function ProcessValuesEdit(&$values)
{

		

// Place event code here.
// Use "Add Action" button to add code snippets.
if($values['logo'] == '')
{
	$values['logo'] = 'shop_icon.png';
}
;		
} // function ProcessValuesEdit

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
//	onscreen events

} 
?>
