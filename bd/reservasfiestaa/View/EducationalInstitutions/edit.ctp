<div class="educationalInstitutions form">
<?php echo $this->Form->create('EducationalInstitution'); ?>
	<fieldset>
		<legend><?php echo __('Edit Educational Institution'); ?></legend>
	<?php
		echo $this->Form->input('code');
		echo $this->Form->input('type');
		//echo $this->Form->input('grade');
		echo $this->Form->input('institution_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Main Menu'), array('controller' => 'institutions', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('EducationalInstitution.code')), null, __('Are you sure you want to delete # %s?', $this->Form->value('EducationalInstitution.code'))); ?></li>
		<li><?php echo $this->Html->link(__('List Educational Institutions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Institutions'), array('controller' => 'institutions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Institution'), array('controller' => 'institutions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Responsibles'), array('controller' => 'responsibles', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('New Responsible'), array('controller' => 'responsibles', 'action' => 'add')); ?> </li>
				<li><?php echo $this->Html->link(__('Close Section'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul>
</div>
