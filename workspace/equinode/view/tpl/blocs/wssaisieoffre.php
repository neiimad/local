<?php //if (isset($this->bloc['params']['head']) || isset($this->bloc['params']['inner']) || isset($this->bloc['params']['bottom'])){ ?>
	
	<?php $theproduct = $this->data['POST']; ?>

	<div class="container offre" id="<?php echo $this->bloc['id']; ?>">
		<div class="bloc">

			<?php //if (isset($this->bloc['params']['head'])){ ?>
				<div class="head">

					<?php // TITRE
						$contenu = "Saisie d'offre";
					 	$el = array(	'type'  			=> "content_h2",
										'element_label'		=> 'elements_h2',
										'element_disabled' 	=> 'N',
										'value' 			=> $contenu,
										'data0' 			=> WS_IMG .'picto_default.png');
						$this->getElement($el);
					?>


<?php if (stristr('ADMINISTRATOR', $this->data['wsuser']['category'])){ ?>

					<?php if ($this->data['POST']['disabled'] == 'Y'){ ?>
					<?php // INFO
						$contenu = 'Modification effectuée';
						$el = array(	'type'				=> 'content_info',
					                	'element_label'		=> 'element_info',
							        	'element_disabled' 	=> 'N',
							        	'value' 			=> $contenu);
						$this->getElement($el);
					?>
					<?php } ?>

<?php } ?>

					<?php // TEXTE
		   				$date  = mb_substr($theproduct['datemodif'],8,2).'-'.mb_substr($theproduct['datemodif'],5,2).'-'.mb_substr($theproduct['datemodif'],0,4);
		   				$date .= ' à '. mb_substr($theproduct['datemodif'],11,5);
		   				$contenu = 'Ajout effectué le '.$date;
						$el = array(	'type'				=> 'content_info',
					                	'element_label'		=> 'content_info_datemodif',
			        		        	'element_disabled' 	=> 'N',
			        		        	'value' 			=> $contenu);
						//$this->getElement($el);
					?>

					<?php $this->getElements($this->bloc['params']['head']); ?>
				</div>
			<?php //} ?>

			<?php //if (isset($this->bloc['params']['inner'])){ ?>
				<div class="inner">

					<?php // FORMULAIRE
					
						$form_params = array(
							id 			=> 'form_saisieoffre_form',
							context 	=> 'form_saisieoffre_form',
							toUrl 		=> ''
						);
					
					?>

					<form id="<?php echo $form_params['id']; ?>" method="POST" action="/?" enctype="multipart/form-data">

						<p class="form-hidden">
							<input type="hidden" name="context" value="<?php echo $form_params['context']; ?>" />
							<input type="hidden" name="toUrl" value="<?php echo $form_params['toUrl']; ?>" />
							<?php
							//print_r($this->data['form_hidden_fields']);
							if (isset($this->data['form_hidden_fields']) && !empty($this->data['form_hidden_fields']))
							foreach($this->data['form_hidden_fields'] as $name => $value){
								?>
								<input type="hidden" name="<?php echo $name; ?>" value="<?php echo $value; ?>" />
								<?php
							}
							?>
						</p>

						<?php
							$disabled = ($this->data['POST']['disabled'] != '') ? $this->data['POST']['disabled']:'Y'; 
							$disabled = 'N';
						?>

					<div class="col">
					<div>

						<?php // TEXT
							$label = "Lieu de travail";
							$el = array(	'type'				=> 'form_text',
						                	'element_label'		=> 'lieu',
				        		        	'element_disabled' 	=> $disabled,
											'element_class'		=> 'form-row',
											'value'				=> $theproduct['lieu'],
				        		        	'data0' 			=> $label,				// label
				        		        	'data2' 			=> '60',						// size
											'data3' 			=> '',							// maxlength
											'data4' 			=> 'Nord Pas de Calais',				// placeholder
											'data5'				=> '');						// mandatory
							$this->getElement($el);
						?>

						<?php // TEXT
							$label = "Type de contrat";
							$el = array(	'type'				=> 'form_text',
						                	'element_label'		=> 'type',
				        		        	'element_disabled' 	=> $disabled,
											'element_class'		=> 'form-row',
											'value'				=> $theproduct['type'],
				        		        	'data0' 			=> $label,				// label
				        		        	'data2' 			=> '60',						// size
											'data3' 			=> '',							// maxlength
											'data4' 			=> 'Contrat à durée indéterminée',				// placeholder
											'data5'				=> '');						// mandatory
							$this->getElement($el);
						?>

						<?php // TEXT
							$label = "Nature de l'offre";
							$el = array(	'type'				=> 'form_text',
						                	'element_label'		=> 'nature',
				        		        	'element_disabled' 	=> $disabled,
											'element_class'		=> 'form-row',
											'value'				=> $theproduct['nature'],
				        		        	'data0' 			=> $label,				// label
				        		        	'data2' 			=> '60',						// size
											'data3' 			=> '',							// maxlength
											'data4' 			=> 'Contrat tout public',				// placeholder
											'data5'				=> '');						// mandatory
							$this->getElement($el);
						?>

						<?php // TEXT
							$label = "Expérience";
							$el = array(	'type'				=> 'form_text',
						                	'element_label'		=> 'experience',
				        		        	'element_disabled' 	=> $disabled,
											'element_class'		=> 'form-row',
											'value'				=> $theproduct['experience'],
				        		        	'data0' 			=> $label,				// label
				        		        	'data2' 			=> '60',						// size
											'data3' 			=> '',							// maxlength
											'data4' 			=> 'non spécifié',				// placeholder
											'data5'				=> '');						// mandatory
							$this->getElement($el);
						?>

						<?php // TEXT
							$label = "Formation";
							$el = array(	'type'				=> 'form_text',
						                	'element_label'		=> 'formation',
				        		        	'element_disabled' 	=> $disabled,
											'element_class'		=> 'form-row',
											'value'				=> $theproduct['formation'],
				        		        	'data0' 			=> $label,				// label
				        		        	'data2' 			=> '60',						// size
											'data3' 			=> '',							// maxlength
											'data4' 			=> 'Niveau : Bac+5 et plus ou équivalent Exigé',				// placeholder
											'data5'				=> '');						// mandatory
							$this->getElement($el);
						?>

						<?php // TEXT
							$label = "Domaine";
							$el = array(	'type'				=> 'form_text',
						                	'element_label'		=> 'domaine',
				        		        	'element_disabled' 	=> $disabled,
											'element_class'		=> 'form-row',
											'value'				=> $theproduct['domaine'],
				        		        	'data0' 			=> $label,				// label
				        		        	'data2' 			=> '60',						// size
											'data3' 			=> '',							// maxlength
											'data4' 			=> 'Informatique',				// placeholder
											'data5'				=> '');						// mandatory
							$this->getElement($el);
						?>

						<?php // TEXT
							$label = "Secteur d'activité";
							$el = array(	'type'				=> 'form_text',
						                	'element_label'		=> 'secteur',
				        		        	'element_disabled' 	=> $disabled,
											'element_class'		=> 'form-row',
											'value'				=> $theproduct['secteur'],
				        		        	'data0' 			=> $label,				// label
				        		        	'data2' 			=> '60',						// size
											'data3' 			=> '',							// maxlength
											'data4' 			=> 'Conseil en systèmes et logiciels informatiques',				// placeholder
											'data5'				=> '');						// mandatory
							$this->getElement($el);
						?>

						<?php // TEXT
							$label = "Langues";
							$el = array(	'type'				=> 'form_text',
						                	'element_label'		=> 'language',
				        		        	'element_disabled' 	=> $disabled,
											'element_class'		=> 'form-row',
											'value'				=> $theproduct['language'],
				        		        	'data0' 			=> $label,				// label
				        		        	'data2' 			=> '60',						// size
											'data3' 			=> '',							// maxlength
											'data4' 			=> 'anglais,allemand',				// placeholder
											'data5'				=> '');						// mandatory
							$this->getElement($el);
						?>

						<?php // TEXT
							$label = "Permis";
							$el = array(	'type'				=> 'form_text',
						                	'element_label'		=> 'permis',
				        		        	'element_disabled' 	=> $disabled,
											'element_class'		=> 'form-row',
											'value'				=> $theproduct['permis'],
				        		        	'data0' 			=> $label,				// label
				        		        	'data2' 			=> '60',						// size
											'data3' 			=> '',							// maxlength
											'data4' 			=> 'A',				// placeholder
											'data5'				=> '');						// mandatory
							$this->getElement($el);
						?>

						<?php // TEXT
							$label = "Connaissances bureautiques";
							$el = array(	'type'				=> 'form_text',
						                	'element_label'		=> 'bureautique',
				        		        	'element_disabled' 	=> $disabled,
											'element_class'		=> 'form-row',
											'value'				=> $theproduct['bureautique'],
				        		        	'data0' 			=> $label,				// label
				        		        	'data2' 			=> '60',						// size
											'data3' 			=> '',							// maxlength
											'data4' 			=> 'word,excel',				// placeholder
											'data5'				=> '');						// mandatory
							$this->getElement($el);
						?>

						<?php // TEXT
							$label = "Qualification";
							$el = array(	'type'				=> 'form_text',
						                	'element_label'		=> 'qualification',
				        		        	'element_disabled' 	=> $disabled,
											'element_class'		=> 'form-row',
											'value'				=> $theproduct['qualification'],
				        		        	'data0' 			=> $label,				// label
				        		        	'data2' 			=> '60',						// size
											'data3' 			=> '',							// maxlength
											'data4' 			=> 'cadre',				// placeholder
											'data5'				=> '');						// mandatory
							$this->getElement($el);
						?>

						<?php // TEXT
							$label = "Salaire indicatif";
							$el = array(	'type'				=> 'form_text',
						                	'element_label'		=> 'salaire',
				        		        	'element_disabled' 	=> $disabled,
											'element_class'		=> 'form-row',
											'value'				=> $theproduct['salaire'],
				        		        	'data0' 			=> $label,				// label
				        		        	'data2' 			=> '60',						// size
											'data3' 			=> '',							// maxlength
											'data4' 			=> 'non spécifié',				// placeholder
											'data5'				=> '');						// mandatory
							$this->getElement($el);
						?>

						<span class="newline"></span>
					</div>
					</div>

					<div>
					<div>

						<?php // TEXT
							$label = "Libellé de l'offre";
							$el = array(	'type'				=> 'form_text',
						                	'element_label'		=> 'title',
				        		        	'element_disabled' 	=> $disabled,
											'element_class'		=> 'form-row',
											'value'				=> $theproduct['title'],
				        		        	'data0' 			=> $label,				// label
				        		        	'data2' 			=> '80',						// size
											'data3' 			=> '80',							// maxlength
											'data4' 			=> 'Ingenieur d\'etudes r&d (h/f)',				// placeholder
											'data5'				=> 'Y');						// mandatory
							$this->getElement($el);
						?>

						<span class="newline"></span>
					</div>
					</div>

					<div>
					<div>

						<?php // TEXTAREA
							$el = array(	'type'				=> 'form_textarea',
						                	'element_label'		=> 'data0',
				        		        	'element_disabled' 	=> $disabled,
											'element_class'		=> 'form-row',
											'value'				=> $theproduct['data0'],
				        		        	'data0' 			=> 'Entreprise',				// label
				        		        	'data2' 			=> '111',						// size
											'data3' 			=> '200',						// maxlength
											'data4' 			=> 'Description de votre entreprise',				// placeholder
											'data5'				=> '',							// mandatory
											'data7'				=> '8');						// rows
							$this->getElement($el);
						?>

						<span class="newline"></span>
					</div>
					</div>

					<div>
					<div>

						<?php // TEXTAREA
							$el = array(	'type'				=> 'form_textarea',
						                	'element_label'		=> 'data1',
				        		        	'element_disabled' 	=> $disabled,
											'element_class'		=> 'form-row',
											'value'				=> $theproduct['data1'],
				        		        	'data0' 			=> 'Poste',				// label
				        		        	'data2' 			=> '111',						// size
											'data3' 			=> '200',						// maxlength
											'data4' 			=> 'Description du poste',				// placeholder
											'data5'				=> '',							// mandatory
											'data7'				=> '8');						// rows
							$this->getElement($el);
						?>

						<span class="newline"></span>
					</div>
					</div>

					<div>
					<div>

						<?php // TEXTAREA
							$el = array(	'type'				=> 'form_textarea',
						                	'element_label'		=> 'data2',
				        		        	'element_disabled' 	=> $disabled,
											'element_class'		=> 'form-row',
											'value'				=> $theproduct['data2'],
				        		        	'data0' 			=> 'Profil',				// label
				        		        	'data2' 			=> '111',						// size
											'data3' 			=> '200',						// maxlength
											'data4' 			=> 'Description du profil',				// placeholder
											'data5'				=> '',							// mandatory
											'data7'				=> '8');						// rows
							$this->getElement($el);
						?>

						<span class="newline"></span>
					</div>
					</div>

				<span class="newline"></span>

				<?php // SUBMIT
					$el = array(	'type'				=> 'form_submit',
				                	'element_label'		=> 'element_form_submit',
		        		        	'element_disabled' 	=> $disabled,
									'element_class'		=> 'center',
									'value'				=> 'VALIDER',
		        		        	'data0' 			=> '');// label
					$this->getElement($el);
				?>

				<span class="newline"></span>

				<script type="text/javascript">
				$(document).ready(function(){

					$('form').formulate();

				});
				</script>
</form>

					

					<?php $this->getElements($this->bloc['params']['inner']); ?>
				</div>
			<?php //} ?>

			<?php if (isset($this->bloc['params']['bottom'])){ ?>
				<div class="bottom">
					<?php $this->getElements($this->bloc['params']['bottom']); ?>
				</div>
			<?php } ?>

		</div>
	</div>

<?php //} ?>