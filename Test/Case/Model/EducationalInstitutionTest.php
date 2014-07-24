<?php
App::uses('EducationalInstitution', 'Model');

/**
 * EducationalInstitution Test Case
 *
 */
class EducationalInstitutionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.educational_institution',
		'app.institution',
		'app.responsible'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EducationalInstitution = ClassRegistry::init('EducationalInstitution');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EducationalInstitution);

		parent::tearDown();
	}

}
