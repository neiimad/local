<?php
	
require_once	WS_CONTROLLER.'wscontroller.php';

class wscontrollerelements extends wscontroller {
	public $modelname = 'wsmodeldefault';

    /**
        Constructeur
    **/
	public function wscontrollerelements ($wscontext = false) {
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

		if (!empty($this->data['POST'])){
			$rc = true;

			//print_r($this->data['POST']);
			
			//rule of post
			$formdefs = Array ( 	'context' => array(), 
									'toUrl' => array(),
									'prenom' => array('mandatory'),
									'civility' => array('mandatory'),
									'lastname' => array('mandatory'),
									'address1' => array('mandatory'),
									'address2' => array(),
									'phone' => array('numeric'),
									'mail' => array('mandatory','email')//,
									//'mail_confirm' => array('mandatory','email','confirm')
						);
			//control
			foreach($this->data['POST'] as $key => $value){
				if (in_array($key, array_keys($formdefs))){

					//echo '<br />'.$key.' : '; print_r($formdefs[$key]);

					if (!empty($formdefs[$key]))
					foreach($formdefs[$key] as $rule){
						$method = $rule;
						if (method_exists($this, $rule))
						{
							$warn = $this->$method($key, $value);
							if ($warn){
								$rc = false;
							}
						}
					}
				}
			}

			if ($rc)
			{/*
				//SUCCES
				$this->wscontext->register('recap');
				$this->wscontext->set('recap', $this->data['POST']);
				//print_r($this->wscontext->get('recap'));
				//print_r($this->data['POST']);die;
				
				
				//PROCEDURE INSERT BD
				$this->model->executequery("DESCRIBE `member`", 'mapping');
				$fieldsmapp = $this->model->getData('mapping');
		
				$recap = $this->wscontext->get('recap');
				foreach($fieldsmapp as $resultmapping)
				{
					$resultmapping['Value']			= $recap[$resultmapping['Field']];
					$tmp[$resultmapping['Field']]	= $resultmapping;
				}
				//default value for member
				$tmp['deleted']['Value']	 = 'N';
				$tmp['language']['Value']	 = 'FR';
				$tmp['datecreate']['Value']  = date("Y-m-d H:i:s");

				$buf="";
				$str="23456789ABCDEFGHJKLMNPQRSTUVWXYZ";
				for ($ii=1; $ii<=6;$ii++)
				{
					$buf.= substr($str,rand(0,31),1);
				}
				$tmp['password']['Value'] = $buf;
				$tmp['id_md5']['Value']   = md5($tmp['email']['Value'].$tmp['password']['Value']);
				

				//addspecific
				$this->data['tablemapping'] = $tmp;
			    //print_r($this->data['tablemapping']);//die		
				
				//preparedata for insert
				foreach($this->data['tablemapping'] as $fieldname => $values)
				{
					    if ($values['Value'] != "")
							$fieldArray[$fieldname] = $values['Value'];
				}
				//insert
				$table = "member";
				$rc = $this->model->insertquery($table,$fieldArray);
				
				//redirect
				if($rc)
				{
					header("Location: recapitulatif");
					exit;	
				}
				
				
				
				*/
			}
		}//end post


	}//end addData

}