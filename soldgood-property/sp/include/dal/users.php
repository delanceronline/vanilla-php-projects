<?php
$dalTableusers = array();
$dalTableusers["id"] = array("type"=>3,"varname"=>"id");
$dalTableusers["name"] = array("type"=>200,"varname"=>"name");
$dalTableusers["cn"] = array("type"=>200,"varname"=>"cn");
$dalTableusers["email"] = array("type"=>200,"varname"=>"email");
$dalTableusers["login"] = array("type"=>200,"varname"=>"login");
$dalTableusers["password"] = array("type"=>200,"varname"=>"password");
$dalTableusers["icon"] = array("type"=>200,"varname"=>"icon");
$dalTableusers["identity_id"] = array("type"=>3,"varname"=>"identity_id");
$dalTableusers["creation_date"] = array("type"=>135,"varname"=>"creation_date");
$dalTableusers["active"] = array("type"=>3,"varname"=>"active");
	$dalTableusers["id"]["key"]=true;
$dal_info["users"]=&$dalTableusers;

?>