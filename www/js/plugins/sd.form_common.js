$(document).ready(function(){

	$('input[type=checkbox],input[type=radio]').iCheck({
    	checkboxClass: 'icheckbox_flat-blue',
    	radioClass: 'iradio_flat-blue'
	});

	$('select').select2();
    $('.colorpicker').colorpicker();
    $('.datepicker').datepicker();
    $('.spinner').spinner();
});
