<div class="specificConditionWorkshops form">
<?php echo $this->Form->create('SpecificConditionWorkshop'); ?>
	<fieldset>
		<legend><?php echo __('Add Specific Condition Workshop'); ?></legend>
	<?php
		echo $this->Form->input('workshop_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Specific Condition Workshops'), array('action' => 'index')); ?></li>
	</ul>
</div>
