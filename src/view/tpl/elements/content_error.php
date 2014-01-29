<?php if ($elt['value'] != '' && $elt['element_disabled'] != 'Y'){ ?>

	<?php $id = $elt['element_label']; if ($id == '') $id = 'elt_'.$elt['id']; ?>

	<p class="error" id="<?php echo $id; ?>"><?php echo($elt['value']); ?></p>

<?php } ?>