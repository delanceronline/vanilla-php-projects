<?php

class TCommon
{
	function TCommon()
	{		
	}
	
	function MakeIcon($src, $dst, $dstx, $dsty, $type)
	{
	
	//$src = original image location
	//$dst = destination image location
	//$dstx = user defined width of image
	//$dsty = user defined height of image
	
	// $type 0 = jpg / jpeg
	// $type 1 = gif
	// $type 2 = png
	// $type 3 = wbmp
		
		if($type >= 0 && $type < 4)
		{
			$size = getImageSize($src);
			$width = $size[0];
			$height = $size[1];
			
			if($width == 0 || $height == 0)
				return false;
			
			$from = 0;
			if($type == 0)
				$from = imagecreatefromjpeg($src);
			elseif ($type == 1)
				$from = imagecreatefromgif($src);
			elseif ($type == 2)
				$from = imagecreatefrompng($src);
			elseif ($type == 3)
				$from = imagecreatefromwbmp($src);
			
			if(!$from)
				return false;
					
			if($width >= $dstx && $height >= $dsty)
			{
				$proportion_X = $width / $dstx;
				$proportion_Y = $height / $dsty;
				
				if($proportion_X > $proportion_Y)
					$proportion = $proportion_Y;
				else
					$proportion = $proportion_X ;
				
				$target['width'] = $dstx * $proportion;
				$target['height'] = $dsty * $proportion;
				
				$original['diagonal_center'] = round(sqrt(($width*$width)+($height*$height))/2);
				$target['diagonal_center'] = round(sqrt(($target['width']*$target['width']) + ($target['height']*$target['height']))/2);
				
				$crop = round($original['diagonal_center'] - $target['diagonal_center']);
				
				if($proportion_X < $proportion_Y )
				{
					$target['x'] = 0;
					$target['y'] = round((($height/2)*$crop)/$target['diagonal_center']);
				}
				else
				{
					$target['x'] = round((($width/2)*$crop)/$target['diagonal_center']);
					$target['y'] = 0;
				}
							
				$new = imagecreatetruecolor($dstx, $dsty);
				
				if(!imagecopyresampled($new, $from, 0, 0, $target['x'], $target['y'], $dstx, $dsty, $target['width'], $target['height']))
					return false;
			}
			else
			{						
				$new = imagecreatetruecolor($dstx, $dsty);
				$white = imagecolorallocate($new, 255, 250, 221);
				imagefill($new, 0, 0, $white);
				
				if($width < $dstx && $height < $dsty)
				{
					if(!imagecopymerge($new, $from, round(($dstx - $width) * 0.5), round(($dsty - $height) * 0.5), 0, 0, $width, $height, 100))
						return false;				
				}
				else if($width >= $dstx)
				{				
					$scaledY = round($height * $dstx / $width);
					if(!imagecopyresampled($new, $from, 0, round(($dsty - $scaledY) * 0.5), 0, 0, $dstx, $scaledY, $width, $height))
						return false;
				}
				else if($height >= $dsty)
				{
					$scaledX = round($width * $dsty / $height);
					if(!imagecopyresampled($new, $from, round(($dstx - $scaledX) * 0.5), 0, 0, 0, $scaledX, $dsty, $width, $height))
						return false;					
				}
			}
			
			if(!imagepng($new, $dst))
				return false;		
		}
		else
			return false;
		
		return true;
	}	
	
	function GetFeaturedTutors(&$connector, &$tutors, $count)
	{
		$tutors = array();
		
		if($connector)
		{
			$sql = "SELECT id, si_title, si_detail, si_photo, pi_gender FROM tutors WHERE is_verified = 1 AND is_featured = 1 AND is_reviewed = 1 ORDER BY modified_date DESC LIMIT 0, $count";
			$result = $connector->Execute($sql);
			while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
			{
				if(mb_strlen($row['si_title']) > 40)
					$row['si_title'] = mb_substr($row['si_title'], 0, 20, 'utf-8')."......";
								
				$row['si_detail'] = $row['si_detail'];
				if(mb_strlen($row['si_detail']) > 200)
					$row['si_detail'] = mb_substr($row['si_detail'], 0, 100, 'utf-8')."......";
				
				$tutors[] = $row;
			}
		}
		
		return count($tutors);
	}
	
	function SendPasscodeResetEmail($tutor_email, $passcode)
	{
		if($tutor_email != '' && $passcode != '')
		{
			$to  = $tutor_email;
			$subject = 'Passcode Reset from GOODTUTOR!';

			$message = '<html><head><title>新的登入密碼</title></head><body>
			<p>您好，歡迎登入GOODTUTOR！</p><p>我們已經重設了您的登入密碼，以下是新的登入密碼：</p><p><b>'.$passcode.'</b></p><p>請小心保存及保密這個電郵！</p><p>登入網址：http://www.goodtutorhk.com/web/tutor_login.php</p><br /><br /><p>謝謝</p><p>GOODTUTOR</p>
			</body></html>';

			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
			$headers .= "To: Good Tutor <$to>" . "\r\n";
			$headers .= 'From: GOODTUTOR <info@goodtutorhk.com>' . "\r\n";
			mail($to, $subject, $message, $headers);			
		}
	}
	
	function SendTutorActivationEmail($tutor_email, $passcode)
	{
		if($tutor_email != '' && $passcode != '')
		{
			$to  = $tutor_email;
			$subject = 'Account Activation from GOODTUTOR!';				
			
			$message = '<html><head><title>歡迎成為GOODTUTOR一份子！</title></head><body>
			<p>您好，歡迎加入GOODTUTOR！</p><p>我們已經核實了您的導師身份，以下是您的登入密碼：</p><p><b>'.$passcode.'</b></p><p>請小心保存及保密這個電郵！</p><p>登入網址：http://www.goodtutorhk.com/web/tutor_login.php</p><br /><br /><p>謝謝</p><p>GOODTUTOR</p>
			</body></html>';

			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
			$headers .= "To: Good Tutor <$to>" . "\r\n";
			$headers .= 'From: GOODTUTOR <info@goodtutorhk.com>' . "\r\n";
			mail($to, $subject, $message, $headers);
		}
	}
	
	function VerifyTutorByEmail(&$connector, $tutor_id, $tutor_email, $passcode)
	{
		if($connector && $tutor_id > 0 && $tutor_email != '' && $passcode != '')
		{
			$ti = md5($tutor_id);
			$code = md5(uniqid());
			$vt['i_tutor'] = $tutor_id;
			$vt['ti_md5'] = $ti;
			$vt['code'] = $code;
			
			$id = $connector->Insert($vt, "vt_hash");			
			if($id > 0)
			{
				$to  = $tutor_email;
				$subject = 'Welcome to GOODTUTOR!';				
				
				$message = '<html><head><title>歡迎您登記成為GOODTUTOR一份子！</title></head><body>
				<p>您好，歡迎您登記成為GOODTUTOR一份子！請按以下連結核實您的導師登入電郵：</p><p>&nbsp;</p><p>http://www.goodtutorhk.com/web/vt.php?ti='.$ti.'&amp;code='.$code.'</p><p>&nbsp;</p><p>您的登入密碼：<b>'.$passcode.'</b></p><p>電郵及導師資料一經核實後，我們會盡力為您介紹合適的學生！</p><br /><br /><p>謝謝</p><p>GOODTUTOR</p>
				</body></html>';
	
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
				$headers .= "To: Good Tutor <$to>" . "\r\n";
				$headers .= 'From: GOODTUTOR <info@goodtutorhk.com>' . "\r\n";
	
				if(mail($to, $subject, $message, $headers))
				{
					$info['is_sent'] = 1;
					$connector->Update($info, "WHERE id = $id", "vt_hash");
				}
			}			
		}
	}
	
	function SendEmailTo($to, $subject, $message)
	{
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		$headers .= "To: Good Tutor <$to>" . "\r\n";
		$headers .= 'From: GOODTUTOR <info@goodtutorhk.com>' . "\r\n";
		
		if($to != '' && $subject != '' && $message != '')
			mail($to, $subject, $message, $headers);
	}
	
	function GetSubRegions(&$connector, $region_index, &$names, &$ids)
	{
		if($connector)
		{
			$names = array();
			$ids = array();
			$regions = array();
			if($connector->GetRows($regions, "WHERE i_region = $region_index", "sub_regions") > 0)
			{
				foreach($regions as $value)
				{
					$names[] = $value['name'];
					$ids[] = $value['id'];
				}
			}
		}
	}
	
	function GetRegionIndex(&$connector, $sub_region_id)
	{
		if($connector)
		{
			$sub_region = array();
			if($connector->GetOneRow($sub_region, "WHERE id = $sub_region_id", "sub_regions"))
			{
				if(isset($sub_region['i_region']))
					return $sub_region['i_region'];
			}
		}
		
		return -1;
	}

	function GetServices(&$connector, &$names, &$ids)
	{
		if($connector)
		{
			$services = array();
			$ids = array();
			$names = array();
			if($connector->GetRows($services, "WHERE id > 0 ORDER BY display_order ASC", "services") > 0)
			{
				foreach($services as $value)
				{
					$names[] = $value['name'];
					$ids[] = $value['id'];
				}	
			}
		}	
	}
	
	function GetEducationLevels(&$connector, &$names, &$ids)
	{
		if($connector)
		{
			$qfs = array();
			$ids = array();
			$names = array();
			if($connector->GetRows($qfs, "WHERE id > 0 ORDER BY display_order ASC", "education_levels") > 0)
			{
				foreach($qfs as $value)
				{
					$names[] = $value['name'];
					$ids[] = $value['id'];
				}	
			}
		}	
	}
	
	function GetHighSchoolMajor(&$connector, &$names, &$ids)
	{
		if($connector)
		{
			$hms = array();
			$ids = array();
			$names = array();
			if($connector->GetRows($hms, "WHERE id > 0 ORDER BY display_order ASC", "hs_major") > 0)
			{
				foreach($hms as $value)
				{
					$names[] = $value['name'];
					$ids[] = $value['id'];
				}	
			}				
		}
	}
	
	function GetServiceTargets($map, &$data)
	{
		$targets = explode('-', $map);
		$data = array();
		
		for($i = 1; $i <= 5; $i++)
		{
			$bFound = 0;
			foreach($targets as $target)
			{
				if($target == $i)
				{
					$bFound = 1;
					break;
				}
			}
			
			if($bFound == 1)
				$data['st_'.$i] = $i;
			else
				$data['st_'.$i] = 0;
		}
	}
	
	function GetLanguages(&$connector, &$names, &$ids)
	{
		if($connector)
		{
			$languages = array();
			$ids = array();
			$names = array();
			if($connector->GetRows($languages, "WHERE id > 0 ORDER BY display_order ASC", "languages") > 0)
			{
				foreach($languages as $value)
				{
					$names[] = $value['name'];
					$ids[] = $value['id'];
				}	
			}			
		}
	}
	
	function GetInstruments(&$connector, &$names, &$ids)
	{
		if($connector)
		{
			$instruments = array();
			$ids = array();
			$names = array();
			if($connector->GetRows($instruments, "WHERE id > 0 ORDER BY display_order ASC", "instruments") > 0)
			{
				foreach($instruments as $value)
				{
					$names[] = $value['name'];
					$ids[] = $value['id'];
				}	
			}		
		}
	}
	
	function GetColleges(&$connector, &$names, &$ids)
	{
		if($connector)
		{
			$colleges = array();
			$ids = array();
			$names = array();
			if($connector->GetRows($colleges, "WHERE id > 0 ORDER BY display_order ASC", "colleges") > 0)
			{
				foreach($colleges as $value)
				{
					$names[] = $value['name'];
					$ids[] = $value['id'];
				}	
			}			
		}
	}
	
	function GetServiceTargetsFromDatabase(&$connector, &$names, &$ids)
	{
		if($connector)
		{
			$targets = array();
			$ids = array();
			$names = array();
			if($connector->GetRows($targets, "WHERE id > 0 ORDER BY display_order ASC", "service_targets") > 0)
			{
				foreach($targets as $value)
				{
					$names[] = $value['name'];
					$ids[] = $value['id'];
				}
			}			
		}
	}
	
	function GetTeachingRegionSets($region_sets_in, $regions_nt_in, $regions_kn_in, $regions_hki_in, $nt_ids_in, $kn_ids_in, $hki_ids_in, &$region_sets, &$regions_nt_selected, &$regions_kn_selected, &$regions_hki_selected)
	{
		$region_sets = explode("-", $region_sets_in);			
		
		if($region_sets[0] == 1)
		{
			foreach($nt_ids_in as $value)
				$regions_nt_selected[] = 1;

			foreach($kn_ids_in as $value)
				$regions_kn_selected[] = 1;

			foreach($hki_ids_in as $value)
				$regions_hki_selected[] = 1;
		}
		else
		{
			if($region_sets[1] == 1)
			{
				foreach($nt_ids_in as $value)
					$regions_nt_selected[] = 1;				
			}
			else
			{
				$regions_nt = explode("-", $regions_nt_in);			
				foreach($nt_ids_in as $value)
				{
					if(array_search($value, $regions_nt) !== FALSE)
						$regions_nt_selected[] = 1;
					else
						$regions_nt_selected[] = 0;
				}				
			}
			
			if($region_sets[2] == 1)
			{
				foreach($kn_ids_in as $value)
					$regions_kn_selected[] = 1;				
			}
			else
			{
				$regions_kn = explode("-", $regions_kn_in);			
				foreach($kn_ids_in as $value)
				{
					if(array_search($value, $regions_kn) !== FALSE)
						$regions_kn_selected[] = 1;
					else
						$regions_kn_selected[] = 0;
				}				
			}
			
			if($region_sets[3] == 1)
			{
				foreach($hki_ids_in as $value)
					$regions_hki_selected[] = 1;				
			}
			else
			{
				$regions_hki = explode("-", $regions_hki_in);			
				foreach($hki_ids_in as $value)
				{
					if(array_search($value, $regions_hki) !== FALSE)
						$regions_hki_selected[] = 1;
					else
						$regions_hki_selected[] = 0;
				}				
			}
		}	
	}
	
	function GetDays($days, $slots, &$is_all, &$days_selected)
	{
		$days = explode("-", $days);
		$slots = explode("-", $slots);
		
		
		$days_selected = array();
		for($i = 1; $i <= 28; $i++)
		{
			if(array_search($i, $slots) !== FALSE)
				$days_selected[] = 1;
			else
				$days_selected[] = 0;
		}
		
		$is_all = 1;
		foreach($days as $key => $day)
		{
			if($day == 0)
				$is_all = 0;
			else
			{
				$offset = (($key + 1) * 4);
				$days_selected[$offset - 1] = 1;
				$days_selected[$offset - 2] = 1;
				$days_selected[$offset - 3] = 1;
				$days_selected[$offset - 4] = 1;
			}			
		}
	}
	
	function TranslateTimeSlots($raw_slot, &$flags)
	{
		if($raw_slot != '')
		{
			$slots = explode("-", $raw_slot);
			
			$flag = array();
			$is_all = 1;
			for($i = 0; $i < 7; $i++)
			{
				for($j = 1; $j <= 3; $j++)
				{
					if(array_search(($i * 4) + $j, $slots) !== FALSE)
						$flags[] = 1;
					else
					{
						$flags[] = 0;
						$is_all = 0;
					}
				}	
			}
			
			for($i = 1; $i <= 7; $i++)
			{
				$offset = $i * 4;
				$os = ($i - 1) * 3;
				if(array_search($offset, $slots) !== FALSE)
				{					
					$flags[$os] = 1;
					$flags[$os + 1] = 1;
					$flags[$os + 2] = 1;
				}
			}			
			
			return $is_all;
		}
	
		return 0;
	}
	
	function TranslateDaySlots($raw_slot, &$flags)
	{
		if($raw_slot != '')
		{
			$slots = explode("-", $raw_slot);
			
			$flags = array();
			$is_all = 1;
			$cc = 0;
			for($i = 1; $i <= 7; $i++)
			{
				$offset = $i * 4;
				if(array_search($offset, $slots) !== FALSE)
				{
					for($j = 0; $j < 3; $j++)
						$flags[] = 1;
				}
				else
				{
					for($j = 0; $j < 3; $j++)
						$flags[] = 0;

					$is_all = 0;
				}
			}
			
			return $is_all;
		}
		
		return 0;
	}
	
	function GetTutorsWithConditions(&$connector, $region, $sub_region, $gender, $aq, $hs_major, $college, $st, $start_index, $count, &$data)
	{
		$condition = "is_reviewed = 1 AND is_verified = 1";
		
		if($region > 0)
		{
			if($region == 1)
				$condition .= " AND (tr_region_sets LIKE '1-%' OR tr_regions_nt != '' OR tr_region_sets LIKE '0-1-%-%-%')";
			else if($region == 2)
				$condition .= " AND (tr_region_sets LIKE '1-%' OR tr_regions_kn != '' OR tr_region_sets LIKE '0-%-1-%-%')";
			else if($region == 3)
				$condition .= " AND (tr_region_sets LIKE '1-%' OR tr_regions_hki != '' OR tr_region_sets LIKE '0-%-%-1-%')";
			else if($region == 100)
				$condition .= " AND (tr_region_sets LIKE '1-%' OR tr_region_sets LIKE '0-%-%-%-1')";
		}
		
		if($sub_region > 0)
		{
			$i_region = $this->GetRegionIndex($connector, $sub_region);
			
			if($i_region == 1)
				$condition .= " AND (tr_region_sets LIKE '1-%' OR tr_region_sets LIKE '0-1-%-%-%' OR tr_regions_nt LIKE '$sub_region-%' OR tr_regions_nt LIKE '%-$sub_region-%' OR tr_regions_nt LIKE '%-$sub_region')";
			else if($i_region == 2)
				$condition .= " AND (tr_region_sets LIKE '1-%' OR tr_region_sets LIKE '0-%-1-%-%' OR tr_regions_kn LIKE '$sub_region-%' OR tr_regions_kn LIKE '%-$sub_region-%' OR tr_regions_kn LIKE '%-$sub_region')";
			else if($i_region == 3)
				$condition .= " AND (tr_region_sets LIKE '1-%' OR tr_region_sets LIKE '0-%-%-1-%' OR tr_regions_hki LIKE '$sub_region-%' OR tr_regions_hki LIKE '%-$sub_region-%' OR tr_regions_hki LIKE '%-$sub_region')";
			else if($i_region == 100)
				$condition .= " AND (tr_region_sets LIKE '1-%' OR tr_region_sets LIKE '0-%-%-%-1'";
		}
		
		if($st > 0)
		{
			$condition .= " AND (service_targets LIKE '$st-%' OR service_targets LIKE '%-$st-%' OR service_targets LIKE '%-$st')";
		}
		
		if($gender > 0)
			$condition .= " AND pi_gender = $gender";
		
		if($aq > 0)
			$condition .= " AND aq_el = $aq";
		
		if($hs_major > 0)
			$condition .= " AND aq_hs_major = $hs_major";
		
		if($college > 0)
			$condition .= " AND aq_college = $college";
		
		if($start_index >= 0 && $count > 0)
			$condition .= " LIMIT BY $start_index, $count";
		
		$data = array();
		
		return $connector->GetRows($data, "WHERE $condition", "tutors");
	}
	
	function GetClientDetail(&$connector, $ci, &$data)
	{
		if($connector && is_numeric($ci))
		{
			$clients = array();
			$clients['clients.i_estate'] = 0;
			$clients['clients.estate'] = '';
			$clients['clients.service_detail'] = '';
			$clients['clients.hour_rate'] = '';
			$clients['clients.lesson_count'] = '';
			$clients['clients.lesson_length'] = '';
			$clients['clients.creation_date'] = '';
			$clients['clients.student_age'] = '';
			$clients['clients.student_gender'] = 0;
			$clients['clients.tutor_gender'] = 0;			
			$clients['clients.tt_days'] = '';
			$clients['clients.tt_slots'] = '';
			$clients['clients.mq'] = 0;
			$clients['clients.mq_detail'] = '';
			$clients['clients.special_request'] = '';
			$clients['clients.is_drawn'] = 0;
			$clients['sub_regions.name'] = '';
			$clients['services.name'] = '';
			$clients['estates.name'] = '';	
			$clients['education_levels.name'] = '';
			
			
			if($connector->JoinGetRows($clients, "WHERE clients.id = $ci AND clients.mq = education_levels.id AND estates.id = clients.i_estate AND clients.sub_region = sub_regions.id AND services.id = clients.service AND (clients.is_generated = 1 OR clients.is_reviewed = 1)", "clients, sub_regions, services, estates, education_levels") > 0)
			{
				foreach($clients as $client)
				{
					$cf = array();
					$cf['sub_region'] = $client['sub_regions.name'];
					
					if($client['clients.i_estate'] == 0)
						$cf['estate'] = $client['clients.estate'];
					else if($client['estates.name'] != '')
						$cf['estate'] = $client['estates.name'];
					
					$cf['id'] = $ci;
					$cf['service'] = $client['services.name'];					
					$cf['service_detail'] = $client['clients.service_detail'];					
					$cf['rate'] = '$'.str_replace('$', '', $client['clients.hour_rate']);					
					
					
					$da = date_parse($client['clients.creation_date']);
					$cf['creation_date'] = $da['day']."-".$da['month']."-".$da['year'];
					
					//$cf['creation_date'] = $client['clients.creation_date'];					
					
					
					$cf['lesson_count'] = $client['clients.lesson_count'];					
					$cf['lesson_length'] = $client['clients.lesson_length'];					
					$cf['student_age'] = $client['clients.student_age'];
					
					if($client['clients.student_gender'] == 1)
						$cf['student_gender'] = "男";
					else if($client['clients.student_gender'] == 2)
						$cf['student_gender'] = "女";
					else
						$cf['student_gender'] = "";
					
					if($client['clients.tutor_gender'] == 1)
						$cf['tutor_gender'] = "男";
					else if($client['clients.tutor_gender'] == 2)
						$cf['tutor_gender'] = "女";
					else
						$cf['tutor_gender'] = "男女均可";
					
					$cf['mq'] = $client['education_levels.name'];					
					$cf['mq_detail'] = $client['clients.mq_detail'];					
					$cf['special_request'] = $client['clients.special_request'];
					
					$cf['is_drawn'] = $client['clients.is_drawn'];
					
					$timeslots = array();
					$is_all_time = 0;					
					if($client['clients.tt_slots'] != '')
						$is_all_time = $this->TranslateTimeSlots($client['clients.tt_slots'], $timeslots);
					else if($client['clients.tt_days'] != '')
						$is_all_time = $this->TranslateDaySlots($client['clients.tt_days'], $timeslots);
					
					$cf['is_all_time'] = $is_all_time;
					$cf['timeslots'] = $timeslots;
					
					//var_dump($timeslots);
					
								
					$data = $cf;
				}
				
				return 1;
			}			
		}
		
		return 0;
	}
	
	function GetClientListing(&$connector, $region, $start_index, $count, &$data)
	{
		if($connector && is_numeric($region) && is_numeric($start_index) && is_numeric($count))		
		{
			$data = array();
		
			$clients = array();
			$clients['clients.id'] = 0;			
			$clients['clients.i_estate'] = 0;
			$clients['clients.estate'] = '';
			$clients['clients.service_detail'] = '';
			$clients['clients.hour_rate'] = '';
			$clients['clients.lesson_count'] = '';
			$clients['clients.creation_date'] = '';
			$clients['clients.is_drawn'] = 0;
			$clients['sub_regions.name'] = '';
			$clients['services.name'] = '';
			$clients['estates.name'] = '';
			
			if($connector->JoinGetRows($clients, "WHERE estates.id = clients.i_estate AND clients.sub_region = sub_regions.id AND sub_regions.i_region = $region AND services.id = clients.service AND (clients.is_generated = 1 OR clients.is_reviewed = 1) ORDER BY clients.creation_date DESC LIMIT $start_index, $count", "clients, sub_regions, services, estates") > 0)
			{
				foreach($clients as $client)
				{
					$cf = array();
					$cf['id'] = $client['clients.id'];
					$cf['sub_region'] = $client['sub_regions.name'];
					
					if($client['clients.i_estate'] == 0)
						$cf['estate'] = $client['clients.estate'];
					else
						$cf['estate'] = $client['estates.name'];
					
					$cf['service'] = $client['services.name'];
					$cf['service_detail'] = $client['clients.service_detail'];
					$cf['rate'] = '$'.str_replace('$', '', $client['clients.hour_rate']);
					$cf['lesson_count'] = $client['clients.lesson_count'];
					
					$da = date_parse($client['clients.creation_date']);
					$cf['creation_date'] = $da['day']."-".$da['month']."-".$da['year'];
					//$cf['creation_date'] = $client['clients.creation_date'];
					
					$cf['is_drawn'] = $client['clients.is_drawn'];
					
					$data[] = $cf;
				}
			}			
		}
	}
}

?>