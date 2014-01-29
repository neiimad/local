<?php //if (isset($this->bloc['params']['head']) || isset($this->bloc['params']['inner']) || isset($this->bloc['params']['bottom'])){ ?>

	<div class="container" id="<?php echo $this->bloc['id']; ?>">
		<div class="bloc">

			<?php //if (isset($this->bloc['params']['head'])){ ?>
				<div class="head">

					<?php // TITRE
						$contenu = 'Edition de membre';
					 	$el = array(	'type'  			=> "content_h2",
										'element_label'		=> 'saisidemembre_h2',
										'element_disabled' 	=> 'N',
										'value' 			=> $contenu,
										'data0' 			=> WS_IMG .'picto_order.png');
						$this->getElement($el);
					?>

					<?php // LIEN BOUTON
						$contenu 	= 'Retour';
						$href 		= '/app/workspace/equinode/profil/?IdP='.$this->data['POST']['id_md5'];
						if (stristr('ADMINISTRATOR', $this->data['wsuser']['category']))
						{
							$href .= '&IdAdmin='.$this->data['wsuser']['id_md5'];
						}
						$title 		= 'Ouvrir la page';
						$el = array(	'type'				=> 'link',
					                	'element_label'		=> 'element_link',
			        		        	'element_disabled' 	=> 'N',
										'element_class'		=> 'btn prev right',
			        		        	'data0' 			=> '_self',
			        		        	'data1' 			=> $href,
										'data2'				=> $title,
										'value'				=> $contenu);
						$this->getElement($el);
					?>

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

						<?php $disabled = ($this->data['POST']['disabled'] != '') ? $this->data['POST']['disabled']:'Y'; ?>

						<fieldset>
							<legend>FORMULAIRE</legend>

							<?php // TEXT
								$el = array(	'type'				=> 'form_text',
							                	'element_label'		=> 'datecreate',
					        		        	'element_disabled' 	=> 'Y',
												'element_class'		=> 'form-row',
												'value'				=> $this->data['POST']['datecreate'],
					        		        	'data0' 			=> 'Membre crée le',					// label
					        		        	'data2' 			=> '60',						// size
												'data3' 			=> '',							// maxlength
												'data4' 			=> '',					// placeholder
												'data5'				=> 'N');						// mandatory
								$this->getElement($el);
							?>

							<?php // TEXT
								$el = array(	'type'				=> 'form_text',
							                	'element_label'		=> 'datemodif',
					        		        	'element_disabled' 	=> 'Y',
												'element_class'		=> 'form-row',
												'value'				=> $this->data['POST']['datemodif'],
					        		        	'data0' 			=> 'Dernière modification le',					// label
					        		        	'data2' 			=> '60',						// size
												'data3' 			=> '',							// maxlength
												'data4' 			=> '',					// placeholder
												'data5'				=> 'N');						// mandatory
								$this->getElement($el);
							?>

							<?php // RADIO INPUT
								$el = array(	'type'				=> 'form_radio_input',
												'element_parent'	=> 'civility',		// parent label
							                	'element_label'		=> 'civility_choix1',
					        		        	'element_disabled' 	=> 'N',							// attr disabled
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
					        		        	'element_disabled' 	=> $disabled,							// attr disabled
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
					        		        	'element_disabled' 	=> $disabled,
												'element_class'		=> 'form-row',
					        		        	'data0' 			=> 'Civilité',				// label
												'data5'				=> 'Y');						// mandatory
								$this->getElement($el);
							?>

							<?php // TEXT
								$el = array(	'type'				=> 'form_text',
							                	'element_label'		=> 'firstname',
					        		        	'element_disabled' 	=> $disabled,
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
					        		        	'element_disabled' 	=> $disabled,
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
							                	'element_label'		=> 'address1',
					        		        	'element_disabled' 	=> $disabled,
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
							                	'element_label'		=> 'address2',
					        		        	'element_disabled' 	=> $disabled,
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
							                	'element_label'		=> 'address3',
					        		        	'element_disabled' 	=> $disabled,
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
					        		        	'element_disabled' 	=> $disabled,
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
					        		        	'element_disabled' 	=> $disabled,
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
					        		        	'element_disabled' 	=> $disabled,
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
					        		        	'element_disabled' 	=> $disabled,
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
								$el = array(	'type'				=> 'form_pays',
							                	'element_label'		=> 'country',
					        		        	'element_disabled' 	=> $disabled,
												'element_class'		=> 'form-row',
												'value'				=> '',
					        		        	'data0' 			=> 'Pays',						// label
					        		        	'data2' 			=> '',						// size
												'data3' 			=> '',							// maxlength
												'data4' 			=> '',					// placeholder
												'data5'				=> 'Y');						// mandatory
								$this->getElement($el);
							?>

							<?php // TEXT
								$el = array(	'type'				=> 'form_text',
							                	'element_label'		=> 'phone',
					        		        	'element_disabled' 	=> $disabled,
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
					        		        	'element_disabled' 	=> $disabled,
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
					        		        	'element_disabled' 	=> $disabled,
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
					        		        	'element_disabled' 	=> $disabled,
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
					        		        	'element_disabled' 	=> $disabled,
												'element_class'		=> 'form-row',
												'value'				=> '',
					        		        	'data0' 			=> 'Photo',						// label
												'data5'				=> 'Y');						// mandatory
								$this->getElement($el);
							?>

							<?php if ($disabled == 'N'){ ?>
							<?php // SUBMIT
								$el = array(	'type'				=> 'form_submit',
							                	'element_label'		=> 'form_saisiedemembre_form_submit',
					        		        	'element_disabled' 	=> 'N',
												'element_class'		=> 'form-row',
												'value'				=> 'VALIDER',
					        		        	'data0' 			=> '');
								$this->getElement($el);
							?>
							<?php } ?>

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