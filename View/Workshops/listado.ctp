<!-- Scripts para el calendario -->
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script> 
 
 <!--Fin Scripts para el calendario -->
<div class="WorkshopSession form">
<?php echo $this->Form->create('WorkshopSession'); ?>
	<fieldset>
	<span><strong>Registro de Inscripciones y Cancelaciones</strong></span>
	</br></br></br>
		<legend><?php //echo __('Seleccionar Fecha'); ?></legend>
	
		<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php //echo $this->Paginator->sort('id_institution'); ?></th>
			<th><?php echo $this->Paginator->sort('Fecha'); ?></th>
			<th><?php echo $this->Paginator->sort('Usuario'); ?></th>
			<th><?php //echo $this->Paginator->sort('address'); ?></th>
			<th><?php //echo $this->Paginator->sort('phone'); ?></th>
			<th><?php //echo $this->Paginator->sort('neighborhood'); ?></th>
			<th><?php echo $this->Paginator->sort('Estado'); ?></th>
			<th><?php //echo $this->Paginator->sort('city'); ?></th>
			<th><?php echo $this->Paginator->sort('Carpa'); ?></th>
			<th><?php //echo $this->Paginator->sort('age_range'); ?></th>			
			<!--  <th><?php //echo $this->Paginator->sort('workshop_session_id'); ?></th>-->
	</tr>
	<?php foreach ($registers as $register): ?>
	<tr>
		<td><?php //echo h($institution['Institution']['id_institution']); ?>&nbsp;</td>
		<td><?php echo h($register['Register']['date']); ?>&nbsp;</td>
		<td><?php echo h($register['Register']['user']); ?>&nbsp;</td>
		<td><?php //echo h($institution['Institution']['address']); ?>&nbsp;</td>
		<td><?php //echo h($institution['Institution']['phone']); ?>&nbsp;</td>
		<td><?php //echo h($institution['Institution']['neighborhood']); ?>&nbsp;</td>
		<td><?php echo h($register['Register']['estado']); ?>&nbsp;</td>
		<td><?php //echo h($institution['Institution']['city']); ?>&nbsp;</td>
		<td><?php echo h($register['Register']['workshop']); ?>&nbsp;</td>
		<td><?php //echo h($institution['Institution']['age_range']); ?>&nbsp;</td>		
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
		
	</fieldset>
<?php //echo $this->Form->end(__('Ver registros')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Opciones'); ?></h3>
	<ul>		
		<li><?php echo $this->Html->link(__('Main Menu'), array('controller' => 'institutions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Close Section'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul>
</div>
