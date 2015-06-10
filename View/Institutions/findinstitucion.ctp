<div class="institutions form">
<?php echo $this->Form->create('Institution',array('onsubmit'=>'return checkSubmit()')); ?>
	<fieldset>
	<br><br>
	<?php echo $this->Form->input('city',array ('id' => 'city','type'=>'select','options' => array ('label'=>'Buscar Institución','empty'=>'Seleccione Institución'));?>
	<br>
	<span><?php echo $this->Html->link(__('Regístrate'), array('controller' => 'institutions', 'action' => 'add')); ?>
		</n></span>
</br></br></br>
		