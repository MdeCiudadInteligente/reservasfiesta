<div class="institutions form">
<?php echo $this->Form->create('Institution',array('onsubmit'=>'return checkSubmit()')); ?>
	<fieldset>
	<span>Buscar Institución</span>
	<br><br>
	<?php echo $this->Form->input('id_institution',array('empty'=>'Seleccione institucion','options' => $institutions,'label'=>'institucion'));?>
	<br><br>
	
	<span><?php echo $this->Html->link(__('Regístrate'), array('controller' => 'institutions', 'action' => 'add')); ?>
		</n></span>
</br></br></br>
<?php echo $this->Form->create('Responsible'); ?>
	<fieldset>
		<legend><?php echo __('Add Responsible'); ?></legend>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('permission_level');
		echo $this->Form->input('name');
		echo $this->Form->input('identity');
		echo $this->Form->input('celular');
		echo $this->Form->input('mail');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Responsibles'), array('action' => 'index')); ?></li>
	</ul>
</div>		