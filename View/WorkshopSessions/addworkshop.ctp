<?php $this->set('title_for_layout' , 'Seleccionar fecha' );?>
<!-- Scripts para el calendario -->
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script> 
 <script>
 $(function() {
    $( "#datepicker" ).datepicker({
	changeMonth: true,
	changeYear: true
});
	$.datepicker.regional['es'] =
  {
  closeText: 'Fermer',
  prevText: 'Previo',
  nextText: 'Próximo',
  yearRange: "2007:2020",
  monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
  monthNamesShort: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
  monthStatus: 'Voir un autre mois', yearStatus: 'Voir un autre année',
  dayNames: ['Domingo','Lunes','Martes','Mi\u00e9rcoles','Jueves','Viernes','S\u00e1bado'],
  dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sáb'],
  dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
  dateFormat: 'dd/mm/yy', firstDay: 0,
  initStatus: 'Selecciona la fecha', isRTL: false};
   $.datepicker.setDefaults($.datepicker.regional['es']);
 //miDate: fecha de comienzo D=días | M=mes | Y=año
 //maxDate: fecha tope D=días | M=mes | Y=año
    $('#datepicker').datepicker('option', {dateFormat: 'dd-mm-yy'});

});
</script>
 <!--Fin Scripts para el calendario -->
<div class="WorkshopSession form">
<?php echo $this->Form->create('WorkshopSession'); ?>
	<fieldset>
	<span>Selecciona la fecha para inscribir tu grupo.</span>
	</br></br></br>
		<legend><?php //echo __('Seleccionar Fecha'); ?></legend>
	
		<?php 
	
		//echo $this->Form->input('workshop_day',array ('id' => 'datepicker'));

		?>
		<?php if($listadohorarion == null)
			  {
			  		echo '<b>No se encontraron talleres que cumplan con las características de su grupo</b>';
			  }
			  else
				{					
		 			echo '<label><select name="data[WorkshopSession][diataller]">'.$listadohorarion.'</select></label>';
		 			echo $this->Form->end(__('Ver Carpas'));
		 			
				}
		 ?>
	
	</fieldset>
</div>
<div class="actions">
	<h3><?php //echo __('Opciones'); ?></h3>
	<ul>		
		<li><?php //echo $this->Html->link(__('Regresar'), array('controller' => 'workshops', 'action' => 'index_inscription')); ?> </li>
		<li><?php echo $this->Html->link(__('Close Section'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul>
</div> 
