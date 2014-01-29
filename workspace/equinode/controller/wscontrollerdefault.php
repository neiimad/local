<?php
	
require_once	WS_CONTROLLER.'wscontroller.php';

class wscontrollerdefault extends wscontroller {
	public $modelname = 'wsmodeldefault';

    /**
        Constructeur
    **/
	public function wscontrollerdefault($wscontext = false) {
		parent::wscontroller($wscontext);
		
		require_once	MODEL.$this->modelname.'.php';
	}

	public function prepareData(){
		parent::prepareData();
	}

	public function getData()
	{
		parent::getData();
		return $this->data;
	}

	public function addData(){
		parent::addData();

		//print_r($this->data);
	}

}