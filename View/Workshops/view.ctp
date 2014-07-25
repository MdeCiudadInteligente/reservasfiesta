<div class="workshops view">
<?php $this->set('title_for_layout' , 'Ver carpa' );?>
<h2><?php echo __('Workshop'); ?></h2>
	<dl>
		<dt><?php //echo __('Id Workshop'); ?></dt>
		<dd>
			<?php //echo h($workshop['Workshop']['id_workshop']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre:'); ?></dt>
		<dd>
			<?php echo h($workshop['Workshop']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripción:'); ?></dt>
		<dd>
			<?php echo h($workshop['Workshop']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Entidad:'); ?></dt>
		<dd>
			<?php echo $this->Html->link($workshop['Entity']['name'], array('controller' => 'entities', 'action' => 'view', $workshop['Entity']['id_entity'])); ?>
			&nbsp;
		
		</dd>
		</dl>
		<?php  $usuario_level= $this->Session->read('Auth.User.permission_level');
		if ($usuario_level === '1'){?>
		<table>
		<tr>
			<th><?php echo $this->Paginator->sort('Grupos'); ?></th>
			<th><?php echo $this->Paginator->sort('Correo'); ?></th>
			<th><?php echo $this->Paginator->sort('Comuna'); ?></th>
			<th><?php echo $this->Paginator->sort('Número integrantes'); ?></th>
			<th><?php //echo $this->Paginator->sort('public_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('Tipo institución'); ?></th>
		</tr>
		
		<?php foreach ($groups as $group): ?>
			<tr>	
			<?php if($group['Institution']['id_institution']!='0'){?>
				<td><?php echo h($group['Institution']['name']); ?>&nbsp;</td>
				<td><?php echo h($group['Institution']['mail']); ?>&nbsp;</td>
				<td><?php echo h($group['Institution']['comune']); ?>&nbsp;</td>
				<td><?php echo h($group['Institution']['members_number']); ?>&nbsp;</td>
				<td><?php //echo h($group['PublicType']['name']); ?>&nbsp;</td>
				<td><?php echo h($group['Institution']['institution_type']); ?>&nbsp;</td>
			</tr>		
			<?php }?>
	<?php endforeach; ?>
	</table>
	
	
	<p>
	<?php	
	echo $this->Paginator->counter(array(
	'format' => __('Pagina {:page} of {:pages}, resultado {:current} registros de {:count} en total, a partir del registro {:start}, que concluye en el {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
	<?php }?>
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
		<li><?php echo $this->Html->link(__('Edit Workshop'), array('action' => 'edit', $workshop['Workshop']['id_workshop'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Workshop'), array('action' => 'delete', $workshop['Workshop']['id_workshop']), null, __('Are you sure you want to delete # %s?', $workshop['Workshop']['id_workshop'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Workshops'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Workshop'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Entities'), array('controller' => 'entities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entity'), array('controller' => 'entities', 'action' => 'add')); ?> </li>
		<?php }?>
		<li><?php echo $this->Html->link(__('Close Section'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	
	</ul>
</div>