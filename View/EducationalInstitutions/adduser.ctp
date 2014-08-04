<script type="text/javascript">
function goBack()
  {
  window.history.back()
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
<div class="educationalInstitutions form">
<?php echo $this->Form->create('EducationalInstitution'); ?>
	<fieldset>
	<span>Ingresa el código DANE asignado a tu Institución Educativa.</span>
	</br></br></br>
		<legend><?php //echo __('Add Educational Institution'); ?></legend>

	<label><b>Nombre Institución Educativa</b></label>
	<input name="prueba" value="<?php echo $institution ?>" id="prueba"  disabled="disabled"/>
	<br>
	<input name="data[EducationalInstitution][institution_id]" value="<?php echo $institutionid ?>" id="EducationalInstitutionInstitutionId" type="hidden"/>
	<?php
	//echo $institutionid;
		//echo $this->Form->input('institution_id');
		echo $this->Form->input('code',array('type'=>'text','label'=>'Código DANE','maxLength'=>'12','onkeypress'=>'return isNumberKey(event)'));
		echo $this->Form->input('type',array ('options' => array ('Institución Educativa Pública'=>'Institución Educativa Pública',
																  'Institución Educativa Privada'=>'Institución Educativa Privada'),'label'=>'Tipo Institución Educativa'));
		//echo $this->Form->input('grade');
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Continuar')); ?>
</div>

