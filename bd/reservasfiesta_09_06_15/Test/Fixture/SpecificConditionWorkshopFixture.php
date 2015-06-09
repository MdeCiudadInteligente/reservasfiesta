<?php
/**
 * SpecificConditionWorkshopFixture
 *
 */
class SpecificConditionWorkshopFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'specific_condition_workshop';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'workshop_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'specific_condition_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'indexes' => array(
			'workshop_id' => array('column' => 'workshop_id', 'unique' => 0),
			'workshop_id_2' => array('column' => 'workshop_id', 'unique' => 0),
			'workshop_id_3' => array('column' => 'workshop_id', 'unique' => 0),
			'workshop_id_4' => array('column' => 'workshop_id', 'unique' => 0),
			'specific_condition_id' => array('column' => 'specific_condition_id', 'unique' => 0)
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
			'workshop_id' => 1,
			'specific_condition_id' => 1
		),
	);

}
