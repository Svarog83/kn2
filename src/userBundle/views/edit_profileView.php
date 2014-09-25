<?php

use SDClasses\AppConf;
use SDClasses\Form;
use SDClasses\User;

/**
 * @var array $params
 * @var User $user
 * @var SDClasses\View $this
 */
$form = new Form();
$user = $params['user'];
$row = $user->getRow();

?>

<div class="row">
	<div class="col-xs-12">
		<div class="widget-box">
			<div class="widget-title">
									<span class="icon">
										<i class="fa fa-user"></i>
									</span>
				<h5>Edit Profile</h5>

				<div class="buttons">
					<a title="Go back" class="btn" href="/user/profile/"><i
								class="fa fa-hand-o-left"></i>
						Back</a>
				</div>
			</div>

			<?php if ( !empty( $params['flash_message'] ) ): ?>
			<span style="color: red; font-weight: bold;"><?php echo $params['flash_message'] ?></span>
            <? endif; ?>

			<div class="widget-content form-horizontal">
				<form action="/user/save_profile" method="POST" class="form-horizontal">
					<input type="hidden" name="user_id" value="<?= $row['user_id']?>">
					<?= $this->showEntry( 'ID', $row['user_id'] ); ?>
					<?= $form->showTextBlock( 'Name', 'form_name', $row['user_name_rus'], array( 'validation' => 'required' ) ); ?>
					<?= $form->showTextBlock( 'Surname', 'form_surname', $row['user_fam_rus'], array( 'validation' => 'required' ) ); ?>
					<?= $form->showTextBlock( 'Login', 'form_login', $row['user_login'], array( 'validation' => 'required' ) ); ?>
					<?= $form->showTextBlock( 'E-mail', 'form_email', $row['user_email'], array( 'help_block' => 'Check carefully!' ) ); ?>

					<?= $form->showTextBlock( 'New password', 'form_pass_new', '', array( 'placeholder' => 'Enter a new password if you want to change it' ) ); ?>

					<?= $form->showSelectBlock( "Sex", 'form_sex', '', array( 'multiple' => false, "validation" => 'required', 'show_select_title' => "Select sex", 'select_values' => array( 'm' => 'Male', 'f' => 'Female' ) ) ); ?>

					<?= $form->showTextAreaBlock( "About yourself", 'form_about' ); ?>

					<?= $form->showRadioBlock( "Auto login?", 'form_auto_enter', 1, array( 'id' => "form_auto_id", 'select_values' => array( "0" => 'No', '1' => 'Yes' ) ) ); ?>

					<?=
					$form->showCheckBoxesBlock( 'Access to modules', 'form_modules[]', array( '1', '2' ), array(
						'no_title' => false,
						'select_values' => array(   '0' => 'Listeners',
													'1' => 'Workflows',
													'2' => 'Settings' ),
						"validation" => "" ) ); ?>

					<?= $this->showEntry( 'Active?', $row['user_activ'] == 'a' ? 'Yes' : 'No' ); ?>

					<div class="form-actions">
						<?= $this->showButton( 'Save', 'btn-success', 'fa-check', array( 'submit' => true ) ) ?>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>