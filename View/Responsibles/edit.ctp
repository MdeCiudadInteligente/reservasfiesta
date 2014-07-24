<div class="responsibles form">
<?php echo $this->Form->create('Responsible'); ?>
	<fieldset>
		<legend><?php echo __('Edit Responsible'); ?></legend>
	<?php
		
		echo $this->Form->input('id_responsible');
		echo $this->Form->input('name');
		echo $this->Form->input('celular');
		echo $this->Form->input('mail');
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Opciones'); ?></h3>
	<ul>
		<?php $usuario_level= $this->Session->read('Auth.User.permission_level');?>
		<?php if ($usuario_level === '2'){?>
		<li><?php echo $this->Html->link(__('Regresar'), array('controller' => 'workshops', 'action' => 'index_inscription')); ?> </li>
		<?php }?>
		<?php  $usuario_level= $this->Session->read('Auth.User.permission_level');
		if ($usuario_level === '1'){?>
		<li><?php echo $this->Html->link(__('Main Menu'), array('controller' => 'institutions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Responsible.id_responsible')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Responsible.id_responsible'))); ?></li>
		<li><?php echo $this->Html->link(__('List Responsibles'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Educational Institutions'), array('controller' => 'educational_institutions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Educational Institution'), array('controller' => 'educational_institutions', 'action' => 'add')); ?> </li>
		<?php }?>
		<li><?php echo $this->Html->link(__('Close Section'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul>
</div>
