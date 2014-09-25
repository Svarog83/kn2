<?php

use SDClasses\AppConf;
use SDClasses\Workflow;

/**
 * @var array $params
 * @var \SDClasses\Workflow $wf
 * @var SDClasses\View $this
 */
$wf = $params['wf'];
$row = $wf->getRow();

?>

<div class="row">

	<div class="col-xs-12">

		<div class="widget-box">
			<div class="widget-title">
					<span class="icon">
						<i class="fa fa-wf"></i>
					</span>
				<h5><?= $row['wf_name'] ?></h5>

				<div class="buttons">
					<a title="Edit Workflow" class="btn" href="/workflow/edit/<?= $row['wf_id']?>"><i class="fa fa-edit"></i>
						Edit</a>
				</div>
			</div>

			<div class="widget-content form-horizontal">
				<?= $this->showEntry( 'ID', $row['wf_id'] ); ?>
				<?=  $this->showEntry( 'Name', $row['wf_name'] ); ?>
				<?=  $this->showEntry( 'Options', $row['wf_options'] ); ?>
				<?=  $this->showEntry( 'Enabled?', !$row['wf_blocked'] ? 'Yes' : 'No' ); ?>
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
