<div class="publicTypeWorkshops view">
<h2><?php echo __('Public Type Workshop'); ?></h2>
	<dl>
		<dt><?php echo __('Workshop Id'); ?></dt>
		<dd>
			<?php echo h($publicTypeWorkshop['PublicTypeWorkshop']['workshop_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Public Type Id'); ?></dt>
		<dd>
			<?php echo h($publicTypeWorkshop['PublicTypeWorkshop']['public_type_id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Public Type Workshop'), array('action' => 'edit', $publicTypeWorkshop['PublicTypeWorkshop']['public_type_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Public Type Workshop'), array('action' => 'delete', $publicTypeWorkshop['PublicTypeWorkshop']['public_type_id']), null, __('Are you sure you want to delete # %s?', $publicTypeWorkshop['PublicTypeWorkshop']['public_type_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Public Type Workshops'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Public Type Workshop'), array('action' => 'add')); ?> </li>
	</ul>
</div>
