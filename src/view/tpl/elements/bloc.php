<?php
	if ($elt['value'] != '')
	{
		$this->getBloc($elt['value']);
	}
	else
	{
		echo '<!-- ['.$elt['value'].' : Empty] -->';
	}
?>