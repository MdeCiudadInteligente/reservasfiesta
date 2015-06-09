<?php
App::uses('AppModel', 'Model');
/**
 * Responsible Model
 *
 * @property EducationalInstitution $EducationalInstitution
 */
class Register extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'register';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'id_register';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id_register';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'id_register' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	
}
