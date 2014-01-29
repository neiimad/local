<?php //if (isset($this->bloc['params']['head']) || isset($this->bloc['params']['inner']) || isset($this->bloc['params']['bottom'])){ ?>

	<div class="container" id="<?php echo $this->bloc['id']; ?>">
		<div class="bloc">

			<?php //if (isset($this->bloc['params']['head'])){ ?>
				<div class="head">

					<?php // TITRE
						$contenu = 'Titre h2';
					 	$el = array(	'type'  			=> "content_h2",
										'element_label'		=> 'elements_h2',
										'element_disabled' 	=> 'N',
										'value' 			=> $contenu,
										'data0' 			=> WS_IMG .'picto_default.png');
						$this->getElement($el);
					?>

					<?php $this->getElements($this->bloc['params']['head']); ?>
				</div>
			<?php //} ?>

			<?php //if (isset($this->bloc['params']['inner'])){ ?>
				<div class="inner">

					<?php // SOUS-TITRE H3
						$contenu = 'Sous-titre h3';
						$el = array(	'type'				=> 'content_h3',
					                	'element_label'		=> 'element_h3',
			        		        	'element_disabled' 	=> 'N',
			        		        	'value' 			=> $contenu);
						$this->getElement($el);
					?>

					<?php // SOUS-TITRE H4
						$contenu = 'Sous-titre h4';
						$el = array(	'type'				=> 'content_h4',
					                	'element_label'		=> 'element_h4',
			        		        	'element_disabled' 	=> 'N',
			        		        	'value' 			=> $contenu);
						$this->getElement($el);
					?>

					<?php // SOUS-TITRE H5
						$contenu = 'Sous-titre h5';
						$el = array(	'type'				=> 'content_h5',
					                	'element_label'		=> 'element_h5',
			        		        	'element_disabled' 	=> 'N',
			        		        	'value' 			=> $contenu);
						$this->getElement($el);
					?>

					<?php // SOUS-TITRE H6
						$contenu = 'Sous-titre h6';
						$el = array(	'type'				=> 'content_h6',
					                	'element_label'		=> 'element_h6',
			        		        	'element_disabled' 	=> 'N',
			        		        	'value' 			=> $contenu);
						$this->getElement($el);
					?>
					
					<?php // TEXTE
						$contenu = 'Contenu texte';
						$el = array(	'type'				=> 'content_texte',
					                	'element_label'		=> 'element_texte',
			        		        	'element_disabled' 	=> 'N',
			        		        	'value' 			=> $contenu);
						$this->getElement($el);
					?>

					<?php // CONTENU HTML
						$contenu 	= '<span style="display: block; font-size: 12px; margin: 0 0 0 15px;">Contenu HTML</span><br />';
						$el = array(	'type'				=> 'custom',
					                	'element_label'		=> 'element_custom',
			        		        	'element_disabled' 	=> 'N',
										'element_class'		=> '',
										'value'				=> $contenu);
						$this->getElement($el);
					?>

					<?php // INFO
						$contenu = 'Contenu info';
						$el = array(	'type'				=> 'content_info',
					                	'element_label'		=> 'element_info',
			        		        	'element_disabled' 	=> 'N',
			        		        	'value' 			=> $contenu);
						$this->getElement($el);
					?>

					<?php // ERROR
						$contenu = 'Contenu erreur';
						$el = array(	'type'				=> 'content_error',
					                	'element_label'		=> 'element_error',
			        		        	'element_disabled' 	=> 'N',
			        		        	'value' 			=> $contenu);
						$this->getElement($el);
					?>

					<?php // FORMULAIRE
					
						$form_params = array(
							id 			=> 'form_element_form',
							context 	=> 'form_element_form',
							toUrl 		=> 'elements'
						);
					
					?>

					<form id="<?php echo $form_params['id']; ?>" method="POST" action="/?" enctype="multipart/form-data">

						<p class="form-hidden">
							<input type="hidden" name="context" value="<?php echo $form_params['context']; ?>" />
							<input type="hidden" name="toUrl" value="<?php echo $form_params['toUrl']; ?>" />
						</p>

						<fieldset>
							<legend>FORMULAIRE</legend>

							<?php // IMAGE
								$el = array(	'type'				=> 'form_image',
							                	'element_label'		=> 'element_form_image',
					        		        	'element_disabled' 	=> 'N',
												'element_class'		=> 'form-row',
												'value'				=> '',
					        		        	'data0' 			=> 'Label input',				// label
												'data5'				=> 'Y');						// mandatory
								$this->getElement($el);
							?>

							<?php // TEXT
								$el = array(	'type'				=> 'form_text',
							                	'element_label'		=> 'element_form_text',
					        		        	'element_disabled' 	=> 'N',
												'element_class'		=> 'form-row',
												'value'				=> '',
					        		        	'data0' 			=> 'Label input',				// label
					        		        	'data2' 			=> '60',						// size
												'data3' 			=> '',							// maxlength
												'data4' 			=> 'Placeholder',				// placeholder
												'data5'				=> 'Y');						// mandatory
								$this->getElement($el);
							?>

							<?php // PASSWORD
								$el = array(	'type'				=> 'form_password',
							                	'element_label'		=> 'element_form_password',
					        		        	'element_disabled' 	=> 'N',
												'element_class'		=> 'form-row',
												'value'				=> '',
					        		        	'data0' 			=> 'Label input',				// label
					        		        	'data2' 			=> '60',						// size
												'data3' 			=> '',							// maxlength
												'data4' 			=> '************',				// placeholder
												'data5'				=> 'Y');						// mandatory
								$this->getElement($el);
							?>

							<?php // TEXTAREA
								$el = array(	'type'				=> 'form_textarea',
							                	'element_label'		=> 'element_form_textarea',
					        		        	'element_disabled' 	=> 'N',
												'element_class'		=> 'form-row',
												'value'				=> '',
					        		        	'data0' 			=> 'Label input',				// label
					        		        	'data2' 			=> '60',						// size
												'data3' 			=> '200',						// maxlength
												'data4' 			=> 'Placeholder',				// placeholder
												'data5'				=> 'Y',							// mandatory
												'data7'				=> '8');						// rows
								$this->getElement($el);
							?>

							<?php // CAS PARTICULIER POUR LES RADIOS / CHECKBOXES, IL FAUT AJOUTER LES INPUTS AVANT L'ELT ?>

							<?php // RADIO INPUT
								$el = array(	'type'				=> 'form_radio_input',
												'element_parent'	=> 'element_form_radios',		// parent label
							                	'element_label'		=> 'element_form_radio_input1',
					        		        	'element_disabled' 	=> 'N',							// attr disabled
												'element_class'		=> 'form-row',
					        		        	'data0' 			=> 'Label radio1',				// label input
												'data6'				=> 'Y',							// checked
												'value'				=> 'value1');					// value
								$this->addElement($el);
							?>

							<?php // RADIO INPUT
								$el = array(	'type'				=> 'form_radio_input',
												'element_parent'	=> 'element_form_radios',		// parent label
							                	'element_label'		=> 'element_form_radio_input2',
					        		        	'element_disabled' 	=> 'N',							// attr disabled
												'element_class'		=> 'form-row',
					        		        	'data0' 			=> 'Label radio2',				// label input
												'data6'				=> 'N',							// checked
												'value'				=> 'value2');					// value
								$this->addElement($el);
							?>

							<?php // RADIO INPUT
								$el = array(	'type'				=> 'form_radio_input',
												'element_parent'	=> 'element_form_radios',		// parent label
							                	'element_label'		=> 'element_form_radio_input3',
					        		        	'element_disabled' 	=> 'N',							// attr disabled
												'element_class'		=> 'form-row',
					        		        	'data0' 			=> 'Label radio3',				// label input
												'data6'				=> 'N',							// checked
												'value'				=> 'value3');					// value
								$this->addElement($el);
							?>

							<?php // RADIOS ELEMENT
								$el = array(	'id'				=> 'element_form_radios',
												'type'				=> 'form_radio',
							                	'element_label'		=> 'element_form_radios',
					        		        	'element_disabled' 	=> 'N',
												'element_class'		=> 'form-row',
					        		        	'data0' 			=> 'Label radios',				// label
												'data5'				=> 'Y');						// mandatory
								$this->getElement($el);
							?>

							<?php // CAS PARTICULIER POUR LES RADIOS / CHECKBOXES, IL FAUT AJOUTER LES INPUTS AVANT L'ELT ?>

							<?php // CHECKBOX INPUT
								$el = array(	'type'				=> 'form_checkbox_input',
												'element_parent'	=> 'element_form_checkboxes',		// parent label
							                	'element_label'		=> 'element_form_checkbox_input1',
					        		        	'element_disabled' 	=> 'N',							// attr disabled
												'element_class'		=> 'form-row',
					        		        	'data0' 			=> 'Label radio1',				// label input
												'data6'				=> 'Y',							// checked
												'value'				=> 'value1');					// value
								$this->addElement($el);
							?>

							<?php // CHECKBOX INPUT
								$el = array(	'type'				=> 'form_checkbox_input',
												'element_parent'	=> 'element_form_checkboxes',		// parent label
							                	'element_label'		=> 'element_form_checkbox_input2',
					        		        	'element_disabled' 	=> 'N',							// attr disabled
												'element_class'		=> 'form-row',
					        		        	'data0' 			=> 'Label radio2',				// label input
												'data6'				=> 'N',							// checked
												'value'				=> 'value2');					// value
								$this->addElement($el);
							?>

							<?php // CHECKBOX INPUT
								$el = array(	'type'				=> 'form_checkbox_input',
												'element_parent'	=> 'element_form_checkboxes',		// parent label
							                	'element_label'		=> 'element_form_checkbox_input3',
					        		        	'element_disabled' 	=> 'N',							// attr disabled
												'element_class'		=> 'form-row',
					        		        	'data0' 			=> 'Label radio3',				// label input
												'data6'				=> 'N',							// checked
												'value'				=> 'value3');					// value
								$this->addElement($el);
							?>

							<?php // CHECKBOXES ELEMENT
								$el = array(	'id'				=> 'element_form_checkboxes',
												'type'				=> 'form_checkbox',
							                	'element_label'		=> 'element_form_checkboxes',
					        		        	'element_disabled' 	=> 'N',
												'element_class'		=> 'form-row',
					        		        	'data0' 			=> 'Label radios',				// label
												'data5'				=> 'Y');						// mandatory
								$this->getElement($el);
							?>

							<?php // CAS PARTICULIER POUR LES SELECT, IL FAUT AJOUTER LES OPTIONS AVANT L'ELT SELECT ?>

							<?php // SELECT OPTION
								$el = array(	'type'				=> 'form_select_option',
												'element_parent'	=> 'element_form_select',		// parent label
							                	'element_label'		=> 'form_select_option1',
					        		        	'element_disabled' 	=> 'N',							// attr disabled
												'element_class'		=> 'form-row',
					        		        	'data0' 			=> 'Option label 1',				// label input
												'data6'				=> 'N',							// checked
												'value'				=> 'value1');					// value
								$this->addElement($el);
							?>

							<?php // SELECT OPTION
								$el = array(	'type'				=> 'form_select_option',
												'element_parent'	=> 'element_form_select',		// parent label
							                	'element_label'		=> 'form_select_option2',
					        		        	'element_disabled' 	=> 'N',							// attr disabled
												'element_class'		=> 'form-row',
					        		        	'data0' 			=> 'Option label 2',				// label input
												'data6'				=> 'Y',							// checked
												'value'				=> 'value2');					// value
								$this->addElement($el);
							?>

							<?php // SELECT OPTION
								$el = array(	'type'				=> 'form_select_option',
												'element_parent'	=> 'element_form_select',		// parent label
							                	'element_label'		=> 'form_select_option3',
					        		        	'element_disabled' 	=> 'N',							// attr disabled
												'element_class'		=> 'form-row',
					        		        	'data0' 			=> 'Option label 3',				// label input
												'data6'				=> 'N',							// checked
												'value'				=> 'value3');					// value
								$this->addElement($el);
							?>

							<?php // SELECT ELEMENT
								$el = array(	'id'				=> 'element_form_select',
												'type'				=> 'form_select',
							                	'element_label'		=> 'element_form_select',
					        		        	'element_disabled' 	=> 'N',
												'element_class'		=> 'form-row',
					        		        	'data0' 			=> 'Label select',				// label
												'data5'				=> 'Y');						// mandatory
								$this->getElement($el);
							?>

							<?php // DATE
								$el = array(	'id'				=> 'element_form_date',
												'type'				=> 'form_date',
							                	'element_label'		=> 'element_form_date',
					        		        	'element_disabled' 	=> 'N',
												'element_class'		=> 'form-row',
					        		        	'data0' 			=> 'Label date',				// label
												'data5'				=> 'Y');						// mandatory
								$this->getElement($el);
							?>

							<?php // SUBMIT
								$el = array(	'type'				=> 'form_submit',
							                	'element_label'		=> 'element_form_wubmit',
					        		        	'element_disabled' 	=> 'N',
												'element_class'		=> 'form-row',
												'value'				=> 'VALIDER',
					        		        	'data0' 			=> 'Label possible aussi');
								$this->getElement($el);
							?>

						</fieldset>

						<script type="text/javascript">
						$(document).ready(function(){

							$('form#form_element_form').formulate();

						});
						</script>
					</form>

				</div>
			<?php //} ?>

			<?php //if (isset($this->bloc['params']['bottom'])){ ?>
				<div class="bottom">

					<?php // LIEN
						$contenu 	= 'Lien';
						$href 		= '/workspace/equinode/elements';
						$title 		= 'Ouvrir la page';
						$el = array(	'type'				=> 'link',
					                	'element_label'		=> 'element_link1',
			        		        	'element_disabled' 	=> 'N',
										'element_class'		=> '',
			        		        	'data0' 			=> '_self',
			        		        	'data1' 			=> $href,
										'data2'				=> $title,
										'value'				=> $contenu);
						$this->getElement($el);
					?>

					<?php // LIEN BOUTON
						$contenu 	= 'Lien';
						$href 		= '/workspace/equinode/elements';
						$title 		= 'Ouvrir la page';
						$el = array(	'type'				=> 'link',
					                	'element_label'		=> 'element_link2',
			        		        	'element_disabled' 	=> 'N',
										'element_class'		=> 'btn',
			        		        	'data0' 			=> '_self',
			        		        	'data1' 			=> $href,
										'data2'				=> $title,
										'value'				=> $contenu);
						$this->getElement($el);
					?>

					<?php // LIEN BOUTON 2
						$contenu 	= 'Lien';
						$href 		= '/workspace/equinode/elements';
						$title 		= 'Ouvrir la page';
						$el = array(	'type'				=> 'link',
					                	'element_label'		=> 'element_link3',
			        		        	'element_disabled' 	=> 'N',
										'element_class'		=> 'btn2',
			        		        	'data0' 			=> '_self',
			        		        	'data1' 			=> $href,
										'data2'				=> $title,
										'value'				=> $contenu);
						$this->getElement($el);
					?>

					<?php // LIEN CLOSE
						$contenu 	= 'Lien';
						$href 		= '#';
						$title 		= 'Ouvrir la page';
						$el = array(	'type'				=> 'link',
					                	'element_label'		=> 'element_link4',
			        		        	'element_disabled' 	=> 'N',
										'element_class'		=> 'close',
			        		        	'data0' 			=> '_self',
			        		        	'data1' 			=> $href,
										'data2'				=> $title,
										'value'				=> $contenu);
						$this->getElement($el);
					?>

					<?php $this->getElements($this->bloc['params']['bottom']); ?>
				</div>
			<?php //} ?>

		</div>
	</div>

<?php //} ?>