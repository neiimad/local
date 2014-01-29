<div class="page" id="page_editiondemembre">

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

			<?php
				$this->bloc['id'] = 'editiondemembre';
				$this->getBloc();
			?>

			<?php $this->getBlocs('page_middle'); ?>
		</div>
	<?php //} ?>

	<?php if ($this->isBlocs('page_bottom')){ ?>
		<div class="page_bottom">
			<?php $this->getBlocs('page_bottom'); ?>
		</div>
	<?php } ?>

</div>