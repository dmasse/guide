<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	
	
	
	public $components = array('Session','Cookie','Auth') ;
			
			
			
		

	function beforeFilter(){
	//	$this->Auth->loginAction = array('controller'=>'users','action'=>'login','membre'=>false,'admin'=>false);
	//	if(!isset($this->request->params['prefix'])){ //acces qu aux membres avec le prefixes
	
		$this->Auth->authenticate = array(
            'Form' => array(
                'fields' => array('username' => 'identifiant', 'password' => 'mdp'),
                'userModel' => 'User',
            		'scope'=> array('User.active'=> 1)
                )
			
				);
		$this->Auth->allow('registration','login','logout','password','home','display','activate','resume_profil');
	//}
	}
		
	function beforeRender()
	{
		
		//permet de passer des champs de la session dans des vues
		$this->set('SessionTypePers', $this->Auth->user('type_personne'));
		$this->set('Sessionguide', $this->Auth->user('guide_id'));
	}	
		
		
		
		
	}

