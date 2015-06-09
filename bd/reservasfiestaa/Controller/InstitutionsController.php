<?php
App::uses('AppController', 'Controller');
/**
 * Institutions Controller
 *
 * @property Institution $Institution
 * @property PaginatorComponent $Paginator
 */
class InstitutionsController extends AppController {
	
	var $uses = array('Workshop','User','Institution','WorkshopSession','Responsible','EducationalInstitution','InstitutionSpecificCondition','SpecificCondition');
	var $helpers = array('Html','Form','Csv','Js');

	
	public function getbycity() {
		$ciudad = $this->request->data['Institution']['city'];
		$this->set('ciudad',$ciudad);
		$this->layout = 'ajax';
	}
	
	
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function isAuthorized($user) {
		// Any registered user can access public functions
	
	
		if ((isset($user['permission_level']) && $user['permission_level'] === '2')||(isset($user['permission_level']) && $user['permission_level'] === '1')) {
			return true;
		}
			
	
		// Default deny
		//return false;
			
	}
	
	public function beforeFilter() {
		//parent::beforeFilter();
		// Allow users to register and logout.
		$this->Auth->allow('add','getbycity');
	}
	
	public function index() {
		$usuario_level= $this->Session->read('Auth.User.permission_level');
		if($usuario_level=='2'){
			return $this->redirect(array('controller' => 'users', 'action' => 'login'));
		}
		
		$this->Institution->recursive = 0;
		$this->set('institutions', $this->Paginator->paginate('Institution'));
		if ($this->request->is('post')) {
			return $this->redirect(array('action' => 'download'));
		}
	}

	
	public function download()
	{
		$this->Institution->recursive = 0;
		$this->set('institutions', $this->Institution->find('all'));
		$this->set('workshopSessions',$this->WorkshopSession->find('all'));
		$this->set('responsibles',$this->Responsible->find('all'));
		$this->set('educationalInstitutions',$this->EducationalInstitution->find('all'));
		$this->set('institutionspecificConditions',$this->InstitutionSpecificCondition->find('all'));
		$this->set('specificConditions',$this->SpecificCondition->find('all'));
		$this->layout = null;
		//$this->autoLayout = false;
		//Configure::write('debug', '0');
	}
	
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
		$this->WorkshopSession->recursive = 0;
		$this->set('WorkshopSession', $this->Paginator->paginate());
		//$groups = $this->Workshop->WorkshopSession->Institution->find('all', array('conditions'=>array('WorkshopSession.workshop_id'=>$id)));
		$session = $this->WorkshopSession->find('all',array('conditions'=>array('Institution.id_institution'=>$id)));
		$this->set('session',$session);
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
				$institution= $this->request->data['Institution']['name'];
				$institutionid = $this->Institution->id;
				//$institutionid= $this->request->data['Institution']['id_institution'];
				$institutiontype= $this->request->data['Institution']['institution_type'];
				
				if($institutiontype=='Grupo')
				{
					return $this->redirect(array('controller' => 'responsibles', 'action' => 'adduser',$institution,$institutionid));
				
				}
				else{
					return $this->redirect(array('controller' => 'EducationalInstitutions', 'action' => 'adduser',$institution,$institutionid));
				}
			} else {
				$this->Session->setFlash(__('The institution could not be saved. Please, try again.'));
			}
		}
		$publicTypes = $this->Institution->PublicType->find('list');
		//$workshopSessions = $this->Institution->WorkshopSession->find('list');
		$specificConditions = $this->Institution->SpecificCondition->find('list');
		//$this->set(compact('publicTypes', 'workshopSessions', 'specificConditions'));
		$this->set(compact('publicTypes', 'specificConditions'));
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
		$publicTypes = $this->Institution->PublicType->find('list');
		//$workshopSessions = $this->Institution->WorkshopSession->find('list');
		$specificConditions = $this->Institution->SpecificCondition->find('list');
		//$this->set(compact('publicTypes', 'workshopSessions', 'specificConditions'));
		$this->set(compact('publicTypes', 'specificConditions'));
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
	}}
