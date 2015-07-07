<div class="workshopSpecifics form mde-form">
<?php echo $this->Form->create('WorkshopSpecific'); ?>
	<fieldset>
		<legend><?php echo __('Edit Workshop Specific'); ?></legend>
	<?php
		echo $this->Form->input('id_workshop_specific');
		echo $this->Form->input('workshop_id');
		echo $this->Form->input('specific_condition_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('WorkshopSpecific.id_workshop_specific')), null, __('Are you sure you want to delete # %s?', $this->Form->value('WorkshopSpecific.id_workshop_specific'))); ?></li>
		<li><?php echo $this->Html->link(__('List Workshop Specifics'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Workshops'), array('controller' => 'workshops', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Workshop'), array('controller' => 'workshops', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Specific Conditions'), array('controller' => 'specific_conditions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Specific Condition'), array('controller' => 'specific_conditions', 'action' => 'add')); ?> </li>
	</ul>
</div>
