<?php

use SDClasses\AppConf;
use SDClasses\Form;
use SDClasses\Uploader;
use SDClasses\User;

/**
 * @var array $params
 * @var User $user
 * @var SDClasses\View $this
 */
$form = new Form();

?>

<div class="container-fluid">

	<div class="row-fluid">

		<div class="span12">
			<div class="widget-box">
				<div class="widget-title">
										<span class="icon">
											<i class="icon-user"></i>
										</span>
					<h5>Test</h5>

					<div class="buttons">

					</div>
				</div>

				<div class="widget-content form-horizontal">
					<form action="/comp/save" method="POST" class="form-horizontal dropzone" enctype="multipart/form-data">
						<input type="hidden" name="form_user_id" value="123">
						<?= $form->showTextBlock( 'Имя', 'form_name', '', array( 'validation' => 'required' ) ); ?>


						<link href="/css/plugins/dropzone/dropzone.css" type="text/css" rel="stylesheet" />
						<script type="text/javascript" src="/js/plugins/dropzone/dropzone.js"></script>

						<?
						/*echo $form->showDataBlock( array(), true, 'Загрузка файлов' );
						$Uploader = new Uploader( 'comp', '', array(
							'module' => 'comp',
							'hash' => '',
							'file_max_size' => '100mb',
							'filters' => array(
								array( 'title' => 'Изображения (*.jpg,*.jpeg,*.gif,*.png,*.tif,*.tiff)', 'extensions' => 'jpg,jpeg,gif,png,tif,tiff' ),
								array( 'title' => 'Файлы Adobe PDF (*.pdf)', 'extensions' => 'pdf' ),
								array( 'title' => 'Файлы Word (*.doc,*.docx)', 'extensions' => 'doc,docx' ),
								array( 'title' => 'Файлы Excel (*.xls,*.xlsx)', 'extensions' => 'xls,xlsx' ),
								array( 'title' => 'Архивы (*.zip,*.rar)', 'extensions' => 'zip,rar' ),
								array( 'title' => 'Все файлы', 'extensions' => '*' )
							)
						) );
						$Uploader->upload();
						echo 'text';
						echo $form->showDataBlock();*/

						?>

						<?= $form->showTextBlock( 'Фамилия', 'form_surname', '', array( 'validation' => 'required' ) ); ?>

						<div class="form-actions">
							<?= $this->showButton( 'Сохранить', 'btn-success', 'icon-ok', array( 'submit' => true ) ) ?>
						</div>
					</form>
				</div>
			</div>

		</div>

	</div>
</div>