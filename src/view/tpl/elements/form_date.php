<?php $id = $elt['element_label']; if ($id == '') $id = 'elt_'.$elt['id']; ?>

<p class="form-elt <?php if ($elt['element_disabled'] == 'Y'){ echo ' form-disabled '; } echo $elt['element_class']; ?> <?php if (isset($this->data['wswarning'][$id])) { ?>form-error<?php } ?>">

	<span class="label">

		<?php echo $elt['data0']; ?>

		<?php if ($elt['data5'] == 'Y'){ ?>
			<span class="mandatory">*</span>
		<?php } ?>

	</span>

	<span class="field">
		<span class="choix date">

			<?php
				$days = range(1, 31);
				$months = range(1, 12);
				$years = range(1930, 2020);
			?>

			<select name="day" <?php if ($elt['element_disabled'] == 'Y'){ ?> disabled="disabled" <?php } ?>>
				<?php foreach($days as $day) { ?>
				  <option value="<?php echo($day) ?>" <?php if ($day == date('j')){ ?> selected="selected" <?php } ?>><?php echo($day) ?></option>
				<? } ?>
			</select>&nbsp;-&nbsp;<select name="month" <?php if ($elt['element_disabled'] == 'Y'){ ?> disabled="disabled" <?php } ?>>
				<?php foreach($months as $month) { ?>
				  <option value="<?php echo($month) ?>" <?php if ($month == date('n')){ ?> selected="selected" <?php } ?>><?php echo($month) ?></option>
				<? } ?>
			</select>&nbsp;-&nbsp;<select name="year" <?php if ($elt['element_disabled'] == 'Y'){ ?> disabled="disabled" <?php } ?>>
				<?php foreach($years as $year) { ?>
				  <option value="<?php echo($year) ?>" <?php if ($year == date('Y')){ ?> selected="selected" <?php } ?>><?php echo($year) ?></option>
				<? } ?>
			</select>

		</span>
	</span>
</p>