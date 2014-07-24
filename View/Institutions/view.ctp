<div class="institutions view">
<h2><?php echo __('Institution'); ?></h2>
	<dl>
		<dt><?php //echo __('Id Institution'); ?></dt>
		<dd>
			<?php //echo h($institution['Institution']['id_institution']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($institution['Institution']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mail'); ?></dt>
		<dd>
			<?php echo h($institution['Institution']['mail']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($institution['Institution']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($institution['Institution']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Neighborhood'); ?></dt>
		<dd>
			<?php echo h($institution['Institution']['neighborhood']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comune'); ?></dt>
		<dd>
			<?php echo h($institution['Institution']['comune']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($institution['Institution']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Members Number'); ?></dt>
		<dd>
			<?php echo h($institution['Institution']['members_number']); ?>
			&nbsp;
		</dd>
		<dt><?php //echo __('Age Range'); ?></dt>
		<dd>
			<?php //echo h($institution['Institution']['age_range']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Public Type'); ?></dt>
		<dd>
			<?php echo h($institution['PublicType']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Institution Type'); ?></dt>
		<dd>
			<?php echo h($institution['Institution']['institution_type']); ?>
			&nbsp;
		</dd>
		</dl>
		<table>
		<tr>
			<th><?php echo $this->Paginator->sort('Session de la carpa'); ?></th>
			<th><?php echo $this->Paginator->sort('workshop_day'); ?></th>
			<th><?php echo $this->Paginator->sort('workshop_time'); ?></th>
			<th><?php echo $this->Paginator->sort('travel_time'); ?></th>
			<th><?php echo $this->Paginator->sort('nombre carpa'); ?></th>
			<th><?php //echo $this->Paginator->sort('public_type_id'); ?></th>
			<th><?php //echo $this->Paginator->sort('Tipo institución'); ?></th>
		</tr>			

		<?php foreach ($session as $session): ?>
		<tr>
			<td><?php echo h($session['WorkshopSession']['id_workshop_session']); ?>&nbsp;</td>
			<td><?php echo h($session['WorkshopSession']['workshop_day']); ?>&nbsp;</td>
			<td><?php echo h($session['WorkshopSession']['workshop_time']); ?>&nbsp;</td>
			<td><?php echo h($session['WorkshopSession']['travel_time']); ?>&nbsp;</td>
			<td><?php echo h($session['Workshop']['name']); ?>&nbsp;</td>
		</tr>
			
		<?php endforeach; ?>
		</table>
	<p>
	<?php	
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
	<h3><?php echo __('Actions'); ?></h3>
	<ul>	
		<li><?php echo $this->Html->link(__('Main Menu'), array('controller' => 'institutions', 'action' => 'index')); ?> </li>	
		<li><?php echo $this->Html->link(__('Edit Institution'), array('action' => 'edit', $institution['Institution']['id_institution'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Eliminar Grupo'), array('action' => 'delete', $institution['Institution']['id_institution']), null, __('Are you sure you want to delete # %s?', $institution['Institution']['id_institution'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Institutions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Institution'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Close Section'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul>
</div>