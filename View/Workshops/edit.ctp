<div class="workshops form mde-form">
<?php $this->set('title_for_layout' , 'Editar carpa' );?>
<?php echo $this->Form->create('Workshop'); ?>
	<fieldset>
		<legend><?php echo __('Edit Workshop'); ?></legend>
	<?php
		echo $this->Form->input('entity_id');
		echo $this->Form->input('id_workshop');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('PublicType');
		echo $this->Form->input('SpecificCondition');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Opciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Main Menu'), array('controller' => 'institutions', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Workshop.id_workshop')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Workshop.id_workshop'))); ?></li>
		<li><?php echo $this->Html->link(__('List Workshops'), array('action' => 'index')); ?></li>		
		<li><?php //echo $this->Html->link(__('New Entity'), array('controller' => 'entities', 'action' => 'add')); ?> </li>		
		<li><?php //echo $this->Html->link(__('New Public Type'), array('controller' => 'public_types', 'action' => 'add')); ?> </li>		
		<li><?php //echo $this->Html->link(__('New Specific Condition'), array('controller' => 'specific_conditions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Close Section'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul>
</div>
