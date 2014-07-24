<?php
App::uses('AppController', 'Controller');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
App::uses('CakeEmail', 'Network/Email');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {
	//var $uses = array('Responsible','User');
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
	
	
		if ((isset($user['permission_level']) && $user['permission_level'] === '2')||(isset($user['permission_level']) && $user['permission_level'] === '1')) {
			return true;
		}
			
	
		// Default deny
		//return false;
			
	}
	
	public function beforeFilter() {
		//parent::beforeFilter();
		// Allow users to register and logout.
		$this->Auth->allow('adduser','finduser','userlist','updateuserlogin','login','enviarcorreo');
	
	}
	
	public function login($newpassword=null) {
		/*if($newpassword!='')
		{
			$this->Session->setFlash(__('La contrase�a se ha modificado exitosamente'));
		}*/
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$usuario_level= $this->Session->read('Auth.User.permission_level');
				if($usuario_level=='1'){
					
					return $this->redirect(array('controller' => 'institutions', 'action' => 'index'));
				}
				return $this->redirect(array('controller' => 'Workshops', 'action' => 'index_inscription'));
				//return $this->redirect($this->Auth->redirect());
			}
			$this->Session->setFlash(__('Invalid username or password, try again'));
		}
		/*else {
		 if($this->Auth->user('id_user')){
		$this->redirect($this->Auth->redirect());
		}
		}*/
	}
	
	public function logout() {
		return $this->redirect($this->Auth->logout());
	}
	
	public function finduser() {
		if ($this->request->is('post')) {
		$cedresponsable=$this->request->data['User']['cedresponsable'];
		return $this->redirect(array('controller' => 'users', 'action' => 'userlist',$cedresponsable));
		}

	}
	
	public function userlist($cedresponsable=null) {
		$this->set('cedresponsable',$cedresponsable);
		$allusers=$this->User->query("select distinct user.id_user,user.username from responsible inner join (user inner join institution on institution.id_institution=user.institution_id) on  responsible.institution_id= institution.id_institution where responsible.id_responsible = '$cedresponsable'");
		$this->set(compact('allusers'));
		
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}
	
	

	public function index() {
		$usuario_level= $this->Session->read('Auth.User.permission_level');
		if($usuario_level=='2'){
			return $this->redirect(array('controller' => 'users', 'action' => 'login'));
		}
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
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
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}
	
	public function enviarcorreo($userupd=null,$cedresponsable=null){	
		$this->set('userupd',$userupd);	
		$this->set('cedresponsable',$cedresponsable);	
				
		//$correo = $this->request->data['Responsible']['mail'];
		$correo=$this->User->query("select mail from responsible where id_responsible = '$cedresponsable'");
		$this->set('correo',$correo);		
		$Email = new CakeEmail('gmail');
		$Email->from(array('yypv27@hotmail.com' => 'Fiesta del Libro y la Cultura'));
		foreach ($correo as $correo):
		$email_c = $correo['responsible']['mail'];
		endforeach;
		$Email->to($email_c);
		$Email->subject('Link para recuperaci�n de contrase�a');
		$link='http://aplicaciones.medellin.co/reservasfiestadellibro/users/updateuserlogin/'.$userupd;
		$mensaje= "\n\nBIENVENIDO A LA INSCRIPCIÓN DE VISITAS GUIADAS PARA LA FIESTA DEL LIBRO Y LA CULTURA 
\nJardín Lectura Viva es una estrategia de divulgación artística, académica y cultural que tiene en su corazón la promoción de lectura entre el público más joven. Aquí, instituciones educativas, fundaciones y corporaciones que trabajan por el fomento de la literatura se reúnen para acoger a toda la ciudadanía con actividades que incluyen la música, la pintura y la ciencia como recursos para dar a conocer libros y escritores de todas las culturas y regiones. 
\nPor medio de esta herramienta usted asegurará la participación de sus grupos en una visita guiada a la Fiesta del Libro y la Cultura que contiene un recorrido  y un taller de promoción de lectura en Jardín Lectura Viva. Usted mismo podrá decidir la fecha, la hora y el taller en el que participará. Para iniciar el proceso debes registrarte y  crear un usuario. Si ya lo creaste, ingresa tus datos y separe su participación.";
		$Email->send("Por favor de clic en el siguiente link o copielo y peguelo en su navegador ".$link.$mensaje);		
	}
	
	//Creacion de funcion para recuperar el usuario y su contrase�a...
	public function updateuserlogin($userupd = null) 
	{					
		$this->set('userupd',$userupd);	
		if ($this->request->is('post')) {
			
			$newpassword = $this->request->data['User']['password'];
			$repitnewpassword= $this->request->data['User']['repit_password'];
			
			if($newpassword==$repitnewpassword)
			{
			
			$passwordHasher = new SimplePasswordHasher();
			$clavencriptada = $passwordHasher->hash($newpassword);
			
			
			
			$this->set('newpassword',$newpassword);
			$update_usuarios=$this->User->query("UPDATE user SET password = '$clavencriptada' where username = '$userupd'");
			$this->set(compact('update_usuarios'));	
			
			$this->Session->setFlash(__('La contrase�a se ha modificado exitosamente'));
			return $this->redirect(array('controller' => 'users', 'action' => 'login'));
			}
			else{
			$this->Session->setFlash(__('Las contrase�as no coinciden, por favor ingreselas nuevamente'));
			return $this->redirect(array('controller' => 'users', 'action' => 'updateuserlogin',$userupd));	
			}
		}		
	}

/**
 * add method
 *
 * @return void
 */
	public function add($institution = null,$institutionid= null) {
		$this->set('institution',$institution);
		$this->set('institutionid',$institutionid);
		if ($this->request->is('post')) {
			
			
		 $username= $this->request->data['User']['username'];
		 $verificar_usuario=$this->User->query("select distinct username from user where username = '$username'");
		 $this->set('verificar_usuario',$verificar_usuario);
		  if($verificar_usuario==Array( )){
			
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		  }
		  
		  else {
		  	$this->Session->setFlash(__('El nombre de usuario no est� disponible, por favor ingrese uno nuevo.'));
		  }
		  
		}
		$institutions = $this->User->Institution->find('list');
		$this->set(compact('institutions'));
	}
	/**
	 * add method for each user that comes from one institution in specific
	 *
	 * @return void
	 */
	
	public function adduser($institution = null,$institutionid= null) {
		$this->set('institution',$institution);
		$this->set('institutionid',$institutionid);
		if ($this->request->is('post')) {
					  
		  $username= $this->request->data['User']['username'];
		  $pass= $this->request->data['User']['password'];
		 
		  $verificar_usuario=$this->User->query("select distinct username from user where username = '$username'");
		  $this->set('verificar_usuario',$verificar_usuario);
		  if($verificar_usuario==Array( )){
			
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				if ($this->Auth->login()) {
					return $this->redirect($this->Auth->redirect(array('controller' => 'workshops', 'action' => 'index_inscription',$pass)));
				}
				
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		  }
		  else {
		  	$this->Session->setFlash(__('El nombre de usuario no est� disponible, por favor ingrese uno nuevo.'));
		  }	
		}
		$institutions = $this->User->Institution->find('list');
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
		if($usuario_level=='2'){
			return $this->redirect(array('controller' => 'users', 'action' => 'login'));
		}
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$institutions = $this->User->Institution->find('list');
		$this->set(compact('institutions'));
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
