<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    //...

    public $components = array(
    	'RequestHandler',
        'DebugKit.Toolbar',
		'Session',
        'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'Workshops',
                'action' => 'index_inscription'
            ),
            'logoutRedirect' => array(
                'controller' => 'users',
                'action' => 'login',
                //'home'
            ),
       'authorize' => array('Controller')
        )
    );
  /*  public function isAuthorized($user) {
    	// Admin can access every action
    	if ((isset($user['permission_level']) && $user['permission_level'] === '1') || (isset($user['permission_level'])&& $user['permission_level'] === '1' )) {
    		return true;
    	}
    
    	// Default deny
    	return false;
    }*/
   /*
    public function isAuthorized($user) {
    	// Any registered user can access public functions
    	/*if (empty($this->request->params['admin'])) {
    		return true;
    	}
    
    // Only admins can access admin functions
    	if (isset($this->request->params['admin'])) {
    		return (bool)($user['role'] === '2');
    	}*/
    /*
    	if (isset($user['permission_level']) && ($user['permission_level'] === '1')) {
    		return true;
    	}
    	

    	
    	// Default deny
    	return false;
    	
    }
    */
    	public function beforeFilter() {
        //$this->Auth->allow('index', 'view');
        if ($this->Session->check('Config.language')) {
        	Configure::write('Config.language', $this->Session->read('Config.language'));
        }




    }
  

}
