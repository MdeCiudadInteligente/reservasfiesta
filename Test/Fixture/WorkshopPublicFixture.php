<?php
/**
 * WorkshopPublicFixture
 *
 */
class WorkshopPublicFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'workshop_public';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id_workshop_public' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'workshop_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'public_type_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id_workshop_public', 'unique' => 1),
			'workshop_id' => array('column' => 'workshop_id', 'unique' => 0),
			'public_type_id' => array('column' => 'public_type_id', 'unique' => 0),
			'workshop_id_2' => array('column' => 'workshop_id', 'unique' => 0),
			'public_type_id_2' => array('column' => 'public_type_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id_workshop_public' => 1,
			'workshop_id' => 1,
			'public_type_id' => 1
		),
	);

}
