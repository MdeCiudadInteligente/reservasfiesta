<div class="users form">
<?php echo $this->Session->flash('Auth'); ?>
<?php echo $this->Form->create('User'); ?>

	<fieldset>
		<legend><?php echo __('Escribir nueva contraseña'); ?></legend>

		<input name="username" value="<?php echo $userupd ?>" id="username"  disabled="disabled"/>
		</br>
		</br>
		<b>
		<?php
		echo $this->Form->input('password',array('label'=>'Nueva Contraseña'));
		echo $this->Form->input('password',array('label'=>'Repita su nueva Contraseña','id'=>'repit_password','name'=>'data[User][repit_password]'));
		?>
		</b>
	</fieldset>
<?php echo $this->Form->end(__('Guardar Cambios')); ?>
</div>

2759
body #container.app-container #content .mde-form .seccion-person .input{padding:1px}body #container.app-container #content .mde-form .seccion-person .input>label{width:100%;text-align:center;margin-left:0;text-decoration:underline}body #container.app-container #content .mde-form .seccion-person ul{margin-left:18px;margin-top:10px;width:96%;padding:8px}body #container.app-container #content .mde-form .seccion-person ul li input{height:25px;width:100%;min-width:300px}body #container.app-container #content .mde-form .seccion-person .empty-person{cursor:pointer}
