<?php
App::uses('AppController', 'Controller');
/**
 * Groups Controller
 *
 * @property Group $Group
 * @property PaginatorComponent $Paginator
 */
class GroupsController extends AppController {

	var $uses = array('Group','Institution','WorkshopSession','User','InstitutionUser','GroupSpecificCondition','SpecificCondition');
	var $helpers = array('Html','Form','Csv','Js');	
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	
	
	public function beforeFilter() {
		//parent::beforeFilter();
		// Allow users to register and logout.
		$this->Auth->allow('addresp','index','edit','view');
	
	}
	
	public function isAuthorized($user) {
		// Any registered user can access public functions
	
	
		if ((isset($user['permission_level']) && $user['permission_level'] == '2')||(isset($user['permission_level']) && $user['permission_level'] == '1')) {
			return true;
		}
			
	
		// Default deny
		//return false;
			
	}
	
	
	
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Group->recursive = 1;
		$this->set('groups', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Group->exists($id)) {
			throw new NotFoundException(__('Invalid group'));
		}
		$options = array('conditions' => array('Group.' . $this->Group->primaryKey => $id));
		$this->set('group', $this->Group->find('first', $options));
	}
	
	public function view_admin($idgro = null) {
		$iduser = $this->Session->read('Auth.User.id_user');
		$this->set('iduser',$iduser);
		$this->set('idgro',$idgro);
		$groups=$this->Group->query("SELECT
				gs.id_group,
				gs.name,
				gs.members_number,
				pt.name,
				wp.name,
				ws.workshop_day,
				ws.workshop_time,
				ws.travel_time,
				us.name,
				(SELECT GROUP_CONCAT(CONCAT(' ', name, ' '))
				FROM
				group_specific_condition gsc,
				specific_condition sc
				WHERE
				gs.id_group= gsc.group_id and
				gsc.specific_condition_id= sc.id_specific_condition) AS specific_conditions
		
				FROM
				workshop_session ws,
				groups gs,
				public_type pt,
				user us,
				workshop wp
		
				WHERE
				wp.id_workshop=ws.workshop_id AND
				gs.id_group=ws.group_id AND
				pt.id_public_type=gs.public_type_id AND
				us.id_user=gs.user_id AND
				gs.user_id= $iduser");
		$this->set(compact('groups'));
	}
	

	public function addresp() { //$id_user=null
		if ($this->request->is('post')) {	
			$this->Group->create();
			$id_user = $this->Session->read('Auth.User.id_user');
			$this->set('id_user',$id_user);
			$data=$this->request->data;
			$data['Group']['user_id']=$id_user;
			//debug($id_user);
			
			if ($this->Group->save($data)) {
				$id_group = $this->Group->id;
				$this->Session->setFlash(__('The group has been saved.'));
				return $this->redirect(array('controller' => 'WorkshopSessions', 'action' => 'addworkshop',$id_group));
			} else {
				$this->Session->setFlash(__('The group could not be saved. Please, try again.'));
			}
		}
		
		$publictype = $this->Group->PublicType->find('list');
		$specificConditions = $this->Group->SpecificCondition->find('list');
		$this->set(compact('publictype','specificConditions'));
	}
	
	
/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Group->create();
			if ($this->Group->save($this->request->data)) {
				$this->Session->setFlash(__('The group has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The group could not be saved. Please, try again.'));
			}
		}
		
		$publictype = $this->Group->PublicType->find('list');
		$specificConditions = $this->Group->SpecificCondition->find('list');
		$this->set(compact('publictype','specificConditions'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Group->exists($id)) {
			throw new NotFoundException(__('Invalid group'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Group->save($this->request->data)) {
				$this->Session->setFlash(__('The group has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The group could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Group.' . $this->Group->primaryKey => $id));
			$this->request->data = $this->Group->find('first', $options);
		}
		$publictype = $this->Group->PublicType->find('list');
		$specificConditions = $this->Group->SpecificCondition->find('list');
		$this->set(compact('publictype','specificConditions'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function download()
	{
		//$this->Group->recursive = 0;
		/*$this->set('groups',$this->Group->find('all'));
	    $this->set('institutions', $this->Institution->find('all'));
		$this->set('workshopSessions',$this->WorkshopSession->find('all'));
		$this->set('users',$this->User->find('all'));
		$this->set('institutionUsers',$this->InstitutionUser->find('all'));		
		$this->set('groupSpecificConditions',$this->GroupSpecificCondition->find('all'));
		$this->set('specificConditions',$this->SpecificCondition->find('all'));*/
		
		$queryinforme="SELECT DISTINCT
					    g.id_group AS id_grupo,
					    g.name AS nombre_grupo,
					    g.members_number AS numero_integrantes,
					    (SELECT 
					            GROUP_CONCAT(CONCAT(' ',name, ' '))
					        FROM
					            group_specific_condition gs,
					            specific_condition s
					        WHERE
					            g.id_group = gs.group_id
					                AND gs.specific_condition_id = s.id_specific_condition ) AS Codiciones_especificas,
					    u.username AS usuario,
					    u.name AS nombre_responsable,
					    u.identity AS cedula,
					    u.celular AS celular,
					    u.mail AS correo,
					    ws.workshop_day AS dia_taller,
					    ws.workshop_time AS hora_taller,
					    ws.travel_time AS hora_recorrido,
					    p.name AS tipo_publico,
					    w.name AS nombre_taller,
					    w.description AS descripcion_taller,
					    e.name AS nombre_entidad,
					    e.description AS descripcion_entidad,
					    i.name AS nombre_institucion,
					    i.mail AS correo_institucion,
					    i.address AS direccion_institucion,
					    i.phone AS telefono_institucion,
					    i.neighborhood AS barrio_institucion,
					    i.comune AS comuna_institucion,
					    i.city AS ciudad_institucion,
					    i.code_education AS codigo_institucion,
					    i.inst_type AS tipo_institucion,
					    i.educational_inst_type AS tipo_institucion_educativa,
					    i.modification_timestamp AS modificacion
					FROM
					    groups g,
					    user u,
					    entity e,
					    group_specific_condition gs,
					    institution i,
					    institution_user iu,
					    public_type p,
					    specific_condition s,
					    workshop w,
					    workshop_session ws
					WHERE
					    g.user_id = u.id_user
					        AND g.public_type_id = p.id_public_type
					        AND ws.group_id = g.id_group
					        AND i.id_institution = iu.institution_id
					        AND iu.user_id = u.id_user
					        AND ws.workshop_id = w.id_workshop
					        AND w.entity_id = e.id_entity
     ";
		$informe=$this->Group->query($queryinforme);
		$this->set(compact('informe'));
		
		$this->layout = null;
		//$this->autoLayout = false;
		//Configure::write('debug', '0');
	}
	
	public function delete($id_group = null) {
		if ($this->Group->delete($id_group)) {		
			$response['success']=true;
		    
		} else {
			$response['success']=false;
			$response['message']='El Grupo no pudó ser eliminado';
		}
		
		return $response;
	}}
