<?php
App::uses('AppModel', 'Model');
/**
 * WorkshopPublic Model
 *
 * @property Workshop $Workshop
 * @property PublicType $PublicType
 */
class WorkshopPublic extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'workshop_public';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'id_workshop_public';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id_workshop_public';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'id_workshop_public' => array(
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
		'public_type_id' => array(
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
		'PublicType' => array(
			'className' => 'PublicType',
			'foreignKey' => 'public_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
