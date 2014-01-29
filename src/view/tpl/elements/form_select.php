<?php $id = $elt['element_label']; if ($id == '') $id = 'elt_'.$elt['id']; ?>

<p class="form-elt <?php if ($elt['element_disabled'] == 'Y'){ echo ' form-disabled '; } echo $elt['element_class']; ?> <?php if (isset($this->data['wswarning'][$id])) { ?>form-error<?php } ?>">

	<span class="label">

		<?php echo $elt['data0']; ?>

		<?php if ($elt['data5'] == 'Y'){ ?>
			<span class="mandatory">*</span>
		<?php } ?>

	</span>

	<span class="field">
		<span class="choix select">

			<select name="<?php echo $id; ?>" id="<?php echo $id; ?>">

				<?php

				foreach($this->elements as $option){
					if ($option['type'] == 'form_select_option' && $option['element_parent'] == $elt['id']){
						$optionid = $option['element_label']; if ($optionid == '') $optionid = 'option_'.$option['id'];

						if ($this->data['POST'][$id] == $input['value'])
						{
							$checked = true;
							break;
						}
					}
				}

				foreach($this->elements as $option){
					if ($option['type'] == 'form_select_option' && $option['element_parent'] == $elt['id'])
					{
						$optionid = $option['element_label']; if ($optionid == '') $optionid = 'option_'.$option['id'];

						$checked = false;
						if ( isset($this->data['POST'][$id]) && ($this->data['POST'][$id] == $option['value']))
							$checked = true;
						elseif (!isset($this->data['POST'][$id]) && isset($option['data6']) && ($option['data6'] == 'Y'))
							$checked = true;
						?>

						<option 
							name="<?php echo $optionid; ?>" 
							id="<?php echo $optionid; ?>" 
							<?php if ($checked){ ?> 
								selected="selected" 
							<?php } ?>
							<?php if ($option['value'] != ''){ ?>
								value="<?php echo $option['value']; ?>" 
							<?php } ?>
						>

							<?php echo $option['data0']; ?>

						</option>

						<?php
					}
				}

				?>

			</select>

		</span>
	</span>

	<?php if ($elt['disabled'] != 'Y'){ ?>
		<?php include(WS_ELEMENTS . 'form_warning.php'); ?>
	<?php } ?>

</p>