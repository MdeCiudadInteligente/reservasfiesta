<?php
App::uses('Responsible', 'Model');

/**
 * Responsible Test Case
 *
 */
class ResponsibleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.responsible'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Responsible = ClassRegistry::init('Responsible');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Responsible);

		parent::tearDown();
	}

}
