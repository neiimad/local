<?php
	
require_once	WS_CONTROLLER.'wscontroller.php';

class wscontrollerlistedesoffres extends wscontroller {
	public $modelname = 'wsmodelproduct';

    /**
        Constructeur
    **/
	public function wscontrollerlistedesoffres($wscontext = false) {
		parent::wscontroller($wscontext);

		require_once	MODEL.$this->modelname.'.php';
		$this->insertionSystem();
	}

	public function prepareData(){
		parent::prepareData();
	}

	public function getData()
	{
		parent::getData();
		
		return $this->data;
	}
function insertionSystem(){

	$tab[] = array("6", 
				"2013-05-25", 
				"arzcdvkfvdddhfjsksqqlzo",
				"Developpeur application logistique",
				"Contrat : 	CDI",
				"Grande distribution, logistique",
				"Agro alimentaire",
				"Le poste est basé à : LUBUMBASHI. Une mobilité est requise. "
				,"");

		$tab[] = array("7", 
				"2013-05-25", 
				"azertreisjdkflsmdmù",
				"Assistante de direction",
				"Poste : CDD Temps plein",
				"Secteur d'activité : mining",
				"Region : Katanga",
				"Fort interessement exigé"
				,"");


		$tab[] = array("8", 
				"2013-05-25", 
				"arztqsdfghjjksdsdsd",
				"CHAUFFEUR POIDS LOURD",
				"Contrat : 	CDI",
				"Expérience : 	Expérimenté",
				"Localisation : 	LIKASI",
				""
				,"");
	
	foreach($tab as $tabencours) {
		$value = 'VALUES ("'.implode('","',$tabencours).'");';
		$sql =" INSERT INTO product (`idproduct`,`datecreate`, `id_md5`,`title` , `description` ,  `description1` , `description2` ,`description3` , `other`) ".$value;
		//echo $sql;
	}



}

public function addData(){
		parent::addData();
	}

}