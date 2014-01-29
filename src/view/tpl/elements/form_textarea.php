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
		<span class="wrap">

			<textarea
				class="text <?php echo $elt['data1']; ?>" 
				name="<?php echo $id; ?>" 
				id="<?php echo $id; ?>" 
				<?php if ($elt['data2'] != ''){ ?>
					cols="<?php echo $elt['data2']; ?>"  
					style="width: auto;" 
				<?php } ?>
				<?php if ($elt['data7'] != ''){ ?>
					rows="<?php echo $elt['data7']; ?>"  
					style="height: auto;" 
				<?php } ?>
				<?php if ($elt['element_disabled'] == 'Y'){ ?>
					disabled="disabled" 
				<?php } ?>
				<?php if ($elt['data3']){ ?>
					maxlength="<?php echo $elt['data3']; ?>" 
				<?php } ?>
				<?php if ($elt['data4']){ ?>
					placeholder="<?php echo $elt['data4']; ?>" 
				<?php } ?>
			><?php if ($elt['value'] != ''){
						echo $elt['value'];
					} elseif (!empty($this->data['POST'][$id])){
						echo $this->data['POST'][$id];
					} ?></textarea>

		</span>
	</span>

	<?php if ($elt['disabled'] != 'Y'){ ?>
		<?php include(WS_ELEMENTS . 'form_warning.php'); ?>
	<?php } ?>

</p>