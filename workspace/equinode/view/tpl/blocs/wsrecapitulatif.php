<?php //if (isset($this->bloc['params']['head']) || isset($this->bloc['params']['inner']) || isset($this->bloc['params']['bottom'])){ ?>

	<div class="container" id="<?php echo $this->bloc['id']; ?>">
		<div class="bloc">

			<?php //if (isset($this->bloc['params']['head'])){ ?>
				<div class="head">

					<?php // TITRE
						$contenu = 'Saisie de membre';
					 	$el = array(	'type'  			=> "content_h2",
										'element_label'		=> 'saisidemembre_h2',
										'element_disabled' 	=> 'N',
										'value' 			=> $contenu,
										'data0' 			=> WS_IMG .'picto_order.png');
						$this->getElement($el);
					?>

					<?php $this->getElements($this->bloc['params']['head']); ?>
				</div>
			<?php //} ?>

			<?php //if (isset($this->bloc['params']['inner'])){ ?>
				<div class="inner">


					<?php // FORMULAIRE
					
						$form_params = array(
							id 			=> 'form_saisiedemembre_form',
							context 	=> 'form_saisiedemembre_form',
							toUrl 		=> 'recapitulatif2'
						);
					
					?>

					<form id="<?php echo $form_params['id']; ?>" method="POST" action="/?" enctype="multipart/form-data">

						<p class="form-hidden">
							<input type="hidden" name="context" value="<?php echo $form_params['context']; ?>" />
							<input type="hidden" name="toUrl" value="<?php echo $form_params['toUrl']; ?>" />
						</p>

						<fieldset>
							<legend>FORMULAIRE</legend>

							<?php // RADIO INPUT
								$el = array(	'type'				=> 'form_radio_input',
												'element_parent'	=> 'civility',		// parent label
							                	'element_label'		=> 'civility_choix1',
					        		        	'element_disabled' 	=> 'Y',							// attr disabled
												'element_class'		=> 'form-row',
					        		        	'data0' 			=> 'Madame',					// label input
												'data6'				=> 'Y',							// checked
												'value'				=> 'MME');						// value
								$this->addElement($el);
							?>

							<?php // RADIO INPUT
								$el = array(	'type'				=> 'form_radio_input',
												'element_parent'	=> 'civility',		// parent label
							                	'element_label'		=> 'civility_choix2',
					        		        	'element_disabled' 	=> 'Y',							// attr disabled
												'element_class'		=> 'form-row',
					        		        	'data0' 			=> 'Monsieur',					// label input
												'data6'				=> 'N',							// checked
												'value'				=> 'MR');						// value
								$this->addElement($el);
							?>

							<?php // RADIOS ELEMENT
								$el = array(	'id'				=> 'civility',
												'type'				=> 'form_radio',
							                	'element_label'		=> 'civility',
					        		        	'element_disabled' 	=> 'Y',
												'element_class'		=> 'form-row',
					        		        	'data0' 			=> 'Civilité',				// label
												'data5'				=> 'Y');						// mandatory
								$this->getElement($el);
							?>

							<?php // TEXT
								$el = array(	'type'				=> 'form_text',
							                	'element_label'		=> 'firstname',
					        		        	'element_disabled' 	=> 'Y',
												'element_class'		=> 'form-row',
												'value'				=> '',
					        		        	'data0' 			=> 'Prénom',					// label
					        		        	'data2' 			=> '60',						// size
												'data3' 			=> '',							// maxlength
												'data4' 			=> 'Exemple',					// placeholder
												'data5'				=> 'Y');						// mandatory
								$this->getElement($el);
							?>

							<?php // TEXT
								$el = array(	'type'				=> 'form_text',
							                	'element_label'		=> 'lastname',
					        		        	'element_disabled' 	=> 'Y',
												'element_class'		=> 'form-row',
												'value'				=> '',
					        		        	'data0' 			=> 'Nom',						// label
					        		        	'data2' 			=> '60',						// size
												'data3' 			=> '',							// maxlength
												'data4' 			=> 'Exemple',					// placeholder
												'data5'				=> 'Y');						// mandatory
								$this->getElement($el);
							?>

							<?php // TEXT
								$el = array(	'type'				=> 'form_text',
							                	'element_label'		=> 'adresse1',
					        		        	'element_disabled' 	=> 'Y',
												'element_class'		=> 'form-row',
												'value'				=> '',
					        		        	'data0' 			=> 'Addresse',					// label
					        		        	'data2' 			=> '60',						// size
												'data3' 			=> '',							// maxlength
												'data4' 			=> '1 (bis) Don-Ville',			// placeholder
												'data5'				=> 'Y');						// mandatory
								$this->getElement($el);
							?>

							<?php // TEXT
								$el = array(	'type'				=> 'form_text',
							                	'element_label'		=> 'adresse2',
					        		        	'element_disabled' 	=> 'Y',
												'element_class'		=> 'form-row',
												'value'				=> '',
					        		        	'data0' 			=> '',					// label
					        		        	'data2' 			=> '60',						// size
												'data3' 			=> '',							// maxlength
												'data4' 			=> 'Exemple',					// placeholder
												'data5'				=> 'N');						// mandatory
								$this->getElement($el);
							?>

							<?php // TEXT
								$el = array(	'type'				=> 'form_text',
							                	'element_label'		=> 'adresse3',
					        		        	'element_disabled' 	=> 'Y',
												'element_class'		=> 'form-row',
												'value'				=> '',
					        		        	'data0' 			=> '',					// label
					        		        	'data2' 			=> '60',						// size
												'data3' 			=> '',							// maxlength
												'data4' 			=> 'Exemple',					// placeholder
												'data5'				=> 'N');						// mandatory
								$this->getElement($el);
							?>

							<?php // TEXT
								$el = array(	'type'				=> 'form_text',
							                	'element_label'		=> 'postalcode',
					        		        	'element_disabled' 	=> 'Y',
												'element_class'		=> 'form-row',
												'value'				=> '',
					        		        	'data0' 			=> 'Code postal',					// label
					        		        	'data2' 			=> '60',						// size
												'data3' 			=> '',							// maxlength
												'data4' 			=> '75001',					// placeholder
												'data5'				=> 'Y');						// mandatory
								$this->getElement($el);
							?>

							<?php // TEXT
								$el = array(	'type'				=> 'form_text',
							                	'element_label'		=> 'city',
					        		        	'element_disabled' 	=> 'Y',
												'element_class'		=> 'form-row',
												'value'				=> '',
					        		        	'data0' 			=> 'Ville',					// label
					        		        	'data2' 			=> '60',						// size
												'data3' 			=> '',							// maxlength
												'data4' 			=> 'Paris',					// placeholder
												'data5'				=> 'Y');						// mandatory
								$this->getElement($el);
							?>

							<?php // TEXT
								$el = array(	'type'				=> 'form_text',
							                	'element_label'		=> 'district',
					        		        	'element_disabled' 	=> 'Y',
												'element_class'		=> 'form-row',
												'value'				=> '',
					        		        	'data0' 			=> 'Région',					// label
					        		        	'data2' 			=> '60',						// size
												'data3' 			=> '',							// maxlength
												'data4' 			=> 'Ile-de-France',					// placeholder
												'data5'				=> 'N');						// mandatory
								$this->getElement($el);
							?>

							<?php // TEXT
								$el = array(	'type'				=> 'form_text',
							                	'element_label'		=> 'state',
					        		        	'element_disabled' 	=> 'Y',
												'element_class'		=> 'form-row',
												'value'				=> '',
					        		        	'data0' 			=> 'Etat',						// label
					        		        	'data2' 			=> '60',						// size
												'data3' 			=> '',							// maxlength
												'data4' 			=> 'Exemple',					// placeholder
												'data5'				=> 'N');						// mandatory
								$this->getElement($el);
							?>

							<?php // TEXT
								$el = array(	'type'				=> 'form_text',
							                	'element_label'		=> 'country',
					        		        	'element_disabled' 	=> 'Y',
												'element_class'		=> 'form-row',
												'value'				=> '',
					        		        	'data0' 			=> 'Pays',						// label
					        		        	'data2' 			=> '60',						// size
												'data3' 			=> '',							// maxlength
												'data4' 			=> 'France',					// placeholder
												'data5'				=> 'N');						// mandatory
								$this->getElement($el);
							?>

							<?php // TEXT
								$el = array(	'type'				=> 'form_text',
							                	'element_label'		=> 'phone',
					        		        	'element_disabled' 	=> 'Y',
												'element_class'		=> 'form-row',
												'value'				=> '',
					        		        	'data0' 			=> 'Téléphone',					// label
					        		        	'data2' 			=> '60',						// size
												'data3' 			=> '',							// maxlength
												'data4' 			=> '0101010101',				// placeholder
												'data5'				=> 'N');						// mandatory
								$this->getElement($el);
							?>

							<?php // TEXT
								$el = array(	'type'				=> 'form_text',
							                	'element_label'		=> 'fax',
					        		        	'element_disabled' 	=> 'Y',
												'element_class'		=> 'form-row',
												'value'				=> '',
					        		        	'data0' 			=> 'Fax',					// label
					        		        	'data2' 			=> '60',						// size
												'data3' 			=> '',							// maxlength
												'data4' 			=> '0101010101',				// placeholder
												'data5'				=> 'N');						// mandatory
								$this->getElement($el);
							?>

							<?php // TEXT
								$el = array(	'type'				=> 'form_text',
							                	'element_label'		=> 'mobile',
					        		        	'element_disabled' 	=> 'Y',
												'element_class'		=> 'form-row',
												'value'				=> '',
					        		        	'data0' 			=> 'Mobile',					// label
					        		        	'data2' 			=> '60',						// size
												'data3' 			=> '',							// maxlength
												'data4' 			=> '0606060606',				// placeholder
												'data5'				=> 'N');						// mandatory
								$this->getElement($el);
							?>

							<?php // TEXT
								$el = array(	'type'				=> 'form_text',
							                	'element_label'		=> 'email',
					        		        	'element_disabled' 	=> 'Y',
												'element_class'		=> 'form-row',
												'value'				=> '',
					        		        	'data0' 			=> 'E-mail',					// label
					        		        	'data2' 			=> '60',						// size
												'data3' 			=> '',							// maxlength
												'data4' 			=> 'sample@domaine.tld', 		// placeholder
												'data5'				=> 'Y');						// mandatory
								$this->getElement($el);
							?>

							<?php // IMAGE
								$el = array(	'type'				=> 'form_image',
							                	'element_label'		=> 'photo',
					        		        	'element_disabled' 	=> 'Y',
												'element_class'		=> 'form-row',
												'value'				=> '',
					        		        	'data0' 			=> 'Photo',						// label
												'data5'				=> 'Y');						// mandatory
								$this->getElement($el);
							?>

							<?php // DATE
								$el = array(	'id'				=> 'element_form_date',
												'type'				=> 'form_date',
							                	'element_label'		=> 'element_form_date',
					        		        	'element_disabled' 	=> 'Y',
												'element_class'		=> 'form-row',
					        		        	'data0' 			=> 'Dernière modification',		// label
												'data5'				=> 'N');						// mandatory
								$this->getElement($el);
							?>

							<?php // SUBMIT
								$el = array(	'type'				=> 'form_submit',
							                	'element_label'		=> 'form_saisiedemembre_form_submit',
					        		        	'element_disabled' 	=> 'Y',
												'element_class'		=> 'form-row',
												'value'				=> 'VALIDER',
					        		        	'data0' 			=> '');
								$this->getElement($el);
							?>

						</fieldset>

						<script type="text/javascript">
						$(document).ready(function(){

							$('form#form_saisiedemembre_form').formulate();

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

	<?php
		$this->bloc['id'] = 'form_preview';
		$this->getBloc();
	?>

<?php //} ?>