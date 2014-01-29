<?php
	
require_once	WS_MODEL.'wsmodel.php';

class wsmodelconnexion extends wsmodel {

    /**
        Constructeur
    **/
	public function wsmodelconnexion($front = '') {
		
		$this->limit 		= NULL;
		$this->loadAll		= true;
		$this->tablesList	= array('menu');

		parent::wsmodel($front);
	}
	
	public function prepareData(){
		parent::prepareData();

	}
	
}
