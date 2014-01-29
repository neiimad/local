<?php
if (!defined("INITCONSTAPP")) { define("INITCONSTAPP","");

	/*******************
	  APPLICATION CORE
	*******************/

	// APP
	define('CURRENT_PATH', $CURRENT_PATH.'/');	/** index.php directory */
	define('SRV_ROOT'    , $SRV_ROOT);			/** server directory */
	define('WS_PATH'     , $WS_PATH);			/** workspace application directory */

	// SRC
	define("WS_SRC"		 , $SRV_ROOT."src/");
	define("WS_CONF"	 , $SRV_ROOT."src/conf/");
	define("WS_MODEL"	  , $SRV_ROOT."src/model/");
	define("WS_CONTROLLER", $SRV_ROOT."src/controller/");
	define("WS_VIEW"	  , $SRV_ROOT."src/view/");
		define("WS_TPL" 		, WS_VIEW.'tpl/');
		define("WS_PAGES" 		, WS_TPL.'pages/');
		define("WS_BLOCS" 		, WS_TPL.'blocs/');
		define("WS_ELEMENTS" 	, WS_TPL.'elements/');

	// WORKSPACE
	define("MODEL"		, WS_PATH.WS_NAME.'/model/');
	define("CONTROLLER" , WS_PATH.WS_NAME.'/controller/');
	define("VIEW" 		, WS_PATH.WS_NAME.'/view/');
		define("TPL" 		, VIEW.'tpl/');
		define("PAGES" 		, TPL.'pages/');
		define("BLOCS" 		, TPL.'blocs/');
		define("ELEMENTS" 	, TPL.'elements/');

	// CACHE
	define("CACHE"		, WS_PATH.WS_NAME.'/cache/');
	define("CACHETIME"	, 3600); // 3153600000 = 60 * 60 * 24 * 365 * 100 = 100 ans

	/*******************
	  APPLICATION VIEW
	*******************/

	// SRC
	define("WS_URI"		, '/src/');
	define("WS_CSS" 	, WS_URI.'view/css/');
	define("WS_JS" 		, WS_URI.'view/js/');
	define("WS_IMG" 	, WS_URI.'view/img/');

	// WORKSPACE
	define("URI"		, '/workspace/'. WS_NAME.'/');
	define("CSS" 		, URI .'view/css/');
	define("JS" 		, URI .'view/js/');
	define("IMG" 		, URI.'view/img/');
}
