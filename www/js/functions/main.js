function getRandom()
{
	var min_random = 0;
	var max_random = 2000;

	max_random++;

	var range = max_random - min_random;
	return Math.floor( Math.random() * range ) + min_random;
}

function ajaxError ( x, e )
{
	if ( x.status == 0 )
	{
		alert( 'You are offline!!\n Please Check Your Network.' );
	} else if ( x.status == 404 )
	{
		alert( 'Requested URL not found.' );
	} else if ( x.status == 500 )
	{
		alert( 'Internel Server Error.' );
	} else if ( e == 'parsererror' )
	{
		alert( 'Error.\nParsing JSON Request failed.' );
	} else if ( e == 'timeout' )
	{
		alert( 'Request Time out.' );
	}
	else
	{
		alert( 'Unknow Error.\n' + x.responseText );
	}
}

function showJsonError( obj, e )
{
	$('<div class="alert alert-danger"></div>').html(e).insertAfter( obj ).click(function(){ $(this).stop(); }).dblclick(function(){ $(this).hide(); }).fadeOut(5000);
}

function deleteRow( obj )
{
	$(obj).closest('tr').remove();
}