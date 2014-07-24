<?php
App::uses('SpecificCondition', 'Model');

/**
 * SpecificCondition Test Case
 *
 */
class SpecificConditionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.specific_condition',
		'app.workshop',
		'app.entity',
		'app.public_type',
		'app.public_type_workshop',
		'app.specific_condition_workshop'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SpecificCondition = ClassRegistry::init('SpecificCondition');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SpecificCondition);

		parent::tearDown();
	}

}
