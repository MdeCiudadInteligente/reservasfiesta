<div class="workshopSessions form">
<?php $this->set('title_for_layout' , 'Agregar sessión de carpa' );?>
<?php echo $this->Form->create('WorkshopSession'); ?>
	<fieldset>
		<legend><?php echo __('Add Workshop Session'); ?></legend>
	<?php
		echo $this->Form->input('workshop_id');
		echo $this->Form->input('workshop_day');
		echo $this->Form->input('workshop_time');
		echo $this->Form->input('travel_time');
		
		//echo $this->Form->input('state',array ('options' => array ('Activo'=>'Activo','Inactivo'=>'Inactivo')));
		//echo $this->Form->input('institution_id');
		?>
		<input name="data[WorkshopSession][institution_id]" value="0" id="WorkshopSessionInstitution_Id" type="hidden"/>
		<?php 
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Opciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Main Menu'), array('controller' => 'institutions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Workshop Sessions'), array('action' => 'index')); ?></li>
		<li><?php //echo $this->Html->link(__('List Workshops'), array('controller' => 'workshops', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('New Workshop'), array('controller' => 'workshops', 'action' => 'add')); ?> </li>		
		<li><?php //echo $this->Html->link(__('New Institution'), array('controller' => 'institutions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Close Section'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul>
</div>
