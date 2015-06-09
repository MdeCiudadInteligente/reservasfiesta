<script language="JavaScript">
function doPrint(){
document.all.item("noprint").style.visibility='hidden';
document.getElementById("btnImprimir").style.display='none';
window.print();
}
</script>

<div class="inscripciones form">
<!--  <a href="javascript:window.print()"> imprimir </a>-->
<?php echo $this->Form->create('Inscripcion'); ?>
	<table>
			<tr>
				<h2 align="center"></h2>	
				
		<?php	
		
			if ($condicionp != 0)
			{
					echo "Que bien!!! Estos son los datos del taller que inscribiste para tu grupo, recuerda que puedes hacer click en imprimir para generar la hoja de registro, la cual debes presentar en  el ingreso el día que tengas tu taller y recorrido. (si no tienes disponible impresora en el momento, puedes volver a ingresar en cualquier momento con tu usuario y contraseña e imprimir tu hoja.) </br></br></br>";
					echo "El Día:\n";
				
					//echo $institutionidp;
					//echo "id de la institucion";
					//echo  $condicionp;
					echo  $condiciond;
					echo "</br>";
					echo "Nombre Taller:\n";
					echo $this->Html->link($condicionnom, array('controller' => 'workshops', 'action' => 'view', $condicionid));
					echo "</br>";
					echo "Hora Taller:\n";
					echo  $condiciont;
					echo "</br>";
					echo "Hora Recorrido:\n";
					echo  $condiciontra;
					
											
				}
				if (($condicionp == 0)) {
					
                  if (($pass != '')) {
					echo 'Tu registro ha sido guardado tu usuario '.$usuario.' y contraseña '.$pass.', continua  haciendo  click en el botón inscripción carpa  para reservar el cupo en el taller que elijas.';
				  }
				  else{
				  	echo 'Tu usuario es: '.$usuario.', continua  haciendo  click en el botón inscripción carpa  para reservar el cupo en el taller que elijas.';
				  }
				}
				
					?>
			
			</tr>			
	</table>
	<div class="submit">
	<input type="submit" id="btnImprimir" name="imprimir" value="Imprimir" onclick="window.doPrint();">
	</div>
</div>

<div id=noprint>

<div class="actions">
	<h3><?php echo __('Opciones'); ?></h3>
	<ul>		
		<li><?php 
		if (($condicionp == 0)) {
		echo $this->Html->link(__('Workshop Registration'), array('controller' => 'WorkshopSessions', 'action' => 'addworkshop')); 
		}
		?></li>
		
		<li><?php 
		if (($condicionp != 0)) {
		echo $this->Html->link(__('Workshop Cancel'), array('controller' => 'Workshops', 'action' => 'workshop_cancel')); 
		}
		?></li>
		<li><?php echo $this->Html->link(__('Close Section'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul>
</div>
</div>
