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

		$this->events["BeforeRegister"]=true;


//	onscreen events

		$this->captchas["register"] = array("strName"=>"users_captcha");

		}
// Captchas functions	
		function displayCaptchaOnRegister()
	{
		DisplayCAPTCHA();;
	}
//	handlers

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		

		
		
		
		
		
		
		
		
				// Before registration
function BeforeRegister(&$userdata,&$message)
{

		    

// Place event code here.
// Use "Add Action" button to add code snippets.

$today = date('Y-m-d H:i:s');
$userdata['creation_date'] = $today;

return true;
;		
} // function BeforeRegister

		
		
		
		
		
		
		
		
		
		
		
		
		

//	onscreen events
} 
?>
