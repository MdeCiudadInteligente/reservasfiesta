<div class="institutionSpecificConditions form">
<?php echo $this->Form->create('InstitutionSpecificCondition'); ?>
	<fieldset>
		<legend><?php echo __('Edit Institution Specific Condition'); ?></legend>
	<?php
		echo $this->Form->input('institution_id');
		echo $this->Form->input('specific_condition_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('InstitutionSpecificCondition.specific_condition_id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('InstitutionSpecificCondition.specific_condition_id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Institution Specific Conditions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Institutions'), array('controller' => 'institutions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Institution'), array('controller' => 'institutions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Specific Conditions'), array('controller' => 'specific_conditions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Specific Condition'), array('controller' => 'specific_conditions', 'action' => 'add')); ?> </li>
	</ul>
</div>
