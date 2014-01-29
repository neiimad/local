<?php if ($this->data['member'] != ''){ ?>

	<div class="container" id="<?php echo $this->bloc['id']; ?>">
		<div class="bloc">

			<div class="head">
				<?php

				 $el = array(	'type'  				=> "content_h2",
									'element_label'		=> 'members_h2_1',
									'element_disabled' 	=> 'N',
									'value' 			=> 'Liste des membres',
									'data0' 			=> WS_IMG .'picto_list.png');
				$this->getElement($el);

				?>
			</div>

			<div class="inner">
				<div class="items results <?php echo $elt['element_class']; ?>">
					<div class="mask">
						<div class="list">

							<?php foreach($this->data['member'] as $key => $member){ ?>

								<div class="item item-<?php echo (($key+1)% 2); ?> <?php if ($member['photo'] == ''){ ?>item-<?php echo $photomin = ($member['gender'] == 'F')?'female':'male';?><?php } ?>">
									<div class="content">

										<a class="cpt"><?php echo ($key+1); ?></a>

										<?php

											// PHOTO
											$photo = $member['photo'];
											$photomin = $photo;
											if ($photo == '')
												$photomin = ($member['gender'] == 'F')?WS_IMG.'picto_female.png':WS_IMG.'picto_male.png';

											$el = array(	'type'				=> "content_img",
										                	'element_label'		=> 'member'.$key.'_img',
								        		        	'element_disabled' 	=> 'N',
								        		        	'data0' 			=> $photo,
								        		        	'value' 			=> $photomin,
															'data2'				=> '');
											$this->getElement($el);

											// DATECREATE
											$contenu = mb_substr($member['datecreate'],8,2).'-'.mb_substr($member['datecreate'],5,2).'-'.mb_substr($member['datecreate'],0,4);
											//$contenu = substr($member['datecreate'],0,10);
											$el = array(	'type'				=> 'content_h4',
										                	'element_label'		=> 'member'.$key.'_h4',
								        		        	'element_disabled' 	=> 'N',
								        		        	'value' 			=> $contenu);
											$this->getElement($el);
										?>
										<div class="description">
										<?php
												// CIVILITE
												if ($member['civility'] == 'MME'){
													$contenu = 'Mme';
												} else {
													$contenu = 'M.';
												}

												$contenu = "<strong>".$contenu." ".strtoupper($member['firstname'])." ".ucfirst(strtolower($member['lastname'])).'</strong><br />';

												// CODE POSTAL
												//$contenu .= $member['postalcode'];

												// DEPARTEMENT CODE
												if ($member['postalcode'] != '' && strtolower($member['country']) == 'fr')
												{
													$departement_code = mb_substr($member['postalcode'],0,2);
													$contenu .= $departement_code.' ';

													// DEPARTEMENT + REGION
													if ($this->data['region'] != '' && $this->data['departement'] !=''){
														$region = null;
														foreach($this->data['departement'] as $departement){
															if ($departement['id_departement'] == $departement_code){
																foreach($this->data['region'] as $region){
																	if ($region['id_region'] == $departement['id_region']){
																		break;
																	}
																}	
																break;
															}
														}
													}
													$contenu .= $departement['departement'].', <br />'.$region['region'];
												}
												else
												{
													$contenu .= $member['postalcode'].' <br />'.$member['city'];
												}

												// CONTENU
												$el = array(	'type'				=> 'content_texte',
											                	'element_label'		=> 'member'.$key.'_texte',
									        		        	'element_disabled' 	=> 'N',
									        		        	'value' 			=> $contenu);
												$this->getElement($el);


												if (stristr('ADMINISTRATOR', $this->data['wsuser']['category']))
												{
													$data1 = URI.'profil/?IdP='.$member['id_md5'].'&IdAdmin='.$this->data['wsuser']['id_md5'];
												}
												else
												{
													$data1 = '#';
													// si accès visiteurs
													//$data1 = URI.'profil/?IdP='.$member['id_md5'];
												}

												// LIEN
												$el = array(	'type'				=> 'link',
											                	'element_label'		=> 'member'.$key.'_link',
									        		        	'element_disabled' 	=> 'N',
																'element_class'		=> '',
									        		        	'data0' 			=> '_self',
									        		        	'data1' 			=> $data1,
																'data2'				=> 'Ouvrir la page de '.$member['firstname'].'-'.$member['lastname'],
																'value'				=> 'En savoir plus');
												$this->getElement($el);

											?>
											<?php if (!stristr('ADMINISTRATOR', $this->data['wsuser']['category'])){ ?>
												<script type="text/javascript">
												$(document).ready(function(){
													$('#<?php echo "member".$key."_link"; ?>').click(function(){
														$(document).layer({content:'<div class="container"><div class="bloc"><div class="inner" style="padding: 50px 50px 40px 50px;"><div class="texte"><p class="info">Vos droits ne permettent pas d\'accéder au contenu demandé.</p></div></div></div>'});
													});
												});
												</script>
											<?php } ?>
										</div>

									</div>	
								</div>

							<?php } ?>

						</div>
					</div>
					<script type="text/javascript">
					$(document).ready(function(){
						
						$('#<?php echo $this->bloc['id']; ?>').slide();
						
					});
					</script>
				 </div>
			</div>

			<div class="bottom">
				<?php

					// BOUTON PREV
					$el = array(	'type'				=> 'link',
				                	'element_label'		=> 'members_list_prev',
		        		        	'element_disabled' 	=> 'N',
		        		        	'value' 			=> $photo,
									'element_class'		=> 'btn prev up',
									'value'				=> 'Précédent',
									'data2'				=> 'Précédent');
					$this->getElement($el);

					// BOUTON NEXT
					$el = array(	'type'				=> 'link',
				                	'element_label'		=> 'members_list_next',
		        		        	'element_disabled' 	=> 'N',
		        		        	'value' 			=> $photo,
									'element_class'		=> 'btn next down',
									'value'				=> 'Suivant',
									'data2'				=> 'Suivant');
					$this->getElement($el);

				?>
			</div>

		</div>
	</div>

<?php } ?>