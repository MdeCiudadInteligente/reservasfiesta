<?php
App::uses('AppController', 'Controller');
/**
 * WorkshopSessions Controller
 *
 * @property WorkshopSession $WorkshopSession
 * @property PaginatorComponent $Paginator
 */
class WorkshopSessionsController extends AppController {
	var $uses = array('Workshop','Register','User','Institution','WorkshopSession','PublicType','Group');
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
	
	public function cargarchivo() {
	
		if ($this->request->is('post')) {
			$this->WorkshopSession->create();
				
			if ($this->WorkshopSession->save($this->request->data)) {
				$this->Session->setFlash(__('El archivo ha sido cargado exitosamente.'));
				//$load = $this->request->data['WorkshopSession']['seleccionar_archivo']['name'];
				$loadPrevs=$this->WorkshopSession->find('all', array('fields'=>array('seleccionar_archivo')));
			
				foreach ($loadPrevs as $loadPrev){
					if ($loadPrev['WorkshopSession']['seleccionar_archivo']!=null){
						$load=$loadPrev['WorkshopSession']['seleccionar_archivo'];
					}
					
					
				}
				
				$dir = $this->request->data['WorkshopSession']['dir'];
				$messages = $this->WorkshopSession->import($load);
				
				//debug($messages);
			
				$this->set('messages',$messages);
				
				
				
				//return $this->redirect(array('action' => 'index'));
			}
			else {
				$this->Session->setFlash(__('El archivo no ha sido cargado. Por favor, intentelo de nuevo.'));
			}
		}
	
	
	}

	
	public function workshoplist($datework=null, $id_group=null) {

		$this->set('datework',$datework);
		
		$this->set('id_group',$id_group);
		
		$usuario = $this->Session->read('Auth.User.username');
		$this->set('usuario',$usuario);
		//$fields = array('week', 'away_team_id', 'home_team_id');
		$specific_condition=$this->WorkshopSession->query("select distinct specific_condition.name from user inner join (groups inner join (group_specific_condition inner join specific_condition on group_specific_condition.specific_condition_id=specific_condition.id_specific_condition) on groups.id_group=group_specific_condition.group_id) on groups.user_id = user.id_user where user.username = '$usuario' and groups.id_group = $id_group");
		$this->set('specific_condition',$specific_condition);
		
		$public_type=$this->WorkshopSession->query("select distinct public_type.name, user.username from user inner join (groups inner join public_type on groups.public_type_id = public_type.id_public_type) on groups.user_id = user.id_user where user.username = '$usuario' and groups.id_group = $id_group");
		$this->set('public_type',$public_type);
		
		
		foreach ($public_type as $public_type){
		$public_typep=$public_type['public_type']['name'];
		
		}
		$this->set('public_typep',$public_typep);
		
		/*$groupid=$this->WorkshopSession->query("select distinct groups.id_group from groups inner join user on user.id_user = groups.user_id where user.username = '$usuario'");
		foreach ($groupid as $groupid){
		$groupidp=$groupid['groups']['id_group'];
		
		}
		$this->set('groupidp',$groupidp);
		*/
	
	
		//**************DFGA
		//La siguiente sección de código permite hallar los talleres que cumplen con las condiciones de fecha y tipo de público y que además cubren las condiciones especificas del grupo actual.   
		
		//1.  Se buscan todos los talleres que cumplen con las condiciones específicas.
		$resultado=array();
		//1.1. Se busca por cada condición específica los talleres que cumplen con esa condición
		//debug($specific_condition);
		if ($specific_condition!=array()){
			$talleres2=array();
			foreach ($specific_condition as $condition){
				$talleresconcondicion=$this->Workshop->SpecificCondition->find('all', array('conditions'=>array('SpecificCondition.name'=>$condition['specific_condition']['name'])));
				array_push($talleres2,$talleresconcondicion[0]['Workshop']);
			}
			
			//1.2. Se busca la intersección de todos los conjuntos de talleres obtenidos anteriormente (Un conjunto por cada condición)
			$i=0;
			
			foreach($talleres2 as $taller2){
				if ($i==0)
					$resultado=$taller2;
				if ($i>0)
					$resultado=$this->simple_array_intersect($taller2, $resultado);
				$i++;
			}
		}
		//si no hay condiciones especificas
		else{
			//se buscan todos los talleres
			$talleresconcondicion=$this->Workshop->find('all');
			//debug($talleresconcondicion);
			//se ponen todos los talleres en un único array
			$talleres2=array();
			foreach ($talleresconcondicion as $tallerconcondicion){
				array_push($talleres2,$tallerconcondicion['Workshop']);
			}
			$resultado=$talleres2;
		}
		
		//debug($resultado);
		
		//2.  Se buscan todos los talleres que cumplen con las condiciones de fecha y tipo de público
		$queryb="select distinct workshop.id_workshop, workshop.name, workshop.description, workshop.entity_id from public_type inner join (public_type_workshop inner join (workshop inner join workshop_session on workshop.id_workshop = workshop_session.workshop_id) on public_type_workshop.workshop_id = workshop.id_workshop) on public_type.id_public_type = public_type_workshop.public_type_id  where workshop_session.workshop_day = '$datework' and workshop_session.group_id = '0' and public_type.name = '$public_typep'";
		$talleresotros=$this->WorkshopSession->query($queryb);
		$talleresconlasdemascondiciones=array();
		foreach ($talleresotros as $tallerotro){
			array_push($talleresconlasdemascondiciones,$tallerotro['workshop']);
			
		}
		//debug($talleresconlasdemascondiciones);
		//3.  Se busca la intersección entre los dos conjuntos de talleres.
		$resultadofinal=$this->simple_array_intersect($talleresconlasdemascondiciones, $resultado);
		//4. Se pasa el resultado de la intersección a la vista
		$taller=$resultadofinal;
		$this->set(compact('taller'));
		//***************DFGA
		
		//debug($taller);
		if ($taller == Array ( ))
		{
			$this->Session->setFlash(__('En la fecha seleccionada no hay carpas disponibles con los criterios especificados por usted en el registro'));
			return $this->redirect(array('controller' => 'WorkshopSessions', 'action' => 'addworkshop'));
		}
		
		//$tallerid=$this->WorkshopSession->query($queryid);
		//$this->set(compact('tallerid'));
		
		//$this->set('taller',$taller);
		
		
		/*
		 $taller=$this->WorkshopSession->query("select distinct workshop.name,workshop.id_workshop from specific_condition inner join (specific_condition_workshop inner join (public_type inner join (public_type_workshop inner join (workshop inner join workshop_session on workshop.id_workshop = workshop_session.workshop_id) on public_type_workshop.workshop_id = workshop.id_workshop) on public_type.id_public_type = public_type_workshop.public_type_id) on specific_condition_workshop.workshop_id = workshop.id_workshop) on  specific_condition.id_specific_condition = specific_condition_workshop.specific_condition_id where workshop_session.workshop_day = '05/05/2014' and public_type.name = '$public_typep' and specific_condition.name = 'Invidentes'");
		$this->set('taller',$taller);
		*/
		$this->WorkshopSession->recursive = 0;
		$this->set('workshopSessions', $this->Paginator->paginate());
		//return $this->redirect(array('controller' => 'workshop', 'action' => 'workshop_inscription',$taller));
		
		
	}
	
	
	//Función que permite hallar la intersección entre dos arrays
	private function simple_array_intersect($a,$b) {
		$a_assoc = $a != array_values($a);
		$b_assoc = $b != array_values($b);
		$ak = $a_assoc ? array_keys($a) : $a;
		$bk = $b_assoc ? array_keys($b) : $b;
		$out = array();
		for ($i=0;$i<sizeof($ak);$i++) {
			if (in_array($ak[$i],$bk)) {
				if ($a_assoc) {
					$out[$ak[$i]] = $a[$ak[$i]];
				} else {
					$out[] = $ak[$i];
				}
			}
		}
		return $out;
	}
	
	public function addworkshop($id_group=null) {		/*,$workshopc =  null*/
		
		$usuario = $this->Session->read('Auth.User.username');
		$this->set('usuario',$usuario);
		$this->set('id_group',$id_group);
		//$fields = array('week', 'away_team_id', 'home_team_id');
		$specific_condition=$this->WorkshopSession->query("select distinct specific_condition.name from user inner join (groups inner join (group_specific_condition inner join specific_condition on group_specific_condition.specific_condition_id=specific_condition.id_specific_condition)on groups.id_group=group_specific_condition.group_id) on groups.user_id = user.id_user where user.username = '$usuario' and groups.id_group = '$id_group'");
		$this->set('specific_condition',$specific_condition);
		
		$public_type=$this->WorkshopSession->query("select distinct public_type.name from user inner join (groups inner join public_type on groups.public_type_id = public_type.id_public_type) on groups.user_id = user.id_user where user.username = '$usuario' and groups.id_group = '$id_group'");
		$this->set('public_type',$public_type);
		
		foreach ($public_type as $public_type){
			$public_typep=$public_type['public_type']['name'];
		
		}
		$this->set('public_typep',$public_typep);
		//$this->WorkshopSession->recursive = 3;
		
		
		//**************DFGA
		//La siguiente sección de código permite hallar las fechas en que existen talleres que cumplen con las condiciones de fecha y tipo de público y que además cubren las condiciones especificas del grupo actual.	
		//1.  Se buscan todos las fechas en las que existen talleres que cumplen con las condiciones específicas.
		$tallerescumplencondiciones=array();
		$talleres2=array();
		//1.1. Se busca por cada condición específica las fechas en las que existen talleres que cumplen con esa condición
		
		//Se verifica si existen condiciones.
		$resultado=array();
		if ($specific_condition!=array()){
			foreach ($specific_condition as $condition){
				$condicion=$condition['specific_condition']['name'];
				$querya="select distinct workshop_session.workshop_day from specific_condition inner join (specific_condition_workshop inner join (public_type inner join (public_type_workshop inner join (workshop inner join workshop_session on workshop.id_workshop = workshop_session.workshop_id) on public_type_workshop.workshop_id = workshop.id_workshop) on public_type.id_public_type = public_type_workshop.public_type_id) on specific_condition_workshop.workshop_id = workshop.id_workshop) on  specific_condition.id_specific_condition = specific_condition_workshop.specific_condition_id where workshop_session.group_id = '0' and public_type.name = '$public_typep' and (specific_condition.name = '$condicion')";
				//$talleresconcondicion=$this->Workshop->SpecificCondition->find('all', array('conditions'=>array('SpecificCondition.name'=>$condition['specific_condition']['name'])));
				$talleresconcondicion=$this->WorkshopSession->query($querya);
				array_push($talleres2,$talleresconcondicion);
				//debug($talleresconcondicion);
			}
			//1.2. Se busca la intersección de todos los conjuntos de fechas de talleres obtenidos anteriormente (Un conjunto por cada condición)
			$i=0;
			
			foreach($talleres2 as $taller2){
				if ($i==0)
					$resultado=$taller2;
				if ($i>0)
					$resultado=$this->simple_array_intersect($resultado, $taller2);
				$i++;
			}
		
		
		}
		//si no existen condiciones la consulta se hace sin tenerlas en cuenta
		else{
			$querya="select distinct workshop_session.workshop_day from public_type inner join (public_type_workshop inner join (workshop inner join workshop_session on workshop.id_workshop = workshop_session.workshop_id) on public_type_workshop.workshop_id = workshop.id_workshop) on public_type.id_public_type = public_type_workshop.public_type_id  where workshop_session.group_id = '0' and public_type.name = '$public_typep'";
			$talleresconcondicion=$this->WorkshopSession->query($querya);
			//debug($talleresconcondicion);
			$resultado=$talleresconcondicion;
		}
		
		
		//debug($resultado);
		
		//2.  Se buscan todas la fechas en que existen talleres que cumplen con las condiciones de fecha y tipo de público
		$queryb="select distinct workshop_session.workshop_day from public_type inner join (public_type_workshop inner join (workshop inner join workshop_session on workshop.id_workshop = workshop_session.workshop_id) on public_type_workshop.workshop_id = workshop.id_workshop) on public_type.id_public_type = public_type_workshop.public_type_id  where workshop_session.group_id = '0' and public_type.name = '$public_typep'";
		$talleresotros=$this->WorkshopSession->query($queryb);
		
		//debug($talleresotros);
		//3.  Se busca la intersección entre los dos conjuntos de fechas
		$resultados=$this->simple_array_intersect($resultado, $talleresotros);
		
		
		//4 se simplifica el array
		$resultado=array();
		foreach($resultados as $resultadosimple){
			array_push($resultado,$resultadosimple['workshop_session']['workshop_day']);
		}
		//5. se ordena el array
		sort($resultado);
		
		//5. Se pasa el resultado de la intersección a la vista
		$taller=$resultado;
		
		//***************DFGA		
		
		$listadohorario=$taller;
		//$listadohorario2=$this->WorkshopSession->find('all', array('conditions'=>array('WorkshopSession.institution_id'=>'0','Institution.public_type_id'=>'1')));
			
		$this->set('listadohorario',$listadohorario);
		//$this->set('workshopc',$workshopc);

		$listadohorarion = '';
		foreach ($listadohorario as $listadohorarios):
		$fechar=$listadohorarios;
		//debug($fechar);

		$fechaconformato= date('d M Y', strtotime($fechar));
		//debug($fechaconformato);
		$listadohorarion = $listadohorarion.'<option value="'.$listadohorarios.'">'.$fechaconformato.'</option>';
		endforeach;
		
		$this->set('listadohorarion',$listadohorarion);
		
		if ($this->request->is('post')) {
		//$datework= $this->request->data['WorkshopSession']['workshop_day'];
		$datework= $this->request->data['WorkshopSession']['diataller'];
		return $this->redirect(array('controller' => 'WorkshopSessions', 'action' => 'workshoplist', $datework, $id_group));
		}
	}
	/*
	public function workshop_inscription($taller = NULL) {
			
		//$this->set('taller',$taller);
		
	}*/
	
	private function ordenarArray($a){
		$ordenado=array();
		foreach ($a as $x){
			
		}	

	}
	
	
	

	
	
	public function index() {

		$usuario_level= $this->Session->read('Auth.User.permission_level');
		if($usuario_level=='2'){
			return $this->redirect(array('controller' => 'Users', 'action' => 'login'));
		}
		$this->WorkshopSession->recursive = 0;
		$this->set('workshopSessions', $this->Paginator->paginate('WorkshopSession'));
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
			return $this->redirect(array('controller' => 'Users', 'action' => 'login'));
		}
		if (!$this->WorkshopSession->exists($id)) {
			throw new NotFoundException(__('Invalid workshop session'));
		}
		$options = array('conditions' => array('WorkshopSession.' . $this->WorkshopSession->primaryKey => $id));
		$this->set('workshopSession', $this->WorkshopSession->find('first', $options));
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
			$this->WorkshopSession->create();	
			
			$datosavalidar=$this->request->data;
			//debug($datosavalidar);
			$datotime = new DateTime($datosavalidar['WorkshopSession']['workshop_time']['hour'] . ':' .$datosavalidar['WorkshopSession']['workshop_time']['min'] . ' ' .$datosavalidar['WorkshopSession']['workshop_time']['meridian']);
			$datotime2 = new DateTime($datosavalidar['WorkshopSession']['travel_time']['hour'] . ':' .$datosavalidar['WorkshopSession']['travel_time']['min'] . ' ' .$datosavalidar['WorkshopSession']['travel_time']['meridian']);
			
			$nuevoarray=array('WorkshopSession'=>array('workshop_day' => $datosavalidar['WorkshopSession']['workshop_day']['year']."-".$datosavalidar['WorkshopSession']['workshop_day']['month']."-".$datosavalidar['WorkshopSession']['workshop_day']['day'],
			'workshop_time'=>$datotime->format('H:i:s'),'travel_time'=>$datotime2->format('H:i:s'),'workshop_id' => $datosavalidar['WorkshopSession']['workshop_id']));
			//debug($nuevoarray);
			$guardar=$this->WorkshopSession->validarFila($nuevoarray);
			//debug($guardar);		
			if ($guardar != null){
				if ($this->WorkshopSession->save($this->request->data)) 
				{
					$this->Session->setFlash(__('La sesión del taller se ha guardado.'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('La sesión del taller no se pudo guardar. Por favor, inténtelo de nuevo.'));
				
				}
			}
			else 
			{
				$this->Session->setFlash(__('La sessión de taller no puede ser guardada.Ya existe en la base de datos.'));
			}			
					
		}
		
		$workshops = $this->WorkshopSession->Workshop->find('list');
		$institutions= $this->WorkshopSession->Institution->find('list');
		//$this->set(compact('workshops'));
		$this->set(compact('workshops','institutions'));
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
		if (!$this->WorkshopSession->exists($id)) {
			throw new NotFoundException(__('Invalid workshop session'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->WorkshopSession->save($this->request->data)) {
				$this->Session->setFlash(__('The workshop session has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The workshop session could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('WorkshopSession.' . $this->WorkshopSession->primaryKey => $id));
			$this->request->data = $this->WorkshopSession->find('first', $options);
		}
		$workshops = $this->WorkshopSession->Workshop->find('list');
		$institutions= $this->WorkshopSession->Institution->find('list');
		//$this->set(compact('workshops'));
		$this->set(compact('workshops','institutions'));
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
		$this->WorkshopSession->id = $id;
		if (!$this->WorkshopSession->exists()) {
			throw new NotFoundException(__('Invalid workshop session'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->WorkshopSession->delete()) {
			$this->Session->setFlash(__('The workshop session has been deleted.'));
		} else {
			$this->Session->setFlash(__('The workshop session could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
