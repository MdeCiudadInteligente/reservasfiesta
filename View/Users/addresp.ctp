<script type="text/javascript">
function goBack()
  {
  window.history.back()
  }
</script>
<script type="text/javascript">
 function validarEmail(valor) {
	 var filter=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(valor)){
  } else {
   alert("La dirección de correo es incorrecta.");
   document.getElementById("InscriptionRepresentativeMail").focus();
   return false;
  }
  return true;
}
 </script> 
 <script type="text/javascript">
 function validarCorreo(valor) {
	 var filter=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(valor)){
  } else {
   alert("La dirección de correo es incorrecta.");
   document.getElementById("InscriptionContanctMail").focus();
   return false;
  }
  return true;
}
 </script> 
 <script type="text/javascript">
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
 
         return true;
      }
</script>
<div class="users form mde-form">
<?php echo $this->Form->create('User'); ?>
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
					echo $this->Form->input('identity',array('label'=>'Documento de Identidad','onkeypress'=>'return isNumberKey(event)'));
					echo $this->Form->input('celular',array('onkeypress'=>'return isNumberKey(event)'));
					echo $this->Form->input('mail');
				?>
				
			</fieldset>
<?php echo $this->Form->end(__('Continuar')); ?>
</div>
<!-- 
<div class="actions">
	<h3><?php //echo __('Actions'); ?></h3>
	<ul>-->
	<!--  	<li><?php //echo $this->Html->link(__('Main Menu'), array('controller' => 'institutions', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('Lista Usuarios'), array('action' => 'index')); ?></li>
		<li><?php //echo $this->Html->link(__('List Educational Institutions'), array('controller' => 'educational_institutions', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('New Educational Institution'), array('controller' => 'educational_institutions', 'action' => 'add')); ?> </li>
		<li><?php //echo $this->Html->link(__('Close Section'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul>
</div>
-->