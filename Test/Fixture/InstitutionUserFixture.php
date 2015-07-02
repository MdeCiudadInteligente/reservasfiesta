<?php
/**
 * InstitutionUserFixture
 *
 */
class InstitutionUserFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'institution_user';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'institution_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'indexes' => array(
			'institution_id_2' => array('column' => array('institution_id', 'user_id'), 'unique' => 1),
			'institution_id' => array('column' => 'institution_id', 'unique' => 0),
			'responsible_id' => array('column' => 'user_id', 'unique' => 0)
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
			'institution_id' => 1,
			'user_id' => 1
		),
	);

}
