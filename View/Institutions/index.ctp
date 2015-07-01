<div class="institutions index">
	<?php $this->set('title_for_layout' , 'Inicio' );?>
	<h2><?php echo __('Institutions'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('Tipo Institución'); ?></th>		
			<th><?php //echo $this->Paginator->sort('id_institution'); ?></th>
			<th><?php echo $this->Paginator->sort('Nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('Código DANE'); ?></th>
			<th><?php echo $this->Paginator->sort('Correo'); ?></th>
			<th><?php //echo $this->Paginator->sort('address'); ?></th>
			<th><?php //echo $this->Paginator->sort('phone'); ?></th>
			<th><?php //echo $this->Paginator->sort('neighborhood'); ?></th>
			<th><?php echo $this->Paginator->sort('Ciudad'); ?></th>
			<th><?php echo $this->Paginator->sort('Comuna'); ?></th>		
			
			<!--  <th><?php //echo $this->Paginator->sort('workshop_session_id'); ?></th>-->
			<th class="actions"><?php echo __('Opciones'); ?></th>
	</tr>
	<?php foreach ($institutions as $institution): ?>
	<tr>
		<?php if($institution['Institution']['id_institution'] != '0'){?>		
		<td><?php echo h($institution['Institution']['inst_type']); ?></td>
		<td><?php //echo h($institution['Institution']['id_institution']); ?>&nbsp;</td>
		<td><?php echo h($institution['Institution']['name']); ?>&nbsp;</td>
		<td><?php echo h($institution['Institution']['code_education']); ?>&nbsp;</td>
		<td><?php echo h($institution['Institution']['mail']); ?>&nbsp;</td>
		<td><?php //echo h($institution['Institution']['address']); ?>&nbsp;</td>
		<td><?php //echo h($institution['Institution']['phone']); ?>&nbsp;</td>
		<td><?php //echo h($institution['Institution']['neighborhood']); ?>&nbsp;</td>
		<td><?php echo h($institution['Institution']['city']); ?>&nbsp;</td>
		<td><?php echo h($institution['Institution']['comune']); ?>&nbsp;</td>
		<!-- <td>
			<?php //echo $this->Html->link($institution['WorkshopSession']['id_workshop_session'], array('controller' => 'workshop_sessions', 'action' => 'view', $institution['WorkshopSession']['id_workshop_session'])); ?>
		</td>-->
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $institution['Institution']['id_institution'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $institution['Institution']['id_institution'])); ?>
			<?php //No se debe permitir borrar// echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $institution['Institution']['id_institution']), null, __('Are you sure you want to delete # %s?', $institution['Institution']['id_institution'])); ?>
		</td>
	</tr><?php }?>
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
	
	<?php echo $this->Form->create('Exportar'); ?>
	<?php echo $this->Form->end(__('Exportar a excel')); ?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Opciones'); ?></h3>
	<ul>		
		<li><?php //echo $this->Html->link(__('Main Menu'), array('controller' => 'institutions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Institution'), array('action' => 'add')); ?></li>		
		<li><?php //echo $this->Html->link(__('Lista Institución Educativa'), array('controller' => 'educational_institutions','action' => 'index')); ?></li>		
		<li><?php echo $this->Html->link(__('List Entities'), array('controller' => 'entities','action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Lista Usuarios'), array('controller' => 'users','action' => 'index')); ?></li>	
		<li><?php echo $this->Html->link(__('Lista Grupos'), array('controller' => 'groups','action' => 'index')); ?></li>	
		<li><?php //echo $this->Html->link(__('New Group'), array('controller'=>'groups','action' => 'add')); ?></li>	
		<li><?php //echo $this->Html->link(__('Lista Grupos'), array('controller'=>'groups','action' => 'index')); ?></li>		
		<li><?php echo $this->Html->link(__('List Public Types'), array('controller' => 'PublicTypes','action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Specific Conditions'), array('controller' => 'SpecificConditions','action' => 'index')); ?></li>	
		<li><?php echo $this->Html->link(__('List Workshops'), array('controller' => 'Workshops','action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Workshop Sessions'), array('controller' => 'WorkshopSessions','action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Cargar Archivo de Horarios'), array('controller' => 'WorkshopSessions', 'action' => 'cargarchivo')); ?> </li>	
		<li><?php echo $this->Html->link(__('Listado de Registros'), array('controller' => 'workshops', 'action' => 'listado')); ?> </li>	
		<li><?php echo $this->Html->link(__('Close Section'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul>
</div>
