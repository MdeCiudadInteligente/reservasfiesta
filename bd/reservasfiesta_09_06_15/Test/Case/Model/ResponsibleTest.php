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
		'app.responsible',
		'app.educational_institution',
		'app.institution',
		'app.workshop_session',
		'app.user'
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
