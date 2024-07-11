// JavaScript Document

$(document).ready(function()
{
	$('#error_contact_name').dialog({ autoOpen: false });
	$('#error_contact_name').dialog('option', 'modal', 'true');
	$('#error_contact_name').dialog('option', 'buttons', { "確定": function() { $(this).dialog("close");$("#contact_name").focus(); } });

	$('#error_contact_no').dialog({ autoOpen: false });
	$('#error_contact_no').dialog('option', 'modal', 'true');
	$('#error_contact_no').dialog('option', 'buttons', { "確定": function() { $(this).dialog("close");$("#contact_no").focus(); } });
	
	$('#error_region').dialog({ autoOpen: false });
	$('#error_region').dialog('option', 'modal', 'true');
	$('#error_region').dialog('option', 'buttons', { "確定": function() { $(this).dialog("close");$("#sub_region").focus(); } });

	$('#error_service').dialog({ autoOpen: false });
	$('#error_service').dialog('option', 'modal', 'true');
	$('#error_service').dialog('option', 'buttons', { "確定": function() { $(this).dialog("close");$("#service").focus(); } });

	$('#error_time').dialog({ autoOpen: false });
	$('#error_time').dialog('option', 'modal', 'true');
	$('#error_time').dialog('option', 'buttons', { "確定": function() { $(this).dialog("close");$("#cb_time_all").focus(); } });		

	$('#error_hour_rate').dialog({ autoOpen: false });
	$('#error_hour_rate').dialog('option', 'modal', 'true');
	$('#error_hour_rate').dialog('option', 'buttons', { "確定": function() { $(this).dialog("close");$("#hour_rate").focus(); } });

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
	// form submission		
	$("#submit_button").click(function(){HandleFormSubmit();});		
});

function SetCheckbox(prefix, bSet)
{
	$("input[name*='" + prefix + "']").attr('checked', bSet);
}

function HandleFormSubmit()
{
	if($("#contact_name").val() == '')
	{
		$('#error_contact_name').dialog('open');
		return;
	}
	
	if($("#contact_no").val() == '')
	{
		$('#error_contact_no').dialog('open');
		return;
	}
	
	if($("#sub_region").val() < 0)
	{
		$('#error_region').dialog('open');
		return;	
	}	
	
	if($("#service").val() < 0)
	{
		$('#error_service').dialog('open');
		return;	
	}	

	if($("#hour_rate").val() == '')
	{
		$('#error_hour_rate').dialog('open');
		return;
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
	
	$("#find_tutor_form").submit();
}