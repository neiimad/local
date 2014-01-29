<?php if ($elt['element_disabled'] != 'Y'){ ?>

	<?php $id = $elt['element_label']; if ($id == '') $id = 'elt_'.$elt['id']; ?>

	<p class="form-elt <?php echo $elt['element_class']; ?>">

		<span class="label">
			<?php if ($elt['data0']){ echo $elt['data0']; } ?>
		</span>

		<span class="field submit">
			<span class="wrap">
				<input
			        type = "submit"
					<?php if ($id){ ?>id="<?php echo $id; ?>"<?php } ?>
					<?php if ($elt['value']){ ?>value="<?php echo $elt['value']; ?>"<?php } ?>
				/>
			</span>
		</span>

	</p>

<?php } ?>