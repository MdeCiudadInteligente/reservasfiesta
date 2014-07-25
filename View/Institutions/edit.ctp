<div class="institutions form">
<?php $this->set('title_for_layout' , 'Editar grupo' );?>
<?php echo $this->Form->create('Institution'); ?>
	<fieldset>
		<legend><?php echo __('Edit Institution'); ?></legend>
	<?php
		echo $this->Form->input('id_institution');
		echo $this->Form->input('name');
		echo $this->Form->input('mail');
		echo $this->Form->input('address');
		echo $this->Form->input('phone');
		echo $this->Form->input('neighborhood',array('disabled'=>'true'));
		echo $this->Form->input('comune',array('disabled'=>'true'));
		echo $this->Form->input('city',array('disabled'=>'true'));
		echo $this->Form->input('members_number',array('options' => array ('5'=>'5',
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
		//echo $this->Form->input('age_range');
		echo $this->Form->input('public_type_id');
		echo $this->Form->input('institution_type',array ('label'=>'Tipo de grupo','id' => 'institution_type','type'=>'select','options' => array ('Grupo'=>'Grupo','Institución Educativa'=>'Institución Educativa'),'empty'=>'Seleccione','disabled'=>'true'));
		//echo $this->Form->input('workshop_session_id');
		echo $this->Form->input('SpecificCondition', array('type' => 'select', 'multiple' => 'checkbox'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
	<?php $usuario_level= $this->Session->read('Auth.User.permission_level');?>
	<?php if ($usuario_level === '2'){?>
	<li><?php echo $this->Html->link(__('Regresar'), array('controller' => 'workshops', 'action' => 'index_inscription')); ?> </li>
	<?php }?>
	<?php  $usuario_level= $this->Session->read('Auth.User.permission_level');
		if ($usuario_level === '1'){?>
		<li><?php echo $this->Html->link(__('Main Menu'), array('controller' => 'institutions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Institution.id_institution')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Institution.id_institution'))); ?></li>
		<li><?php echo $this->Html->link(__('List Institutions'), array('action' => 'index')); ?></li>	
		<?php }?>
		<li><?php echo $this->Html->link(__('Close Section'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul>
</div>
