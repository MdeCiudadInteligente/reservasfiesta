<?php
/**
 * WorkshopSessionFixture
 *
 */
class WorkshopSessionFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'workshop_session';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id_workshop_session' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'workshop_day' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'workshop_time' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'travel_time' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'state' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'workshop_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id_workshop_session', 'unique' => 1),
			'workshop_id' => array('column' => 'workshop_id', 'unique' => 0),
			'workshop_id_2' => array('column' => 'workshop_id', 'unique' => 0)
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
			'id_workshop_session' => 1,
			'workshop_day' => 'Lorem ipsum dolor sit amet',
			'workshop_time' => 'Lorem ipsum dolor sit amet',
			'travel_time' => 'Lorem ipsum dolor sit amet',
			'state' => 'Lorem ipsum dolor sit amet',
			'workshop_id' => 1
		),
	);

}
