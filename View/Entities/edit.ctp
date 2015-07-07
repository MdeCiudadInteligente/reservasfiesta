<div class="entities form mde-form">
<?php $this->set('title_for_layout' , 'Editar entidad' );?>
<?php echo $this->Form->create('Entity'); ?>
	<fieldset>
		<legend><?php echo __('Edit Entity'); ?></legend>
	<?php
		echo $this->Form->input('id_entity');	
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
		<li><?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Entity.id_entity')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Entity.id_entity'))); ?></li>
		<li><?php echo $this->Html->link(__('List Entities'), array('action' => 'index')); ?></li>
		<li><?php //echo $this->Html->link(__('List Workshops'), array('controller' => 'workshops', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('New Workshop'), array('controller' => 'workshops', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Close Section'), array('controller' => 'users', 'action' => 'logout')); ?> </li>	
	</ul>
</div>
