<!DOCTYPE html>
<html lang="en">
    <head>
        <title>KNCP - Kuehene + Nagel Control Panel</title>
		<meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="/css/bootstrap.min.css" />
	    <link rel="stylesheet" href="/css/font-awesome.css" />
        <link rel="stylesheet" href="/css/unicorn.login.css" />
	    <!--[if lt IE 9]>
	    	<script type="text/javascript" src="/js/respond.min.js"></script>
	    	<![endif]-->

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <body>
    <div id="container">
        <div id="logo">
	        <h5 style="color: #08c; text-align: center;">KNCP - Kuehene + Nagel Control Panel</h5>
        </div>
        <div id="loginbox">
            <form id="loginform" action="/user/auth" method="POST">
				<p>Enter username and password to continue.</p>
                <div class="input-group input-sm">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
	                <input class="form-control" type="text" id="username" name="form_login" placeholder="Username" />
                </div>
                <div class="input-group input-sm">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
	                <input class="form-control" type="password" id="password" name="form_password" placeholder="Password" />
                </div>
                <div class="form-actions clearfix">
                    <div class="pull-left">
	                    <a href="mailto: S.Vetko@inspectorate.ru" class="grey">Lost password?</a>
                    </div>
                    <div class="pull-right">
	                    <input type="submit" class="btn btn-primary btn-default" value="Login" />
                    </div>

                </div>

            </form>

        </div>
    </div>

        <script src="/js/jquery.min.js"></script>
	    <script src="/js/jquery-ui.custom.min.js"></script>
        <script src="/js/plugins/sv.login.js"></script>

    <script language="JavaScript">
    <!--
    var $j = jQuery;
    $j(document).ready( function()
    {

        $j("head").append($j('<script src="/js/plugins/jquery-validate/jquery.validate.min.js">').attr("type","text/javascript"));
        $j("head").append($j('<script src="/js/plugins/jquery.example.js">').attr("type","text/javascript"));
        $j("head").append($j('<script src="/js/plugins/jquery.fixedtableheader.min.js">').attr("type","text/javascript"));
        $j("head").append($j('<script src="/js/plugins/jquery.json-2.2.min.js">').attr("type","text/javascript"));
    <?
        $arr_js_files = array(
            "main"=>"",
            "jquery_scrollTo"=>"",
            "jquery_autocomplete"=>"",
            "DP_Debug"=>"",
            "dump"=>"" );
        $web_root   = SDClasses\AppConf::getIns()->root_path . '/www';
        foreach ($arr_js_files as $js_file => $js_path )
        {
            $_js_file = "/js/functions/". $js_path.$js_file. ".js";
            $timestamp = filemtime( $web_root . $_js_file );
            $_js_file = "/js/functions/". $js_path.$js_file.".v".$timestamp. ".js";
    ?>
        $j("head").append($j('<script src="<?=$_js_file?>">').attr("type","text/javascript"));
    <?
        }
    ?>

    });

    //-->
    </script>

	<div id="footer" style="text-align: center; color: #0088cc">
        <?php echo '2013' . ( date( "Y" ) != '2013' ? '-' . date( "Y" ) : '' ) ?> &copy; SV development</a>
    </div>

    </body>
</html>