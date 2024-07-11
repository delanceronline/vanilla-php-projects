<?php 
class eventclass_supplies  extends eventsBase
{ 
	function eventclass_supplies()
	{
	// fill list of events
		$this->events["BeforeAdd"]=true;

		$this->events["BeforeEdit"]=true;

		$this->events["BeforeShowView"]=true;

		$this->events["BeforeProcessRowList"]=true;


//	onscreen events

	}
// Captchas functions	

//	handlers

		
		
		
		
		
		
		
		
		
				// Before record added
function BeforeAdd(&$values,&$message,$inline)
{

		

// Place event code here.
// Use "Add Action" button to add code snippets.

$today = date('Y-m-d H:i:s');
$values['creation_date'] = $today;
$values['modified_date'] = $today;

return true;
;		
} // function BeforeAdd

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		

		
		
		
		
		
		
		
		
		
		
		
		
		
		
				// Before record updated
function BeforeEdit(&$values,$where,&$oldvalues,&$keys,&$message,$inline)
{

		    

// Place event code here.
// Use "Add Action" button to add code snippets.

$today = date('Y-m-d H:i:s');
$values['modified_date'] = $today;

return true;
;		
} // function BeforeEdit

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
				// Before display
function BeforeShowView(&$xt,&$templatefile,&$values)
{

		    

// Place event code here.
// Use "Add Action" button to add code snippets.
$price = $values['unit_price'];

$total = '';

$unit1 = '萬';
$unit2 = '仟';
$unit3 = '元';

if($_SESSION['language'] == "English")
{
	$unit1 = 'Million(s)';
	$unit2 = 'Thousand(s)';
	$unit3 = 'Dollar(s)';
}

$td = floor($price * 0.0001);
if($td > 0)
	$total = $td.$unit1;

$tt = floor(($price - ($td * 10000)) * 0.001);
if($tt > 0)
	$total .= $tt.$unit2;

$dollar = $price - ($td * 10000) - ($tt * 1000);
if($dollar > 0)
	$total .= $dollar.$unit3;

$xt->assign("unit_price_value", $total);
;		
} // function BeforeShowView

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
				// List page: Before record processed
function BeforeProcessRowList(&$data)
{

		

// Place event code here.
// Use "Add Action" button to add code snippets.

$price = $data['unit_price'];

$total = '';

$unit1 = '萬';
$unit2 = '仟';
$unit3 = '元';

if($_SESSION['language'] == "English")
{
	$unit1 = 'Million(s)';
	$unit2 = 'Thousand(s)';
	$unit3 = 'Dollar(s)';
}

$td = floor($price * 0.0001);
if($td > 0)
	$total = $td.$unit1;

$tt = floor(($price - ($td * 10000)) * 0.001);
if($tt > 0)
	$total .= $tt.$unit2;

$dollar = $price - ($td * 10000) - ($tt * 1000);
if($dollar > 0)
	$total .= $dollar.$unit3;

$data['unit_price'] = $total;

return true;
;		
} // function BeforeProcessRowList

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
//	onscreen events

} 
?>
