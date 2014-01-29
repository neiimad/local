<?php //if (isset($this->bloc['params']['head']) || isset($this->bloc['params']['inner']) || isset($this->bloc['params']['bottom'])){ ?>

	<?php
		$theproduct = $this->data['POST'];
		$nospec = "Non spécifié";
	?>

	<div class="container" id="<?php echo $this->bloc['id']; ?>">
		<div class="bloc">

			<?php //if (isset($this->bloc['params']['head'])){ ?>
				<div class="head">

					<?php // TITRE
						$contenu = $theproduct['title'];
					 	$el = array(	'type'  			=> "content_h2",
										'element_label'		=> 'elements_h2',
										'element_disabled' 	=> 'N',
										'value' 			=> $contenu,
										'data0' 			=> WS_IMG .'picto_default.png');
						$this->getElement($el);
					?>

<?php if (stristr('ADMINISTRATOR', $this->data['wsuser']['category'])){ ?>

					<?php // LIEN BOUTON
						$contenu 	= "Modifier l'offre";
						$title 		= "Actualiser les informations de l'offre";
						$href 		= '/app/workspace/equinode/edition-offre/?IdP='.$theproduct['id_md5'];
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

					<?php if ($theproduct['published'] != 'Y'){ ?>

						<?php // LIEN BOUTON
							$contenu 	= "Publier";
							$title 		= "Rendre l'offre visible dans la liste des offres";
							$href 		= '/app/workspace/equinode/fiche-offre/?IdP='.$theproduct['id_md5'].'&published=Y';
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

					<?php } ?>

<?php } ?>

					<?php // LIEN BOUTON
						$contenu 	= "Retour";
						$title 		= "Retour à la page précédente";
						$href 		= '/app/workspace/equinode/liste-des-offres';
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

<?php if (stristr('ADMINISTRATOR', $this->data['wsuser']['category'])){ ?>

					<?php if ($theproduct['published'] == 'Y'){ ?>

						<?php // INFO
							$contenu = 'Offre publiée';
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

			<?php //if (isset($this->bloc['params']['inner'])){ ?>
				<div class="inner">

					<div class="cadre" style="float: left; font-size: 12px; width: 300px; padding: 15px; margin: 0 15px 10px 15px; border: 1px dotted #e5e5e5; border-color: rgba(200, 200, 200, 0.5); background: #FCFCFC;">
					<div>

							<strong>Lieu de travail :</strong>
							<br /><?php echo ($theproduct['lieu']) ? $theproduct['lieu'] : $nospec; ?>
							<br /><br /><strong>Type de contrat :</strong>
							<br /><?php echo ($theproduct['type']) ? $theproduct['type'] : $nospec; ?>
							<br /><br /><strong>Nature de l'offre :</strong>
							<br /><?php echo ($theproduct['nature']) ? $theproduct['nature'] : $nospec; ?>
							<br /><br /><strong>Expérience :</strong>
							<br /><?php echo ($theproduct['experience']) ? $theproduct['experience'] : $nospec; ?>
							<br /><br /><strong>Formation :</strong>
							<br /><?php echo ($theproduct['formation']) ? $theproduct['formation'] : $nospec; ?>
							<br /><br /><strong>Domaine :</strong>
							<br /><?php echo ($theproduct['domaine']) ? $theproduct['domaine'] : $nospec; ?> 
							<br /><br /><strong>Secteur d'activité :</strong>
							<br /><?php echo ($theproduct['secteur']) ? $theproduct['secteur'] : $nospec; ?>
							<br /><br /><strong>Langues :</strong>
							<br /><?php echo ($this->data['pays'][strtolower($theproduct['language'])]) ? $this->data['pays'][strtolower($theproduct['language'])] : $nospec; ?>
							<br /><br /><strong>Permis :</strong>
							<br /><?php echo ($theproduct['permis']) ? $theproduct['permis'] : $nospec; ?>
							<br /><br /><strong>Connaissances bureautiques :</strong>
							<br /><?php echo ($theproduct['bureautique']) ? $theproduct['bureautique'] : $nospec; ?>
							<br /><br /><strong>Qualification :</strong>
							<br /><?php echo ($theproduct['qualification']) ? $theproduct['qualification'] : $nospec; ?>
							<br /><br /><strong>Salaire indicatif :</strong>
							<br /><?php echo ($theproduct['salaire']) ? $theproduct['salaire'] : $nospec; ?>

					</div>
					</div>

					<div style="float: right; font-size: 13px; width: 575px; padding: 0 15px 15px 15px; margin-right: 15px; margin-bottom: 20px; border-bottom: 1px dotted #e5e5e5; border-color: rgba(200, 200, 200, 0.5);">
					<div>
						<?php // SOUS-TITRE H3
							$contenu = 'Entreprise :';
							$el = array(	'type'				=> 'content_h3',
						                	'element_label'		=> 'element_h3',
				        		        	'element_disabled' 	=> 'N',
				        		        	'value' 			=> $contenu);
							$this->getElement($el);
						?>

						<?php // TEXTE
							$contenu = $theproduct['data0'] ? $theproduct['data0'] : $nospec;
							$el = array(	'type'				=> 'content_texte',
						                	'element_label'		=> 'element_texte',
				        		        	'element_disabled' 	=> 'N',
				        		        	'value' 			=> nl2br($contenu));
							$this->getElement($el);
						?>
					</div>
					</div>

					<div style="float: right; font-size: 13px; width: 575px; padding: 0 15px 15px 15px; margin-right: 15px; margin-bottom: 20px; border-bottom: 1px dotted #e5e5e5; border-color: rgba(200, 200, 200, 0.5);">
					<div>
						<?php // SOUS-TITRE H3
							$contenu = 'Poste :';
							$el = array(	'type'				=> 'content_h3',
						                	'element_label'		=> 'element_h3',
				        		        	'element_disabled' 	=> 'N',
				        		        	'value' 			=> $contenu);
							$this->getElement($el);
						?>

						<?php // TEXTE
							$contenu = $theproduct['data1'] ? $theproduct['data1'] : $nospec;
							$el = array(	'type'				=> 'content_texte',
						                	'element_label'		=> 'element_texte',
				        		        	'element_disabled' 	=> 'N',
				        		        	'value' 			=> nl2br($contenu));
							$this->getElement($el);
						?>
					</div>
					</div>

					<div style="float: right; font-size: 13px; width: 575px; padding: 0 15px 15px 15px; margin-right: 15px; margin-bottom: 20px; border-bottom: 1px dotted #e5e5e5; border-color: rgba(200, 200, 200, 0.5);">
					<div>
						<?php // SOUS-TITRE H3
							$contenu = 'Profil :';
							$el = array(	'type'				=> 'content_h3',
						                	'element_label'		=> 'element_h3',
				        		        	'element_disabled' 	=> 'N',
				        		        	'value' 			=> $contenu);
							$this->getElement($el);
						?>

						<?php // TEXTE
							$contenu = $theproduct['data2'] ? $theproduct['data2'] : $nospec;
							$el = array(	'type'				=> 'content_texte',
						                	'element_label'		=> 'element_texte',
				        		        	'element_disabled' 	=> 'N',
				        		        	'value' 			=> nl2br($contenu));
							$this->getElement($el);
						?>
					</div>
					</div>

					<span class="newline"></span>

					<?php $this->getElements($this->bloc['params']['inner']); ?>
				</div>
			<?php //} ?>

			<?php //if (isset($this->bloc['params']['bottom'])){ ?>
				<div class="bottom">

					<?php // TEXTE
						$date  = mb_substr($theproduct['datemodif'],8,2).'-'.mb_substr($theproduct['datemodif'],5,2).'-'.mb_substr($theproduct['datemodif'],0,4);
						$date .= ' à '. mb_substr($theproduct['datemodif'],11,5);
						$contenu = 'Dernière modification le '.$date;
						$el = array(	'type'				=> 'content_texte',
					                	'element_label'		=> 'element_texte',
			        		        	'element_disabled' 	=> 'N',
			        		        	'value' 			=> $contenu);
						$this->getElement($el);
					?>

					<?php $this->getElements($this->bloc['params']['bottom']); ?>
				</div>
			<?php //} ?>

		</div>
	</div>

<?php //} ?>