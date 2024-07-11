<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Generator of C</title>
</head>

<body>
<?php
	include_once ('./../inc/config.inc.php');
	include_once ('./../lib/MySQLConnector.php');
	$connector = new TMySQLConnector($global_db_location, $global_db_name, $global_db_login_id, $global_db_password);	
	if($connector)
	{
		$connector->Execute("SET NAMES 'utf8';");
		
		$range = rand(1, 10);
		
		$region = 1;
		if($range > 6 && $range <= 8)
			$region = 2;
		else if($range > 8)
			$region = 3;
		
		//$region = rand(1, 3);
		
		$sub_region_data = array();
		$connector->GetOneRow($sub_region_data, "WHERE i_region = $region ORDER BY RAND() LIMIT 0, 1", "sub_regions");
		
		//echo $sub_region_data['id'];
		
		//$sub_region = rand(1, 77);		
		$sub_region = $sub_region_data['id'];		
		$connector->GetRows($estates_data, "WHERE i_sub_region = $sub_region", "estates");
		//$connector->GetRows($estates_data, "WHERE i_sub_region = {$sub_region_data['id']}", "estates");
		shuffle($estates_data);
		$estate = $estates_data[0]['name'];
		
		
		//$student_age = rand(7, 17);
		$student_age = rand(7, 16);
		
		$service = 0;		
		if($student_age <= 12)
		{
			$service = 1;			
		}
		else if($student_age <= 15)
		{
			$service = 3;
		}
		else if($student_age <= 17)
		{
			$service = rand(5, 7);			
		}		
		
		
		$tt_slots = "";
				
		$slots = array();
		
		//if($service > 1)
		{
			$slots[] = rand(2, 3);
			$slots[] = rand(6, 7);
			$slots[] = rand(10, 11);
			$slots[] = rand(14, 15);
			$slots[] = rand(18, 19);
		}
		/*
		else
		{
			$slots[] = rand(1, 3);
			$slots[] = rand(5, 7);
			$slots[] = rand(9, 11);
			$slots[] = rand(13, 15);
			$slots[] = rand(17, 19);			
		}
		*/
		$slots[] = rand(21, 24);
		$slots[] = rand(25, 28);
		shuffle($slots);		
		
		$dpw = rand(2, 4);
		$ssl = array();
		for($i = 0; $i < $dpw; $i++)
		{
			$ssl[] = $slots[$i];
		}
		sort($ssl);
		
		foreach($ssl as $value)
		{
			$trail = $value;
			if($value % 4 == 0)
				$trail = ($value - 3).'-'.($value - 2).'-'.($value - 1);
				
			if($tt_slots == "")
				$tt_slots = strval($trail);
			else
				$tt_slots .= "-".strval($trail);
		}
		
		
		$student_gender = rand(1, 2);
				
		$tutor_gender = 0;
		if($student_gender == 1)
			$tutor_gender = rand(0, 1);
		else if($student_gender == 2)
		{
			$tg = rand(0, 1);
			
			if($tg == 0)
				$tutor_gender = 0;
			else
				$tutor_gender = 2;
		}
		
		$mq = 0;
		if($service == 1)
		{
			$mq = rand(1, 2);
		}
		else if($service == 3)
		{
			$mq = rand(2, 7);
		}
		else
		{
			$mq = rand(5, 7);
		}
		
		$service_detail = "";
		$service_data = array();
		if($connector->GetOneRow($service_data, "WHERE id = $service", "services"))
		{
			$sl = "";
			if($student_age == 7)
				$sl = "小一";
			else if($student_age == 8)
				$sl = "小二";
			else if($student_age == 9)
				$sl = "小三";
			else if($student_age == 10)
				$sl = "小四";
			else if($student_age == 11)
				$sl = "小五";
			else if($student_age == 12)
				$sl = "小六";
			else if($student_age == 13)
				$sl = "中一";
			else if($student_age == 14)
				$sl = "中二";
			else if($student_age == 15)
				$sl = "中三";
			else if($student_age == 16)
				$sl = "中四";
			else if($student_age == 17)
				$sl = "中五";
			
			//$service_detail = $service_data['name']."（".$sl."）";	
			$service_detail = "（".$sl."）";	
		}
		
		$lesson_count = rand(1, 3);
		
		$lesson_length = "N/A";
		$ll = rand(0, 2);
		if($ll == 0)
			$lesson_length = "1小時";
		else if($ll == 1)
			$lesson_length = "1.5小時";
		else if($ll == 2)
			$lesson_length = "2小時";
		
		$hour_rate = "N/A";
		if($student_age <= 9)
		{
			$hr = array('60', '70', '80');
			$hour_rate = $hr[rand(0, 2)];
		}
		else if($student_age <= 12)
		{
			$hr = array('80', '90', '100', '110');
			$hour_rate = $hr[rand(0, 3)];
		}
		else if($student_age <= 15)
		{
			$hr = array('100', '110', '120', '130');
			$hour_rate = $hr[rand(0, 3)];
		}
		else if($student_age <= 17)
		{
			$hr = array('130', '140', '150', '160');
			$hour_rate = $hr[rand(0, 3)];
		}
		
		$client = array();
		$client['is_generated'] = 1;
		$client['sub_region'] = $sub_region;
		$client['estate'] = $estate;
		$client['tt_slots'] = $tt_slots;
		$client['student_gender'] = $student_gender;
		$client['tutor_gender'] = $tutor_gender;
		$client['student_age'] = $student_age;
		$client['service'] = $service;
		$client['mq'] = $mq;
		$client['service_detail'] = $service_detail;
		$client['lesson_count'] = $lesson_count;
		$client['lesson_length'] = $lesson_length;
		$client['hour_rate'] = $hour_rate;
		$client['contact_name'] = 'N/A';
		$client['contact_no'] = 'N/A';
		
		$ct = time() - rand(0, 1800);
		$client['creation_date'] = date("Y-m-d H:i:s", $ct);
		
		$connector->Insert($client, "clients");
	}	
?>
</body>
</html>
