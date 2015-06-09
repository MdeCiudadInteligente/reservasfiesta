<div class="groupSpecificConditions form">
<?php echo $this->Form->create('GroupSpecificCondition'); ?>
	<fieldset>
		<legend><?php echo __('Add Group Specific Condition'); ?></legend>
	<?php
		echo $this->Form->input('group_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Group Specific Conditions'), array('action' => 'index')); ?></li>
	</ul>
</div>
