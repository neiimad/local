<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="robots" content="noarchive NOODP" />

	<link rel="stylesheet" type="text/css" href="<?php echo WS_CSS; ?>default.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>site.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>skin.css" />
	<link href="http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic" rel="stylesheet" type="text/css">

	<script type="text/javascript" src="<?php echo WS_JS; ?>jquery.js"></script>
	<script type="text/javascript" src="<?php echo WS_JS; ?>heartcode-canvasloader-min.js"></script>
	<script type="text/javascript" src="<?php echo WS_JS; ?>default.js"></script>
	<script type="text/javascript" src="<?php echo WS_JS; ?>form.js"></script>
	<script type="text/javascript" src="<?php echo WS_JS; ?>slider.js"></script>
	<script type="text/javascript" src="<?php echo JS; ?>site.js"></script>

</head>
<body class="<?php //if (isMSIE()){ echo 'ie'; } ?>">

	<?php $this->getBlocs('site_before'); ?>

	<div id="site">

		<?php include($this->tpl); ?>

	</div>	

	<?php $this->getBlocs('site_after'); ?>

	<?php
	
		$el = array(	'type'				=> 'link',
	                	'element_label'		=> 'skin',
    		        	'element_disabled' 	=> 'N',
    		        	'value' 			=> 'skin');
		$this->getElement($el);
	
	?>
	<script type="text/javascript"> document.getElementById('skin').onclick = function(){ $('html').toggleClass('skin'); }; </script>

</body>
</html>