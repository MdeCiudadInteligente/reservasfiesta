<?php
App::uses('AppController', 'Controller');
/**
 * SpecificConditionWorkshops Controller
 *
 * @property SpecificConditionWorkshop $SpecificConditionWorkshop
 * @property PaginatorComponent $Paginator
 */
class SpecificConditionWorkshopsController extends AppController {

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
		$this->SpecificConditionWorkshop->recursive = 0;
		$this->set('specificConditionWorkshops', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->SpecificConditionWorkshop->exists($id)) {
			throw new NotFoundException(__('Invalid specific condition workshop'));
		}
		$options = array('conditions' => array('SpecificConditionWorkshop.' . $this->SpecificConditionWorkshop->primaryKey => $id));
		$this->set('specificConditionWorkshop', $this->SpecificConditionWorkshop->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SpecificConditionWorkshop->create();
			if ($this->SpecificConditionWorkshop->save($this->request->data)) {
				$this->Session->setFlash(__('The specific condition workshop has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The specific condition workshop could not be saved. Please, try again.'));
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
		if (!$this->SpecificConditionWorkshop->exists($id)) {
			throw new NotFoundException(__('Invalid specific condition workshop'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->SpecificConditionWorkshop->save($this->request->data)) {
				$this->Session->setFlash(__('The specific condition workshop has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The specific condition workshop could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SpecificConditionWorkshop.' . $this->SpecificConditionWorkshop->primaryKey => $id));
			$this->request->data = $this->SpecificConditionWorkshop->find('first', $options);
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
		$this->SpecificConditionWorkshop->id = $id;
		if (!$this->SpecificConditionWorkshop->exists()) {
			throw new NotFoundException(__('Invalid specific condition workshop'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->SpecificConditionWorkshop->delete()) {
			$this->Session->setFlash(__('The specific condition workshop has been deleted.'));
		} else {
			$this->Session->setFlash(__('The specific condition workshop could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
