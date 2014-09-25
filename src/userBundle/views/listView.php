<?php

use SDClasses\AppConf;
use SDClasses\User;

/**
 * @param array $UsersArr
 */
$UsersArr = $params['users'];

/**
 * @var array $params
 * @var User $user
 * @var SDClasses\View $this
 */
?>
<div class="row">

	<div class="col-xs-12">

		<div class="widget-box">
			<div class="widget-title">
				<span class="icon">
					<i class="fa fa-th"></i>
				</span>
				<h5>List of users</h5>
			</div>
			<div class="widget-content nopadding">
				<table class="table table-bordered table-striped table-hover data-table">
					<thead>
					<tr>
						<th style="width: 10px;">&nbsp;</th>
						<th style="width: 60px;">ID</th>
						<th>Name</th>
						<th>Login</th>
						<th>E-mail</th>
						<th>Sex</th>
						<th>Status</th>
						<th style="width: 60px;">&nbsp;</th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ( $UsersArr AS $row )
					{
						?>
						<tr>
							<td>
								<a href="/user/show/<?= $row['user_id'] ?>"><i class="fa fa-search"></i></a>
							</td>
							<td><?= $row['user_id'] ?></td>
							<td><?= User::showUserName( $row ) ?></td>
							<td><?= $row['user_login'] ?></td>
							<td><?= $row['user_email'] ?></td>
							<td><?= $row['user_sex'] == 'f' ? 'Female' : 'Male' ?></td>
							<td><?= $row['user_activ'] == 'd' ? 'Deleted' : ( $row['user_blocked'] ? 'Blocked' : 'Active' ) ?></td>

							<td>
								<? if ( $row['user_activ'] == 'a' ): ?>
									<a href="/user/edit/<?= $row['user_id'] ?>">
										<i class="fa fa-edit" title="Edit"></i>
									</a>
									<a href="/user/delete/<?= $row['user_id'] ?>">
										<i class="fa fa-trash-o" title="Delete"></i>
									</a>
								<? else: ?>
									<a href="/user/activate/<?= $row['user_id'] ?>">
										<i class="fa fa-reply" title="Restore"></i>
									</a>
								<? endif; ?>
							</td>

						</tr>
					<?
					}
					?>

					</tbody>
				</table>
			</div>


	</div>

</div>

<script type="text/javascript">
	<!--
	$( document ).ready( function ()
	{

		<?php if ( !empty( $params['flash_message'] ) ): ?>
		$.gritter.add( {
			title: '',
			text: '<?= $params['flash_message'] ?>',
			sticky: true
		} );
		<? endif;?>
	} );
	//-->
</script>

