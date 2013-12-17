<?php

class InstalaController extends InstalaAppController {
	public $name = 'Instala';

	public function index() {
		App::uses('SchemaInstallShell', 'Instala.Console/Command');
		$this->My = new SchemaInstallShell();
		$this->My->startup();
		$db = ConnectionManager::getDataSource('default');
		$db = $db->listSources();
		$tables = array_diff($this->My->checkInstalacao(),$db);
		if(count($tables)==0){
			return($this->redirect(array('action'=>'cadAdmin')));
		}
	}

	public function bancodedados(){

			App::uses('SchemaInstallShell', 'Instala.Console/Command');
			$this->My = new SchemaInstallShell();
			$this->My->startup();
			$db = ConnectionManager::getDataSource('default');
			$db = $db->listSources();
			$tables = array_diff($this->My->checkInstalacao(),$db);
			if(count($tables)!=0){
				$this->My->instala();
			}else{
				return($this->redirect(array('action'=>'cadAdmin')));
			}
	}

	public function cadAdmin(){
		$this->loadModel('Usuario');
		if($this->Usuario->find('count')>0)throw new ForbiddenException(__('Ops! você não pode fazer isso'));
		if($this->request->is('post')||$this->request->is('put')){
			$this->Usuario->create();
			if($this->Usuario->save($this->request->data)){
				return $this->redirect('/');
			}else{
				$this->Session->setFlash('Não pode ser criado o usuário administrador, tente novamente!');
			}
		}
	}
}
