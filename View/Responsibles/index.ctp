<div class="responsibles index">
	<h2><?php echo __('Responsibles'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id_responsible'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('celular'); ?></th>
			<th><?php echo $this->Paginator->sort('mail'); ?></th>
			<th><?php echo $this->Paginator->sort('institution_id'); ?></th>
			<th class="actions"><?php echo __('Opciones'); ?></th>
	</tr>
	<?php foreach ($responsibles as $responsible): ?>
	<tr>
		<td><?php echo h($responsible['Responsible']['id_responsible']); ?>&nbsp;</td>
		<td><?php echo h($responsible['Responsible']['name']); ?>&nbsp;</td>
		<td><?php echo h($responsible['Responsible']['celular']); ?>&nbsp;</td>
		<td><?php echo h($responsible['Responsible']['mail']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($responsible['Institution']['id_institution'], array('controller' => 'institutions', 'action' => 'view', $responsible['Institution']['id_institution'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $responsible['Responsible']['id_responsible'])); ?>
			<?php //echo $this->Html->link(__('Edit'), array('action' => 'edit', $responsible['Responsible']['id_responsible'])); ?>
			<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $responsible['Responsible']['id_responsible']), null, __('Are you sure you want to delete # %s?', $responsible['Responsible']['id_responsible'])); ?>
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
	<h3><?php echo __('Opciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Main Menu'), array('controller' => 'institutions', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('New Responsible'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Educational Institutions'), array('controller' => 'educational_institutions', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('New Educational Institution'), array('controller' => 'educational_institutions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Close Section'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul>
</div>
