<?php if(workspace::getViewId() == 'connexion'){ ?>

<?php if (isset($this->bloc['params']['head']) || isset($this->bloc['params']['inner']) || isset($this->bloc['params']['bottom'])){ ?>

	<div class="container" id="<?php echo $this->bloc['id']; ?>">
		<div class="bloc">

			<?php //if (isset($this->bloc['params']['head'])){ ?>
			<?php if($this->data['wsuser']==''){ ?>
				<div class="head">

						<?php //$this->getElements($this->bloc['params']['head']); ?>

						<?php

						 $el = array(	'type'  				=> "content_h2",
											'element_label'		=> 'members_h2_1',
											'element_disabled' 	=> 'N',
											'value' 			=> 'Connexion',
											'data0' 			=> WS_IMG .'picto_lock.png');
						$this->getElement($el);

						?>

				</div>
			<?php } ?>

			<?php if (isset($this->bloc['params']['inner'])){ ?>
				<div class="inner">

					<?php if(workspace::getViewId() == 'connexion' && $this->data['wsuser'] == ''){ ?>

						<?php // WARNING(S)
							$el = array(	'type'				=> 'warning',
						                	'element_label'		=> 'form_warning_connexion',
				        		        	'element_disabled' 	=> 'N',
				        		        	'value' 			=> $this->data['warnings']);
							$this->getElement($el);
						?>

						<?php $this->getElements($this->bloc['params']['inner']); ?>
					<?php } else { ?>

						<?php // DESCRIPTION
							//print_r($this->data['wsuser']);
							$contenu = 'Bonjour';
							$contenu.= ' '.ucfirst(strtolower($this->data['wsuser']['civility']));
							$contenu.= ' '.ucfirst(strtolower($this->data['wsuser']['lastname']));
							$contenu.= ' '.ucfirst(strtolower($this->data['wsuser']['firstname']));
							$contenu.= ', <br />Bienvenue dans votre espace personnel';
							$el = array(	'type'				=> 'content_info',
						                	'element_label'		=> 'connexion_info',
				        		        	'element_disabled' 	=> 'N',
				        		        	'value' 			=> $contenu);
							$this->getElement($el);
						?>

					<?php } ?>

				</div>
			<?php } ?>

			<?php if (isset($this->bloc['params']['bottom'])){ ?>
				<div class="bottom">
					<?php $this->getElements($this->bloc['params']['bottom']); ?>
				</div>
			<?php } ?>

		</div>
	</div>

<?php } ?>

<?php } ?>