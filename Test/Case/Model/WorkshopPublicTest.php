<?php
App::uses('WorkshopPublic', 'Model');

/**
 * WorkshopPublic Test Case
 *
 */
class WorkshopPublicTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.workshop_public',
		'app.workshop',
		'app.entity',
		'app.public_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->WorkshopPublic = ClassRegistry::init('WorkshopPublic');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->WorkshopPublic);

		parent::tearDown();
	}

}
