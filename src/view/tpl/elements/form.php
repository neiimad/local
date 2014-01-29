<?php if ($elt['element_disabled'] != 'Y'){ ?>

	<?php $formid = $elt['element_label']; if ($formid == '') $formid = 'elt_'.$elt['id']; ?>

	<form 
		name="form_<?php echo $formid; ?>"
		id="form_<?php echo $formid; ?>" 
		<?php if ($elt['element_class'] != ''){ ?>
			class="<?php echo $elt['element_class']; ?>" 
		<?php } ?>
		method="post" action="/?" 
		enctype="multipart/form-data" 
	>

		<p class="form-hidden">
			<input type="hidden" name="context" value="<?php echo $formid; ?>" />
			<input type="hidden" name="toUrl" value="" />
		</p>

		<?php
			$cpt = 0;
			if (!empty($this->elements))
			foreach ($this->elements as $key => $fieldset)
			{
				if ($fieldset['type'] == 'fieldset' && $fieldset['element_parent'] == $elt['id'])
				{
					$fieldsetid = $fieldset['element_label']; if ($fieldsetid == '') $fieldsetid = 'fieldset_'.$fieldsetid;

					$cpt++;
					?>
						<fieldset>

							<?php if ($fieldset['value'] != ''){ ?>
								<legend><span class="legend"><?php echo $fieldset['value']; ?></span></legend>
							<?php } ?>

							<?php
								$ctp2 = 0;
								foreach ($this->elements as $key2 => $element)
								{
									if ($element['element_parent'] == $fieldset['id']){
										$ctp2++;
										$this->getElement($element);
									}
								}
							?>

						</fieldset>
					<?php
				}
			}

		?>

		<script type="text/javascript">
		$(document).ready(function(){

			$('form#form_<?php echo $formid; ?>').formulate();

		});
		</script>

	</form>

<?php } ?>