<?php //if (isset($this->bloc['params']['head']) || isset($this->bloc['params']['inner']) || isset($this->bloc['params']['bottom'])){ ?>

	<div class="container" id="<?php echo $this->bloc['id']; ?>">
		<div class="bloc">

			<?php //if (isset($this->bloc['params']['head'])){ ?>
				<div class="head">

					<?php // TITRE
						$contenu = 'Profil membre';
					 	$el = array(	'type'  			=> "content_h2",
										'element_label'		=> 'elements_h2',
										'element_disabled' 	=> 'N',
										'value' 			=> $contenu,
										'data0' 			=> WS_IMG .'picto_default.png');
						$this->getElement($el);
					?>

					<?php if (stristr('ADMINISTRATOR', $this->data['wsuser']['category'])){ ?>

					<?php if ($this->data['wsprofil']['deleted'] != 'Y'){ ?>

					<?php // LIEN BOUTON
						$contenu 	= 'Modifier le profil';
						$title 		= 'Ouvrir la page';
						$href 		= '/workspace/equinode/edition-de-membre/?IdP='.$this->data['POST']['id_md5'];
						$el = array(	'type'				=> 'link',
					                	'element_label'		=> 'element_link',
			        		        	'element_disabled' 	=> 'N',
										'element_class'		=> 'btn right',
			        		        	'data0' 			=> '_self',
			        		        	'data1' 			=> $href,
										'data2'				=> $title,
										'value'				=> $contenu);
						$this->getElement($el);
					?>

					<?php // LIEN BOUTON
						$contenu 	= 'Options';
						$title 		= 'Ouvrir la page';
						$href 		= '';
						$el = array(	'type'				=> 'link',
					                	'element_label'		=> 'element_link2',
			        		        	'element_disabled' 	=> 'N',
										'element_class'		=> 'btn right',
			        		        	'data0' 			=> '_self',
			        		        	'data1' 			=> $href,
										'data2'				=> $title,
										'value'				=> $contenu);
						$this->getElement($el);
					?>

					<?php // LIEN BOUTON
						$contenu 	= 'Retour';
						$href 		= '/workspace/equinode/liste-des-membres';
						$title 		= 'Ouvrir la page';
						$el = array(	'type'				=> 'link',
					                	'element_label'		=> 'link_liste_des_membres',
			        		        	'element_disabled' 	=> 'N',
										'element_class'		=> 'btn prev right',
			        		        	'data0' 			=> '_self',
			        		        	'data1' 			=> $href,
										'data2'				=> $title,
										'value'				=> $contenu);
						$this->getElement($el);
					?>

					<?php } else { ?>

						<?php // LIEN BOUTON
							$contenu 	= 'Retour';
							$href 		= '/workspace/equinode/liste-des-membres';
							$title 		= 'Ouvrir la page';
							$el = array(	'type'				=> 'link',
						                	'element_label'		=> 'link_liste_des_membres',
				        		        	'element_disabled' 	=> 'N',
											'element_class'		=> 'btn prev right',
				        		        	'data0' 			=> '_self',
				        		        	'data1' 			=> $href,
											'data2'				=> $title,
											'value'				=> $contenu);
							$this->getElement($el);
						?>

						<?php // INFO
							$contenu = 'Membre supprimé';
							$el = array(	'type'				=> 'content_info',
						                	'element_label'		=> 'element_info',
				        		        	'element_disabled' 	=> 'N',
				        		        	'value' 			=> $contenu);
							$this->getElement($el);
						?>

					<?php } ?>

					<?php } ?>

					<?php $this->getElements($this->bloc['params']['head']); ?>
				</div>
			<?php //} ?>	

			<?php //$member = $this->data['wsuser']; ?>
			<?php $member = $this->data['wsprofil']; ?>

			<?php //if (isset($this->bloc['params']['inner'])){ ?>
				<div class="inner">
					<?php // PHOTO
						$photo = $member['photo'];
						$photomin = $photo;
						$photoalt = 'Photo';
						if ($photo == '')
							$photomin = ($member['gender'] == 'F')?WS_IMG.'picto_female_120.png':WS_IMG.'picto_male_120.png';
							
					?>
					<div class="col user-logo <?php if ($photo == '') $gender = ($member['gender'] == 'F')?'female':'male'; echo 'user-'.$gender; ?>">
						<div class="content">
							<div class="visuel center">

								<?php
									$el = array(	'type'				=> "content_img",
								                	'element_label'		=> 'content_img_member',
						        		        	'element_disabled' 	=> 'N',
						        		        	'data0' 			=> $photo,
						        		        	'value' 			=> $photomin,
													'data2'				=> $photoalt);
									$this->getElement($el);
								?>			
							</div>
						</div>
						<div class="pin"></div>
					</div>


					<div class="col user-infos">
						<div class="content">

							<?php
								$contenu = 'Général :';
								$el = array(	'type'				=> "content_h3",
							                	'element_label'		=> '',
					        		        	'element_disabled' 	=> 'N',
					        		        	'value' 			=> $contenu);
								$this->getElement($el);
							?>

							<?php
								$contenu  = '<strong class="label">Civilité : </strong>'.ucfirst(strtolower($member['civility'])).'<br />';
								$contenu .= '<strong class="label">Prénom : </strong><span class="field" id="firstname">'.$member['firstname'].'</span><br />';
								$contenu .= '<strong class="label">Nom : </strong><span class="field" id="lastname">'.$member['lastname'].'</span>';
								$el = array(	'type'				=> "content_texte",
							                	'element_label'		=> '',
					        		        	'element_disabled' 	=> 'N',
					        		        	'value' 			=> $contenu);
								$this->getElement($el);
							?>

							<?php
								$contenu  = '<strong class="label">Fonction : </strong>'.$member['title'].'<br />';
								$contenu .= '<strong class="label">Société : </strong>'.$member['company'];
								$el = array(	'type'				=> "content_texte",
							                	'element_label'		=> '',
					        		        	'element_disabled' 	=> 'N',
					        		        	'value' 			=> $contenu);
								$this->getElement($el);
							?>

							<span class="newline"></span>

							<?php
								$date = mb_substr($member['datecreate'],8,2).'-'.mb_substr($member['datecreate'],5,2).'-'.mb_substr($member['datecreate'],0,4);
								$contenu = '<em>Membre depuis le <span class="field" id="datecreate">'.$date.'</span></em>';
								$el = array(	'type'				=> "content_texte",
							                	'element_label'		=> '',
					        		        	'element_disabled' 	=> 'N',
					        		        	'value' 			=> $contenu);
								$this->getElement($el);
							?>

						</div>
						<div class="pin"><img src="/src/view/img/flags/<?php echo strtolower($member['country']); ?>.gif" alt="<?php echo strtolower($member['country']); ?>" /></div>
					</div>

					<div class="col user-adress">
						<div class="content">

							<?php
								$contenu = 'Coordonnées :';
								$el = array(	'type'				=> "content_h3",
							                	'element_label'		=> '',
					        		        	'element_disabled' 	=> 'N',
					        		        	'value' 			=> $contenu);
								$this->getElement($el);
							?>

							<?php
								$contenu = '<strong class="label">Addresse : </strong>'.$member['address1'].'<br />';
								$contenu .= '<span class="label">&nbsp;</span>'.$member['address2'].'<br />';
								$contenu .= '<span class="label">&nbsp;</span>'.$member['address3'];
								$el = array(	'type'				=> "content_texte",
							                	'element_label'		=> '',
					        		        	'element_disabled' 	=> 'N',
					        		        	'value' 			=> $contenu);
								$this->getElement($el);
							?>

							<?php
								$contenu = '<strong class="label">Code postal : </strong>'.$member['postalcode'].'<br />';
								$contenu .= '<strong class="label">Ville : </strong>'.ucfirst(strtolower($member['city']));
								$el = array(	'type'				=> "content_texte",
							                	'element_label'		=> '',
					        		        	'element_disabled' 	=> 'N',
					        		        	'value' 			=> $contenu);
								$this->getElement($el);
							?>

							<?php
								$contenu = '<strong class="label">Téléphone : </strong>'.$member['phone'].'<br />';
								$contenu .= '<strong class="label">Mobile : </strong>'.$member['mobile'].'<br />';
								$contenu .= '<strong class="label">Fax : </strong>'.$member['fax'];
								$el = array(	'type'				=> "content_texte",
							                	'element_label'		=> '',
					        		        	'element_disabled' 	=> 'N',
					        		        	'value' 			=> $contenu);
								$this->getElement($el);
							?>

							<?php
								$contenu = '<strong class="label">E-mail : </strong>'.'<a href="mailto:'.$member['email'].'">'.$member['email'].'</a>';
								$el = array(	'type'				=> "content_texte",
							                	'element_label'		=> 'content_texte_member',
					        		        	'element_disabled' 	=> 'N',
					        		        	'value' 			=> $contenu);
								$this->getElement($el);
							?>

						</div>
						<div class="pin"></div>
					</div>

					<span class="newline"></span>

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

<?php if ($this->data['wsprofil']['deleted'] != 'Y'){ ?>
<?php include (BLOCS.'wsprofil_options.php'); ?>
<?php } ?>