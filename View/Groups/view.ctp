<div class="groups view">
<h2><?php echo __('Group'); ?></h2>
	<dl>
		<dt><?php //echo __('Id Group'); ?></dt>
		<dd>
			<?php //echo h($group['Group']['id_group']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($group['Group']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Members Number'); ?></dt>
		<dd>
			<?php echo h($group['Group']['members_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Public Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($group['PublicType']['name'], array('controller' => 'public_types', 'action' => 'view', $group['PublicType']['id_public_type'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Specific Condition'); ?></dt>
		<dd>
			<?php  
			$tspecificcondition='';
			foreach ($group['SpecificCondition'] as $specificcondition):
			$tspecificcondition=$specificcondition['name'].','.$tspecificcondition;
			endforeach;
			echo $tspecificcondition;
			?>
			&nbsp;
		<dt><?php echo __('Responsible'); ?></dt>
		<dd>
			<?php echo $this->Html->link($group['User']['name'], array('controller' => 'users', 'action' => 'view', $group['User']['id_user'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Group'), array('action' => 'edit', $group['Group']['id_group'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Group'), array('action' => 'delete', $group['Group']['id_group']), null, __('Are you sure you want to delete # %s?', $group['Group']['id_group'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Public Types'), array('controller' => 'public_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Public Type'), array('controller' => 'public_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Specific Conditions'), array('controller' => 'specific_conditions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Specific Condition'), array('controller' => 'specific_conditions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Responsibles'), array('controller' => 'responsibles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Responsible'), array('controller' => 'responsibles', 'action' => 'add')); ?> </li>
	</ul>
</div>
