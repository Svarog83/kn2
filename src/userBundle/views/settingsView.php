<?php

use SDClasses\AppConf;
use \User;

/**
 * @var array $params
 * @var User $user
 * @var SDClasses\View $this
 */
$user = $params['user'];

?>

<div class="row">
	<div class="col-xs-12">
	<div class="widget-box">
			<div class="widget-title">
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#tab1">General</a></li>
					<li class=""><a data-toggle="tab" href="#tab2">Notifications</a></li>
					<li class=""><a data-toggle="tab" href="#tab3">Listeners</a></li>
				</ul>
			</div>
			<div class="widget-content tab-content">
				<div id="tab1" class="tab-pane active">General settings
				<br>
					<br>
					<?= $this->showButton( 'Save', 'btn-success', 'fa-check', array ( 'id' => 'btn1' ) ); ?>
					<?= $this->showButton( 'Cancel', 'btn-danger', 'fa-times', array ( ) ); ?>
				</div>
				<div id="tab2" class="tab-pane">Notifications settings</div>
				<div id="tab3" class="tab-pane">Listeners settings (enable, disable, etc...)</div>
			</div>
		</div>
	</div>

</div>