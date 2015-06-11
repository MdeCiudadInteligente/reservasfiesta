<?php
App::uses('AppController', 'Controller');
/**
 * SpecificConditions Controller
 *
 * @property SpecificCondition $SpecificCondition
 * @property PaginatorComponent $Paginator
 */
class SpecificConditionsController extends AppController {

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
	
	
		if ((isset($user['permission_level']) && $user['permission_level'] == '1')) {
			return true;
		}
			
	
		// Default deny
		//return false;
			
	}
	
	public function index() {
		$this->SpecificCondition->recursive = 0;
		$this->set('specificConditions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->SpecificCondition->exists($id)) {
			throw new NotFoundException(__('Invalid specific condition'));
		}
		$options = array('conditions' => array('SpecificCondition.' . $this->SpecificCondition->primaryKey => $id));
		$this->set('specificCondition', $this->SpecificCondition->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SpecificCondition->create();
			if ($this->SpecificCondition->save($this->request->data)) {
				$this->Session->setFlash(__('The specific condition has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The specific condition could not be saved. Please, try again.'));
			}
		}
		$workshops = $this->SpecificCondition->Workshop->find('list');
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
		if (!$this->SpecificCondition->exists($id)) {
			throw new NotFoundException(__('Invalid specific condition'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->SpecificCondition->save($this->request->data)) {
				$this->Session->setFlash(__('The specific condition has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The specific condition could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SpecificCondition.' . $this->SpecificCondition->primaryKey => $id));
			$this->request->data = $this->SpecificCondition->find('first', $options);
		}
		$workshops = $this->SpecificCondition->Workshop->find('list');
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
		$this->SpecificCondition->id = $id;
		if (!$this->SpecificCondition->exists()) {
			throw new NotFoundException(__('Invalid specific condition'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->SpecificCondition->delete()) {
			$this->Session->setFlash(__('The specific condition has been deleted.'));
		} else {
			$this->Session->setFlash(__('The specific condition could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
