<?php
App::uses('AppController', 'Controller');
/**
 * WorkshopPublics Controller
 *
 * @property WorkshopPublic $WorkshopPublic
 * @property PaginatorComponent $Paginator
 */
class WorkshopPublicsController extends AppController {

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
		$this->WorkshopPublic->recursive = 0;
		$this->set('workshopPublics', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->WorkshopPublic->exists($id)) {
			throw new NotFoundException(__('Invalid workshop public'));
		}
		$options = array('conditions' => array('WorkshopPublic.' . $this->WorkshopPublic->primaryKey => $id));
		$this->set('workshopPublic', $this->WorkshopPublic->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->WorkshopPublic->create();
			if ($this->WorkshopPublic->save($this->request->data)) {
				$this->Session->setFlash(__('The workshop public has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The workshop public could not be saved. Please, try again.'));
			}
		}
		$workshops = $this->WorkshopPublic->Workshop->find('list');
		$publicTypes = $this->WorkshopPublic->PublicType->find('list');
		$this->set(compact('workshops', 'publicTypes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->WorkshopPublic->exists($id)) {
			throw new NotFoundException(__('Invalid workshop public'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->WorkshopPublic->save($this->request->data)) {
				$this->Session->setFlash(__('The workshop public has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The workshop public could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('WorkshopPublic.' . $this->WorkshopPublic->primaryKey => $id));
			$this->request->data = $this->WorkshopPublic->find('first', $options);
		}
		$workshops = $this->WorkshopPublic->Workshop->find('list');
		$publicTypes = $this->WorkshopPublic->PublicType->find('list');
		$this->set(compact('workshops', 'publicTypes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->WorkshopPublic->id = $id;
		if (!$this->WorkshopPublic->exists()) {
			throw new NotFoundException(__('Invalid workshop public'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->WorkshopPublic->delete()) {
			$this->Session->setFlash(__('The workshop public has been deleted.'));
		} else {
			$this->Session->setFlash(__('The workshop public could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
