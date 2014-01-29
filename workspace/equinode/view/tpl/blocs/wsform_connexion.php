<?php if (workspace::getViewId() == '?Deconnect' && $this->data['wsuser'] == ''){ ?>

	<?php //if (isset($this->bloc['params']['head']) || isset($this->bloc['params']['inner']) || isset($this->bloc['params']['bottom'])){ ?>

		<div class="container" id="<?php echo $this->bloc['id']; ?>">
			<div class="bloc">

				<?php if (isset($this->bloc['params']['head'])){ ?>
					<div class="head">
						<?php $this->getElements($this->bloc['params']['head']); ?>
					</div>
				<?php } ?>

					<div class="inner">

						<?php
							// INFO
							$el = array(	'type'				=> 'content_info',
						                	'element_label'		=> 'info',
				        		        	'element_disabled' 	=> 'N',
				        		        	'value' 			=> 'Vous avez été déconnecté');
							$this->getElement($el);
						?>
						
						<?php if (isset($this->bloc['params']['inner'])){ ?>
							<?php $this->getElements($this->bloc['params']['inner']); ?>
						<?php } ?>

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

<?php } ?>