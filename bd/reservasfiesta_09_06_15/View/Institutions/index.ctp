<div class="institutions index">
	<?php $this->set('title_for_layout' , 'Inicio' );?>
	<h2><?php echo __('Institutions'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php //echo $this->Paginator->sort('id_institution'); ?></th>
			<th><?php echo $this->Paginator->sort('Nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('Correo'); ?></th>
			<th><?php //echo $this->Paginator->sort('address'); ?></th>
			<th><?php //echo $this->Paginator->sort('phone'); ?></th>
			<th><?php //echo $this->Paginator->sort('neighborhood'); ?></th>
			<th><?php echo $this->Paginator->sort('Comuna'); ?></th>
			<th><?php //echo $this->Paginator->sort('city'); ?></th>
			<th><?php echo $this->Paginator->sort('Número de Integrantes'); ?></th>
			<th><?php //echo $this->Paginator->sort('age_range'); ?></th>
			<th><?php echo $this->Paginator->sort('public_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('institution_type'); ?></th>
			<!--  <th><?php //echo $this->Paginator->sort('workshop_session_id'); ?></th>-->
			<th class="actions"><?php echo __('Opciones'); ?></th>
	</tr>
	<?php foreach ($institutions as $institution): ?>
	<tr>
		<?php if($institution['Institution']['id_institution'] != '0'){?>
		<td><?php //echo h($institution['Institution']['id_institution']); ?>&nbsp;</td>
		<td><?php echo h($institution['Institution']['name']); ?>&nbsp;</td>
		<td><?php echo h($institution['Institution']['mail']); ?>&nbsp;</td>
		<td><?php //echo h($institution['Institution']['address']); ?>&nbsp;</td>
		<td><?php //echo h($institution['Institution']['phone']); ?>&nbsp;</td>
		<td><?php //echo h($institution['Institution']['neighborhood']); ?>&nbsp;</td>
		<td><?php echo h($institution['Institution']['comune']); ?>&nbsp;</td>
		<td><?php //echo h($institution['Institution']['city']); ?>&nbsp;</td>
		<td><?php echo h($institution['Institution']['members_number']); ?>&nbsp;</td>
		<td><?php //echo h($institution['Institution']['age_range']); ?>&nbsp;</td>
		<td>
			<?php echo h($institution['PublicType']['name']); ?>
		</td>
		<td><?php echo h($institution['Institution']['institution_type']); ?>&nbsp;</td>
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
		<li><?php echo $this->Html->link(__('Main Menu'), array('controller' => 'institutions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Institution'), array('action' => 'add')); ?></li>		
		<li><?php echo $this->Html->link(__('Lista Institución Educativa'), array('controller' => 'educational_institutions','action' => 'index')); ?></li>		
		<li><?php echo $this->Html->link(__('Nueva Entidad'), array('controller' => 'entities','action' => 'add')); ?></li>	
		<li><?php echo $this->Html->link(__('Lista Responsables'), array('controller' => 'responsibles','action' => 'index')); ?></li>	
		<li><?php //echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>			
		<li><?php echo $this->Html->link(__('New Public Type'), array('controller' => 'public_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('New Specific Condition'), array('controller' => 'specific_conditions', 'action' => 'add')); ?> </li>	
		<li><?php echo $this->Html->link(__('Nueva Carpa'), array('controller' => 'workshops','action' => 'add')); ?></li>		
		<li><?php echo $this->Html->link(__('New Workshop Session'), array('controller' => 'workshop_sessions', 'action' => 'add')); ?> </li>	
		<li><?php echo $this->Html->link(__('Cargar Archivo de Horarios'), array('controller' => 'workshop_sessions', 'action' => 'cargarchivo')); ?> </li>	
		<li><?php echo $this->Html->link(__('Listado de Registros'), array('controller' => 'workshops', 'action' => 'listado')); ?> </li>	
		<li><?php echo $this->Html->link(__('Close Section'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul>
</div>
