<div class="groups index">
	<h2><?php echo __('Groups'); ?></h2>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?php //echo $this->Paginator->sort('id_group'); ?></th>
			<th><?php echo __('Nombre Grupo'); ?></th>
			<th><?php echo __('Numero de integrantes'); ?></th>
			<th><?php echo __('Rango de Edad');?></th>
			<th><?php echo __('Condición Específica'); ?></th>
			<th><?php echo __('Responsable'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($groups as $group): ?>
	<tr>
		<td><?php //echo h($group['Group']['id_group']); ?>&nbsp;</td>
		<td><?php echo h($group['gs']['name']); ?>&nbsp;</td>
		<td><?php echo h($group['gs']['members_number']); ?>&nbsp;</td>
		<td><?php echo h($group['pt']['name']); ?>&nbsp;</td>
		<td><?php echo h($group['0']['specific_conditions']); ?>&nbsp;</td>
		<td><?php echo h($group['us']['name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($group['PublicType']['name'], array('controller' => 'public_types', 'action' => 'view', $group['PublicType']['id_public_type'])); ?>
		</td>
		<td>
			<?php 
			$tspecificcondition='';
			foreach ($group['SpecificCondition'] as $specificcondition):
			$tspecificcondition=$specificcondition['name'].','.$tspecificcondition;
			endforeach;
			echo $tspecificcondition;
			?>
	
		</td>
		<td>
			<?php echo $this->Html->link($group['User']['name'], array('controller' => 'users', 'action' => 'view', $group['User']['id_user'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $group['Group']['id_group'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $group['Group']['id_group'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $group['Group']['id_group']), null, __('Are you sure you want to delete # %s?', $group['Group']['id_group'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>

	
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'addresp')); ?></li>
		<li><?php echo $this->Html->link(__('List Public Types'), array('controller' => 'public_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Public Type'), array('controller' => 'public_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Specific Conditions'), array('controller' => 'specific_conditions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Specific Condition'), array('controller' => 'specific_conditions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Responsibles'), array('controller' => 'responsibles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Responsible'), array('controller' => 'responsibles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listado Instituciones'), array('controller' => 'institutions', 'action' => 'index')); ?> </li>
	</ul>
</div>
