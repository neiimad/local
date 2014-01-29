<div class="page" id="page_ws<?php echo workspace::getViewId(); ?>">

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

	<div class="page_middle">

		<?php if (isset($this->data['front']) && $this->data['front'] == ''){ ?>
		<?php
			$this->bloc['id'] = 'errordocument';
			$this->getBloc();
		?>
		<?php } ?>

		<?php $this->getBlocs('page_middle'); ?>
	</div>

	<?php if ($this->isBlocs('page_bottom')){ ?>
		<div class="page_bottom">
			<?php $this->getBlocs('page_bottom'); ?>
		</div>
	<?php } ?>

</div>