<?php
	
require_once	WS_MODEL.'wsmodel.php';

class wsmodelmembres extends wsmodel {

    /**
        Constructeur
    **/
	public function wsmodelmembres($front = '') {
		
		$this->limit 		= NULL;
		$this->loadAll		= true;
		$this->tablesList	= array('menu','member','region','departement');
		$this->tablesWhere	= array('member' => 'WHERE deleted="N"');

		parent::wsmodel($front);
	}
	
	public function prepareData(){
		parent::prepareData();

	}
	
}
