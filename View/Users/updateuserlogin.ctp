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
