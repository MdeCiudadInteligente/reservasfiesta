<div class="specificConditionWorkshops form mde-form">
<?php echo $this->Form->create('SpecificConditionWorkshop'); ?>
	<fieldset>
		<legend><?php echo __('Edit Specific Condition Workshop'); ?></legend>
	<?php
		echo $this->Form->input('workshop_id');
		echo $this->Form->input('specific_condition_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('SpecificConditionWorkshop.specific_condition_id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('SpecificConditionWorkshop.specific_condition_id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Specific Condition Workshops'), array('action' => 'index')); ?></li>
	</ul>
</div>
