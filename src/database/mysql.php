<?php
  
	class MySql {
    
    public $debug = true ;// Debug flag for showing error messages

    private static $instance ; // Store the single instance of the Database

	private $dbHost = SQL_HOST;    // Hostname of our MySQL server
	private $dbName = SQL_BDD;     // Logical database name on that server
	private $dbUser = SQL_USER;    // Database user
	private $dbPass = SQL_PASSWORD;// Database user's password
    private $idConn = NULL; //identifiant de connexion
    private $result; // reultat de la requete
	private $Errno         = 0;           // Error state of query
    private $Error         = "";

    /**
        Constructeur
    **/
	private function MySql($dbhost = "",$dbname = "" ,$dbuser = "",$dbpass = "") {
        if ($dbhost == "")
            $dbhost = $this->dbHost;
        if ($dbname == "")
            $dbname = $this->dbName;
        if ($dbuser == "")
            $dbuser = $this->dbUser;
        if ($dbpass == "")
            $dbpass = $this->dbPass;

        $this->dbHost = $dbhost;
        $this->dbName = $dbname;
        $this->dbUser = $dbuser;
        $this->dbPass = $dbpass;
    }

	public static function obtain( $dbhost=null, $dbname=null, $dbuser=null, $dbpass=null  ) {
        if( !self::$instance) {
            self::$instance = new MySql( $dbhost, $dbname, $dbuser, $dbpass ) ;   
        }
         
        return self::$instance ;
    }// END SINGLETON DECARATION


    #
    # Stop the execution of the script
    # in case of error
    # $msg : the message that'll be printed
    #
    
    function dbWarning($msg) {
		if(!$this->debug) return;
        echo("<B>DB error:</B> $msg<BR>\n");
        echo("<B>DB error</B>: 
            $this->Errno ($this->Error)<BR>");
        die("--end warning--.");
    }

    /***
    * @desc : Connexion à la base de données
    * @param : none
    * @return : none
    */
    public function connect() {
    //connexion au serveur mysql
    $this->idConn = mysql_pconnect($this->dbHost,$this->dbUser,$this->dbPass);
    if( !$this->idConn ) {
    // On lance l'exception
	 $this->dbWarning(" connect to mysql failed");
    } else {
    // Une connexion est établit on selection notre BD
    $this->selectDB();
    }//end if
    }//end connect()
    /***
    * @desc : Selectionne un BD
    * @param : none
    * @return : none
    */
    public function selectDB() {
    // Si la BD n'est pas sélectionnée
    if( !mysql_select_db($this->dbName,$this->idConn) ) {
    // On lance une exception
	$this->Errno = mysql_errno($this->idConn);
	$this->Error = mysql_error($this->idConn);
    $this->dbWarning(" connect to database failed");
    }//end if
	else
	{
		mysql_query("SET NAMES UTF8");
	}
    }//end selectDB()
    /***
    * @desc : Execute une requête SQL
    * @param : String SQL
    * @return : Array hash de resultat de requête select/Bool
    */
    public function query($sql) {
    // Verifier s'il y'a une connexion établie à un serveur
    if( $this->idConn == NULL) {
	    $this->dbWarning(" no connection to mysql found");
		return;
    //On lance une exception il doit y avoir une connexion établie au préalable
    }
    // Securité //A RENFORECER PAR SECURITE INJECTION SQL !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    if( is_string($sql) ) {
    if( !$this->result = mysql_query($sql,$this->idConn) ) {
    // On lance une exception
		$this->Errno = mysql_errno();
		$this->Error = mysql_error();
		$this->dbWarning("Invalid SQL: ".$sql);

    return false;
    } else {
    // On test si c'est une requête de Selection
    if( stristr(strtoupper($sql), 'SELECT') == true || stristr(strtoupper($sql), 'DESCRIBE') == true) {
    $i = 0;
    $resArray = array();
    // On construit notre $resArray
    while( $row = mysql_fetch_assoc($this->result) ) {
    $resArray[$i] = $row;
    ++$i;
    }//end while
    // On libere la ressource
    mysql_free_result($this->result);
   //ECHO  "<br /> sql : ".$sql."<br />";print_r($resArray);
	return $resArray;
    } else {
    // c'est n'est pas une requete SELECT
    // on informe juste que c'est bien passer
    return true;
    }//end if/else 2
    }//end if/else 1
    } else {
		$this->dbWarning(" fo safety reason we logged out");
    return false;
    }
    }//end query()



	public function selectall ($table, $limit=NULL){

		// Verifier s'il y'a une connexion établie à un serveur
		if( $this->idConn == NULL) {
			$this->dbWarning(" no connection to mysql found");
		//On lance une exception il doit y avoir une connexion établie au préalable
		}
		$sql = "SELECT * FROM ".$table;
		if ($limit != NULL)
		{
			$limit = preg_replace('/[^0-9]/i', '', $limit);
			$sql  .= " LIMIT ".$limit;
		}


		if( !$this->result = mysql_query($sql,$this->idConn) ) {
		// On lance une exception
			$this->Errno = mysql_errno();
			$this->Error = mysql_error();
			$this->dbWarning("Invalid SQL: ".$sql);

		return false;
		} else {

		$i = 0;
		// On construit notre $resArray
		while( $row = mysql_fetch_assoc($this->result) ) {
		$resArray[$i] = $row;
		++$i;
		}//end while
		// On libere la ressource
		mysql_free_result($this->result);
		return $resArray;
		
		}//end if/else 1
		}//end query()	 



    /***
    * @desc : Insere des données dans une table;
    * @param : String table, Array fieldArray
    * @return : Bool
    */
    public function insert ($table,$fieldArray){
    // Formulation de la requête SQL partie 1 : insert into table
    $sql = 'INSERT INTO `'.$table.'`';
    // Récuperation des clés du tableau $fieldArray qui vont representer les champs
    $fieldsName = array_keys($fieldArray);
    // Implosion du tableau fieldsName
    // Partie : 2 insert into table(`champ1`,`champ2`,...,`champN`)
    $sql .= '(`'.implode('`,`',$fieldsName).'`) ';
    // Formulation de la requête SQL
    // Partie 3-1 : insert into table(`champ1`,`champN`)values (
    $sql .= 'VALUES (';
    // Récupération des valeurs du tableau qui vont representer les valeurs des champs
    $fieldsValue = array_values($fieldArray);
    // Reconstitution du tableau sous la forme 'val1','val2','valN'
    foreach( $fieldsValue as $v ) {
    if( strcmp($v,"NULL") == 0 ) {
    $tampon[] = 'NULL';
    } else {
    $tampon[] = "'".$v."'";
    }//end if/else
    }//end foreach
    // Formulation de la requête
    // Partie 3-2 insert into table(`champ1`,`champN`)values(`champ1`,`champN`)
    $sql .= implode(",",$tampon).")";
    // Si tous c'est bien passer on retourne le dernier id inserer
    if ( $this->query($sql) ) {
    return mysql_insert_id($this->idConn);//Retourne le dernier identifiant généré de la table
    } else {
    // On lance une exception
		$this->dbWarning("Invalid SQL: ".$sql);
    return false;
    }
    }//end insert()
    /***
    * @desc : MAJ des données dans une table
    * @param : String table, Array fieldArray, String where
    * @return : Bool
    */
    public function update($table,$fieldArray,$where){
    // Contrôler l'existance de la clause where pour eviter une Maj de toutes les données
    if( !empty ($where) ) {
    $sql = 'UPDATE `'.$table.'` SET ';
    // Recupération des clés du tableau $fieldArray ceux-ci represente le champs
    $fieldsName = array_keys($fieldArray);
    // Recupération des valeurs du tableau $fieldArray ceux-ci represente les
    // valeurs des champs
    $fieldsValue = array_values($fieldArray);
    $nbFields = count($fieldsName);
    // Boucler pour Constituer la requête SQL
    for( $i = 0; $i < $nbFields; ++$i ) {
    $k = $fieldsName[$i];
    $v = $fieldsValue[$i];
    // Si l'une des valeur est Null
    if( strcmp($v,'NULL') == 0 ) {
    // On reconstitue la requête avec la valeur du champs null en vue de debogage
    $sql .= $k. '= NULL';
    break;
    } else {
//echo '<br />`'.$k.'`'. "='".$v."'<br />";
	if ($i>0)
		$sql .= ', ';
    $sql .= '`'.$k.'`'. "='".$v."'";
    //$sql .= ( ($i == count($fieldsName) - 1)?'':' , ');
    }//end if/else
    


    }//end for
	$sql .= ' WHERE '.$where;
    if ( !$this->query($sql) ) {
    // On lance une exception
	$this->dbWarning("Invalid SQL: ".$sql);
    return FALSE;
    } else {
//echo $sql;
    return TRUE;
    }
    }//end if
    }//end update()
    /***
    * @desc : Supprime des données d'une ou plusieurs table
    * @param : String table || Array table, String innerOrLeft, String attrib ,String where
    * @return : int nbaffectedrows
    */
    public function delete($table,$innerOrLeft,$attrib,$where) {
    // Eviter un delete global donc tester l'existance de la cluase WHERE
    if( !empty( $where ) ) {
    //verifier s'il s'agit d'un delete d'une table ou plusieur
    if( is_array ($table) ) {
    // Il s'agit d'un delete devant s'éffectuer sur plusieurs tables
    $sql = 'DELETE FROM `'.$table[0].'`';
    $nbTables = count($table);
    for( $i = 1; $i < $nbTables ; ++$i ) {
    $sql .= ' '.(!empty($innerOrLeft)?$innerOrLeft:'INNER').' JOIN `'.$table[$i].'`';
    }//end for
    $sql .= ' USING ('.$attrib.') WHERE '.$where;
    $delValidate = $this->query(sql);
    } else {
    $sql = 'DELETE FROM `'.$table.'` WHERE '.$where;
    $delValidate = $this->query($sql);
    }
    if( !$delValidate ) {
    //on lance une exception
	$this->dbWarning("Invalid SQL: ".$sql);
    return false;
    } else {
    return mysql_affected_rows($this->idConn);
    }//end if/else
    }//end if
    }//end delete()
    /***
    * @desc : Retourne le nombre de resultat
    * @param : Mysql ressource result
    * @return : Int nbresult
    */
    /*
	public function numRows($result) {
    return mysql_num_rows($result);
    }//end numRows()
	*/
    /***
    * @desc : Destructeur
    * @param : none
    * @return : none
    */
    public function close() {
    mysql_close($this->idConn);
    }//end destruct()

	 
    }//end MYSQL
?>
