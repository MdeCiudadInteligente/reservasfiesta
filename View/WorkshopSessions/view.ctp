<div class="workshopSessions view">
<?php $this->set('title_for_layout' , 'Ver sessión de carpa' );?>
<h2><?php echo __('Workshop Session'); ?></h2>
	<dl>
		<dt><?php //echo __('Id Carpa Sesión:'); ?></dt>
		<dd>
			<?php //echo h($workshopSession['WorkshopSession']['id_workshop_session']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Día de la reserva:'); ?></dt>
		<dd>
			<?php echo h($workshopSession['WorkshopSession']['workshop_day']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hora de la reserva:'); ?></dt>
		<dd>
			<?php echo h($workshopSession['WorkshopSession']['workshop_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hora del Recorrido:'); ?></dt>
		<dd>
			<?php echo h($workshopSession['WorkshopSession']['travel_time']); ?>
			&nbsp;
		</dd>
		<dt><?php //echo __('State'); ?></dt>
		<dd>
			<?php //echo h($workshopSession['WorkshopSession']['state']); ?>
			&nbsp;
		</dd>
		<dt><?php //echo __('Carpa:'); ?></dt>
		<dd>
			<?php //echo $this->Html->link($workshopSession['Workshop']['name'], array('controller' => 'workshops', 'action' => 'view', $workshopSession['Workshop']['id_workshop'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Grupo:'); ?></dt>
		<dd>
			<?php echo $this->Html->link($workshopSession['Group']['name'], array('controller' => 'Groups', 'action' => 'view', $workshopSession['Group']['id_group'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Opciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Main Menu'), array('controller' => 'institutions', 'action' => 'index')); ?> </li>	
		<li><?php echo $this->Html->link(__('List Workshop Sessions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Workshop Session'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Edit Workshop Session'), array('action' => 'edit', $workshopSession['WorkshopSession']['id_workshop_session'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Workshop Session'), array('action' => 'delete', $workshopSession['WorkshopSession']['id_workshop_session']), null, __('Está seguro que desea Eliminar # %s?', $workshopSession['WorkshopSession']['id_workshop_session'])); ?> </li>
		<li><?php //echo $this->Html->link(__('List Workshops'), array('controller' => 'workshops', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Close Section'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul>
</div>