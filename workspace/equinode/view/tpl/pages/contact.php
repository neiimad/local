<div class="page" id="page_<?php echo workspace::getViewId(); ?>">

	<?php if ($this->isBlocs('page_top')){ ?>
		<div class="page_top">
			<?php $this->getBlocs('page_top'); ?>
		</div>
	<?php } ?>

	<?php //if ($this->isBlocs('page_head')){ ?>
		<div class="page_head">

			<?php
				$this->bloc['id'] = 'header';
				$this->getBloc();
			?>

			<?php $this->getBlocs('page_head'); ?>
		</div>
	<?php //} ?>

	<?php //if ($this->isBlocs('page_middle')){ ?>
		<div class="page_middle">
			
			<?php if ($this->data['email_sent']){ ?>
			
				<?php // INFO
					$contenu = 'Votre message a été envoyé';
					if ($this->data['wsuser']['type'] == 'administrator')
					{
						$contenu .= '. <span class="right" style="position: relative;"><a class="link btn" style="position: absolute; right: 5px; top: -10px; white-space: nowrap;" href="'.URI.'contact"><span class="wrap"><span class="icon"></span><span class="libelle">Nouveau message</span></span></a>&nbsp;&nbsp;&nbsp;&nbsp;</span>';
					}
					$el = array(	'type'				=> 'content_info',
				                	'element_label'		=> 'contact_info',
		        		        	'element_disabled' 	=> 'N',
		        		        	'value' 			=> $contenu);
					array_unshift($this->data['front']['page_middle']['contact']['inner'], $el);
				?>
			
			<?php } ?>

			<?php $this->getBlocs('page_middle'); ?>
		</div>
	<?php //} ?>

	<?php if ($this->isBlocs('page_bottom')){ ?>
		<div class="page_bottom">
			<?php $this->getBlocs('page_bottom'); ?>
		</div>
	<?php } ?>

</div>