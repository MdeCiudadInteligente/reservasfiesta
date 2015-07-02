<?php
App::uses('InstitutionUser', 'Model');

/**
 * InstitutionUser Test Case
 *
 */
class InstitutionUserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.institution_user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->InstitutionUser = ClassRegistry::init('InstitutionUser');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->InstitutionUser);

		parent::tearDown();
	}

}
