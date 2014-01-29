<?php if ($this->data['product'] != ''){ ?>

	<div class="container" id="<?php echo $this->bloc['id']; ?>">
		<div class="bloc">

			<div class="head">
				<?php

				 $el = array(	'type'  				=> "content_h2",
									'element_label'		=> 'listedesoffres_h2_1',
									'element_disabled' 	=> 'N',
									'value' 			=> 'Liste des offres',
									'data0' 			=> WS_IMG .'picto_list.png');
				$this->getElement($el);

				?>
			</div>

			<div class="inner">
				<div class="items results <?php echo $elt['element_class']; ?>">
					<div class="mask">
						<div class="list">

							<?php foreach($this->data['product'] as $key => $product){ ?>

								<div class="item item-<?php echo (($key+1)% 2); ?>">
									<div class="content">

										<a class="cpt"><?php echo ($key+1); ?></a>

										<?php

											// PHOTO
											$photo = $product['photo'];
											$photomin = $photo;
											if ($photo == '')
												$photomin = WS_IMG.'picto_offer.png';

											$el = array(	'type'				=> "content_img",
										                	'element_label'		=> 'product'.$key.'_img',
								        		        	'element_disabled' 	=> 'N',
								        		        	'data0' 			=> $photo,
								        		        	'value' 			=> $photomin,
															'data2'				=> '');
											$this->getElement($el);

											// DATECREATE
											$dateused = ($product['datepublished'] != '0000-00-00 00:00:00')?$product['datepublished']:$product['datecreate'];
											
											$contenu = mb_substr($dateused,8,2).'-'.mb_substr($dateused,5,2).'-'.mb_substr($dateused,0,4);
											//$contenu = substr($dateused,0,10);
											$el = array(	'type'				=> 'content_h4',
										                	'element_label'		=> 'product'.$key.'_h4',
								        		        	'element_disabled' 	=> 'N',
								        		        	'value' 			=> $contenu);
											$this->getElement($el);
										?>
											<div class="description">
												<?php
													// TITLE
													$contenu = $product['title'];
													$el = array(	'type'				=> 'content_h5',
												                	'element_label'		=> 'product'.$key.'_h5',
										        		        	'element_disabled' 	=> 'N',
										        		        	'value' 			=> $contenu);
													$this->getElement($el);

													// DESCRIPTION
													$contenu = $product['description'];
													$el = array(	'type'				=> 'content_texte',
												                	'element_label'		=> 'product'.$key.'_texte',
										        		        	'element_disabled' 	=> 'N',
										        		        	'value' 			=> $contenu);
													$this->getElement($el);

													// DESCRIPTION1
													$contenu = $product['description1'];
													$el = array(	'type'				=> 'content_texte',
												                	'element_label'		=> 'product'.$key.'_texte1',
										        		        	'element_disabled' 	=> 'N',
										        		        	'value' 			=> $contenu);
													$this->getElement($el);

													?>
												</div>
											<?php

											if (!empty($this->data['wsuser']))
											{
												$data1 = URI.'fiche-offre/?IdP='.$product['id_md5'].'&IdAdmin='.$this->data['wsuser']['id_md5'];
											}
											else
											{
												$data1 = '#';
												// si accès visiteurs
												//$data1 = URI.'product/?IdP='.$product['id_md5'];
											}

											// LIEN
											$el = array(	'type'				=> 'link',
										                	'element_label'		=> 'product'.$key.'_link',
								        		        	'element_disabled' 	=> 'N',
															'element_class'		=> '',
								        		        	'data0' 			=> '_self',
								        		        	'data1' 			=> $data1, //'/workspace/equinode/offer',
															'data2'				=> 'Ouvrir la page de '.$product['firstname'].'-'.$product['lastname'],
															'value'				=> 'En savoir plus');
											$this->getElement($el);

										?>
										<?php if (empty($this->data['wsuser']) && !stristr('ADMINISTRATOR', $this->data['wsuser']['category'])){ ?>
											<script type="text/javascript">
											$(document).ready(function(){
												$('#<?php echo "product".$key."_link"; ?>').click(function(){
													$(document).layer({content:'<div class="container"><div class="bloc"><div class="inner" style="padding: 50px 50px 40px 50px;"><div class="texte"><p class="info">Veuillez vous connecter pour accéder au contenu des offres.</p></div></div></div>'});
												});
											});
											</script>
										<?php } ?>
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
				                	'element_label'		=> 'products_list_prev',
		        		        	'element_disabled' 	=> 'N',
		        		        	'value' 			=> $photo,
									'element_class'		=> 'btn prev up',
									'value'				=> 'Précédent',
									'data2'				=> 'Précédent');
					$this->getElement($el);

					// BOUTON NEXT
					$el = array(	'type'				=> 'link',
				                	'element_label'		=> 'products_list_next',
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