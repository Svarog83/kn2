<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>KN Admin</title>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" href="/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="/css/font-awesome.css" />
	<link rel="stylesheet" href="/css/jquery-ui.css" />
	<link rel="stylesheet" href="/css/icheck/flat/blue.css" />
	<link rel="stylesheet" href="/css/fullcalendar.css"/>
	<link rel="stylesheet" href="/css/jquery.jscrollpane.css" />
	<link rel="stylesheet" href="/css/unicorn.css" />

	<!--[if lt IE 9]>
	<script type="text/javascript" src="/js/respond.min.js"></script>
	<![endif]-->

	<!--css for forms-->
	<link rel="stylesheet" href="/css/colorpicker.css" />
	<link rel="stylesheet" href="/css/datepicker.css" />
	<link rel="stylesheet" href="/css/select2.css" />
	<link rel="stylesheet" href="/css/sd.main.css"/>

	<!--scripts for growl-like notifications-->
	<link rel="stylesheet" href="/css/jquery.gritter.css" />

	<script src="/js/jquery.min.js"></script>


</head>
<body data-color="blue" class="flat">

<script language="JavaScript">
<!--
/* Global variables used in all links. Do not override! Specified in header_2.php*/
var gDEV_SERVER   = <?= \SDClasses\AppConf::getIns()->dev_server ? 'true' : 'false'?>;

/**
 *
 * @type {{}} Different settings for cloning of fields
 */
var gCloneObjSettings = {};
/**
 *
 * @type {{}} Table and field name which has to be copied
 */
var gCloneObj = {};
/**
 *
 * @type {number} global AutoComplete ID. Used in all field's IDs
 */
var gAC_ID = 0;

//-->
</script>

<div id="header">
	<h1><a href="/">KN Admin</a></h1>
	<a id="menu-trigger" href="/"><i class="fa fa-bars"></i></a>
</div>
<div id="user-nav">

	<ul class="btn-group">
		<!--<li class="btn btn-inverse tip-bottom" title="New Workflow"><a title="" href="/job/new"><i class="fa fa--file"></i></a></li>-->
	<li style="margin-right: 30px;" class="btn dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="fa fa-envelope"></i> <span class="text">Alerts</span> <span class="label label-danger">5</span> <b class="caret"></b></a>
            <ul class="dropdown-menu messages-menu">
                <li class="title"><i class="fa fa-envelope-alt"></i>Messages<a class="title-btn" href="#" title="Write new message"><i class="fa fa-share"></i></a></li>
                <li class="message-item">
                    <a href="#">
                        <img alt="User Icon" src="/img/demo/av1.jpg" />
                        <div class="message-content">
                            <span class="message-time">
                                3 mins ago
                            </span>
                            <span class="message-sender">
                                Share folder
                            </span>
                            <span class="has-warning">
                                Is not available
                            </span>
                        </div>
                    </a>
                </li>

            </ul>
        </li>

		<li class="btn"><a title="" href="/user/profile"><i class="fa fa-user"></i> <span
						class="text">Profile</span></a></li>

		<li class="btn"><a title="" href="/user/settings"><i class="fa fa-cog"></i> <span
						class="text">Settings</span></a></li>
		<li class="btn"><a title="" href="/user/exit"><i class="fa fa-share"></i> <span
						class="text">Exit</span></a></li>
	</ul>
</div>