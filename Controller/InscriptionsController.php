<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * Inscriptions Controller
 *
 * @property Inscription $Inscription
 * @property PaginatorComponent $Paginator
 */

class InscriptionsController extends AppController {
	var $helpers = array('Html','Form','Csv');
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
	
	
		if ((isset($user['permission_level']) && $user['permission_level'] === '1')) {
			return true;
		}
			
	
		// Default deny
		//return false;
			
	}
	
	public function beforeFilter() {
		//parent::beforeFilter();
		// Allow users to register and logout.
		$this->Auth->allow('find','attached_add','index_inscription','add','option');
	}
	
	public function index() {
		$this->Inscription->recursive = 0;
		$this->set('inscriptions', $this->Paginator->paginate());
		$this->set('categories',$this->Inscription->Date->Category->find('all'));
		if ($this->request->is('post')) {
			return $this->redirect(array('action' => 'download'));
		}
	}
	
	public function download()
	{
		
		$this->set('inscriptions', $this->Inscription->find('all'));
		$this->set('categories',$this->Inscription->Date->Category->find('all'));
		$this->layout = null;
		//$this->autoLayout = false;
		//Configure::write('debug', '0');
	}
	
	
	public function index_excel() {
	  $this->layout='index_excel';
           $this->Inscription->recursive = 0;
       $this->set('inscriptions',  $this->Paginator->paginate());
       $this->set('categories',$this->Inscription->Date->Category->find('all'));
	}
	
	
	public function principal() {
		if ($this->request->is('post')) {
			return $this->redirect(array('action' => 'option'));
		}
	}
	
	
	public function option() {
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	

	public function find() {
		if ($this->request->is('post')) {
			$nit= $this->request->data['Inscription']['busqueda'];
			$digitover= $this->request->data['Inscription']['digitoverificacion'];
			$nitc=$nit.'-'.$digitover;
			return $this->redirect(array('controller' => 'Inscriptions', 'action' => 'index_inscription',$nitc));
		}
	}
	
	public function attached_add($nitc=null) {
		

		
		if (!$this->Inscription->exists($nitc)) {
			throw new NotFoundException(__('Invalid inscription'));
		}
		if ($this->request->is(array('post', 'put'))) {
			
			$this->Inscription->read('nit', $nitc);
			
			$this->set('nitc',$nitc);
			
			/*****Primer attachment*******/
			
			//Se recupera el nombre del archivo tal cual está en el computador
			$nombreEnComputador=$this->request->data['Inscription']['attached1']['name'];
			//Se saca la extensión
			$extension=explode(".",$nombreEnComputador);
			$extension=end($extension);
		
			//Se recupera el nombre de la entidad utilizando el nit actual
			$options = array('conditions' => array('Inscription.nit' => $nitc));
			$company=$this->Inscription->find('all',$options);
			$valorfcompany=$company[0]['Inscription']['company_name'];
			//se cambia en el request el nombre de archivo para el primer attachment para que quede con el rut y el nombre de la entidad y al final la extensión original.
			$this->request->data['Inscription']['attached1']['name']='Rut-'.$valorfcompany.'.'.$extension;
			
			
			/*****Segundo attachment*******/
			//se cambia en el request el nombre de archivo para el segundo attachment
			//Se recupera el nombre del archivo tal cual está en el computador
			$nombreEnComputador=$this->request->data['Inscription']['attached2']['name'];
			//Se saca la extensión
			$extension=explode(".",$nombreEnComputador);
			$extension=end($extension);
				
			//Se recupera el nombre de la entidad utilizando el nit actual
			$options = array('conditions' => array('Inscription.nit' => $nitc));
			$company=$this->Inscription->find('all',$options);
			$valorfcompany=$company[0]['Inscription']['company_name'];
			//se cambia en el request el nombre de archivo para el primer attachment para que quede con el rut y el nombre de la entidad y al final la extensión original.
			$this->request->data['Inscription']['attached2']['name']='Rut-'.$valorfcompany.'.'.$extension;
			
			
			
			/*****Tercer attachment*******/
			//se cambia en el request el nombre de archivo para el tercer attachment
			//Se recupera el nombre del archivo tal cual está en el computador
			$nombreEnComputador=$this->request->data['Inscription']['attached3']['name'];
			//Se saca la extensión
			$extension=explode(".",$nombreEnComputador);
			$extension=end($extension);
			
			//Se recupera el nombre de la entidad utilizando el nit actual
			$options = array('conditions' => array('Inscription.nit' => $nitc));
			$company=$this->Inscription->find('all',$options);
			$valorfcompany=$company[0]['Inscription']['company_name'];
			//se cambia en el request el nombre de archivo para el primer attachment para que quede con el rut y el nombre de la entidad y al final la extensión original.
			$this->request->data['Inscription']['attached3']['name']='Rut-'.$valorfcompany.'.'.$extension;
			
			
				
			//Se recupera el nombre del archivo tal cual está en el computador
			$nombreEnComputador=$this->request->data['Inscription']['attached2']['name'];
			//Se saca la extensión
			$extension=explode(".",$nombreEnComputador);
			$extension=end($extension);
			
			//Se recupera el nombre de la entidad utilizando el nit actual
			$options = array('conditions' => array('Inscription.nit' => $nitc));
			$company=$this->Inscription->find('all',$options);
			$valorfcompany=$company[0]['Inscription']['company_name'];
			//se cambia en el request el nombre de archivo para el primer attachment para que quede con el rut y el nombre de la entidad y al final la extensión original.
			$this->request->data['Inscription']['attached1']['name']='Rut-'.$valorfcompany.'.'.$extension;
			//se cambia en el request el nombre de archivo para el segundo attachment
				
			//se cambia en el request el nombre de archivo para el tercer attachment
			
			if ($this->Inscription->save($this->request->data)) {
				
				
				$this->Session->setFlash(__('Los archivos adjuntos fueron guardados.'.debug($company)));
				return $this->redirect(array('action' => 'index_inscription',$nitc));
			} else {
				$this->Session->setFlash(__('The inscription could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Inscription.' . $this->Inscription->primaryKey => $nitc));
			$this->request->data = $this->Inscription->find('first', $options);
		}

		}
		/*
		if ($this->request->is('post')) {
			$adjunto1= $this->request->data['Inscription']['attached1'];
			$adjunto2= $this->request->data['Inscription']['attached2'];
			$adjunto3= $this->request->data['Inscription']['attached3'];
			$dir= $this->request->data['Inscription']['dir'];
			
			$this->set('adjunto1',$adjunto1);
			$this->set('adjunto2',$adjunto2);
			$this->set('adjunto3',$adjunto3);
			$this->set('dir',$dir);
			$this->set('nit',$nit);
			
			$adjuntoarchivos=$this->Inscription->query("update inscriptions set attached1='$adjunto1',attached2='$adjunto2',attached3='$adjunto3',dir='$dir' where nit='$nit'");
			
		}
	}*/
	
	public function index_inscription($nitc = null,$ciudad = null ,$idcategorian = null,$razon_social= null,$digitovers=null) {
		
		if($nitc==''){
			return $this->redirect(array('controller' => 'Categories', 'action' => 'addcategory'));
		}
		
		$validarexinit=$this->Inscription->query("select distinct nit from inscriptions where nit='$nitc'");
			
		$validarn = '';
		foreach ($validarexinit as $validaciones):
		$validarn  = $validaciones['inscriptions']['nit'];
		endforeach;
			
		$this->set('validarn',$validarn);
		
		if($validarn==''){
			$this->Session->setFlash(__('El nit que ingresó no se encuentra registrado en el sistema.'));
			return $this->redirect(array('controller' => 'Inscriptions', 'action' => 'find'));
		}
		
	$horas_diferencia= -7;
	$tiempo=time() + ($horas_diferencia * 60 *60);
	list($Mili, $bot) = explode(" ", microtime());
	$DM=substr(strval($Mili),2,4);
	$fecha = date('Y-m-d H:i:s:'. $DM,$tiempo);
	$this->set('fecha',$fecha);
		
		
	$this->set('nitc',$nitc);
	$this->set('ciudad',$ciudad);
	$this->set('idcategorian',$idcategorian);
	$this->set('razon_social',$razon_social);
	//$this->set('digitover',$digitover);
	
	//$digitovers=$nit.'-'.$digitover;
	$this->set('digitovers',$digitovers);
	
	$compciudad='Bello';
	$this->set('compciudad',$compciudad);
	
	$selecciudad=$this->Inscription->query("select distinct city_name from city where city_name='$ciudad' and city_state='Reserva'");
	$this->set('selecciudad',$selecciudad);
	
	/*
	if(($compciudad	== 'Medellin') || ($compciudad==  'Bogota')){
	$condciudad='hola';
	}
	else{
	
		$condciudad='nola';	
	}*/
	
	//$this->set('condciudad',$condciudad);
	/*$i=0;
	foreach ($selecciudad as $condition){
	
		if ($i<1)
			$condciudad="(".$compciudad."=='".$condition['city']['city_name']."'";
		if ($i>=1)
			$condciudad=$condciudad.") 0R (".$compciudad."=='".$condition['city']['city_name']."'";
			$i++;
		}	
		$condciudad=$condciudad.")";
			//$querya=$querya.")";
		$this->set('condciudad',$condciudad);
*/ 
	   	/*Este condicional lo agregue para que funcionara el buscar nit*/
		if($idcategorian!=''){
			if($selecciudad!=array())
			{
				$actualizacion=$this->Inscription->query("update date set inscription_id ='$nitc',date_assignment='$fecha' where category_id='$idcategorian' and inscription_id='0' and date_state='Reservado' ORDER BY id_date asc LIMIT 1");	
				
				//$this->set('actualizacion',$actualizacion);
				
				if($actualizacion=='false')
				{
					$actualizacion=$this->Inscription->query("update date set inscription_id ='$nitc',date_assignment='$fecha' where category_id='$idcategorian' and inscription_id='0' and date_state='Disponible' ORDER BY id_date asc LIMIT 1");
				}
			}
			else{
				$actualizacion=$this->Inscription->query("update date set inscription_id ='$nitc',date_assignment='$fecha' where category_id='$idcategorian' and inscription_id='0' and date_state='Disponible' ORDER BY id_date asc LIMIT 1");
			}
		}
		else{	
			$razonsoc=$this->Inscription->query("select company_name from inscriptions where nit='$nitc'");
			
			$razon_social = '';
			foreach ($razonsoc as $razonsoci):
			$razon_social  = $razonsoci['inscriptions']['company_name'];
			endforeach;
			
			$this->set('razon_social',$razon_social);
					
		}	

		
		$citacion=$this->Inscription->query("select distinct date_name from date where inscription_id='$nitc'");
			
		$citacionn = '';
		foreach ($citacion as $citaciones):
		$citacionn  = $citaciones['date']['date_name'];
		endforeach;
			
		$this->set('citacionn',$citacionn);
		
		
	}
	
	
	public function view($id = null) {
		if (!$this->Inscription->exists($id)) {
			throw new NotFoundException(__('Invalid inscription'));
		}
		$options = array('conditions' => array('Inscription.' . $this->Inscription->primaryKey => $id));
		$this->set('inscription', $this->Inscription->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($nombrecategoria = null) {
		
		if($nombrecategoria==''){
			return $this->redirect(array('controller' => 'Categories', 'action' => 'addcategory'));
		}
		
		$horas_diferencia= -7;
		$tiempo=time() + ($horas_diferencia * 60 *60);
		list($Mili, $bot) = explode(" ", microtime());
		$DM=substr(strval($Mili),2,4);
		$fecha = date('Y-m-d H:i:s:'. $DM,$tiempo);
		$this->set('fecha',$fecha);
		
		$idcategoria=$this->Inscription->query("select distinct id_category from category where category_name='$nombrecategoria'");
		
		foreach ($idcategoria as $idcategorias){
			$idcategorian=$idcategorias['category']['id_category'];
		}
		$this->set('idcategorian',$idcategorian);
		
		$listadociudad=$this->Inscription->query("select distinct city_name from city order by city_name asc");
		$this->set('listadociudad',$listadociudad);
		$listadociudadesn='';
		
		foreach ($listadociudad as $listadociudades):
		$listadociudadesn = $listadociudadesn.'<option value="'.$listadociudades['city']['city_name'].'">'.$listadociudades['city']['city_name'].'</option>';
		endforeach;
		
		$this->set('listadociudadesn',$listadociudadesn);
		
		if ($this->request->is('post')) {
					
			$this->Inscription->create();
			$nit= $this->request->data['Inscription']['nit'];
			$digitover= $this->request->data['Inscription']['digitoverificacion'];
			
			$this->set('digitover',$digitover);
			$nitc=$nit.'-'.$digitover;
			
			
			$validarexinit=$this->Inscription->query("select distinct nit from inscriptions where nit='$nitc'");
				
			$validarn = '';
			foreach ($validarexinit as $validaciones):
			$validarn  = $validaciones['inscriptions']['nit'];
			endforeach;
				
			$this->set('validarn',$validarn);
			
			if($validarn!=''){
				$this->Session->setFlash(__('El nit que ingresó se encuentra registrado en el sistema.'));
				return $this->redirect(array('controller' => 'Inscriptions', 'action' => 'add',$nombrecategoria));
			}
			if ($this->Inscription->save($this->request->data)) {
				$nitn=$this->Inscription->query("update inscriptions set nit ='$nitc' where nit='$nit'");
				$this->Session->setFlash(__('The inscription has been saved.'));
				$ciudad= $this->request->data['Inscription']['representative_city'];
				$razon_social= $this->request->data['Inscription']['company_name'];
				//enviar información del correo...
				$citacion=$this->Inscription->query("select distinct date_name from date where inscription_id='$nitc'");
					
				$citacionn = '';
				foreach ($citacion as $citaciones):
				$citacionn  = $citaciones['date']['date_name'];
				endforeach;
					
				$this->set('citacionn',$citacionn);
				
				
				$correoi=$this->Inscription->find('all', array('conditions'=>array('nit'=>$nitc)));
				$this->set('correoi',$correoi);
				$Email = new CakeEmail('gmail');
				$Email->from(array('comercializacion@fiestadellibroylacultura.com' => 'Fiesta del Libro y la Cultura'));
				foreach ($correoi as $correoi):
				$email_c = $correoi['Inscription']['representative_mail'];
				endforeach;
				$Email->to($email_c);
				$Email->subject('Inscripción Exitosa!!!');
				//$link='http://aplicaciones.medellin.co/reservasfiestadellibro/workshops/index_inscription/'.$usuario;
				$mensaje1="\n\n Medellín, $fecha \n\n";
				$mensaje11="\n\n $razon_social";
				$mensaje2="\n $nitc";
				$mensaje3="\n\n\n\n Apreciado postulante";
				$mensaje4="\n\n Agradecemos su interés en hacer parte de la 8va Fiesta del libro y la cultura, evento cultural de la ciudad que hace parte de los Eventos del libro del Plan municipal de lectura de la Alcaldía de Medellín";
				//condicion
				//cita
					$mensaje5= "De acuerdo a la convocatoria diligenciada anteriormente se asignarán las citas para asignación de stands,  de acuerdo a su categoría y orden de inscripción del formulario, le enviamos este documento con el fin de informarle que su cita queda asignada de la siguiente manera:";
					$mensaje6= "\n\n Su cita para participar en la exhibición comercial de la VII Fiesta del Libro y la Cultura fue asignada de la siguiente manera:" ;
					$mensaje7="\n\n Fecha y hora de su cita: \n";
					$mensaje71=$citacionn;
				
				//no cita
					$mensaje51="De acuerdo a la convocatoria diligenciada anteriormente, se asignarán las citas para asignación de stands,  de acuerdo a su categoría y orden de inscripción del formulario. Según el procedimiento fueron asignados los cupos disponibles y se generó una lista de espera en la que su entidad queda en el turno es el N° xxxx.  En caso de tener cupos disponibles después de atendidas las citas comenzaremos a asignar stands en el orden de la lista de espera.";
					$mensaje61="\n\n Lugar: Oficina  de Los Eventos del Libro, Casa del Patrimonio, Carrera 50 No 59 – 06 ";
					$mensaje72="\n\n Su cita será atendida por: Nathalia Ortega ";
					$mensaje8="\n\n Recuerde adjuntar por este medio todos los documentos solicitados para hacer valida la asignación de su stand.";
					$mensaje9="\n\n •	Cámara de comercio, renovada del 2014 y con una vigencia de 30 días.";
					$mensaje10="\n •	RUT (actualizado del 2013 en adelante)";
					$mensaje11="\n •	Cédula representante legal";
					$mensaje12="\n\n Esperamos contar con su presencia en la 8va Fiesta del Libro y la Cultura. Agradecemos su participación, colaboración y puntualidad en las citas.";
					$mensaje13="\n\n- Es necesario que los grupos de primera infancia y hasta los 8 años estén identificados con escarapela.";
					$mensaje14="\n\n ";
					
				//fin  no cita
				$mensaje15="\n\n Cordialmente";		
				$mensaje16="\n\n Nathalia Ortega Viana";
				$mensaje17="\n Jefe Comercial Eventos del Libro 2014";
				$mensaje18="\n comercializacion@fiestadellibroylacultura.com";
				$mensaje19="\n Teléfono: (034) 444 86 91 – Ext. 105";
				$mensaje20="\n Celular: 321 759 84 22";
				$mensaje21="\n\n ";		
				
				if($citacionn!=''){
				$Email->send($mensaje1.$razon_social.$mensaje2.
						$mensaje3.$mensaje4.$mensaje5.$mensaje6.$mensaje7.
						$mensaje71.$mensaje15.$mensaje16.$mensaje17.$mensaje18.$mensaje19.
						$mensaje20.$mensaje21);
				}
				else
				{
					$Email->send($mensaje1.$razon_social.$mensaje2.
							$mensaje3.$mensaje4.$mensaje5.$mensaje6.$mensaje7.
							$mensaje51.$mensaje61.$mensaje72.$mensaje8.$mensaje9.$mensaje10.
							$mensaje11.$mensaje12,$mensaje13,$mensaje14.$mensaje15.$mensaje16.$mensaje17.$mensaje18.$mensaje19.
						$mensaje20.$mensaje21);
					
				}				
				
				//fin de envío
				//$digitovers=$nit.'-'.$digitover;
				return $this->redirect(array('action' => 'index_inscription',$nitc,$ciudad,$idcategorian,$razon_social));
			} else {
				$this->Session->setFlash(__('The inscription could not be saved. Please, try again.'));
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
		if (!$this->Inscription->exists($id)) {
			throw new NotFoundException(__('Invalid inscription'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Inscription->save($this->request->data)) {
				$this->Session->setFlash(__('The inscription has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The inscription could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Inscription.' . $this->Inscription->primaryKey => $id));
			$this->request->data = $this->Inscription->find('first', $options);
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
		$this->Inscription->id = $id;
		if (!$this->Inscription->exists()) {
			throw new NotFoundException(__('Invalid inscription'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Inscription->delete()) {
			$this->Session->setFlash(__('The inscription has been deleted.'));
		} else {
			$this->Session->setFlash(__('The inscription could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
