<?php
class InstalaAppController extends AppController {
	function beforeFilter(){
		// $this->Auth->allow();
		$this->set('user',false);
	}
}
