<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
		echo $this->Form->input('id_user');
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('permission_level');
		//echo $this->Form->input('institution_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Opciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Main Menu'), array('controller' => 'institutions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Form->postLink(__('Eliminar Usuario'), array('action' => 'delete', $this->Form->value('User.id_user')), null, __('Está seguro que desea eliminar # %s?', $this->Form->value('User.id_user'))); ?></li>
		<li><?php //echo $this->Html->link(__('List Institutions'), array('controller' => 'institutions', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('New Institution'), array('controller' => 'institutions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Close Section'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul>
</div>
