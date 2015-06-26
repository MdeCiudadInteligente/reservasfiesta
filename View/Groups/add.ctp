<div class="groups form">
<?php echo $this->Form->create('Group'); ?>
	<fieldset>
		<legend><?php echo __('Add Group'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('members_number');
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
