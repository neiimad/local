<?php //if (isset($this->bloc['params']['head']) || isset($this->bloc['params']['inner']) || isset($this->bloc['params']['bottom'])){ ?>

	<div class="container" id="profil_options">
		<div class="bloc">

			<?php //if (isset($this->bloc['params']['head'])){ ?>
				<div class="head">

					<?php // TITRE
						$contenu = 'Options';
					 	$el = array(	'type'  			=> "content_h2",
										'element_label'		=> 'profil_options_h2',
										'element_disabled' 	=> 'N',
										'value' 			=> $contenu,
										'data0' 			=> WS_IMG .'picto_default.png');
						$this->getElement($el);
					?>

					<?php if (stristr('ADMINISTRATOR', $this->data['wsuser']['category'])){ ?>

					<?php if ($this->data['wsprofil']['deleted'] != 'Y'){ ?>

						<?php // LIEN BOUTON
							$contenu 	= 'Supprimer';
							$title 		= 'Supprimer le membre';
							$href 		= '/workspace/equinode/profil/?IdP='.$this->data['POST']['id_md5'].'&delete=Y';
							$el = array(	'type'				=> 'link',
						                	'element_label'		=> 'element_link3',
				        		        	'element_disabled' 	=> 'N',
											'element_class'		=> 'close',
				        		        	'data0' 			=> '_self',
				        		        	'data1' 			=> $href,
											'data2'				=> $title,
											'value'				=> $contenu);
							$this->getElement($el);
						?>

					<?php } ?>

					<?php } ?>

					<?php $this->getElements($this->bloc['params']['head']); ?>
				</div>
			<?php //} ?>	

			<?php //$member = $this->data['wsuser']; ?>
			<?php $member = $this->data['wsprofil']; ?>

			<?php //if (isset($this->bloc['params']['inner'])){ ?>
				<div class="inner">

					<div class="col">
						<div class="content">

							<?php include(WS_ELEMENTS.'form_preview.php'); ?>

						</div>
						<div class="pin"></div>
					</div>

					<div class="col">
						<div class="content">

						</div>
						<div class="pin"></div>
					</div>

					<div class="col">
						<div class="content">

						</div>
						<div class="pin"></div>
					</div>

					<span class="newline"></span>

				</div>
			<?php //} ?>

			<?php if (isset($this->bloc['params']['bottom'])){ ?>
				<div class="bottom">
					<?php $this->getElements($this->bloc['params']['bottom']); ?>
				</div>
			<?php } ?>

		</div>
	</div>

<?php //} ?>