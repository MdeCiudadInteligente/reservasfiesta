<div class="responsibles form">
<?php echo $this->Form->create('Responsible'); ?>
	<fieldset>
		<legend><?php echo __('Change Workshop'); ?></legend>
	<?php
		
		echo $this->Form->input('Control Fecha');
		echo $this->Form->input('Listado Talleres');
		echo $this->Form->input('Entidad');
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Main Menu'), array('controller' => 'inscripciones', 'action' => 'inscripcion')); ?> </li>
		<li><?php echo $this->Html->link(__('Close Section'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul>
</div>
