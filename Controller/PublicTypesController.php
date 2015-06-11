<?php
App::uses('AppController', 'Controller');
/**
 * PublicTypes Controller
 *
 * @property PublicType $PublicType
 * @property PaginatorComponent $Paginator
 */
class PublicTypesController extends AppController {

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
 */	public function isAuthorized($user) {
		// Any registered user can access public functions
	
	
		if ((isset($user['permission_level']) && $user['permission_level'] == '1')) {
			return true;
		}
			
	
		// Default deny
		//return false;
			
	}
	
	public function index() {
		$this->PublicType->recursive = 0;
		$this->set('publicTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PublicType->exists($id)) {
			throw new NotFoundException(__('Invalid public type'));
		}
		$options = array('conditions' => array('PublicType.' . $this->PublicType->primaryKey => $id));
		$this->set('publicType', $this->PublicType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PublicType->create();
			if ($this->PublicType->save($this->request->data)) {
				$this->Session->setFlash(__('The public type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The public type could not be saved. Please, try again.'));
			}
		}
		$workshops = $this->PublicType->Workshop->find('list', array('order'=>array('Workshop.name ASC')));
		$this->set(compact('workshops'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->PublicType->exists($id)) {
			throw new NotFoundException(__('Invalid public type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PublicType->save($this->request->data)) {
				$this->Session->setFlash(__('The public type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The public type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PublicType.' . $this->PublicType->primaryKey => $id));
			$this->request->data = $this->PublicType->find('first', $options);
		}
		$workshops = $this->PublicType->Workshop->find('list');
		$this->set(compact('workshops'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->PublicType->id = $id;
		if (!$this->PublicType->exists()) {
			throw new NotFoundException(__('Invalid public type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PublicType->delete()) {
			$this->Session->setFlash(__('The public type has been deleted.'));
		} else {
			$this->Session->setFlash(__('The public type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
