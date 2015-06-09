<div class="workshopPublics index">
	<h2><?php echo __('Workshop Publics'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id_workshop_public'); ?></th>
			<th><?php echo $this->Paginator->sort('workshop_id'); ?></th>
			<th><?php echo $this->Paginator->sort('public_type_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($workshopPublics as $workshopPublic): ?>
	<tr>
		<td><?php echo h($workshopPublic['WorkshopPublic']['id_workshop_public']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($workshopPublic['Workshop']['name'], array('controller' => 'workshops', 'action' => 'view', $workshopPublic['Workshop']['id_workshop'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($workshopPublic['PublicType']['name'], array('controller' => 'public_types', 'action' => 'view', $workshopPublic['PublicType']['id_public_type'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $workshopPublic['WorkshopPublic']['id_workshop_public'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $workshopPublic['WorkshopPublic']['id_workshop_public'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $workshopPublic['WorkshopPublic']['id_workshop_public']), null, __('Are you sure you want to delete # %s?', $workshopPublic['WorkshopPublic']['id_workshop_public'])); ?>
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
		<li><?php echo $this->Html->link(__('New Workshop Public'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Workshops'), array('controller' => 'workshops', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Workshop'), array('controller' => 'workshops', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Public Types'), array('controller' => 'public_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Public Type'), array('controller' => 'public_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
