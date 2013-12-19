<?php
class SeoController extends AppController{
	public $components = array('RequestHandler');
	public function beforeFilter(){
		$this->Auth->allow(array('robots','sitemap'));
	}

	function admin_index(){
		$this->Seo->id=1;
		if(!$this->Seo->exists())$this->Seo->create();
		if($this->request->is('post')||$this->request->is('put')):
			if($this->Seo->save($this->request->data)){
				$this->Session->setFlash(__('Configuração salva com sucesso!'),'sucesso');
			}else{
				$this->Session->setFlash(__('Configuração não pode ser salva!'),'erro');
			}
			else:
				$this->request->data=$this->Seo->read();
			endif;
		}

		public function robots(){
			$this->layout='ajax';

			$this->RequestHandler->respondAs('text');
			$this->Seo->id = 1;
			$this->set('retorno',$this->Seo->read());
		}
		public function sitemap(){
			$this->layout='ajax';
			$this->Seo->id = 1;
			$retorno = $this->Seo->read();
			if($retorno['Seo']['sitemap']=='NULL'):
				$sitemap=$retorno['Seo'];
			else:
				$this->loadModel('Pagina');
			$sitemap = $this->Pagina->find('all');
			endif;
			$this->set('sitemap',$sitemap);
			$this->RequestHandler->respondAs('xml');
		}
	}
