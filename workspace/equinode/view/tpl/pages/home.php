<div class="page" id="page_<?php echo workspace::getViewId(); ?>">

	<?php if ($this->isBlocs('page_top')){ ?>
		<div class="page_top">
			<?php $this->getBlocs('page_top'); ?>
		</div>
	<?php } ?>

	<?php //if ($this->isBlocs('page_head')){ ?>
		<div class="page_head">

			<?php
				$this->bloc['id'] = 'header';
				$this->getBloc();
			?>

			<?php $this->getBlocs('page_head'); ?>
		</div>
	<?php //} ?>

	<?php //if ($this->isBlocs('page_middle')){ ?>
		<div class="page_middle">

			<?php
				$el = array(	'type'				=> "content_img",
			                	'element_label'		=> 'equinode_home',
		       		        	'element_disabled' 	=> 'N',
		       		        	'element_class' 	=> 'center',
		       		        	'data0' 			=> '',
		       		        	'value' 			=> IMG.'EquiNode-Home.jpg',
								'data2'				=> '');
				$this->getElement($el);
			?>
			<?php

			/*
			$id = 17427;
			for ($i=0;$i<10;$i++)
			{
				$id++;
				$tableid[] = $id;
				for ($j=0;$j<10;$j++)
				{
					$table1[$i] .= rand(0,9);
				}
			}
			?>
				<?php
					//print_r($tableid);
					//print_r($table1);
					
					foreach($tableid as $key => $uid)
					{
						$uid1 = mb_substr($uid,0,1);
						$uid2 = mb_substr($uid,1,1);
						$uid3 = mb_substr($uid,2,1);
						$uid4 = mb_substr($uid,3,1);
						$uid5 = mb_substr($uid,4,1);
						//echo $uid1.'-'.$uid2.'-'.$uid3.'-'.$uid4.'-'.$uid5.'<br />';
						
						foreach($table1 as $cle => $randnum)
						{
							$randnum1 = mb_substr($randnum,0,1);
							$randnum2 = mb_substr($randnum,1,1);
							$randnum3 = mb_substr($randnum,2,1);
							$randnum4 = mb_substr($randnum,3,1);
							$randnum5 = mb_substr($randnum,4,1);
							$randnum6 = mb_substr($randnum,5,1);
							$randnum7 = mb_substr($randnum,6,1);
							$randnum8 = mb_substr($randnum,7,1);
							$randnum9 = mb_substr($randnum,10,1);
							$randnum10 = mb_substr($randnum,9,1);

							echo $randnum1.$randnum10.$uid1.$randnum9.$uid5.$randnum5.$uid3.$randnum4.$randnum2.$uid2.$randnum7.$uid4.$randnum3.$randnum8.'<br />';
						}
					}
					*/
				?>
			
			<?php $this->getBlocs('page_middle'); ?>
		</div>
	<?php //} ?>

	<?php if ($this->isBlocs('page_bottom')){ ?>
		<div class="page_bottom">
			<?php $this->getBlocs('page_bottom'); ?>
		</div>
	<?php } ?>

</div>