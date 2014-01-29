<?php if (isset($this->bloc['params']['head']) || isset($this->bloc['params']['inner']) || isset($this->bloc['params']['bottom'])){ ?>

	<div class="container" id="<?php echo $this->bloc['id']; ?>">
		<div class="bloc">

			<?php if (isset($this->bloc['params']['head'])){ ?>
				<div class="head">
					<?php $this->getElements($this->bloc['params']['head']); ?>
				</div>
			<?php } ?>

			<?php if (isset($this->bloc['params']['inner'])){ ?>
				<div class="inner">
					<?php $this->getElements($this->bloc['params']['inner']); ?>
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