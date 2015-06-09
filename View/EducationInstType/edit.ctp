<div class="EducationInstType form mde-form">
<?php echo $this->Form->create('EducationInstType'); ?>
	<fieldset>
		<legend><?php echo __('Edit EducationInstType'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('EducationInstType.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('EducationInstType.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List EducationInstType'), array('action' => 'index')); ?></li>
	</ul>
</div>
