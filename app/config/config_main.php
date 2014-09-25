<?php


use SDClasses\AppConf;

$AC->STD = '0';
$AC->logout_time = 1800;
$AC->IS_DST = AppConf::is_dst();
$AC->Charset = 'utf-8';
$AC->DBCharset = 'utf8';
$AC->secret_salt = 'kn2_salt';

$AC->admin_emails = array(
	'svaroggg@gmail.com'
);

$AC->menu = array(
	'items' => array(
		"main" => array(
			'name' => 'Home',
			'path' => '/',
			'class' => 'fa fa-home',
			'active' => true
		),
		/*"workflow" => array(
			'name' => 'Workflows',
			'path' => '/workflow',
			'class' => 'fa fa-gears',
			'active' => false,
			'submenu' => array(
				"job_list" => array(
					'name' => 'List',
					'path' => '/workflow/list',
					'class' => '',
				),
				"job_new" => array(
					'name' => 'New',
					'path' => '/workflow/new',
					'class' => '',
				),
			)
		),*/
		"comp" => array(
			'name' => 'Copmany',
			'path' => '/comp',
			'class' => 'fa fa-th-list',
			'submenu' => array(
				"comp_list" => array(
					'name' => 'List',
					'path' => '/comp/list',
					'class' => '',
				),
				"comp_new" => array(
					'name' => 'New',
					'path' => '/comp/new',
					'class' => '',
				),
				"comp_stats" => array(
					'name' => 'Stats',
					'path' => '/comp/stats',
					'class' => '',
				),
			)
		),
		/*
		"contr" => array(
			'name' => 'Контракт',
			'path' => '/contr',
			'class' => 'fa fa-briefcase',
			'submenu' => array(
				"contr_list" => array(
					'name' => 'Список',
					'path' => '/contr/list',
					'class' => '',
				),
				"contr_new" => array(
					'name' => 'Новый',
					'path' => '/contr/new',
					'class' => '',
				),
			),
		),*/

		"user" => array(
			'name' => 'Users',
			'path' => '/user',
			'class' => 'fa fa-user',
			'submenu' => array(
				"user_new" => array(
					'name' => 'New',
					'path' => '/user/new',
					'class' => '',
				),
				"user_list" => array(
					'name' => 'List',
					'path' => '/user/list',
					'class' => '',
				),
				"user_settings" => array(
									'name' => 'Settings',
									'path' => '/user/settings',
									'class' => '',
								),
				"user_profile" => array(
									'name' => 'Profile',
									'path' => '/user/profile',
									'class' => '',
								),

			),
		),

		/*"chart" => array(
			'name' => 'Графики',
			'path' => '/chart',
			'class' => 'fa fa-signal',
		),*/

	)
);

$AC->modules = array(
	'main' => array(
		'name' => 'Main',
		'active' => true
	),
	'comp' => array(
		'name' => 'Компания',
		'active' => false
	),
	'contr' => array(
		'name' => 'Контракт',
		'active' => false
	),
	'chart' => array(
		'name' => 'Графики',
		'active' => false
	),
	'workflow' => array(
		'name' => 'Workflow',
		'active' => true
	),
	'user' => array(
		'name' => 'Users',
		'active' => true
	),
);
