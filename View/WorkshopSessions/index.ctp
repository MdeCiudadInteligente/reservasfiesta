<div class="workshopSessions index">
<?php $this->set('title_for_layout' , 'Ver sessión de carpa' );?>
	<h2><?php echo __('Workshop Sessions'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id_workshop_session'); ?></th>
			<th><?php echo $this->Paginator->sort('workshop_day'); ?></th>
			<th><?php echo $this->Paginator->sort('workshop_time'); ?></th>
			<th><?php echo $this->Paginator->sort('travel_time'); ?></th>
			<th><?php echo $this->Paginator->sort('group_id'); ?></th>
			<th class="actions"><?php echo __('Opciones'); ?></th>
			
	</tr>
	<?php foreach ($workshopSessions as $workshopSession): ?>
	<tr>
		<td><?php echo h($workshopSession['WorkshopSession']['id_workshop_session']); ?>&nbsp;</td>
		<td><?php echo h($workshopSession['WorkshopSession']['workshop_day']); ?>&nbsp;</td>
		<td><?php echo h($workshopSession['WorkshopSession']['workshop_time']); ?>&nbsp;</td>
		<td><?php echo h($workshopSession['WorkshopSession']['travel_time']); ?>&nbsp;</td>
		</td>
		<td>
			<?php echo $this->Html->link($workshopSession['Group']['name'], array('controller' => 'Groups', 'action' => 'view', $workshopSession['Group']['id_group'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $workshopSession['WorkshopSession']['id_workshop_session'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $workshopSession['WorkshopSession']['id_workshop_session'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $workshopSession['WorkshopSession']['id_workshop_session']), null, __('Está seguro que desea Eliminar # %s?', $workshopSession['WorkshopSession']['id_workshop_session'])); ?>
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
		<li><?php echo $this->Html->link(__('New Workshop Session'), array('action' => 'add')); ?></li>
		<li><?php //echo $this->Html->link(__('List Workshops'), array('controller' => 'workshops', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('New Workshop'), array('controller' => 'workshops', 'action' => 'add')); ?> </li>
		<li><?php //echo $this->Html->link(__('List Institutions'), array('controller' => 'institutions', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('New Institution'), array('controller' => 'institutions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Close Section'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul>
</div>
