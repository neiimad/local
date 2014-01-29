<ul class="navbar">

	<?php // NOTE UNUSED
	function tri ($a, $b){

		if ($a['element_label'] == $b['element_label']) return 0;
	
		return ($a['element_label'] < $b['element_label']) ? -1 : 1;

	}
	?>

	<?php
		$_SESSION['menu'] = $this->data['menu'];

		unset($_SESSION['menu_user']);
		//print_r($this->data['wsuser']);
		if ($this->data['wsuser'] != '')
			$_SESSION['menu_user'] = $this->data['wsuser'];
		//print_r($_SESSION['menu_user']);

		if (!function_exists('arbo'))
		{
			function arbo ($parentId = '0', $lvl = 1, $url = '')
			{
				foreach($_SESSION['menu'] as $key => $front)
				{
					$affich = true;
					//print_r($_SESSION['menu_user']);

					if ($front['element_label'] == 'connexion' && isset($_SESSION['menu_user']['category']))
					{
						$front['element_label'] = 'deconnexion';
						$front['title'] = 'Deconnexion';
					}

					if ($front['users'] != '')
					{
						$affich = false;
						if (isset($_SESSION['menu_user']['category']))
							$affich = stristr($front['users'],$_SESSION['menu_user']['category']);
					}

					if ( 
						$front['element_lvl'] == $lvl && 
						$front['element_parent'] == $parentId
					){
						//echo 'passe';

						if ($url == '')
							$url2 = str_replace('_','-',$front['element_label']);
						else
							$url2 = $url.'/'.str_replace('_','-',$front['element_label']);

						?>

						<?php if ($affich !== false){ ?>
						<li class="<?php echo $front['element_class']; ?>">

							<a class="link" href="<?php if ($front['element_label'] == 'deconnexion'){ echo URI.'?Deconnect'; } else { echo URI.$url2; } ?>">
								<span class="wrap <?php if (str_replace('-','',$front['element_label']) == workspace::getViewId()){ ?>sel<?php } ?>">
									<span class="icon"></span>
									<span class="libelle"><?php echo $front['title']; ?></span>
								</span>
							</a>

							<ul><?php arbo($front['id'], $lvl+1, $url2); ?></ul>
						</li>
						<?php } ?>

						<?php

						arbo($front['id'], $lvl, $url);	
					}

				}
			}
		}
		arbo();

	?>

</ul>
<?php
/*
$menuorder = array();
foreach ($this->data['menu'] as $menu) {
	
	if (isset($this->data['wsuser']['category']))
	if (stristr('ADMINISTRATOR', $this->data['wsuser']['category']))
	{
		$menu['data1'] .= '/?IdAdmin='.$this->data['wsuser']['id_md5'];
	}

	$affich = true;
	if ($menu['users'] != ''){

		if ($this->data['wsuser']['category'] == '' || stristr($menu['users'],$this->data['wsuser']['category']) === FALSE)
			$affich = false;

	}

	if ($menu['element_label'] == 'menu_link_6' && $this->data['wsuser'] != ''){
		$menu['element_label'] = 'menu_link_7';
		$menu['value'] = 'Deconnexion';
		$menu['data1'] = str_replace('connexion','?Deconnect',$menu['data1']);
		$menu['element_class'] = str_replace('connexion','deconnexion',$menu['element_class']);

	}
	if ($affich)
		$menuorder[$menu['element_label']] = $menu;
}

usort($menuorder, 'tri');
	
foreach($menuorder as $menu){ ?>
	<li>
		<?php

			// MENU
			$this->getElement($menu);
	
		?>
	</li>
<?php } */?>

</ul>