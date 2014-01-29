<?php //if (isset($this->bloc['params']['head']) || isset($this->bloc['params']['inner']) || isset($this->bloc['params']['bottom'])){ ?>

	<div class="container" id="errordocument">
		<div class="bloc">

			<?php //if (isset($this->bloc['params']['head'])){ ?>
				<div class="head">

						<?php
							$el = array(	'type'  				=> "content_h2",
												'element_label'		=> 'errordocument_h2',
												'element_disabled' 	=> 'N',
												'value' 			=> 'Erreur',
												'data0' 			=> WS_IMG .'picto_default.png'
							);
							$this->getElement($el);
						?>

						<?php //$this->getElements($this->bloc['params']['head']); ?>
				</div>
			<?php //} ?>

			<?php //if (isset($this->bloc['params']['inner'])){ ?>
				<div class="inner">

					<?php // ERROR
						$contenu = 'Le contenu demandé est introuvable ou vous ne disposez pas/plus des droits permettant d\'y accéder.';
						$el = array(	'type'				=> 'content_error',
					                	'element_label'		=> 'errordocument_warning',
			        		        	'element_disabled' 	=> 'N',
			        		        	'value' 			=> $contenu
						);
						$this->getElement($el);
					?>

					<?php $this->getElements($this->bloc['params']['inner']); ?>
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