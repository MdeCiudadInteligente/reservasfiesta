<?php
App::uses('AppModel', 'Model');
/**
 * SpecificCondition Model
 *
 * @property Institution $Institution
 * @property Workshop $Workshop
 */
class SpecificCondition extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'specific_condition';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'id_specific_condition';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'id_specific_condition' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'name' => array(
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
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Workshop' => array(
			'className' => 'Workshop',
			'joinTable' => 'specific_condition_workshop',
			'foreignKey' => 'specific_condition_id',
			'associationForeignKey' => 'workshop_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

}
