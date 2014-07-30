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
	public function beforeFilter() {
		//parent::beforeFilter();
		// Allow users to register and logout.
		$this->Auth->allow('adduser');
	
	}
	
	public function isAuthorized($user) {
		// Any registered user can access public functions
	
	
		if ((isset($user['permission_level']) && $user['permission_level'] === '2')||(isset($user['permission_level']) && $user['permission_level'] === '1')) {
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
		$usuario_level= $this->Session->read('Auth.User.permission_level');
		if($usuario_level=='2'){
			return $this->redirect(array('controller' => 'users', 'action' => 'login'));
		}
		if (!$this->Responsible->exists($id)) {
			throw new NotFoundException(__('Inválido responsable'));
		}
		$options = array('conditions' => array('Responsible.' . $this->Responsible->primaryKey => $id));
		$this->set('responsible', $this->Responsible->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function adduser($institution=null,$institutionid= null) {
		$this->set('institution',$institution);
		$this->set('institutionid',$institutionid);
		if ($this->request->is('post')) {
			$this->Responsible->create();
			//$id_respons_adduser = $this->request->data['Responsible']['id_responsible'];
			//$responsable_adduser_id = $this->Responsible->find('first', array('conditions'=>array('Responsible.id_responsible' => $id_respons_adduser)));
			//if($responsable_adduser_id != array())
			//{
				//$this->Session->setFlash(__('El documento ya existe.Ingrese uno nuevo por favor!'));
				//return $this->redirect(array('controller' => 'responsibles', 'action' => 'adduser',$institution,$institutionid));
			//}
			//else
			
			//Verificación por si el usuario se devuelve en el navegador y vuelve a intentar crear el responsable asociado a la misma institución.  Esto igual hace que existan regstros de responsables repetidos, se genera basura, pero esa basura se podría limpiar.
			$existeinstitucion=$this->Responsible->find('first', array('conditions'=>array('Responsible.institution_id' => $institutionid)));
			if ($existeinstitucion==array()){
				if ($this->Responsible->save($this->request->data)) {
					$this->Session->setFlash(__('El responsable ha sido guardado.'));
					//return $this->redirect(array('action' => 'index'));
					return $this->redirect(array('controller' => 'users', 'action' => 'adduser',$institution,$institutionid));
				} else {
					$this->Session->setFlash(__('El responsable no pudó ser guardado. Por favor, inténtelo de nuevo.'));
				}
			}
			else{
				//Si se devolvió, pero quiere volver a avanzar utilizando la misma cédula, se puede permitir que vaya a crear el usuario.  Sino tiene la misma cédula se devuelve al formulario de institución.  Esta operación puede generar basura, pero se puede limpiar.
				if ($existeinstitucion['Responsible']['identity']!=$this->request->data['Responsible']['identity']){
					$this->Session->setFlash(__('El responsable con su institución no pudieron ser guardados. Por favor, inténtelo de nuevo.'));
					return $this->redirect(array('controller' => 'institutions', 'action' => 'add'));
				}
				else{
					return $this->redirect(array('controller' => 'users', 'action' => 'adduser',$institution,$institutionid));
				}
			}
		}		
		$institutions = $this->Responsible->Institution->find('list',array('order'=>array('Institution.name ASC')));
		$this->set(compact('institutions'));
	}
	
	
	public function add() {
		if ($this->request->is('post')) {
			$this->Responsible->create();
			//$id_responsable = $this->request->data['Responsible']['id_responsible'];
			//$responsable_id = $this->Responsible->find('first', array('conditions'=>array('Responsible.id_responsible' => $id_responsable)));
			//if($responsable_id != array())
			//{
				//$this->Session->setFlash(__('El documento ya existe.Ingrese uno nuevo por favor!'));
			//}
			//else 
			if ($this->Responsible->save($this->request->data)) {			
				$this->Session->setFlash(__('El responsable ha sido guardado.'));
				
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El responsable no pudó ser guardado. Por favor, inténtelo de nuevo.'));
			}
		}
		$institutions = $this->Responsible->Institution->find('list');
		$this->set(compact('institutions'));
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
		/*if($usuario_level=='2'){
			return $this->redirect(array('controller' => 'users', 'action' => 'login'));
		}*/
		if (!$this->Responsible->exists($id)) {
			throw new NotFoundException(__('Invalid responsible'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Responsible->save($this->request->data)) {
				$this->Session->setFlash(__('The responsible has been saved.'));
				if($usuario_level=='1')
				{
					return $this->redirect(array('action' => 'index'));
				}
				else if($usuario_level=='2')
				{
					return $this->redirect(array('controller'=>'workshops','action' => 'index_inscription'));
				}
			} else {
				$this->Session->setFlash(__('The responsible could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Responsible.' . $this->Responsible->primaryKey => $id));
			$this->request->data = $this->Responsible->find('first', $options);
		}
		$educationalInstitutions = $this->Responsible->Institution->find('list');
		$this->set(compact('Institutions'));
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
