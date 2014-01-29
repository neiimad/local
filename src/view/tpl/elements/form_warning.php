<?php //echo $id.'<br />'; print_r($this->data['wswarning']);

	if (isset($this->data['wswarning'][$id])) { ?>

		<?php if (!is_array($this->data['wswarning'][$id])){ ?>

		<span class="help">?</span>

		<span class="warnings">
			<span class="warning">
				<span class="icon"></span>
				<span class="libelle"><?php echo $this->data['wswarning'][$id]; ?></span>
			</span><br />
		</span>

		<?php } ?>
<?php } ?>