<div class="users view">
<h2><?php echo __('User'); ?></h2>
	<dl>
		<dt><?php //echo __('Id User'); ?></dt>
		<dd>
			<?php //echo h($user['User']['id_user']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre Usuario:'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php //echo __('Contraseña:'); ?></dt>
		<dd>
			<?php //echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nivel Permiso:'); ?></dt>
		<dd>
			<?php echo h($user['User']['permission_level']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre:'); ?></dt>
		<dd>
			<?php echo h($user['User']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Documento Identidad:'); ?></dt>
		<dd>
			<?php echo h($user['User']['identity']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Celular:'); ?></dt>
		<dd>
			<?php echo h($user['User']['celular']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Correo:'); ?></dt>
		<dd>
			<?php echo h($user['User']['mail']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Opciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Main Menu'), array('controller' => 'institutions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'addus')); ?> </li>	
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id_user'])); ?> </li>
		<li><?php //echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id_user']), null, __('Are you sure you want to delete # %s?', $user['User']['id_user'])); ?> </li>	
		<li><?php echo $this->Html->link(__('Close Section'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul>
</div>
