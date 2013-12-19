<?php
/**
*
*/
class UsuariosController extends AppController
{

	public function admin_index()
	{
		$retorno = $this->Usuario->find('all'); $this->set('retorno',$retorno);
	}

	public function admin_add($id=null){
		if($id!=null){

			$this->Usuario->id=$id; if (!$this->Usuario->exists())throw new NotFoundException(__('Usuário inexistente'));

		} if($this->request->is('post') || $this->request->is('put')){

			if($this->request->data['Usuario']['password']=='')
				unset($this->request->data['Usuario']['password']);
			if($id==null) $this->Usuario->create();
			if($this->Usuario->save($this->request->data)){

				$this->Session->setFlash(__('Usuário criado com sucesso!'),'sucesso');

				$this->redirect('/admin/');

			}else{

				$this->Session->setFlash(__('Alguma coisa está errada, verifique abaixo!'),'erro');

			}

		} else if($id!=null){

			$user=$this->Usuario->read(); unset($user['Usuario']['password']); $this->request->data=$user;

		}

	}

	public function admin_remove($id=null){
		$this->Usuario->id = $id; if(!$this->Usuario->exists())throw new NotFoundException('Usuario inexistente'); if($this->Usuario->id==1){

			$this->Session->setFlash(__('Você não pode apagar este usuário!'),'erro'); return $this->redirect(array('action'=>'index'));

		} if($this->Usuario->delete()):

		$this->Session->setFlash(__('Usuario removido com sucesso!'),'sucesso'); return $this->redirect(array('action'=>'index'));

		endif;
		$this->Session->setFlash(__('Usuario não pode ser removido!'),'erro'); return $this->redirect(array('action'=>'index'));

	}

	public function admin_login(){
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Auth->login()) {
       			 //adiciona 1 acesso
				$this->Usuario->id=$this->Auth->user('id');
				$this->Usuario->set('acessos',$this->Auth->user('acessos')+1);
				$this->Usuario->save();

        			//seta o cookie
				if($this->request->data['Usuario']['lembrar']==1) $this->__criaLembrar($this->Usuario->read());

				$this->Session->setFlash(__('Logado com sucesso!'), 'sucesso');
				return $this->redirect($this->Auth->redirectUrl());
			} else {
				$this->Session->setFlash(__('Usuário ou senha não encontrados, tente novamente ou verifique se sua conta está ativada!'), 'erro');
			}
		}else{
			if($this->Cookie->check('lembrar')) $this->__logaLembrar();
		}
	}

	public function admin_logout(){
		$this->Cookie->destroy('lembrar');
		$this->redirect($this->Auth->logout());
	}

	protected function __criaLembrar($user){
		$user=$user['Usuario'];
		$user=array(
			'id'=>$user['id'],
			'user'=>$user['username'],
			'pass'=>$user['password']
			);

		$this->Cookie->write('lembrar', $user, true, '2 weeks');
	}

	protected function __logaLembrar(){
		$cookie=$this->Cookie->read('lembrar');
		$this->Usuario->id=$cookie['id'];
		$user=$this->Usuario->read();
		$user=$user['Usuario'];
		if($user['username']==$cookie['user']&&$user['password']==$cookie['pass']){
			unset($user['password']);
			if($this->Auth->login($user)){
				return $this->redirect($this->Auth->redirectUrl());
			}
		}
	}

}

