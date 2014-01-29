<?php
	
require_once	WS_CONTROLLER.'wscontroller.php';

class wscontrollerconnexion extends wscontroller {
	public $modelname = 'wsmodelconnexion';


    /**
        Constructeur
    **/
	public function wscontrollerconnexion($wscontext = false) {
		parent::wscontroller($wscontext);
		
		require_once	MODEL.$this->modelname.'.php';
	}
	
	public function isCacheable (){
		return false;
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
		

		// session user 
		if (!$this->wscontext->isregistered('wsuser'))
		{
			$query = "SELECT * FROM member WHERE email = '".$this->wscontext->getPost('email')."' AND password='".$this->wscontext->getPost('password')."'";
			$this->model->executequery($query,'wsuser');

			$users = $this->model->getData('wsuser');
			
			if (is_array($users)){
				$user = (is_array($users[0])) ? $users[0] : $users;
				$this->data['wsuser'] = $user;
				//echo "<br />BASE DE DONNEE<br />";				
				$this->wscontext->register('wsuser');
				$this->wscontext->set('wsuser', $user);

			}
			else
			{
				if(!empty($this->data['POST']))
				{
					$this->data['wswarning'] = array('bad'=>"Erreur lors de l'identification");
					//echo "<br />WARNING ";print_r($this->data['wswarning']);
				}
			}
		}
                     



		//print_r($this->data['wsuser']);

		//print_r($this->data['front']['page_middle']['contenu_connexion']['inner']);

	}

}