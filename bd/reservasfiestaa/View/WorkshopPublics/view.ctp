<div class="workshopPublics view">
<h2><?php echo __('Workshop Public'); ?></h2>
	<dl>
		<dt><?php echo __('Id Workshop Public'); ?></dt>
		<dd>
			<?php echo h($workshopPublic['WorkshopPublic']['id_workshop_public']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Workshop'); ?></dt>
		<dd>
			<?php echo $this->Html->link($workshopPublic['Workshop']['name'], array('controller' => 'workshops', 'action' => 'view', $workshopPublic['Workshop']['id_workshop'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Public Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($workshopPublic['PublicType']['name'], array('controller' => 'public_types', 'action' => 'view', $workshopPublic['PublicType']['id_public_type'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Workshop Public'), array('action' => 'edit', $workshopPublic['WorkshopPublic']['id_workshop_public'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Workshop Public'), array('action' => 'delete', $workshopPublic['WorkshopPublic']['id_workshop_public']), null, __('Are you sure you want to delete # %s?', $workshopPublic['WorkshopPublic']['id_workshop_public'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Workshop Publics'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Workshop Public'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Workshops'), array('controller' => 'workshops', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Workshop'), array('controller' => 'workshops', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Public Types'), array('controller' => 'public_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Public Type'), array('controller' => 'public_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
