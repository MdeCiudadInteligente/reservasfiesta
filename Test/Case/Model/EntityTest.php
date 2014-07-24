<?php
App::uses('Entity', 'Model');

/**
 * Entity Test Case
 *
 */
class EntityTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.entity',
		'app.workshop'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Entity = ClassRegistry::init('Entity');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Entity);

		parent::tearDown();
	}

}
