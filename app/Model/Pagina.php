<?php
class Pagina extends AppModel{
     //habilita o TreeBehavior que será usado no menu
	public $actsAs = array('Tree');

    	//faz com que o título seja obrigatório e único
	public $validate = array(
		'titulo' => array(
			'unico' => array(
				'rule'     => 'isUnique',
				'message'  => 'Já existe uma página com este nome, escolha outro.'
				),
			'obrigatorio'=>array(
				'rule' => 'notEmpty',
				'message'  => 'O título da página não pode ficar em branco.'
				)
			)
		);

    	//antes de salvar:
	public function beforeSave($options = array()) {
        	//verifica se o título foi enviado
		if(isset($this->data['Pagina']['titulo'])){
            	//e seta o title igual, caso  esteja vazio
			if (!isset($this->data['Pagina']['title'])|| empty($this->data['Pagina']['title']))
				$this->data['Pagina']['title']=$this->data['Pagina']['titulo'];

           		 //caso o slug esteja veio usa o titulo
			if (!isset($this->data['Pagina']['slug'])|| empty($this->data['Pagina']['slug'])){
               		 //e usa o inflector pra fazer o slug com traço, troque o '-' por underline se qusier.
				$this->data['Pagina']['slug']=Inflector::slug(strtolower($this->data['Pagina']['titulo']),'-');
			}else{
                		//faz o mesmo, mas com o slug se ele tiver sido enviado
				$this->data['Pagina']['slug']=Inflector::slug(strtolower($this->data['Pagina']['slug']),'-');
			}
            	//aqui, caso não exista o campo menu, ele é setado para 1
			if (!isset($this->data['Pagina']['menu']))
				$this->data['Pagina']['menu']=1;
            	//aqui, caso não exista o campo hamilitar, ele é setado para 1
			if (!isset($this->data['Pagina']['habilitar']))
				$this->data['Pagina']['habilitar']=1;
		}

        	//e se você alterar isso pra false, não salva, hehehe
		return true;
	}
}
