<div class="specificConditionWorkshops index">
	<h2><?php echo __('Specific Condition Workshops'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('workshop_id'); ?></th>
			<th><?php echo $this->Paginator->sort('specific_condition_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($specificConditionWorkshops as $specificConditionWorkshop): ?>
	<tr>
		<td><?php echo h($specificConditionWorkshop['SpecificConditionWorkshop']['workshop_id']); ?>&nbsp;</td>
		<td><?php echo h($specificConditionWorkshop['SpecificConditionWorkshop']['specific_condition_id']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $specificConditionWorkshop['SpecificConditionWorkshop']['specific_condition_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $specificConditionWorkshop['SpecificConditionWorkshop']['specific_condition_id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $specificConditionWorkshop['SpecificConditionWorkshop']['specific_condition_id']), null, __('Are you sure you want to delete # %s?', $specificConditionWorkshop['SpecificConditionWorkshop']['specific_condition_id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Specific Condition Workshop'), array('action' => 'add')); ?></li>
	</ul>
</div>