

<?php 
	$menu_element=array(
			'custom_class'=>'config-internal-menu',
			'title'=>'Configuración',
			'elements'=>array(
				array(
					"icon-class"=>'icon-user-2',
					"route"=>Router::url( array('controller' => 'Users', 'action' => 'index'),true),
					"label" =>__('Users'),
					"custom-class"=>'users-meetings',
					"sub-elements"=>array(
						array(
							"route"=>Router::url( array('controller' => 'Users', 'action' => 'index'),true),
							"label"=>__('List Users'),
							"custom-class"=>'list-users'
						),	
						array(
							"user_level"=>'1',
							"route"=>Router::url( array('controller' => 'Users', 'action' => 'add'),true),
							"label"=>__('Add User'),
							"custom-class"=>'add-users'
						)	
					)
				),
				array(
					"icon-class"=>'icon-tag-1',
					"route"=>Router::url( array('controller' => 'Thematics', 'action' => 'index'),true),
					"label" =>__('Thematics'),
					"custom-class"=>'Thematics-meetings',
					"sub-elements"=>array(
						array(
							"route"=>Router::url( array('controller' => 'Thematics', 'action' => 'index'),true),
							"label"=>__('List Thematics'),
							"custom-class"=>'list-thematics'
						),	
						array(
							"user_level"=>'1',
							"route"=>Router::url( array('controller' => 'Thematics', 'action' => 'add'),true),
							"label"=>__('Add Thematic'),
							"custom-class"=>'add-thematics'
						)	
					)
				),
				array(
					"icon-class"=>'icon-lightbulb',
					"route"=>Router::url( array('controller' => 'PopulationTypes', 'action' => 'index'),true),
					"label" =>__('Population Types'),
					"sub-elements"=>array(
						array(
							"route"=>Router::url( array('controller' => 'PopulationTypes', 'action' => 'index'),true),
							"label"=>__('List Population Types')
						),	
						array(
							"user_level"=>'1',
							"route"=>Router::url( array('controller' => 'PopulationTypes', 'action' => 'add'),true),
							"label"=>__('Add Population Types')
						)	
					)
				),
				array(
					"icon-class"=>'icon-location',
					"route"=>Router::url( array('controller' => 'Sites', 'action' => 'index'),true),
					"label" =>__('Sites'),
					"sub-elements"=>array(
						array(
							"route"=>Router::url( array('controller' => 'Sites', 'action' => 'index'),true),
							"label"=>__('List Sites')
						),	
						array(
							"user_level"=>'1',
							"route"=>Router::url( array('controller' => 'Sites', 'action' => 'add'),true),
							"label"=>__('Add Site')
						)	
					)
				),
				array(
					"icon-class"=>'icon-star-1',
					"route"=>Router::url( array('controller' => 'TraAllies', 'action' => 'index'),true),
					"label" =>__('Allies'),
					"sub-elements"=>array(
						array(
							"route"=>Router::url( array('controller' => 'TraAllies', 'action' => 'index'),true),
							"label"=>__('List Allies')
						),	
						array(
							"user_level"=>'1',
							"route"=>Router::url( array('controller' => 'TraAllies', 'action' => 'add'),true),
							"label"=>__('Add Allie')
						)	
					)
				),
				array(
					"icon-class"=>'icon-cogs',
					"route"=>Router::url( array('controller' => 'SiteTypes', 'action' => 'index'),true),
					"label" =>__('Site Types'),
					"sub-elements"=>array(
						array(
							"route"=>Router::url( array('controller' => 'SiteTypes', 'action' => 'index'),true),
							"label"=>__('List Site Types')
						),	
						array(
							"user_level"=>'1',
							"route"=>Router::url( array('controller' => 'SiteTypes', 'action' => 'add'),true),
							"label"=>__('Add Site Types')
						)	
					)
				),
				array(
					"icon-class"=>'icon-cogs',
					"route"=>Router::url( array('controller' => 'Communes', 'action' => 'index'),true),
					"label" =>__('Communes'),
					"sub-elements"=>array(
						array(
							"route"=>Router::url( array('controller' => 'Communes', 'action' => 'index'),true),
							"label"=>__('List Communes')
						),	
						array(
							"user_level"=>'1',
							"route"=>Router::url( array('controller' => 'Communes', 'action' => 'add'),true),
							"label"=>__('Add Commune')
						)	
					)
				),
				array(
					"icon-class"=>'icon-cogs',
					"route"=>Router::url( array('controller' => 'Neighborhoods', 'action' => 'index'),true),
					"label" =>__('Neighborhoods'),
					"sub-elements"=>array(
						array(
							"route"=>Router::url( array('controller' => 'Neighborhoods', 'action' => 'index'),true),
							"label"=>__('List Neighborhoods')
						),	
						array(
							"user_level"=>'1',
							"route"=>Router::url( array('controller' => 'Neighborhoods', 'action' => 'add'),true),
							"label"=>__('Add Neighborhood')
						)	
					)
				),
				array(
					"icon-class"=>'icon-cogs',
					"route"=>Router::url( array('controller' => 'Agents', 'action' => 'index'),true),
					"label" =>__('Agents'),
					"sub-elements"=>array(
						array(
							"route"=>Router::url( array('controller' => 'Agents', 'action' => 'index'),true),
							"label"=>__('List Agents')
						),	
						array(
							"user_level"=>'1',
							"route"=>Router::url( array('controller' => 'Agents', 'action' => 'add'),true),
							"label"=>__('Add Agent')
						)	
					)
				),
				array(
					"icon-class"=>'icon-cogs',
					"route"=>Router::url( array('controller' => 'Zones', 'action' => 'index'),true),
					"label" =>__('Zones'),
					"sub-elements"=>array(
						array(
							"route"=>Router::url( array('controller' => 'Zones', 'action' => 'index'),true),
							"label"=>__('List Zones')
						),	
						array(
							"user_level"=>'1',
							"route"=>Router::url( array('controller' => 'Zones', 'action' => 'add'),true),
							"label"=>__('Add Zone')
						)	
					)
				)
	    	)
		    
		);
?>

<?php echo $this->element('menu/walker',array('menu_element'=>$menu_element));?>
