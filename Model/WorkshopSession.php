<?php
App::uses('AppModel', 'Model');
/**
 * WorkshopSession Model
 *
 * @property Institution $Institution
 * @property Workshop $Workshop
 */
class WorkshopSession extends AppModel {
	
	var $uses = array('workshop_day','workshop_time');
	
	var $actsAs = array(
				
			'MeioUpload.MeioUpload' => array('seleccionar_archivo')
	);

	
	
	function import($filename) {
		// to avoid having to tweak the contents of
		// $data you should use your db field name as the heading name
		// eg: Post.id, Post.title, Post.description
	
		// set the filename to read CSV from
		//$filename = 'file\\uploads\\'.$filename;
		
		$filename = 'C:/xampp/htdocs/fiestadellibro/webroot/file/uploads/workshop_session/'.$filename;
		//$filename = 'file' . DS . 'uploads' . DS . 'workshopsession' . DS .$filename;
		//debug($filename);
		// open the file
		$handle = fopen($filename, "r");
			
		// read the 1st row as headings
		$header = fgetcsv($handle);
	
		// create a message container
		$return = array(
				'messages' => array(),
				'errors' => array(),
		);
	
		//yoddi
		$i=0;
		$error = null;
		// read each data row in the file
		while (($row = fgetcsv($handle)) !== FALSE) {
			$i++;
			$data = array();
		
			// for each header field
			foreach ($header as $k=>$head) {
				// get the data field from Model.field
				if (strpos($head,'.')!==false) {
					$h = explode('.',$head);
					$data[$h[0]][$h[1]]=(isset($row[$k])) ? $row[$k] : '';
				}
				// get the data field from field
				else {
					$data['WorkshopSession'][$head]=(isset($row[$k])) ? $row[$k] : '';
				}
				//debug($head);
				//debug($k);
			
	
			}
			
			// see if we have an id
			$id = isset($data['WorkshopSession']['id_workshop_session']) ? $data['WorkshopSession']['id_workshop_session'] : 0;
	
			// we have an id, so we update
			if ($id) {
				// there is 2 options here,
	
				// option 1:
				// load the current row, and merge it with the new data
				//$this->recursive = -1;
				//$post = $this->read(null,$id);
				//$data['Post'] = array_merge($post['Post'],$data['Post']);
					
				// option 2:
				// set the model id
				$this->id_workshop_session = $id;
			}
	
			// or create a new record
			else {
				$this->create();
			}
	
			// see what we have
			//debug($data);
			//Verificar que la actual fila, es decir, la reserva actual no exista ya en base de datos.
			$data2=$this->validarFila($data);
			// validate the row
			$this->set($data2);
			if (!$this->validates()) {
				//$this->_flash('warning');
				$return['errors'][] = __(sprintf('La fila %d no se pudo validar. Verifique el archivo de datos.',$i), true);
			}					
				
			// save the row
			if ($data2!=null){
				if (!$error && !$this->save($data2)) {
					$return['errors'][] = __(sprintf('La fila %d no se pudo guardar.',$i), true);
				}
			}			
						
			// success message!
			if ($data2!=null){
			if (!$error) {
				$return['messages'][] = __(sprintf('Fila %d fue guardada.',$i), true);
			}
			}
			else{
				$return['errors'][] = __(sprintf('La fila %d ya existe en la base de datos.',$i), true);
			}
		}
			
		// close the file
		fclose($handle);
			
		// return the messages
		return $return;
			
	}
	
	function validarFila($data){
		
		$this->set('data',$data);
		//debug($data);
		$dia=$data['WorkshopSession']['workshop_day'];
		$horacarpa=$data['WorkshopSession']['workshop_time'];
		$horarecorrido=$data['WorkshopSession']['travel_time'];
		$carpa=$data['WorkshopSession']['workshop_id'];
		/*debug('FECHA');
		debug($dia);
		debug('HORA CARPA');		
		debug($horacarpa);
		debug('HORA RECORRIDO');
		debug($horarecorrido);
		debug('CARPA');
		debug($carpa);*/
		
		//$consulta="select * from workshop_session where workshop_day = '2014-03-30' and workshop_time = '12:00:00' and travel_time = '02:00:00' and workshop_id = '1'";
		//$consulta="select * from workshop_session where workshop_day = '$dia' and workshop_time = '$horacarpa' and travel_time = '$horarecorrido' and workshop_id = '$carpa'";
		
		$consulta2=$this->find('all',array('conditions'=>array('workshop_day'=>$dia,'workshop_time'=>$horacarpa,'travel_time'=>$horarecorrido,'workshop_id'=>$carpa)));
		//$consulta='2';
		//$consulta2=$this->Workshop->query($consulta);
		$this->set('consulta2',$consulta2);
		//debug($consulta2);
	
		if ($consulta2 == Array( ))
		{			
			return $data;				
		}
		else 
		{
			return null;
		}	
		
	}
	
	
/**debug($data);
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'workshop_session';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'id_workshop_session';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id_workshop_session';
	

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'id_workshop_session' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'workshop_day' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'workshop_time' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'travel_time' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		/*'state' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),*/
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
		'institution_id' => array(
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
 * hasOne associations
 *
 * @var array
 */


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
			'Institution' => array(
					'className' => 'Institution',
					'foreignKey' => 'institution_id',
					'conditions' => '',
					'fields' => '',
					'order' => ''
			)
	);
}
