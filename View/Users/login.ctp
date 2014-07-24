<div class="explanation">
Bienvenidos
</br></br>
Este es un portal para cambiarte la vida a través de la lectura.
</br></br>
Inscríbete a nuestras visitas guiadas y talleres de promoción. Tú mismo podrás decidir la fecha, la hora y el taller en el que participarás.
Para iniciar el proceso debes registrarte y  crear un usuario. Si ya lo creaste, ingresa tus datos y separa tu participación.
</br></br>
Un abrazo.
</br></br>
8a. Fiesta del Libro y la Cultura.
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
		<?php echo $this->Html->link(__('Recordar usuario y contraseña'), array('controller' => 'users', 'action' => 'finduser')); ?>
		</br></br></br>
		<?php echo $this->Html->link(__('Regístrate'), array('controller' => 'institutions', 'action' => 'add')); ?>
		</n>
	<span><?php echo 'Es gratis y nos encanta así' ?></span>
	</div>



