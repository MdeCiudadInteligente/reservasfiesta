<?php
/**
 * InstitutionSpecificConditionFixture
 *
 */
class InstitutionSpecificConditionFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'institution_specific_condition';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'institution_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'specific_condition_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'indexes' => array(
			'institution_id' => array('column' => array('institution_id', 'specific_condition_id'), 'unique' => 0),
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
			'institution_id' => 1,
			'specific_condition_id' => 1
		),
	);

}
