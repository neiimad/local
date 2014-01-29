<?php
	
require_once	WS_CONTROLLER.'wscontroller.php';

class wscontrollerprofil extends wscontroller {
	public $modelname = 'wsmodeldefault';

    /**
        Constructeur
    **/
	public function wscontrollerprofil ($wscontext = false) {
		parent::wscontroller($wscontext);

		require_once	MODEL.$this->modelname.'.php';
	}

	public function prepareData(){
		parent::prepareData();
	}

	public function getData()
	{
		parent::getData();
		
		if($this->wscontext->getGet('delete') == "Y")
		{
			//echo 'deded';
			$table = 'member';
			$fieldArray = array('deleted'=>'Y','datemodif'=>date("Y-m-d H:i:s"));
			$where = 'id_md5="'.mysql_real_escape_string($this->wscontext->getGet('IdP')).'"';
			$this->model->updatequery($table,$fieldArray,$where);
		}
		
		if($this->wscontext->getGet('IdP') != "")
		{
			//CONTROEL INJECTION SQL $this->wscontext->getGet('IdM')
			$query = "SELECT * FROM member WHERE id_md5 ='".mysql_real_escape_string($this->wscontext->getGet('IdP'))."'";
			$this->model->executequery($query,'wsprofil');

			$profils = $this->model->getData('wsprofil');
			
			if (is_array($profils)){
				$profil = (is_array($profils[0])) ? $profils[0] : $profils;
				$this->data['wsprofil'] = $profil;
				//echo "<br />BASE DE DONNEE<br />";
				//$this->wscontext->register('wsprofil');
				$this->wscontext->set('wsprofil', $profil);
			
			}
			else
			{
				//PAS DE MEMBRE EN BASE CORRESPONDANT à IdM
			}

		}


		$this->data['POST'] = $this->wscontext->get('wsprofil');

		return $this->data;
	}

	public function addData(){
		parent::addData();
	}

}