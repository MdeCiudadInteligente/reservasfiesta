<?php
App::uses('AppController', 'Controller');
/**
 * EducationalInstitutions Controller
 *
 * @property EducationalInstitution $EducationalInstitution
 * @property PaginatorComponent $Paginator
 */
class EducationalInstitutionsController extends AppController {

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
	public function beforeFilter() {
		//parent::beforeFilter();
		// Allow users to register and logout.
		$this->Auth->allow('adduser');
	
	}
	
	public function isAuthorized($user) {
		// Any registered user can access public functions
	
	
		if ((isset($user['permission_level']) && $user['permission_level'] === '2')||(isset($user['permission_level']) && $user['permission_level'] === '1')) {
			return true;
		}
			
	
		// Default deny
		//return false;
			
	}
	
	public function index($institution=null) {
		$usuario_level= $this->Session->read('Auth.User.permission_level');
		if($usuario_level=='2'){
			return $this->redirect(array('controller' => 'users', 'action' => 'login'));
		}
		$this->set('institution',$institution);
		
		$this->EducationalInstitution->recursive = 0;
		$this->set('educationalInstitutions', $this->Paginator->paginate());
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
		if (!$this->EducationalInstitution->exists($id)) {
			throw new NotFoundException(__('Invalid educational institution'));
		}
		$options = array('conditions' => array('EducationalInstitution.' . $this->EducationalInstitution->primaryKey => $id));
		$this->set('educationalInstitution', $this->EducationalInstitution->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function adduser($institution = null,$institutionid= null) {
		$this->set('institution',$institution);
		$this->set('institutionid',$institutionid);
		//$institution='hola';
		//debug($institution);
		//$institution=$this->request->data['EducationalInstitutions']['institution_id'];
		
		//print_r($this->request->data);
		
		
		if ($this->request->is('post')) {
			$this->EducationalInstitution->create();
			if ($this->EducationalInstitution->save($this->request->data)) {
				$this->Session->setFlash(__('The educational institution has been saved.'));
				//$institution=$this->Session->read('institution_id');				
				
			
				//$institution= $this->request->data['EducationalInstitution']['institution_id'];
				//$institution=$this->request->data['EducationalInstitutions']['institution_id'];
				//$institution='hello';
				//return $this->redirect(array('action' => 'index',$institution));
				//return $this->redirect(array('action' => 'index'));}
				//$educationalcode=$this->request->data['EducationalInstitution']['code'];
				return $this->redirect(array('controller' => 'responsibles', 'action' => 'adduser',$institution,$institutionid));
				
			} else {
				$this->Session->setFlash(__('The educational institution could not be saved. Please, try again.'));
			}
		}
		$institutions = $this->EducationalInstitution->Institution->find('list');
		$this->set(compact('institutions'));
	}
	
	public function add() {
		$usuario_level= $this->Session->read('Auth.User.permission_level');
		if($usuario_level=='2'){
			return $this->redirect(array('controller' => 'users', 'action' => 'login'));
		}
		if ($this->request->is('post')) {
			$this->EducationalInstitution->create();
			if ($this->EducationalInstitution->save($this->request->data)) {
				$this->Session->setFlash(__('The educational institution has been saved.'));
				return $this->redirect(array('action' => 'index'));
	
			} else {
				$this->Session->setFlash(__('The educational institution could not be saved. Please, try again.'));
			}
		}
		$institutions = $this->EducationalInstitution->Institution->find('list', array('order'=>array('Institution.name ASC')));
		$this->set(compact('institutions'));
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
		if($usuario_level=='2'){
			return $this->redirect(array('controller' => 'users', 'action' => 'login'));
		}
		if (!$this->EducationalInstitution->exists($id)) {
			throw new NotFoundException(__('Invalid educational institution'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->EducationalInstitution->save($this->request->data)) {
				$this->Session->setFlash(__('The educational institution has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The educational institution could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('EducationalInstitution.' . $this->EducationalInstitution->primaryKey => $id));
			$this->request->data = $this->EducationalInstitution->find('first', $options);
		}
		$institutions = $this->EducationalInstitution->Institution->find('list');
		$this->set(compact('institutions'));
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
		$this->EducationalInstitution->id = $id;
		if (!$this->EducationalInstitution->exists()) {
			throw new NotFoundException(__('Invalid educational institution'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->EducationalInstitution->delete()) {
			$this->Session->setFlash(__('The educational institution has been deleted.'));
		} else {
			$this->Session->setFlash(__('The educational institution could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
