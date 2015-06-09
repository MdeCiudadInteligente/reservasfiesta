<?php
App::uses('GroupSpecificCondition', 'Model');

/**
 * GroupSpecificCondition Test Case
 *
 */
class GroupSpecificConditionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.group_specific_condition'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->GroupSpecificCondition = ClassRegistry::init('GroupSpecificCondition');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->GroupSpecificCondition);

		parent::tearDown();
	}

}
