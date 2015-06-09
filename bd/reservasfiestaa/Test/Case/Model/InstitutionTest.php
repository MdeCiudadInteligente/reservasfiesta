<?php
App::uses('Institution', 'Model');

/**
 * Institution Test Case
 *
 */
class InstitutionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.institution',
		'app.public_type',
		'app.workshop',
		'app.entity',
		'app.public_type_workshop',
		'app.specific_condition',
		'app.specific_condition_workshop',
		'app.workshop_session',
		'app.user',
		'app.institution_specific_condition'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Institution = ClassRegistry::init('Institution');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Institution);

		parent::tearDown();
	}

}
