<div class="workshops form">
<?php $this->set('title_for_layout' , 'Agregar carpa' );?>
<?php echo $this->Form->create('Workshop'); ?>
	<fieldset>
		<legend><?php echo __('Add Workshop'); ?></legend>
	<?php
		echo $this->Form->input('entity_id');
		echo $this->Form->input('name',array('maxLength'=>'256'));
		echo $this->Form->input('description',array('type'=>'text'));?>
	<b><?php echo $this->Form->input('PublicType',array('type' => 'select', 'multiple' => 'checkbox'));?></b>
	<b><?php	echo $this->Form->input('SpecificCondition', array('type' => 'select', 'multiple' => 'checkbox'));?></b>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Opciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Main Menu'), array('controller' => 'institutions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Workshops'), array('controller' => 'Workshops','action' => 'index')); ?></li>
		<li><?php //echo $this->Html->link(__('List Entities'), array('controller' => 'entities', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('New Entity'), array('controller' => 'entities', 'action' => 'add')); ?> </li>
		<li><?php //echo $this->Html->link(__('List Public Types'), array('controller' => 'public_types', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('New Public Type'), array('controller' => 'public_types', 'action' => 'add')); ?> </li>
		<li><?php //echo $this->Html->link(__('List Specific Conditions'), array('controller' => 'specific_conditions', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('New Specific Condition'), array('controller' => 'specific_conditions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Close Section'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul>
</div>
