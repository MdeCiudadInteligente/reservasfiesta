<?php
App::uses('PublicType', 'Model');

/**
 * PublicType Test Case
 *
 */
class PublicTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.public_type',
		'app.workshop',
		'app.entity',
		'app.public_type_workshop',
		'app.specific_condition',
		'app.specific_condition_workshop'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PublicType = ClassRegistry::init('PublicType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PublicType);

		parent::tearDown();
	}

}
