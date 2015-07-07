

<?php 
	$menu_element=array(
		    'custom_class'=>'divulgation-internal-menu',
			'title'=>'Sensibilizaciones',
			'elements'=>array(
				array(
					"icon-class"=>'icon-doc-1',
					"route"=>Router::url( array('controller' => 'Divulgations', 'action' => 'index'),true),
					"label" =>__('List Divulgations')
				),
				array(
					"user_level"=>'1,2,3',
					"icon-class"=>'icon-pencil-1',
					"route"=>Router::url( array('controller' => 'Divulgations', 'action' => 'add'),true),
					"label"=>__('New Divulgation')
				),
				array(
						"user_level"=>'1,4,5',
						"icon-class"=>'icon-cogs',
						"route"=>Router::url( array('controller' => 'Divtypes', 'action' => 'index'),true),
						"label" =>__('Divulgation Types'),
						"custom-class"=>'Trainer-types',
						"sub-elements"=>array(
							array(
								"route"=>Router::url( array('controller' => ' Divtypes', 'action' => 'index'),true),
								"label"=>__('List Divulgation Types')
							),	
							array(
								"user_level"=>'1',
								"route"=>Router::url( array('controller' => ' Divtypes', 'action' => 'add'),true),
								"label"=>__('New Divulgation Type')
							)	
						)
				)	
		    )
		);
?>

<?php echo $this->element('menu/walker',array('menu_element'=>$menu_element));?>
