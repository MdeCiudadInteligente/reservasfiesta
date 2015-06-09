<?php
/**
 * EducationalInstitutionFixture
 *
 */
class EducationalInstitutionFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'educational_institution';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'code' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'key' => 'primary', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'type' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'grade' => array('type' => 'integer', 'null' => false, 'default' => null),
		'institution_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'code', 'unique' => 1),
			'institution_id' => array('column' => 'institution_id', 'unique' => 0)
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
			'code' => 'Lorem ipsum dolor sit amet',
			'type' => 'Lorem ipsum dolor sit amet',
			'grade' => 1,
			'institution_id' => 1
		),
	);

}
