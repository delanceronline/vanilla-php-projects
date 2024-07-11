<?php 
class eventsBase
{
	var $events = array();
	var $captchas = array();
	function exists($event) 
	{ 
		return (array_key_exists($event,$this->events)!==FALSE);
	}
	
	function existsCAPTCHA($page)
	{
		return (array_key_exists($page,$this->captchas)!==FALSE);
	}
	
	function callCAPTCHA(&$pageObject)
	{
		if($pageObject->pageType == "add")
			$this->displayCaptchaOnAdd();
		elseif($pageObject->pageType == "edit")
			$this->displayCaptchaOnEdit();
		elseif($pageObject->pageType == "register")
			$this->displayCaptchaOnRegister();
	}
}

class class_GlobalEvents extends eventsBase
{ 
	function class_GlobalEvents()
	{
	// fill list of events

		$this->events["BeforeLogin"]=true;

		$this->events["AfterSuccessfulLogin"]=true;


//	onscreen events


		}
// Captchas functions	
//	handlers

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		

		
		
		
		
		
				// Before login
function BeforeLogin($username,$password,&$message)
{

		    

// Place event code here.
// Use "Add Action" button to add code snippets.

global $conn;
$strSQL = "SELECT status from clients WHERE name='$username'";
$rs = db_query($strSQL,$conn);
$data = db_fetch_array($rs);
if($data['status'] == 0)
{
	$message = GetCustomLabel("ACCOUNT_INACTIVE");
	return false;
}

return true;
;		
} // function BeforeLogin

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		

		
		
		
		
		
		
				// After successful login
function AfterSuccessfulLogin($username,$password,&$data)
{

		

// Place event code here.
// Use "Add Action" button to add code snippets.

global $conn;
$strSQL = "SELECT id from clients WHERE name='$username'";
$rs = db_query($strSQL,$conn);
$data = db_fetch_array($rs);
$_SESSION['uid'] = $data['id'];

;		
} // function AfterSuccessfulLogin

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		

//	onscreen events
} 
?>
