<?php
App::uses('AppController', 'Controller');
/**
 * PublicTypeWorkshops Controller
 *
 * @property PublicTypeWorkshop $PublicTypeWorkshop
 * @property PaginatorComponent $Paginator
 */
class PublicTypeWorkshopsController extends AppController {

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
		$this->PublicTypeWorkshop->recursive = 0;
		$this->set('publicTypeWorkshops', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PublicTypeWorkshop->exists($id)) {
			throw new NotFoundException(__('Invalid public type workshop'));
		}
		$options = array('conditions' => array('PublicTypeWorkshop.' . $this->PublicTypeWorkshop->primaryKey => $id));
		$this->set('publicTypeWorkshop', $this->PublicTypeWorkshop->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PublicTypeWorkshop->create();
			if ($this->PublicTypeWorkshop->save($this->request->data)) {
				$this->Session->setFlash(__('The public type workshop has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The public type workshop could not be saved. Please, try again.'));
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
		if (!$this->PublicTypeWorkshop->exists($id)) {
			throw new NotFoundException(__('Invalid public type workshop'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PublicTypeWorkshop->save($this->request->data)) {
				$this->Session->setFlash(__('The public type workshop has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The public type workshop could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PublicTypeWorkshop.' . $this->PublicTypeWorkshop->primaryKey => $id));
			$this->request->data = $this->PublicTypeWorkshop->find('first', $options);
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
		$this->PublicTypeWorkshop->id = $id;
		if (!$this->PublicTypeWorkshop->exists()) {
			throw new NotFoundException(__('Invalid public type workshop'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PublicTypeWorkshop->delete()) {
			$this->Session->setFlash(__('The public type workshop has been deleted.'));
		} else {
			$this->Session->setFlash(__('The public type workshop could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
