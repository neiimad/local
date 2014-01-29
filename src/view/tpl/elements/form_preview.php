<?php
	$form_preview_type = 'card';
	//$form_preview_type = 'a4';
?>

<?php $id = $elt['element_label']; if ($id == '') $id = 'elt_'.$elt['id']; if ($id == 'elt_'){ $id = 'elt_form_preview'; } ?>

<div class="form_preview form_preview-<?php echo $form_preview_type; ?>"id="<?php echo $id; ?>">
	<div class="badge">
		<img class="bg" src="/app/src/view/img/form_preview/<?php echo $form_preview_type; ?>.png">
		<div class="wrap">
			<div class="fields">

				<span class="field" id="preview_firstname"></span>
				<span class="field" id="preview_lastname"></span>

			</div>
			<div class="code">
				<img class="cab" src="/app/src/view/img/form_preview/cab.png"><br />
				<span class="mention"><?php
					$member = $this->data['wsprofil'];
					$date = mb_substr($member['datecreate'],5,2).'/'.mb_substr($member['datecreate'],0,4);
				 	if ($date != '/')
						echo $date;
					else
						echo date("m/Y");
				?></span>
			</div>
			<div class="categ"></div>
		</div>
		<img class="specimen" src="/app/src/view/img/form_preview/specimen.png" alt="" />
		<span class="reflection"></span>
	</div>

	<a class="link btn print">
		<span class="wrap">
			<span class="icon"></span>
			<span class="libelle">IMPRIMER</libelle>
		</span>
	</a>
	
	<script type="text/javascript">
	$(document).ready(function(){

		$('#<?php echo $id; ?>').form_preview();

	});
	</script>

</div>