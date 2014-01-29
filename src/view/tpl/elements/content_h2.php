<?php if ($elt['element_disabled'] != 'Y'){ ?>

	<h2>

		<?php $id = $elt['element_label']; if ($id == '') $id = 'elt_'.$elt['id']; ?>

		<a class="anchor" id="<?php echo $id; ?>" href="#<?php echo $id; ?>">
	        <span class="wrap">

	        	<?php if ($elt['data0'] != ''){ ?>

	        		<img
	        			class="icon"
	        			alt="" 
	        			src="<?php echo $elt['data0']; ?>" 
	        		/>

	        	<?php } ?>

	        	<?php if ($elt['value'] != '') { ?>
	        		<span class="libelle"><?php echo $elt['value']; ?></span>
	        	<?php } ?>

	        </span>
		</a>

	</h2>

<?php } ?>