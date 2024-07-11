<?php

include_once dirname(__FILE__).'/TCommon.php';

class TTutor
{
	function TTutor()
	{
	}
	
	function GetTutorDetailPublic(&$connector, $id, &$data)
	{
		if($connector && is_numeric($id))
		{			
			$tutors = array();
			$tutors['tutors.si_title'] = '';
			$tutors['tutors.si_detail'] = '';
			$tutors['tutors.si_photo'] = '';
			$tutors['tutors.si_movie_embed'] = '';
			$tutors['tutors.pi_nickname'] = '';
			$tutors['tutors.pi_gender'] = 0;
			$tutors['tutors.lt_additional'] = '';
			$tutors['tutors.tf_detail'] = '';
			$tutors['tutors.aq_college_others'] = '';
			$tutors['tutors.aq_professional'] = '';
			$tutors['tutors.aq_hkcee_mark'] = '';
			$tutors['tutors.aq_tutor_year'] = '';
			$tutors['tutors.pe_result_detail'] = '';
			$tutors['tutors.aq_major'] = '';
			$tutors['tutors.tr_region_sets'] = '';
			$tutors['tutors.tr_regions_nt'] = '';
			$tutors['tutors.tr_regions_kn'] = '';
			$tutors['tutors.tr_regions_hki'] = '';
			$tutors['tutors.service_targets'] = '';
			$tutors['tutors.languages'] = '';
			$tutors['tutors.instruments'] = '';
			$tutors['tutors.tt_slots'] = '';
			$tutors['tutors.tt_days'] = '';			
			$tutors['hs_major.name'] = '';
			$tutors['colleges.name'] = '';
			$tutors['education_levels.name'] = '';			
			
			
			if($connector->JoinGetRows($tutors, "WHERE tutors.aq_hs_major = hs_major.id AND tutors.aq_college = colleges.id AND tutors.aq_el = education_levels.id AND tutors.id = $id AND tutors.is_reviewed = 1 AND tutors.is_verified = 1", "tutors, hs_major, colleges, education_levels") > 0)
			{
				$tutor = $tutors[0];
				
				$data = array();
				$data['si_title'] = $tutor['tutors.si_title'];
				$data['si_detail'] = nl2br($tutor['tutors.si_detail']);
				$data['si_photo'] = $tutor['tutors.si_photo'];
				$data['si_movie_embed_raw'] = $tutor['tutors.si_movie_embed'];
				$data['si_movie_embed'] = htmlentities($tutor['tutors.si_movie_embed']);
				$data['pi_nickname'] = $tutor['tutors.pi_nickname'];
				$data['pi_gender'] = $tutor['tutors.pi_gender'];
				$data['lt_additional'] = nl2br($tutor['tutors.lt_additional']);
				$data['tf_detail'] = nl2br($tutor['tutors.tf_detail']);
				$data['aq_college_others'] = nl2br($tutor['tutors.aq_college_others']);
				$data['aq_professional'] = nl2br($tutor['tutors.aq_professional']);
				$data['aq_hkcee_mark'] = $tutor['tutors.aq_hkcee_mark'];
				$data['aq_tutor_year'] = $tutor['tutors.aq_tutor_year'];
				$data['pe_result_detail'] = nl2br($tutor['tutors.pe_result_detail']);
				$data['aq_major'] = $tutor['tutors.aq_major'];
				
				$data['hs_major'] = $tutor['hs_major.name'];
				$data['aq_college'] = $tutor['colleges.name'];
				$data['education_level'] = $tutor['education_levels.name'];
				
				
				$timeslots = array();
				$common = new TCommon();
				$is_all_time = 0;					
				if($tutor['tutors.tt_slots'] != '')
				{
					$is_all_time = $common->TranslateTimeSlots($tutor['tutors.tt_slots'], $timeslots);
				}
				else if($tutor['tutors.tt_days'] != '')
				{
					$is_all_time = $common->TranslateDaySlots($tutor['tutors.tt_days'], $timeslots);
				}
				
				$data['is_all_time'] = $is_all_time;
				$data['timeslots'] = $timeslots;
				
				
				$data['service_targets'] = array();
				$service_targets = explode('-', $tutor['tutors.service_targets']);
				foreach($service_targets as $service_target)
				{
					$info = array();
					if($connector->GetOneRow($info, "WHERE id = $service_target", "service_targets"))
						$data['service_targets'][] = $info['name'];
				}				
				
				$data['tr_region_sets'] = explode('-', $tutor['tutors.tr_region_sets']);
				
				$data['tr_regions_nt'] = array();
				$tr_regions_nt = explode('-', $tutor['tutors.tr_regions_nt']);
				foreach($tr_regions_nt as $region_id)
				{
					$info = array();
					if($connector->GetOneRow($info, "WHERE id = $region_id", "sub_regions"))
						$data['tr_regions_nt'][] = $info['name'];
				}				

				$data['tr_regions_kn'] = array();
				$tr_regions_kn = explode('-', $tutor['tutors.tr_regions_kn']);
				foreach($tr_regions_kn as $region_id)
				{
					$info = array();
					if($connector->GetOneRow($info, "WHERE id = $region_id", "sub_regions"))
						$data['tr_regions_kn'][] = $info['name'];
				}				
				
				$data['tr_regions_hki'] = array();
				$tr_regions_hki = explode('-', $tutor['tutors.tr_regions_hki']);
				foreach($tr_regions_hki as $region_id)
				{
					$info = array();
					if($connector->GetOneRow($info, "WHERE id = $region_id", "sub_regions"))
						$data['tr_regions_hki'][] = $info['name'];
				}

				$data['languages'] = array();
				$languages = explode('-', $tutor['tutors.languages']);
				foreach($languages as $language)
				{
					$info = array();
					if($connector->GetOneRow($info, "WHERE id = $language", "languages"))
						$data['languages'][] = $info['name'];
				}
				
				$data['instruments'] = array();
				$instruments = explode('-', $tutor['tutors.instruments']);
				foreach($instruments as $instrument)
				{
					$info = array();
					if($connector->GetOneRow($info, "WHERE id = $instrument", "instruments"))
						$data['instruments'][] = $info['name'];
				}				
			}
		}
	}
	
	function MoveUploadedTutorPhoto($file_post)
	{
		if (is_uploaded_file($file_post['tmp_name']) && $file_post['size'] < 4194304) 
		{
			$info = pathinfo($file_post['name']);
			
			$extension = strtolower($info['extension']);
			$type = -1;
			if($extension == 'jpg' || $extension == 'jpeg')
				$type = 0;
			else if($extension == 'gif')
				$type = 1;
			else if($extension == 'png')
				$type = 2;
			else if($extension == 'bmp')
				$type = 3;
			
			if($type > -1)
			{
				$name = uniqid().".".$info['extension'];
				
				$common = new TCommon();
				if($common->MakeIcon($file_post['tmp_name'], "./tutor_photos/s_".$name, 100, 100, $type))
				{
					if($common->MakeIcon($file_post['tmp_name'], "./tutor_photos/".$name, 400, 300, $type))
					{
						unlink($file_post['tmp_name']);
						return $name;
					}
				}
			}			
		}
		
		return NULL;		
	}
	
	function GetInstrumentsFromPost($data_post, &$tutor, &$connector)
	{
		if($data_post && is_array($data_post) && $tutor && is_array($tutor) && $connector)
		{
			$tutor['instruments'] = "";
			$instruments = array();
			if($connector->GetRows($instruments, "WHERE id > 0", "instruments") > 0)
			{
				foreach($instruments as $instrument)
				{
					if(isset($data_post['cb_instrument_'.$instrument['id']]))
					{
						if($tutor['instruments'] == "")
							$tutor['instruments'] = $instrument['id'];
						else
							$tutor['instruments'] .= "-".$instrument['id'];
					}
				}
			}			
		}
	}
	
	function GetLanguagesFromPost($data_post, &$tutor, &$connector)
	{
		if($data_post && is_array($data_post) && $tutor && is_array($tutor) && $connector)
		{
			$tutor['languages'] = "";
			$languages = array();
			if($connector->GetRows($languages, "WHERE id > 0", "languages") > 0)
			{
				foreach($languages as $language)
				{
					if(isset($data_post['cb_language_'.$language['id']]))
					{
						if($tutor['languages'] == "")
							$tutor['languages'] = $language['id'];
						else
							$tutor['languages'] .= "-".$language['id'];
					}
				}
			}			
		}
	}
	
	function GetTimeSlotsFromPost($data_post, &$tutor)
	{
		if($data_post && is_array($data_post) && $tutor && is_array($tutor))
		{
			$tutor['tt_slots'] = "";
			$tutor['tt_days'] = "";
			if(isset($data_post['cb_time_all']))
				$tutor['tt_days'] = "4-8-12-16-20-24-28";
			else
			{
				$c = 0;
				for($i = 0; $i < 7; $i++)
				{
					$bFullDay = 1;
					for($j = 0; $j < 3; $j++)
					{
						$c++;
						
						if(isset($data_post['cb_time_slot_'.$c]))
						{
							if($tutor['tt_slots'] == "")
								$tutor['tt_slots'] = strval($data_post['cb_time_slot_'.$c]);
							else
								$tutor['tt_slots'] .= "-".strval($data_post['cb_time_slot_'.$c]);
						}
						else
							$bFullDay = 0;
					}						
					$c++;
					
					if($bFullDay == 1)
					{
						if($tutor['tt_days'] == "")
							$tutor['tt_days'] = strval($c);
						else
							$tutor['tt_days'] .= "-".strval($c);
					}
					else
					{
						if($tutor['tt_days'] == "")
							$tutor['tt_days'] = "0";
						else
							$tutor['tt_days'] .= "-0";
					}						
				}
			}			
		}
	}
	
	function GetSubRegionsFromPost($data_post, &$tutor, &$connector)
	{
		if($data_post && is_array($data_post) && $tutor && is_array($tutor) && $connector)
		{
			$cb_region_all = 0;
			if(isset($data_post['cb_region_all']))
				$cb_region_all = 1;
				
			$cb_region_nt = 0;
			if(isset($data_post['cb_region_nt']))
				$cb_region_nt = 1;
			
			$cb_region_kn = 0;
			if(isset($data_post['cb_region_kn']))
				$cb_region_kn = 1;

			$cb_region_hki = 0;
			if(isset($data_post['cb_region_hki']))
				$cb_region_hki = 1;

			$cb_region_others = 0;
			if(isset($data_post['cb_region_others']))
				$cb_region_others = 1;				
			
			$tutor['tr_region_sets'] = $cb_region_all."-".$cb_region_nt."-".$cb_region_kn."-".$cb_region_hki."-".$cb_region_others;				
			$tutor['tr_regions_nt'] = "";
			$tutor['tr_regions_kn'] = "";
			$tutor['tr_regions_hki'] = "";
			
			if($cb_region_all == 0 && $cb_region_nt == 0)
			{
				$regions_nt = array();
				if($connector->GetRows($regions_nt, "WHERE i_region = 1", "sub_regions") > 0)
				{
					$tr_regions_nt = "";
					foreach($regions_nt as $value)
					{
						if(isset($data_post['cb_region_nt_'.$value['id']]))
						{
							if($tutor['tr_regions_nt'] == "")
								$tutor['tr_regions_nt'] = $value['id'];
							else
								$tutor['tr_regions_nt'] .= "-".$value['id'];
						}						
					}
				}
			}
			if($cb_region_all == 0 && $cb_region_kn == 0)
			{
				$regions_kn = array();
				if($connector->GetRows($regions_kn, "WHERE i_region = 2", "sub_regions") > 0)
				{
					$tr_regions_kn = "";
					foreach($regions_kn as $value)
					{
						if(isset($data_post['cb_region_kn_'.$value['id']]))
						{
							if($tutor['tr_regions_kn'] == "")
								$tutor['tr_regions_kn'] = $value['id'];
							else
								$tutor['tr_regions_kn'] .= "-".$value['id'];
						}						
					}
				}
			}
			if($cb_region_all == 0 && $cb_region_hki == 0)
			{
				$regions_hki = array();
				if($connector->GetRows($regions_hki, "WHERE i_region = 3", "sub_regions") > 0)
				{
					$tr_regions_hki = "";
					foreach($regions_hki as $value)
					{
						if(isset($data_post['cb_region_hki_'.$value['id']]))
						{
							if($tutor['tr_regions_hki'] == "")
								$tutor['tr_regions_hki'] = $value['id'];
							else
								$tutor['tr_regions_hki'] .= "-".$value['id'];
						}						
					}
				}
			}			
		}
	}
	
	function GetTutorInfoFromPost($data_post, &$tutor)
	{
		if($data_post && is_array($data_post) && $tutor && is_array($tutor))
		{
			$tutor['si_title'] = "";
			if(isset($data_post['si_title']))
				$tutor['si_title'] = $data_post['si_title'];
		
			$tutor['si_detail'] = "";
			if(isset($data_post['si_detail']))
				$tutor['si_detail'] = $data_post['si_detail'];
	
			$tutor['si_movie_embed'] = "";
			if(isset($data_post['si_movie_embed']))
				$tutor['si_movie_embed'] = $data_post['si_movie_embed'];
	
			$tutor['pi_nickname'] = "";
			if(isset($data_post['pi_nickname']))
				$tutor['pi_nickname'] = $data_post['pi_nickname'];
	
			$tutor['pi_english_name'] = "";
			if(isset($data_post['pi_english_name']))
				$tutor['pi_english_name'] = $data_post['pi_english_name'];
	
			$tutor['pi_chinese_name'] = "";
			if(isset($data_post['pi_chinese_name']))
				$tutor['pi_chinese_name'] = $data_post['pi_chinese_name'];
	
			$tutor['pi_hkid'] = "";
			if(isset($data_post['pi_hkid']))
				$tutor['pi_hkid'] = $data_post['pi_hkid'];
	
			$tutor['pi_live_region'] = 0;
			if(isset($data_post['pi_live_region']))
				$tutor['pi_live_region'] = intval($data_post['pi_live_region']);
	
			$tutor['pi_gender'] = 0;
			if(isset($data_post['pi_gender']))
				$tutor['pi_gender'] = intval($data_post['pi_gender']);
	
			$tutor['pi_contact_no'] = "";
			if(isset($data_post['pi_contact_no']))
				$tutor['pi_contact_no'] = $data_post['pi_contact_no'];
	
			$tutor['ec_name'] = "";
			if(isset($data_post['ec_name']))
				$tutor['ec_name'] = $data_post['ec_name'];
	
			$tutor['en_contact_no'] = "";
			if(isset($data_post['en_contact_no']))
				$tutor['en_contact_no'] = $data_post['en_contact_no'];
	
			$tutor['tf_detail'] = "";
			if(isset($data_post['tf_detail']))
				$tutor['tf_detail'] = $data_post['tf_detail'];
	
			$tutor['aq_el'] = 0;
			if(isset($data_post['aq_el']))
				$tutor['aq_el'] = intval($data_post['aq_el']);
	
			$tutor['aq_college'] = 0;
			if(isset($data_post['aq_college']))
				$tutor['aq_college'] = intval($data_post['aq_college']);
	
			$tutor['aq_college_others'] = "";
			if(isset($data_post['aq_college_others']))
				$tutor['aq_college_others'] = $data_post['aq_college_others'];
	
			$tutor['aq_major'] = "";
			if(isset($data_post['aq_major']))
				$tutor['aq_major'] = $data_post['aq_major'];
	
			$tutor['aq_hs_major'] = 0;
			if(isset($data_post['aq_hs_major']))
				$tutor['aq_hs_major'] = intval($data_post['aq_hs_major']);
	
			$tutor['aq_professional'] = "";
			if(isset($data_post['aq_professional']))
				$tutor['aq_professional'] = $data_post['aq_professional'];
	
			$tutor['aq_hkcee_mark'] = "";
			if(isset($data_post['aq_hkcee_mark']))
				$tutor['aq_hkcee_mark'] = $data_post['aq_hkcee_mark'];
	
			$tutor['aq_tutor_year'] = "";
			if(isset($data_post['aq_tutor_year']))
				$tutor['aq_tutor_year'] = $data_post['aq_tutor_year'];
	
			$tutor['pe_result_detail'] = "";
			if(isset($data_post['pe_result_detail']))
				$tutor['pe_result_detail'] = $data_post['pe_result_detail'];
		
			$tutor['lt_additional'] = "";
			if(isset($data_post['lt_additional']))
				$tutor['lt_additional'] = $data_post['lt_additional'];
		
			$tutor['know_way'] = 0;
			if(isset($data_post['know_way']))
				$tutor['know_way'] = $data_post['know_way'];
				
			$tutor['service_targets'] = '';
			for($index = 1; $index <= 5; $index++)
			{
				if(isset($data_post['st_'.$index]))
				{
					if($tutor['service_targets'] == '')
						$tutor['service_targets'] = $data_post['st_'.$index];
					else
						$tutor['service_targets'] .= "-".$data_post['st_'.$index];
				}
			}
		}	
	}
}

?>