<?php
App::uses('WorkshopSession', 'Model');

/**
 * WorkshopSession Test Case
 *
 */
class WorkshopSessionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.workshop_session',
		'app.workshop',
		'app.entity',
		'app.public_type',
		'app.public_type_workshop',
		'app.specific_condition',
		'app.specific_condition_workshop',
		'app.institution',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->WorkshopSession = ClassRegistry::init('WorkshopSession');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->WorkshopSession);

		parent::tearDown();
	}

}
