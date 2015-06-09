<?php
App::uses('AppController', 'Controller');
/**
 * Entities Controller
 *
 * @property Entity $Entity
 * @property PaginatorComponent $Paginator
 */
class InscripcionesController extends AppController {

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
		$this->Entity->recursive = 0;
		$this->set('entities', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Entity->exists($id)) {
			throw new NotFoundException(__('Invalid entity'));
		}
		$options = array('conditions' => array('Entity.' . $this->Entity->primaryKey => $id));
		$this->set('entity', $this->Entity->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function adiccionartaller() {
		$usuario = $this->Session->read('Auth.User.username');
		$this->set('usuario',$usuario);
		$fields = array('week', 'away_team_id', 'home_team_id');
		$prueba=$this->Inscripciones->query("select specific_condition.name,specific_condition.id_specific_condition from user inner join (institution inner join (group_specific_condition inner join specific_condition on group_specific_condition.specific_condition_id=specific_condition.id_specific_condition) on institution.id_institution=group_specific_condition.institution_id) on user.institution_id = institution.id_institution where user.username = 'johana'");
		$this->set('fields',$fields);
		
		
		if ($this->request->is('post')) {
			$this->Entity->create();
			if ($this->Entity->save($this->request->data)) {
				$this->Session->setFlash(__('The entity has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The entity could not be saved. Please, try again.'));
			}
		}
	}
	
	public function inscripcion() {
		
	}
	
	

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function modificartaller() {
		
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Entity->id = $id;
		if (!$this->Entity->exists()) {
			throw new NotFoundException(__('Invalid entity'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Entity->delete()) {
			$this->Session->setFlash(__('The entity has been deleted.'));
		} else {
			$this->Session->setFlash(__('The entity could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
