<?php
	
require_once	WS_CONTROLLER.'wscontroller.php';

class wscontrollereditionoffre extends wscontroller {
	public $modelname = 'wsmodeldefault';

    /**
        Constructeur
    **/
	public function wscontrollereditionoffre ($wscontext = false) {
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
			$table = 'product';
			$fieldArray = array('deleted'=>'Y','datemodif'=>date("Y-m-d H:i:s"),'published'=>'N');
			$where = 'id_md5="'.mysql_real_escape_string($this->wscontext->getGet('IdP')).'"';
			$this->model->updatequery($table,$fieldArray,$where);
		}
		
		if($this->wscontext->getGet('IdP') != "")
		{
			//CONTROEL INJECTION SQL $this->wscontext->getGet('IdM')
			$query = "SELECT * FROM product WHERE id_md5 ='".mysql_real_escape_string($this->wscontext->getGet('IdP'))."'";
			$this->model->executequery($query,'wsproduct');

			$products = $this->model->getData('wsproduct');
			
			if (is_array($products)){
				$product = (is_array($products[0])) ? $products[0] : $products;
				$this->data['wsproduct'] = $product;
				//echo "<br />BASE DE DONNEE<br />";
				//$this->wscontext->register('wsproduct');
				$this->wscontext->set('wsproduct', $product);
				
				$this->data['POST'] = $this->wscontext->get('wsproduct');
				$this->data['POST']['disabled'] = 'N';
				$this->data['form_hidden_fields'] = array();
				$this->data['form_hidden_fields']['id_md5'] = $this->data['POST']['id_md5'];
				$this->data['form_hidden_fields']['datecreate'] = $this->data['POST']['datecreate'];
				$this->data['form_hidden_fields']['datemodif'] = date("Y-m-d H:i:s");
			}
			else
			{
				//PAS DE PRODUIT EN BASE CORRESPONDANT à IdM
			}

		} 
		else 
		{	
			$rc = true;

			$this->data['form_hidden_fields']['id_md5'] = $this->data['POST']['id_md5'];
			$this->data['form_hidden_fields']['datecreate'] = $this->data['POST']['datecreate'];
			$this->data['form_hidden_fields']['datemodif'] = date("Y-m-d H:i:s");
			$this->data['POST']['disabled'] = 'N';
			//print_r($this->data['POST']);
/*
			//rule of post
			$formdefs = Array ( 	'context' => array(), 
									'toUrl' => array(),
									'firstname' => array('check_mandatory'),
									'lastname' => array('check_mandatory'),
									'civility' => array('check_mandatory'),
									'address1' => array('check_mandatory'),
									'address2' => array(),
									'phone' => array('check_numeric'),
									'email' => array('check_mandatory','check_email')//,
									//'email_confirm' => array('check_mandatory','check_email','check_confirm')
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
*/
			if ($rc)
			{
				//SUCCES
				$recap = $this->data['POST'];

				$this->model->executequery("DESCRIBE `product`", 'mapping');
				$fieldsmapp = $this->model->getData('mapping');

				foreach($fieldsmapp as $resultmapping)
				{
					$resultmapping['Value']			= $recap[$resultmapping['Field']];
					//echo $resultmapping['Field'] . ' ::: ';
					$tmp[$resultmapping['Field']]	= $resultmapping;
				}
				//print_r($tmp);
				
				//addspecific
				$this->data['tablemapping'] = $tmp;
			    //print_r($this->data['tablemapping']);//die		

				//preparedata for insert
				$fieldArray = array();
				foreach($this->data['tablemapping'] as $fieldname => $values)
				{
					    if ($values['Value'] != "")
							$fieldArray[$fieldname] = mysql_real_escape_string($values['Value']);
				}
				//print_r($fieldArray);
				
				//update
				$table = "product";
				$where = 'id_md5="'.mysql_real_escape_string($this->data['POST']['id_md5']).'"';
				$rc = $this->model->updatequery($table,$fieldArray,$where);
				
				if ($rc){
					$this->data['POST']['disabled'] = 'Y';
					
					$this->deleteCacheUserProduct();
				}
			}
		}

		$this->data['pays'] = $this->getCodespays();

		return $this->data;
	}

	public function addData(){
		parent::addData();
	}

	public function isCacheable(){
		return false;
	}

	public function deleteCacheUserProduct()
	{
		$file = CACHE . md5($_SERVER["HTTP_HOST"].'/workspace/equinode/offer/?IdP='.$this->data['POST']['id_md5']);
		//echo $file;
		if (file_exists($file)){
			unlink($file);
		}
		$file = CACHE . md5($_SERVER["HTTP_HOST"].'/workspace/equinode/liste-des-offres');
		//echo $file;
		if (file_exists($file)){
			unlink($file);
		}
	}

}