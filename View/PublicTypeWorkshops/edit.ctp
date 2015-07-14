<div class="publicTypeWorkshops form mde-form">
<?php echo $this->Form->create('PublicTypeWorkshop'); ?>
	<fieldset>
		<legend><?php echo __('Edit Public Type Workshop'); ?></legend>
	<?php
		echo $this->Form->input('workshop_id');
		echo $this->Form->input('public_type_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('PublicTypeWorkshop.public_type_id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('PublicTypeWorkshop.public_type_id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Public Type Workshops'), array('action' => 'index')); ?></li>
	</ul>
</div>
