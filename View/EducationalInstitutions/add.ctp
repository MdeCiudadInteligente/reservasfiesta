<div class="educationalInstitutions form mde-form">
<?php echo $this->Form->create('EducationalInstitution'); ?>
	<fieldset>
		<legend><?php echo __('Add Educational Institution'); ?></legend>
	<?php
		echo $this->Form->input('institution_id');
		echo $this->Form->input('code',array('type'=>'text','label'=>'Código DANE'));
		echo $this->Form->input('type',array ('options' => array ('Institución Educativa Pública'=>'Institución Educativa Pública',
																  'Institución Educativa Privada'=>'Institución Educativa Privada'),'label'=>'Tipo Institución Educativa'));
		//echo $this->Form->input('grade');
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Continuar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Main Menu'), array('controller' => 'institutions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Educational Institutions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Institutions'), array('controller' => 'institutions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Institution'), array('controller' => 'institutions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Responsibles'), array('controller' => 'responsibles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Responsible'), array('controller' => 'responsibles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Close Section'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul>
</div>
