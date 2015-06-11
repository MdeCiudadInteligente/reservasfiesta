<div class="institutions form">
	<div class="Buscar lista">
		<?php echo $this->Form->create('Institution',array('onsubmit'=>'return checkSubmit()')); ?>
	<fieldset>
		<span><p>A continuación encontrará una lista desplegable en la cuál podrá buscar su Institución Educativa ó
		Independiente, Si en la lista no encuentra la Institución que desea registrar por favor de click en el siguiente link
		<span><?php echo $this->Html->link(__('Registrar Institución Educativa ó Independiente'), array('controller' => 'institutions', 'action' => 'add')); ?></span>
		para registrarla.</p></span>
	<br><br>
	<?php echo $this->Form->input('id_institution',array('id' => 'lista-responsable','empty' => 'Seleccione la Institución','options' => $institutions,'label' => 'Buscar Institución Educativa ó Independiente'));?>	
	<div class="desplegable hidden_lista">
		<?php echo $this->Form->submit(__('Continuar'), array('id' => 'boton-responsable'))?>
	</div>
	
	</fieldset>
</div>

<div class="responsable hidden_book">

<?php echo $this->Form->create('Responsible'); ?>
	<fieldset>
		<legend><?php echo __('Add Responsible'); ?></legend>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('permission_level');
		echo $this->Form->input('name');
		echo $this->Form->input('identity',array('label'=>'Documento de Identidad'));
		echo $this->Form->input('celular');
		echo $this->Form->input('mail');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Responsibles'), array('action' => 'index')); ?></li>
	</ul>
</div>		