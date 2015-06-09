<div class="workshopSpecifics index">
	<h2><?php echo __('Workshop Specifics'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id_workshop_specific'); ?></th>
			<th><?php echo $this->Paginator->sort('workshop_id'); ?></th>
			<th><?php echo $this->Paginator->sort('specific_condition_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($workshopSpecifics as $workshopSpecific): ?>
	<tr>
		<td><?php echo h($workshopSpecific['WorkshopSpecific']['id_workshop_specific']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($workshopSpecific['Workshop']['name'], array('controller' => 'workshops', 'action' => 'view', $workshopSpecific['Workshop']['id_workshop'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($workshopSpecific['SpecificCondition']['name'], array('controller' => 'specific_conditions', 'action' => 'view', $workshopSpecific['SpecificCondition']['id_specific_condition'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $workshopSpecific['WorkshopSpecific']['id_workshop_specific'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $workshopSpecific['WorkshopSpecific']['id_workshop_specific'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $workshopSpecific['WorkshopSpecific']['id_workshop_specific']), null, __('Are you sure you want to delete # %s?', $workshopSpecific['WorkshopSpecific']['id_workshop_specific'])); ?>
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
		<li><?php echo $this->Html->link(__('New Workshop Specific'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Workshops'), array('controller' => 'workshops', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Workshop'), array('controller' => 'workshops', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Specific Conditions'), array('controller' => 'specific_conditions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Specific Condition'), array('controller' => 'specific_conditions', 'action' => 'add')); ?> </li>
	</ul>
</div>
