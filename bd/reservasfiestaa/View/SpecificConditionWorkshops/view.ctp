<div class="specificConditionWorkshops view">
<h2><?php echo __('Specific Condition Workshop'); ?></h2>
	<dl>
		<dt><?php echo __('Workshop Id'); ?></dt>
		<dd>
			<?php echo h($specificConditionWorkshop['SpecificConditionWorkshop']['workshop_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Specific Condition Id'); ?></dt>
		<dd>
			<?php echo h($specificConditionWorkshop['SpecificConditionWorkshop']['specific_condition_id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Specific Condition Workshop'), array('action' => 'edit', $specificConditionWorkshop['SpecificConditionWorkshop']['specific_condition_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Specific Condition Workshop'), array('action' => 'delete', $specificConditionWorkshop['SpecificConditionWorkshop']['specific_condition_id']), null, __('Are you sure you want to delete # %s?', $specificConditionWorkshop['SpecificConditionWorkshop']['specific_condition_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Specific Condition Workshops'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Specific Condition Workshop'), array('action' => 'add')); ?> </li>
	</ul>
</div>
