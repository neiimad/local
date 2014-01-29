<?php $id = $elt['element_label']; if ($id == '') $id = 'elt_'.$elt['id']; ?>

<p class="form-elt <?php if ($elt['element_disabled'] == 'Y'){ echo ' form-disabled '; } echo $elt['element_class']; ?> <?php if (isset($this->data['wswarning'][$id])) { ?>form-error<?php } ?>">

	<span class="label">

		<?php echo $elt['data0']; ?>

		<?php if ($elt['data5'] == 'Y'){ ?>
			<span class="mandatory">*</span>
		<?php } ?>

	</span>

	<span class="field">
		<span class="choix">

			<?php // pour chacun des elts input_radio dont parent est form_radio (element_label)

			foreach($this->elements as $input){
				if ($input['type'] == 'form_radio_input' && $input['element_parent'] == $elt['id']){
					$inputid = $input['element_label']; if ($inputid == '') $inputid = 'input_'.$input['id'];

						if ($this->data['POST'][$id] == $input['value'] || $input['checked'] == 'Y')
						{
							$checked = true;
							break;
						}
				}
			}

			if (($elt['element_disabled'] == 'N') || ($elt['element_disabled'] == 'Y' && $checked))
			foreach($this->elements as $input){
				if ($input['type'] == 'form_radio_input' && $input['element_parent'] == $elt['id']){
					$inputid = $input['element_label']; if ($inputid == '') $inputid = 'input_'.$input['id'];

					$checked = false;
					if ( isset($this->data['POST'][$id]) && ($this->data['POST'][$id] == $input['value']))
						$checked = true;
					elseif (!isset($this->data['POST'][$id]) && isset($input['data6']) && ($input['data6'] == 'Y'))
						$checked = true;
					?>

					<?php if (($elt['element_disabled'] == 'N') || ($elt['element_disabled'] == 'Y' && $checked)) { ?>
					<label>

						<span class="wrap">
							<input 
							type="radio" 
							name="<?php echo $id; ?>" 
							id="<?php echo $inputid; ?>" 
							<?php if ($elt['element_disabled'] == 'Y' || $input['element_disabled'] == 'Y'){ ?>
								disabled="disabled" 
							<?php } ?>
							<?php if ($checked){ ?>
								checked="checked"
							<?php } ?>
							<?php if ($input['value'] != ''){ ?>
								value="<?php echo $input['value']; ?>" 
							<?php } ?>
							/>
						</span>

						<?php echo $input['data0']; ?>

					</label>
					<?php } ?>

					<?php
				}
			}
			?>

		</span>
	</span>

	<?php if ($elt['disabled'] != 'Y'){ ?>
		<?php include(WS_ELEMENTS . 'form_warning.php'); ?>
	<?php } ?>

</p>