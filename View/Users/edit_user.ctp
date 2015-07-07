<div class="users form mde-form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
		echo $this->Form->input('id_user',array('type'=>'hidden'));
		echo $this->Form->input('username',array('disabled'=>'disabled'));
		//echo $this->Form->input('password');
		//echo $this->Form->input('permission_level');
		echo $this->Form->input('name');
		echo $this->Form->input('identity',array('label'=>'Documento de Identidad'));
		echo $this->Form->input('celular');
		echo $this->Form->input('mail');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Main Menu'), array('controller' => 'institutions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Usuarios'), array('action' => 'index')); ?></li>
		<li><?php //echo $this->Html->link(__('List Educational Institutions'), array('controller' => 'educational_institutions', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('New Educational Institution'), array('controller' => 'educational_institutions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Close Section'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul>
</div>
