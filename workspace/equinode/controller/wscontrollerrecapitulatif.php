<?php
	
require_once	WS_CONTROLLER.'wscontroller.php';

class wscontrollerrecapitulatif extends wscontroller {
	public $modelname = 'wsmodeldefault';

    /**
        Constructeur
    **/
	public function wscontrollerrecapitulatif($wscontext = false) {
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
		
		if ($this->data['POST'] == '')
		{
			$this->data['POST'] = $this->wscontext->get('recap');
		}	
		$this->wscontext->freePost();

		//print_r($this->data);
	}

}