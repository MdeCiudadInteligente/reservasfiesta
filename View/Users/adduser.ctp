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
function telefonor(valor)
{
	if (/^[0-9]+-+[0-9]/.test(valor))
	{} else {
   alert("El télefono del representate legal es incorrecto debe ir codigo del Área-teléfono ej. 4-4440000.");
   document.getElementById("InscriptionRepresentativePhone").focus();	
	}	
}
</script>
<script type="text/javascript">
function telefonoc(valor)
{
	if (/^[0-9]+-+[0-9]/.test(valor))
	{} else {
   alert("El télefono del representate legal es incorrecto debe ir codigo del Área-teléfono ej. 4-4440000.");
   document.getElementById("InscriptionContactPhone").focus();	
	}	
}
</script>
<script type="text/javascript">
function conMayusculas(field) 
{
  field.value = field.value.toUpperCase();
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
<script type="text/javascript">
    function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " abcdefghijklmnopqrstuvwxyzñáéíóú";
       especiales = [8,37,39,46];

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
</script>
 <script type="text/javascript">
function validar() {
	var objfrm = document.form;
	
  
  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(valor))
	{} else {
   alert("El tÃ©lefono del contacto es incorrecto debe ir codigo del Ã¡rea-tÃ©lefono ej. 4-4440000.");
   document.form.data[Inscription][contact_name].focus();	
   return false;
	}
   if (/^[A-Z-a-z-0-9\.\-\_]+@+[a-z-0-9]+.+[a-z]/.test(valor))
	{} else {
   alert("El tÃ©lefono del contacto es incorrecto debe ir codigo del Ã¡rea-tÃ©lefono ej. 4-4440000.");
   document.form.tel2.focus();	
   return false;
	}
  return true; //Si ha llegado hasta aquÃ­, es que todo es correcto
  
}
 </script> 
<div class="responsibles form mde-form">
<?php echo $this->Form->create('Responsible'); ?>
	<fieldset>
	<span>Ingresa los datos de la persona que acompañará al grupo en la visita.</span>
	</br></br></br>
		<legend><?php //echo __('Add Responsible'); ?></legend>
	<?php

		//echo $institution;
		//echo $institutionid;
		?>
		<label><b>Nombre Grupo</b></label>
		<input name="institution" value="<?php echo $institution ?>" id="institution"  disabled="disabled"/>
		<input name="data[Responsible][institution_id]" value="<?php echo $institutionid ?>" id="ResponsibleInstitutionId" type="hidden"/>

		<?php 
		//echo $this->Form->input('institution_id');
		echo $this->Form->input('identity',array('label'=>'Cédula Responsable','maxLength'=>'10','onkeypress'=>'return isNumberKey(event)'));
		echo $this->Form->input('name',array('label'=>'Nombre Responsable','maxLength'=>'256'));
		echo $this->Form->input('celular',array('label'=>'Celular Responsable','maxLength'=>'10','onkeypress'=>'return isNumberKey(event)'));
		echo $this->Form->input('mail',array('label'=>'Correo Responsable','maxLength'=>'80','type'=>'email','onchange'=>'validarCorreo(this.value)'));
			
	?>
	</fieldset>
<?php echo $this->Form->end(__('Continuar')); ?>
</div>

