<?php
App::uses('AppModel', 'Model');
/**
 * WorkshopSpecific Model
 *
 * @property Workshop $Workshop
 * @property SpecificCondition $SpecificCondition
 */
class WorkshopSpecific extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'workshop_specific';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'id_workshop_specific';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id_workshop_specific';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'id_workshop_specific' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'workshop_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'specific_condition_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Workshop' => array(
			'className' => 'Workshop',
			'foreignKey' => 'workshop_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'SpecificCondition' => array(
			'className' => 'SpecificCondition',
			'foreignKey' => 'specific_condition_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
