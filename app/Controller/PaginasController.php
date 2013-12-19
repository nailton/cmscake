<?php
class PaginasController extends AppController {
	function beforeFilter(){
		parent::beforeFilter();
		if($this->action=='ajax_display')$this->action='display';
		$this->Auth->allow(array('display','menu'));
	}

	function beforeRender(){
		parent::beforeRender();
		$this->set('active','paginas');
	}

    //Lista as páginas na adiminstração
	function admin_index(){
		$retorno =$this->Pagina->find('all',array('order'=>'lft'));
		$this->set('retorno',$retorno);
	}

    //mostra as páginas do site
	function display($slug=null){
		$conteudo=$this->Pagina->find('first',array('conditions'=>array('slug'=>$slug),'fields'=>array('title','descricao','tags','slug','corpo')));
		if(count($conteudo)==0)throw new NotFoundException(__('Ops! Página não encontrada'));
		$conteudo = $conteudo['Pagina'];
		$seo['title']=$conteudo['title'];
		$seo['tags']=$conteudo['tags'];
		$seo['descricao']=$conteudo['descricao'];
		$this->set('conteudo',$conteudo);
		$this->set('seo',$seo);
		$this->render('display');
	}

	function menu(){
		if($this->request->is('requested')){
			$menu=$this->Pagina->find('all',array(
				'conditions'=>array(
					'menu'=>1,
					'habilitar'=>1
					),
				'order'=>'lft'
				));
			return $menu;
		}
	}
	function admin_add(){
		if($this->request->is('post')||$this->request->is('put')):
			$this->Pagina->create();
		if($this->Pagina->save($this->request->data)){
			$this->Session->setFlash(__('Página salva com sucesso!'),'sucesso');
			return $this->redirect(array('action'=>'index'));
			return $this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Página não pode ser salva!'),'erro');
		endif;
	}
	function admin_edita($id=null){
		$this->Pagina->id=$id;
		if(!$this->Pagina->exists())throw new NotFoundException(__('Página não encontrada'));
		if($this->request->is('post')||$this->request->is('put')):
			if($this->Pagina->save($this->request->data)){
				$this->Session->setFlash(__('Página salva com sucesso!'),'sucesso');
			}
			$this->Session->setFlash(__('Página não pode ser salva!'),'erro');
			else:
				$this->request->data=$this->Pagina->read();
			endif;
		}
		function admin_sobe($id=null){
			$this->Pagina->id=$id;
			if(!$this->Pagina->exists())throw new NotFoundException(__('Página não encontrada'));
			$this->Pagina->moveUp($id,abs(1));
			$this->Session->setFlash(__('Posição da página alterada com sucesso!'),'sucesso');
			return $this->redirect(array('action'=>'index'));
		}
		function admin_desce($id=null){
			$this->Pagina->id=$id;
			if(!$this->Pagina->exists())throw new NotFoundException(__('Página não encontrada'));
			$this->Pagina->moveDown($id,abs(1));
			$this->Session->setFlash(__('Posição da página alterada com sucesso!'),'sucesso');
			return $this->redirect(array('action'=>'index'));
		}
		function admin_remove($id=null){
			$this->Pagina->id = $id;
			if(!$this->Pagina->exists())throw new NotFoundException('Página inexistente');
			if($this->Pagina->delete()):
				$this->Session->setFlash(__('Página removida com sucesso!'),'sucesso');
			return $this->redirect(array('action'=>'index'));
			endif;
			$this->Session->setFlash(__('Página não pode ser removida!'),'erro');
			return $this->redirect(array('action'=>'index'));
		}
	}
