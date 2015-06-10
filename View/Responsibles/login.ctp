<div class="explanation">
<?php $this->set('title_for_layout' , 'Ingreso' );?>
Bienvenidos
</br></br>
Este es un portal en el que hemos trabajado fuertemente con el fin de facilitar las inscripciones para participar en los talleres de fomento de lectura de la Fiesta del Libro y la Cultura.
</br></br>
Inscríbete, tú mismo podrás decidir la fecha, la hora y el taller en el que participarás. Para iniciar el proceso debes registrarte y crear un usuario. Si ya lo creaste, ingresa tus datos y separa tu participación. 
</br></br>
En la zona de Jardín Lectura Viva podrán descubrir desde el arte, la música, la ciencia, la literatura, los juegos y la pintura  las diversas formas de leer. 
</br></br>
¡Déjate sorprender!
</div>
<!--  <div class="inscription">

</div>-->
	<div class="login">
		<?php echo $this->Session->flash('auth'); ?>
		<?php echo $this->Form->create('User'); ?>
		    <fieldset>
		        <legend>
		            <?php //echo __('Please enter your username and password'); ?>
		        </legend>
		        <?php echo $this->Form->input('username',array('label'=>'usuario'));
		         echo $this->Form->input('password',array('label'=>'contrasena'));     
		        ?>
		    
		    </fieldset>
		   
		<?php echo $this->Form->end(__('Login')); ?>
		<?php echo $this->Html->link(__('Recordar usuario y contraseña'), array('controller' => 'responsibles', 'action' => 'finduser')); ?>
		</br></br></br>
		<?php echo $this->Html->link(__('Regístrate'), array('controller' => 'institutions', 'action' => 'findinstitution')); ?>
		</n>
	<span><?php echo 'Es gratis y nos encanta así' ?></span>
	</div>



