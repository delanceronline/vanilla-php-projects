<?php
$dalTablecampaigns = array();
$dalTablecampaigns["owner"] = array("type"=>3,"varname"=>"owner");
$dalTablecampaigns["id"] = array("type"=>3,"varname"=>"id");
$dalTablecampaigns["coupon"] = array("type"=>200,"varname"=>"coupon");
$dalTablecampaigns["cn_offset"] = array("type"=>3,"varname"=>"cn_offset");
$dalTablecampaigns["cn_prefix"] = array("type"=>200,"varname"=>"cn_prefix");
$dalTablecampaigns["cc"] = array("type"=>3,"varname"=>"cc");
$dalTablecampaigns["cr"] = array("type"=>3,"varname"=>"cr");
$dalTablecampaigns["pt"] = array("type"=>201,"varname"=>"pt");
$dalTablecampaigns["pd"] = array("type"=>201,"varname"=>"pd");
$dalTablecampaigns["pi"] = array("type"=>200,"varname"=>"pi");
$dalTablecampaigns["terms"] = array("type"=>201,"varname"=>"terms");
$dalTablecampaigns["ti"] = array("type"=>200,"varname"=>"ti");
$dalTablecampaigns["start_date"] = array("type"=>7,"varname"=>"start_date");
$dalTablecampaigns["start_time"] = array("type"=>134,"varname"=>"start_time");
$dalTablecampaigns["end_date"] = array("type"=>7,"varname"=>"end_date");
$dalTablecampaigns["end_time"] = array("type"=>134,"varname"=>"end_time");
$dalTablecampaigns["status"] = array("type"=>3,"varname"=>"status");
$dalTablecampaigns["creation_date"] = array("type"=>135,"varname"=>"creation_date");
$dalTablecampaigns["modified_date"] = array("type"=>135,"varname"=>"modified_date");
	$dalTablecampaigns["id"]["key"]=true;
$dal_info["campaigns"]=&$dalTablecampaigns;

?>