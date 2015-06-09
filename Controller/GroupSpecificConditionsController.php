<?php
App::uses('AppController', 'Controller');
/**
 * GroupSpecificConditions Controller
 *
 * @property GroupSpecificCondition $GroupSpecificCondition
 * @property PaginatorComponent $Paginator
 */
class GroupSpecificConditionsController extends AppController {

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
	public function index() {
		
		$this->GroupSpecificCondition->recursive = 0;
		$this->set('groupSpecificConditions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->GroupSpecificCondition->exists($id)) {
			throw new NotFoundException(__('Invalid group specific condition'));
		}
		$options = array('conditions' => array('GroupSpecificCondition.' . $this->GroupSpecificCondition->primaryKey => $id));
		$this->set('groupSpecificConditions', $this->GroupSpecificCondition->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->GroupSpecificCondition->create();
			if ($this->GroupSpecificCondition->save($this->request->data)) {
				$this->Session->setFlash(__('The group specific condition has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The group specific condition could not be saved. Please, try again.'));
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
		if (!$this->GroupSpecificCondition->exists($id)) {
			throw new NotFoundException(__('Invalid group specific condition'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->GroupSpecificCondition->save($this->request->data)) {
				$this->Session->setFlash(__('The group specific condition has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The group specific condition could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('GroupSpecificCondition.' . $this->GroupSpecificCondition->primaryKey => $id));
			$this->request->data = $this->GroupSpecificCondition->find('first', $options);
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
		$this->GroupSpecificCondition->id = $id;
		if (!$this->GroupSpecificCondition->exists()) {
			throw new NotFoundException(__('Invalid group specific condition'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->GroupSpecificCondition->delete()) {
			$this->Session->setFlash(__('The group specific condition has been deleted.'));
		} else {
			$this->Session->setFlash(__('The group specific condition could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
