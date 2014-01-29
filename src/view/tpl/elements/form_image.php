<?php $id = $elt['element_label']; if ($id == '') $id = 'elt_'.$elt['id']; ?>

<p class="form-elt <?php if ($elt['element_disabled'] == 'Y'){ echo ' form-disabled '; } echo $elt['element_class']; ?> <?php if (isset($this->data['wswarning'][$id])) { ?>form-error<?php } ?>">

	<label
	 	class="label" 
		<?php if ($elt['disabled'] != 'Y'){ ?>
			for="<?php echo $id; ?>"
		<?php } ?>
	>
		<?php echo $elt['data0']; ?>

		<?php if ($elt['data5'] == 'Y'){ ?>
			<span class="mandatory">*</span>
		<?php } ?>

	</label>

	<span class="field">
		<span class="choix">

			<input
				type="file" 
				class="image <?php echo $elt['data1']; ?>" 
				name="<?php echo $id; ?>" 
				id="<?php echo $id; ?>" 
				<?php if ($elt['element_disabled'] == 'Y'){ ?>
					disabled="disabled" 
				<?php } ?>
			/>

		</span>
	</span>

	<?php if ($elt['disabled'] != 'Y'){ ?>
		<?php include(WS_ELEMENTS . 'form_warning.php'); ?>
	<?php } ?>

</p>