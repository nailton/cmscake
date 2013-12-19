<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
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
	public $helpers = array(
		'Html' => array('className' => 'BootstrapHtml'),
		'Form' => array('className' => 'BootstrapForm'),
		'Paginator' => array('className' => 'BootstrapPaginator'),
		'Link' =>array('className' => 'Link'),
		);

	public $components = array(
		'Session',
		'Cookie',
		'Auth' => array(
			'loginAction'=>array(
				'admin'=>true,
				'controller'=>'Usuarios',
				'action'=>'login'
				),
			'authenticate'=>array(
				'Blowfish'=>array(
					'userModel' => 'Usuario',
					)
				),
			'loginRedirect' => '\admin',
			'logoutRedirect' => '\admin'
			),
		);

	function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow(array('display','menu'));
	}

	public function beforeRender(){
		if(isset($this->request->params['prefix'])){

			if($this->request->params['prefix']=='admin') $this->layout='default';
			if($this->request->params['prefix']=='ajax') $this->layout='ajax';
			$this->set('user',$this->Auth->User());
			$this->set('active','home');

		}else{

			$this->theme=Configure::read('theme');
			if($this->Auth->User()){
				$configs['titulo']=$this->Auth->User('titulo');
			}else{
				$this->loadModel('Usuario');
				$user=$this->Usuario->find('first',array(
					'conditions'=>array('id'=>1),
					'fields'=>array('titulo')
					));
				$configs['titulo']=$user['Usuario']['titulo'];
			}
			$this->set('configs',$configs);

		}

		if($this->request->is('ajax')){

			$this->layout='ajax';

		}
	}
}
