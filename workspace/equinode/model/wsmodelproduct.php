<?php
	
require_once	WS_MODEL.'wsmodel.php';

class wsmodelproduct extends wsmodel {

    /**
        Constructeur
    **/
	public function wsmodelproduct($front = '') {
		
		$this->limit 		= NULL;
		$this->loadAll		= true;
		$this->tablesList	= array('menu','product');

		//$this->tablesList	= array('front','region','departement');

		//$this->tablesList	= array('front f', 'bloc b', 'element e');
		//$this->tablesJoin	= array('fr.id' => 'bl.id_front');
		//$this->tablesOrder	= array('b.bloc_place' => 'ASC', 'e.element_place' => 'ASC');
		$this->tablesOrder	= array('m.element_label' => 'ASC');
		parent::wsmodel($front);
		
		/*
		$query = "SELECT *  ".
				 "FROM front f, bloc b, element e ".
				 "WHERE f.front_label = '$front' AND f.id = b.id_front  AND b.id = e.id_bloc  
		          AND bloc_disabled <> 'Y' 
				  
				  ORDER BY b.bloc_place, e.element_place";
				  //echo "modeldefault : ".$query;
		
		$this->executequery($query);
		*/
	}
	
	
	/*
	
	public function afterquery() {
		
		if(isset($this->data['result']) && !empty($this->data['result'])){
			foreach ($this->data['result'] as $data)
			{
				$result[$data['bloc_place']][$data['bloc_label']][$data['element_place']][] = $data;
			}
			$this->data['result'] = $result;
			//print_r($this->data);
		}	
		return $this->data;
		
	}
*/
    
	public function prepareData(){
		parent::prepareData();
		//print_r($this->data);
		//SUITE POSSIBLE ICI

	}
	
}
