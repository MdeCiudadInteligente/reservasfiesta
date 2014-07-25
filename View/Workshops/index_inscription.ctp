<script language="JavaScript">
<?php $this->set('title_for_layout' , 'Inscripción carpa' );?>
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
			<?php echo$this->Html->image('/img/banner-aplicativo2.jpg', array('border' => '0'))?>
		</tr>
		<tr><p></p></tr>
		<tr>
			<?php		
			if ($condicionp != 0)
			{			

					echo "Que bien!!! Estos son los datos del taller que inscribiste para tu grupo, recuerda que puedes hacer click en imprimir para generar la hoja de 
					registro, la cual debes presentar en  el ingreso el día que tengas tu taller y recorrido. (si no tienes disponible impresora en el momento,
					puedes volver a ingresar en cualquier momento con tu usuario y contraseña e imprimir tu hoja.) </br></br></br>";
					echo "El Día:\n";
					
					//echo $institutionidp;
					//echo "id de la institucion";
					//echo  $condicionp;
					echo $this->Time->format($condiciond, '%B %e, %Y');				
					echo "</br>";
					echo "Nombre Taller:\n";
					echo $this->Html->link($condicionnom, array('controller' => 'workshops', 'action' => 'view', $condicionid));
					echo "</br>";
					echo "Hora Taller:\n";
					echo  $this->Time->format($condiciont, '%I:%M %p');;
					echo "</br>";
					echo "Hora Recorrido:\n";
					echo  $this->Time->format($condiciontra, '%I:%M %p');
					echo "</br>";
					echo "Nombre del Encargado:\n";
					echo  $rname;	
					echo "</br>";
					echo "Celular del Encargado:\n";
					echo  $rcelular;
					echo "</br>";
					echo "Cantidad de Inscritos:\n";
					echo  $institutionnumber;
					echo "</br>";
					echo "</br>";
					echo "Recomendaciones:";
					echo "</br>";
					echo "</br>";
					echo "<p>"."- Recuerde que la duración de la actividad es de dos (2) horas para cada uno de los grupos, es
								  importante tener en cuenta que esta programación se hace con el fin de atender a todo el
								  público que desee asistir a la Fiesta, por lo tanto es indispensable respetar las actividades
								  programadas para los demás grupos y no ingresar a las carpas de promoción de lectura sin autorización."."<p>";
					echo "<p>"."- Durante la visita el grupo contará con el acompañamiento de un guía, pero es indispensable que
								  el responsable del grupo esté permanentemente con él."."<p>";
					echo "<p>"."- Es necesario que los grupos de primera infancia y hasta los 8 años estén identificados con escarapela."."<p>";
					echo "<p>"."- La entrada y participación en el evento es libre gracias al pago oportuno de sus impuestos."."<p>";
				}

				if (($condicionp == 0)) {					
                  if (($pass != '')) {
					echo 'Tu registro ha sido guardado: tu usuario '.$usuario.' y contraseña '.$pass.', continúa haciendo click en el botón '."<i>".'inscripción carpa '. "</i>". 'para reservar el cupo en el taller que elijas.';
				
                  }
				  else{
						  	
						echo 'Tu usuario es: '.$usuario.', continúa  haciendo  click en el botón '."<i>".'inscripción carpa  '. "</i>".'para reservar el cupo en el taller que elijas.';
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
		echo $this->Html->link(__('Inscripción carpa'), array('controller' => 'WorkshopSessions', 'action' => 'addworkshop')); 
		}
		?></li>
		
		<li><?php 
		if (($condicionp != 0)) {
		echo $this->Html->link(__('Workshop Cancel'), array('controller' => 'Workshops', 'action' => 'workshop_cancel')); 		
		}
		?></li>
		<li><?php echo $this->Html->link(__('Editar datos grupo'), array('controller'=>'institutions','action' => 'edit',$institutionidp)); ?> </li>
		<li><?php echo $this->Html->link(__('Editar datos responsable'), array('controller' => 'responsibles','action' => 'edit',$rcedula)); ?> </li>
		<li><?php echo $this->Html->link(__('Close Section'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul>
</div>
</div>
