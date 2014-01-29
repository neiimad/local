<?php

/**
* Classe fondamentale offrant gestion GLOBALS */
class wscontext
{
	var $toUrl = "";
	var $post  = "";
	var $get  = "";
	/**
	* Constructeur
	*/

	function wscontext()
	{
		//print_r($_POST);die;
		$this->_load_context();
	}

	function _load_context() {
		//include_once("xxxxx");

		$this->loadContext();
		return true;
	}

	/**
	* Méthodes de chargement/sauvegarde du contexte (appelée en début et fin de travail)
	*/
	function loadContext()
	{
		//global $StateStack,$StateCounter;
		//print_r($GLOBALS);
		
		//print_r($_POST); die;
		
		if( is_array($_GET))	foreach($_GET as $key=>$val)	$GLOBALS[$key]="";
		if( is_array($_POST))	foreach($_POST as $key=>$val)	$GLOBALS[$key]="";
		if( is_array($_FILES))	foreach($_FILES as $key=>$val)	$GLOBALS[$key]="";

		// Récupère les informations de la session

		// Anti phishing
		$this->antiPhishing($_GET);
		$this->antiPhishing($_POST);
		// Récupère le contenu de l'URL
		// Si elle contient des informations système on les positionne
		// sinon, tout est positionné en variable globale

		//print_r($_GET);echo "<br />";
		if( is_array($_GET))
		{
			foreach($_GET as $key=>$val)
			{
				switch($key)
				{
					case "IdM": // Empêche le piratage
					default:
						$GLOBALS[$key]=$val;
						break;
				}
			}
		}

		// Récupère le contenu du formulaire
		// Si il contient des informations de changement d'état (champs cachés), alors on les positionne
		// sinon, ne rien faire
		if (is_array($_POST))
		{
			//print_r($_POST);die;
			foreach ($_POST as $key=>$val)
			{
				switch($key)
				{
					case "action": // init des chose pour init transition forms eventuels
						break;
					case "IdM": // Empêche le piratage

					default:
						$GLOBALS[$key]=$val;
						break;
				}
			}
			$this->setContext();
			$this->setPost();		
			//$this->settoUrl();
		}
		$this->setGet();	

		//print_r($GLOBALS);
	}


	function reqref()
	{
		$requris = $_SERVER['HTTP_REFERER'];

		if (strpos($requris, "/?") !== false)
		{
			$requris = explode("/?", $requris);
			$requris = $requris[0];
		}
		$requris = explode('/' , $requris);
		$requri = end($requris);
		return $requri;
		//return str_replace('-','',$requri);

	}

	function reqparams()
	{
		$params = '';
		$get = array();

		if (isset($_SERVER['REDIRECT_QUERY_STRING']))
		{	
			$params = $params . $_SERVER['REDIRECT_QUERY_STRING'];
		}
		elseif (isset($_SERVER['QUERY_STRING']))
		{	
			$params = $params . $_SERVER['QUERY_STRING'];
		}

		$params = explode("&", $params);

		foreach($params as $param)
		{
			$param = explode('=', $param);

			if (isset($param[1]))
			{
				$get[$param[0]] = $param[1];
			}
			else
			{
				$get[$param[0]] = '';
			}
		}

		return $get;
	}


	private function setContext()
	{
		/*
		echo 'PASSE';
		if (!empty($_POST))
		{
			print_r($_POST); die();
		}
		
		//print_r($_SESSION['post']);
		if (isset($_POST['context']))
		{
			echo 'PASSE2'; die();
			$context = $_POST['context'];
			$_SESSION['context'] = $context;
			//$_SESSION[$context] = http_build_query($_POST);
			
			$post_url = ''; 
			foreach ($_POST AS $key=>$value) 
			    $post_url .= $key.'='.$value.'&'; 
			$post_url = rtrim($post_url, '&');
			$_SESSION[$context] = $post_url;

			if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest'))
			{
				$id = $context; // link_load
			}
			else
			{
				$id = $this->reqref(); // http
			}

			//echo "LOCATION : ".$id;
			//die();
			//$id = str_replace('-','',$id);
			
			header("Location: " . $id);
			exit;
		}
		*/
		
		//echo "<br />SETCONTEXT : "; print_r($_SESSION);

	}

	/*******************************************************************/

	public function freePost()
	{
		$this->post = '';
		$_SESSION['POST'] = '';
	}

	/*******************************************************************/

	private function setPost()
	{
		unset($_SESSION['post']);
		unset($_SESSION['warning']);
		unset($_SESSION['success']);

		if (isset($_SESSION['context']))
		{
			$id = $_SESSION['context'];
			if (isset($_SESSION[$id]))
			{
				foreach(explode('&', $_SESSION[$id]) as $param)
				{
					$param = explode('=', $param);
					$_SESSION['post'][$param[0]] = stripslashes(trim(htmlspecialchars(urldecode($param[1]))));
				}
				unset($_SESSION[$id]);
			}
			$this->post = $_SESSION['post'];
		}
		//echo "<br />SETPOST : "; print_r($_SESSION);
	}
	private function setGet()
	{
		$this->get = $this->reqparams();
		//print_r($this->get);
	}

	public function getPost($key = false)
	{
		if (!$key)
			return $this->post;
		else
			return $this->post[$key];
	}
	public function getGet($key = false)
	{
		if (!$key)
			return $this->get;
		else
			return (isset($this->get[$key])?$this->get[$key]:'');
	}

	
	function settoUrl($url = false)
	{
		if ($url)
		{
			$this->toUrl = $url;
		
		}
		
	}
	
	function gettoUrl()
	{
		$rc = ($this->toUrl != "") ? $this->toUrl  : false;
	
		return $rc;	
	}


	/** Anti phishing de code HTML
	 * $VARS variable $_POST ou $_GET
	 */
	function antiPhishing(&$VARS){
		if(!is_array($VARS)||count($VARS)==0){
			return; 
		}
		/*
		if(CONNECTED_BO)
	        return;//pas d'antiphising si on est connect? sur le BO
        }*/
        //Définition du patterne pour reformer les balises à contrôler
        $c = "[\x01-\x1f]*";
        $patterns[] = "/\b\<{$c}i{$c}f{$c}r{$c}a{$c}m{$c}e{$c}[\s]*:/si";
        $replacements[] = "<iframe;";
        $patterns[] = "/\b\<{$c}s{$c}r{$c}i{$c}p{$c}t{$c}[\s]*:/si";
        $replacements[] = "<script;";
        $patterns[] = "/\b\<{$c}l{$c}i{$c}n{$c}k[\s]*:/si";
        $replacements[] = "<link;";
        $patterns[] = "/\b\<{$c}s{$c}t{$c}y{$c}l{$c}e{$c}[\s]*:/si";
        $replacements[] = "<style;";
        //Contrôle des clés
		foreach(array_keys($VARS) as $key){
			$key = str_replace("\x00", "", $key);
			$key = preg_replace($patterns, $replacements, $key);
			if(stristr($key,"<script")!=""||stristr($key, "<iframe")!=""||stristr($key, "<link")!=""||stristr($key, "<style")!=""){
				unset($VARS[$key]);//Supprime la clé qui contient des balises interdites...
				unset($_REQUEST[$key]);
				}
		}
        //Contrôle des valeurs
		foreach(array_keys($VARS) as $key){
			if(is_array($VARS[$key])){
				$this->antiPhishing($VARS[$key]);
			}else{
				$VARS[$key] = str_replace("\x00", "", $VARS[$key]);
				$VARS[$key] = preg_replace($patterns, $replacements, $VARS[$key]);
				if(stristr($VARS[$key],"<script")!=""||stristr($VARS[$key], "<iframe")!=""||stristr($VARS[$key], "<link")!=""||stristr($VARS[$key], "<style")!=""){
					//unset($VARS[$key]);
					$VARS[$key]=false;//ne supprime pas la c?lule... efface juste la valeur
					$_REQUEST[$key]=false;
				}
			}
		}
	}

	/**
	* Manipulation des variables du contexte
	*/
	function register($varName)
	{
		if (!isset($_SESSION[$varName]))
			$_SESSION[$varName]="";
	}

	function unregister($varName)
	{
		unset($_SESSION[$varName]);
		unset($GLOBALS[$varName]);
	}

	function isregistered($varName)
	{
		return isset($_SESSION[$varName]);
	}

	function get($varName)
	{
		global $$varName;
		return $$varName;		
	}


	function set($varName,$value)
	{
		global $$varName;
		$$varName=$value;		
		$_SESSION[$varName] = $value;
	}
	function isEmpty($varName)
	{
		global ${$varName};
		return !isset(${$varName}) || empty(${$varName});
	}

	function is_Set($varName)
	{
		global ${$varName};
		return isset(${$varName});
	}
	function getTime()
	{
		$tmp = split(' ',microtime());
		$time = $tmp[0]+$tmp[1];
		return sprintf("%01.2f", $time);
	}
	/*
	function saveContext()
	{
		foreach (array_keys($_SESSION) as $k)
		{
			if(isset($GLOBALS[$k]))
				$_SESSION[$k]=$GLOBALS[$k];
			else
				$_SESSION[$k]='';
		}
	}
	*/

} 

?>