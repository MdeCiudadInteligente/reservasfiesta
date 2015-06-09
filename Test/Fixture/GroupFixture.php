<?php
/**
 * GroupFixture
 *
 */
class GroupFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id_group' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 256, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'members_number' => array('type' => 'integer', 'null' => false, 'default' => null),
		'public_type_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'specific_condition_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'responsible_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id_group', 'unique' => 1)
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
			'id_group' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'members_number' => 1,
			'public_type_id' => 1,
			'specific_condition_id' => 1,
			'responsible_id' => 1
		),
	);

}
