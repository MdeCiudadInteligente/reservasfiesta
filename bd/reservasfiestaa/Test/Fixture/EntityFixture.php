<?php
/**
 * EntityFixture
 *
 */
class EntityFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'entity';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id_entity' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id_entity', 'unique' => 1)
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
			'id_entity' => 1,
			'name' => 'Lorem ipsum dolor sit amet'
		),
	);

}
