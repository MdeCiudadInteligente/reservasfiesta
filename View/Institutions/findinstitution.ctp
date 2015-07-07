<script type="text/javascript">

      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
 
         return true;
      }
</script>
<div class="descripcion-formularios">A continuación encontrará una lista desplegable en la cuál podrá buscar su Institución Educativa ó
			Independiente, Si en la lista no encuentra la Institución que desea registrar por favor de click en el siguiente link
			<span><?php echo $this->Html->link(__('Registrar Institución Educativa ó Independiente'), array('controller' => 'institutions', 'action' => 'add')); ?></span>
			para registrarla.</div>
<div class="users form mde-form find-institution">
	<?php echo $this->Form->create('User'); ?>
	<div class="Buscar lista">
		<fieldset>
			<?php echo $this->Form->input('id_institution',array('type'=>'select','empty'=>'Seleccione el tipo de institución','options' => array ('Institución Educativa'=>'Institución Educativa', 'Institución Independiente'=>'Institución Independiente'),'id' => 'lista-responsable','label' => 'Seleccione Tipo de institución por el que desea buscar'));?>	
			<div class="independiente hidden_texto"><p>Para buscar su Institucion Independiente por favor ingrese el <strong>Nombre</strong> en el campo de texto que se encuentra a continuación, si no lo encuentra ingreselo por medio de este enlace <?php echo $this->Html->link(__('Registrar Institución Educativa ó Independiente'), array('controller' => 'institutions', 'action' => 'add')); ?>.</p></div>
			<div class="educativa hidden_texto2"><p>Para buscar su Institucion Educativa por favor ingrese el <strong>Nombre o el Código DANE</strong> en el campo de texto que se encuentra a continuación, si no lo encuentra ingreselo por medio de este enlace <?php echo $this->Html->link(__('Registrar Institución Educativa ó Independiente'), array('controller' => 'institutions', 'action' => 'add')); ?>.</p></div>

			<div class="autocompleted hidden_lista seccion-person">
				<div class="input" >
					<label>Institución Educativa ó Independiente</label>
					
					<input type="text"  id="completed-institution" class="Institution-autocomplete" data-required="true" data-valcontainer=".results-input-institution" data-emptymsg="Por favor ingresa una institucion">

					<div class="results-input" data-input-name="data[Institution][Institution][]">
					</div>	
				</div>		
			</div>	

			<div class="boton hidden_completed">
				<input type="button" value="Continuar" id="boton-responsable" class="submit"/>
			</div>	

		</fieldset>
	</div>
	<div class="responsable hidden_book">	
			<fieldset>
				<legend><?php echo __('Agregar Usuario'); ?></legend>
				<?php
					echo $this->Form->input('username',array('id'=>'username'));
				?>
				<div id="Infouser"></div>
				<?php echo $this->Form->input('password');?>				
				<input name="data[User][permission_level]" value="2" id="UserPermissionLevel" type="hidden"/>
				<?php 
					echo $this->Form->input('name');
					echo $this->Form->input('identity',array('label'=>'Documento de Identidad','onkeypress'=>'return isNumberKey(event)'));
					echo $this->Form->input('celular',array('onkeypress'=>'return isNumberKey(event)'));
					echo $this->Form->input('mail');
				?>
				
			</fieldset>
		<?php echo $this->Form->end(__('Submit')); ?>
	</div>
</div>
<!-- <div class="actions"> 
	<h3>?php //echo __('Actions'); ?></h3>
	<ul>-->
<!-- 		<li>?php //echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li> 
	</ul>
</div>	
-->