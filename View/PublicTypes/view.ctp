<div class="publicTypes view">
<?php $this->set('title_for_layout' , 'Ver tipo de público' );?>
<h2><?php echo __('Public Type'); ?></h2>
	<dl>
		<dt><?php //echo __('Id Public Type'); ?></dt>
		<dd>
			<?php //echo h($publicType['PublicType']['id_public_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre:'); ?></dt>
		<dd>
			<?php echo h($publicType['PublicType']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Opciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Main Menu'), array('controller' => 'institutions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Edit Public Type'), array('action' => 'edit', $publicType['PublicType']['id_public_type'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Public Type'), array('action' => 'delete', $publicType['PublicType']['id_public_type']), null, __('Are you sure you want to delete # %s?', $publicType['PublicType']['id_public_type'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Public Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Public Type'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Workshops'), array('controller' => 'workshops', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Workshop'), array('controller' => 'workshops', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Close Section'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul>
</div>