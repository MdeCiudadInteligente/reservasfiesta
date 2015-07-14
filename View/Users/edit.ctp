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

		<li><?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.id_user')), null, __('Are you sure you want to delete # %s?', $this->Form->value('User.id_user'))); ?></li>
		<li><?php echo $this->Html->link(__('Regresar'), array('controller' => 'workshops', 'action' => 'index_inscription')); ?> </li>
	</ul>
</div>
