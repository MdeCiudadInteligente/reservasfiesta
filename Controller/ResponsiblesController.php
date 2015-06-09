<?php
App::uses('AppController', 'Controller');
/**
 * Responsibles Controller
 *
 * @property Responsible $Responsible
 * @property PaginatorComponent $Paginator
 */
class ResponsiblesController extends AppController {

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
		$this->Responsible->recursive = 0;
		$this->set('responsibles', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Responsible->exists($id)) {
			throw new NotFoundException(__('Invalid responsible'));
		}
		$options = array('conditions' => array('Responsible.' . $this->Responsible->primaryKey => $id));
		$this->set('responsible', $this->Responsible->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Responsible->create();
			if ($this->Responsible->save($this->request->data)) {
				$this->Session->setFlash(__('The responsible has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The responsible could not be saved. Please, try again.'));
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
		if (!$this->Responsible->exists($id)) {
			throw new NotFoundException(__('Invalid responsible'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Responsible->save($this->request->data)) {
				$this->Session->setFlash(__('The responsible has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The responsible could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Responsible.' . $this->Responsible->primaryKey => $id));
			$this->request->data = $this->Responsible->find('first', $options);
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
		$this->Responsible->id = $id;
		if (!$this->Responsible->exists()) {
			throw new NotFoundException(__('Invalid responsible'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Responsible->delete()) {
			$this->Session->setFlash(__('The responsible has been deleted.'));
		} else {
			$this->Session->setFlash(__('The responsible could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
