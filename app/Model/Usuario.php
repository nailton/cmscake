<?php
App::uses('Security', 'Utility');
class Usuario extends AppModel {
	public $name = 'Usuario';

    public $validate = array(
		'nome' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'O nome não pode ficar em branco!'
            ),
			'unico' => array(
                'rule' => array('minLength',3),
                'message' => 'Nome muito curto!'
            )
        ),
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'O usuário não pode ficar em branco!'
            ),
			'unico' => array(
                'rule' => array('isUnique'),
                'message' => 'Este usuário já tem dono, tente outro!'
            )
        ),
		'email' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'O email não pode ficar em branco!'
            ),
			'unico' => array(
                'rule' => array('isUnique'),
                'message' => 'Este email já está sendo usado!'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A senha é obrigatória!'
            ),
			'minimo' => array(
                'rule' => array('minLength',6),
                'message' => 'A senha é muito curta, o mínimo são 6 caracteres!'
            )
        ),
		'confirma' => array(
			'required' => array(
                'rule' => array('passwordconfirm','password'),
                'message' => 'A senha de confirmação é diferente da sua senha escolhida!'
            )
		)
    );
	public function passwordconfirm($data, $controlField) {
		if (!isset($this->data[$this->alias][$controlField])) {
			trigger_error('O campo de comparação de senha não foi enviado');
			return false;
		}
		$field = key($data);
		$password = current($data);
		$controlPassword = $this->data[$this->alias][$controlField];

		if ($password !== $controlPassword) {
			$this->invalidate($controlField, 'Repita a senha!');
			return false;
		}
		return true;
	}

	//outras funções
	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
			$hash = Security::hash($this->data[$this->alias]['password'], 'blowfish');
            $this->data[$this->alias]['password'] = $hash;
		}
		return true;
	}

}
