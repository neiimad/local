<?php

if (!defined("_WORKSPACE_LOADED")){
	define("_WORKSPACE_LOADED",true);

	/**
	* Classe abstraite 
	* Constante applicative et classe de gestion BD applicative
	*/

	class workspace
	{

		/**
		* Load System Constants and start general timer
		* Should be called before anything else
		*/
		function Start()
		{
			$path = ini_get ('session.save_path');
			if ( !defined('WPCONST') ) workspace::Set_Constants();
		}

		function Shutdown(&$sm) {
			return true;
		}

		/**
		* Just load system constants and BD const from conf.ini and db.ini
		*/
		function Set_Constants() {
			workspace::_set_system_constants();
			workspace::_set_db_constants();
			require_once (WS_SRC.'database/mysql.php');
		}
		/**
		* conf.ini
		*/
		function _set_system_constants() {

			if(!defined('WS_NAME')){
				//echo 'WS_CONF';
				$file=realpath(WS_CONF."conf.ini");
			}else{
				//echo WS_CONF.WS_NAME;
				$file=realpath(WS_CONF.WS_NAME."/conf.ini");
			}

			if (file_exists($file))
			{
				$tab=parse_ini_file($file,TRUE);
				$tab=array_change_key_case($tab, CASE_UPPER);
				foreach ($tab as $sname=>$sparams){
					$tab[$sname]=array_change_key_case($sparams, CASE_UPPER);
				}
			}
			else
				die ("Error setting workspace (no conf file)\n");

			if (empty($tab)) die ("Error setting workspace (no conf settings)\n");

			// Mise en place des constantes en fct du conf.ini
			//
			foreach (array_keys($tab) as $aSection)
			{
				//if ($aSection == "WEB" || $aSection == "SYSTEM")
				//continue;
					
				foreach ($tab[$aSection] as $aSymbol=>$aValue)
				{
					if(!defined(trim($aSymbol)))
					{
						define(trim($aSymbol), trim($aValue));
					}
				}
			}
			define('WPCONST','');
			return true;
		}
		/**
		* db.ini
		*/
		function _set_db_constants()
		{
		
			if(!defined('WS_NAME')){
				$file=realpath(WS_CONF."db.ini");
			}else{
				$file=realpath(WS_CONF.WS_NAME."/db.ini");
			}

			if (file_exists($file)){
				$tab=parse_ini_file($file,TRUE);
				$tab=array_change_key_case($tab, CASE_UPPER);
				foreach ($tab as $sname=>$sparams){
					$tab[$sname]=array_change_key_case($sparams, CASE_UPPER);
				}
			}else{
				die ("Error setting workspace (no db file)\n");
			}

			if (empty($tab)) die ("Error setting workspace (no db settings)\n");

			foreach (array_keys($tab) as $aSection)
			{
				foreach ($tab[$aSection] as $aSymbol=>$aValue)
				{
					if(!defined(trim($aSymbol)))
					{
						define(trim($aSymbol), trim($aValue));
					}
				}
			}
			//return $rc;
		}

		function getViewId ($uri = false) {
			
			$requris = (!$uri) ? rtrim($_SERVER['REQUEST_URI'], '/') : $uri  ;

			if (strpos($requris, "/?") !== false)
			{
				$requris = explode("/?", $requris);
				$requris = $requris[0];
			}
			//* en cas de pas d'urlrw
			//$requris = explode(WS_PATH.WS_NAME, $requris);
			//$requris = $requris[1];
			$requris = explode('/' , $requris);
			$requris = end($requris);
			
			if ($requris == WS_NAME){
				$requris = 'home';
			}

			return str_replace('-','',$requris);
		}

		function Cache_Start (&$isCacheable){
			
			define('CACHEFILE',CACHE . md5($_SERVER["HTTP_HOST"].$_SERVER['REQUEST_URI']));
			//echo CACHEFILE . '....<br />';

			if (file_exists(CACHEFILE) && (filemtime(CACHEFILE) > (time() - CACHETIME)) )//&& !isset($params['cleanCache']))
			{
				//echo CACHEFILE . ' READFILE....<br />';
				readfile(CACHEFILE);
				exit();
			}
			elseif ($isCacheable)
			{
				//echo CACHEFILE . ' OBSTART....<br />';
				ob_start();
			}

		}

		function Load (&$isCacheable){
			
			//print_r($_FILES);die;
			
			session_start (); 
			header("HTTP/1.1 200 Ok");
			header("Status: 200 OK");
			header('Content-Type: text/html; charset=utf-8');
			
			require_once	WS_CONTROLLER.'wscontext.php';
			$context		= new wscontext();
			$uri			= $context->gettoUrl();
			//$uri = false;

			$ctrlr			= workspace::getController($uri);
			require_once	CONTROLLER.$ctrlr.'.php';
			//echo CONTROLLER.$ctrlr;

			$obj = new $ctrlr($context);
			$obj->setView(workspace::getViewId($uri));

			$obj->prepareData();
			$obj->getData();
			$obj->addData();
			$obj->getView();

			$isCacheable = $obj->isCacheable();
		}

		public function getController($uri = false){
			$file = CONTROLLER.'wscontroller'.str_replace('-','',workspace::getViewId($uri)).'.php'; //echo $file.'<br>';
			if (!file_exists($file)) return 'wscontrollerdefault';
			return 'wscontroller'.str_replace('-','',workspace::getViewId($uri));
		}

		function Cache_Close (&$isCacheable){
			//var_dump($isCacheable);
			
			$tampon = ob_get_contents();
			ob_end_clean();

			if ($tampon != '' && $isCacheable)
			{	
				file_put_contents(CACHEFILE, $tampon);
			}
			echo $tampon;
		}

	}//end class
}//end if defined
?>
