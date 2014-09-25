<?php

namespace SDClasses;
use SDClasses\ModelTable;

/**
 * Class for `workflow` table
 */
class Workflow extends ModelTable
{
	/**
	 * @var string $table_name
	 */
	private $table_name = 'workflow';

	/**
	 * @var string $table_abr
	 */
	private $table_abr = 'wf';


	/**
	 * @param  int|array $wf - id of workflow OR array with data
	 * @param string $wf_hash - hash
	 * @param string $wf_activ - flag of activity for DB query
	 * @param string $wf_field
	 */
	public function __construct( $wf, $wf_hash = '', $wf_activ = 'a', $wf_field = 'wf_id' )
	{
		parent::__construct( $this->table_name, $this->table_abr );
		
		if ( is_array ( $wf ) && count ( $wf ) )
			$this->setRow( $wf );
		else if ( is_numeric( $wf ) )
			$this->getWF( $wf, $wf_hash, $wf_activ, $wf_field );
		else
		{
			$this->setRow( $this->getEmpty() );
			$this->_exist = false;
		}
	}

	/**
	 * Tries to find a work flow record in DB
	 * @param $wf_id - ID of wf
	 * @param $wf_hash = uid of wf
	 * @param string $wf_activ - activity flag
	 * @param string $wf_field - another field to search wf
	 */
	public function getWF ( $wf_id, $wf_hash, $wf_activ = 'a', $wf_field = 'wf_id' )
	{

		$DB = \AutoLoader::DB();
		$wf_field = ( $wf_field == 'wf_ida' ? $wf_field : 'wf_id' );

		$hash_string = '';
		if ( $wf_hash )
			$hash_string =  $DB->parse("AND wf_hash = ?s", $wf_hash);

		$query = "SELECT * FROM workflow WHERE ?n = ?i ?p AND wf_activ = ?s";
//		$DB->setLog( ('display' ) );
		$row = $DB->getRow( $query, $wf_field, $wf_id, $hash_string, $wf_activ );

		$this->setRow( $row );
	}
}

