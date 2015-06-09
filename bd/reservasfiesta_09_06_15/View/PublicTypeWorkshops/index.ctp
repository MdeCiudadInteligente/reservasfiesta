<div class="publicTypeWorkshops index">
	<h2><?php echo __('Public Type Workshops'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('workshop_id'); ?></th>
			<th><?php echo $this->Paginator->sort('public_type_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($publicTypeWorkshops as $publicTypeWorkshop): ?>
	<tr>
		<td><?php echo h($publicTypeWorkshop['PublicTypeWorkshop']['workshop_id']); ?>&nbsp;</td>
		<td><?php echo h($publicTypeWorkshop['PublicTypeWorkshop']['public_type_id']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $publicTypeWorkshop['PublicTypeWorkshop']['public_type_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $publicTypeWorkshop['PublicTypeWorkshop']['public_type_id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $publicTypeWorkshop['PublicTypeWorkshop']['public_type_id']), null, __('Are you sure you want to delete # %s?', $publicTypeWorkshop['PublicTypeWorkshop']['public_type_id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Public Type Workshop'), array('action' => 'add')); ?></li>
	</ul>
</div>
