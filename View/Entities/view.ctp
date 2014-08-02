<div class="entities view">
<?php $this->set('title_for_layout' , 'Ver entidad' );?>
<h2><?php echo __('Entity'); ?></h2>
	<dl>
		<dt><?php //echo __('Id Entity'); ?></dt>
		<dd>
			<?php //echo h($entity['Entity']['id_entity']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre:'); ?></dt>
		<dd>
			<?php echo h($entity['Entity']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('URL de la Entidad: '); ?></dt>
		<dd>
			<?php //echo h($entity['Entity']['description']); ?>
			
			<?php $link='http://'.$urls;?>
			<?php echo $this->Html->link($urls,$link,array('target' => '_blank', 'escape' => false)); ?>

			&nbsp;
			
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Opciones'); ?></h3>
	<ul>
	<?php $usuario_level= $this->Session->read('Auth.User.permission_level');?>
	<?php if ($usuario_level === '2'){?>
	<li><?php echo $this->Html->link(__('Regresar'), array('controller' => 'workshops', 'action' => 'index_inscription')); ?> </li>
	<?php }?>
		<?php  $usuario_level= $this->Session->read('Auth.User.permission_level');
		if ($usuario_level === '1'){?>
		<li><?php echo $this->Html->link(__('Main Menu'), array('controller' => 'institutions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Edit Entity'), array('action' => 'edit', $entity['Entity']['id_entity'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Entity'), array('action' => 'delete', $entity['Entity']['id_entity']), null, __('Are you sure you want to delete # %s?', $entity['Entity']['id_entity'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Entities'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entity'), array('action' => 'add')); ?> </li>
		<?php }?>
		<li><?php echo $this->Html->link(__('Close Section'), array('controller' => 'users', 'action' => 'logout')); ?> </li>	
	</ul>
</div>