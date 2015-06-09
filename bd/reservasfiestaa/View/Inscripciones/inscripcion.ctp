<div class="inscripciones form">
<?php echo $this->Form->create('Inscripcion'); ?>
	
	
		<table>
			<tr>
				<h2 align="center">BIENVENIDO A FIESTA DEL LIBRO</h2>
				<td>Usted ya ha realizado una inscripción<br>
					seleccione alguna de las opciones en la parte izquierda del formulario</td>
				
			</tr>			
		</table>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>		
		<li><?php echo $this->Html->link(__('Workshop Registration'), array('controller' => 'inscripciones', 'action' => 'adiccionartaller')); ?></li>
		<li><?php echo $this->Html->link(__('Change Workshop'), array('controller' => 'inscripciones', 'action' => 'modificartaller')); ?> </li>
		<li><?php echo $this->Html->link(__('Workshop Cancel'), array('controller' => 'inscripciones', 'action' => 'adiccionartaller')); ?> </li>
		<li><?php echo $this->Html->link(__('Close Section'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul>
</div>
