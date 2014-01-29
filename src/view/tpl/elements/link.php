<?php if ($elt['disabled'] != 'Y'){ ?>

	<?php $id = $elt['element_label']; if ($id == '') $id = 'elt_'.$elt['id']; ?>

	<a
		class=	"link <?php echo $elt['element_class']; ?>" 
		id="<?php echo $id; ?>"
		target="<?php if ($elt['data0'] != ''){ echo $elt['data0']; }else{ echo '_self'; } ?>" 
		<?php if ($elt['data1'] != ''){ ?>
			href="<?php echo $elt['data1']; ?>" 
		<?php } ?> 
		title="<?php echo $elt['data2']; ?>" 
		<?php if ($elt['data4'] != ''){ ?>
			rel="<?php echo $elt['data4']; ?>" 
		<?php } ?> 
	>

		<?php if ($elt['value'] != ''){ ?>
			<?php
				//strstr(str_replace('-','',$elt['data1']), URI.$this->view.'/?IdAdmin=');
				$view = ($this->view == 'home') ? '' : $this->view;
				
				
				
				
			?>
			
			<span class="wrap <?php if ((str_replace('-','',$elt['data1']) == URI.$this->view) || ($this->view == 'home' && $elt['data1'] == '/workspace/'. WS_NAME) || strstr(str_replace('-','',$elt['data1']), URI.$view.'/?IdAdmin=') || ($this->view == 'home' && strstr(str_replace('-','',$elt['data1']), '/workspace/'. WS_NAME.'/?IdAdmin='))){ ?>sel<?php } ?>">
				<span class="icon"></span>
				<span class="libelle">
					<?php echo $elt['value']; ?>
				</span>
			</span>
		<?php } ?>

		<script type="text/javascript">
		$(document).ready(function(){

			$('#<?php echo $id; ?>').anchor();

		});
		</script>

	</a>

<?php } ?>