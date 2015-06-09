<div class="EducationInstType form mde-form">
<?php echo $this->Form->create('EducationInstType'); ?>
	<fieldset>
		<legend><?php echo __('Add EducationInstType'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List EducationInstTypes'), array('action' => 'index')); ?></li>
	</ul>
</div>
