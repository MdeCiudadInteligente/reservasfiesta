<div class="publicTypes form mde-form">
<?php $this->set('title_for_layout' , 'Agregar tipo de público' );?>
<?php echo $this->Form->create('PublicType'); ?>
	<fieldset>
		<legend><?php echo __('Add Public Type'); ?></legend>
	<?php
		echo $this->Form->input('name',array('maxLength'=>'256'));
		echo $this->Form->input('Workshop');
		//echo $this->Form->input('Workshop', array('type' => 'select', 'multiple' => 'checkbox'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Opciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Main Menu'), array('controller' => 'institutions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Public Types'), array('action' => 'index')); ?></li>
		<li><?php //echo $this->Html->link(__('List Workshops'), array('controller' => 'workshops', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('New Workshop'), array('controller' => 'workshops', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Close Section'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul>
</div>
