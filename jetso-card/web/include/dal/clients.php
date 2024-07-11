<?php
$dalTableclients = array();
$dalTableclients["id"] = array("type"=>3,"varname"=>"id");
$dalTableclients["name"] = array("type"=>200,"varname"=>"name");
$dalTableclients["password"] = array("type"=>200,"varname"=>"password");
$dalTableclients["email"] = array("type"=>200,"varname"=>"email");
$dalTableclients["logo"] = array("type"=>200,"varname"=>"logo");
$dalTableclients["sn"] = array("type"=>200,"varname"=>"sn");
$dalTableclients["cp"] = array("type"=>200,"varname"=>"cp");
$dalTableclients["tn"] = array("type"=>200,"varname"=>"tn");
$dalTableclients["website"] = array("type"=>200,"varname"=>"website");
$dalTableclients["fb_page"] = array("type"=>201,"varname"=>"fb_page");
$dalTableclients["fb_page_id"] = array("type"=>200,"varname"=>"fb_page_id");
$dalTableclients["industry"] = array("type"=>3,"varname"=>"industry");
$dalTableclients["status"] = array("type"=>3,"varname"=>"status");
$dalTableclients["added_by"] = array("type"=>200,"varname"=>"added_by");
$dalTableclients["group"] = array("type"=>16,"varname"=>"group");
$dalTableclients["creation_date"] = array("type"=>135,"varname"=>"creation_date");
$dalTableclients["modified_date"] = array("type"=>135,"varname"=>"modified_date");
$dalTableclients["display_order"] = array("type"=>5,"varname"=>"display_order");
	$dalTableclients["id"]["key"]=true;
$dal_info["clients"]=&$dalTableclients;

?>