<?php

class wsmodel {
    
    private $db;
	//private $table;
    protected $tablesList   = array();
	protected $tablesFields = array();
	protected $tablesJoin   = array();
	protected $tablesOrder  = array();
	protected $tablesWhere  = array();
	

	protected $loadAll	    = false;
	protected $loadfront    = true;//activation de chargement du front
	
	protected $front        =  "";//label du front
	protected $data;
	protected $limit	    = NULL;

    /**
        Constructeur
    **/
	protected function wsmodel($front = '') {
		//echo "<br /> "."wsmodel : - front : "."<br />"; print_r($front);
		$this->db = MySql::obtain();
		$this->db->connect();
		$this->front = $front;
		$this->prepareData();
    }

    public function prepareData() {
		//echo "<br /> "."ws model : prepareData - front : "."<br />"; print_r($this->front);
		$this->getAll();
		$this->getwsfront();
		return true;
	}
	
	public function getwsfront($front = '')
	{
		if ($this->front == "")
			return false;

		if ($this->loadfront)
		{
			//echo "<br /> DEMARRAGE DE : wsmodel -> loadfront"." - FRONT - ".$this->front." - DB - ";
			require_once		  WS_MODEL.'wsmodelfront.php';
			$wsmodeldefront		  = new wsmodelfront($this->front, $this->db);
			$frontdata			  = $wsmodeldefront->getData();
			$this->data['front']  = $frontdata['front'];
			//echo "<br /> RETOUR DE : wsmodel -> getwsfront this->data['front'] "; print_r($this->data); die;
			/////// DEPRACTED $this->data = $wsmodeldefront->getData();
			return true;
		}

		return false;
	}

 	public function getAll() {	
//		echo "<br /> ws model : getAll";
		if (!$this->loadAll) return false;
//		echo "<br /> ws model : loadAll";
		if (!empty($this->tablesList)){
//			echo "<br /> ws model : tablesList"; print_r($this->tablesList);
			if(!empty($this->tablesJoin))
				$this->getTableJoin();
			else
				$this->getTables($this->tablesList);

			return true;
		}
	}

	public function getTables($tablesList=array()) {	
		foreach($tablesList as $table)
			$this->getTable($table) ;
	}	

	public function getTable($table) {
		if (isset($this->tablesWhere[$table]) && $this->tablesWhere[$table] != '')
		{
			$query = 'SELECT * FROM '.$table.' '.$this->tablesWhere[$table];
			$this->executequery($query, $table);
		}
		else
		{
			$this->data[$table] = $this->db->selectall($table, $this->limit);
		}
	}

	public function getData($key = false) {
		if(!$key)
			return $this->data;
		else
			return $this->data[$key];
    }
	public function addData() {
		return $this->data;
    }

	public function getTableJoin() {

		$select  = $this->setSelectQuery();//si rien c'est select *
		//echo "<br >SELECT : ".$select;
		$from    = $this->setFromQuery();
		//echo "<br >FROM : ".$from;
		$join   = $this->setjoinQuery();
		//echo "<br >JOIN : ".$join;
		$where   = $this->setWhereQuery();
		//echo "<br >WHERE : ".$where;
		$orderby = $this->setOrderQuery;
		if (!$from)
			return false;
		$query .= $select;
		$query .= $from;
		$query .= $join;
		if($where)
			$query .= $where;
		if($orderby)
			$query .= $orderby;
/*
		echo "<br >".$select;
		echo "<br >".$from;
		echo "<br >".$join;
		echo "<br >".$where;
		echo "<br ><br ><br >";
*/
		$this->executequery($query);
	}

	public function executequery($query, $key = "") {
	//	echo "<br >".$query."<br >";
		$key = ($key != "") ? $key : 'result';
	//	echo "<br /> key : ".$key;
		$this->data[$key] = $this->db->query($query);//definir une valeur de la clé fourni dans résultat de jointure
	//	echo "<br > this->data : ";print_r($this->data);
		return $this->data = $this->afterquery();
	}
	
	
	public function insertquery($table,$fieldArray){
		$rc = false;
		if ($table == "" || empty($fieldArray))
			return $rc;

		$rc = $this->db->insert($table,$fieldArray);
		return $rc;
	}

	public function updatequery($table,$fieldArray,$where){
		$rc = false;
		if ($table == "" || empty($fieldArray))
			return $rc;
		$rc = $this->db->update($table,$fieldArray,$where);
		return $rc;
	}

	public function afterquery() {
		return $this->data;
	}
		

	public function setSelectQuery($select = "") {
		if ($select != '')
			return $select;

		if(empty($this->tablesFields))
			return " SELECT * ";

		$select = " SELECT ";
		foreach ($this->tablesFields as $field) 
		{
			$select		.= " ".$field." ,";
		}
		// suppression de la dernière virgule
		//$select = rtrim($select, " ,");
		return rtrim($select, " ,");

	}

	public function setFromQuery($from = "") {
		if ($from != '')
			return $from;

		if(empty($this->tablesList))
			return false;

		$from = " FROM ";
		foreach ($this->tablesList as $tableName) 
		{
			if (stristr($tableName, ' ')){
				$tab		 = explode(' ', $tableName);
				$tableName	 = $tab[0];
				$firstletter = $tab[1];
			}else {
				$firstletter = substr($tableName,0,1); 
			}

			$tmp		 = " ".$tableName." ".$firstletter." ,";
			$from		.= $tmp;
		}
		// suppression de la dernière virgule
		//$from = rtrim($from, " ,");
		return rtrim($from, " ,");

	}
	public function setWhereQuery($where = "") {
		if ($where != '')
			return $where;

		if(empty($this->tablesWhere))
			return false;

		if (!$this->setJoinQuery())
			$where = " WHERE ";
		else
			$where = " AND ";
		
		foreach ($this->tablesWhere as $key=>$value) 
		{
			$criteria	= '';
			$operator	= '';
			if ($key == '0') {
				$criteria  = $value;
			}
			else 
			{
				$criteria  = $key;
				$operator = $value;
			}

			$where		.= $criteria." ".$operator." ";
		}
		//$where = rtrim($where, " AND");
		return $where;
	}
	public function setJoinQuery($join = "") {
		if ($join != '')
			return $join;
	
		if(empty($this->tablesJoin))
			return false;
			
		$join = " WHERE ";
		
		foreach ($this->tablesJoin as $primaryKeys=>$foreignKeys) 
		{
			$join		.= " ".$primaryKeys." = ".$foreignKeys." AND";
		}
		//$where		 = " WHERE ";
		//$where = rtrim($where, " AND");
		return rtrim($join, " AND");
	}

	public function setOrderQuery($order = "") {
		if ($order != '')
			return $order;

		if(empty($this->tablesOrder))
			return false;

		$orderby = " ORDER BY";

		foreach ($this->tablesOrder as $field=>$way) 
		{
			$orderby	.= " ".$field." ". $way." ,";
		}
		//$orderby = rtrim($orderby, " ,");
		return  rtrim($orderby, " ,");
	}

}

