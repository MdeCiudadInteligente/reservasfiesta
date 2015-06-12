<div class="institutions form">
<?php $this->set('title_for_layout' , 'Editar Institución');?>
<?php echo $this->Form->create('Institution'); ?>
	<fieldset>
		<legend><?php echo __('Edit Institution'); ?></legend>
	<?php
		echo $this->Form->input('id_institution');
		echo $this->Form->input('name',array('label'=>'Nombre Institución'));
		echo $this->Form->input('mail',array('label'=>'Correo Institución'));
		echo $this->Form->input('address',array('label'=>'Dirección Institución'));
		echo $this->Form->input('phone',array('label'=>'Télefono Institución'));
		echo $this->Form->input('city',array('label'=>'Ciudad Institución','disabled'=>'true'));
		echo $this->Form->input('comune',array('label'=>'Comuna Institución','disabled'=>'true'));
		echo $this->Form->input('neighborhood',array('label'=>'Barrio Institución','disabled'=>'true'));
		echo $this->Form->input('inst_type',array('disabled'=>'true'));
		echo $this->Form->input('educational_inst_type',array('disabled'=>'true'));
		echo $this->Form->input('code_education',array('disabled'=>'true'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
	<?php $usuario_level= $this->Session->read('Auth.User.permission_level');?>
	<?php if ($usuario_level == '2'){?>
	<li><?php echo $this->Html->link(__('Regresar'), array('controller' => 'workshops', 'action' => 'index_inscription')); ?> </li>
	<?php }?>
	<?php  $usuario_level= $this->Session->read('Auth.User.permission_level');
		if ($usuario_level == '1'){?>
		<li><?php echo $this->Html->link(__('Main Menu'), array('controller' => 'institutions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Institutions'), array('action' => 'index')); ?></li>	
		<?php }?>
		<li><?php echo $this->Html->link(__('New Institution'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Form->postLink(__('Eliminar Institución'), array('action' => 'delete', $this->Form->value('Institution.id_institution')), null, __('Está seguro que desea eliminar # %s?', $this->Form->value('Institution.id_institution'))); ?></li>
		<li><?php echo $this->Html->link(__('Close Section'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul>
</div>
