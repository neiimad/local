<?php
	
require_once	WS_CONTROLLER.'wscontroller.php';

class wscontrollerficheoffre extends wscontroller {
	public $modelname = 'wsmodeldefault';

    /**
        Constructeur
    **/
	public function wscontrollerficheoffre ($wscontext = false) {
		parent::wscontroller($wscontext);

		require_once	MODEL.$this->modelname.'.php';
	}

	public function prepareData(){
		parent::prepareData();
	}

	public function getData()
	{
		parent::getData();

		if($this->wscontext->getGet('published') == "Y")
		{
			//echo 'published';
			$table = 'product';
			$fieldArray = array('published'=>'Y', 'datemodif'=>date("Y-m-d H:i:s"), 'datepublished'=>date("Y-m-d H:i:s"), 'deleted'=>'N');
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
				//$this->wscontext->register('product');
				$this->wscontext->set('wsproduct', $product);
			
			}
			else
			{
				//PAS DE PRODUIT EN BASE CORRESPONDANT à IdP
			}

		}


		$this->data['POST'] = $this->wscontext->get('wsproduct');
		$this->data['pays'] = $this->getCodespays();

		//print_r($this->data['POST']);

		return $this->data;
	}

	public function addData(){
		parent::addData();
	}

}