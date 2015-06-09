<?php
App::uses('SpecificConditionWorkshop', 'Model');

/**
 * SpecificConditionWorkshop Test Case
 *
 */
class SpecificConditionWorkshopTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.specific_condition_workshop',
		'app.workshop',
		'app.entity',
		'app.public_type',
		'app.public_type_workshop',
		'app.specific_condition'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SpecificConditionWorkshop = ClassRegistry::init('SpecificConditionWorkshop');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SpecificConditionWorkshop);

		parent::tearDown();
	}

}
