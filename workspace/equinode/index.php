<?php
	//print_r($GLOBALS);die;
	//print_r($_FILES);die;

set_time_limit(60);
ini_set("memory_limit","60M");

$CURRENT_PATH   = dirname(__FILE__);
$SRV_ROOT		= substr($CURRENT_PATH, 0, strpos($CURRENT_PATH, '/local/') + 7);
$WS_PATH		= substr($CURRENT_PATH, 0, strpos($CURRENT_PATH, '/workspace/') + 11);

//define('WS_NAME', 'equinode');

define('WS_NAME', preg_replace('#'. $WS_PATH . '#', '', $CURRENT_PATH));

require_once	$SRV_ROOT.'/init.php';
require_once	$SRV_ROOT.'/workspace.php';

$isCacheable = true;

$workspace = new workspace();
$workspace->Set_Constants();
$workspace->Start();
$workspace->Cache_Start($isCacheable);
$workspace->Load($isCacheable);

$isCacheable = false;

$workspace->Cache_Close($isCacheable);

/*
///////// CONSTANTES APPLICATION
echo "<br />CURRENT_PATH		: "; echo CURRENT_PATH;
echo "<br />SRV_ROOT			: "; echo SRV_ROOT;
echo "<br />WS_NAME				: "; echo WS_NAME;
echo "<br />WS_PATH				: "; echo WS_PATH;
echo "<br />WS_SRC				: "; echo WS_SRC;
echo "<br />WS_CONF				: "; echo WS_CONF;
echo "<br />WS_MODEL				: "; echo WS_MODEL;
echo "<br />MODEL				: "; echo MODEL;*/
/*
///////// CONSTANTES DB
echo "<br />SQL_HOST			: "; echo SQL_HOST;
echo "<br />SQL_BDD				: "; echo SQL_BDD;
echo "<br />SQL_USER			: "; echo SQL_USER;
echo "<br />SQL_PASSWORD		: "; echo SQL_PASSWORD;
echo "<br />";
*/