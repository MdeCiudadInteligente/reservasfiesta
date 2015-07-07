<div class="groupSpecificConditions form mde-form">
<?php echo $this->Form->create('GroupSpecificCondition'); ?>
	<fieldset>
		<legend><?php echo __('Edit Group Specific Condition'); ?></legend>
	<?php
		echo $this->Form->input('group_id');
		echo $this->Form->input('specific_condition_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('GroupSpecificCondition.specific_condition_id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('GroupSpecificCondition.specific_condition_id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Group Specific Conditions'), array('action' => 'index')); ?></li>
	</ul>
</div>
