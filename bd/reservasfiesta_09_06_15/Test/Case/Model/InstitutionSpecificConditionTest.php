<?php
App::uses('InstitutionSpecificCondition', 'Model');

/**
 * InstitutionSpecificCondition Test Case
 *
 */
class InstitutionSpecificConditionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.institution_specific_condition',
		'app.institution',
		'app.public_type',
		'app.workshop',
		'app.entity',
		'app.public_type_workshop',
		'app.specific_condition',
		'app.specific_condition_workshop',
		'app.workshop_session',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->InstitutionSpecificCondition = ClassRegistry::init('InstitutionSpecificCondition');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->InstitutionSpecificCondition);

		parent::tearDown();
	}

}
