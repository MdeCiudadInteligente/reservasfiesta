<?php
App::uses('AppController', 'Controller');
/**
 * InstitutionSpecificConditions Controller
 *
 * @property InstitutionSpecificCondition $InstitutionSpecificCondition
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
		$this->InstitutionSpecificCondition->recursive = 0;
		$this->set('institutionSpecificConditions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->InstitutionSpecificCondition->exists($id)) {
			throw new NotFoundException(__('Invalid institution specific condition'));
		}
		$options = array('conditions' => array('InstitutionSpecificCondition.' . $this->InstitutionSpecificCondition->primaryKey => $id));
		$this->set('institutionSpecificCondition', $this->InstitutionSpecificCondition->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->InstitutionSpecificCondition->create();
			if ($this->InstitutionSpecificCondition->save($this->request->data)) {
				$this->Session->setFlash(__('The institution specific condition has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The institution specific condition could not be saved. Please, try again.'));
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
		if (!$this->InstitutionSpecificCondition->exists($id)) {
			throw new NotFoundException(__('Invalid institution specific condition'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->InstitutionSpecificCondition->save($this->request->data)) {
				$this->Session->setFlash(__('The institution specific condition has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The institution specific condition could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('InstitutionSpecificCondition.' . $this->InstitutionSpecificCondition->primaryKey => $id));
			$this->request->data = $this->InstitutionSpecificCondition->find('first', $options);
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
		$this->InstitutionSpecificCondition->id = $id;
		if (!$this->InstitutionSpecificCondition->exists()) {
			throw new NotFoundException(__('Invalid institution specific condition'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->InstitutionSpecificCondition->delete()) {
			$this->Session->setFlash(__('The institution specific condition has been deleted.'));
		} else {
			$this->Session->setFlash(__('The institution specific condition could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
