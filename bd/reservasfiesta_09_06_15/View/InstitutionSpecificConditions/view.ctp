<div class="institutionSpecificConditions view">
<h2><?php echo __('Institution Specific Condition'); ?></h2>
	<dl>
		<dt><?php echo __('Institution'); ?></dt>
		<dd>
			<?php echo $this->Html->link($institutionSpecificCondition['Institution']['name'], array('controller' => 'institutions', 'action' => 'view', $institutionSpecificCondition['Institution']['id_institution'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Specific Condition'); ?></dt>
		<dd>
			<?php echo $this->Html->link($institutionSpecificCondition['SpecificCondition']['name'], array('controller' => 'specific_conditions', 'action' => 'view', $institutionSpecificCondition['SpecificCondition']['id_specific_condition'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Institution Specific Condition'), array('action' => 'edit', $institutionSpecificCondition['InstitutionSpecificCondition']['specific_condition_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Institution Specific Condition'), array('action' => 'delete', $institutionSpecificCondition['InstitutionSpecificCondition']['specific_condition_id']), null, __('Are you sure you want to delete # %s?', $institutionSpecificCondition['InstitutionSpecificCondition']['specific_condition_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Institution Specific Conditions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Institution Specific Condition'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Institutions'), array('controller' => 'institutions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Institution'), array('controller' => 'institutions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Specific Conditions'), array('controller' => 'specific_conditions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Specific Condition'), array('controller' => 'specific_conditions', 'action' => 'add')); ?> </li>
	</ul>
</div>
