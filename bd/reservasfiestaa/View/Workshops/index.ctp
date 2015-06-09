<div class="workshops index">
<?php $this->set('title_for_layout' , 'Lista carpa' );?>
	<h2><?php echo __('Workshops'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id_workshop'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('entity_id'); ?></th>
			<th class="actions"><?php echo __('Opciones'); ?></th>
	</tr>
	<?php foreach ($workshops as $workshopp): ?>
	<tr>
		<td><?php echo h($workshopp['Workshop']['id_workshop']); ?>&nbsp;</td>
		<td><?php echo h($workshopp['Workshop']['name']); ?>&nbsp;</td>
		<td><?php echo h($workshopp['Workshop']['description']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($workshopp['Entity']['name'], array('controller' => 'entities', 'action' => 'view', $workshopp['Entity']['id_entity'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $workshopp['Workshop']['id_workshop'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $workshopp['Workshop']['id_workshop'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $workshopp['Workshop']['id_workshop']), null, __('Are you sure you want to delete # %s?', $workshopp['Workshop']['id_workshop'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	/*echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));*/
	echo $this->Paginator->counter(array(
	'format' => __('Pagina {:page} of {:pages}, resultado {:current} registros de {:count} en total, a partir del registro {:start}, que concluye en el {:end}')
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
	<h3><?php echo __('Opciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Main Menu'), array('controller' => 'institutions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Workshop'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Entities'), array('controller' => 'entities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entity'), array('controller' => 'entities', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Close Section'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
		
	</ul>
</div>
