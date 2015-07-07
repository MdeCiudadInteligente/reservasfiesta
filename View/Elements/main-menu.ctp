
<!-- Grid view  -->

<?php 
	$usuario_level= $this->Session->read('Auth.User.permission_level');
	$modulos=array(
			"reunion"=>array(
				"user_level"=>'1,2,4,5',
				"nav-class"=>'meeting-menu',
				"icon-class"=>'icon-users',
				"tooltip-desc"=>'Reuniones',
				"element-route"=>'menu/meetings'
			),
			"divulgation"=>array(
				"nav-class"=>'divulgation-menu',
				"icon-class"=>'icon-data-science-inv',
				"tooltip-desc"=>'Divulgaciones',
				"element-route"=>'menu/divulgations'
			),
			"trainings"=>array(
				"nav-class"=>'trainings-menu',
				"icon-class"=>'icon-graduation-cap-1',
				"tooltip-desc"=>'Modulo de formación',
				"element-route"=>'menu/formations'
			),
			"accompaniment"=>array(
			    "user_level"=>'1,2,4,5',
				"nav-class"=>'accompaniment-menu',
				"icon-class"=>'icon-updown-circle',
				"tooltip-desc"=>'Modulo de acompañamientos',
				"element-route"=>'menu/accompaniment'
			),
			"person"=>array(
				"nav-class"=>'person-menu',
				"icon-class"=>'icon-user-add',
				"tooltip-desc"=>'Modulo de personal',
				"element-route"=>'menu/personal'
			),
			"configuration"=>array(
				"user_level"=>'1,4,5',
				"nav-class"=>'config-menu',
				"icon-class"=>'icon-cog',
				"tooltip-desc"=>'Modulo de configuración',
				"element-route"=>'menu/config'
			)
		);

?>

<nav class="main-menu-cont">
	<div class="icon-menu-view">
		<?php foreach ($modulos as $key => $mod) { 
			$access_level=(isset($mod['user_level']))?explode(",",$mod['user_level']):NULL;
			$print=($access_level)?(in_array($usuario_level, $access_level)):true;
			    if($print){
		?>
					<div data-tooltip="<?php echo $mod['tooltip-desc'] ?>" data-rel="<?php echo $mod['nav-class'] ?>-cont" class=" mde-tooltip <?php echo $mod['nav-class'] ?> nav-view">
					<?php  if (isset($mod['icon-class'])){ ?>
								<i class=" <?php echo $mod['icon-class'] ?> icon-menu"></i>
					<?php  }?>	
					</div>
		<?php
				}//End if print
        	} 
		?>
	</div>

	<div class="menu-content-view">
		<?php foreach ($modulos as $key => $mod) { 
			$access_level=(isset($item['user_level']))?explode(",",$item['user_level']):NULL;
			$print=($access_level)?(in_array($usuario_level, $access_level)):true;
			if($print){
		?>
				<div class="content-view <?php echo $mod['nav-class'] ?>-cont">
					<?php 
						if(isset($mod['element-route'])){
							echo $this->element($mod['element-route']); 
						}else{
							debug('La ruta del modulo no esta definida');
						}
					?>
				</div>
	<?php 
			}//End if print
		} 
?>
	</div>	
</nav>


