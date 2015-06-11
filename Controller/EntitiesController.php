<?php
App::uses('AppController', 'Controller');
/**
 * Entities Controller
 *
 * @property Entity $Entity
 * @property PaginatorComponent $Paginator
 */
class EntitiesController extends AppController {

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
	
	
		if ((isset($user['permission_level']) && $user['permission_level'] == '2')||(isset($user['permission_level']) && $user['permission_level'] == '1')) {
			return true;
		}
			
	
		// Default deny
		//return false;
			
	}
	
	public function index() {
		$usuario_level= $this->Session->read('Auth.User.permission_level');
		if($usuario_level=='2'){
			return $this->redirect(array('controller' => 'users', 'action' => 'login'));
		}
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
		//recuperando la url de las entidades...		
		$url = $this->Entity->find('all',array('conditions'=>array('Entity.id_entity'=>$id)));
		foreach ($url as $url):
		//debug($url);
		$urls=$url['Entity']['description'];
		endforeach;$this->set('urls',$urls);
		
		
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$usuario_level= $this->Session->read('Auth.User.permission_level');
		if($usuario_level=='2'){
			return $this->redirect(array('controller' => 'users', 'action' => 'login'));
		}
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

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$usuario_level= $this->Session->read('Auth.User.permission_level');
		if($usuario_level=='2'){
			return $this->redirect(array('controller' => 'users', 'action' => 'login'));
		}
		if (!$this->Entity->exists($id)) {
			throw new NotFoundException(__('Invalid entity'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Entity->save($this->request->data)) {
				$this->Session->setFlash(__('The entity has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The entity could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Entity.' . $this->Entity->primaryKey => $id));
			$this->request->data = $this->Entity->find('first', $options);
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
		$usuario_level= $this->Session->read('Auth.User.permission_level');
		if($usuario_level=='2'){
			return $this->redirect(array('controller' => 'users', 'action' => 'login'));
		}
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
