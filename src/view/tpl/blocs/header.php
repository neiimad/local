<?php //if (isset($this->bloc['params']['head']) || isset($this->bloc['params']['inner']) || isset($this->bloc['params']['bottom'])){ ?>

	<div class="container" id="header">
		<div class="bloc">

			<?php if (isset($this->bloc['params']) && isset($this->bloc['params']['head'])){ ?>
				<div class="head">
					<?php $this->getElements($this->bloc['params']['head']); ?>
				</div>
			<?php } ?>

			<?php //if (isset($this->bloc['params']['inner'])){ ?>
				<div class="inner">

					<?php
						// LOGO
						$el = array(	'type'				=> 'content_img',
					                	'element_label'		=> 'logo',
			        		        	'element_disabled' 	=> 'N',
			        		        	'value' 			=> '/src/view/img/logo.png',
										'data0'				=> URI,
										'data2'				=> ''
						);
						$this->getElement($el);
					?>

					<?php //$this->getElements($this->bloc['params']['inner']); ?>
				</div>
			<?php //} ?>

			<?php //if (isset($this->bloc['params']) && isset($this->bloc['params']['bottom'])){ ?>
				<div class="bottom">
					<?php //$this->getElements($this->bloc['params']['bottom']); ?>

					<?php if (!empty($this->data['menu'])){

						// MENU
						$el = array(	'type'				=> 'menu',
					                	'element_label'		=> 'menu',
			        		        	'element_disabled' 	=> 'N',
			        		        	'value' 			=> $this->data['menu']);
						$this->getElement($el);

					} ?>
				</div>
			<?php //} ?>

		</div>
	</div>

<?php //} ?>