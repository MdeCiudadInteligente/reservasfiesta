<?php
App::uses('AppController', 'Controller');
/**
 * Institutions Controller
 *
 * @property Institution $Institution
 * @property PaginatorComponent $Paginator
 */
class InstitutionsController extends AppController {
	
var $uses = array('Workshop','User','Institution','WorkshopSession','GroupSpecificCondition','SpecificCondition');
	var $helpers = array('Html','Form','Csv','Js');

	
	public function getbycity() {
		$ciudad = $this->request->data['Institution']['city'];
		$this->set('ciudad',$ciudad);
		$this->layout = 'ajax';		
	}
	
	public function getbytype() {
		$type = $this->request->data['Institution']['inst_type'];
		$this->set('type',$type);
		$this->layout = 'ajax';
	}
	
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','RequestHandler');

/**
 * index method
 *
 * @return void
 */
	public function isAuthorized($user) {
		// Any registered user can access public functions
	
	
		if ((isset($user['permission_level']) && $user['permission_level'] == '2')||(isset($user['permission_level']) && $user['permission_level'] == '1')) {
			return true;
		}
			
	
		// Default deny
		//return false;
			
  }
	
	public function beforeFilter() {
		//parent::beforeFilter();
		// Allow users to register and logout.
		$this->Auth->allow('add','getbycity','findinstitution','getbytype','find_code','find_username','getInstitution','addresp');
	}
	
	public function findinstitution($institutioname=null,$institutionid= null){
		
		$this->set('institutioname',$institutioname);
		$this->set('institutionid',$institutionid);
		if ($this->request->is('post')) {
			$this->Institution->create();
			$data=$this->request->data;
				if ($this->User->save($data)) 
				{
				
					$this->Session->setFlash(__('El responsable ha sido guardado.'));
					$id_user = $this->User->id;
					//return $this->redirect(array('action' => 'index'));
					//return $this->redirect(array('controller' => 'users', 'action' => 'adduser',$institution,$institutionid));
					return $this->redirect(array('controller' => 'Users', 'action' => 'login'));
				} 
				else 
				{
					$this->Session->setFlash(__('El responsable no pudó ser guardado. Por favor, inténtelo de nuevo.'));
				}
					
		}
		//$institutions = $this->Responsible->Institution->find('list',array('order'=>array('Institution.name ASC')));
		$institutions = $this->Institution->find('list',array('order'=>array('Institution.name ASC')));
		$this->set(compact('institutions'));
	
	}
	

	public function find_code()
	{
		$this->request->onlyAllow('ajax'); // No direct access via browser URL - Note for Cake2.5: allowMethod()
		
		$code_educ = $this->request->data['string'];
		$data=$this->request->data;
		$data['debug']['POST']=$code_educ;
		$data['debug']['POSTCOMPLETE']=$this->request->data;
		$verificar_code=$this->Institution->query("select distinct code_education from institution where code_education = '$code_educ'");
		//$this->set('verificar_code',$verificar_code);
		$this->set("message", "You are good");
		if(!$verificar_code == array())
		{
				$data['existe']=true;
				$data['response']='<div style="color:#FF0000">El código ya existe intente con uno nuevo ó regrese a la página anterior.</div>';
			
		}		
		else{
			$data['existe']=false;
			$data['response']='<div style="color:#088A29">El código esta disponible, por favor continué.</div>';
		}	
		
		$this->set(compact('data'));
		$this->set('_serialize', array('data')); // Let the JsonView class know what variable to use
	}
	
	public function find_username()
	{
		$this->request->onlyAllow('ajax'); // No direct access via browser URL - Note for Cake2.5: allowMethod()
	
		$nameuser = $this->request->data['string'];
		$data=$this->request->data;
		$data['debug']['POST']=$nameuser;
		$data['debug']['POSTCOMPLETE']=$this->request->data;
		$verificar_username=$this->User->query("select distinct username from user where username = '$nameuser'");
		//$this->set('verificar_code',$verificar_code);
		$this->set("message", "You are good");
		if(!$verificar_username == array())
		{
			$message=mb_convert_encoding('El nombre de usuario ya existe intente con uno nuevo ó regrese a la página anterior.', "UTF-8", "Windows-1252");
			$data['existe']=true;
			$data['response']='<div style="color:#FF0000">'.$message.'</div>';
	
		}
		else{
			$message=mb_convert_encoding('El nombre de usuario esta disponible, por favor continué.', "UTF-8", "Windows-1252");
			$data['existe']=false;
			$data['response']='<div style="color:#088A29">'.$message.'</div>';
		}
		$this->set(compact('data'));
		$this->set('_serialize', array('data')); // Let the JsonView class know what variable to use
	}
	
	public function index() {
		$usuario_level= $this->Session->read('Auth.User.permission_level');
		if($usuario_level=='2'){
			return $this->redirect(array('controller' => 'users', 'action' => 'login'));
		}
		
		$this->Institution->recursive = 0;
		$this->set('institutions', $this->Paginator->paginate('Institution'));
		if ($this->request->is('post')) {
			return $this->redirect(array('controller' => 'Groups','action' => 'download'));
		}
	}

	
	/*public function download()
	{
		$this->Institution->recursive = 0;
		$this->set('institutions', $this->Institution->find('all'));
		$this->set('workshopSessions',$this->WorkshopSession->find('all'));
		$this->set('users',$this->User->find('all'));
		$this->set('groups',$this->Group->find('all'));
		//$this->set('institutionspecificConditions',$this->InstitutionSpecificCondition->find('all'));
		$this->set('specificConditions',$this->SpecificCondition->find('all'));
		$this->layout = null;
		//$this->autoLayout = false;
		//Configure::write('debug', '0');
	}*/
	
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$usuario_level= $this->Session->read('Auth.User.permission_level');
		if($usuario_level=='2'){
			return $this->redirect(array('controller' => 'users', 'action' => 'login'));
		}
		if (!$this->Institution->exists($id)) {
			throw new NotFoundException(__('Invalid institution'));
		}
		$options = array('conditions' => array('Institution.' . $this->Institution->primaryKey => $id));
		$this->set('institution', $this->Institution->find('first', $options));
		
		//Visualizar la sesiòn de la carpa en la que està inscrito el grupo cuando la da clic a ver grupo.
		//$this->WorkshopSession->recursive = 0;
		//$this->set('WorkshopSession', $this->Paginator->paginate());
		//$groups = $this->Workshop->WorkshopSession->Institution->find('all', array('conditions'=>array('WorkshopSession.workshop_id'=>$id)));
		//$session = $this->WorkshopSession->find('all',array('conditions'=>array('Institution.id_institution'=>$id)));
		//$this->set('session',$session);
	}
	
/**
 * add method
 *
 * @return void
 */
public function add() {
		if ($this->request->is('post')) {
			
			if ($this->request->data['Institution']['city']=="Otras")
				$this->request->data['Institution']['city']=$this->request->data['Institution']['city2'];
			$this->Institution->create();
			if ($this->Institution->save($this->request->data)) {
				$this->Session->setFlash(__('The institution has been saved.'));
				
				$institutioname= $this->request->data['Institution']['name'];
				//$institutionid = $this->Institution->id;
				//$institutionid= $this->request->data['Institution']['id_institution'];				
				//$institutiontype= $this->request->data['Institution']['institution_type'];
				
				//return $this->redirect(array('action' => 'findinstitution'/*,$institutioname,$institutionid*/));
				
				return $this->redirect(array('controller'=>'Users','action' => 'addresp'));
				
			} else {
				$this->Session->setFlash(__('The institution could not be saved. Please, try again.'));
			}
		}
		//$publicTypes = $this->Institution->PublicType->find('list');
		//$workshopSessions = $this->Institution->WorkshopSession->find('list');
		//$specificConditions = $this->Institution->SpecificCondition->find('list');
		//$this->set(compact('publicTypes', 'workshopSessions', 'specificConditions'));
		//$this->set(compact('publicTypes', 'specificConditions'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$usuario_level= $this->Session->read('Auth.User.permission_level');
		/*if($usuario_level=='2'){
			return $this->redirect(array('controller' => 'users', 'action' => 'login'));
		}*/
		if (!$this->Institution->exists($id)) {
			throw new NotFoundException(__('Invalid institution'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Institution->save($this->request->data)) {
				$this->Session->setFlash(__('The institution has been saved.'));
				if($usuario_level=='1')
				{
					return $this->redirect(array('action' => 'index'));
				}
				else if($usuario_level=='2')
				{
					return $this->redirect(array('controller'=>'workshops','action' => 'index_inscription'));
				}
			} else {
				$this->Session->setFlash(__('The institution could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Institution.' . $this->Institution->primaryKey => $id));
			$this->request->data = $this->Institution->find('first', $options);
		}
		//$publicTypes = $this->Institution->PublicType->find('list');
		//$workshopSessions = $this->Institution->WorkshopSession->find('list');
		//$specificConditions = $this->Institution->SpecificCondition->find('list');
		//$this->set(compact('publicTypes', 'workshopSessions', 'specificConditions'));
		//$this->set(compact('publicTypes', 'specificConditions'));
		/*
		$workshops = $this->Institution->Workshop->find('list');
		$this->set(compact('workshops'));*/
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$usuario_level= $this->Session->read('Auth.User.permission_level');
		if($usuario_level=='2'){
			return $this->redirect(array('controller' => 'users', 'action' => 'login'));
		}
		$this->Institution->id = $id;
		if (!$this->Institution->exists()) {
			throw new NotFoundException(__('Invalid institution'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Institution->delete()) {
			$this->Session->setFlash(__('The institution has been deleted.'));
			//actulización session de la carpa cuando se elimina un grupo o institución.
			$queryupdate="update workshop_session SET institution_id = '0' where workshop_session.institution_id = '$id'";
			$tallerupdate=$this->Workshop->query($queryupdate);
			$this->set(compact('tallerupdate'));
			//fin de actualización.
			
			
		} else {
			$this->Session->setFlash(__('The institution could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	//servicio autocompleted...
	public function getInstitution() {
		$this->request->onlyAllow('ajax'); // No direct access via browser URL - Note for Cake2.5: allowMethod()
		$queryString=$_GET['q'];
		$condition=array('OR' => array(
				array('Institution.code_education LIKE' => '%'.$queryString.'%'),
				array('Institution.name LIKE' => '%'.$queryString.'%')
		));
	
		$institution=$this->Institution->find('list',array('fields'=>array('Institution.id_institution','Institution.name','Institution.code_education'),'order' => array('Institution.name' => 'ASC'),'conditions' => $condition));
	
		foreach ($institution as $cod => $dataInstitution) {
			$json_data = array();
			$json_data['code_education']=$cod;
			$array_keys=array_keys($dataInstitution);
			$json_data['id_institution']=$array_keys[0];
			$json_data['name']=$dataInstitution[$array_keys[0]];
			$data[]=$json_data;
		}
	
		$this->set(compact('data')); // Pass $data to the view
		$this->set('_serialize', 'data'); // Let the JsonView class know what variable to use
	
	}


}
