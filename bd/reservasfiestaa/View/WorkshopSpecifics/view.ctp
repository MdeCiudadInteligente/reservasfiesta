<div class="workshopSpecifics view">
<h2><?php echo __('Workshop Specific'); ?></h2>
	<dl>
		<dt><?php echo __('Id Workshop Specific'); ?></dt>
		<dd>
			<?php echo h($workshopSpecific['WorkshopSpecific']['id_workshop_specific']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Workshop'); ?></dt>
		<dd>
			<?php echo $this->Html->link($workshopSpecific['Workshop']['name'], array('controller' => 'workshops', 'action' => 'view', $workshopSpecific['Workshop']['id_workshop'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Specific Condition'); ?></dt>
		<dd>
			<?php echo $this->Html->link($workshopSpecific['SpecificCondition']['name'], array('controller' => 'specific_conditions', 'action' => 'view', $workshopSpecific['SpecificCondition']['id_specific_condition'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Workshop Specific'), array('action' => 'edit', $workshopSpecific['WorkshopSpecific']['id_workshop_specific'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Workshop Specific'), array('action' => 'delete', $workshopSpecific['WorkshopSpecific']['id_workshop_specific']), null, __('Are you sure you want to delete # %s?', $workshopSpecific['WorkshopSpecific']['id_workshop_specific'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Workshop Specifics'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Workshop Specific'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Workshops'), array('controller' => 'workshops', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Workshop'), array('controller' => 'workshops', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Specific Conditions'), array('controller' => 'specific_conditions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Specific Condition'), array('controller' => 'specific_conditions', 'action' => 'add')); ?> </li>
	</ul>
</div>
