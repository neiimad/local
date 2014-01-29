<?php
	
require_once	WS_CONTROLLER.'wscontroller.php';

class wscontrollersaisieoffre extends wscontroller {
	public $modelname = 'wsmodeldefault';

    /**
        Constructeur
    **/
	public function wscontrollersaisieoffre($wscontext = false) {
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
									'title' => array('check_mandatory')
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
			{
				//SUCCES
				$this->wscontext->register('recap');
				$this->wscontext->set('recap', $this->data['POST']);
				//print_r($this->wscontext->get('recap'));
				//print_r($this->data['POST']);die;
			
			
				
				$this->model->executequery("DESCRIBE `product`", 'mapping');
				$fieldsmapp = $this->model->getData('mapping');

				$recap = $this->wscontext->get('recap');
				foreach($fieldsmapp as $resultmapping)
				{
					$resultmapping['Value']			= $recap[$resultmapping['Field']];
					$tmp[$resultmapping['Field']]	= $resultmapping;
					
				}
			
			
				if ($this->wscontext->get('IdP') != "")
				{
					//print_r($tmp);
					
					$tmp['datemodif']['Value']  = date("Y-m-d H:i:s");
					
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
					$table = "product";
					$where = ' `id_md5` = "'.$this->wscontext->get('IdP').'"';
					//print_r($fieldArray);
					$rc = $this->model->updatequery($table,$fieldArray,$where);
				}
				else
				{
					//PROCEDURE INSERT BD
					
					
					//default value for member
					$tmp['deleted']['Value']	 = 'N';
					$tmp['published']['Value']	 = 'N';
					$tmp['datecreate']['Value']  = date("Y-m-d H:i:s");
					$tmp['datemodif']['Value']   = date("Y-m-d H:i:s");

					$buf="";
					$str="123456789ABCDEFGHJKLMNPQRSTUVWXYZ";
					for ($ii=1; $ii<=6;$ii++)
					{
						$buf.= substr($str,rand(0,31),1);
					}
					//$tmp['password']['Value'] = $buf; // num reference

					$tmp['id_md5']['Value'] = md5((string)microtime().$buf);


					//addspecific
					$this->data['tablemapping'] = $tmp;
				    //print_r($this->data['tablemapping']);//die		

					//preparedata for insert
					foreach($this->data['tablemapping'] as $fieldname => $values)
					{
						    if ($values['Value'] != "")
								$fieldArray[$fieldname] = $values['Value'];
					}
					//print_r($fieldArray);

					//insert
					$table = "product";
					$rc = $this->model->insertquery($table,$fieldArray);
				}
				

				
					
				//redirect
				if ($rc)
				{
					$this->deleteCacheUserProduct();

					header("Location: liste-des-offres");
					exit;	
				}

			}
		}//end post
		/*
		else // CAS PAS DE POST RECUPERATION PROFIL SI EXISTE EN GET
		{
			if($this->wscontext->getGet('IdP') != "")
			{
				$this->wscontext->register('IdP');
				$this->wscontext->set('IdP',$this->wscontext->getGet('IdP'));

				//CONTROEL INJECTION SQL $this->wscontext->getGet('IdM')
				$query = "SELECT * FROM member WHERE id_md5 ='".mysql_real_escape_string($this->wscontext->getGet('IdP'))."'";
				$this->model->executequery($query,'wsprofil');

				$profils = $this->model->getData('wsprofil');

				if (is_array($profils)){
					$profil = (is_array($profils[0])) ? $profils[0] : $profils;
					$this->data['POST'] = $profil;
					//print_r($this->data['POST']);
					//echo "<br />BASE DE DONNEE<br />";
					//$this->wscontext->register('wsprofil');
					//$this->wscontext->set('wsprofil', $profil);

				}
				else
				{
					//PAS DE MEMBRE EN BASE CORRESPONDANT à IdM
				}

			}
		}	
			*/


	}//end addData

	public function deleteCacheUserProduct()
	{
		$file = CACHE . md5($_SERVER["HTTP_HOST"].'/app/workspace/equinode/liste-des-offres');
		//echo $file;
		if (file_exists($file)){
			unlink($file);
		}
	}
}