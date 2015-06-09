<div class="specificConditions view">
<?php $this->set('title_for_layout' , 'Ver condición específica' );?>
<h2><?php echo __('Specific Condition'); ?></h2>
	<dl>
		<dt><?php //echo __('Id Specific Condition'); ?></dt>
		<dd>
			<?php //echo h($specificCondition['SpecificCondition']['id_specific_condition']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre:'); ?></dt>
		<dd>
			<?php echo h($specificCondition['SpecificCondition']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Opciones'); ?></h3>
	<ul>
	<li>	
		<li><?php echo $this->Html->link(__('Main Menu'), array('controller' => 'institutions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Edit Specific Condition'), array('action' => 'edit', $specificCondition['SpecificCondition']['id_specific_condition'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Specific Condition'), array('action' => 'delete', $specificCondition['SpecificCondition']['id_specific_condition']), null, __('Are you sure you want to delete # %s?', $specificCondition['SpecificCondition']['id_specific_condition'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Specific Conditions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Specific Condition'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Close Section'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul>
</div>