<?php

	ini_set('session.use_trans_sid', 0);

/*****************************
	DEBUG
*****************************/

	$debug = 0; // ni afficher ni enregistrer les erreurs
	$debug = 1; // affiche les erreurs dans la page
	//$debug = 2; // enregistre les erreurs dans un fichier

	//error_reporting(E_ALL);

	//ini_set('display_errors', 'On');

	/*ini_set('html_errors',FALSE);
	if ($debug == 1)
	{
		ini_set('log_errors',FALSE);
		ini_set('display_errors',TRUE);
	}
	else if ($debug == 2)
	{
		ini_set('log_errors',TRUE);
		ini_set('display_errors',FALSE);
		ini_set('error_log','error_log.txt');
	}*/

	include('workspace/equinode/index.php');

?>