<?php
App::uses('AppController', 'Controller');
/**
 * WorkshopSpecifics Controller
 *
 * @property WorkshopSpecific $WorkshopSpecific
 * @property PaginatorComponent $Paginator
 */
class WorkshopSpecificsController extends AppController {

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
		$this->WorkshopSpecific->recursive = 0;
		$this->set('workshopSpecifics', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->WorkshopSpecific->exists($id)) {
			throw new NotFoundException(__('Invalid workshop specific'));
		}
		$options = array('conditions' => array('WorkshopSpecific.' . $this->WorkshopSpecific->primaryKey => $id));
		$this->set('workshopSpecific', $this->WorkshopSpecific->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->WorkshopSpecific->create();
			if ($this->WorkshopSpecific->save($this->request->data)) {
				$this->Session->setFlash(__('The workshop specific has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The workshop specific could not be saved. Please, try again.'));
			}
		}
		$workshops = $this->WorkshopSpecific->Workshop->find('list');
		$specificConditions = $this->WorkshopSpecific->SpecificCondition->find('list');
		$this->set(compact('workshops', 'specificConditions'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->WorkshopSpecific->exists($id)) {
			throw new NotFoundException(__('Invalid workshop specific'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->WorkshopSpecific->save($this->request->data)) {
				$this->Session->setFlash(__('The workshop specific has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The workshop specific could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('WorkshopSpecific.' . $this->WorkshopSpecific->primaryKey => $id));
			$this->request->data = $this->WorkshopSpecific->find('first', $options);
		}
		$workshops = $this->WorkshopSpecific->Workshop->find('list');
		$specificConditions = $this->WorkshopSpecific->SpecificCondition->find('list');
		$this->set(compact('workshops', 'specificConditions'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->WorkshopSpecific->id = $id;
		if (!$this->WorkshopSpecific->exists()) {
			throw new NotFoundException(__('Invalid workshop specific'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->WorkshopSpecific->delete()) {
			$this->Session->setFlash(__('The workshop specific has been deleted.'));
		} else {
			$this->Session->setFlash(__('The workshop specific could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
