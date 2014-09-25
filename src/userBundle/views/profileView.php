<?php

use SDClasses\AppConf;
use SDClasses\User;

/**
 * @var array $params
 * @var User $user
 * @var SDClasses\View $this
 */
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
				<h5><?= User::showUserName( $row ) ?></h5>

				<div class="buttons">
					<a title="Edit user" class="btn" href="/user/edit/<?= $row['user_id']?>"><i class="fa fa-edit"></i>
						Edit</a>
					<a title="Print the page" class="btn" href="#"><i class="fa fa-print"></i> Print</a>
				</div>
			</div>

			<div class="widget-content form-horizontal">
				<?= $this->showEntry( 'ID', $row['user_id'] ); ?>
				<?=  $this->showEntry( 'Name', User::showUserName( $row ) ); ?>
				<?=  $this->showEntry( 'Login', $row['user_login'] ); ?>
				<?=  $this->showEntry( 'E-mail', $row['user_email'] ); ?>
				<?=  $this->showEntry( 'Sex', $row['user_sex'] == 'f' ? 'Female' : 'Male' ); ?>
				<?=  $this->showEntry( 'Active?', !$row['user_blocked'] ? 'Yes' : 'No' ); ?>
			</div>
		</div>

	</div>

	<script type="text/javascript">
		<!--
		$(document).ready(function()
		{

			<?php if ( !empty( $params['flash_message'] ) ): ?>
				$.gritter.add({
					title:	'',
					text:	'<?= $params['flash_message'] ?>',
					sticky: true
				});
			<? endif;?>
		} );
		//-->
	</script>
