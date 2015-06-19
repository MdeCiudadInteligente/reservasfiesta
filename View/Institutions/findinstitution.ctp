<div class="users form">
	<?php echo $this->Form->create('User'); ?>
	<div class="Buscar lista">
		<fieldset>
			<span><p>A continuación encontrará una lista desplegable en la cuál podrá buscar su Institución Educativa ó
			Independiente, Si en la lista no encuentra la Institución que desea registrar por favor de click en el siguiente link
			<span><?php echo $this->Html->link(__('Registrar Institución Educativa ó Independiente'), array('controller' => 'institutions', 'action' => 'add')); ?></span>
			para registrarla.</p></span>
			<br>
			<?php echo $this->Form->input('id_institution',array('id' => 'lista-responsable', 'name' =>'data[Institution][Institution][]','empty' => 'Seleccione la Institución','options' => $institutions,'label' => 'Buscar Institución Educativa ó Independiente'));?>	
			<div class="desplegable hidden_lista">
				<?php //echo $this->Form->submit(__('Continuar'), array('id' => 'boton-responsable'))?>
				<input type="button" value="Continuar" id="boton-responsable" class="submit"/>
			</div>
		</fieldset>
	</div>
<div class="responsable hidden_book">	
		<fieldset>
			<legend><?php echo __('Add User'); ?></legend>
			<?php
				echo $this->Form->input('username',array('id'=>'username'));
			?>
			<div id="Infouser"></div>
			<?php echo $this->Form->input('password');?>
			
			<input name="data[User][permission_level]" value="2" id="UserPermissionLevel" type="hidden"/>
			<?php 
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
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
	</ul>
</div>		