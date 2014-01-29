<?php
	
require_once	WS_CONTROLLER.'wscontroller.php';

class wscontrollerlistedesmembres extends wscontroller {
	public $modelname = 'wsmodelmembres';

    /**
        Constructeur
    **/
	public function wscontrollerlistedesmembres($wscontext = false) {
		parent::wscontroller($wscontext);
		require_once	MODEL.$this->modelname.'.php';
	}

	public function prepareData(){
		parent::prepareData();
	}

	public function getData()
	{
		parent::getData();
		//print_r($this->data);
		return $this->data;
	}

	public function addData(){
		parent::addData();
	}

}