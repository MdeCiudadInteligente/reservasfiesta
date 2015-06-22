<div class="groups view">
<h2><?php echo __('Group'); ?></h2>
	<dl>
		<dt><?php //echo __('Id Group'); ?></dt>
		<dd>
			<?php //echo h($group['Group']['id_group']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre Grupo'); ?></dt>
		<dd>
			<?php echo h($groups[$idgro]['gs']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Numero de integrantes'); ?></dt>
		<dd>
			<?php echo h($groups[$idgro]['gs']['members_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rango de Edad'); ?></dt>
		<dd>
			<?php echo h($groups[$idgro]['pt']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Condición Específica'); ?></dt>
		<dd>
			<?php echo h($groups[$idgro]['0']['specific_conditions']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Responsable'); ?></dt>
		<dd>
			<?php echo h($groups[$idgro]['us']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre Taller'); ?></dt>
		<dd>
			<?php echo h($groups[$idgro]['wp']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Día Taller'); ?></dt>
		<dd>
			<?php echo h($groups[$idgro]['ws']['workshop_day']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hora Taller'); ?></dt>
		<dd>
			<?php echo h($groups[$idgro]['ws']['workshop_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Recorrido Taller'); ?></dt>
		<dd>
			<?php echo h($groups[$idgro]['ws']['travel_time']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Groups'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Public Types'), array('controller' => 'public_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Public Type'), array('controller' => 'public_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Specific Conditions'), array('controller' => 'specific_conditions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Specific Condition'), array('controller' => 'specific_conditions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Responsibles'), array('controller' => 'responsibles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Responsible'), array('controller' => 'responsibles', 'action' => 'add')); ?> </li>
	</ul>
</div>
