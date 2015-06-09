<?php
App::uses('WorkshopSpecific', 'Model');

/**
 * WorkshopSpecific Test Case
 *
 */
class WorkshopSpecificTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.workshop_specific',
		'app.workshop',
		'app.entity',
		'app.specific_condition'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->WorkshopSpecific = ClassRegistry::init('WorkshopSpecific');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->WorkshopSpecific);

		parent::tearDown();
	}

}
