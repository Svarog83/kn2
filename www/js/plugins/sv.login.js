/**
 * Unicorn Admin Template
 * Version 2.2.0
 * Diablo9983 -> diablo9983@gmail.com
**/

var login = $('#loginform');
var loginbox = $('#loginbox');
var animation_speed = 300;

$(document).ready(function(){

    var loc = window.location + '';
    var ee = loc.split('#');

    $('#loginform').submit(function(e){
        var thisForm = $(this); 
        var userinput = $('#username');
        var passinput = $('#password');
        if(userinput.val() == '' || passinput.val() == '') {
            highlight_error(userinput);
            highlight_error(passinput);
            loginbox.effect('shake');
            return false;
        } else {
	        e.preventDefault();
	        thisForm.unbind('submit').submit();
            return true;
        }       
    });

    $('#username, #password').on('keyup',function(){
        highlight_error($(this));
    }).focus(function(){
        highlight_error($(this));
    }).blur(function(){
        highlight_error($(this));
    });
});

function highlight_error(el) {
    if(el.val() == '') {
        el.parent().addClass('has-error');
    } else {
        el.parent().removeClass('has-error');
    }
}