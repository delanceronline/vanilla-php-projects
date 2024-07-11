// JavaScript Document

$(document).ready(function()
{
	$('#error_si_title').dialog({ autoOpen: false });
	$('#error_si_title').dialog('option', 'modal', 'true');
	$('#error_si_title').dialog('option', 'buttons', { "確定": function() { $(this).dialog("close");$("#si_title").focus(); } });

	$('#error_si_detail').dialog({ autoOpen: false });
	$('#error_si_detail').dialog('option', 'modal', 'true');
	$('#error_si_detail').dialog('option', 'buttons', { "確定": function() { $(this).dialog("close");$("#si_detail").focus(); } });

	$('#error_cb_region').dialog({ autoOpen: false });
	$('#error_cb_region').dialog('option', 'modal', 'true');
	$('#error_cb_region').dialog('option', 'buttons', { "確定": function() { $(this).dialog("close");$("#cb_region_all").focus(); } });

	$('#error_time').dialog({ autoOpen: false });
	$('#error_time').dialog('option', 'modal', 'true');
	$('#error_time').dialog('option', 'buttons', { "確定": function() { $(this).dialog("close");$("#cb_time_all").focus(); } });

	$('#error_pi_nickname').dialog({ autoOpen: false });
	$('#error_pi_nickname').dialog('option', 'modal', 'true');
	$('#error_pi_nickname').dialog('option', 'buttons', { "確定": function() { $(this).dialog("close");$("#pi_nickname").focus(); } });

	$('#error_pi_english_name').dialog({ autoOpen: false });
	$('#error_pi_english_name').dialog('option', 'modal', 'true');
	$('#error_pi_english_name').dialog('option', 'buttons', { "確定": function() { $(this).dialog("close");$("#pi_english_name").focus(); } });

	$('#error_pi_chinese_name').dialog({ autoOpen: false });
	$('#error_pi_chinese_name').dialog('option', 'modal', 'true');
	$('#error_pi_chinese_name').dialog('option', 'buttons', { "確定": function() { $(this).dialog("close");$("#pi_chinese_name").focus(); } });

	$('#error_pi_hkid').dialog({ autoOpen: false });
	$('#error_pi_hkid').dialog('option', 'modal', 'true');
	$('#error_pi_hkid').dialog('option', 'buttons', { "確定": function() { $(this).dialog("close");$("#pi_hkid").focus(); } });

	$('#error_pi_live_region').dialog({ autoOpen: false });
	$('#error_pi_live_region').dialog('option', 'modal', 'true');
	$('#error_pi_live_region').dialog('option', 'buttons', { "確定": function() { $(this).dialog("close");$("#pi_live_region").focus(); } });

	$('#error_pi_gender').dialog({ autoOpen: false });
	$('#error_pi_gender').dialog('option', 'modal', 'true');
	$('#error_pi_gender').dialog('option', 'buttons', { "確定": function() { $(this).dialog("close");$("#pi_gender").focus(); } });

	$('#error_pi_contact_no').dialog({ autoOpen: false });
	$('#error_pi_contact_no').dialog('option', 'modal', 'true');
	$('#error_pi_contact_no').dialog('option', 'buttons', { "確定": function() { $(this).dialog("close");$("#pi_contact_no").focus(); } });

	$('#error_aq_el').dialog({ autoOpen: false });
	$('#error_aq_el').dialog('option', 'modal', 'true');
	$('#error_aq_el').dialog('option', 'buttons', { "確定": function() { $(this).dialog("close");$("#aq_el").focus(); } });

	$('#error_pe_result_detail').dialog({ autoOpen: false });
	$('#error_pe_result_detail').dialog('option', 'modal', 'true');
	$('#error_pe_result_detail').dialog('option', 'buttons', { "確定": function() { $(this).dialog("close");$("#pe_result_detail").focus(); } });

	$('#error_email').dialog({ autoOpen: false });
	$('#error_email').dialog('option', 'modal', 'true');
	$('#error_email').dialog('option', 'buttons', { "確定": function() { $(this).dialog("close");$("#email").focus(); } });

	$('#error_vc').dialog({ autoOpen: false });
	$('#error_vc').dialog('option', 'modal', 'true');
	$('#error_vc').dialog('option', 'buttons', { "確定": function() { $(this).dialog("close");$("#recaptcha_response_field").focus(); } });

	$('#error_st').dialog({ autoOpen: false });
	$('#error_st').dialog('option', 'modal', 'true');
	$('#error_st').dialog('option', 'buttons', { "確定": function() { $(this).dialog("close");$("#st_1").focus(); } });

	/////////////////////////////////////////////////////////////////////////////
	// time slot check boxes
	$("#cb_time_all").change(function(){	
		if($("#cb_time_all").attr('checked') == true)
			SetCheckbox("cb_time_slot_", true);
		else
			SetCheckbox("cb_time_slot_", false);
	});

	$("input[name*=cb_time_slot_]").change(function(event){
		if($("input[name*=cb_time_slot_]:not(:checked)").length == 0)
		{
			$("#cb_time_all").attr('checked', true);
		}
		else
		{
			$("#cb_time_all").attr('checked', false);
		}
	});

	/////////////////////////////////////////////////////////////////////////////
	// region check boxes	
	$("#cb_region_all").change(function(){
	
		if($("#cb_region_all").attr('checked') == true)
		{
			SetCheckbox("cb_region_nt", true);
			SetCheckbox("cb_region_kn", true);
			SetCheckbox("cb_region_hki", true);
		}
		else
		{
			SetCheckbox("cb_region_nt", false);
			SetCheckbox("cb_region_kn", false);
			SetCheckbox("cb_region_hki", false);			
		}
	});
	
	$("#cb_region_nt").change(function()
	{
		if($("#cb_region_nt").attr('checked') == true)
		{
			if($("#cb_region_kn").attr('checked') == true && $("#cb_region_hki").attr('checked') == true)
				$("#cb_region_all").attr('checked', true);
			
			SetCheckbox("cb_region_nt_", true);
		}
		else
		{
			SetCheckbox("cb_region_nt_", false);
			$("#cb_region_all").attr('checked', false);
		}
	});
	
	$("#cb_region_kn").change(function()
	{
		if($("#cb_region_kn").attr('checked') == true)
		{
			if($("#cb_region_nt").attr('checked') == true && $("#cb_region_hki").attr('checked') == true)
				$("#cb_region_all").attr('checked', true);
		
			SetCheckbox("cb_region_kn_", true);
		}
		else
		{
			SetCheckbox("cb_region_kn_", false);
			$("#cb_region_all").attr('checked', false);
		}
	});
	
	$("#cb_region_hki").change(function()
	{
		if($("#cb_region_hki").attr('checked') == true)
		{
			if($("#cb_region_kn").attr('checked') == true && $("#cb_region_nt").attr('checked') == true)
				$("#cb_region_all").attr('checked', true);
		
			SetCheckbox("cb_region_hki_", true);
		}
		else
		{
			SetCheckbox("cb_region_hki_", false);
			$("#cb_region_all").attr('checked', false);
		}
	});


	$("input[name*=cb_region_nt_]").change(function(event)
	{	
		if($("input[name*=cb_region_nt_]:not(:checked)").length == 0)
		{
			$("#cb_region_nt").attr('checked', true);
			if($("#cb_region_kn").attr('checked') == true && $("#cb_region_hki").attr('checked') == true)
				$("#cb_region_all").attr('checked', true);			
		}
		else
		{
			$("#cb_region_nt").attr('checked', false);
			$("#cb_region_all").attr('checked', false);
		}
	});
	
	$("input[name*=cb_region_kn_]").change(function(event)
	{	
		if($("input[name*=cb_region_kn_]:not(:checked)").length == 0)
		{
			$("#cb_region_kn").attr('checked', true);
			if($("#cb_region_nt").attr('checked') == true && $("#cb_region_hki").attr('checked') == true)
				$("#cb_region_all").attr('checked', true);			
		}
		else
		{
			$("#cb_region_kn").attr('checked', false);
			$("#cb_region_all").attr('checked', false);
		}
	});

	$("input[name*=cb_region_hki_]").change(function(event)
	{	
		if($("input[name*=cb_region_hki_]:not(:checked)").length == 0)
		{
			$("#cb_region_hki").attr('checked', true);
			if($("#cb_region_kn").attr('checked') == true && $("#cb_region_nt").attr('checked') == true)
				$("#cb_region_all").attr('checked', true);			
		}
		else
		{
			$("#cb_region_hki").attr('checked', false);
			$("#cb_region_all").attr('checked', false);
		}
	});
	
	
	
	/////////////////////////////////////////////////////////////////////////////
	// form submission		
	$("#submit_button").click(function(){HandleFormSubmit();});	
});

function SetCheckbox(prefix, bSet)
{
	$("input[name*='" + prefix + "']").attr('checked', bSet);
}

function HandleFormSubmit()
{
	if($("#si_title").val() == '')
	{
		$('#error_si_title').dialog('open');
		return;
	}
	
	if($("#si_detail").val() == '' || $("#si_detail").val().length < 20)
	{		
		$('#error_si_detail').dialog('open');
		return;
	}

	if($("#pi_nickname").val() == '')
	{		
		$('#error_pi_nickname').dialog('open');		
		return;
	}

	if($("#pi_live_region").val() < 0)
	{
		$('#error_pi_live_region').dialog('open');
		return;	
	}

	if($("#pi_english_name").val() == '')
	{		
		$('#error_pi_english_name').dialog('open');		
		return;
	}

	if($("#pi_chinese_name").val() == '')
	{		
		$('#error_pi_chinese_name').dialog('open');		
		return;
	}

	/*
	if($("#pi_hkid").val() == '')
	{		
		$('#error_pi_hkid').dialog('open');		
		return;
	}
	*/
	
	if($("#pi_gender").val() < 0)
	{
		$('#error_pi_gender').dialog('open');
		return;	
	}

	if($("#pi_contact_no").val() == '')
	{
		$('#error_pi_contact_no').dialog('open');
		return;	
	}

	// teaching regions
	if($('#cb_region_all').is(':checked') == false)
	{
		if($('#cb_region_nt').is(':checked') == false && $('#cb_region_kn').is(':checked') == false && $('#cb_region_hki').is(':checked') == false && $('#cb_region_others').is(':checked') == false)
		{
			if($('input[name*=cb_region_nt_]:checked').length == 0 && $('input[name*=cb_region_kn_]:checked').length == 0 && $('input[name*=cb_region_hki_]:checked').length == 0)
			{
				$('#error_cb_region').dialog('open');
				return;	
			}
		}
	}

	// check time slots
	if($('#cb_time_all').is(':checked') == false)
	{
		if($("input[name*=cb_time_]:checked").length == 0)
		{
			$('#error_time').dialog('open');
			return;			
		}
	}
	
	// check service targets
	if($('input[name*=st_]:checked').length == 0)
	{
		$('#error_st').dialog('open');
		return;
	}
	
	if($("#aq_el").val() < 0)
	{		
		$('#error_aq_el').dialog('open');
		return;	
	}

	if($("#pe_result_detail").val() == '')
	{
		$('#error_pe_result_detail').dialog('open');
		return;	
	}

	$("#tutor_profile_edit_form").submit();
}