<?php


class wsmodelfront {
    
    private $db;
	//private $table;
   	protected $loadAll	    = true;
   	protected $front	    = '';
	
	protected $tablesList   = array('front', 'bloc', 'element');
	protected $tablesFields = array();
	protected $tablesJoin   = array('f.id' => 'b.id_front', 'b.id' => 'e.id_bloc');
	protected $disabled		= array('bloc_disabled');
	protected $tablesWhere	= array('bloc_disabled <> "Y"');
	protected $front_label  = " f.front_label = ";//'$this->front'";
	protected $default_label= " f.front_label = 'default' ";
	protected $tablesOrder  = array('b.bloc_place' => 'ASC', 'e.element_place' => 'ASC', 'e.id' => 'ASC' );

	protected $data;
	protected $limit	    = NULL;
	protected $defaultquery = "";

	/*protected $defaultquery	  =
				 "SELECT *  ".
				 "FROM front f, bloc b, element e ".
				 "WHERE f.front_label = '$front' AND f.id = b.id_front  AND b.id = e.id_bloc  
		          AND bloc_disabled <> 'Y' 
				  ORDER BY b.bloc_place, e.element_place";	*/


    /**
        Constructeur
    **/
	public function wsmodelfront($front = '', $db) {
		if($db != '')
			$this->db = $db;
		
		if($front != '')
			$this->front = $front;
	
		if ($this->loadAll)
			$this->prepareData();
    }
	
	public function getData() {
		return $this->data;
    }

	public function prepareData() {

		$query = $this->getdefaultquery($this->front);
		//echo "<br />".$query."<br />";
		$this->executequery($query);
		
		return true;
	}
	
	public function setdefaultquery($query) {
		$this->defaultquery = $query;
	}
	
	public function getdefaultquery($front,  $query = '') {
		
		if($query != '')
		return $this->defaultquery = $query;
		
		$select  = $this->setSelectQuery();//si rien c'est select *
		//echo "<br >SELECT : ".$select;
		$from    = $this->setFromQuery();
		//echo "<br >FROM : ".$from;
		$join   = $this->setJoinQuery();
		//echo "<br >JOIN : ".$join;
		$where   = $this->setWhereQuery();
		//echo "<br >WHERE : ".$where;
		$orderby = $this->setOrderQuery();
		//echo "<br >ORDERBY : ".$orderby;
		if (!$from)
			return false;
		$query .= $select;
		$query .= $from;
		$query .= $join;
		if($where)
			$query .= $where;
		if($orderby)
			$query .= $orderby;
		
		$this->defaultquery = $query;
		//echo "<br > wsmodelfront - defaultquery : ".$query;
		return $this->defaultquery;
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

		if ($this->front != '')
				$this->front_label  .= "'$this->front'";
		else
				$this->front_label = " ";

		if(empty($this->tablesWhere))
			return false;

		if (!$this->setJoinQuery())
			$where = " WHERE ";
		else
			$where = " AND ";
		
		$where .= $this->front_label." AND ";

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

	public function executequery($query, $error404 = null) {
		//echo "<br >	wsmodelfront - executequery : ".$query."<br >";
		$this->data['front'] = $this->db->query($query);//definir une valeur de la clé fourni dans résultat de jointure
		//echo "<br > wsmodelfront -  executequery - this->data : "; print_r($this->data);
		return $this->afterquery($error404);
	}
	
	public function afterquery($error404 = null) {
		if (isset($this->data['front']) && !empty($this->data['front'])){
			//echo 'OK. ';
			foreach ($this->data['front'] as $data)
			{
				$result[$data['bloc_place']][$data['bloc_label']][$data['element_place']][$data['id']] = $data;
			}

			$this->data['front'] = $result;
			//echo "<br /> OK :";print_r($this->data['front']);
		}	
		else
		{
			//echo 'KO : ';
			//echo "<br /> KO : "; print_r($this->data['front']);
			//echo $this->front_label . ' ; ' . $this->default_label; die;

			//$this->defaultquery = str_replace($this->front_label, $this->default_label, $this->defaultquery);
			//$this->executequery($this->defaultquery, 'Y');
		}

		return $this->data;
	}

}

