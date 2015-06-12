<div class="responsibles view">
<h2><?php echo __('Usuario'); ?></h2>
	<dl>
		<dt><?php echo __('Nombre Usuario:'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
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
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Usuario'), array('action' => 'edit', $user['User']['id_user'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Eliminar Usuario'), array('action' => 'delete', $user['User']['id_user']), null, __('Está seguro que desea eliminar # %s?', $user['User']['id_user'])); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Usuario'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Usuario'), array('action' => 'add')); ?> </li>
	</ul>
</div>
