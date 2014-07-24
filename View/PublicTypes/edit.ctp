<div class="publicTypes form">
<?php echo $this->Form->create('PublicType'); ?>
	<fieldset>
		<legend><?php echo __('Edit Public Type'); ?></legend>
	<?php
		echo $this->Form->input('id_public_type');
		echo $this->Form->input('name');
		echo $this->Form->input('Workshop');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Opciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Main Menu'), array('controller' => 'institutions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('PublicType.id_public_type')), null, __('Are you sure you want to delete # %s?', $this->Form->value('PublicType.id_public_type'))); ?></li>
		<li><?php echo $this->Html->link(__('List Public Types'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Workshops'), array('controller' => 'workshops', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Workshop'), array('controller' => 'workshops', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Close Section'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul>
</div>
