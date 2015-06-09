<?php
App::uses('AppController', 'Controller');
/**
 * MeeTypes Controller
 *
 * @property MeeType $MeeType
 * @property PaginatorComponent $Paginator
 */
class EducationInstTypesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	
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
		$this->Auth->allow('add','index','edit','delete','view');
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->EducationInstType->recursive = 0;
		$this->set('educationinsttype', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->EducationInstType->exists($id)) {
			throw new NotFoundException(__('Invalid EducationInstType'));
		}
		$options = array('conditions' => array('EducationInstType.' . $this->EducationInstType->primaryKey => $id));
		$this->set('educationinsttype', $this->EducationInstType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->EducationInstType->create();
			if ($this->EducationInstType->save($this->request->data)) {
				$this->Session->setFlash(__('The EducationInstType has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The EducationInstType could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->EducationInstType->exists($id)) {
			throw new NotFoundException(__('Invalid EducationInstType'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->EducationInstType->save($this->request->data)) {
				$this->Session->setFlash(__('The EducationInstType has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The EducationInstType could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('EducationInstType.' . $this->EducationInstType->primaryKey => $id));
			$this->request->data = $this->EducationInstType->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->EducationInstType->id = $id;
		if (!$this->EducationInstType->exists()) {
			throw new NotFoundException(__('Invalid EducationInstType'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->EducationInstType->delete()) {
			$this->Session->setFlash(__('The EducationInstType has been deleted.'));
		} else {
			$this->Session->setFlash(__('The EducationInstType could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
