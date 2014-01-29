<?php if ($elt['element_disabled'] != 'Y'){ ?>

	<?php $id = $elt['element_label']; if ($id == '') $id = 'elt_'.$elt['id']; ?>

	<div class="items <?php if ($elt['element_class'] != ""){ echo $elt['element_class']; } ?>" id="<?php echo $id; ?>">
		<div class="prepend"></div>

		<?php //print_r($field);
			/*
			if (isset($field->nodevalue->tabs->nodevalue) && !empty($field->nodevalue->tabs->nodevalue))
			{
				$cpt = 0;
				foreach ($field->nodevalue->tabs->nodevalue as $tab)
				{

					if (isset($tab->attributes->type) && $tab->attributes->type == 'tab')
					{
						if ($cpt == 0)
						{
							?>

							<ul class="tabs">

							<?php
						}

						$cpt = $cpt +1;

						$contentId = '';
						$cpt2 = 0;
						foreach ($field->nodevalue->items->nodevalue as $key => $item)
						{
							$cpt2 = $cpt2 +1;

							if ($cpt2 == $cpt)
							{
								$contentId = $key;
							}
						}

						?>

						<li class="tab" id="<?php echo $tab->attributes->id; ?>">

							<a class="link btn" href="#<?php echo $contentId; ?>">
								<span class="wrap">
									<span class="icon"></span>
									<span class="libelle">
										<?php echo $tab->nodevalue->data->nodevalue; ?>
									</span>
								</span>
							</a>

						</li>

						<?php
					}
				}
				if ($cpt > 0)
				{
					?>

					</ul>

					<?php
				}	
			}*/
		?>

		<div class="mask">
			<div class="list">

				<?php
					$cpt = 0;
					foreach ($this->elements as $key => $element)
					{
						if ($element['type'] == 'item' && $element['element_parent'] == $elt['id'])
						{
							$cpt++;
							$cpt2 = 0;
							foreach ($this->elements as $key2 => $element2)
							{
								if ($element2['element_parent'] == $element['id'] && $element2['element_disabled'] != 'Y')
								{
									$cpt2++;
								}
							}
							if ($cpt2 > 0)
							{
								?>

									<div class="item item-<?php echo ($cpt% 2); ?>" id="items_<?php echo $elt['id']; ?>_item_<?php echo $element['id']; ?>">
										<div class="content">

											<?php
												foreach ($this->elements as $key2 => $element2)
												{
													if ($element2['element_parent'] == $element['id'] && $element2['element_disabled'] != 'Y')
													{
														$this->getElement($element2);
													}
												}
											?>

										</div>
									</div>

								<?php
							}
					 	}
					}
				?>

			</div>
		</div>
	
		<script type="text/javascript">
		$(document).ready(function(){

			<?php //if ($elt['random'] == 'Y'){ ?>
				//$('#<?php echo $id; ?> .list').randomChildren();
			<?php //} ?>

		});
		</script>

		<div class="append"></div>
	</div>

<?php } ?>