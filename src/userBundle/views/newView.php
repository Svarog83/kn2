<?php

use SDClasses\AppConf;
use SDClasses\Form;
use SDClasses\FormElement;
use SDClasses\User;

/**
 * @var array $params
 * @var User $user
 * @var SDClasses\View $this
 */
$user = $params['user'];
$row = $user->getRow();

$form = new Form(
	array( 'form_id' => 'myform', 'module' => 'user', 'action' => 'save', 'need_confirm' => false, 'upload_exist' => false )
);

$FormElements = array();

$FormElements[] = new FormElement( 'hidden', '', 'form_user_id', $row['user_id'] );
$FormElements[] = new FormElement( 'text', 'Name', 'form_name', $row['user_name_rus'], array( 'size' => '50', 'validation' => 'required') );
$FormElements[] = new FormElement( 'text', 'Surname', 'form_surname', $row['user_fam_rus'], array( 'size' => '50', 'validation' => 'required' ) );
$FormElements[] = new FormElement( 'text', 'Login', 'form_login', $row['user_login'], array( 'size' => '50', 'validation' => 'required' ) );
$FormElements[] = new FormElement( 'text', 'E-mail', 'form_email', $row['user_email'], array( 'help_block' => 'Check carefully!', 'validation' => 'required email' ) );
$FormElements[] = new FormElement( 'text', 'Password', 'form_pass', '', array( 'placeholder' => 'Enter password' ) );
$FormElements[] = new FormElement( 'select', 'Sex', 'form_sex', $row['user_sex'], array( 'multiple' => false, "validation" => 'required', 'show_select_title' => "Select sex", 'select_values' => array( 'm' => 'Male', 'f' => 'Female' ) ) );
$FormElements[] = new FormElement( 'radio', 'Blocked?', 'form_blocked', $row['user_blocked'], array( 'id' => "form_blocked_id", 'select_values' => array( "0" => 'No', '1' => 'Yes' ) ) );

?>

<div class="row">
	<div class="col-xs-12">
		<div class="widget-box">
			<div class="widget-title">
				<span class="icon"><i class="fa fa-user"></i></span>
				<? if ( !$user->getExist() ): ?>
				<h5>User creation</h5>
				<? else: ?>
				<h5>Editing of a user</h5>
				<? endif; ?>

				<div class="buttons">
					<a title="Back to list of users" class="btn" href="/user/list"><i
								class="fa fa-user"></i>
						List of users</a>
				</div>
			</div>
			<? $form->showForm( $this, $FormElements ); ?>
		</div>
	</div>
</div>
