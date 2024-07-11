<?php 
class eventclass_campaigns  extends eventsBase
{ 
	function eventclass_campaigns()
	{
	// fill list of events
		$this->events["BeforeAdd"]=true;

		$this->events["AfterAdd"]=true;

		$this->events["BeforeEdit"]=true;

		$this->events["AfterEdit"]=true;

		$this->events["BeforeQueryList"]=true;

		$this->events["BeforeShowView"]=true;


//	onscreen events

	}
// Captchas functions	

//	handlers

		
		
		
		
		
		
		
		
		
				// Before record added
function BeforeAdd(&$values,&$message,$inline)
{

		            

// Place event code here.
// Use "Add Action" button to add code snippets.
if($values['pt'] == "")
{
	$message = GetCustomLabel("PROVIDE_PROMOTION_TITLE");
	return false;
}

if($values['pd'] == "" && $values['pi'] == "")
{
	$message = GetCustomLabel("PROVIDE_PROMOTION_DETAIL");
	return false;
}

if($values['pd'] == "" && $values['coupon'] == "")
{
	$message = GetCustomLabel("PROVIDE_PROMOTION_COUPON");
	return false;
}

/*
if($values['coupon'] == "")
{
	putenv('GDFONTPATH=' . realpath('.'));

	// Create the image
	$canvas = imagecreatetruecolor(480, 320);
	$cc = imagecolorallocate($canvas, 0, 0, 0);
	imagefill($canvas, 1, 1, $cc);

	$coupon_bg=imagecreatefrompng("images/coupon_bg_1.png");
	
	imagecopy($canvas, $coupon_bg, 0, 0, 0, 0, 480, 320);

	global $conn;
	$strSQL = "SELECT logo from clients WHERE name='".$_SESSION["UserID"]."'";
	$rs = db_query($strSQL,$conn);
	$data = db_fetch_array($rs);
	$logo = $data['logo'];
	if($logo != "")
	{
		require_once('./libs/phpthumb/phpthumb.class.php');
		$phpThumb = new phpThumb();
		$phpThumb->setSourceFilename("client_images/$logo");

		$phpThumb->setParameter('w', '100');
		$phpThumb->setParameter('fltr', 'ric|20|20');
		$phpThumb->setParameter('f', 'png');
		if($phpThumb->GenerateThumbnail())
		{
			imagecopy($canvas, $phpThumb->gdimg_output, 32, 32, 0, 0, 100, 100);
		}
	}

	$final = uniqid().".png";
	imagepng($canvas, "client_images/".$final);
	$values['coupon'] = $final;

	imagedestroy($coupon_bg);
	imagedestroy($canvas);
}
*/

$values['owner'] = $_SESSION['uid'];

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

if($values['pi'] != "")
{
	$image = new SimpleImage();
	$image->load('client_images/'.$values['pi']);
	if($image->getWidth() > 640)
	{
		$image->resizeToWidth(640);
		$image->save('client_images/'.$values['pi']);
	}
}

if($values['coupon'] != "")
{
	$image = new SimpleImage();
	$image->load('client_images/'.$values['coupon']);

	if($image->getWidth() > $image->getHeight() && $image->getWidth() > 640)
	{
		$image->resizeToWidth(640);
		$image->save('client_images/'.$values['coupon']);
	}
	else if($image->getHeight() > 1000)
	{
		$image->resizeToHeight(1000);
		$image->save('client_images/'.$values['coupon']);
	}
}

if($values['ti'] != "")
{
	$image = new SimpleImage();
	$image->load('client_images/'.$values['ti']);
	if($image->getWidth() > 640)
	{
		$image->resizeToWidth(640);
		$image->save('client_images/'.$values['ti']);
	}
}
;		
} // function AfterAdd

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		

		
		
		
		
		
		
		
		
		
		
		
		
		
		
				// Before record updated
function BeforeEdit(&$values,$where,&$oldvalues,&$keys,&$message,$inline)
{

		            

// Place event code here.
// Use "Add Action" button to add code snippets.
if($values['pt'] == "")
{
	$message = GetCustomLabel("PROVIDE_PROMOTION_TITLE");
	return false;
}

$pd = $oldvalues['pd'];
$pi = $oldvalues['pi'];
$pt = $oldvalues['pt'];
$coupon = $oldvalues['coupon'];

if(isset($values['pd']))
	$pd = $values['pd'];

if(isset($values['pi']))
	$pi = $values['pi'];

if(isset($values['pt']))
	$pt = $values['pt'];

if(isset($values['coupon']))
	$coupon = $values['coupon'];

if($pd == "" && $pi == "")
{
	$message = GetCustomLabel("PROVIDE_PROMOTION_DETAIL");
	return false;
}

if($pd == "" && $coupon == "")
{
	$message = GetCustomLabel("PROVIDE_PROMOTION_COUPON");
	return false;
}

/*
if($values['coupon'] == "")
{
	if($oldvalues['coupon'] != "")
	{
		unlink("client_images/".$oldvalues['coupon']);
	}

	putenv('GDFONTPATH=' . realpath('.'));

	// Create the image
	$canvas = imagecreatetruecolor(480, 320);
	$cc = imagecolorallocate($canvas, 0, 0, 0);
	imagefill($canvas, 1, 1, $cc);

	$coupon_bg=imagecreatefrompng("images/coupon_bg_1.png");
	
	imagecopy($canvas, $coupon_bg, 0, 0, 0, 0, 480, 320);

	global $conn;
	$strSQL = "SELECT logo from clients WHERE name='".$_SESSION["UserID"]."'";
	$rs = db_query($strSQL,$conn);
	$data = db_fetch_array($rs);
	$logo = $data['logo'];
	if($logo != "")
	{
		require_once('./libs/phpthumb/phpthumb.class.php');
		$phpThumb = new phpThumb();
		$phpThumb->setSourceFilename("client_images/$logo");

		$phpThumb->setParameter('w', '100');
		$phpThumb->setParameter('fltr', 'ric|20|20');
		$phpThumb->setParameter('f', 'png');
		if($phpThumb->GenerateThumbnail())
		{
			imagecopy($canvas, $phpThumb->gdimg_output, 32, 32, 0, 0, 100, 100);
		}
	}

	$final = uniqid().".png";
	imagepng($canvas, "client_images/".$final);
	$values['coupon'] = $final;

	imagedestroy($coupon_bg);
	imagedestroy($canvas);
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

if($values['pi'] != "" && $values['pi'] != $oldvalues['pi'])
{
	$image = new SimpleImage();
	$image->load('client_images/'.$values['pi']);
	if($image->getWidth() > 640)
	{
		$image->resizeToWidth(640);
		$image->save('client_images/'.$values['pi']);
	}
}

if($values['coupon'] != "" && $values['coupon'] != $oldvalues['coupon'])
{
	$image = new SimpleImage();
	$image->load('client_images/'.$values['coupon']);

	if($image->getWidth() > $image->getHeight() && $image->getWidth() > 480)
	{
		$image->resizeToWidth(480);
		$image->save('client_images/'.$values['coupon']);
	}
	else if($image->getHeight() > 460)
	{
		$image->resizeToHeight(460);
		$image->save('client_images/'.$values['coupon']);
	}
}

if($values['ti'] != "" && $values['ti'] != $oldvalues['ti'])
{
	$image = new SimpleImage();
	$image->load('client_images/'.$values['ti']);
	if($image->getWidth() > 640)
	{
		$image->resizeToWidth(640);
		$image->save('client_images/'.$values['ti']);
	}
}
;		
} // function AfterEdit

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
				// List page: Before SQL query
function BeforeQueryList(&$strSQL,&$strWhereClause,&$strOrderBy)
{

		

// Place event code here.
// Use "Add Action" button to add code snippets.

$strWhereClause = "owner = ".$_SESSION['uid'];

;		
} // function BeforeQueryList

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
				// Before display
function BeforeShowView(&$xt,&$templatefile,&$values)
{

		

// Place event code here.
// Use "Add Action" button to add code snippets.

global $conn;
$strSQL = "SELECT COUNT(*) from coupons_released WHERE is_used=1 AND oid=".$values['id'];
$rs = db_query($strSQL,$conn);
$data = db_fetch_array($rs);

$xt->assign('cu_field_name', GetCustomLabel("COUPON_USED_COUNT"));
$xt->assign('cu_value', $data['COUNT(*)']);
;		
} // function BeforeShowView

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
//	onscreen events

} 
?>
