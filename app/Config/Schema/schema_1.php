<?php
App::uses('Seo', 'Model');
App::uses('Pagina', 'Model');
class AppSchema extends CakeSchema {

	public function before($event = array()) {
		$db = ConnectionManager::getDataSource('default');
		$db->cacheSources = false;
		return true;
	}

	public function after($event = array()) {
		if (isset($event['create'])) {
			switch ($event['create']) {
				case 'seos':

				App::uses('ClassRegistry', 'Utility');
				$post = ClassRegistry::init('Seo');
				$post->create();
				$post->save(

					array('Seo' =>

						array('robots' =>
							'User-agent: *
							Disallow: /admin'
							)

						)
					);
				break;

				case 'paginas':

				App::uses('ClassRegistry', 'Utility');
				$post = ClassRegistry::init('Pagina');
				$post->create();
				$post->save(

					array('Pagina' =>

						array(
							'titulo' => 'Home',
							'title' => 'Home',
							'slug' => 'home',
							'menu'=>'1',
							'habilitar'=>'1',
							'lft'=>'1',
							'rght'=>'2',
							'parent_id'=>'0'
							)

						)

					);
				break;

			}

		}
	}

	public $usuarios = array(

		'id' => array('type' => 'integer', 'key' => 'primary'),
		'nome' => array('type' => 'string', 'length' => 250),
		'username' => array('type' => 'string', 'length' => 50),
		'email' => array('type' => 'string', 'length' => 500),
		'password' => array('type' => 'string', 'length' => 60),
		'titulo' => array('type' => 'text'),
		'acessos' => array('type' => 'integer'),
		'created' => array('type' => 'datetime'),
		'modified' => array('type' => 'datetime'),
		'indexes' => array(

			'PRIMARY' => array('column' => 'id', 'unique' => 1)

			),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')

		);

	public $paginas = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'titulo' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 512, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'corpo' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'title' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 512, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'descricao' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'tags' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 512, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'slug' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 512, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'menu' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 1),
		'habilitar' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 1),
		'parent_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'lft' => array('type' => 'integer', 'null' => true, 'default' => null),
		'rght' => array('type' => 'integer', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
			),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
		);

public $seos = array(

	'id' => array('type' => 'integer', 'key' => 'primary'),
	'robots' => array('type' => 'text'),
	'sitemap' => array('type' => 'text'),
	'google_confirm' => array('type' => 'text'),
	'indexes' => array(

		'PRIMARY' => array('column' => 'id', 'unique' => 1)

		),
	'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')

	);

public $sliders = array(

	'id' => array('type' => 'integer', 'key' => 'primary'),
	'imagem' => array('type' => 'string', 'length' => 250),
	'titulo' => array('type' => 'string', 'length' => 250),
	'descricao' => array('type' => 'text'),
	'parent_id' => array('type' => 'integer'),
	'lft' => array('type' => 'integer'),
	'rght' => array('type' => 'integer'),
	'pagina_id' => array('type' => 'integer'),
	'indexes' => array(

		'PRIMARY' => array('column' => 'id', 'unique' => 1)

		),
	'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')

	);

}
