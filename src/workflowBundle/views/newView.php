<?php

use SDClasses\AppConf;
use SDClasses\Form;
use SDClasses\FormElement;
use SDClasses\Workflow;

/**
 * @var array $params
 * @var Workflow $wf
 * @var SDClasses\View $this
 */
$wf = $params['wf'];
$row = $wf->getRow();

$form = new Form(
	array( 'form_id' => 'wf_form', 'module' => 'workflow', 'action' => 'save', 'need_confirm' => false, 'upload_exist' => false )
);

$FormElements = array();

$FormElements[] = new FormElement( 'hidden', '', 'form_wf_id', $row['wf_id'] );
$FormElements[] = new FormElement( 'text', 'Name', 'form_name', $row['wf_name'], array( 'size' => '50', 'validation' => 'required') );
$FormElements[] = new FormElement( 'textarea', 'Workflows options', 'form_options', $row['wf_options'], array( 'help_block' => 'See documentation!', 'size' => '50', 'validation' => 'required' ) );
$FormElements[] = new FormElement( 'radio', 'Disabled?', 'form_blocked', $row['wf_blocked'], array( 'id' => "form_blocked_id", 'select_values' => array( "0" => 'No', '1' => 'Yes' ) ) );

?>

<div class="row">
	<div class="col-xs-12">
		<div class="widget-box">
			<div class="widget-title">
				<span class="icon"><i class="fa fa-gears"></i></span>
				<? if ( !$wf->getExist() ): ?>
				<h5>Workflow creation</h5>
				<? else: ?>
				<h5>Editing of a workflow</h5>
				<? endif; ?>

				<div class="buttons">
					<a title="Back to list of users" class="btn" href="/workflow/list"><i
								class="fa fa-gears"></i>
						List of worklfows</a>
				</div>
			</div>
			<? $form->showForm( $this, $FormElements ); ?>
		</div>
	</div>
</div>
