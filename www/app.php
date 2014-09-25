<?php
use SDClasses\AppConf;
use SDClasses\Controller;
use SDClasses\Func;
use SDClasses\Router;
use SDClasses\Request;
use SDClasses\View;

error_reporting ( E_ALL );
session_start();

require( '../src/classes/AutoLoader.php' );

$AC = AppConf::getIns();
$AC->root_path = $_SERVER['DOCUMENT_ROOT'] . '/..';

require ( $AC->root_path . '/app/config/config_main.php' );
if ( strpos ( $_SERVER['HTTP_HOST'], 'kn2.com' ) !== false )
{
    $AC->dev_server		= TRUE;
	require ( $AC->root_path . '/app/config/config_dev_home.php' );
	require ( '../vendor/kint/kint-bundle/Kint.class.php');
}
else if ( ( isset ( $_SERVER['SERVER_ADDR'] ) && strpos ( $_SERVER['SERVER_ADDR'], '127.0' ) !== false ) || strpos ( $_SERVER['HTTP_HOST'], 'mint' ) !== false )
{
    $AC->dev_server		= TRUE;
	require ( $AC->root_path . '/app/config/config_dev.php' );
	require ( '../vendor/kint/kint-bundle/Kint.class.php');
}
else
{
	$AC->dev_server 	= FALSE;
	require ( $AC->root_path . '/app/config/config_prod.php' );
}

$AC->route = new Router( $_SERVER['REQUEST_URI'] );
$module = $AC->route->getModule();
$action = $AC->route->getAction();

$form_save_ajax = Request::getVar( 'form_save_ajax', '' );
if ( $form_save_ajax !== '' )
{
	$arr = array();
	parse_str( $form_save_ajax, $arr );
	$_REQUEST = array_merge( $_REQUEST, $arr );
	unset ( $arr, $_REQUEST['form_save_ajax'] );
}

if ( $module == 'user' && $action == 'auth' )
	unset ( $_SESSION['user_id'], $_SESSION['user_uid'] );
else if ( $module == 'user' && $action == 'exit' )
{
	$_SESSION['user_id'] = '';
	$_SESSION['user_uid'] = '';
}

$ajax_flag              = (int)Request::getVar( 'ajax_flag', 0 );
$AC->ajax_flag          = $ajax_flag ? true : false;

$AC->user       = intval( Request::getVar( 'user_id', 0, 'session' ) );
$AC->uid        = trim( Request::getVar( 'user_uid', '', 'session' ) );
$AC->auth_ok    = true;

$DB = AutoLoader::DB( $AC->db_settings );

//check user
if ( $AC->user && $module == 'user' && $action == 'exit' )
	$AC->auth_ok = false;
else if ( $AC->user && $AC->uid && ( $module != 'user' || $action != 'auth' ) )
{
	if ( !Func::CheckUser() )
	{
		$AC->user = $AC->uid = '';
		$AC->auth_ok = false;
	}
	else if ( !$module )
		$module = 'first';
}
else if ( !$AC->user && ( $module != 'user' || $action != 'auth' ) )
	$AC->auth_ok = false;

$AC->module_time_start = time();
if ( $module && $AC->auth_ok )
{
	if ( isset ( $AC->modules[$module] ) )
		$AC->breadcrumb[] = $AC->modules[$module]['name'];

	if ( $action )
	{
		if ( strpos ( $action, 'edit' ) !== false )
			$AC->breadcrumb[] = 'Edit';
		else if ( strpos ( $action, 'show' ) !== false )
			$AC->breadcrumb[] = 'View';
		else if ( strpos ( $action, 'new' ) !== false )
			$AC->breadcrumb[] = 'Create';
		else if ( strpos ( $action, 'list' ) !== false )
			$AC->breadcrumb[] = 'List';
		else if ( strpos ( $action, 'save' ) !== false )
			$AC->breadcrumb[] = 'Save';
		else
			$AC->breadcrumb[] = 'View';
	}

	if ( !$AC->ajax_flag && $AC->user)
	{
		new View( '', array ( 'view' => 'header' ) );
		$AC->_view->render();
		new View( '', array ( 'view' => 'sidebar' ) );
		$AC->_view->render( array ( 'menu' => AppConf::getIns()->menu ) );
	}

	if ( $AC->ajax_flag )
	    ob_start( 'processAJAX' );

	$AC->_controller = new Controller( $module, $action );

	if ( !$AC->ajax_flag && $AC->user )
	{
		new View( '', array ( 'view' => 'footer' ) );
		$AC->_view->render();
	}
}
else if ( !$AC->auth_ok )
{
	/*if a user is not authenticated*/
	new View( '../app/Resources/views/login_page.php' );
//	$AC->_view = new View( '', array ( 'module' => 'user', 'view' => 'login_page' ) );
	$AC->_view->render();
}