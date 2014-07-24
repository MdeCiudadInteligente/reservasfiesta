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
<div class="responsibles form">
<?php echo $this->Form->create('Responsible'); ?>
	<fieldset>
		<legend><?php echo __('Add Responsible'); ?></legend>
	<?php

	    echo $this->Form->input('institution_id');
		echo $this->Form->input('id_responsible',array('type'=>'text','label'=>'Cédula Responsable','maxLength'=>'10','onkeypress'=>'return isNumberKey(event)'));
		echo $this->Form->input('name',array('label'=>'Nombre Responsable','maxLength'=>'256'));
		echo $this->Form->input('celular',array('label'=>'Celular Responsable','maxLength'=>'10','onkeypress'=>'return isNumberKey(event)'));
		echo $this->Form->input('mail',array('label'=>'Correo Responsable','onchange'=>'validarEmail(this.value)'));
			
	?>
	</fieldset>
<?php echo $this->Form->end(__('Continuar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Main Menu'), array('controller' => 'institutions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Responsibles'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Educational Institutions'), array('controller' => 'educational_institutions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Educational Institution'), array('controller' => 'educational_institutions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Close Section'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul>
</div>
