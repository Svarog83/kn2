
var obj_form 		= document.getElementById(g_form_id);
var obj_div_submit 	= document.getElementById('div_submit_form');
var obj_div_success = document.getElementById('div_submit_success');
var obj_div_error 	= document.getElementById('div_submit_error');
var obj_div_buttons	= document.getElementById('div_buttons_save');
var obj_back_edit 	= document.getElementById('div_back_editing');
var obj_close		= document.getElementById('button_close_id');
var submit_success  = false;

function SaveForm ( )
{
	if ( g_need_confirm )
	{
		if ( !confirm ( 'Save form?' ) )
			return false;
	}
	var form = $("#" + g_form_id );

	if( !form.valid() )
	{

	/*	var first_invalid = $("span.help-inline:visible" ).first();
		alert ( first_invalid. outerHTML );

		if ( first_invalid.length > 0)
		{
			$.scrollTo( first_invalid, {duration:400} );
		}*/
		return false;
	}

	if ( g_script_before != '' ) eval ( g_script_before );

	submit_success = false;
	var module = g_module;
	var action = g_action;

	obj_div_buttons.style.display = 'none';

	if ( obj_form && module != '' && action != '' )
	{
		obj_form.style.display = 'none';
		if ( obj_close )
			obj_close.disabled = true;

		obj_div_submit.style.display = 'block';

		setTimeout( "ShowBackEditDiv();", 10000 );

		if ( g_upload_exist )
		{
			upload_done = false;
			var uploader = $('#uploader').pluploadQueue();

			if ( uploader.files.length > 0 && uploader.total.uploaded < uploader.files.length )
			{
				// When all files are uploaded submit form
				uploader.bind('UploadProgress', function() {
					if ( uploader.total.uploaded == uploader.files.length )
					{
						upload_done = true;
						ajaxSubmitForm();
					}
				});

				uploader.start();
			}
			else
				ajaxSubmitForm();
		}
		else
			ajaxSubmitForm();

	}
	else
	{
		alert ( 'Форма не может быть сохранена.\nПожалуйста, обратитесь к Администратору.' );
		obj_div_buttons.style.display = 'block';

		return true;
	}
}

function ajaxSubmitForm()
{

$.ajax(
	{
		type: "POST",
		url: "/" + g_module + "/" + g_action + "/?hash=" + Math.random(),
		cache: false,

		dataType: "text",
		data: { form_save_ajax : $(obj_form).serialize(),
			ajax_flag : '1'
		},
		success: function( text )
		{
			var data;
			try
			{
				data = $.parseJSON(text);
			}
			catch(e)
			{
//	                  text = '<br><br>' + e;
					showJsonError( obj_form, text );
			}

			obj_div_submit.style.display = 'none';
			if ( obj_close )
				obj_close.disabled = false;

			if ( data )
			{
				if ( data['success'] )
				{
					submit_success = true;
					obj_div_success.style.display = 'block';
					obj_div_error.style.display = 'none';
					obj_back_edit.style.display = 'none';


					var obj_span = document.getElementById('span_success');
					if ( data['return_text'] )
						obj_span.innerHTML = data['return_text'];
					else
						obj_span.innerHTML = "";

					if ( g_script_success != '' ) eval ( g_script_success );
				}

				if ( data['script'] )
				{
					eval ( data['script'] );
				}
			}

			if ( !submit_success )
			{
				obj_div_success.style.display = 'none';
				obj_div_error.style.display = 'block';
				obj_back_edit.style.display = 'block';


				var obj_span = document.getElementById('span_error');
				if ( typeof data != "undefined" )
					obj_span.innerHTML = data['return_text'];
				else
					obj_span.innerHTML = "";

				if ( g_script_error != '' ) eval ( g_script_error );
			}

			if ( gDEV_SERVER && document.getElementById('div_form_debug') )
			{
				document.getElementById('div_form_debug').innerHTML = text;
				document.getElementById('div_form_debug').style.display = 'block';
			}

		},

		error: function( x, e )
		{
			obj_div_submit.style.display = 'none';
			submit_success = false;

			ajaxError( x, e );
		}

	} );
}

function ShowBackEditDiv()
{
	obj_back_edit.style.display = submit_success || obj_div_buttons.style.display == 'block' ? 'none' : 'block';
	return true;
}

function BackForEditing()
{
	var confirmed = true;
	if ( submit_success  )
		confirmed = confirm ( "Are you sure that you want to get back to editing?");

	if ( confirmed )
	{
		obj_form.style.display = 'block';
		obj_div_buttons.style.display = 'block';
		obj_div_success.style.display = 'none';
		obj_div_error.style.display = 'none';
		obj_back_edit.style.display = 'none';
	}

	if ( g_upload_exist )
	{
		var uploader = $('#uploader').pluploadQueue();
		uploader.refresh();
	}
	obj_div_submit.style.display = 'none';

	return true;
}

$(document).ready(function()
{
	jQuery.validator.addMethod( "phoneNumb", function(phone_number, element) {
	    phone_number = phone_number.replace(/^\+/g, "");
		return this.optional(element) || phone_number.length > 6 &&	!phone_number.match(/[^0-9]/);
	}, "Please insert a correct phone number. Only digits and sign '+' are allowed");
});
