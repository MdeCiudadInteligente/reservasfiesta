<?php
App::uses('PublicTypeWorkshop', 'Model');

/**
 * PublicTypeWorkshop Test Case
 *
 */
class PublicTypeWorkshopTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.public_type_workshop',
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
		$this->PublicTypeWorkshop = ClassRegistry::init('PublicTypeWorkshop');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PublicTypeWorkshop);

		parent::tearDown();
	}

}
