<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<span>Ingresa el usuario y la contraseña para que sigas ingresando al aplicativo.</span>
	</br></br></br>
		<legend><?php //echo __('Add User'); ?></legend>
	<?php
	//echo $institution;
	//echo $institutionid;
	?>		<label><b>Nombre Grupo</b></label>
			<input name="institution" value="<?php echo $institution ?>" id="institution"  disabled="disabled"/>
			<input name="data[User][institution_id]" value="<?php echo $institutionid ?>" id="UserInstitutionId" type="hidden"/>
	
			<?php 
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		//echo $this->Form->input('permission_level');
		?>
		<input name="data[User][permission_level]" value="2" id="UserPermissionLevel" type="hidden"/>
		<?php 
		//echo $this->Form->input('institution_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Crear usuario')); ?>
</div>

