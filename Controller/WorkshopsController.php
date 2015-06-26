﻿<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::import('Controller', 'Groups');
/**
 * Workshops Controller
 *
 * @property Workshop $Workshop
 * @property PaginatorComponent $Paginator
 */
class WorkshopsController extends AppController {
	
	var $uses = array('Workshop','Register','User','Institution','WorkshopSession','PublicType');
	
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
	
	public function workshop_inscription($id = NULL,$datework=null,$id_group=null)  {
		
		$this->set('datework',$datework);
		$this->set('id_group',$id_group);
		if (!$this->Workshop->exists($id)) {
			throw new NotFoundException(__('Invalid Workshop'));
		}
		$options = array('conditions' => array('Workshop.' . $this->Workshop->primaryKey => $id));
		$this->set('taller', $this->Workshop->find('first', $options));
		
		$queryday="select distinct workshop_session.workshop_day from workshop_session inner join workshop on  workshop.id_workshop = workshop_session.workshop_id where workshop.id_workshop = '$id' and workshop_session.workshop_day = '$datework' and workshop_session.group_id = 0";
		$tallerday=$this->Workshop->query($queryday);
		//$this->set(compact('tallerday'));
		
		$this->set('tallerday',$tallerday);
		if ($tallerday == Array ( ))
		{
			$this->Session->setFlash(__('El taller no tiene horarios disponibles en esta fecha,Por favor seleccione otro taller o regrese al calendario y seleccione otra fecha'));
			return $this->redirect(array('controller' => 'WorkshopSessions', 'action' => 'workshoplist',$datework));
			
		}
		
		foreach ($tallerday as $tallerday):
		$tallerdayp=$tallerday['workshop_session']['workshop_day'];
		
		endforeach;
		$this->set('tallerdayp',$tallerdayp);
		
		
		$querytime="select distinct workshop_session.workshop_time from workshop_session inner join workshop on  workshop.id_workshop = workshop_session.workshop_id where workshop.id_workshop = '$id' and workshop_session.workshop_day = '$datework' and workshop_session.group_id = 0";
		
		$tallertime=$this->Workshop->query($querytime);

		
		//$this->set(compact('tallertime'));
		
		$tallertimen = '';
		foreach ($tallertime as $tallertimes):
		$hora=$tallertimes['workshop_session']['workshop_time'];
		//debug($hora);		
		$horaconformato= date('h i a', strtotime($hora));
		//debug($horaconformato);
		$tallertimen = $tallertimen.'<option value="'.$tallertimes['workshop_session']['workshop_time'].'">'.$horaconformato.'</option>';
		endforeach;
		$this->set('tallertimen',$tallertimen);
		/*
		foreach ($tallertime as $tallertime):
		$tallertime=$tallertime['workshop_session']['workshop_time'];
		
		endforeach;
		$this->set('tallertime',$tallertime);
		
		*/
		
		if ($this->request->is('post')) {	
		$horataller= $this->request->data['Workshop']['horataller'];
		$this->set('horataller',$horataller);
		
		$timestamp=strtotime($horataller);
		return $this->redirect(array('controller' => 'workshops','action' => 'workshop_update',$datework,$timestamp,$id_group,$id));
		}
	
	}
	
	public function workshop_update($datework=null,$timestamp=null,$id_group=null, $workshopid=null)  {
		
		$this->set('datework',$datework);
		//$this->set('institutionidp',$institutionidp);
		
		$horataller=date('H:i:s',$timestamp);
		$this->set('horataller',$horataller);
		
		$this->set('institutionidp',$institutionidp);
		
		$condicion=$this->Workshop->query("select group_id from workshop_session where group_id = '$id_group'");
		$this->set('condicion',$condicion);
		//debug($institutionidp);
		$condicionp='';
		foreach ($condicion as $condiciones):
		$condicionp=$condiciones['workshop_session']['group_id'];
		
		
		endforeach;
		$this->set('condicionp',$condicionp);
		
		if($condicionp == 0)
		{
			
			
		$queryupdate="update workshop_session SET group_id = '$id_group' where workshop_session.workshop_day = '$datework' and workshop_session.workshop_time= '$horataller' and workshop_session.workshop_id= '$workshopid'";
		$tallerupdate=$this->Workshop->query($queryupdate);
		$this->set(compact('tallerupdate'));
		
		//register de inscripcion...
		$usuario = $this->Session->read('Auth.User.username');
		$this->set('usuario',$usuario);
		/*
		$institutioniid=$this->Workshop->query("select institution.id_institution from institution inner join user on institution.id_institution = user.institution_id  where user.username = '$usuario'");
		foreach ($institutioniid as $institutioniid):
		$institutioniidp=$institutioniid['institution']['id_institution'];
		
		endforeach;
		$this->set('institutionidp',$institutioniidp);
		
		$condicionn=$this->Workshop->query("select institution_id,workshop_id,workshop_day,workshop_time,travel_time from workshop_session where institution_id = $institutioniidp");
		*/
		$condicionn=$this->Workshop->query("select group_id,workshop_id,workshop_day,workshop_time,travel_time from workshop_session where group_id = $id_group");
		
		
		$this->set('condicionn',$condicionn);
		$condicionnp='';
		foreach ($condicionn as $condicionnes):
		$condicionnp=$condicionnes['workshop_session']['group_id'];
		
		endforeach;
		$this->set('condicionnp',$condicionnp);
			
		foreach ($condicionn as $condicionnes):
		$condicionnid=$condicionnes['workshop_session']['workshop_id'];
		
		endforeach;
		$this->set('$condicionnid',$condicionnid);
		
		$condicionname=$this->Workshop->query("select name from workshop where id_workshop = $condicionnid");
		foreach ($condicionname as $condicionam):
		$condicionnomb=$condicionam['workshop']['name'];
		endforeach;
		$this->set('condicionnomb',$condicionnomb);
		
		$estado = "Inscrito";
		$horas_diferencia= -5;
		$tiempo=time() + ($horas_diferencia * 60 *60);
		list($Mili, $bot) = explode(" ", microtime());
		$DM=substr(strval($Mili),2,4);
		$fecha = date('Y-m-d H:i:s:'. $DM,$tiempo);
		$this->set('fecha',$fecha);
		
		$this->Register->create();
		$this->Register->set(array(
				'date' => $fecha,
				'username' => $usuario,
				'estado' => $estado,
				'workshop' => $condicionnomb
		));
		$this->Register->save();
		/*foreach ($condicion as $condiciones):
		$condiciond=$condiciones['workshop_session']['workshop_day'];
		$condiciont=$condiciones['workshop_session']['workshop_time'];
		$condiciontra=$condiciones['workshop_session']['travel_time'];
		endforeach;
			
		$this->set('condiciond',$condiciond);
		$this->set('condiciont',$condiciont);
		$this->set('condiciontra',$condiciontra);
		*/
		}
		return $this->redirect(array('controller' => 'workshops','action' => 'view_inscription',$id_group));	
	}
	
	public function view_inscription($id_group=null)  {
	
	
		//$this->set('institution',$institution);
		//debug($institution);
		$this->set('id_group',$id_group);
	
		$usuario = $this->Session->read('Auth.User.username');
		$this->set('usuario',$usuario);
	
		$groupid=$this->Workshop->query("select groups.id_group,groups.name,groups.members_number,groups.user_id from groups inner join user on groups.user_id = user.id_user  where user.username = '$usuario' and groups.id_group = '$id_group' ");
		//debug($institutionid);
	
		foreach ($groupid as $groupid):
		$groupidp=$groupid['groups']['id_group'];
		$groupname=$groupid['groups']['name'];
		$groupnumber=$groupid['groups']['members_number'];
		$groupuser=$groupid['groups']['user_id'];
		//debug($institutionname);
	
		endforeach;
		$this->set('groupidp',$groupidp);
		$this->set('groupname',$groupname);
		$this->set('groupnumber',$groupnumber);
		$this->set('groupuser',$groupuser);
		//Nombre y Celular del Responsable o Encargado...
		$responsibles=$this->User->find('all', array('conditions'=>array('id_user'=>$groupuser),'fields'=>array('name','celular','id_user')));
		$rname=null;
		$rcelular=null;
		$ruser=null;
		foreach ($responsibles as $responsible){
			$rname=$responsible['User']['name'];
			$rcelular=$responsible['User']['celular'];
			$ruser=$responsible['User']['id_user'];
		}
		$this->set('rname',$rname);
		$this->set('rcelular',$rcelular);
		$this->set('ruser',$ruser);
		//fin
		//$condicion=$this->Workshop->query("select workshop_session.group_id from workshop_session inner join groups on workshop_session.group_id = groups.id_group where workshop_session.group_id = $groupidp");
		$condicion=$this->Workshop->query("select group_id,workshop_id,workshop_day,workshop_time,travel_time from workshop_session where group_id = $groupidp");
	
		//$condicion=";
		//$condicion="select user.institution_id from user inner join (institution inner join workshop_session on institution.id_institution = workshop_session.institution_id) on user.institution_id = institution.id_institution where user.username = $usuario";
		//$queryid="select distinct workshop.id_workshop from specific_condition inner join (specific_condition_workshop inner join (public_type inner join (public_type_workshop inner join (workshop inner join workshop_session on workshop.id_workshop = workshop_session.workshop_id) on public_type_workshop.workshop_id = workshop.id_workshop) on public_type.id_public_type = public_type_workshop.public_type_id) on specific_condition_workshop.workshop_id = workshop.id_workshop) on  specific_condition.id_specific_condition = specific_condition_workshop.specific_condition_id where workshop_session.workshop_day = '$datework' and public_type.name = '$public_typep' and specific_condition.name = ";
		//$condicion=$this->Workshop->query($condicion);
		//$this->set(compact('tallerday'));
	
		$institutionid=$this->Workshop->query("select institution_id from institution_user where user_id='$ruser' group by institution_id limit 1");
		foreach ($institutionid as $institutionid):
		$institutionidn=$institutionid['institution_user']['institution_id'];
	
		endforeach;	
	
		$this->set('condicion',$condicion);
		$condicionp='';
		foreach ($condicion as $condiciones):
		$condicionp=$condiciones['workshop_session']['group_id'];
	
		endforeach;
		$this->set('condicionp',$condicionp);
	
	
		if ($condicionp != 0)
		{
				
			foreach ($condicion as $condiciones):
			$condicionid=$condiciones['workshop_session']['workshop_id'];
			$condiciond=$condiciones['workshop_session']['workshop_day'];
			$condiciont=$condiciones['workshop_session']['workshop_time'];
			$condiciontra=$condiciones['workshop_session']['travel_time'];
			endforeach;
			$this->set('condiciond',$condiciond);
			$this->set('condiciont',$condiciont);
			$this->set('condiciontra',$condiciontra);
			$this->set('condicionid',$condicionid);
				
			$condicioname=$this->Workshop->query("select name from workshop where id_workshop = $condicionid");
			foreach ($condicioname as $condicionm):
			$condicionnom=$condicionm['workshop']['name'];
			endforeach;
			$this->set('condicionnom',$condicionnom);
				
			//$correoi=$this->User->query("select distinct mail from responsible inner join (insitution inner join user on institution.id_institution=user.institution_id)on responsible.institution_id=institution.id_institution where id_responsible = '$crcedula'");
			$correoi=$this->User->find('all', array('conditions'=>array('id_user'=>$groupuser)));
			$correoi2=$this->Institution->find('all', array('conditions'=>array('id_institution'=>$institutionidn)));
			$this->set('correoi',$correoi);
			$this->set('correoi2',$correoi2);
			$Email = new CakeEmail('gmail');
			$Email->from(array('publicos@fiestadellibroylacultura.com' => 'Fiesta del Libro y la Cultura'));
			foreach ($correoi as $correoi):
			$email_c = $correoi['User']['mail'];
			endforeach;
			foreach ($correoi2 as $correoi2):
			$email_c2 = $correoi2['Institution']['mail'];
			endforeach;
			$Email->to($email_c);
			$Email->cc($email_c2);
			$Email->subject('Inscripción exitosa!!!');
			//$link='http://aplicaciones.medellin.co/reservasfiestadellibro/workshops/index_inscription/'.$usuario;
			$mensaje1="\n\n¡Qué bien! Estos son los datos del taller que inscribiste para tu grupo, recuerda que puedes ";
			$mensaje12="hacer click en imprimir para generar la hoja de registro, y que debes presentar este documento en el ingreso el día que tengas tu visita. (si no tienes disponible impresora en el momento, puedes volver a ingresar en cualquier momento con tu usuario y contraseña para imprimirla, además te llegará una copia a tu correo electrónico) \n\n";
			$mensaje11="El Día: ";
			$mensaje2="\nNombre Taller: ";
			$mensaje3="\nHora Taller: ";
			$mensaje4="\nHora Recorrido: ";
			$mensaje5="\nNombre del Encargado: ";
			$mensaje6="\nCelular del Encargado: ";
			$mensaje7="\nCantidad de Inscritos: ";
			$recomendaciones="\n\nRecomendaciones:";
			$recomendacion10="\n\n • Todos los talleres se realizan en el Jardín Botánico de Medellín.";
			$recomendacion1="\n\n• El ingreso de los grupos será por la entrada peatonal del Jardín Botánico. (Cerca de la estación Universidad del Metro, Calle 73)";
			$recomendacion11="\n\n • Es necesario que su grupo llegue con 30 minutos de antelación para hacer el registro y que no se retrase la actividad.";
			$recomendacion12="\n\n • Recuerde que la duración  de la actividad es de dos (2) horas para cada uno de los grupos, es importante tener en cuenta que esta programación se hace con el fin de atender a todo el público que quiera asistir a la Fiesta, por lo tanto es indispensable respetar las actividades programadas para los demás grupos y no ingresar a las carpas de promoción de lectura sin autorización.";
			$recomendacion21="\n\n• Durante la actividad el grupo contará con el acompañamiento de un guía, pero es indispensable que el responsable del grupo esté permanentemente.";
			$recomendacion32="\n\n• Su institución es responsable del transporte y la alimentación de los grupos. Se puede ingresar alimentos a las instalaciones del Jardín Botánico.";
			$recomendacion41="\n\n• Es necesario que los grupos de primera infancia y hasta los 8 años estén identificados con escarapela.";
			$recomendacion42="\n\n• Es importante llevar hidratación.";
			$recomendacion43="\n\n• La entrada y participación en el evento no tienen costo, la ciudadanía de Medellín ya pagó con sus impuestos.";
			$recomendacion44="\n\n Gracias por hacer parte de esta gran fiesta de ciudad que durante diez días nos recordará";
			$recomendacion45="\n\n que Medellín es Lectura Viva";
			$recomendacion46="\n\n ES INDISPENSABLE PRESENTAR ESTE FORMATO AL INGRESO DEL JARDÍN BOTÁNICO";
			$recomendacion47="\n\n Mayores informes:";
			$recomendacion48="\n\n Alejandra Gallo López";
			$recomendacion49="\n\n Líder Jardín Lectura Viva";
			$recomendacion40="\n\n 4448691 ext 111";
			$recomendacion50="\n\n 3012169301";
			$recomendacion51="\n\ninscripciones@fiestadellibroylacultura.com";
			$recomendacion52="\n\n Pablo López Londoño";
			$recomendacion53="\n\n Líder Públicos Dirigidos";
			$recomendacion54="\n\n 4448691 ext 109";
			$recomendacion55="\n\n 3147984567";
			$recomendacion56="\n\n inscripcionespublicos@fiestadellibroylacultura.com";
			$norespuesta="\n\n Este correo es informativo, favor no responder a esta dirección de correo, ya que no se encuentra habilitada para recibir mensajes.";
			$dia_taller= date('d M Y', strtotime($condiciond));
			$hora_taller= date('h i a', strtotime($condiciont));
			$hora_recorrido= date('h i a', strtotime($condiciontra));
			$Email->send($mensaje1.$mensaje12.$mensaje11.$dia_taller.
					$mensaje2.$condicionnom.$mensaje3.$hora_taller.$mensaje4.
					$hora_recorrido.$mensaje5.$rname.$mensaje6.$rcelular.$mensaje7.
					$groupnumber.$recomendaciones.$recomendacion10.$recomendacion1.$recomendacion11.$recomendacion12.$recomendacion21.
					$recomendacion32.$recomendacion41.$recomendacion42.$recomendacion43.$recomendacion44.$recomendacion45.$recomendacion46.
					$recomendacion47.$recomendacion48.$recomendacion49.$recomendacion40.$recomendacion50.$recomendacion51.$recomendacion52.
					$recomendacion53.$recomendacion54.$recomendacion55.$recomendacion56.$norespuesta);
	
		}
	}	
	
	public function index_inscription($pass=null)  {
		$iduser = $this->Session->read('Auth.User.id_user');
		$this->set('iduser',$iduser);
	
		$groups=$this->Workshop->query("SELECT
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
	
	public function workshop_cancel($id_group=null) {
		
		$usuario = $this->Session->read('Auth.User.username');
		$this->set('usuario',$usuario);
		
		$this->set('id_group',$id_group);
		
		$Groups = new GroupsController();
		
		/*$groupid=$this->Workshop->query("select groups.id_group from groups inner join user on user.id_user = groups.user_id  where user.username = '$usuario'");
		foreach ($groupid as $groupid):
		$groupidp=$groupid['groups']['id_group'];
		
		endforeach;
		
		$this->set('groupidp',$groupidp);*/
		
		//---Registro de inscripciones
		$condicionn=$this->Workshop->query("select group_id,workshop_id,workshop_day,workshop_time,travel_time from workshop_session where group_id = $id_group");
		
		$this->set('condicionn',$condicionn);
		$condicionnp='';
		foreach ($condicionn as $condicionnes):
		$condicionnp=$condicionnes['workshop_session']['group_id'];
		
		endforeach;
		$this->set('condicionnp',$condicionnp);
		
		$condicionnid='';
		foreach ($condicionn as $condicionnes):
		$condicionnid=$condicionnes['workshop_session']['workshop_id'];
		
		endforeach;
		$this->set('$condicionnid',$condicionnid);
		
		$condicionname=$this->Workshop->query("select name from workshop where id_workshop = '$condicionnid'");
		$condicionnomb = '';
		
		//debug($condicionname);
		foreach ($condicionname as $condicionam):
		$condicionnomb=$condicionam['workshop']['name'];
		endforeach;
		$this->set('condicionnomb',$condicionnomb);
		
		$estado = "Cancelado";
		$horas_diferencia= -5;
		$tiempo=time() + ($horas_diferencia * 60 *60);
		list($Mili, $bot) = explode(" ", microtime());
		$DM=substr(strval($Mili),2,4);
		$fecha = date('Y-m-d H:i:s:'. $DM,$tiempo);
		$this->set('fecha',$fecha);
		
		$this->Register->create();
		$this->Register->set(array(
				'date' => $fecha,
				'username' => $usuario,
				'estado' => $estado,
				'workshop' => $condicionnomb
		));
		$this->Register->save();
		
		//Envió de Correo...
		
		$groupid=$this->Workshop->query("select groups.id_group,groups.name,groups.members_number,groups.user_id from groups inner join user on groups.user_id = user.id_user  where user.username = '$usuario' and groups.id_group = '$id_group' ");
		
		foreach ($groupid as $groupid):
		$groupidp=$groupid['groups']['id_group'];
		$groupname=$groupid['groups']['name'];
		$groupmember=$groupid['groups']['members_number'];
		$groupuser=$groupid['groups']['user_id'];
			
		endforeach;
		$this->set('groupidp',$groupidp);
		$this->set('groupname',$groupname);
		$this->set('groupmember',$groupmember);
		$this->set('groupuser',$groupuser);
		
		//Fin envio correo....
		
		//-----------------------------		
		$queryupdate=$this->Workshop->query("update workshop_session SET group_id = '0' where workshop_session.group_id = '$id_group'");
		$this->set(compact('queryupdate'));
		
		$Groups = new GroupsController;
		
		if($queryupdate == array())
		{
			$Groups_response = $Groups->delete($id_group);
			
			//Envió de Correo...
			
			$user_canc=$this->User->find('all', array('conditions'=>array('id_user'=>$groupuser),'fields'=>array('id_user')));
			$ruser=null;
			
			foreach ($user_canc as $user_cancl)
			{
				$ruser=$user_cancl['User']['id_user'];
			}
			$this->set('ruser',$ruser);
			
			$institutionid=$this->Workshop->query("select institution_id from institution_user where user_id='$ruser' group by institution_id limit 1");
			foreach ($institutionid as $institutionid):
			$institutionidn=$institutionid['institution_user']['institution_id'];
			endforeach;
			
			$this->set('institutionidn',$institutionidn);			
				
			//$correoi=$this->User->query("select distinct mail from responsible inner join (insitution inner join user on institution.id_institution=user.institution_id)on responsible.institution_id=institution.id_institution where id_responsible = '$crcedula'");
			$correoi=$this->User->find('all', array('conditions'=>array('id_user'=>$groupuser)));
			$correoi2=$this->Institution->find('all', array('conditions'=>array('id_institution'=>$institutionidn)));
			$this->set('correoi',$correoi);
			$this->set('correoi2',$correoi2);
			$Email = new CakeEmail('gmail');
			$Email->from(array('publicos@fiestadellibroylacultura.com' => 'Fiesta del Libro y la Cultura'));
			foreach ($correoi as $correoi):
			$email_c = $correoi['User']['mail'];
			endforeach;
			foreach ($correoi2 as $correoi2):
			$email_c2 = $correoi2['Institution']['mail'];
			endforeach;
			$Email->to($email_c);
			$Email->cc($email_c2);
			$Email->subject('Cancelación exitosa!!!');
			//$link='http://aplicaciones.medellin.co/reservasfiestadellibro/workshops/index_inscription/'.$usuario;
			$mensaje1="\n\n¡Atención! Usted ha cancelado su inscripción a una de las carpas para su grupo, ";
			$mensaje2="\n\n Por lo tanto su grupo ha sido eliminado, si desea inscribir de nuevo una carpa a su grupo";
			$mensaje3="\n\n debe registrar de nuevo el grupo y el taller al que desea inscribirlo.";
			$mensaje4="\n\n  Este correo es informativo, favor no responder a esta dirección de correo, ya que no se encuentra habilitada para recibir mensajes.";
				
			$Email->send($mensaje1.$mensaje2.$mensaje3.$mensaje4);		
			
			//Fin envió de correo...		
			
			if (!$Groups_response['success']){
				$this->Session->setFlash(__($Groups_response['message']));
			}
			else{				
				$this->Session->setFlash(__('El grupo ha sido eliminado.'));
			}
		}
		else {
			$this->Session->setFlash(__('El grupo no pudó ser eliminado. Por favor, Intenta de nuevo.'));
		}
		return $this->redirect(array('action' => 'index_inscription'));							
	}	
	
	public function register(){
	if ($this->request->is('post')) {
		//$datework= $this->request->data['WorkshopSession']['workshop_day'];
		$datos= $this->request->data['User']['username'];
		return $this->redirect(array('controller' => 'workshops', 'action' => 'listado',$datos));
		}
	}
	
	public function listado($datos=null){
		$this->set('datos',$datos);
		$datos_list=$this->Register->query("select date,estado,workshop,username from register where username = '$datos'");
		$this->set('datos_list',$datos_list);	
		$this->Register->recursive = 0;
		$this->set('registers', $this->Paginator->paginate('Register'));
		
		if ($this->request->is('post')) {
			return $this->redirect(array('action' => 'download'));
		}
	}
	
	public function download()
	{
		$this->Register->recursive = 0;
		$this->set('registers', $this->Register->find('all'));
		$this->layout = null;
		//$this->autoLayout = false;
		//Configure::write('debug', '0');
	}
	
	public function index() {
		$usuario_level= $this->Session->read('Auth.User.permission_level');
		if($usuario_level=='2'){
			return $this->redirect(array('controller' => 'users', 'action' => 'login'));
		}
		//$workshop=$this->Workshop->find('all');
		//$this->set('workshops', $workshop);
		$this->Workshop->recursive = 0;
		$this->set('workshops', $this->Paginator->paginate('Workshop'));
		
	}
	

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Workshop->exists($id)) {
			throw new NotFoundException(__('Invalid workshop'));
		}
		
		$options = array('conditions' => array('Workshop.' . $this->Workshop->primaryKey => $id));
		$this->set('workshop', $this->Workshop->find('first', $options));
		
		//Se recupera el listado de todos los grupos que corresponden a la carpa (workshop) actual
		$this->WorkshopSession->recursive = 0;
		$this->set('WorkshopSession', $this->Paginator->paginate());
		//$groups = $this->Workshop->WorkshopSession->Institution->find('all', array('conditions'=>array('WorkshopSession.workshop_id'=>$id)));
		$groups = $this->WorkshopSession->find('all',array('conditions'=>array('Workshop.id_workshop'=>$id)));
		$this->set('groups',$groups);
		//debug($var)		
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
			$this->Workshop->create();
			if ($this->Workshop->save($this->request->data)) {
				$this->Session->setFlash(__('The workshop has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The workshop could not be saved. Please, try again.'));
			}
		}
		$entities = $this->Workshop->Entity->find('list', array('order'=>array('Entity.name ASC')));
		$publicTypes = $this->Workshop->PublicType->find('list');
		$specificConditions = $this->Workshop->SpecificCondition->find('list', array('order'=>array('SpecificCondition.name ASC')));
		$this->set(compact('entities', 'publicTypes', 'specificConditions'));
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
		if (!$this->Workshop->exists($id)) {
			throw new NotFoundException(__('Invalid workshop'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Workshop->save($this->request->data)) {
				$this->Session->setFlash(__('The workshop has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The workshop could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Workshop.' . $this->Workshop->primaryKey => $id));
			$this->request->data = $this->Workshop->find('first', $options);
		}
		$entities = $this->Workshop->Entity->find('list');
		$publicTypes = $this->Workshop->PublicType->find('list');
		$specificConditions = $this->Workshop->SpecificCondition->find('list');
		$this->set(compact('entities', 'publicTypes', 'specificConditions'));
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
		$this->Workshop->id = $id;
		if (!$this->Workshop->exists()) {
			throw new NotFoundException(__('Invalid workshop'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Workshop->delete()) {
			$this->Session->setFlash(__('The workshop has been deleted.'));
		} else {
			$this->Session->setFlash(__('The workshop could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
