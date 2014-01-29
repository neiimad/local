<?php if ($elt['value'] != '' && $elt['element_disabled'] != 'Y'){ ?>

	<?php $id = $elt['element_label']; if ($id == '') $id = 'elt_'.$elt['id']; ?>

	<div class="texte <?php echo $elt['element_class']; ?>" id="<?php echo $id; ?>">
		<p><?php echo $elt['value']; ?></p>
	</div>

<?php } ?>

<?php //print_r($this->data); ?>