
<?php 
	$usuario_level= $this->Session->read('Auth.User.permission_level');
?>	

<h2><span><?php echo $menu_element['title'] ?></span></h2>
<ul class="internal-main-menu <?php echo $menu_element['custom_class'] ?> ">
	<?php foreach ($menu_element['elements'] as $key => $item) { 
			$access_level=(isset($item['user_level']))?explode(",",$item['user_level']):NULL;
			$print=($access_level)?(in_array($usuario_level, $access_level)):true;
			$custom_class=(isset($item['custom-class']))?$item['custom-class']:'';
			$item_label=(isset($item['label']))?$item['label']:'';
			$item_route=(isset($item['route']))?$item['route']:'';
			$icon_class=(isset($item['icon-class']))?'hasIcon '.$item['icon-class']:'';
			$icon_class_flag=(isset($item['icon-class']))?'hasIcon':'';
			$sub_elements=(isset($item['sub-elements']))?$item['sub-elements']:'';
	?>
	
	<?php if($print) { ?>
				<?php   if(is_array($sub_elements)) { ?>
							<li class="sub-header <?php echo $custom_class ?> <?php echo $icon_class_flag ?>">		
				 			<?php if($icon_class){ ?>
				 					<i class="inside-sub-icon <?php echo $icon_class ?> "></i>
				 			<?php } ?>
							<label class="sub-header-title display-sub"><?php echo $item_label ?></label>
							<ul class="sub-items">
									<?php foreach ($sub_elements as $key => $sub_item) { 
											$access_level=(isset($sub_item['user_level']))?explode(",",$sub_item['user_level']):NULL;
											$print=($access_level)?(in_array($usuario_level, $access_level)):true;
											$sub_custom_class=(isset($sub_item['custom-class']))?$sub_item['custom-class']:'';
											$sub_item_label=(isset($sub_item['label']))?$sub_item['label']:'';
											$sub_item_icon=(isset($sub_item['icon-class']))?'hasIcon '.$sub_item['icon-class']:'';
											$sub_item_icon_flag=(isset($sub_item['icon-class']))?'hasIcon':'';
											$sub_item_route=(isset($sub_item['route']))?$sub_item['route']:'';
											if($print){?>
												<li class="sub-list <?php echo $sub_item_icon_flag ?>">
										 			<?php if($sub_item_icon){ ?>
										 					<i class="inside-sub-icon <?php echo $sub_item_icon ?> "></i>
										 			<?php } ?>
													<a href="<?php echo $sub_item_route ?>"> <?php echo $sub_item_label ?> 
													</a> 
												</li>
											<?php } //End if acces print?>
									 <?php } //End foreach ?>	
							</ul>
						</li>	
				<?php } //End if sub-elements 
						else { ?>
						 		<li class="top-list <?php echo $custom_class.' '.$icon_class_flag ?>">
						 			<?php if($icon_class){ ?>
						 					<i class="inside-icon <?php echo $icon_class ?> "></i>	
						 			<?php } ?>
									<a href="<?php echo $item_route ?>"> <?php echo $item_label ?> </a>
								</li>
				<?php } //End print main menu ?>
	<?php
			} 
		}

	?>
</ul>

