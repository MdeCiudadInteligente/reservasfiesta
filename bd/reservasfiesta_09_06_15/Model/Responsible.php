<?php
App::uses('AppModel', 'Model');
/**
 * Responsible Model
 *
 * @property EducationalInstitution $EducationalInstitution
 */
class Responsible extends AppModel {
	//Aqui inicia funciones del modelo de usuario...
	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
			$passwordHasher = new SimplePasswordHasher();
			$this->data[$this->alias]['password'] = $passwordHasher->hash(
					$this->data[$this->alias]['password']
			);
		}
		return true;
	}
	
	//Aqui termina...

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'responsible';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'id_responsible';

	
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
		'identity' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
			),
		),
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
			),
		),
		'celular' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
			),
		),
		'mail' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
			),
			'email' => array(
				'rule' => array('email'),
			),
		),
		'institution_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
			),
		),
		//Aqui incian las validaciones de usuario...
		'username' => array(
				'notEmpty' => array(
						'rule' => array('notEmpty'),
					),
		),
		'password' => array(
				'notEmpty' => array(
							'rule' => array('notEmpty'),
					),
		),
		'permission_level' => array(
					'notEmpty' => array(
							'rule' => array('notEmpty'),
					),
		),
		//Aqui terminan...			
			
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 *//*
	public $belongsTo = array(
		'Institution' => array(
			'className' => 'Institution',
			'foreignKey' => 'institution_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);*/
	
	public $hasAndBelongsToMany = array(
			'Responsible' => array(
					'className' => 'Responsible',
					'joinTable' => 'institution_responsible',
					'foreignKey' => 'responsible_id',
					'associationForeignKey' => 'institution_id',
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
