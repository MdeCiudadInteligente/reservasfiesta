<?php
/**
 * GroupSpecificConditionFixture
 *
 */
class GroupSpecificConditionFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'group_specific_condition';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'group_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'specific_condition_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'indexes' => array(
			'institution_id' => array('column' => array('group_id', 'specific_condition_id'), 'unique' => 0),
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
			'group_id' => 1,
			'specific_condition_id' => 1
		),
	);

}
