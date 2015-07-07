<div class="specificConditions form mde-form">
<?php $this->set('title_for_layout' , 'Editar condición específica' );?>
<?php echo $this->Form->create('SpecificCondition'); ?>
	<fieldset>
		<legend><?php echo __('Edit Specific Condition'); ?></legend>
	<?php
		echo $this->Form->input('id_specific_condition');
		echo $this->Form->input('name');
		echo $this->Form->input('Workshop');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Opciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Main Menu'), array('controller' => 'institutions', 'action' => 'index')); ?> </li>	
		<li><?php echo $this->Html->link(__('List Specific Conditions'), array('action' => 'index')); ?></li>
		<li><?php //echo $this->Form->postLink(__('Delete Specific Condition'), array('action' => 'delete', $this->Form->value('SpecificCondition.id_specific_condition')), null, __('Está seguro que desea Eliminar # %s?', $this->Form->value('SpecificCondition.id_specific_condition'))); ?></li>
		<li><?php //echo $this->Html->link(__('List Workshops'), array('controller' => 'workshops', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('New Workshop'), array('controller' => 'workshops', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Close Section'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul>
</div>
