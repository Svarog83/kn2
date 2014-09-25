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
$form = new Form(
	array( 'form_id' => 'form_id', 'module' => 'comp', 'action' => 'save', 'need_confirm' => false, 'upload_exist' => false )
);

$FormElements = array();

$FormElements[] = new FormElement( 'hidden', '', 'comp_id', '' );
$FormElements[] = new FormElement( 'text', 'Название', 'comp_name', '', array( 'size' => '50', 'validation' => 'required' ) );
$FormElements[] = new FormElement( 'radio', 'Зарубежная?', 'comp_foreign', '', array( 'id' => "form_foreign_id", 'select_values' => array( "0" => 'Нет', '1' => 'Да' ) ) );
$FormElements[] = new FormElement( 'checkbox', 'Департаменты', 'comp_dep', array(), array( 'select_values' => array( "1" => 'Таможня', '2' => 'Логистика', '3' => 'Бухгалтерия' ) ) );
$FormElements[] = new FormElement( 'select', 'Тип компании', 'comp_type', '', array( 'multiple' => false, "validation" => '', 'show_select_title' => "Выберите тип", 'select_values' => array( 'b' => 'Брокер', 'c' => 'Заказчик', 't' => 'Перевозчик' ) ) );

$FormElements[] = new FormElement( 'radio', 'Is activated?', 'comp_blocked', '', array( 'id' => "form_foreign_id", 'select_values' => array( "0" => 'No', '1' => 'Yes' ) ) );

$FormElements[] = new FormElement( 'empty', ' ', '', '' );

$FormElements[] = new FormElement( 'textarea', 'Banking account', 'comp_account', '', array() );
$FormElements[] = new FormElement( 'text', 'VAT Number', 'comp_vat', '', array() );
$FormElements[] = new FormElement( 'textarea', 'Address', 'comp_address', '', array() );

$FormElements[] = new FormElement( 'empty', ' ', '', '' );

$FormElements[] = new FormElement( 'text', 'General manager name', 'comp_manager_name', '', array() );
$FormElements[] = new FormElement( 'text', 'Official e-mail', 'comp_email', 'ser@ser.ru', array( 'validation' => 'required email' ) );
$FormElements[] = new FormElement( 'text', 'Phone number', 'comp_phone', '9104406045', array( 'validation' => 'required phoneNumb' ) );
/*$FormElements[] = new FormElement( 'upload', 'Attachments', 'form_files', '', array(
	'module' => 'comp',
	'hash' => '',
	'file_max_size' => '100mb',
	'filters' => array(
		array( 'title' => 'Изображения (*.jpg,*.jpeg,*.gif,*.png,*.tif,*.tiff)', 'extensions' => 'jpg,jpeg,gif,png,tif,tiff' ),
		array( 'title' => 'Файлы AutoCad (*.dxf)', 'extensions' => 'dxf' ),
		array( 'title' => 'Файлы Adobe PDF (*.pdf)', 'extensions' => 'pdf' ),
		array( 'title' => 'Файлы Word (*.doc,*.docx)', 'extensions' => 'doc,docx' ),
		array( 'title' => 'Файлы Excel (*.xls,*.xlsx)', 'extensions' => 'xls,xlsx' ),
		array( 'title' => 'Архивы (*.zip,*.rar)', 'extensions' => 'zip,rar' ),
		array( 'title' => 'Все файлы', 'extensions' => '*' )
	)
) );*/

?>

<div class="row">
	<div class="col-xs-12">
		<div class="widget-box">
			<div class="widget-title">
				<span class="icon"><i class="fa fa-user"></i></span>
				<? if ( true ): ?>
				<h5>Company creation</h5>
				<? else: ?>
				<h5>Editing of a company</h5>
				<? endif; ?>

				<div class="buttons">
					<a title="Back to list of companies" class="btn" href="/comp/list"><i
								class="fa fa-compass"></i>
						List of companies</a>
				</div>
			</div>
			<? $form->showForm( $this, $FormElements ); ?>
		</div>
	</div>
</div>