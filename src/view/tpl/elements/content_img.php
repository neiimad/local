<?php $id = $elt['element_label']; if ($id == '') $id = 'elt_'.$elt['id']; ?>

<div class="img <?php echo $elt['element_class']; ?>" id="<?php echo $id; ?>">

	<a class="anchor"
		<?php if ($elt['data0'] != ''){ ?>
			href="<?php echo $elt['data0']; ?>" 
		<?php } ?>
		<?php if ($elt['data1'] != ""){ ?>
			title="<?php echo $elt['data1']; ?>"
		<?php } ?>
	>

		<img 
			alt="<?php echo $elt['data2']; ?>" 
			src="<?php echo $elt['value']; ?>" 
		/>

		<span class="launch"></span>

		<?php if ($elt['data2'] != ''){ ?>

			<span class="wrap <?php if ($elt['data0'] == ''){ ?>no-href<?php } ?>">

				<span class="icon"></span>
				<span class="libelle">
					<?php echo $elt['data2']; ?>
				</span>
			</span>

		<?php } ?>

		<script type="text/javascript">
		$(document).ready(function(){

			$('#<?php echo $id; ?> a').anchor();

		});
		</script>

	</a>
</div>