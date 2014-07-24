<div class="institutionSpecificConditions index">
	<h2><?php echo __('Institution Specific Conditions'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('institution_id'); ?></th>
			<th><?php echo $this->Paginator->sort('specific_condition_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($institutionSpecificConditions as $institutionSpecificCondition): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($institutionSpecificCondition['Institution']['name'], array('controller' => 'institutions', 'action' => 'view', $institutionSpecificCondition['Institution']['id_institution'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($institutionSpecificCondition['SpecificCondition']['name'], array('controller' => 'specific_conditions', 'action' => 'view', $institutionSpecificCondition['SpecificCondition']['id_specific_condition'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $institutionSpecificCondition['InstitutionSpecificCondition']['specific_condition_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $institutionSpecificCondition['InstitutionSpecificCondition']['specific_condition_id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $institutionSpecificCondition['InstitutionSpecificCondition']['specific_condition_id']), null, __('Are you sure you want to delete # %s?', $institutionSpecificCondition['InstitutionSpecificCondition']['specific_condition_id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Institution Specific Condition'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Institutions'), array('controller' => 'institutions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Institution'), array('controller' => 'institutions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Specific Conditions'), array('controller' => 'specific_conditions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Specific Condition'), array('controller' => 'specific_conditions', 'action' => 'add')); ?> </li>
	</ul>
</div>
