<div class="workshopPublics form">
<?php echo $this->Form->create('WorkshopPublic'); ?>
	<fieldset>
		<legend><?php echo __('Edit Workshop Public'); ?></legend>
	<?php
		echo $this->Form->input('id_workshop_public');
		echo $this->Form->input('workshop_id');
		echo $this->Form->input('public_type_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('WorkshopPublic.id_workshop_public')), null, __('Are you sure you want to delete # %s?', $this->Form->value('WorkshopPublic.id_workshop_public'))); ?></li>
		<li><?php echo $this->Html->link(__('List Workshop Publics'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Workshops'), array('controller' => 'workshops', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Workshop'), array('controller' => 'workshops', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Public Types'), array('controller' => 'public_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Public Type'), array('controller' => 'public_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
