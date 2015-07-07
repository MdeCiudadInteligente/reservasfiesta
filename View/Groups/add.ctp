<div class="groups form mde-form">
<?php echo $this->Form->create('Group'); ?>
	<fieldset>
		<legend><?php echo __('Add Group'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('members_number',array('label'=>'Número de integrantes Grupo','options' => array ('5'=>'5',
		        '6'=>'6',
				'7'=>'7',
				'8'=>'8',
				'9'=>'9',
				'10'=>'10',
				'11'=>'11',
				'12'=>'12',
				'13'=>'13',
				'14'=>'14',
				'15'=>'15',
				'16'=>'16',
				'17'=>'17',
				'18'=>'18',
				'19'=>'19',
				'20'=>'20',
				'21'=>'21',
				'22'=>'22',
				'23'=>'23',
				'24'=>'24',
				'25'=>'25',
				'26'=>'26',
				'27'=>'27',
				'28'=>'28',
				'29'=>'29',
				'30'=>'30',
				'31'=>'31',
				'32'=>'32',
				'33'=>'33',
				'34'=>'34',
				'35'=>'35',
				'36'=>'36',
				'37'=>'37',
				'38'=>'38',
				'39'=>'39',
				'40'=>'40',
				
		
		)));	
		//echo $this->Form->input('public_type_id');
		echo $this->Form->input('public_type_id',array('empty'=>'Seleccione el rango de edad','options' => $publictype,'label'=>'Rango de Edad'));
		echo $this->Form->input('SpecificCondition', array('type' => 'select', 'multiple' => 'checkbox'));
		//echo $this->Form->input('specific_condition_id');
		//echo $this->Form->input('responsible_id', array('options' => array ('1'=>'En Curso','2'=>'Finalizada')));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Main Menu'), array('controller' => 'institutions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Close Section'), array('controller' => 'users', 'action' => 'logout')); ?> </li>	
	</ul>
</div>
