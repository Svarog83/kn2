<?php

use SDClasses\AppConf;
use SDClasses\Workflow;
use SDClasses\User;

/**
 * @param array $WFArr
 */
$WFArr = $params['wfs'];

/**
 * @var array $params
 * @var \SDClasses\Workflow $wf
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
				<h5>List of workflows</h5>
			</div>
			<div class="widget-content nopadding">
				<table class="table table-bordered table-striped table-hover data-table">
					<thead>
					<tr>
						<th style="width: 10px;">&nbsp;</th>
						<th style="width: 60px;">ID</th>
						<th>Name</th>
						<th>Settings</th>
						<th>Status</th>
						<th style="width: 60px;">&nbsp;</th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ( $WFArr AS $row )
					{
						?>
						<tr>
							<td>
								<a href="/workflow/show/<?= $row['wf_id'] ?>"><i class="fa fa-search"></i></a>
							</td>
							<td><?= $row['wf_id'] ?></td>
							<td><?= $row['wf_name'] ?></td>
							<td><?= $row['wf_options'] ?></td>
							<td><?= $row['wf_activ'] == 'd' ? 'Deleted' : ( $row['wf_blocked'] ? 'Disabled' : 'Enabled' ) ?></td>

							<td>
								<? if ( $row['wf_activ'] == 'a' ): ?>
									<a href="/workflow/edit/<?= $row['wf_id'] ?>">
										<i class="fa fa-edit" title="Edit"></i>
									</a>
									<a href="/workflow/delete/<?= $row['wf_id'] ?>">
										<i class="fa fa-trash-o" title="Delete"></i>
									</a>
								<? else: ?>
									<a href="/workflow/activate/<?= $row['wf_id'] ?>">
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

