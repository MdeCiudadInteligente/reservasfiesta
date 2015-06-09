<?php
App::uses('AppModel', 'Model');
/**
 * PublicTypeWorkshop Model
 *
 * @property Workshop $Workshop
 * @property PublicType $PublicType
 */
class PublicTypeWorkshop extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'public_type_workshop';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'public_type_id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
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
