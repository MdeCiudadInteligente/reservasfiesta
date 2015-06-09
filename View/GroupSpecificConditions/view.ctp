<div class="groupSpecificConditions view">
<h2><?php echo __('Group Specific Condition'); ?></h2>
	<dl>
		<dt><?php echo __('Group Id'); ?></dt>
		<dd>
			<?php echo h($groupSpecificCondition['GroupSpecificCondition']['group_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Specific Condition Id'); ?></dt>
		<dd>
			<?php echo h($groupSpecificCondition['GroupSpecificCondition']['specific_condition_id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Group Specific Condition'), array('action' => 'edit', $groupSpecificCondition['GroupSpecificCondition']['specific_condition_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Group Specific Condition'), array('action' => 'delete', $groupSpecificCondition['GroupSpecificCondition']['specific_condition_id']), null, __('Are you sure you want to delete # %s?', $groupSpecificCondition['GroupSpecificCondition']['specific_condition_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Group Specific Conditions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group Specific Condition'), array('action' => 'add')); ?> </li>
	</ul>
</div>
