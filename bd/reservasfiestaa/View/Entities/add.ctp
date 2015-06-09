<div class="entities form">
<?php $this->set('title_for_layout' , 'Agregar entidad' );?>
<?php echo $this->Form->create('Entity'); ?>
	<fieldset>
		<legend><?php echo __('Add Entity'); ?></legend>
	<?php
		echo $this->Form->input('name',array('maxLength'=>'256'));
		echo $this->Form->input('description',array('label'=>'URL de la Entidad','maxLength'=>'256'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Main Menu'), array('controller' => 'institutions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Entities'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Workshops'), array('controller' => 'workshops', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Workshop'), array('controller' => 'workshops', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Close Section'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul>
</div>
