<?php
App::uses('Workshop', 'Model');

/**
 * Workshop Test Case
 *
 */
class WorkshopTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.workshop',
		'app.entity'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Workshop = ClassRegistry::init('Workshop');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Workshop);

		parent::tearDown();
	}

}
