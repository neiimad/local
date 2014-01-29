<?php if (is_array($this->data['wswarning'])) { ?>

	<?php foreach($this->data['wswarning'] as $key => $warning){ ?>
		<p class="error"><?php echo $warning; ?></p>
	<?php } ?>

<?php } else if ($this->data['wswarning'] != ''){ ?>
	<p class="error"><?php echo $this->data['wswarning']; ?></p>
<?php } ?>