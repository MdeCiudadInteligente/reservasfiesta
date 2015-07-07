

<?php 
	$menu_element=array(
			'custom_class'=>'formation-internal-menu',
			'title'=>'Formación',
			'elements'=>array(
				array(
					"icon-class"=>'icon-doc-1',
					"route"=>Router::url( array('controller' => 'Trainings', 'action' => 'index'),true),
					"label" =>__('List Trainings'),
					"custom-class"=>'index-trainings'
				),
				array(
					"user_level"=>'1,2,3',
					"icon-class"=>'icon-pencil-1',
					"route"=>Router::url( array('controller' => 'Trainings', 'action' => 'add'),true),
					"label"=>__('New Training'),
					"custom-class"=>'add-training'
				),
				array(
						"user_level"=>'1,4,5',
						"icon-class"=>'icon-cogs',
						"route"=>Router::url( array('controller' => 'TraTypes', 'action' => 'index'),true),
						"label" =>__('Training Types'),
						"custom-class"=>'Trainer-types',
						"sub-elements"=>array(
							array(
								"route"=>Router::url( array('controller' => 'TraTypes', 'action' => 'index'),true),
								"label"=>__('List Training Types'),
								"custom-class"=>'list-thematics'
							),	
							array(
								"user_level"=>'1',
								"route"=>Router::url( array('controller' => 'TraTypes', 'action' => 'add'),true),
								"label"=>__('New Training Types'),
								"custom-class"=>'add-thematics'
							)	
						)
				),				
				array(
							"icon-class"=>'icon-cogs',
							"route"=>Router::url( array('controller' => 'TraSessions', 'action' => 'index'),true),
							"label" =>__('Tra Sessions'),
							"custom-class"=>'Tra-sessions',
							"sub-elements"=>array(
									array(
											"route"=>Router::url( array('controller' => 'TraSessions', 'action' => 'index'),true),
											"label"=>__('List Tra Sessions'),
											"custom-class"=>'list-sessions'
									),
									array(
											"user_level"=>'1,2,3',
											"route"=>Router::url( array('controller' => 'TraSessions', 'action' => 'add'),true),
											"label"=>__('New Tra Sessions'),
											"custom-class"=>'add-sessions'
									)
							)
				),					
				array(
						"user_level"=>'1,4,5',
						"icon-class"=>'icon-cogs',
						"route"=>Router::url( array('controller' => ' TraProcesses', 'action' => 'index'),true),
						"label" =>__('Training Process'),
						"custom-class"=>'Trainer-types',
						"sub-elements"=>array(
							array(
								"route"=>Router::url( array('controller' => ' TraProcesses', 'action' => 'index'),true),
								"label"=>__('List Training Processes')
							),	
							array(
								"user_level"=>'1',
								"route"=>Router::url( array('controller' => ' TraProcesses', 'action' => 'add'),true),
								"label"=>__('Nueva Ruta de Formación')
							)	
						)
				)	
		    )
		);
?>

<?php echo $this->element('menu/walker',array('menu_element'=>$menu_element));?>
