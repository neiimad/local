<?php
	
require_once	WS_CONTROLLER.'wscontroller.php';

class wscontrollercontact extends wscontroller {
	public $modelname = 'wsmodeldefault';

    /**
        Constructeur
    **/
	public function wscontrollercontact ($wscontext = false) {
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
									'subject' => array('check_mandatory'),
									'email' => array('check_mandatory','check_email'),
									'message' => array('check_mandatory')//,
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
				
				$subject = $this->data['POST']['subject'];
				$message = $this->data['POST']['message'];
				
				$to = null;
				$from = null;
				if ($this->data['wsuser']['type'] == 'administrator')
					$to = $this->data['POST']['email'];
				else // non connecte ou pas admin
					$from = $this->data['POST']['email'];
				
				if ($this->email($subject, $message, $to, $from))
				{
					$this->data['email_sent'] = true;
				}
			}
		}

	}//end addData

}