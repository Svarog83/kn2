<?php
namespace SDClasses\workflowBundle\Controller;
use SDClasses;
use SDClasses\AppConf;
use SDClasses\NoEscapeClass;
use SDClasses\Workflow;
use SDClasses\Controller;

class workflowController extends Controller
{
	public function newAction()
	{
		$wf = new Workflow( '' );
		$this->render( array( 'module' => 'workflow', 'view' => 'new' ), array ( 'wf' => $wf ) );
	}

	public function editAction()
	{
		$wf_id = isset ( AppConf::getIns()->route->getParams()[0] ) ? AppConf::getIns()->route->getParams()[0] : '';

		$wf = new Workflow( $wf_id );

		if ( $wf->getExist() )
		{
			$this->render( array( 'module' => 'workflow', 'view' => 'new' ), array( 'wf' => $wf ) );
		}
		else
			$this->Error404( 'Workflow not found or deleted' );
	}

	public function saveAction()
	{
		$wf_id = isset ( $_REQUEST['form_wf_id'] ) ? $_REQUEST['form_wf_id'] : '';
		$wf = new Workflow( $wf_id );
		$edit_flag = $wf->getExist() ? true : false;
		$AC = AppConf::getIns();

		$row = $wf->getRow();

		if ( $edit_flag )
			unset ( $row['wf_ida'], $row['wf_changer'], $row['wf_change_date'] );
		else
		{
			$row['wf_activ'] = 'a';
			$row['wf_id'] = new NoEscapeClass( "( SELECT if ( max(wf_id)  IS NULL, 1, max(wf_id) + 1 ) AS c FROM ( SELECT wf_id FROM workflow ) AS t1 )" );
		}

		$row['wf_name'] = $_REQUEST['form_name'];
		$row['wf_options'] = $_REQUEST['form_options'];
		$row['wf_blocked'] = $_REQUEST['form_blocked'];

		$wf->setRow( $row );
		$insert_id = $wf->save( true, $edit_flag, array(), false );

		if ( $edit_flag )
			$insert_id = $wf_id;
		if ( !$edit_flag )
		{
			$wf = new Workflow ( $insert_id, '', 'a', 'wf_ida' );
		}

		if ( $AC->ajax_flag )
		{
			if ( $insert_id )
			{
				$AC->ajax_return['success'] = true;
				$this->render( array( 'module' => 'workflow', 'view' => 'show' ), array( 'flash_message' => 'Data saved successfully', 'wf' => $wf ) );
			}
			else
			{
				$AC->ajax_return['success'] = false;
				echo 'Something went wrong. Can not save the workflow';
			}
		}

	}

	public function listAction( $flash_mesage = '' )
	{
		$DB = \AutoLoader::DB();
		$WFArr = $DB->getAll( "SELECT * FROM workflow WHERE wf_activ!='ch' ORDER BY wf_name" );
		$this->render( array( 'module' => 'workflow', 'view' => 'list' ), array( "wfs" => $WFArr, 'flash_message' => $flash_mesage) );
	}

	public function deleteAction()
	{
		$wf_id = isset ( AppConf::getIns()->route->getParams()[0] ) ? AppConf::getIns()->route->getParams()[0] : 0;
		$DB = \AutoLoader::DB();
		$DB->query( "UPDATE workflow SET wf_activ= 'd' WHERE wf_id = ?i AND wf_activ = 'a'", $wf_id );

		$this->listAction( 'Workflow deleted' );

	}

	public function activateAction()
	{
		$wf_id = isset ( AppConf::getIns()->route->getParams()[0] ) ? AppConf::getIns()->route->getParams()[0] : 0;
		$DB = \AutoLoader::DB();
		$DB->query( "UPDATE workflow SET wf_activ= 'a' WHERE wf_id = ?i AND wf_activ='d'", $wf_id );

		$this->listAction( 'Workflow restored' );

	}
}